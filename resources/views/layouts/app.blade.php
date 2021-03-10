<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title') | {{env('APP_NAME')}}</title>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/site/css/reset.css?v=1.1.5">

    <link rel="stylesheet" href="/site/css/style.css?v=1.1.5.5">
    <link rel="stylesheet" href="/site/css/responsive.css?v=11.12.1.1">
    <link rel="stylesheet" href="/site/css/swiper.min.css?v=12.12.1">

    <!-- Jquery part -->
    <script src="/site/js/jquery-3.4.1.min.js?v=1.1.221"></script>
    @yield('meta')
    @yield('head_css')
</head>
<body>
<div class="app clearfix">
    <main>
        @yield('content')
    </main>

</div>

</body>
<script src="/site/js/swiper.min.js?v=31.1.21"></script>

<script src="/site/js/myjs.js?v=1.1.321"></script>
@yield('js')
</html>
