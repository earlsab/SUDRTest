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
	<div><a href="SUDRLogin.html" title="Silliman University Digital Repository"><img class="logoimg" src="img/SUDRLogo.png"></a></div>
	<!-- NAVIGATION MENU -->
	<ul class="nav-links">
	    <!-- HAMBURGER MENU -->
	    <input type="checkbox" id="checkbox_toggle">
	    <label for="checkbox_toggle" class="hamburger">&#9776;</label>

	    <!-- NAVIGATION MENUS -->
	    <div class="menu">
			<li><button class="topBtn" id="faqBtn">FAQ</button></li>
			<li><button class="topBtn" id="abtBtn">ABOUT</button></li>    
	    </div>
	</ul>
</nav>

</header>

<div class="main">
@if (Route::has('login'))
	@yield('content')
@endif

	<div id="faqModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			  <span class="faqClose close">&times;</span>
			  <div class="modalinfoCont">

				<h2>FAQ</h2>
				
			</div>
		</div>	  
	</div>

	<div id="aboutModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			  <span class="abtClose close">&times;</span>
			  <div class="modalinfoCont">

				<h2>About Us</h2>
				
			</div>
		</div>
	  
	</div>

	<script>

		var faqModal = document.getElementById("faqModal");
		var aboutModal = document.getElementById("aboutModal");

		// Get the button that opens the modal
		var faqBtn = document.getElementById("faqBtn");
		var abtBtn = document.getElementById("abtBtn")

		// Get the <span> element that closes the modal
		var faqspan = document.getElementsByClassName("faqClose")[0];
		var abtspan = document.getElementsByClassName("abtClose")[0];

		// When the user clicks the button, open the modal 
		faqBtn.onclick = function() {
			faqModal.style.display = "block";
		}

		abtBtn.onclick = function() {
			aboutModal.style.display = "block"
		}

		// When the user clicks on <span> (x), close the modal
		faqspan.onclick = function() {
			faqModal.style.display = "none";
		}

		abtspan.onclick = function() {
			aboutModal.style.display = "none";
		}

	</script>

</div>

</body>
</html>