@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <x-admin-content-headerr-component />
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title"><a class="btn btn-primary" href="{{route('admin.admin.product.create', $slug)}}">create statistic</a></h3>
               <h3 class="card-title select-all" id="selectAllCheckbox"><a class="ml-1 btn btn-success">select all</a></h3>
               <div class="card-tools">

                  <form action="{{route('admin.admin.products.search')}}" class="input-group input-group-sm" style="width: 350px;">

                     <input name="q" type="text" class="form-control float-right" placeholder="Search">

                     <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                           <i class="fas fa-search"></i>
                        </button>
                     </div>

                  </form>
                  @success_message
                  @error_message
               </div>

            </div>
            @if($statistic->count())
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

               <table class="table table-hover text-nowrap">

                  <thead>

                     <tr>
                        <th>Check for proccess</th>
                        <th>Rəsm</th>
                        <th>Məhsulun adı</th>
                        <th>Satış məntəqəsi</th>
                        <th>Qiyməti</th>
                        <th>Barcode</th>
                        <th>Kontroll elementləri</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($statistic as $product)
                     <tr>
                        <td>
                           <div style="padding-top: 5px" class="form-check">
                              <input value="{{$product->id}}" name="status" type="checkbox" class="form-check-input checkbox" id="exampleCheck1">
                           </div>
                        </td>
                        <td>
                           @if($product->product[0]->image)
                           <a target="_blank" href="{{GetImage('storage/'.$product->product[0]->image)}}">
                              <img style="width: 120px;" src="{{GetImage('storage/'.$product->product[0]->image)}}" alt="">
                           </a>
                           @endif
                        </td>
                        <td>
                           {{$product->product[0]->name}}
                        </td>
                        <td>
                           {{$product->shop[0]->name}}
                        </td>
                        <td>
                           {{$product->price}}
                        </td>
                        <td>
                           {{$product->product[0]->barcode}}
                        </td>
                        <td class="controlls-flex" style="display: flex; ">
                           <a class="btn btn-outline-success m-1" href="{{route('admin.admin.products.edit', $product->id)}}"><i class="fas fa-edit"></i></a>
                           <form onsubmit="return deleteConfirmation(event)" method="post" action="{{route('admin.admin.products.destroy', $product->id)}}">
                              @method('delete')
                              @csrf
                              <button class="btn btn-outline-danger m-1" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                           </form>
                        </td>
                     </tr>

                     @endforeach
                  </tbody>
               </table>

            </div>

            <!-- /.card-body -->
            <div style="width: max-content; margin:0 auto" class="mt-3 pagination">
               {{ $statistic->appends(['q' => request('q')])->links('pagination::bootstrap-4') }}
            </div>
            @else
            <div style="padding: 20px;" type="button" class="toastsDefaultWarning">
               Heç bir məlumat tapılmadı
            </div>
            @endif
         </div>
         @if($statistic->count())
         <form method="post" class="proccess_form" action="{{route('admin.admin.products.ids_proccess')}}">
            @csrf
            <input class="ids_vals" value="" type="hidden" name="ids">
            <label style="margin-right: 12px;" for="">seçilmiş elementlər ilə nə edilsin</label>
            <select class="ids_proccess" name="ids_proccess" id="">
               <option selected value="">seç</option>
               <option value="delete">sil</option>
               <option value="active">statusları aktivləşdir</option>
               <option value="passive">statusları sıfırla</option>
            </select>
         </form>
         @endif
      </div>
   </div>


</div>
@endsection