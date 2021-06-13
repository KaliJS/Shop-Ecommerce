
<button id="rzp-button1" hidden>Pay</button>  
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

    var options = {
        "key": "{{$response['razorpayId']}}", 
        "amount": "{{$response['amount']}}", 
        "currency": "{{$response['currency']}}",
        "name": "{{$response['name']}}",
        "image": "https://example.com/your_logo", // You can give your logo url
        "order_id": "{{$response['orderId']}}", 
        "handler": function (response){
            
            document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
            document.getElementById('rzp_orderid').value = response.razorpay_order_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;

            // // Let's submit the form automatically
            document.getElementById('rzp-paymentresponse').click();
        },
        "prefill": {
            "name": "{{$response['name']}}",
            "email": "{{$response['email']}}",
            "contact": "{{$response['phone']}}",
        },
        "notes": {
            "address": "{{$response['address']}}",
            "pincode": "{{$response['pincode']}}"
        },
        "theme": {
            "color": "#00D7DF"
        }
    };

    var rzp1 = new Razorpay(options);
    window.onload = function(){
        document.getElementById('rzp-button1').click();
    };

    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }

</script>

<!-- This form is hidden -->
<form action="{{url('/payment-complete')}}" method="POST" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form>