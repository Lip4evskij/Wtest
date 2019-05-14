<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
	================================================== -->
    <link rel="stylesheet" href="{{asset('css/zerogrid.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/script.js')}}"></script>

</head>

<body class="home-page">
<div class="wrap-body">
    <header class="">
        <div id="cssmenu" class="align-center">
            <ul>
                <li><a href="/"><span>Новости</span></a></li>
                <li><a href="/all-reviews"><span>Гостевая книга</span></a></li>
            </ul>
        </div>

    </header>
    <!--////////////////////////////////////Container-->
    <section id="container">
        <div class="wrap-container">
            <section class="content-box box-style-1 box-2">
                <div class="zerogrid">
                    <div class="wrap-box"><!--Start Box-->
                        @include('front.part.msg')
                        @yield('content')


                    </div>
                </div>
            </section>
            <!-----------------content-box-4-------------------->
        </div>
    </section>


</div>
</body>
</html>