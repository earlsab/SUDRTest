@extends ('layouts.main')

@section ('content')

<div class="uploadblock">
			<h1 class="uploadheading">Upload a Paper</h1>
			<hr class="modline">

			<div class="uploaditem">
				<p class="uploadinfo">Title:</p>
				<input class="uploadinput" type="text" id="fname" name="fname" placeholder="Enter Paper Title">
			</div>

			<div class="uploaditem">
				<p class="uploadinfo">Paper Type:</p>
				<select class="papertype style">
					<option value="blank">Choose Paper Type</option>
					<option>CAPSTONE</option>
					<option>Thesis</option>
					<option>Dessertation</option>
					<option>SUSG Papers</option>
				</select>
			</div>

			<div class="uploaditem">
				<p class="uploadinfo">Upload PDF:</p>
				<button class="uploadbutton">
					<i class="faup fa-solid fa-plus"></i>
				</button>
			</div>

			<div class="buttoncont">
				<button class="buttonstyle2">UPLOAD PAPER</button>
			</div>
		</div>

@endsection