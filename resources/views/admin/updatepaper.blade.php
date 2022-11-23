<div class="paperCont">

	<ul class="displayTable">
		<li class="tableHeader">
			<div class="col col-1">Title</div>
			<div class="col col-2">Paper Type</div>
			<div class="col col-3">College</div>
			<div class="col col-4">View Link</div>
			<div class="col col-4">Delete</div>
		</li>
		@foreach($paper as $papers)
			@if($papers->UploaderUserID == ($user = \Auth::guard('web')->user()->UserID))
		<li class="tablepaperInfo">
		    <div class="col col-1" data-label="Title:">{{$papers->PaperTitle}}</div>
			<div class="col col-2" data-label="Paper Type:">{{$papers->PaperType}}</div>
			<div class="col col-3" data-label="College:">{{$papers->College}}</div>
			<div class="col col-4" data-label="View Link:"><button class="redBtn" onclick="location.href='{{route('viewPDF', $papers->PaperID)}}'">View</button></div>
			<div class="col col-5" data-label="View Link:">
				<form method="POST" action="{{route('papers.destroy', $papers->PaperID) }}">
						@csrf
						@method('DELETE')
						<button type="submit" class="redBtn" >Delete</button>
				</form>
			</div>
		</li>
			@endif		
		@endforeach		
	</ul>
	
</div>
