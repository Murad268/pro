@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <x-admin-content-headerr-component />
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Quick Example</h3>
      </div>


      <form action="{{route('admin.admin.product.store', $slug)}}" method="post" enctype="multipart/form-data" method="post">
         @csrf
         <div class="card-body">
            <div style="display: block" class="input-group date datepicker" data-provide="datepicker">
               <label>Tarix</label>
               <div>
                  <input value="{{ old('time')}}" name="time" placeholder="tarixi daxil et" type="text" class="form-control">
                  <div class="input-group-addon">
                     <span class="glyphicon glyphicon-th"></span>
                  </div>
               </div>
            </div>
            @error_input('time')
            <div style="margin-bottom: 10px; margin-top: 8px" class="form-group ml-1">
               <label>Satış məntəqəsini seç</label>
               <select name="point_of_sale_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  @forEach($shops as $shop)
                  <option value="{{$shop->id}}" >{{$shop->name}}</option>
                  @endforeach
               </select>
            </div>
            @error_input('point_of_sale_id')
            <div class="form-group ml-1">
               <label for="exampleInputEmail1">Qiymət</label>
               <input type="text" value="{{ old('price')}}" class="form-control" id="exampleInputEmail1" name="price" placeholder="qiyməti daxil edin">
            </div>
            @error_input('price')
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Əlavə et</button>
         </div>
      </form>
   </div>
</div>
@endsection