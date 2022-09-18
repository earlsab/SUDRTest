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
		<nav class="togglebar">

			<!-- USER INFORMATION-->
			<div class="userinfo">
				<span class="usinfo fa-regular fa-circle-user fa-4x"></span>
				<span class="usertxt">
				<div>{{ Auth::user()->name }}</div>
				<div>ID: {{ Auth::user()->studid }}</div>
				</span>
			</div>

            <hr class="line">
			
			<!-- NAVIGATION LINKS-->
			<ul>
				<li>
					<a class="sidelinks" href ="{{ route('MyProfile') }}">
						<span class="fa fa-solid fa-id-card"></span>
						<span class="navtext">Profile</span>
					</a>
				</li>

				<li>
					<a  class="sidelinks" href="{{ route('MyPapers') }}">
						<span class="fa fa-solid fa-book-open"></span>
						<span class="navtext">My Papers</span>
					</a>
				</li>

				<li>
					<a  class="sidelinks" href="#">
						<span class=" fa fa-solid fa-bookmark"></span>
						<span class="navtext">Bookmarks</span>
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