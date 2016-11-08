<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="host" content="{{ url('/') }}">
    <title>Category</title>
    @include('kernel::style')
    <link rel="stylesheet" href="{{static_asset('vendor/global/css/global.css')}}">
    @yield('style')
</head>
<body>
@yield('body')
@push('script')
@include('kernel::script')

{{--<script src="{{static_asset('vendor/vue-resource/vue-resource.min.js')}}"></script>--}}
{{--<script src="{{static_asset('vendor/category/js/category.js')}}"></script>--}}
@include('kernel::alert')
@endpush

@stack('script')
</body>
</html>