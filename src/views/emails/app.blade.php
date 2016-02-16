<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/jumbotron-narrow.css') }}">

</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>@yield('title')</h1>
        <p class="lead">@yield('lead')</p>
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Kulturtours.de</p>
    </footer>
</div> <!-- /container -->

</body>
</html>
