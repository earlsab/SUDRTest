@extends ('layouts.adminlayout')

@section ('content')

<div class="uploadblock">
			<h1 class="uploadheading">Update a Paper</h1>
			<hr class="modline">

        <form action="{{ route('papers.update', $papers->PaperID) }} " method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="uploaditem">
				<p class="uploadinfo">Title:</p>
				<input class="uploadinput" type="text"  name="PaperTitle"  value="{{$papers->PaperTitle}}">
			</div>

			<div class="uploaditem">
				<p class="uploadinfo">Paper Type:</p>
				<select class="papertype style" name="PaperType" >
					<option value="blank">{{$papers->PaperType}}</option>
					<option>CAPSTONE</option>
					<option>Thesis</option>
					<option>Dessertation</option>
					<option>SUSG Papers</option>
				</select>
			</div>
			
			<div class="uploaditem">
				<p class="uploadinfo">Update PDF:</p>
                        @csrf
                        <label for="file" class="uploadbutton">
                            <i class="fa fa-plus"></i>
                        </label>
                             <input id="file" name='file' type="file" accept="application/pdf" style="display:none;">
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