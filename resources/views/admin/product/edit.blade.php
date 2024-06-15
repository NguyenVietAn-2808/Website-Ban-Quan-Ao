@extends('admin.main')
@section('content')
<form action="" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-left">
            <div class="admin-content-main-content-two-input">
                <input type="text" value="{{$product -> name}}" name="name" placeholder="Tên Sản Phẩm">
                <input type="text" value="{{$product -> material}}" name="material" placeholder="Chất Liệu">
            </div>
            <div class="admin-content-main-content-two-input">
                <input type="text" value="{{$product -> price_nomal}}" name="price_nomal" placeholder="Giá Bán">
                <input type="text" value="{{$product -> price_sale}}" name="price_sale" placeholder="Giá Giảm">
            </div>
            <textarea class="editor_des" value="" name="description" placeholder="Đặc Điểm Nổi Bật" id="">{{$product -> description}}</textarea>
            <textarea class="editor_content" value="" name="content" placeholder="Mô Tả Sản Phẩm" id="">{{$product -> content}}</textarea>
            <br>
            <button type="submit" class="main-btn">Cập nhật Sản Phẩm</button>
        </div>   
        <div class="admin-content-main-content-right">
            <div class="admin-content-main-content-right-image">
                <label for="file">Ảnh Đại Diện</label>
                <input id="file" type="file">
                <input type="hidden" name="image" value="{{$product -> image}}" id="input-file-img-hiden">
                <div class="image-show" id="input-file-img">
                    <img src="{{asset($product -> image)}}" alt="">
                </div>
            </div>
            <div class="admin-content-main-content-right-images">
                <label for="files">Ảnh Sản Phẩm</label>
                <input id="files" type="file" multiple>
                <div class="images-show" id="input-file-imgs">
                    @php
                        $product_images = explode("*",$product -> images);
                    @endphp
                    @foreach ( $product_images as $product_image )
                        <input type="hidden" name="images[]" value="{{$product_image}}" id="input-file-img-hiden">
                        <img src="{{asset($product_image)}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>               
    </div>
    @csrf
</form>
@endsection
@section('footer')
        <script src="{{asset('backend/asset/ckedit05_col/script.js')}}"></script>
        <script src="{{asset('backend/asset/ckedit05_col/ckeditor.js')}}"></script>
        <script src="{{asset('backend/asset/js/product_ajax.js')}}"></script>
<script>
    ClassicEditor
                .create( document.querySelector( '.editor_des' ), {
                    // Editor configuration.
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( handleSampleError );

                ClassicEditor
                .create( document.querySelector( '.editor_content' ), {
                    // Editor configuration.
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( handleSampleError );
</script>
@endsection