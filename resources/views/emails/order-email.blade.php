@extends('emails.email-layout')
@section('content')

	 <tr>
      <td bgcolor="#ffffff" style="padding: 40px 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 140%; color: #555555; width:100%; max-width:600px;"><p style="margin: 0;"> <strong>Hi {{$firstname}} {{$lastname}},</strong><br>


	<p>You have successfully subscribed to dartsinabottle.com</p>

	<p>Your order reference number is <strong>{{$order_number}}</strong> and a confirmation email has been sent to  <strong>{{$firstname}} {{$lastname}}.</strong></p>

	<p>We will now send you a self-addressed stamped envelope. When it arrives please pop your barrels in the bottle and return it to us. Your barrels will then be viewable in the ‘My darts’ section of the website, and your darts in a bottle will be on their way! </p>

    <p>Details are below.</p>

    <h3>Shipping Details</h3>
    <hr>
    <p><strong>Shipping Email:</strong> {{$shipping_email}}</p>
    <p><strong>Shipping Address Line 1:</strong> {{$shipping_address}}</p>
    <p><strong>Shipping Address Line 2:</strong> {{$shipping_address_2}}</p>
    <p><strong>Shipping Town/City:</strong> {{$shipping_city}}</p>
    <p><strong>Shipping Postcode:</strong> {{$shipping_zip}}</p>
    <p><strong>Shipping Phone:</strong> {{$shipping_phone}}</p>
    

    <h3>Billing Details</h3>
    <hr>
    <p><strong>Billing Email:</strong> {{$billing_detail->email}}</p>
    <p><strong>Billing Address Line 1:</strong> {{$billing_detail->address}}</p>
    <p><strong>Billing Address Line 2:</strong> {{$billing_detail->address_2}}</p>
    <p><strong>Billing Town/City:</strong> {{@$billing_detail->city_id}}</p>
    <p><strong>Billing Postcode:</strong> {{$billing_detail->zip}}</p>
    <p><strong>Billing Phone:</strong> {{$billing_detail->phone}}</p>

	<h3>Package Details</h3>
	<hr>
	@foreach($email_products_array as $result)
	<p><strong>Package:</strong> {{$result['package_id']}}</p>
	<p><strong>1st Weight:</strong> {{$sort_1}}</p>
	<p><strong>2nd Weight:</strong> {{$sort_2}}</p>
	<p><strong>3rd Weight:</strong> {{$sort_3}}</p>
	{{--<p><strong>Original Total:</strong> £{{number_format($result['product_original_total'],2)}}</p>
	<p><strong>Discounted Total:</strong> £{{number_format($result['product_discounted_total'],2)}}</p>--}}
	<hr>
	@endforeach

	<h3>Payment Type</h3>
	<p>{{$payment_type}}</p>

	<h3>Your Bill</h3>
	<p><strong>Sub Total:</strong> £{{number_format($discounted_total,2)}}</p>
	<p><strong>Deposit + Handling Fee:</strong> £{{number_format($oneTimeFee,2)}}</p>
	<p><strong>Total:</strong> £{{number_format($discounted_total+$oneTimeFee,2)}}</p>
@endsection