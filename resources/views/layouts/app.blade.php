<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title') | {{env('APP_NAME')}}</title>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/site/css/reset.css?v=1.1.1">

    <link rel="stylesheet" href="/site/css/style.css?v=1.1.1">
    <link rel="stylesheet" href="/site/css/responsive.css?v=1.1.1">
    <link rel="stylesheet" href="/site/css/swiper.min.css?v=1.1.1">

    <!-- Jquery part -->
    <script src="/site/js/jquery-3.4.1.min.js?v=1.1.1"></script>
    @yield('meta')
</head>
<body>
<div class="app clearfix">
    <main>
        @yield('content')
    </main>

</div>

</body>
<script src="/site/js/swiper.min.js?v=1.1.1"></script>

<script src="/site/js/myjs.js?v=1.1.1"></script>
</html>
