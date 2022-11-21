<div class="bookmarkCont">
	<ul class="displayTable">
		<li class="tableHeader">
			<div class="col col-1">Paper Title</div>
			<div class="col col-3">Paper ID</div>
			<div class="col col-3">User ID</div>
			<div class="col col-4">View Link</div>
		</li>
		@foreach($bm as $bookmarks)
		<li class="tablepaperInfo">
			<div class="col col-1" data-label="Title:">{{$bookmarks->BookmarkName}}</div>
			<div class="col col-3" data-label="Paper ID:">{{$bookmarks->paper_id}}</div>
			<div class="col col-3" data-label="Paper ID:">{{$bookmarks->user_id}}</div>
			<div class="col col-4" data-label="View Link:"><button class="redBtn" onclick="location.href='{{route('viewPDF', $bookmarks->paper_id)}}'">View</button></div>
		</li>
		@endforeach
	</ul>
</div>