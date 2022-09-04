@extends('user.admin.admin-layout')
@section('title','Subscription Detail')
@section('content')
<div class="right_col" role="main">
  <!-- page content -->
  <div class="page-title">
    <div class="title_left">
      <h3>Subscription Detail / Cancelled</h3>
    </div>
    <div class="title_right">
      <div class="pull-right top_search">
        <div class="input-group">
          <div class="dropdown">
          <a style="cursor: pointer;" class="btn btn-success"  data-toggle="modal" data-target="#notes-modal">Notes</a>
          @if(Auth::user()->id ==1)
          <a style="cursor: pointer;" class="btn btn-primary return_darts_order_whose_payment_is_done" data-order_detail_id="{{$order_detail->id}}">Darts Returned</a>
          @endif                      
          </div>  
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
    <div class="my_box_setting">
    <div class="panel-group col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading give_panel_color"><h3>Customer Information</h3></div>
                <div class="panel-body">

                  <table class="table table-hover" style="border: 0px;">
                 <tbody>
                    <tr>
                      <th>First Name</th>
                        <td>{{ $order_detail->getUser->first_name}}</td>
                    </tr>    
                    <tr>
                      <th>Last Name</th>
                        <td>{{$order_detail->getUser->last_name}}</td>
                    </tr>  
                    <tr>
                      <th>Email</th>
                      <td>{{$order_detail->getUser->email}}</td>  
                    </tr>
                    <tr>
                      <th>1st Weight</th>
                      <td>{{$order_detail->sort_1}}</td>  
                    </tr>
                    <tr>
                      <th>2nd Weight</th>
                      <td>{{$order_detail->sort_2}}</td>  
                    </tr>
                    <tr>
                      <th>3rd Weight</th>
                      <td>{{$order_detail->sort_3}}</td>  
                    </tr>

                  {{--<tr>
                      <th>Customer Internal Reference Number </th>
                        <td>{{($order_detail->customer_internal_reference_no!=null)?$order_detail->customer_internal_reference_no:"N/A"}}</td>
                    </tr>--}}
                    <tr>
                      <th>Registered at</th>
                      <td>{{$order_detail->getUser->created_at}}</td>  
                    </tr>
                </tbody>
                </table>

                </div>
              </div>
             
            </div>
    <div class="panel-group col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading give_panel_color"><h3>Order Information</h3></div>
                <div class="panel-body">
                  <table class="table table-hover" style="border: 0px;">
                 <tbody>
                    <tr>
                      <th>Order# </th>
                        <td>{{ $order_detail->order_number}}</td>
                    </tr>
                    <tr>
                      <th>Order Note </th>
                        <td>{{($order_detail->order_note!=null)?$order_detail->order_note:"
                        N/A"}}</td>
                    </tr>   


                     <tr>
                      <th>Created at </th>
                        <td>{{ $order_detail->created_at}}</td>
                    </tr>  

                   <!--  <tr>
                      <th>Total Items</th>
                      <td>{{$order_detail->total_products}}</td>  
                   </tr>

                  <tr>
                      <th>Total Weight</th>
                      <td>{{($order_detail->total_weight != null)?$order_detail->total_weight.'lbs':'N/A'}}</td>  
                   </tr>
                  
                  <tr>
                      <th>Shipping Cost</th>
                     <td>{{($order_detail->ship_cost != null)?$order_detail->ship_cost:'N/A'}}</td>
                   </tr> -->

                   <tr>
                      <th>Sub Total</th>
                      <td>${{number_format($order_detail->sub_total,2)}}</td>  
                   </tr>
                   
                   @if($order_detail->order_type == 0) 

                   <tr>
                      <th>Discounted Total</th>
                      <td>${{number_format($order_detail->discounted_total,2)}}</td>  
                   </tr> 
                   @endif
                   @if($order_detail->coupon_code != '') 
                   <tr>
                      <th>Promo Code Discount</th>
                      <td>${{$order_detail->coupon_discount}}<br>
                        {{$order_detail->coupon_code}}</td>  
                   </tr> 
                   @endif

                  <tr>
                      <th>Total</th>
                      <td>${{$order_detail->total}}</td>  
                  </tr>

                    
                </tbody>
                </table>
                </div>
              </div>
             
            </div>
    <div class="panel-group col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading give_panel_color"><h3>Shipping Information</h3></div>
                <div class="panel-body">
                    <table class="table table-hover" style="border: 0px;">
                 <tbody>
                    
                   <tr>
                     <th>First Name </th>
                       <td>{{ $order_detail->getShippingDetail->first_name}}</td>
                   </tr> 

                   <tr>
                     <th>Last Name </th>
                       <td>{{ $order_detail->getShippingDetail->last_name}}</td>
                   </tr>
                   
                    <tr>
                      <th>Email </th>
                        <td>{{ $order_detail->getShippingDetail->email}}</td>
                    </tr>  
                   <tr>
                      <th>Town/City</th>
                      <td>{{$order_detail->getShippingDetail->city_id}}</td>  
                   </tr> 

                   <tr>
                      <th>Address Line 1</th>
                      <td>{{$order_detail->getShippingDetail->address}}</td>  
                   </tr>

                   <tr>
                      <th>Address Line 2</th>
                      <td>{{$order_detail->getShippingDetail->address_2}}</td>  
                   </tr>

                   <tr>
                      <th>Postcode</th>
                      <td>{{$order_detail->getShippingDetail->zip}}</td>  
                   </tr>

                   <tr>
                      <th>Phone</th>
                      <td>{{$order_detail->getShippingDetail->phone}}</td>  
                   </tr>
                </tbody>
                </table>
                </div>
              </div>
             
            </div>
    <div class="panel-group col-sm-4">
              <div class="panel panel-primary">
                <div class="panel-heading give_panel_color"><h3>Billing Information</h3></div>
                <div class="panel-body">
                    <table class="table table-hover" style="border: 0px;">
                 <tbody>
                    

                    <tr>
                      <th>Email </th>
                        <td>{{ @$order_detail->getBillingDetail->email}}</td>
                    </tr> 

                    <tr>
                      <th>Town/City</th>
                      <td>{{@$order_detail->getBillingDetail->city_id}}</td>  
                   </tr> 

                   <tr>
                      <th>Address Line 1</th>
                      <td>{{@$order_detail->getBillingDetail->address}}</td>  
                   </tr>

                   <tr>
                      <th>Address Line 2</th>
                      <td>{{@$order_detail->getBillingDetail->address_2}}</td>  
                   </tr>

                    <tr>
                      <th>Postcode</th>
                      <td>{{@$order_detail->getBillingDetail->zip}}</td>  
                   </tr>

                   <tr>
                      <th>Phone</th>
                      <td>{{@$order_detail->getBillingDetail->phone}}</td>  
                   </tr>
                </tbody>
                </table>
                </div>
              </div>
             
            </div>
    @if($order_detail->order_type == 0)
    <div class="panel-group col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading give_panel_color"><h3>Subscribe Item</h3></div>
        <div class="panel-body">
            <table class="table table-hover" style="border: 0px;">
         <tbody>
            <tr>
              <th>Package </th>
                <td>{{$order_product->getPackage->darts_set}} SETS/Month</td>
            </tr>    
            <tr>
              <th>Unit Price</th>
              @php 
              $unit_price = $order_product->s_i_sub_total/$order_product->total_qty;
              @endphp
              <td>£{{number_format($unit_price, 2)}}</td>  
            </tr>

           <tr>
              <th>Sub Total</th>
              <td>£{{ number_format($order_product->s_i_sub_total, 2) }}</td>  
           </tr>

           <!-- <tr>
              <th>Discount Percent</th>
              <td>{{$order_product->discount_percent}}%</td>  
           </tr>

           <tr>
              <th>Discounted Total</th>
              <td>£{{ number_format($order_product->s_i_d_t, 2) }}</td>  
           </tr> -->                  
            
        </tbody>
        </table>
        </div>
      </div>
    </div>
    @endif

    @if($order_detail->payment_type_id == 4)   
    <div class="panel-group col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading give_panel_color"><h3>Paypal Details</h3></div>
        <div class="panel-body">
            <table class="table table-hover" style="border: 0px;">
         <tbody>
            

            <tr>
              <th>Customer Profile Id </th>
                <td>{{-- $order_detail->getAuthorizeProfile->customer_profile_id--}}</td>
            </tr>    

            <tr>
              <th>Payment Profile Id</th>
              <td>{{--$order_detail->getAuthorizeProfile->payment_profile_id--}}</td>  
           </tr>

           <tr>
              <th>Transaction Id</th>
              <td>{{--$order_detail->getAuthorizeProfile->getAuthorizeTranscationDetail->charge_customer_profile_transaction_id--}}</td>  
           </tr>

          
            
        </tbody>
        </table>
        </div>
      </div>
     
    </div>
    @endif 

    @if($order_detail->payment_type_id == 5)   
    <div class="panel-group col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading give_panel_color"><h3>Stripe Details</h3></div>
        <div class="panel-body">
            <table class="table table-hover" style="border: 0px;">
         <tbody>
            

            <tr>
              <th>Stripe ID </th>
                <td>{{$order_detail->stripe_id}}</td>
            </tr>    

            <tr>
              <th>Stripe Status</th>
              <td>{{$order_detail->stripe_status}}</td>  
           </tr>

           <tr>
              <th>Stripe Plan</th>
              <td>{{$order_detail->stripe_plan}}</td>  
           </tr>

          
            
        </tbody>
        </table>
        </div>
      </div>
     
    </div>
    @endif 

    </div>
    @if($order_detail->order_type == 0)
    <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Shipped Darts</h2>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Weight</th>
                      <th>Weight Range</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Ship Darts Date</th>
                      <th>Return Darts Date</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if(count($product_to_customers)>0)
                   @foreach($product_to_customers as $product_to_customer)
                    <tr>
                      <td>{{$product_to_customer->getProduct->product_name}}</td>
                      <td>{{$product_to_customer->getProduct->product_weight}}</td>
                      <td>{{$product_to_customer->getProduct->product_weight_range}}</td>
                      <td style="width:300px">
                        @php
                        $price = '';
                        if($product_to_customer->getProduct->product_price_type == "for_sale")
                        {
                          $price='£'.$product_to_customer->getProduct->product_price;
                        } 
                        elseif ($product_to_customer->getProduct->product_price_type == "not_for_sale") 
                        {
                          $price='Not For Sale';
                        } 
                        @endphp
                        {{$price}}
                      </td>
                      <td>{!! $product_to_customer->getProduct->product_description !!}</td>
                      <td><a href="{{url('public/uploads/darts_img/'.$product_to_customer->getProduct->product_image)}}"><img src="{{url('public/uploads/darts_img/'.$product_to_customer->getProduct->product_image)}}" height="100px" width="100px"></a></td>
                      <td>{{$product_to_customer->status}}</td>
                      <td>{{$product_to_customer->created_at}}</td>
                      <td>{{$product_to_customer->returned_at}}</td>
                    </tr>
                  @endforeach  
                  @endif                         
                 
                  </tbody>
                </table>

              </div>

            </div>
          </div>
    @endif      
  </div>

  {{-- Note Modal Starts  --}}
    <div class="modal fade" id="notes-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notes</h4>
        </div>
        <div class="modal-body">
            

             <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Note#</th>
                    <th width="80%">Note Description</th>
                    <th>Date</th>
                    
                    <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody id="order_note_table">
               
                  

              
                  @if(count($order_notes) > 0)
                     
                       @php
                         $note_counter=1;
                         
                       @endphp
                     

                      @foreach($order_notes as $order_note)
                        
                        <tr>
                          <td>{{$note_counter}}</td>
                          <td>{{$order_note['note_description']}}</td>
                          <td>{{$order_note['note_reminder_date']}}</td>
                          
                          <td><a class="delete-order-note" data-order_note_id="{{$order_note['id']}}" href="#" ><i class="fa fa-trash"></i></a></td>
                        </tr>
                  

                        @php
                          $note_counter++;
                        @endphp
                      @endforeach
                  
                  @endif
            
                 
                 
                </tbody>
              </table>

             
    <div id="div_note">
     {{--  <form action="{{url('admin/customer-notes')}}" method="post">
                   
              {{csrf_field()}}
              
              <input type="hidden" name="user_id" value="{{$details->u_id}}">
            

              <div class="form-group">
                <label for="tracking number">Message</label>
                <textarea  name="message_body" id="message_body"  required="required" class="form-control col-md-7 col-xs-12"></textarea>  
              </div>
              <button type="submit" class="btn btn-success">Send Message</button>
      </form> --}}
    </div>
    <a id="add_more_note" href="#" class="btn btn-success" data-user_id="">Add New Note</a> 

        </div>
        <br>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
  {{-- Notes Modal Ended --}}

  {{-- Modal Starts  --}}
    <div class="modal fade" id="send-message-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action="{{url('admin/send-message-to-customer')}}" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Message</h4>
        </div>
        <div class="modal-body">
           
                
              {{csrf_field()}}
              
              <input type="hidden" name="user_id" value="{{$order_detail->user_id}}">
              <input type="hidden" name="redirect_page" value="ok">
              

              <div class="form-group">
                <label for="tracking number">Message</label>
                <textarea  name="message_body" id="message_body"  required="required" class="form-control col-md-7 col-xs-12">Order#: {{$order_detail->order_number}}</textarea>  
              </div>


        </div>
        <br>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Send Message</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  {{-- Modal Ended --}}

  {{-- Loader Modal --}}
    <div class="modal fade" id="loader_modal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <h3 style="text-align:center;">Please wait</h3>
            <p style="text-align:center;"><img src="{{url('public/uploads/gif/waiting.gif')}}"></p>
          </div>
        </div>
      </div>
    </div>
  {{-- Loade Modal end --}}   
<!-- footer content -->
@include('user.admin.footer')
<!-- /footer content -->
</div>
<!-- /page content -->
@endsection
@section('my_javascript')
 <script>
$(document).ready(function(){
  $("#add_more_note").on('click',function(){

    var html_string='<form action="{{url('admin/add-order-note')}}" method="post" id="add_order_note_form">'+
      '{{csrf_field()}}'+
      ' <input type="hidden" name="order_id" value="{{$order_detail->id}}">'+
      ' <div class="form-group">'+
      '  <label for="Note Description">Enter Note Description</label>'+
      ' <textarea  name="note_description" id="note_description"  required="required" class="form-control col-md-7 col-xs-12"></textarea>'+
      ' </div>'+
      ' <div class="form-group">'+
      ' <label for="Note Reminder Date">Enter Note Reminder Date</label>'+
      ' <input type="text" name="note_reminder_date" id="note_reminder_date" class="form-control col-md-7 col-xs-12" value="{{date('Y-m-d')}}">'+
      ' </div>'+
        '<button class="btn btn-primary" id="save_order_note">Save Note</button>'+
        '</form>';

      $("#div_note").append(html_string);  

      $("#add_more_note").hide();

  });
  $(document).on('click','#save_order_note',function(e){
    e.preventDefault();
    if($("#note_description").val()=="" || $("#note_reminder_date").val() ==""){
      alert("Fileds are required");
      return false;
    }
    // return false;  
    // alert("click");
    // return false;
    $.ajax({
      url:'{{url("admin/add-order-note")}}',
      method:"post",
      dataType:"json",
      data:$("#add_order_note_form").serialize(),
      success:function(data){
        
        var html_string='<tr>'+
                         ' <td>'+data.count_rows+'</td>'+
                         ' <td>'+data.note_description+'</td>'+
                         ' <td>'+data.note_reminder_date+'</td>'+
                         ' <td><a class="delete-order-note" href="#" data-order_note_id="'+data.order_note_id+'"><i class="fa fa-trash"></i></a></td>'+
                         ' </tr>';
        
        // $("#no_order_note").hide();
        $("#order_note_table").append(html_string); 
        $("#note_description").val('');  



      },
      error:function(){

        alert("Error");
      }

    });
  });
  $(document).on('click','.delete-order-note',function(e){
   var order_note_id=$(this).data("order_note_id");
   var hide_row=$(this).parent().parent();
   
   swal({
    title: "Are you sure?",
    text: "Your note will be deleted!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
  
  $.ajax({
    
    url:"{{url('admin/delete-order-note')}}",
    method:"get",
    dataType:"json",
    data:{order_note_id:order_note_id},
    success:function(data){
      if(data=="ok"){
        hide_row.fadeOut(1000);
        swal.close();
        
        
      }
      else
      {
        alert("something went wrong");
      }
    },
    error:function(){
      alert("Error");
    }


  }); //ajax

 });
}); 
});      
</script>
@endsection