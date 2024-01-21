@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin-content-headerr-component />
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{route('admin.admin.points_of_sales.update', $shop->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="exampleInputEmail1">Satış məntəqəsinin adı</label>
                    <input type="text" value="{{ old('name.' . $lang, $shop->name)}}" class="form-control" id="exampleInputEmail1" name="name[{{ $lang }}]" placeholder="satış məntəqəsinin adını daxil edin">
                </div>
                @endforeach
                @error_input('name.' . $lang)
                <div class="form-check">
                    <input name="status" @checked(old('status', $shop->status )) type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">status</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Yenilə</button>
            </div>
        </form>
    </div>
</div>
@endsection
