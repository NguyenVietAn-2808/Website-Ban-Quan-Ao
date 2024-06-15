<!-- tim kiem sp cho khach hang -->

@extends('main')

@section('content')
<style>
.search-results .container {
    padding-top: 100px; /* Điều chỉnh giá trị này để phù hợp với chiều cao của navbar và logo */
}

.row-grid-search-results {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    justify-content: space-between; /* Đảm bảo các sản phẩm được căn đều */
}

.hot-products-item {
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    margin: 10px;
    width: calc(18% - 20px); /* Điều chỉnh để các sản phẩm nằm ngang và có khoảng cách */
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.hot-products-item img {
    width: 100%;
    height: auto;
    display: block;
}

.product-info {
    padding: 15px;
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
}

.product-material {
    font-size: 14px;
    color: #777;
}

.products-item-price {
    margin-top: 15px;
}

.price-sale {
    font-size: 16px;
    color: #e74c3c;
    font-weight: bold;
}

.price-nomal {
    font-size: 14px;
    color: #999;
    text-decoration: line-through;
}

.price-nomal span {
    font-size: 14px;
    color: #999;
}

</style>

<section id="search-results" class="search-results">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">Kết quả tìm kiếm cho "{{ request()->input('query') }}"</p>
        </div>
        <div class="row-grid row-grid-search-results">
            @if($products->isEmpty())
                <p>Không tìm thấy sản phẩm nào.</p>
            @else
                @foreach ($products as $product)
                    <div class="hot-products-item">
                        <a href="/product/{{ $product->id }}">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                        </a>
                        <div class="product-info">
                            <p class="product-name"><a href="/product/{{ $product->id }}">{{ $product->name }}</a></p>
                            <p class="product-material">{{ $product->material }}</p>
                            <div class="products-item-price">
                                <p class="price-sale">{{ number_format($product->price_sale) }}<sup>đ</sup></p>
                                @if($product->price_nomal > $product->price_sale)
                                    <p class="price-nomal"><span>{{ number_format($product->price_nomal) }}<sup>đ</sup></span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
