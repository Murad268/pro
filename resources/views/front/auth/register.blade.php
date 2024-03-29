@extends('front.auth.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg')">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form action="{{route('front.auth.signup')}}" method="post" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title p-b-49"> {{__('form.register')}} </span>
            <div class="wrap-input100 validate-input m-b-23">
               <span class="label-input100">İstifadəçi adı</span>
               <input class="input100" type="text" value="{{old('username')}}" name="username" placeholder="{{__('form.type_username')}}" />
               @error_input('username')
            </div>
            <div class="wrap-input100 validate-input m-b-23">
               <span class="label-input100">Elektron poçt</span>
               <input class="input100" type="email" value="{{old('email')}}" name="email" placeholder="{{__('form.type_email')}}" />
               @error_input('email')
            </div>
            <div class="wrap-input100 validate-input">
               <span class="label-input100">Şifrə</span>
               <input class="input100" type="password" value="{{old('password')}}" name="password" placeholder="{{__('form.type_password')}}" />
               @error_input('password')
            </div>
            <div class="wrap-input100 validate-input">
               <span class="label-input100">Şifrəni təkrar daxil edin</span>
               <input class="input100" type="password" value="{{old('passwordRepeat')}}" name="passwordRepeat" placeholder="{{__('form.type_same_password')}}" />
               @error_input('passwordRepeat')
            </div>
            <div class="text-right p-t-8 p-b-31">
               <a href="{{route('front.auth.reset_pass_email')}}">
                  {{__('form.forget_password')}}
               </a>
            </div>

            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn">{{__('form.register')}}</button>
               </div>
            </div>

            <div class="flex-col-c p-t-35">
               <span class="txt1 p-b-17">{{__('form.if_acc_have')}} </span>

               <a href="#" class="txt2">{{__('form.login')}} </a>
            </div>
         </form>
      </div>
   </div>
</div>

<div id="dropDownSelect1"></div>
@endsection