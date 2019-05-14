<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  </head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Lumino</span>Pro</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li><a href="/reviews"><span class="glyphicon glyphicon-list-alt"></span> Все отзывы</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Новости <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="/admin-panel">
                        <span class="glyphicon glyphicon-share-alt"></span> Все новости
                    </a>
                </li>
                <li>
                    <a class="" href="/admin-panel/create">
                        <span class="glyphicon glyphicon-share-alt"></span> Создать
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
    </ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

                @include('admin.part.msg')
               @yield('content')



</div>	<!--/.main-->

<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
