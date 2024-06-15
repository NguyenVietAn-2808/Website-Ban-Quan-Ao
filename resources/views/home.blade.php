<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
<!--Header-->
    @include('parts.header')
    
<!--Slider-->
<section class="slider">
    <div class="slider-items">
        <div class="slider-item">
            <img src="{{asset('frontend/asset/image/banercool.jpg')}}" alt="">
        </div>
        <div class="slider-item">
            <img src="{{asset('frontend/asset/image/banercool2.jpg')}}" alt="">
        </div>
        <div class="slider-item">
            <img src="{{asset('frontend/asset/image/banercool3.jpg')}}" alt="">
        </div>
    </div>
    <div class="slider-arrow">
        <i class="ri-arrow-right-fill"></i>
        <i class="ri-arrow-left-fill"></i>
    </div>
</section>
    
<!--San Pham Hot -->
<section id="san-pham-moi" class="hot-products">
  <div class="container">
      <div class="row-grid">
          <p class="heading-text">Sản Phẩm Mới</p>
      </div>
      <div class="row-grid row-grid-hot-products">
            @foreach ($products as $product )
            <div class="hot-products-item">
                <a href="/product/{{$product -> id}}"><img src="{{asset($product -> image)}}" alt=""></a>
                <p><a href="/product/{{$product -> id}}">{{$product -> name}}</a></p>
                <span>{{$product -> material}}</span>
                <div class="products-item-price">
                    <p>{{number_format($product -> price_sale)}}<sup>đ</sup> <span>{{number_format($product -> price_nomal)}}<sup>đ</sup></span></p>
                </div>
            </div>
            @endforeach
            </div>
  </div>
</section>

<!--Footer-->
@include('parts.footer')
    
  
</body>
</html>