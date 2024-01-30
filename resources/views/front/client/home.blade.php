@extends('front.client.layout.front')
@section('content')
<body>
   <main>
      <div class="container">
         <div class="search_panel">
            <div class="container mt-5">
               <div class="row d-flex justify-content-center">
                  <div class="col-md-6">
                     <div class="card">
                        <form style="display: flex; column-gap: 10px" class="input-box searchProduct">
                           <input name="q" placeholder="məhsul axtar" type="text" class="form-control search_form" />
                           <button style="width: 100px;" class="btn btn-success">axtar</button>
                        </form>
                        <div class="results">
                           <!-- <div class="list border-bottom">
                              <div class="list_image">
                                 <img src="./assets/images/sirab.jpg" alt="" />
                              </div>
                              <div class="d-flex flex-column ml-3">
                                 <span>Client communication policy</span>
                              </div>
                           </div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
</body>
@endsection