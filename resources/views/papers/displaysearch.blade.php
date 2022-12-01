@extends('layouts.main')

@section('content')
    
    <div class="viewPDFCont">

    <br>
    <br>
    Your search for "" returned xx results.

        <div class="pdfinfoDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Filter Search
				</li>

				<li class="pdfpaperInfo">

                    <div class="colpdf" data-label="College:">
						<div>
							<form class="subcatPicker pdfbtnCont" action="{{ route('PaperType') }}" method="GET" role="search" >
                                <select class="catSelect selectType" name="term" type="text">
                                    <option selected="true" disabled="disabled">Choose A College</option>
                                </select>
							</form>
						</div>
					</div>

                    <div class="colpdf" data-label="Paper Type:">
						<div>
							<form class="subcatPicker pdfbtnCont" action="{{ route('PaperType') }}" method="GET" role="search" >
                                <select class="catSelect selectType" name="term" type="text">
                                    <option selected="true" disabled="disabled">Choose A Paper Type</option>
                                </select>
							</form>
						</div>
					</div>

                    <div class="colpdf" data-label="Keyword:">
						<div>
                            <form class="subcatPicker pdfbtnCont">
                                @csrf
                                <input type="text" class="catSelect selectType" placeholder="Search Keyword" name="PaperTypeName">
                            </form>
						</div>
					</div>

                    <div class="pdfbtnCont">
                        <button class="pdfBtn redBtn">Filter Search</button> 
                    </div>

					{{ $paper->links() }}
				</li>
				
            </div>

            <div class="pdfdisplayCard">

				<div class="selectiondisplayCard pdfFrame">
					<ul class="resultDisplay displayTable">
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