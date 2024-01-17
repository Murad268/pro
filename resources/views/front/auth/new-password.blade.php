@extends('front.auth.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form action="{{route('front.auth.add_new_password')}}" method="post" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-49">
               {{__('form.reset_account')}}
            </span>
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="code" value="{{$code}}">

            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100">{{__('form.password')}}</span>
               <input class="input100" type="text" name="password" placeholder="{{__('form.type_newpassword')}}">
               @error_input('password')
            </div>
            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100">{{__('form.type_password')}}</span>
               <input class="input100" type="text" name="repassword" placeholder="{{__('form.type_renewpassword')}}">

               @error_input('repassword')
            </div>
            @success_message
            @error_message
            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn">
                     {{__('form.login')}}
                  </button>
               </div>
            </div>

         </form>
      </div>
   </div>
</div>
<div id="dropDownSelect1"></div>
@endsection