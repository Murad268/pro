@extends('front.layout.front')
@section('content')
<div class="limiter">
   <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
         <form class="login100-form validate-form">
            <span class="login100-form-title p-b-49">
               hesaba daxil ol
            </span>

            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
               <span class="label-input100">İstifadəçi adı</span>
               <input class="input100" type="text" name="username" placeholder="Type your username">
               <span class="focus-input100" data-symbol="&#xf206;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
               <span class="label-input100">Şifrə</span>
               <input class="input100" type="password" name="pass" placeholder="Type your password">
               <span class="focus-input100" data-symbol="&#xf190;"></span>
            </div>

            <div class="text-right p-t-8 p-b-31">
               <a href="#">
                  Şifrəni unutmusan?
               </a>
            </div>

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