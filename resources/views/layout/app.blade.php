<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<title>Soccer {{$title}}</title>
	<meta name="description" content="This is test project">
	<meta name="keywords" content="Soccer,Test Project">
	<meta name="author" content="Mohammadreza Asadi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no;">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('img/favicon.png')}}" >

  <!-- CSS files -->
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
	@yield('css')

</head>

<body>

  @include('layout.sidebar')

  <main>

    @yield('content')

  </main>

  <!-- Js files -->

  <script src="{{asset('js/app.js')}}"></script>
  @yield('script')

</body>


</html>
