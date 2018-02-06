<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
    <style type="text/css">
        body{
        {{--  background: url("{{asset('public/images/library.jpg')}}") no-repeat center center fixed; --}}
            background-size: 100% auto;
        }
        header{opacity: .7;}
        footer{background-color: #fff; opacity: .9; text-align: center;}
    </style>
</head>
<body>
<header class="jumbotron">
    <div class="container">
        <div class="col-md-10">
            <h1> The BookStore !</h1>
            <p> Reading a good book is like taking a journey . </p>
        </div>
        <div class="col-md-2"></div>
        Date : {{ $date }}  <br/>
        Time : {{ $time }}  <br/>
        <a href="{{asset('admin')}}">Samar Area</a><br/>
        <a href="{{asset('summary')}}">Summary</a>


    </div>

</header>


@yield('content')


<footer class="container">
    &copy; All Right Reserved For samar :)
</footer>

</body>
</html>