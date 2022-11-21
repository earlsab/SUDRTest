@extends('layouts.main')

@section('content')


<div class="homeCont">

<div class="categoryCont">

	<div class="searchbarCont">
		<h2 class="searchHeading">Hi, {{ Auth::user()->UserName }}! <br> Anything you're looking for?</h2>
		<form class="searchForm" action="{{ route('Papers') }}" method="GET" role="search" >
			<input type="text" placeholder="Search" name="term">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>

	<div class="catWrapper">
		<div class="catBlock">
			<article class="card-outer">
				<a href="{{ route('PaperType') }}" class="card-inner">
					<i class="fa-solid fa-scroll"></i>
					<br>
					Paper Type
				</a>
			</article>
		</div>

		<div class="catBlock">
			<article class="card-outer">
				<a href="{{ route('Colleges') }}" class="card-inner">
					<i class="fa-solid fa-school"></i>
					<br>
					Colleges
				</a>
			</article>
		</div>

		<div class="catBlock">
			<article class="card-outer">
				<a href="#" class="card-inner">
					<i class="fa-solid fa-pen-nib"></i>
					<br>
					Authors
				</a>
			</article>
		</div>

		<div class="catBlock">
			<article class="card-outer">
				<a href="#" class="card-inner">
					<i class="fa-solid fa-building"></i>
					<br>
					SUSG
				</a>
			</article>
		</div>
	</div>

</div>

<div class="aboutCont">
	<div class="infoCont">
		<div class="contactCard">

			<div class="contactBlock">
				
				<h2>FAQ</h2>

				<div class="contactWrapper">
					<input id="con1" type="radio" name="tabs" checked onclick="show(1)">
					<label class="uicontact" for="con1">1</label>
	
					<input id="con2" type="radio" name="tabs" onclick="show(2)">
					<label class="uicontact" for="con2">2</label>
	
					<input id="con3" type="radio" name="tabs" onclick="show(3)">
					<label class="uicontact" for="con3">3</label>
				</div>
	
				<section class="contactSec" id="contact1">
					<div class="contactInfo">

						<h3>FAQ 1</h3>

						<br>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>

					</div>
				</section>
	
				<section class="contactSec" id="contact2">
					<div class="contactInfo">

						<h3>FAQ 2</h3>
						
						<br>

						<p>
							tae
						</p>

					</div>
				</section>
	
				<section class="contactSec" id="contact3">
					<div class="contactInfo">

						<h3>FAQ 3</h3>
						
						<br>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>

					</div>
				</section>

			</div>

			<script>

				document.getElementById('contact1').style.display = "block";
				document.getElementById("contact2").style.display = "none";
				document.getElementById("contact3").style.display = "none";
	
				function show(x){
	
	
					if (x == 1){
						document.getElementById("contact1").style.display = "block";
						document.getElementById("contact2").style.display = "none";
						document.getElementById("contact3").style.display = "none";
					}
					else if (x == 2){
						document.getElementById("contact1").style.display = "none";
						document.getElementById("contact2").style.display = "block";
						document.getElementById("contact3").style.display = "none";
					}
					else if (x == 3){
						document.getElementById("contact1").style.display = "none";
						document.getElementById("contact2").style.display = "none";
						document.getElementById("contact3").style.display = "block";
					}
					return; 
				}
			</script>
		</div>

		<div class="aboutCard">

			<div class="aboutBlock">
				
				<h2>ABOUT US</h2>

				<div class="aboutWrapper">
					<input id="abt1" type="radio" name="tabs" checked onclick="text(1)">
					<label class="uiabt" for="abt1">1</label>
	
					<input id="abt2" type="radio" name="tabs" onclick="text(2)">
					<label class="uiabt" for="abt2">2</label>
	
					<input id="abt3" type="radio" name="tabs" onclick="text(3)">
					<label class="uiabt" for="abt3">3</label>
				</div>
	
				<section class="aboutSec" id="about1">
					<div class="aboutInfo">

						<h3>What is the SU Digital Repository?</h3>

						<br>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>

					</div>
				</section>
	
				<section class="aboutSec" id="about2">
					<div class="aboutInfo">

						<h3>Question 2</h3>
						
						<br>

						<p>
							tae
						</p>

					</div>
				</section>
	
				<section class="aboutSec" id="about3">
					<div class="aboutInfo">

						<h3>Question 3</h3>
						
						<br>

						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
						</p>

					</div>
				</section>

			</div>

			<script>

				document.getElementById('about1').style.display = "block";
				document.getElementById("about2").style.display = "none";
				document.getElementById("about3").style.display = "none";
	
				function text(x){
	
	
					if (x == 1){
						document.getElementById('about1').style.display = "block";
						document.getElementById("about2").style.display = "none";
						document.getElementById("about3").style.display = "none";
					}
					else if (x == 2){
						document.getElementById('about1').style.display = "none";
						document.getElementById("about2").style.display = "block";
						document.getElementById("about3").style.display = "none";
					}
					else if (x == 3){
						document.getElementById('about1').style.display = "none";
						document.getElementById("about2").style.display = "none";
						document.getElementById("about3").style.display = "block";
					}
					return; 
				}
			</script>
		</div>
	</div>	
</div>

</div>

<footer>
	<p>Silliman University Digital Repository</p>
</footer>



@endsection
