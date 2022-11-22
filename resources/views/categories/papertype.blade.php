@extends('layouts.main')

@section('content')
    
	<div class="categorypageCont viewPDFCont">

        <div class="pdfinfoDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Paper Type
				</li>

				<li class="pdfpaperInfo">
					<div class="colpdf col-1" data-label="Searched:">

						<div>
							<form class="subcatPicker pdfbtnCont" action="{{ route('PaperType') }}" method="GET" role="search" >
							<select class="catSelect selectType" name="term" type="text">
								
								<option selected="true" disabled="disabled">Choose A Paper Type</option>
										<option  value="CAPSTONE" >CAPSTONE</option>
										<option  value="Dissertation" >Dissertation</option>
										<option  value="Thesis" >Thesis</option>
							</select>
							<button class="pdfBtn redBtn" type="submit">Select</button>
							</form>
						</div>
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
