<!-- resources/views/layouts/app.blade.php -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{asset('eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/main.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">

    @yield('css')
</head>

<body>
    <script src="{{asset('eshopper/js/jquery-3.7.1.min.js')}}"></script> <!-- đề lên trên phần content để khi bắt sự kiện click không bị lỗi -->
    @include('components.header')

    @if(session('success') || session('error'))
    <div
        id="flashMessage"
        class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}"
        style="margin: 15px; font-weight: bold;">
        {{ session('success') ?? session('error') }}
    </div>
    @endif
    @yield('content')


    @include('components.footer')
    <script src="{{ asset('cart/addToCart.js') }}"></script>
    <script src="{{asset('eshopper/js/jquery.js')}}"></script>
    <script src="{{asset('eshopper/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('eshopper/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('eshopper/js/price-range.js')}}"></script>
    <script src="{{asset('eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('eshopper/js/main.js')}}"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#flashMessage').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 5000); // sau 5 giây
        });
    </script>

    @yield('js')
</body>

</html>