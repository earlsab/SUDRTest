<div class="bookmarkCont">
	<ul class="displayTable">
		<li class="tableHeader">
			<div class="col col-1">Bookmark Title</div>
			<div class="col col-1">Paper Title</div>
			<div class="col col-4">View Link</div>
		</li>
		@foreach($bookmark_details as $bookmarks)
			@if($bookmarks->user_id == ($user = \Auth::guard('web')->user()->UserID))
				<li class="tablepaperInfo">
					<div class="col col-1" data-label="Bookmark Title:">{{$bookmarks->BookmarkName}}</div>
					<div class="col col-1" data-label="Paper Title:">{{$bookmarks->PaperTitle}}</div>
					<div class="col col-4" data-label="View Link:"><button class="redBtn" onclick="location.href='{{route('viewPDF', $bookmarks->paper_id)}}'">View</button></div>
				</li>
			@endif
		@endforeach
	</ul>
</div>