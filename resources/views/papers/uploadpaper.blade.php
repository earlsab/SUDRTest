
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
		<button class="redBtn" id="dupeBtn" onlick="duplicate()"><i class="fas fa-solid fa-plus"></i>Add Row</button>
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

			<button class="redBtn" id="delBtn" onclick="return this.parentNode.remove();">Delete</button>
		</div>
	</div>

@csrf
	<div class="addPDF">
		<input class="redBtn" name='file' type="file" accept="application/pdf" >
	</div>

	<br>
	<br>

	<button class="redBtn" type="submit">Submit</button>

	<script>

		document.getElementById('dupeBtn').onclick = duplicate;

		var i = 0;
		var original = document.getElementById('duplicator');

		function duplicate() {
			var clone = original.cloneNode(true);
			clone.id = "duplicate" + ++i;
			original.parentNode.appendChild(clone);
			
		}

	</script>
</form>

