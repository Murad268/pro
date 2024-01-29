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
               @guest
               <div class="navbar__login">{{__('site.register')}}</div>
               @endguest
               @auth
               <div style="display:  flex; align-items: center; column-gap: 10px">
                  <div class="navbar__login">{{auth()->user()->username}}</div>
                  <a style="display: bloack;" href="{{route('front.client.logout')}}">{{__('site.logout')}}</a>
               </div>
               @endauth
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
   <footer>
      <header class="header">
         <nav class="navbar">
            <div class="container">
               <div class="navbar__wrapper">
                  @guest
                  <div class="navbar__login">{{__('site.register')}}</div>
                  @endguest
                  @auth
                  <div style="display:  flex; align-items: center; column-gap: 10px">
                     <div class="navbar__login">{{auth()->user()->username}}</div>
                     <a style="display: bloack;" href="{{route('front.client.logout')}}">{{__('site.logout')}}</a>
                  </div>
                  @endauth
                  <div class="navbar__logo">
                     <img src="./assets/icons/photoeditorsdk-export-removebg-preview.png" alt="" />
                  </div>
               </div>
            </div>
         </nav>
      </header>
   </footer>
</body>

<script>
   // Assuming you have a configuration object
   const config = {
      APP_URL: "http://127.0.0.1:8000",
   };
   async function getDatas(url) {
      const res = await fetch(url)
      return await res.json()
   }
   document.querySelector('.searchProduct').addEventListener('submit', (e) => {
      e.preventDefault();
      const url = config.APP_URL;
      let value = document.querySelector('.search_form').value
      const wrapper = document.querySelector('.results')
      const lang = document.querySelector('.title').getAttribute('data-lang')
      getDatas(url + "/getProducts/" + value).then(res => {

         res.forEach(data => {
            console.log(data.image)

            let element = `
               <div class="list border-bottom">
                  <div class="list_image">
                     <img src="{{ asset('storage/${data.image}') }}" alt="" />
                  </div>
                  <div class="d-flex flex-column ml-3">
                     <span>${data.name[lang]}</span>
                  </div>
               </div>
            `;
            wrapper.insertAdjacentHTML('beforeend', element)
         })
      })
   });
</script>
@endsection