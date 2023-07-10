<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
        <title>@yield('title')</title>
    </head>
  <body>
    <main>
        @include('layouts.header')
        @yield('container')
    </main>

  </body>
</html>