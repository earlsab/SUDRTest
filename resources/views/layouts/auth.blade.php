<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>SU Digital Repository Login Page</title>
	<link rel="stylesheet" type="text/css" href="/css/auth.css">
	<script src="https://kit.fontawesome.com/6299020e6b.js" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>

<header>
<nav class="navbar">
	<!-- LOGO -->
	<div><a href="SUDRLogin.html" title="Silliman University Digital Repository"><img class="logoimg" src="/img/SUDRLogo.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle">
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
			<li><button class="topBtn" id="modalOneBtn">FAQ</button></li>
			<li><button class="topBtn" id="modalTwoBtn">ABOUT</button></li>    
	    </div>
	</ul>
</nav>

</header>

<div class="main">
@if (Route::has('login'))
	@yield('content')
@endif

	<div id="modalOne" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			  <span class="m1Close close">&times;</span>
			  <div class="modalinfoCont">

				<h2>FAQ</h2>
				
			</div>
		</div>	  
	</div>

	<div id="modalTwo" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			  <span class="m2Close close">&times;</span>
			  <div class="modalinfoCont">

				<h2>About Us</h2>

				The Silliman University Digital Repository is an online resource that primarily houses 
				a collection of outstanding theses, capstone research, and final requirement documents 
				submitted by Silliman University students. It will incorporate elements and final requirement 
				pieces from all of the University's colleges, institutes, and schools.

				<br>

				This online repository would make it easier and more convenient for Sillimanians to access 
				the previous years' papers, as it can be accessed anywhere with an internet connection, 
				and because it is a free service for Sillimanian Students and Sillimanian faculty, and staff. 

				
			</div>
		</div>
	  
	</div>

	<script>

		var modalOne = document.getElementById("modalOne");
		var modalTwo = document.getElementById("modalTwo");

		// Get the button that opens the modal
		var modalOneBtn = document.getElementById("modalOneBtn");
		var modalTwoBtn = document.getElementById("modalTwoBtn")

		// Get the <span> element that closes the modal
		var m1span = document.getElementsByClassName("m1Close")[0];
		var m2span = document.getElementsByClassName("m2Close")[0];

		// When the user clicks the button, open the modal 
		modalOneBtn.onclick = function() {
			modalOne.style.display = "block";
		}

		modalTwoBtn.onclick = function() {
			modalTwo.style.display = "block"
		}

		// When the user clicks on <span> (x), close the modal
		m1span.onclick = function() {
			modalOne.style.display = "none";
		}

		m2span.onclick = function() {
			modalTwo.style.display = "none";
		}

	</script>

</div>

</body>
</html>