@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin-content-headerr-component />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a class="btn btn-primary" href="{{route('admin.admin.points_of_sales.create')}}">create</a></h3>

                    <div class="card-tools">

                        <form action="{{route('admin.admin.ids_proccess.search')}}" class="input-group input-group-sm" style="width: 350px;">

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
                @if($shops->count())
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">

                        <thead>

                            <tr>
                                <th>Check for delete</th>
                                <th>Məntəqənin adı</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Kontroll elementləri</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)
                            <tr>
                                <td style="padding-top: 10px">
                                    <div style="padding-top: 5px" class="form-check">
                                        <input value="{{$shop->id}}" name="status" type="checkbox" class="form-check-input checkbox" id="exampleCheck1">

                                    </div>
                                </td>

                                <td>{{$shop->name}}</td>
                                <td>{{$shop->slug}}</td>
                                <td>
                                    @if($shop->status)
                                    <button type="button" class="btn btn-success btn-block btn-sm"><i class="fa fa-check mr-3" aria-hidden="true"></i>
                                        hazırda səhifədə görünür</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-block btn-sm"><i class="fa fa-times mr-3" aria-hidden="true"></i>
                                        hazırda səhifədə görünmür</button>
                                    @endif
                                </td>
                                <td class="controlls-flex" style="display: flex; ">
                                    <a class="btn btn-outline-success m-1" href="{{route('admin.admin.points_of_sales.edit', $shop->id)}}"><i class="fas fa-edit"></i></a>
                                    <form onsubmit="return deleteConfirmation(event)" method="post" action="{{route('admin.admin.points_of_sales.destroy', $shop->id)}}">
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
                <div style="width: max-content; margin:0 auto" class="pagination">
                    {{ $shops->appends(['q' => request('q')])->links('pagination::bootstrap-4') }}
                </div>
                @else
                <div style="padding: 20px;" type="button" class="toastsDefaultWarning">
                    Heç bir məlumat tapılmadı
                </div>
                @endif
            </div>
            <form method="post" class="proccess_form" action="{{route('admin.admin.ids_proccess')}}">
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
        </div>
    </div>


</div>
@endsection
