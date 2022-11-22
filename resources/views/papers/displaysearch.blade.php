@extends('layouts.main')

@section('content')
    
    <div class="homeCont">

        <div class="categoryCont">

			<div class="searchbarCont">
				<h2 class="searchHeading">Anything else you're looking for?</h2>
				<form class="searchForm" action="{{ route('Papers') }}" method="GET" role="search">
					<input type="text" placeholder="Search.." name="term">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
        </div>

		<div class="searchlandCont">
            <div class="selectiondisplayCard pdfFrame">
                <ul class="resultDisplay displayTable">
                {{ $paper->links() }}
                    <li class="tableHeader">
                        <div class="col col-1">Title</div>
                        <div class="col col-2">Paper Type</div>
                        <div class="col col-3">College</div>
                        <div class="col col-4">View Link</div>
                    </li>
                    @foreach($paper as $papers)
                    <li class="tablepaperInfo">
                            <div class="col col-1" data-label="Title:">{{$papers->PaperTitle}}</div>
			                <div class="col col-2" data-label="Paper Type:">{{$papers->PaperType}}</div>
			                <div class="col col-3" data-label="College:">{{$papers->College}}</div>
			                <div class="col col-4" data-label="View Link:"><button class="redBtn" onclick="location.href='{{route('viewPDF', $papers->PaperID)}}'">View</button></div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>

        </div>	
		</div>

	</div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>

    @endsection