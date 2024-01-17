@extends('front.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form action="{{route('front.auth.reset_pass_open_reset')}}" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-49">
               hesab bərpası
            </span>
            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100">Email</span>
               <input class="input100" type="text" name="email" placeholder="Type your email">
               <span class="focus-input100" data-symbol="&#xf206;"></span>
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
                  hesabın yoxdursa
               </span>

               <a href="#" class="txt2">
                  qeydiyyat keç
               </a>
            </div>
         </form>
      </div>
   </div>
</div>
<div id="dropDownSelect1"></div>
@endsection