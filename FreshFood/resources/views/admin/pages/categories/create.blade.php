@extends('admin.master')
@section('title', "Têm danh mục")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh mục sản phẩm</h1>
    <a href="{{route('cp-admin.category.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh mục</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nameCategories">Email address <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="nameCate" onchange="ChangeToSlug('nameCate','slugs')" value="{{ old('nameCate') }}" name="nameCate" id="nameCategories" placeholder="Tên danh mục ...">
                        @error('nameCate')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Slug danh mục<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="slugs" value="{{ old('slug') }}" name="slug" id="slugCategories" placeholder="Slug danh mục ...">
                        @error('slug')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="image">Banner<span class="text-danger">(*)</span></label>
                        <input onchange="previewFile(this)" id="product_image" type="file" id="image" name="banner" class="form-control" require>
                        <div class="mt-3 " style="width: 100%; height: 200px; border: 1px solid gray">
                            <img style="width: 100%; height: 100%;" id="previewimg" alt="">
                        </div>
                        @error('banner')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
            </form>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{asset('admin/js/slug.js')}}"></script>
<script>
    function previewFile(input) {
        var file = $("#product_image").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewimg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection