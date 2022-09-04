@extends('user.admin.admin-layout')
@section('title','Shipped Orders')
@section('content')
 	<div class="right_col" role="main">
      <!-- page content -->
 		 <div class="page-title">
            <div class="title_left">
              <h3>Shipped Orders</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          @if(Session::has('successmessage'))
                <div class="alert alert-success alert-dismissable">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
               {{Session::get('successmessage')}}
                </div>
            @endif
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Orders</h2>                       
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Customer Name</th>
                              <th>Customer Email</th>
                              <th>Order Number</th>
                              <th>Package Type</th>
                              <th>Payment Type</th>
                              <th>Payment</th>
                              <th>Created At</th>
                              <th>Action</th>                              
                            </tr>
                          </thead>
                          <tbody>
                           @if(count($order_details)>0)
                           @foreach($order_details as $order_detail)
                            <tr>
                              <td>{{@$order_detail->getUser->first_name." ".@$order_detail->getUser->last_name }}</td>
                              <td>{{@$order_detail->getUser->email}}</td>
                              <td>{{@$order_detail->order_number}}</td>
                              <td>{{@$order_detail->getProductDetail->getPackage->darts_set}} SETS/Month</td>
                              <td>{{@$order_detail->getPaymentType->name}}</td>
                              <td>{{($order_detail->payment_status == 1)?"Done":"Pending"}}</td>
                              <td>{{@$order_detail->created_at}}</td>
                              <td>
                              <a href="{{url('admin/order/'.$order_detail->id.'/detail/shipped')}}" class=""><i class="fa fa-eye"></i></a>                             
                              </td>  
                            </tr>
                          @endforeach  
                          @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>            
          </div>
         <!-- footer content -->
        @include('user.admin.footer')
        <!-- /footer content -->
      </div>
      <!-- /page content -->
@endsection