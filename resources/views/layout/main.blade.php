<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Dashboard</title>
    <link rel="icon" href="{{ asset('img/logoarsip.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @include('layout.partial.link')
  </head>

  <body class="m-0 font text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @include('layout.partial.header')

      @yield('content')
    
  </body>
  @include('layout.partial.script')
</html>