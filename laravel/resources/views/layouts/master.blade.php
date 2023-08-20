<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body>
    @include('layouts.nav')
	@yield('content')
	@include('layouts.footer')
</body>
</html>