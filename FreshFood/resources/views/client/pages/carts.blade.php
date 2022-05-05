@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>

                                <th></th>
                            </tr>
                        </thead>
                        <form name="updateCarts" action="{{route('updateCarts')}}" method="post">
                            @csrf

                            <tbody>
                                @foreach($carts as $cart)

                                <input type="hidden" name="id[]" value="{{$cart->id}}">
                                <tr id="pro{{$cart->product_id }}">
                                    <td class="shoping__cart__item">
                                        <img style="width: 20%;" src="{{asset('storage/' .$cart->products->image)}}" alt="">
                                        <h5>{{$cart->products->namePro}}</h5>
                                    </td>
                                    <td style="width: 30%;" class=" shoping__cart__price">
                                        {{ number_format(ceil($cart->products->price-(($cart->products->price * $cart->products->discounts )/100)), 0, ',', '.') . " VNĐ"   }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">

                                                <input type="text" name="quantity[]" value="{{(int)$cart->quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td class="shoping__cart__total">
                                    $110.00 * (int)$cart->quantity
                                </td> -->
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" onclick="removeCart({{$cart->product_id }})"></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('home')}}"   class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    <button class="primary-btn cart-btn cart-btn-right" {{ $carts->count() <=0 ? "disabled" : "" }}   id="submit-updateCarts"></span>
                        Cập nhật giỏ hàng</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                <div class="checkout__form">
                <form action="{{route('checkout')}}" method="post" name="checkout">
                @csrf
                    <div class="row mt-2">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên người nhận<span>*</span></p>
                                        <input type="text" name="fullname" value="{{ old('fullname',auth()->user()->fullname ?? null) }}" placeholder="Tên người nhận">
                                        @error('fullname')<span class="text-danger">{{$message}}</span>@enderror  
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" name="phone" value="{{ old('phone',auth()->user()->phone ?? null) }}"  placeholder="Số điện thoại người nhận">
                                        @error('phone')<span class="text-danger">{{$message}}</span>@enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address" value="{{ old('address',auth()->user()->address ?? null) }}"  placeholder="Địa chỉ người nhận">
                                @error('address')<span class="text-danger">{{$message}}</span>@enderror 
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
          
                                    <textarea name="note"  class="w-100" rows="5" >
                                 {{ old('note') }}
                                    </textarea>
                                    @error('note')<span class="text-danger">{{$message}}</span>@enderror 
                            </div>
                          
                        </div>
                   
                    </div>
                </form>
            </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng số giỏ hàng</h5>
                    <ul>
                        <li>Tạm tính <span>{{number_format(ceil($totalMoney), 0, ',', '.') . " VNĐ"}}</span></li>
                        <li>Tổng tiền <span>{{number_format(ceil($totalMoney), 0, ',', '.') . " VNĐ"}}</span></li>
                    </ul>
                    <a id=" {{ $carts->count() <=0 ? '' : 'checkout' }}" class="primary-btn">Mua hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->


@endsection

@section('javascript')
<script>
    $("#submit-updateCarts").on("click", function(e) {
        $("form[name='updateCarts']").trigger("submit");
    });
    $("#checkout").on("click", function(e) {
        $("form[name='checkout']").trigger("submit");
    });
</script>
@endsection