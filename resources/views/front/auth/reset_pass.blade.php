@extends('front.auth.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form action="{{route('front.auth.reset_pass_open_reset')}}" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-49">
               {{__('form.reset_account')}}
            </span>
            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100">{{__('form.email')}}</span>
               <input class="input100" type="text" name="email" placeholder="{{__('form.type_email')}}">
            </div>
            @success_message
            @error_message
            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn">
                     Daxil ol
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