@extends('front.client.layout.front')
@section('content')

<body>
   <header class="header">
      <nav class="navbar">
         <div class="container">
            <div class="navbar__wrapper">
               <div class="navbar__logo">
                  <img src="./assets/icons/photoeditorsdk-export-removebg-preview.png" alt="" />
               </div>
               <div class="navbar__login">qeydiyyatdan keç</div>
            </div>
         </div>
      </nav>
   </header>
   <main>
      <div class="container">
         <div class="search_panel">
            <div class="container mt-5">
               <div class="row d-flex justify-content-center">
                  <div class="col-md-6">
                     <div class="card">
                        <div class="input-box">
                           <input placeholder="məhsul axtar" type="text" class="form-control" />
                           <i class="fa fa-search"></i>
                        </div>

                        <!-- <div class="results">
										<div class="list border-bottom">
											<div class="list_image">
												<img src="./assets/images/sirab.jpg" alt="" />
											</div>
											<div class="d-flex flex-column ml-3">
												<span>Client communication policy</span>
											</div>
										</div>

										<div class="list border-bottom">
											<div class="list_image">
												<img src="./assets/images/sirab.jpg" alt="" />
											</div>
											<div class="d-flex flex-column ml-3">
												<span>Major activity done</span>
											</div>
										</div>

										<div class="list border-bottom">
											<div class="list_image">
												<img src="./assets/images/sirab.jpg" alt="" />
											</div>
											<div class="d-flex flex-column ml-3">
												<span>Calling to USA Clients</span>
											</div>
										</div>

										<div class="list">
											<div class="list_image">
												<img src="./assets/images/sirab.jpg" alt="" />
											</div>
											<div class="d-flex flex-column ml-3">
												<span>Client communication policy</span>
											</div>
										</div>
									</div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <footer>
      <header class="header">
         <nav class="navbar">
            <div class="container">
               <div class="navbar__wrapper">
                  <div class="navbar__login">qeydiyyatdan keç</div>
                  <div class="navbar__logo">
                     <img src="./assets/icons/photoeditorsdk-export-removebg-preview.png" alt="" />
                  </div>
               </div>
            </div>
         </nav>
      </header>
   </footer>
</body>
@endsection