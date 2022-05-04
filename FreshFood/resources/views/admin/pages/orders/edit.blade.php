@extends('admin.master')
@section('title', "Danh mục liên hệ")
@section('style')
<style>
    .sreach {
        border: 1px solid black !important;
    }
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh mục liên hệ</h1>
</div>

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <form name="fillter_cate" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="get">
            <div class="input-group">
                <input type="hidden" class="form-control bg-light border-0 small sreach" name="page" value="{{request('page') ? request('page') : '1' }}" aria-label="Search" aria-describedby="basic-addon2">
                <input type="text" class="form-control bg-light border-0 small sreach" name="search" placeholder="Tìm danh mục liên hệ ..." value="{{request('search') ? request('search') : '' }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="fillter_cate" type="btn">
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
                        <th>Sản phẩm </th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tfoot>
                    <th>ID</th>
                    <th>Sản phẩm </th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Số tiền</th>
                    </tr>
                </tfoot>
                @foreach($Orders->order_detail as $Order)
                <tbody>
                    <td>{{$Order->id}}</td>
                    <td>{{$Order->name}}</td>
                    <td> {{ number_format($Order->price, 0, ',', '.') . " VNĐ"   }}</td>
                    <td>{{$Order->quantity}}</td>
                    <td> {{ number_format($Order->price * $Order->quantity, 0, ',', '.') . " VNĐ"   }}</td>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="card-header py-3">

    </div>
</div>
<div class=" col-12 d-flex justify-content-between">
<div class="card col-7 d-flex justify-content-between">
    <div class="col-12">
        <div class="shoping__checkout">
            <h5>Hóa đơn</h5>
            <ul>
                <li>Tổng tiền thanh toán: <span style="  color:red;">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</span></li>
                <li>Phương thức thanh toán: <span style="  color:red;">Thanh toán khi nhân hàng</span></li>
                <li>Trạng thái: <span style="  color:red;">{{ App\Common\Constants::STATUS_ORDER[$Orders->status] }}</span></li>
            </ul>
        </div>
        <div class="shoping__checkout">
            <h5>Thông tin giao hàng</h5>
            <ul>
                <li>Tên khách hàng: <span style="  color:red;">{{$Orders->fullname}}</span></li>
                <li>Số điện thoại: <span style="  color:red;">{{$Orders->phone}}</span></li>
                <li>Địa chỉ giao hàng: <span style="  color:red;">{{$Orders->address}}</span></li>
                <li>Ghi chú: <span style="  color:red;">{{$Orders->note}}</span></li>
            </ul>
        </div>
    </div>
    <div class="col-6">

    </div>
</div>
<div class="card col-5 d-flex justify-content-between">
    <div class="col-12">
        <div class="shoping__checkout">
            <form class="user" action="{{route('cp-admin.orders.update',[ 'id' => $Orders->id ])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="slugCategories">Trạng thái</label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            @foreach( App\Common\Constants::STATUS_ORDER as $key => $status)
                            <option value="{{$key}}" {{ $Orders->status == $key ? "selected": "" }}>{{$status}}</option>
                            @endforeach
                        </select>
                        @error('status')
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
    <div class="col-6">

    </div>
</div>
</div>
<style>
    ul li span{
      
    }
</style>

@endsection
@section('javascript')
@if(session('message'))
<script>
    swal("Hành động", " {!! session('message') !!}", "success", {
        button: "OK",
    })
</script>
@endif
<script>
    function deleteCate(id) {
        const url = '/cp-admin/cate_blog/delete/' + id;
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
                            console.log(res.status)
                            if (res.status == 200) {
                                swal("Tệp của bạn đã bị xóa!", {
                                    icon: "success",
                                }).then(function() {
                                    $("#cate" + id).remove();
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
            $("input[name='page']").val(page);

            $("form[name='fillter_cate']").trigger("submit");
        });
        $("#fillter_cate").on("click", function(e) {
            e.preventDefault();
            $("input[name='page']").val(1);

            $("form[name='fillter_cate']").trigger("submit");
        });
    });
</script>
@endsection