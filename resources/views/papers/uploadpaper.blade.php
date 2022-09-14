@extends ('layouts.main')

@section ('content')

<div class="uploadblock">
			<h1 class="uploadheading">Upload a Paper</h1>
			<hr class="modline">

        <form action = "{{ url('uploadfile') }} " method = "POST" enctype = "multipart/form-data">

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
                        @csrf
                        <label for="file-upload" class="uploadbutton">
                            <i class="fa fa-plus"></i>
                        </label>
                             <input id="file-upload" name='upload_cont_img' type="file" style="display:none;">
			</div>

			<div class="buttoncont">
				<button class="buttonstyle2" type="submit">UPLOAD PAPER</button>
			</div>
        </form>
		</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script>
            $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $(this).prev('label').text(file);
        });</script>
@endsection