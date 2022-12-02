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
		<input type="button" class="redBtn" id="dupeBtn" onlick="duplicate()">

	</div>
	<div class="fullnameBlock">
	@foreach($author as $authors)
		@if($loop->first)
		<div class="authorFullName" id="duplicator">
		<i class="numIcon fa-solid fa-1"></i>
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
		<input class="redBtn" id="delBtn" onclick="return this.parentNode.remove();">Delete
	</div>
	@elseif($loop->last)
	<div class="authorFullName" >
		<i class="numIcon fa-solid fa-1"></i>
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
		<input class="redBtn" id="delBtn" onclick="return this.parentNode.remove();">Delete
	</div>
	@else
	<div class="authorFullName">
		<i class="numIcon fa-solid fa-1"></i>
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
		<input class="redBtn" id="delBtn" onclick="return this.parentNode.remove();">Delete
	</div>
		@endif
	@endforeach
</div>
	
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

	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="ContentAdviser" value="{{$paper->ContentAdviser}}"required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Content Advisor</label>
	</div>

	<input class="datepicker selectType" id="inputID" type="date" placeholder="Date Completed" name="DateCompleted" required>
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