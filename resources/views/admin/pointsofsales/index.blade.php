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

                        <div class="input-group input-group-sm" style="width: 350px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
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
                                <th>Məntəqənin adı</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Kontroll elementləri</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)
                            <tr>
                                <td>{{$shop->name}}</td>
                                <td>{{$shop->slug}}</td>
                                <td>
                                    @if($shop->status)
                                    <button type="button" class="btn btn-success btn-block btn-sm"><i class="fa fa-check mr-3" aria-hidden="true"></i>
                                        hazırda məntəqə görünür</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-block btn-sm"><i class="fa fa-times mr-3" aria-hidden="true"></i>
                                        hazırda məntəqə görünmür</button>
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
                @else
                <div style="padding: 20px;" type="button"  class="toastsDefaultWarning">
                    Heç bir məlumat tapılmadı
                </div>
                @endif
            </div>
            <!-- /.card -->
        </div>
    </div>


</div>
@endsection
