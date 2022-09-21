@extends ('layouts.adminlayout')

@section ('content')

<div class="uploadblock">
			<h1 class="uploadheading">Update a Paper</h1>
			<hr class="modline">

        <form action="{{ url('UpdateFile') }} " method="post" enctype="multipart/form-data">
			@csrf
			
			<div class="uploaditem">
				<p class="uploadinfo">Title:</p>
				<input class="uploadinput" type="text"  name="title"  placeholder="Enter Paper Title">
			</div>

			<div class="uploaditem">
				<p class="uploadinfo">Paper Type:</p>
				<select class="papertype style" name="papertype" >
					<option value="blank">Choose Paper Type</option>
					<option>CAPSTONE</option>
					<option>Thesis</option>
					<option>Dessertation</option>
					<option>SUSG Papers</option>
				</select>
			</div>

			
			<div class="buttoncont">
				<input class="buttonstyle2" type="submit">
			</div>
        </form>
		</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script>
            $('#file').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file')[0].files[0].name;
            $(this).prev('label').text(file);
        });</script>
@endsection