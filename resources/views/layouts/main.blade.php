<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>SU Digital Repository</title>
	<link rel="stylesheet" type="text/css" href="/css/mainlayout.css">
	<script src="https://kit.fontawesome.com/6299020e6b.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

<header>
<nav class="navbar">
	<!-- LOGO -->
	<div><a href="{{ route('home') }}" title="Silliman University Digital Repository"><img class="logoimg" src="/img/SUDRLogoTP.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle" />
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>
		

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
	        <li><a href="{{ route('home') }}">HOME</a></li>
	        <li class="faq"><a>FAQ</a></li>	        
			<li><a href="#">ABOUT</a></li>
			<li><a href="{{ route('logout') }}"  
					onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">LOGOUT</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST">
											@csrf
				</form></li>
	    </div>
	</ul>
</nav>

</header>

<div class="container">
<div class="sidebar">
		<!-- SIDE BAR-->
		<nav class="main-nav">

			<ul>
				<li class="userblock">
					<div class="userinfo">
						<i class="fa-regular fa-circle-user fa-4x"></i>
						<span class="user-text">
							<div>{{ Auth::user()->UserName }}</div>
							<div>Type: {{ Auth::user()->UserType }}</div>
						</span>
					</div>

					<!-- ADMIN BUTTON
					<div class="showadmin">
						<button class="buttonstyle3">
							<a href="#">
									{{ __('Admin View') }}
							</a>
						</button>
					</div>
					-->
				</li>

				<hr class="line">

				<li class="navlinks">
					<a href="{{ route('MyProfile') }}">
						<i class="fa-solid fa-address-card fa-2x"></i>
						<span class="nav-text"> Profile</span>
					</a>
				</li>
	  
				<li class="navlinks">
					<a href="{{ route('MyPapers') }}">
					<i class="fa-solid fa-book-open fa-2x"></i>
					<span class="nav-text">My Papers</span>
					</a>
				</li>
	  
				<li class="navlinks">
					<a href="#">
					<i class="fa-solid fa-bookmark fa-2x"></i>
					<span class="nav-text">Bookmarks</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
    
    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>


</div>

</body>
</html>