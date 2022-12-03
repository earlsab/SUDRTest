@extends('layouts.main')

@section('content')
    
    <div class="viewPDFCont">
		<br>
		<br>

		Your search for '{{$searchstr}}' returned "{{$count}}" results.
	
 
        <div class="pdfinfoDisplay">

            <div class="pdfinfoCard">

				<form action="{{ route('FilterResults') }}" method="GET" role="search">
					<input type="hidden" placeholder="Search" value="{{$searchstr}}" name="term">
					<li class="paperinfoHeader">
						Filter Search
					</li>

					<li class="pdfpaperInfo">

						<div class="colpdf" data-label="College:">
							<select class="selectType" name="College">
								<option selected="true" disabled="disabled">Select College</option>
								@foreach($College as $Colleges)
								<option value="{{$Colleges->CollegeAbbr}}">{{$Colleges->CollegeName}}</option>
								@endforeach
							</select>
						</div>

						<div class="colpdf" data-label="Paper Type:">
							<div>
								<select class="selectType" name="PaperType">
									<option selected="true" disabled="disabled">Select Paper Type</option>
									@foreach($PT as $PaperType)
									<option value="{{$PaperType->PaperTypeName}}">{{$PaperType->PaperTypeName}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="colpdf" data-label="Author:">
							<div>
								<form class="subcatPicker pdfbtnCont">
									@csrf
									<input type="text" class="catSelect selectType" placeholder="Search Author" name="Author">
								</form>
							</div>
						</div>

						<div class="pdfbtnCont">
							<button type="submit" class="pdfBtn redBtn">Filter Search</button> 
						</div>

						{{ $paper->links() }}
					</li>
				</form>
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