   <header class="header">
       <nav class="navbar">
           <div class="container">
               <div class="navbar__wrapper">
                   <a href="{{route('front.client.home')}}" class="navbar__logo">
                       <img src="{{asset('assets/icons/photoeditorsdk-export-removebg-preview.png')}}" alt="" />
                   </a>
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