
<form class="paperInput" action="{{ route('papers.store') }} " method="POST" enctype="multipart/form-data">
@csrf
	<div class="group">      
		<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Paper Title</label>
	</div>

	<div class="authHeadingCont">
		<div>Add Author(s):</div>
	</div>

	<div class="authorFullName">
		<i class="numIcon fa-solid fa-1"></i>
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>

		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
	</div>

	<div class="authorFullName">
		<i class="numIcon fa-solid fa-2"></i>
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>

		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
	</div>

	<div class="authorFullName">
		<i class="numIcon fa-solid fa-3"></i>
		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">First Name</label>
		</div>

		<div class="nameDivCont group">      
			<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label class="infoLabel">Last Name</label>
		</div>
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
		<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label class="infoLabel">Content Advisor</label>
	</div>

	<input class="datepicker selectType" id="inputID" type="date" placeholder="Date Published" name="DatePublished" required>

	<div class="addPDF">
		<input class="redBtn" name='file' type="file" accept="application/pdf" >
	</div>

	<br>
	<br>

	<button class="redBtn" type="submit">Submit</button>
</form>


