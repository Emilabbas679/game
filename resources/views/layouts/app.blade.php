<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title') | {{env('APP_NAME')}}</title>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/site/css/reset.css">

    <link rel="stylesheet" href="/site/css/style.css">
    <link rel="stylesheet" href="/site/css/responsive.css">
    <link rel="stylesheet" href="/site/css/swiper.min.css">

    <!-- Jquery part -->
    <script src="/site/js/jquery-3.4.1.min.js"></script>
    @yield('meta')
</head>
<body>
<div class="app clearfix">
    <main>
        @yield('content')
    </main>

</div>

</body>
<script src="/site/js/swiper.min.js"></script>

<script src="/site/js/myjs.js"></script>
</html>
