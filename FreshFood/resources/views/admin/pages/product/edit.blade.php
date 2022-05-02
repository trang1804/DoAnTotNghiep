@extends('admin.master')
@section('title', "Tạo Sản phẩm")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
    <a href="{{route('cp-admin.products.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh sách sản phẩm</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.products.update',[ 'id' => $Product->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="namePro">Tên sản phẩm<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="namePro" onchange="ChangeToSlug('namePro','slugs')" value="{{ $Product->namePro }}" name="namePro" placeholder="Tên sản phẩm ...">
                        @error('namePro')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Slug sản phẩm<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="slugs" value="{{ $Product->slug }}" name="slug" id="slugCategories" placeholder="Slug sản phẩm ...">
                        @error('slug')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="quantity">Số lượng sản phẩm<span class="text-danger">(*)</span></label>
                        <input type="number" class="form-control form-control-user" id="quantity" value="{{ $Product->quantity }}" name="quantity" id="quantity" placeholder="Số lượng sản phẩm ...">
                        @error('quantity')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="price">Giá tiền (đ)<span class="text-danger">(*)</span></label>
                        <input type="number" step="0.01" class="form-control form-control-user " id="price" value="{{ $Product->price }}" name="price" id="price" placeholder="Giá tiền sản phẩm ...">
                        @error('price')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="discounts">Giảm giá (%) <span class="text-danger">(*)</span></label>
                        <input type="number" class="form-control form-control-user " id="discounts" name="discounts" value="{{ isset($Product->discounts) ? $Product->discounts : 0 }}" id="discounts" placeholder="Giảm giá sản phẩm ...">
                        @error('discounts')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row ">
                    <div class=" col-sm-6 ">
                        <label for="slugCategories">Thuộc danh mục<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="category_id" id="inputGroupSelect01">
                            <option value="0" che>Choose...</option>
                            @foreach($categoryAll as $cate)
                            <option value="{{$cate->id}}" {{ $Product->category_id == $cate->id ? "selected": "" }}>{{$cate->nameCate}}</option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class=" col-sm-6 ">
                        <label for="slugCategories">Nhà cung cấp<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="supplier_id" id="inputGroupSelect01">
                            <option>Choose...</option>
                            @foreach($supplier as $cate)
                            <option value="{{$cate->id}}" {{ $Product->supplier_id == $cate->id ? "selected": "" }}>{{$cate->nameSupplier}} {{$cate->status==1? " ": "(Ngưng cung cấp)"}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class=" col-sm-6 ">
                        <label for="slugCategories">Nguồn gốc xuất xứ<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="origin_id" id="inputGroupSelect01">
                            <option>Choose...</option>
                            @foreach($origin as $cate)
                            <option value="{{$cate->id}}" {{ $Product->origin_id == $cate->id ? "selected": "" }}>{{$cate->name}}</option>
                            @endforeach
                        </select>
                        @error('origin_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            <option {{ $Product->status ==1 ? "selected": "" }} value="1">Đang hoạt động</option>
                            <option {{ $Product->status ==0 ? "selected": "" }} value="0">Ngưng hoạt động</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0"><label for="slugCategories">Anh sản phẩm<span class="text-danger">(*)</span></label>
                        <input onchange="previewFile(this)" id="product_image" type="file" id="image" name="image" class="form-control" require>
                        <div class="d-flex justify-content-start">
                            <div class="mt-3" style="width: 45%; height: 200px; border: 1px solid gray; background-color: pink !important;text-align: center;">
                                <img style="width: 100%; height: 100%;" src="{{ asset("storage/$Product->image") }}" alt=" Anh cũ">
                            </div>
                            <div class="mt-3" style="font-size: 100px">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="mt-3" style="width: 45%; height: 200px; border: 1px solid gray ; background-color: pink !important;text-align: center;">
                                <img style="width: 100%; height: 100%;" id="previewimg" alt=" Anh mới">
                            </div>
                        </div>
                        @error('image')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                    <div class="form-group row ">
                        <div class=" col-sm-12 ">
                            <label for="slugCategories">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="10">{{ isset($Product->Description) ? $Product->Description : 0 }}</textarea>
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