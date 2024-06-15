<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
<!--Header-->
@include('parts.header')
<!-- content -->
@yield('content')
<!--San Pham Hot -->
@include('parts.hotproduct')

<!--Footer-->
@include('parts.footer')
    
  
</body>
</html>