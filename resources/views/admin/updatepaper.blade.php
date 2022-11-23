<div class="paperCont">

	<ul class="displayTable">
		<li class="tableHeader">
			<div class="col col-1">Title</div>
			<div class="col col-2">Paper Type</div>
			<div class="col col-3">College</div>
			<div class="col col-4">View Link</div>
		</li>
		@foreach($paper as $papers)
			@if($papers->UploaderUserID == ($user = \Auth::guard('web')->user()->UserID))
		<li class="tablepaperInfo">
		    <div class="col col-1" data-label="Title:">{{$papers->PaperTitle}}</div>
			<div class="col col-2" data-label="Paper Type:">{{$papers->PaperType}}</div>
			<div class="col col-3" data-label="College:">{{$papers->College}}</div>
			<div class="col col-4" data-label="View Link:"><button class="redBtn" onclick="location.href='{{route('viewPDF', $papers->PaperID)}}'">View</button></div>
		</li>
			@endif		
		@endforeach		
	</ul>
	
</div>
