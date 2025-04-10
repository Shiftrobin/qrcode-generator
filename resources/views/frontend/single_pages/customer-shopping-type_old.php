@extends('frontend.layouts.master')
@section('content')

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Shopping Type</a></li>
             </ul>
         </div>
     </div>
     <section class="section--about ps-page--business">
         <div class="container">
              <div class="row">
                @if(Session::get('shopping_type_msg'))
                <div class="col-sm-12">
                    <div class="alert alert-primary alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong style="color: red;">{{Session::get('shopping_type_msg')}}</strong>
                    </div>
                </div>
                @endif
                <div style="margin-top:30px;"  class="col-sm-3">
                   <ul class="prof">
                        <li class="{{(@$customer_account_title=='profile_title')?'active_account':''}}"><a href="{{route('dashboard')}}">My Profile</a></li>
                        <li class="{{(@$customer_account_title=='shopping_type_title')?'active_account':''}}"><a href="{{route('customer.shopping_type')}}">Shopping Type</a></li>
                        <li class="{{(@$customer_account_title=='password_change_title')?'active_account':''}}"><a href="{{route('customer.passowrd.change')}}">Password Change</a></li>
                        <li class="{{(@$customer_account_title=='order_list_title')?'active_account':''}}"><a href="{{route('customer.order.list')}}">Order List</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div style="margin-top:30px;" class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route('customer.shopping_type.store')}}" id="checkoutForm">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 form-group--block">
                                        <label for="current_password">Shopping Type <span style="color:red;font-weight: bold;">*</span></label>
                                        <select name="sale_type_id" class="sale_type_id form-control" style="font-size:17px">
                                            <option value="">Select Type</option>
                                            @foreach($sale_types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <font style="color:red;font-weight:bold;">{{($errors->has('sale_type_id'))?($errors->first('sale_type_id')):''}}</font>
                                </div>
                                <div class="form-row collection_type" style="display:none;">
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Collection Date <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="collection_date" id="datepicker" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Collection Time <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="collection_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row delivery_type" style="display:none">
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Delivery Date <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="dalivery_date" class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group--block">
                                        <label for="new_password">Delivery Time <span style="color:red;font-weight: bold;">*</span></label>
                                        <input type="text" name="dalivery_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 form-group--block" style="padding-top:15px;">
                                        <button type="submit" class="custom_btn" style="border:1px solid;">Continue Shopping</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </section>
 </main>

<script type="text/javascript">
    $(document).ready(function(){
        //Paid amount
        $(document).on('change','.sale_type_id',function(){
            var sale_type_id = $(this).val();
            if(sale_type_id == '1'){
                $('.collection_type').show();
            }else{
                $('.collection_type').hide();
            }

            if(sale_type_id == '2'){
                $('.delivery_type').show();
            }else{
                $('.delivery_type').hide();
            }
        });
    });
</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
<script type="text/javascript">
    $(function () {
        Date.prototype.ddmmyyyy = function () {
            var dd = this.getDate().toString();
            var mm = (this.getMonth() + 1).toString();
            var yyyy = this.getFullYear().toString();
            return (dd[1] ? dd : "0" + dd[0]) + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + yyyy;
        };
        $("#datepicker").datepicker({ dateFormat: "dd-mm-yy" });
        $("#datepicker").on('change', function () {
            var selectedDate = $(this).val();
            var todaysDate = new Date().ddmmyyyy();
            if (selectedDate <todaysDate) {
                alert('Selected date must be greater than today date');
                $(this).val('');
            }
        });
    });            
</script>

 <script type="text/javascript">
    $(document).ready(function () {
        $('#checkoutForm').validate({
            rules: {
                sale_type_id: {
                    required: true,
                }
            },
            messages: {
                sale_type_id : {
                    required : 'Please select sale type',
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection