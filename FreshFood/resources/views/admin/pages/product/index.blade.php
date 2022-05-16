@extends('admin.master')
@section('title', "Sản phẩm ")
@section('style')
<style>
    .sreach {
        border: 1px solid black !important;
    }
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách sản phẩm</h1>
    @can('THEM-SAN-PHAM')
    <a href="{{route('cp-admin.products.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Thêm sản phẩm</a>
    @endcan
</div>

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <form name="fillter_pro" class="" action="" method="get">
            <div class="input-group">
                <input type="hidden" class="form-control bg-light border-0 small sreach" name="page" value="{{request('page') ? request('page') : '1' }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="d-flex justify-content-between w-100">
                    <input type="text" class="form-control bg-light border-0 small sreach m-2" name="search" placeholder="Tìm danh sách sản phẩm ..." value="{{request('search') ? request('search') : '' }}" aria-label="Search" aria-describedby="basic-addon2">
                    <select id="inputState" name="category_id" class="form-control m-2">   
                        <option value=""  {{request("category_id") ? "selected" : "" }}>Tất cả loại sản phẩm...</option>
                        @foreach($categoryAll as $category)
                        <option value="{{$category->id}}" {{request("category_id") == $category->id ? "selected" : "" }}>{{$category->nameCate }}</option>
                        @endforeach
                    </select>
                    <select id="inputState" name="supplier_id" class="form-control m-2">   
                        <option  value="" {{request("supplier_id") ? "selected" : "" }}>Tất cả nhà phân phối...</option>
                        @foreach($supplier as $suppliers)
                        <option value="{{$suppliers->id}}" {{request("supplier_id") == $suppliers->id ? "selected" : "" }}>{{$suppliers->nameSupplier }}</option>
                        @endforeach
                    </select>

                    <select id="inputState" name="origin_id" class="form-control m-2">
                        <option value=""  {{request("origin_id") ? "selected" : "" }}>Tất cả các nơi xuất xứ...</option>
                        @foreach($origin as $ori)
                        <option value="{{$ori->id}}" {{request("origin_id") == $ori->id ? "selected" : "" }}>{{$ori->name }}</option>
                        @endforeach
                    </select>
                    <select id="inputState" name="status" class="form-control m-2">
                    <option value=""  {{request("status")=="" ? "selected" : "" }}>Tất cả</option>
                        <option value="1"  {{request("status")== 1 ? "selected" : "" }}>Đang hoạt động</option>
                        <option value="2"  {{request("status") == 2 ? "selected" : "" }}>Ngưng hoạt động</option>
                    </select>
                    <button class="btn btn-primary m-2" id="fillter_pro" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Thuộc loại</th>
                        <th>Nhà cung cấp</th>
                        <th>Trạng thái</th>
                        <th>Người tạo</th>
                        <th>Xuất xứ</th>
                        <th>Sô lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Thuộc loại</th>
                        <th>Nhà cung cấp</th>
                        <th>Trạng thái</th>
                        <th>Người tạo</th>
                        <th>Xuất xứ</th>
                        <th>Sô lượng</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach( $products as $product)
                    <tr id="pro{{ $product->id }}">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->namePro }}</td>
                        <td>{{ $product->category->nameCate }}</td>
                        <td>{{ $product->supplier->nameSupplier }}</td>
                        <td><span style="" class="btn {{$product->status==1?'btn-primary':'btn-danger'}} w-100">{{ App\Common\Constants::STATUS_PRODUCTS[$product->status] }}</span></td>
                        <td>{{ $product->User->username }}</td>
                        <td>{{ $product->origin->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                        @can('SUA-SAN-PHAM')
                            <a href="{{route('cp-admin.products.edit',[ 'id' => $product->id ])}}" class="btn-lg"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('XOA-SAN-PHAM')
                            <a class="btn-lg" onclick="deleteCate({{ $product->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="card-header py-3">
        {!! $products->links('pagination::bootstrap-4') !!}
    </div>
</div>

@endsection
@section('javascript')
@if(session('message'))
<script>
    swal("Hành động", " {!! session('message') !!}", "success", {
        button: "OK",
    })
</script>
@endif
@if(session('error'))
<script>
    swal("Hành động", " {!! session('error') !!}", "error", {
        button: "OK",
    })
</script>
@endif
<script>
    function deleteCate(id) {
        const url = '/cp-admin/products/delete/' + id;
        // console.log(url);
        swal({
                title: "Bạn có chắc không?",
                text: "Sau khi bị xóa, bạn sẽ không thể khôi phục tệp này! ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: url,
                        success: function(res) {
                            //console.log(res.status)
                            if (res.status == 200) {
                                swal("Tệp của bạn đã bị xóa!", {
                                    icon: "success",
                                }).then(function() {
                                    $("#pro" + id).remove();
                                });
                            } else if (res.status == 401) {
                                swal(res.message, {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("Tệp của bạn an toàn!!");
                }
            });
    }
    $(document).ready(function() {
        $(".page-link").on("click", function(e) {
            e.preventDefault();
            var rel = $(this).text();
            var page = parseInt(rel);
            // console.log( $("select[name='category_id']").val());
            $("input[name='page']").val(page);

            $("form[name='fillter_pro']").trigger("submit");
        });
        $("#fillter_pro").on("click", function(e) {
            e.preventDefault();
            $("input[name='page']").val(1);

            $("form[name='fillter_pro']").trigger("submit");
        });
    });
</script>
@endsection