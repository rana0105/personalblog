<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BizPage Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  @include('frontend.partial.style')
</head>

<body>
    @include('frontend.partial.header')

    @yield('content')
  

  @include('frontend.partial.footer')
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  @include('frontend.partial.script')

</body>
</html>
