<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<title>Soccer</title>
	<meta name="description" content="This is test project">
	<meta name="keywords" content="Soccer,Test Project">
	<meta name="author" content="Mohammadreza Asadi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{asset('img/favicon.png')}}" >

  <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
	@yield('css')

</head>

<body>


  <main id="app">
      <div class="menu-icon" onclick="toggle_menu(this)">
          <div class="menu-line menu-line2-off"></div>
          <div class="menu-line menu-line1-off"></div>
      </div>

      <img class="logo" src="{{asset('img/logo.png')}}" alt="logo">

      <div class="sidebar">
          @include('layout.sidebar')
      </div>

      <div class="container">
          @yield('content')
      </div>


  </main>

  <!-- Js files -->

  <script src="{{asset('js/app.js')}}"></script>

  <script>

      function toggle_menu(e) {
          const sidebar = document.querySelector('.sidebar');
          e.lastChild.classList.toggle('menu-line1');
          e.firstChild.classList.toggle('menu-line2');
          e.lastChild.classList.toggle('menu-line1-off');
          e.firstChild.classList.toggle('menu-line2-off');
          sidebar.classList.toggle('show-menu');
      }

  </script>

  @yield('script')

</body>

</html>
