@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">User Last Name</a></li>
            </ul>
        </div>
    </div>
    <section class="section--login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img src="{{asset('public/frontend')}}/img/verify.png" width="100%" alt="">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="login__box">
                        <div class="login__header">
                            <h3 class="login__login">User Last Name</h3>
                        </div>
                        <form method="GET" action="{{route('check.name')}}" id="resetEmail">
                            @csrf
                            <div class="login__content">
                                <div class="login__label">User Last Name <br>
                                    @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      @foreach($errors->all() as $error)
                                      <strong>{{$error}}</strong><br/>
                                      @endforeach
                                    </div>
                                    @endif
                                    @if(Session::get('message'))
                                    <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      <strong>{{Session::get('message')}}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="last_name" value="{{$last_name}}" style="font-size:17px">
                                </div>
                                <button type="submit" class="btn btn-login" type="submit">Continue</button>
                                <p><a href="{{route('customer.login')}}">Login Page</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>

<script type="text/javascript">
    $(document).ready(function () {
        $('#resetEmail').validate({
            errorClass:'text-danger',
            validClass:'text-success',
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                code : {
                    required : true
                }
            },
            messages: {
                email : {
                    required : 'Please enter email address',
                    email : 'Please enter a <em>valid</em> email address',
                },
                code : {
                    required : 'Please enter verification code',
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