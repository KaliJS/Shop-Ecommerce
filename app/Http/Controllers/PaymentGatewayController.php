<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\ProductVariants;
use App\Models\Orders;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Redirect;
use Str;
use DB;

class PaymentGatewayController extends Controller
{
    public function placeOrder(Request $request)
    {

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

            $user = User::where('email',$request->email)->first();
            if(!$user){
                return Redirect::back()->with('error','Unauthorized Access');                   
            }

            if($request->has('shipping_check') && $request->get('shipping_check') == 'on'){

                if(is_null($request->shipping_user_name) || is_null($request->shipping_address) || is_null($request->shipping_pincode) || is_null($request->shipping_phone)){
                    return Redirect::back()->with('error','Please fill shipping details');
                }
            }

            //if(session()->has('cart'))

            if($request->payment_type == 'cash_on_delivery'){

                $input = [];

                $input['user_id'] = $user->id;
                $input['actual_price'] = $request->amount; 
                $input['final_price'] = $request->amount; 
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

                if($request->has('shipping_check') && $request->get('shipping_check') == 'on'){
                                
                    $input['name'] = $request->shipping_user_name; 
                    $input['phone'] = $request->shipping_phone; 
                    $input['address'] = $request->shipping_address; 
                    $input['pincode'] = $request->shipping_pincode; 

                }

                $created_order = Orders::create($input);

                $products = session()->get('cart');
                if($created_order){
                    foreach($products as $key=>$order){
                        $order_items[]=array('order_id'=>$created_order->id,'product_variant_id'=>$key,'quantity'=>$order['quantity'],'price'=>$order['variant_price'],'subtotal'=>($order['quantity']*$order['variant_price']),'status'=>'booked','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
                    }
                    $inserted_items=DB::table('order_items')->insert($order_items);

                    $track_order = [
                        'order_id' => $created_order->id,
                        'status' => $created_order->order_status,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ];
                    DB::table('track_orders')->insert($track_order);

                }

                session()->forget('cart');
                return Redirect::back()->with('success','your Order is placed successfully. go to your account to track orders...');

            }
            elseif($request->payment_type == 'pay_now'){

                //$this->initializePayment($request->all());

                $razorpayId = env('RAZORPAY_ID');
                $razorpayKey = env('RAZORPAY_KEY');

                $receiptId = Str::random(20);

                $api = new Api($razorpayId, $razorpayKey);

                $order = $api->order->create(array(
                    'receipt' => $receiptId,
                    'amount' => $request->amount * 100,
                    'currency' => 'INR'
                ));

                $response = [
                    'orderId' => $order['id'],
                    'razorpayId' => $razorpayId,
                    'amount' => $request->amount * 100,
                    'name' => $request->first_name.' '.$request->last_name,
                    'currency' => 'INR',
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address.' '.$request->city,
                    'pincode' => $request->pincode
                ];


                $input = [];

                $input['user_id'] = $user->id;
                $input['actual_price'] = $request->amount; 
                $input['final_price'] = $request->amount; 
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

                if($request->has('shipping_check') && $request->get('shipping_check') == 'on'){
                                
                    $input['name'] = $request->shipping_user_name; 
                    $input['phone'] = $request->shipping_phone; 
                    $input['address'] = $request->shipping_address; 
                    $input['pincode'] = $request->shipping_pincode; 

                }

                $created_order = Orders::create($input);

                $products = session()->get('cart');
                if($created_order){
                    foreach($products as $key=>$order){
                        $order_items[]=array('order_id'=>$created_order->id,'product_variant_id'=>$key,'quantity'=>$order['quantity'],'price'=>$order['variant_price'],'subtotal'=>($order['quantity']*$order['variant_price']),'status'=>'booked','created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s"));
                    }
                    $inserted_items=DB::table('order_items')->insert($order_items);

                    $track_order = [
                        'order_id' => $created_order->id,
                        'status' => $created_order->order_status,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ];
                    DB::table('track_orders')->insert($track_order);

                }

                session()->put('order_id',$created_order->id);

                return view('shopping/payment-page',compact('response'));

            }else{
                return Redirect::back()->with('error','Something bad happened, please try again later');
            }

        }catch(\Exception $e){
            return Redirect::back()->with('error',$e->getMessage());
        }
    }

    // public function initializePayment($data)
    // {

        
    // }


    public function Complete(Request $request)
    {
        
        $signatureStatus = $this->SignatureVerify(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );

        $order = Orders::find(session()->get('order_id'));
        
        // If Signature status is true We will save the payment response in our database
        if($signatureStatus == true)
        {

            $order->payment_status = 'success';
            $order->save();

            session()->forget('cart');

            // payment success page
            return redirect('order-list')->with('success', 'Order Placed Successfully.');
        }
        else{
            // payment failed page
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
