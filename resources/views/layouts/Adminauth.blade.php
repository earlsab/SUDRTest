<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>SU Digital Repository</title>
	<link rel="stylesheet" type="text/css" href="/css/superadmin.css">
	<script src="https://kit.fontawesome.com/6299020e6b.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

<header>
<nav class="navbar">
	<!-- LOGO -->
	<div><a href="index.html" title="Silliman University Digital Repository"><img class="logoimg" src="img/SUDRLogo.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle" />
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>
		

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
        	<li><a href="#">LOGOUT</a></li>
	    </div>
	</ul>
</nav>

</header>

<div class="main">
	@yield('content')
</div>

</body>
</html>