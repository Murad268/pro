@extends('front.client.layout.front')
@section('content')

<body>

   <main>
      <div class="container text-center">
         <div class="row">
            <div class="col">
               <a href="{{route('front.client.home')}}" class="home_page_btn btn btn-success"> <span><i class="fa-solid fa-arrow-left"></i></span> Home Page</a>
               <div class="img_block">
                  @if($product->image)
                  <img style="width: 120px;" src="{{GetImage('storage/'.$product->image)}}" alt="">
                  @endif
               </div>
            </div>
            <div class="col">
               <h3>{{$product->name}}</h3>
               <p>{!! $product->desc !!}</p>
               <div style="display: flex; column-gap: 6px">
                  <form style="display: flex; column-gap: 5px" class="select2_form" action="{{route('front.product_info.for_shops', ['slug' => $slug, 'filter'=> $filter])}}">
                     <input style="height: 40px;" placeholder="start date" class="form-control" value="{{old('start_date', $start_date)}}" type="date" name="start_date" />
                     <input style="height: 40px;" placeholder="end date" class="form-control" value="{{old('end_date', $end_date)}}" type="date" name="end_date" />
                     <select name="select2" class="form-control select2">
                        @if($filter)
                        <option value="0">Hamısı</option>
                        @forEach($shops as $shop)
                        <option {{$shop->id == $filter ? 'selected': ""}} value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach
                        @else
                        <option value="0">Hamısı</option>
                        @forEach($shops as $shop)
                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach
                        @endif
                     </select>
                     <button class="btn btn-success">search</button>
                  </form>
               </div>
               <div class="price_list mt-3">
                  <div class="price_block">
                     <ul>
                        @foreach($statistic as $st)
                        <li>
                           <span style="width: 100px"> {{$st->shop[0]->name}}</span>
                           <span>{{$st->time}}</span>
                           <span style="width: 100px"><strong>{{$st->price}}</strong> azn</span>
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="paginate">
                     {{ $statistic->appends(['q' => request('q')])->links('pagination::bootstrap-4') }}
                  </div>
               </div>
            </div>

         </div>
      </div>
   </main>

</body>
@endsection