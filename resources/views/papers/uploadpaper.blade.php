<form class="paperInput" action="{{ route('papers.store') }} " method="POST" enctype="multipart/form-data">
@csrf
	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Paper Title</label>
	</div>

	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="ContentAdviser" required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Content Advisor</label>
	</div>

	<div class="selectCont">
	<input class="datepicker selectType" id="inputID" type="date" placeholder="Date Completed" name="DateCompleted" required>

		<select class="selectType" name="College">
			<option selected="true" disabled="disabled">Select College</option>
			@foreach($College as $Colleges)
			<option value="{{$Colleges->CollegeAbbr}}">{{$Colleges->CollegeName}}</option>
			@endforeach
		</select>

		<select class="selectType" name="PaperType">
			<option selected="true" disabled="disabled">Select Paper Type</option>
			@foreach($PT as $PaperType)
			<option value="{{$PaperType->PaperTypeName}}">{{$PaperType->PaperTypeName}}</option>
			@endforeach
		</select>
	</div>

	<div class="authHeadingCont">
		<div>Add Author(s):</div>
		<input type="button" class="redBtn" id="dupeBtn" value="Add Row" onlick="duplicate()">
	</div>


	<div class="fullnameBlock">
		<div class="authorFullName" id="duplicator">
			<div class="nameDivCont group">      
				<input class="inputchecker1 inputInfo" type="text" name="Fname[]" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label class="infoLabel">First Name</label>
			</div>

			<div class="nameDivCont group">      
				<input class="inputchecker1 inputInfo" type="text" name="Lname[]" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label class="infoLabel">Last Name</label>
			</div>

			<input type="button" class="redBtn" id="delBtn" style="display:none" value="Delete" onclick="return this.parentNode.remove();">
		</div>
	</div>

@csrf
	<div class="addPDF">
		<input class="redBtn" name='file' type="file" accept="application/pdf" >
	</div>

	<br>
	<br>

	<button class="redBtn" type="submit">Submit</button>

	@if(Session::has('message'))        
		    <div id="modalOne" style="display:block" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m1Close close">&times;</span>
                    <div class="modalinfoCont">
                        <h2>Success!</h2>
						<br>
                        {{Session::get('message')}}  
                    </div>
                </div>
            </div>
	 @endif
</form>

	<script>

		document.getElementById('dupeBtn').onclick = duplicate;
		var i = 0;
		var original = document.getElementById('duplicator');

		function duplicate() {
			document.getElementById("delBtn").style.display = "block";
			var clone = original.cloneNode(true);
			clone.id = "duplicate" + ++i;
			original.parentNode.appendChild(clone);

			if (original.id == 'duplicator') {
				document.getElementById("delBtn").style.display = "none";
			}
		}

		var m1span = document.getElementsByClassName("m1Close")[0];
		m1span.onclick = function() {
			modalOne.style.display = "none";
    	}

	</script>