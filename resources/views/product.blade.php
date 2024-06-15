@extends('main')
@section('content')
<section class="products-detail p-to-top">
    <form action="/cart/add" method="post">
    <div class="container">
        <div class="row-flex row-flex-products-detail">
            <p>Sản Phẩm</p><i class="ri-arrow-right-line"></i><p>{{$product -> name}}</p>
        </div>
        <div class="row-grid">
            <div class="products-detail-left">
                <img class="main-image" src="{{asset($product -> image )}}" alt="">
                <div class="product-images-items">
                    @php
                        $product_images = explode('*',$product -> images );  // tu string sang mang
                    @endphp

                    @foreach ( $product_images as $product_image )
                        <img src="{{asset($product_image )}}" alt="">
                    @endforeach

                    <!-- @foreach ($product_images as $key => $product_image)
                            @if ($key == 0)
                                <img class="active" src="{{asset($product_image)}}" alt="">
                            @else
                                <img  src="{{asset($product_image)}}" alt="">
                            @endif
                    @endforeach -->
                    <!-- <img class="active" src="{{asset('frontend/asset/image/products-detail-1.webp')}}" alt="">
                    <img src="{{asset('frontend/asset/image/products-detail-2.webp')}}" alt="">
                    <img src="{{asset('frontend/asset/image/products-detail-3.webp')}}" alt="">
                    <img src="{{asset('frontend/asset/image/products-detail-4.webp')}}" alt="">
                    <img src="{{asset('frontend/asset/image/products-detail-5.webp')}}" alt=""> -->
                </div>
            </div>

            <div class="products-detail-right">
                <div class="products-detail-right-infor">
                    <h1>{{$product -> name}}</h1>
                    <span>{{$product -> material}}</span>
                    <div class="products-item-price">
                        <p>{{number_format($product -> price_nomal)}}<sup>đ</sup> <span>{{number_format($product -> price_sale)}}<sup>đ</sup></span></p>
                    </div>
                </div>
                <div class="row-flex ">
                    <h2 class="h2-heading">Đặc Điểm Nổi Bật</h2>  
                </div>
                <div class="products-detail-right-des">                 
                    {!!$product -> description!!}
                </div>

                <div class="products-detail-right-quantity">
                        <h2>Số Lượng:</h2>
                        <div class="products-detail-right-quantity-input">
                            <i class="ri-subtract-line"></i>
                            <input onkeydown="return false" class="quantity-input" name="product_qty" type="number" value="1">
                            <input type="hidden" value="{{$product -> id}}" name="product_id" >
                            <i class="ri-add-line"></i>
                        </div>
                </div>
                
                <div class="products-detail-right-addcart">
                    <button type="submit" class="main-btn">Thêm Vào Giỏ Hàng</button>
                </div>
            </div>
        </div>
        <div class="row-flex ">
            <h2 class="h2-heading">Chi tiết sản phẩm</h2>  
        </div>
        <div class="row-flex">  
            <div class="products-detail-content">
                {!!$product -> content!!}
            </div>
        </div>
    </div>
    
<!-- tao form la phai co csrf -->
    @csrf
    </form>   
</section>
@endsection
