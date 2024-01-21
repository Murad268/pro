@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin-content-headerr-component />
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{route('admin.admin.points_of_sales.store')}}" method="post">
            @csrf
            <div class="card-body">
                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="exampleInputEmail1">Satış məntəqəsinin adı</label>
                    <input type="text" value="{{ old('name.' . $lang)}}" class="form-control" id="exampleInputEmail1" name="name" placeholder="satış məntəqəsinin adını daxil edin">
                </div>
                @endforeach
                @error_input('name.' . $lang)
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Əlavə et</button>
            </div>
        </form>
    </div>
</div>
@endsection
