@extends('user.customer.customer-layout')
@section('title','Thankyou')
@section('content')
{{-- Header Content --}}
@include('user.customer.header-customer')
{{-- Header Content End  --}}
<!--lend + deposit customers   -->
<div class="wrapper">
<div class="container" style="margin-top:5%;">
  <div class="row">
        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
            <h2 class="text-center">Thank you for placing an order.</h2>
            <center>
              <div class="btn-group" style="margin-top:50px;">
                <a href="{{url('dashboard')}}" class=" btn-lg btn-primary">My Darts</a>
              </div>
              <div class="btn-group" style="margin-top:50px;">
                <a href="{{url('/')}}" class=" btn-lg btn-default">Return to Homepage</a>
            </div>
          </center>
              <div class="btn-group" style="margin-top:50px;">
              <p>Thank you for subscribing to dartsinabottle<br>
A confirmation email has been sent to {{@$subscription->getUser->email}}<br>
Your order number is {{@$subscription->order_number}}<br>
 In a few days, you will receive an envelope and bottle to send your darts in.<br>
              Once we have received your barrels, you will be notified by email.<br> 
You may then log in and choose your first set from the ‘Browse’ page.<br>
Please check the F.A.Q if you have any more queries or email us at customerservice@dartsinabottle.com
            </p>
            </div> 
            

        </div>
  </div>
</div>
{{-- Footer Content --}}
@include('user.customer.footer-customer')
{{-- Footer Content End  --}}
@endsection
@section('javascript')
@endsection