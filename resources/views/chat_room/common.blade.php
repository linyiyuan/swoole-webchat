<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swoole-chat聊天系统</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/dist/media/img/favicon.png') }}" type="image/png">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{ asset('/vendor/bundle.css') }}">

    {{--enjoy--}}
    <link rel="stylesheet" href="./vendor/enjoyhint/enjoyhint.css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('/dist/css/app.min.css') }}">
</head>
<body class="form-membership">

@section('style')
@show

@section('header')
@show


@yield('content')


@section('footer')
@show


<!-- Bundle -->
<script src="{{ asset('/vendor/bundle.js') }}"></script>

<!-- App scripts -->
<script src=" {{ asset('/dist/js/app.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('/dist/js/examples.js') }}"></script>

<script src="{{ asset('/vendor/enjoyhint/enjoyhint.min.js') }}"></script>

@section('javascript')
@show
</body>
</html>