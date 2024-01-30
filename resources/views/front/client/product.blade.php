<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <title>Document</title>
   <style>
      * {
         padding: 0;
         margin: 0;

         box-sizing: border-box;
         text-align: left;
      }

      ul,
      ol {
         list-style: none;
         padding: 0;

      }

      ul li {
         padding: 5px 0;

      }

      body {
         padding-top: 40px;
      }

      .price_block ul {
         margin: 0 !important;
         height: 300px;
         overflow: scroll;
      }

      .img_block {
         display: block;
         margin: 0 auto;
         width: 80%;
         height: 550px;
         box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
      }

      img {
         width: 100%  !important;
         height: 100%;
         object-fit: cover;
      }

      .price_block li {
         display: flex;
         align-items: center;
         column-gap: 15px
      }
   </style>
</head>

<body>
   <div class="container text-center">
      <div class="row">
         <div class="col">
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
            </div>
         </div>

      </div>
   </div>
</body>

</html>