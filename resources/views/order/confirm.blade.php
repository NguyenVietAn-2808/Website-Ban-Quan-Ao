@extends('main')
@section('content')
<section class="order-confirm p-to-top">
    <div class="container">
        <div class="row-flex row-flex-products-detail">
            <!-- <p>Xác nhận đơn hàng: <span style="font-weight: bold;">Ngô Sỹ Nguyên#37</span></p> -->
            <p>Xác nhận đơn hàng: <span style="font-weight: bold;"></span></p>
        </div>
        <div class="row-flex">
            <div class="order-confirm-content">
                <p>Đơn hàng của bạn đã được gửi <span style="font-weight: bold;">Thành Công</span>! <br>
                    <span style="font-size: small;">Vui lòng check <span style="font-style: italic; font-weight: bold;">Email</span> đã đăng kí để nhận và xác nhận đơn hàng</span>
                </p>
                <br>
                <!-- <button class="main-btn">Tiếp Tục Mua Hàng</button> -->
                <!-- An Sua -->
                <a style="color: crimson; font-style: italic;" href="/">>>Tiếp Tục Mua Hàng</a>
            </div>
        </div>
    </div>
</section>
@endsection