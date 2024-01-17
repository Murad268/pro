@extends('front.auth.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form action="{{route('front.auth.signin')}}" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-49">
               {{__('form.enter_account')}}
            </span>
            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100"> {{__('form.username')}}</span>
               <input class="input100" type="text" name="username" placeholder="{{__('form.type_username')}}">
               <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
               <span class="label-input100"> {{__('form.password')}}</span>
               <input class="input100" type="password" name="password" placeholder="{{__('form.type_password')}}">
               <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>
            @success_message
            @error_message
            <div class="text-right p-t-8 p-b-31">
               <a href="{{route('front.auth.reset_pass_email')}}">
                  {{__('form.forget_password')}}
               </a>
            </div>

            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn">
                     {{__('form.login')}}
                  </button>
               </div>
            </div>
            <div class="flex-col-c p-t-35">
               <span class="txt1 p-b-17">
                  {{__('form.if_acc_not')}}
               </span>

               <a href="{{route('front.auth.register')}}" class="txt2">
                  {{__('form.register')}}
               </a>
            </div>
         </form>
      </div>
   </div>
</div>


<div id="dropDownSelect1"></div>
@endsection