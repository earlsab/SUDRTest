<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>SU Digital Repository</title>
	<link rel="stylesheet" type="text/css" href="/css/admin.css">
	<script src="https://kit.fontawesome.com/6299020e6b.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

<header>
<nav class="navbar">
	<!-- LOGO -->
	<div><a href="{{ route('AdminPage') }}" title="Silliman University Digital Repository"><img class="logoimg" src="/img/SUDRLogoTP.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle" />
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>
		

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
	        <li><a href="{{ route('AdminPage') }}">HOME</a></li>
	        <li class="faq"><a>FAQ</a></li>	        
			    <li><a href="#">ABOUT</a></li>
          <li><a href="{{ route('logout') }}"  
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">LOGOUT</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
            </form>
		  </li> 
	    </div>
	</ul>
</nav>

</header>

<div class="container">
	<div class="sidebar">
		<!-- SIDE BAR-->
		<nav class="togglebar">

			<!-- USER INFORMATION-->
			<div class="userinfo">
				<span class="usinfo fa-regular fa-circle-user fa-4x"></span>
				<span class="usertxt">
				<div><i class="fa-solid fa-star"></i> Admin</div>
				</span>
			</div>

			<!-- USER BUTTON
			<div class="showadmin">
                <button class="buttonstyle3">
                	 <a href="#">
                             {{ __('User View') }}
                    </a>
            	</button>
            </div>
			-->

            <hr class="line">
			
			<!-- NAVIGATION LINKS-->
			<ul>

				<li>
					<a  class="sidelinks" href="{{ route('MyPapersMaintain') }}">
						<span class="fa fa-solid fa-book-open"></span>
						<span class="navtext">Maintenance</span>
					</a>
				</li>

				<li>
					<a  class="sidelinks" href="#">
						<span class=" fa fa-solid fa-bookmark"></span>
						<span class="navtext">Statistics</span>
					</a>
				</li>
			</ul>
            
		</nav>

	</div>
	<main>
		@yield('content')
	</main>

</div>

</body>
</html>