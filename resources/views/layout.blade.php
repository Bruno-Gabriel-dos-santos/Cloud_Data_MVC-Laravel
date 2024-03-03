<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="{{ asset('css/cs1.css') }}">
 
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body id="db" style="background-color: rgb(230, 230, 230);">


    
    @yield('content')



  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('js/cadastro.js')}}"></script>
  <script src="{{asset('js/trocanome.js')}}"></script>
  <script src="{{asset('js/loguin.js')}}"></script>


</body>
</html>