@extends('layouts.main')

@section('content')


<div class="homeCont">

        <div class="categoryCont">

			<div class="searchbarCont">
				<h2 class="searchHeading">Anything you're looking for?</h2>
				<form class="searchForm">
					<input type="text" placeholder="Search.." name="search2">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>

			<div class="catWrapper">
				<div class="catBlock">
					<article class="card-outer">
						<a href="#" class="card-inner">
							<i class="fa-solid fa-scroll"></i>
							<br>
							Paper Type
						</a>
					</article>
				</div>

				<div class="catBlock">
					<article class="card-outer">
						<a href="#" class="card-inner">
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

					<p>contact info here...dunno whose tho. (susg or su?)</p>

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
