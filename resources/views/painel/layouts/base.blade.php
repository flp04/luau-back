<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@includeIf('painel.layouts.head')

<body>

  <!-- ======= Header ======= -->
  @includeIf('painel.layouts.header')

  <!-- ======= Sidebar ======= -->
  @includeIf('painel.layouts.sidebar')

  <!-- ======= Content ======= -->
  @yield('content')

  <!-- ======= Footer ======= -->
  @includeIf('painel.layouts.footer')

</body>

</html>