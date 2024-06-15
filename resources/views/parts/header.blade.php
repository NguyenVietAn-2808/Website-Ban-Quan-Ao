<header id="header">
    <div class="container">
        <div class="row-flex">

<!--Cho thanh bar mobile-->
            <div class="header-bar-icon">
                <i class="ri-menu-line"></i>
            </div>
<!--Cho thanh bar mobile-->





            <div class="header-logo">
                <a href="/"><img src="{{asset('frontend/asset/image/logo.jpg')}}" alt=""></a>
            </div>





<!--Cho thanh bar mobile-->
            <div class="header-logo-mobile">
                <img src="{{asset('frontend/asset/image/logoMobileTest.jpg')}}" alt=""> 
            </div>
<!--Cho thanh bar mobile-->




            <div class="header-nav ">
                <nav>
                    <ul>
                        <li><a href="#san-pham-moi">SẢN PHẨM</a></li>
                        <li><a href="">ĐỒ LÓT</a></li>
                        <li><a href="">MẶC HÀNG NGÀY</a></li>
                        <li><a href="">THỂ THAO</a></li>
                        <li><a href="">SẢN XUẤT RIÊNG</a></li>
                    </ul>
                </nav>
            </div>
            <!-- <div class="header-search">
                <input type="text" placeholder="Tìm Kiếm">
                <i class="ri-search-line"></i>
            </div> -->
            <div class="header-search">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Tìm Kiếm">
                    <button type="submit"><i class="ri-search-line"></i></button>
                </form>
            </div>
         

            <!-- hien thi san pham trong gio hang len icon gio hang -->
            <!-- <div class="header-cart">
                <a href="/cart"><i class="ri-shopping-cart-line" number = "0"></i></a>
            </div> -->

            <!-- <div class="header-cart">
                <a href="/cart">
                    <i class="ri-shopping-cart-line" id="cart-icon" data-total="{{ $totalQuantity }}"></i>
                    @if(isset($totalQuantity) && $totalQuantity > 0)

                    @endif
                </a>
            </div> -->

            <div class="header-cart">
                <a href="/cart">
                    <i class="ri-shopping-cart-line" id="cart-icon" data-total="{{ $totalQuantity ?? 0 }}"></i>
                </a>
            </div>
            


        </div>
    </div>
    
</header>


