@extends ('layouts.main')
<!-- CREATE OF THE PAPERS -->
@section ('content')

<div class="uploadblock">
			<h1 class="uploadheading">Upload a Paper</h1>
			<hr class="modline">

        <form action="{{ route('papers.store') }} " method="post" enctype="multipart/form-data">

			<div class="uploaditem">
				<p class="uploadinfo">Title:</p>
				<input class="uploadinput" type="text"  name="title" placeholder="Enter Paper Title">
			</div>

			<div class="uploaditem">
				<p class="uploadinfo">Paper Type:</p>
				<select class="papertype style" name="papertype">
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
                        <label for="file" class="uploadbutton">
                            <i class="fa fa-plus"></i>
                        </label>
                             <input id="file" name='file' type="file" style="display:none;">
			</div>

			<div class="buttoncont">
			@if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
			@if (count($errors) > 0)
                <div class="alert alert-danger">                   
                        @foreach ($errors->all() as $error)
                          {{ $error }}
                        @endforeach
                </div>
              @endif
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