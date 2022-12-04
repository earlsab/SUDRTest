<form class="paperInput" action="{{ route('papers.update', $paper->PaperID) }} " method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" value="{{$paper->PaperTitle}}" required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Paper Title</label>
	</div>

	<div class="authHeadingCont">
		<div>Add Author(s):</div>
		<input type="button" class="redBtn" value="Add Rows" id="dupeBtn" onlick="duplicate()">
	</div>
	<div class="fullnameBlock">
	@foreach($author as $authors)
		@if($loop->first)
		<div class="authorFullName" id="duplicator">
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Fname[]" value="{{$authors->Fname}}" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>
		
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Lname[]" value="{{$authors->Lname}}" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
		<input class="redBtn" id="delBtn" style="display:none;" value="Delete" onclick="return this.parentNode.remove();">
	</div>
	@elseif($loop->last)
	<div class="authorFullName" >
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Fname[]" value="{{$authors->Fname}}" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>

		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Lname[]" value="{{$authors->Lname}}" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
		<input class="redBtn" id="delBtn" style="display:none;" value="Delete" onclick="return this.parentNode.remove();">
	</div>
	@else
	<div class="authorFullName">
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Fname[]" value="{{$authors->Fname}}" >
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>

		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="Lname[]" value="{{$authors->Lname}}" >
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
		<input class="redBtn" id="delBtn" style="display:none;" value="Delete" onclick="return this.parentNode.remove();">
	</div>
		@endif
	@endforeach
</div>
	
	<div class="selectCont">


		<input value="{{$paper->DateCompleted}}" class="datepicker selectType" id="inputID" type="date" name="DateCompleted" required>

		<select class="selectType" name="College">
			<option  disabled="disabled" selected hidden>Select College</option>
			@foreach($College as $Colleges)
				@if($Colleges->CollegeAbbr == $paper->College)
				<option value="{{$Colleges->CollegeAbbr}}" selected>{{$Colleges->CollegeName}}</option>
				@else
				<option value="{{$Colleges->CollegeAbbr}}">{{$Colleges->CollegeName}}</option>
				@endif
			@endforeach
		</select>

		<select class="selectType" name="PaperType">
			<option selected="true" disabled="disabled" hidden>Select Paper Type</option>
			@foreach($PT as $PaperType)
				@if($PaperType->PaperTypeName == $paper->PaperType)
				<option value="{{$PaperType->PaperTypeName}}" selected>{{$PaperType->PaperTypeName}}</option>
				@else
				<option value="{{$PaperType->PaperTypeName}}">{{$PaperType->PaperTypeName}}</option>
				@endif
			@endforeach
		</select>
	</div>

	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="ContentAdviser" value="{{$paper->ContentAdviser}}"required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Content Advisor</label>
	</div>

	<br>

	Input Keywords:
	<div class="mb-3">
        <input class="form-control" type="text" data-role="tagsinput" name="tags">
    </div>

@csrf
	<div class="addPDF">
		<input class="redBtn" value="{{$paper->file}}" name='file' type="file" accept="application/pdf" >
	</div>
	<input type="hidden" name="modified_by" value="{{Auth::user()->UserName}}">
	<br>

	<input type="button" value="Submit" class="redBtn" id="btnPrompt">

	<p id="promptCont" style="display:none;">
		Are you sure you want to submit changes?
		<br>
		<br>
		<button class="redBtn" type="submit">Yes</button>
	</p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

	<script>

		document.getElementById('dupeBtn').onclick = duplicate;
		document.getElementById('btnPrompt').onclick = prompt;

		var promptCont = document.getElementById('promptCont');

		function prompt() {
			document.getElementById('btnPrompt').style.display = "none";
			promptCont.style.display = "block";
		}

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
		
	</script>
</form>
