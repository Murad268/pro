@extends('admin.layout.admin')
@section('content')

<div style="padding: 20px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-admin-content-headerr-component />
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{route('admin.admin.products.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Məhsul rəsmi</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Rəsmi seçin</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                @error_input('image')
                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsulun adı</label>
                    <input type="text" value="{{ old('name.' . $lang)}}" class="form-control" id="exampleInputEmail1" name="name[{{ $lang }}]" placeholder="məhsulun adını daxil edin">
                </div>
                @endforeach
                @error_input('name.' . $lang)


                <div class="form-group">
                    <label for="exampleInputEmail1">Barkod</label>
                    <input type="text" value="{{ old('barcode')}}" class="form-control" id="exampleInputEmail1" name="barcode" placeholder="barkodu daxil edin">
                </div>
                @error_input('barcode')

                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="mb-3 form-group">
                    <label id="desc[{{ $lang }}]" class="mb-1 form-label">Məhsul açıqlaması</label>
                    <textarea placeholder="məhsul açıqlamasını daxil edin" id="editor" name="desc[{{ $lang }}]" class="mt-3 mb-3">{{ old('desc.' . $lang)}}</textarea>
                </div>
                @endforeach
                @error_input('desc.' . $lang)




                @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsul haqqında məlumat</label>
                    <input type="text" value="{{ old('info.' . $lang)}}" class="form-control" id="exampleInputEmail1" name="info[{{ $lang }}]" placeholder="məhsul haqqında məlumatı daxil edin">
                </div>
                @endforeach
                @error_input('info.' . $lang)

                <div class="form-check">
                    <input @checked(old('status' )) type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">status</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Əlavə et</button>
            </div>
        </form>
    </div>
</div>
@endsection
