<!DOCTYPE HTML>
<html>
  <head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/new.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/progress_index.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/report.css')}}">
    <link rel="icon" type="assets/image/png" href="{{ asset('assets/image/favicon.png')}}">
    <title>工程管理システム</title>
  </head>
  <body>
    @component('components.header')
    @endcomponent

    @yield('content')

    @component('components.footer')
    @endcomponent
  </body>
</html>