@extends('main')
@section('content')
<section class="cart-section p-to-top">
    <form action="/cart/send" method="post">
    <div class="container">
        <div class="row-flex row-flex-products-detail">
            <p>Giỏ Hàng</p>
        </div>
        <div class="row-grid">
            <div class="cart-section-left">
                <h2 class="main-h2">Chi Tiết Đơn Hàng</h2>
                <div class="cart-section-left-detail">
                    <table>
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Thành Tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($products as $product )
                                @php
                                    $price = $product -> price_sale * Session::get('cart')[$product -> id]; //tong gia tien
                                    $total+=$price;
                                @endphp
                                <tr>
                                    <td><img style="width: 70px;" src="{{asset($product -> image)}}" alt=""></td>
                                    <td>
                                        <div class="products-detail-right-infor">
                                            <h1>{{$product -> name}}</h1>
                                            <div class="products-item-price">
                                                <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_nomal)}}<sup>đ</sup></span></p>
                                            </div>
                                        </div>

                                        <div class="products-detail-right-quantity-input">
                                            <i class="ri-subtract-line"></i>
                                            <input onkeydown="return false" class="quantity-input" name="product_id[{{$product -> id}}]" type="number" value="{{Session::get('cart')[$product -> id]}}">
                                            <i class="ri-add-line"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{number_format($price)}}<sup>đ</sup></p>
                                    </td>

                                    <!-- nut xoa sp trong gio hang -->
                                  <td><a href="/cart/delete/{{$product -> id}}"><i class="ri-close-line"></i></a></td>
                                                                <!-- tham so tren là id của sản phẩm -->
                                </tr> 
                            @endforeach 
                            <tr>
                                <td style="font-weight: bold" colspan="2">Tổng Tiền</td>
                                <td style="font-weight: bold; text-align: center;">{{number_format($total)}}<sup>đ</sup></td>
                                <td></td>
                            </tr>                             
                        </tbody>
                    </table>
                    <br>
                    <button formaction="/cart/update" class="main-btn">Cập Nhật Giỏ Hàng</button>
                    <a style="color: crimson; font-style: italic;" href="/">>>Tiếp Tục Mua Hàng</a>
                </div>
            </div>
            <div class="cart-section-right">
                <h2 class="main-h2">Thông Tin Giao Hàng</h2>
                <!-- Validate form Thong Tin Giao Hang "Tin Nhan Bao Loi"-->
                <span style="color:red" >
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </span>
                <!--  -->
                <div class="cart-section-right-input-name-phone">
                    <input type="text" placeholder="Tên" name="name" id="">
                    <input type="text" placeholder="Điện Thoại" name="phone" id="">
                </div>
                <div class="cart-section-right-input-email">
                    <input type="text" placeholder="Email" name="email" id="">
                </div>
                <div class="cart-section-right-select">
                    <select name="city" id="city">
                        <option value="">Tỉnh/Tp</option>
                    </select>
                    <select name="district" id="district">
                        <option value="">Quận/Huyện</option>
                    </select>
                    <select name="ward" id="ward">
                        <option value="">Phường/Xã</option>
                    </select>
                </div>
                <div class="cart-section-right-input-adress">
                    <input type="text" placeholder="Địa Chỉ" name="address" id="">
                </div>
                <div class="cart-section-right-input-note">
                    <input type="text" placeholder="Ghi Chú" name="note" id="">
                </div>
                <button class="main-btn">Gửi Đơn Hàng</button>
            </div>
        </div>
    </div>
    @csrf
    </form>
</section>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{asset('frontend/asset/js/apiprovince.js')}}"></script> 
    <script src="{{asset('frontend/asset/js/script.js')}}"></script>
        @if(session('jscode'))
            <script>
                {!! session('jscode') !!}
            </script>
        @endif
@endsection