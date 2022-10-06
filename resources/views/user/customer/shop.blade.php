@extends('user.customer.customer-layout')
@section('title','Shop')
@section('content')
{{-- Header Content --}}
@include('user.customer.header-customer')
{{-- Header Content End  --}}
<div class="container" style="margin-top:20px;margin-bottom:20px;">
  <div class="row">
    <div class="col-xs-12 badges-form-col">
      <form class="badges-form" action="{{ url('cart')}}" method="post">
        <!-- fieldset 1 start from here -->
          <fieldset id="fieldset-1">
          {{csrf_field()}}
          <div class="row bs-wizard" style="border-bottom:0;">
              <div class="col-xs-4 step-col complete active">
                <div class="text-center stepnumber">Step 1</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>              
              </div>
              <div class="col-xs-4 step-col disabled"><!-- complete -->
                <div class="text-center stepnumber">Step 2</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>
                </div>
              <div class="col-xs-4 step-col disabled"><!-- active -->
                <div class="text-center stepnumber">Step 3</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>
                 </div>
            </div>
          
            <h1 class="badges-title text-center">How many sets would you like a month?</h1>
            <div class="row badges-row">
              
              <div class="col-xs-12 badges-sizes text-center">

                  @if(count($packages)>0)
                  @php
                    $i=1;
                  @endphp
                  @foreach($packages as $package)  
                  
                    @php
                    $array = explode('.', $package->price);
                    $give_active_class = '';
                    /* if($i ==1){
                      $give_active_class="active-img";
                    }
                    else{
                      $give_active_class="";
                    }   */ 
                    @endphp

          <div class="col-md-6 col-sm-12 package" data-package_id="{{$package->id}}">
            <div class="single-price">
              <div class="price-header">
                <div class="col-xs-6">
                <h3 class="title">{{$package->darts_set}} SETS</h3>
                </div>
                <div class="col-xs-6">
                  @php
                  for($set = 1;$set <= $package->darts_set; $set ++)
                  {
                  @endphp
                  <img src="{{url('public/uploads/bottle.png')}}" alt="selected badge" class="bottle-img">
                  @php
                  }
                  @endphp
              </div>
              </div>
              <div class="price-value">
                <div class="value">
                  <span class="currency">£</span> <span class="amount">
                    {{$array[0]}}.<span>{{$array[1]}}</span></span> <span class="month">/month</span>
                </div>
              </div>
              <ul class="deals">
                {!!$package->description!!}
              </ul>
            </div>
          </div>
                  @php
                    $i++;
                  @endphp
                  @endforeach
                  @endif
              </div>
            </div>
            <input type="hidden" name="package_id" id="package_id" value="">
            <div class="form-btn-group text-center">
              <button type="button" class="btn btn-next pull-right">Next &raquo;</button>
            </div>
          </fieldset>
        <!-- fieldset 1 end from here -->
      
        <!-- fieldset 2 start from here -->  
          <fieldset id="fieldset-2">        
          <div class="row bs-wizard" style="border-bottom:0;">
              <div class="col-xs-4 step-col complete">
                <div class="text-center stepnumber">Step 1</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>
                </div>
              <div class="col-xs-4 step-col complete active"><!-- complete -->
                <div class="text-center stepnumber">Step 2</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>
                </div>
              <div class="col-xs-4 step-col disabled"><!-- active -->
                <div class="text-center stepnumber">Step 3</div>
                <div class="progress-line">
                <div class="progress">
                  <div class="progress-bar"></div>
                </div>
                <a href="#" class="step-dot"></a> 
                </div>
                 </div>
            </div>
          
          <div class="form-btn-group text-center text-center">
              <button type="button" class="btn btn-previous pull-left">&laquo; Previous</button>
              <button type="submit" class="btn pull-right">Next &raquo;</button>
          </div>
            <h1 class="badges-title text-center">Which weights are you most interested in?</h1>
            <h3 class="text-center">(Choose in your order of preference.)</h3>
            <!-- <h3 class="text-center">Please choose your preferred weights before clicking next</h3> -->
            <div class="row badges-row">
              <div class="col-md-8 col-sm-8 col-xs-7 badges-color">

                <div class="col-md-4 col-sm-12 weight" data-weight_id="Light">
                  <div class="single-weight">
                  <div class="price-header"><h3 class="title"></h3></div>
                  <div class="price-value">
                    <div class="value">
                      <span class="amount" >Light</span> <span class="month">12-18g</span>
                    </div>
                  </div>
                  <ul class="deals"></ul>
                </div>
                </div>
                <div class="col-md-4 col-sm-12 weight" data-weight_id="Medium">
                  <div class="single-weight">
                  <div class="price-header"><h3 class="title"></h3></div>
                  <div class="price-value">
                    <div class="value">
                      <span class="amount">Medium</span> <span class="month">19-22g</span>
                    </div>
                  </div>
                  <ul class="deals"></ul>
                </div>
                </div>
                <div class="col-md-4 col-sm-12 weight" data-weight_id="Heavy">
                  <div class="single-weight">
                  <div class="price-header"><h3 class="title"></h3></div>
                  <div class="price-value">
                    <div class="value">
                      <span class="amount">Heavy</span> <span class="month">23g+</span>
                    </div>
                  </div>
                  <ul class="deals"></ul>
                </div>
                </div>
                <div class="col-md-12 col-sm-12">
            <div class="form-btn-group text-center text-center">
               <div class="col-md-3 col-sm-3">
            <button type="button" class="btn btn-choose_againg pull-left ">Choose Again</button>
          </div>
             <div class="col-md-9 col-sm-9">
            <h4 class="text-center validate_next" style="text-align:left;">Please choose your preferred weights before clicking next.</h4>
          </div>
          </div>
        </div>

              </div>

              <div class="col-md-4 col-sm-4 col-xs-5 selected-row color-badge">
            
                <div class="single-weight" id="package_preview" style="cursor: default;">
                  <div class="price-header">
                <div class="col-xs-6">
                <h3 class="title">2 SETS</h3>
                </div>
                <div class="col-xs-6">
                  <img src="{{url('public/uploads/bottle.png')}}" alt="selected badge" class="bottle-img">
                </div>
              </div>
                  <div class="price-value">
                <div class="value">
                  <span class="currency">£</span> <span class="amount">
                    14.<span>99</span></span> <span class="month">/month</span>
                </div>
              </div>
                  <ul class="deals">{!!$package->description!!}</ul>
                </div>
            
              </div>
            
              <input type="hidden" name="sort_1" id="sort_1" value=""> 
              <input type="hidden" name="sort_2"  id="sort_2" value="">
              <input type="hidden" name="sort_3" id="sort_3" value=""> 
            </div>
            <div class="form-btn-group text-center text-center">
              <button type="button" class="btn btn-previous pull-left">&laquo; previous</button>
              <button type="submit" class="btn pull-right">Next &raquo;</button>
            </div>
          </fieldset>
        <!-- fieldset 2 end from here -->
      </form>
    </div>
  </div>
</div>
{{-- Footer Content --}}
@include('user.customer.footer-customer')
{{-- Footer Content End  --}}
@endsection
@section('javascript')
 <script src="{{asset('assets/customer/assets/js/customform.js')}}"></script>
@endsection