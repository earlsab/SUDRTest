<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>SU Digital Repository Login Page deez nuts</title>
	<link rel="stylesheet" type="text/css" href="/css/superadmin.css">
	<script src="https://kit.fontawesome.com/6299020e6b.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

<header>
<nav class="navbar">
	<!-- LOGO -->
	<div><a href="SUDRLogin.html" title="Silliman University Digital Repository"><img class="logoimg" src="/img/SUDRLogoTP.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle" />
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
	        <li><a href="SUDRLogin.html">HOME</a></li>
	        <li class="faq">
	           <a>FAQ</a>
	           <!-- DROPDOWN MENU -->
	           <ul class="dropdown">
	             <li><a href="/">Dropdown 1 </a></li>
	             <li><a href="/">Dropdown 2</a></li>
	             <li><a href="/">Dropdown 2</a></li>
	             <li><a href="/">Dropdown 3</a></li>
	             <li><a href="/">Dropdown 4</a></li>
	           </ul>
	        </li>	        
			<li><a href="/">ABOUT</a></li>
	    </div>
	</ul>
</nav>

</header>

<div class="wrapper">
	
	<div class="bgimage"></div>
	
	<div class="tabs">
		<div class="tab">

	@if (Route::has('login'))
		<!-- CONTENT -->
		<main>
    	@yield ('content')
		</main>
		</div>

	@endif

	</div>

</div>

<footer>
	<p>Silliman University Digital Repository</p>
</footer>

</body>


</html>