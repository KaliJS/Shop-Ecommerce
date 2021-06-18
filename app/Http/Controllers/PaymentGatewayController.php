<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
use Seshac\Shiprocket\Shiprocket;
use Razorpay\Api\Api;
use Redirect;
use Str;
use DB;

class PaymentGatewayController extends Controller
{
    public function placeOrder(Request $request)
    {
        
        $token =  Shiprocket::getToken();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'payment_type' => 'required'
        ]);

        try{
            $amount = 0;
            if(session()->has('cart')){
                $cart = $request->session()->get('cart');
                foreach($cart as $key=>$value){
                    $amount += $value['subtotal'];
                }
            }else{
                return Redirect::back()->with('error','!something went wrong please try again later...');
            }
            

            $user = User::where('email',$request->email)->first();
            if(!$user){
                return Redirect::back()->with('error','Unauthorized Access');                   
            }

            if(!$request->has('shipping_check')){

                if(is_null($request->shipping_user_name) || is_null($request->shipping_address) || is_null($request->shipping_pincode) || is_null($request->shipping_phone)){
                    return Redirect::back()->with('error','Please fill shipping details');
                }
            }

            //if(session()->has('cart'))

            if($request->payment_type == 'cash_on_delivery'){

                $input = [];

                $input['user_id'] = $user->id;
                $input['actual_price'] = $amount; 
                $input['final_price'] = $amount; 
                $input['delivery_charge'] = '0'; 
                $input['payment_method'] = 'cash on delivery'; 
                $input['name'] = $user->first_name.' '.$user->last_name; 
                $input['email'] = $request->email; 
                $input['phone'] = $user->phone; 
                $input['address'] = $user->address; 
                $input['delivery_date'] = date("Y-m-d");            // need changes 
                $input['delivery_time'] = '00:00:00';               // need changes 
                $input['pincode'] = $user->pincode; 
                $input['order_status'] = 'booked'; 
                $input['payment_status'] = 'cash on delivery'; 

                if(!$request->has('shipping_check')){
                                
                    $input['name'] = $request->shipping_user_name; 
                    $input['phone'] = $request->shipping_phone; 
                    $input['address'] = $request->shipping_address; 
                    $input['pincode'] = $request->shipping_pincode; 

                }

                $created_order = Orders::create($input);

                $products = session()->get('cart');
                $variant_id = array_keys($products);
                $variants = DB::table('product_variants')->whereIn('id', $variant_id)->pluck('sku','id');
            //    return $variants;
                if($created_order){
                    foreach($products as $key=>$order){
                        
                        $order_items[]=array('order_id'=>$created_order->id,'product_variant_id'=>$key,'quantity'=>$order['quantity'],'price'=>$order['variant_price'],'subtotal'=>($order['quantity']*$order['variant_price']),'status'=>'booked','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
                        $shiprocket_orders[]=array('name'=>$order['product_name'],'sku'=>$variants[$key],'units'=>$order['quantity'],'selling_price'=>$order['variant_price'],'discount'=>0,'tax'=>0,'hsn'=> '');                   

                    }
                    $inserted_items=DB::table('order_items')->insert($order_items);
                //return $shiprocket_orders;
                }

                $track_order = [
                    'order_id' => $created_order->id,
                    'status' => $created_order->order_status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];
                DB::table('track_orders')->insert($track_order);

                $orderDetails = [
                    "order_id"=> $created_order->id,
                    "order_date"=> date("Y-m-d H:i:s"),
                    "pickup_location"=> "Areca",
                    "channel_id"=> "",
                    "comment"=> "test",
                    "billing_customer_name"=> $user->first_name,
                    "billing_last_name"=> $user->last_name,
                    "billing_address"=> $user->address,
                    "billing_address_2"=> "",
                    "billing_city"=> $user->city,
                    "billing_pincode"=> $user->pincode,
                    "billing_state"=> $user->city,
                    "billing_country"=> "India",
                    "billing_email"=> $user->email,
                    "billing_phone"=> $user->phone,
                    "shipping_is_billing"=> true,
                    "shipping_customer_name"=> $input['name'],
                    "shipping_last_name"=> "",
                    "shipping_address"=> $input['address'],
                    "shipping_address_2"=> "",
                    "shipping_city"=> "",
                    "shipping_pincode"=> $input['pincode'],
                    "shipping_country"=> "India",
                    "shipping_state"=> "",
                    "shipping_email"=> "",
                    "shipping_phone"=> $input['phone'],
                    "order_items"=> $shiprocket_orders,
                    "payment_method"=> "COD", //Prepaid or COD(cash on delivery)
                    "shipping_charges"=> 0,
                    "giftwrap_charges"=> 0,
                    "transaction_charges"=> 0,
                    "total_discount"=> 0,
                    "sub_total"=> $amount,
                    "length"=> 10,
                    "breadth"=> 15,
                    "height"=> 20,
                    "weight"=> 2.5
                ];

                $response =  Shiprocket::order($token)->create($orderDetails);

                if($response['status_code'] == 1){
                    $order = Orders::find($created_order->id);
                    $order->shiprocket_order_id = $response['order_id'];
                    $order->shiprocket_shipment_id = $response['shipment_id'];
                    $order->save();
                }else{
                    return redirect('/cart')->with('errors',$response->message);
                }

                session()->forget('cart');
                return redirect('order-list')->with('success', 'Order Placed Successfully.');
            }
            elseif($request->payment_type == 'pay_now'){

                //$this->initializePayment($request->all());

                $razorpayId = env('RAZORPAY_ID');
                $razorpayKey = env('RAZORPAY_KEY');

                $receiptId = Str::random(20);

                $api = new Api($razorpayId, $razorpayKey);

                $order = $api->order->create(array(
                    'receipt' => $receiptId,
                    'amount' => $amount * 100,
                    'currency' => 'INR'
                ));

                $response = [
                    'orderId' => $order['id'],
                    'razorpayId' => $razorpayId,
                    'amount' => $amount * 100,
                    'name' => $request->first_name.' '.$request->last_name,
                    'currency' => 'INR',
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address.' '.$request->city,
                    'pincode' => $request->pincode
                ];


                $input = [];

                $input['user_id'] = $user->id;
                $input['actual_price'] = $amount; 
                $input['final_price'] = $amount; 
                $input['delivery_charge'] = '0'; 
                $input['payment_method'] = 'razorpay'; 
                $input['name'] = $user->first_name.' '.$user->last_name; 
                $input['email'] = $request->email; 
                $input['phone'] = $user->phone; 
                $input['address'] = $user->address; 
                $input['delivery_date'] = date("Y-m-d");            // need changes 
                $input['delivery_time'] = '00:00:00';               // need changes 
                $input['pincode'] = $user->pincode; 
                $input['order_status'] = 'booked'; 
                $input['payment_status'] = 'initiate'; 

                if(!$request->has('shipping_check')){
                                
                    $input['name'] = $request->shipping_user_name; 
                    $input['phone'] = $request->shipping_phone; 
                    $input['address'] = $request->shipping_address; 
                    $input['pincode'] = $request->shipping_pincode; 

                }

                $created_order = Orders::create($input);

                $products = session()->get('cart');
                $variant_id = array_keys($products);
                $variants = DB::table('product_variants')->whereIn('id', $variant_id)->pluck('sku','id');
            //    return $variants;
                if($created_order){
                    foreach($products as $key=>$order){
                        
                        $order_items[]=array('order_id'=>$created_order->id,'product_variant_id'=>$key,'quantity'=>$order['quantity'],'price'=>$order['variant_price'],'subtotal'=>($order['quantity']*$order['variant_price']),'status'=>'booked','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
                        $shiprocket_orders[]=array('name'=>$order['product_name'],'sku'=>$variants[$key],'units'=>$order['quantity'],'selling_price'=>$order['variant_price'],'discount'=>0,'tax'=>0,'hsn'=> '');                   

                    }
                    $inserted_items=DB::table('order_items')->insert($order_items);
                //return $shiprocket_orders;
                }

                $track_order = [
                    'order_id' => $created_order->id,
                    'status' => $created_order->order_status,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];
                DB::table('track_orders')->insert($track_order);

                session()->put('order_id',$created_order->id);
                session()->put('payer_id',$user->id);
                session()->put('payer_email',$user->email);
                session()->put('shipping_name',$input['name']);
                session()->put('shipping_address',$input['address']);
                session()->put('shipping_pincode',$input['pincode']);
                session()->put('shipping_phone',$input['phone']);
                session()->put('amount',$amount);
                session()->put('shiprocket_orders',$shiprocket_orders);

                return view('shopping/payment-page',compact('response'));

            }else{
                
                return Redirect::back()->with('error','Something bad happened, please try again later');
            }

        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }


    public function Complete(Request $request)
    {
        $token =  Shiprocket::getToken();

        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );

        $order = Orders::find(session()->get('order_id'));
        $user = User::where('email',session()->get('payer_email'))->first();
        
        // If Signature status is true We will save the payment response in our database
        if($signatureStatus == true)
        {

            $transaction[]=array('order_id'=>$order->id,'amount'=>session()->get('amount'),'rzp_orderid'=>$request->all()['rzp_orderid'],'payer_email'=>session()->get('payer_email'),'rzp_paymentid'=>$request->all()['rzp_paymentid'],'payment_status'=>'success','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"),'payer_id'=>session()->get('payer_id'));
            $inserted_transaction=DB::table('transactions')->insert($transaction);

            $order->payment_status = 'success';
            $order->save();

            $orderDetails = [
                "order_id"=> session()->get('order_id'),
                "order_date"=> date("Y-m-d H:i:s"),
                "pickup_location"=> "Areca",
                "channel_id"=> "",
                "comment"=> "test",
                "billing_customer_name"=> $user->first_name,
                "billing_last_name"=> $user->last_name,
                "billing_address"=> $user->address,
                "billing_address_2"=> "",
                "billing_city"=> $user->city,
                "billing_pincode"=> $user->pincode,
                "billing_state"=> $user->city,
                "billing_country"=> "India",
                "billing_email"=> $user->email,
                "billing_phone"=> $user->phone,
                "shipping_is_billing"=> true,
                "shipping_customer_name"=> session()->get('shipping_name'),
                "shipping_last_name"=> "",
                "shipping_address"=> session()->get('shipping_address'),
                "shipping_address_2"=> "",
                "shipping_city"=> "",
                "shipping_pincode"=> session()->get('shipping_pincode'),
                "shipping_country"=> "India",
                "shipping_state"=> "",
                "shipping_email"=> "",
                "shipping_phone"=> session()->get('shipping_phone'),
                "order_items"=> session()->get('shiprocket_orders'),
                "payment_method"=> "Prepaid", //Prepaid or COD(cash on delivery)
                "shipping_charges"=> 0,
                "giftwrap_charges"=> 0,
                "transaction_charges"=> 0,
                "total_discount"=> 0,
                "sub_total"=> session()->get('amount'),
                "length"=> 10,
                "breadth"=> 15,
                "height"=> 20,
                "weight"=> 2.5
            ];
            session()->get('shiprocket_orders');
            $response =  Shiprocket::order($token)->create($orderDetails);
            session()->get('shiprocket_orders');
            if($response['status_code'] == 1){
                $order = Orders::find(session()->get('order_id'));
                $order->shiprocket_order_id = $response['order_id'];
                $order->shiprocket_shipment_id = $response['shipment_id'];
                $order->save();
            }else{
                return redirect('/cart')->with('error',$response['message']);
            }

            session()->forget('cart');

            // payment success page
            return redirect('order-list')->with('success', 'Order Placed Successfully.');
        }
        else{
            // payment failed page

            $transaction[]=array('order_id'=>$order->id,'amount'=>session()->get('amount'),'rzp_orderid'=>$request->all()['rzp_orderid'],'payer_email'=>session()->get('payer_email'),'rzp_paymentid'=>$request->all()['rzp_paymentid'],'payment_status'=>'failed','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"),'payer_id'=>session()->get('payer_id'));
            $inserted_transaction=DB::table('transactions')->insert($transaction);

            $order->payment_status = 'failed';
            $order->save();

            session()->forget('cart');

            return redirect('/')->with('error', 'oops! something bad happened.');;
        }
    }

    // It return boolean if signature is correct
    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
        try
        {
            $razorpayId = env('RAZORPAY_ID');
            $razorpayKey = env('RAZORPAY_KEY');

            $api = new Api($razorpayId, $razorpayKey);
            $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
    }

}
