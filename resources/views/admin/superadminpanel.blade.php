@extends('layouts.Adminauth')
@section('content')

	<div class="categorypageCont viewPDFCont">

        <div class="pdfinfoDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Add Categories
				</li>

				<li class="pdfpaperInfo">
					<div class="subcatPicker pdfbtnCont">
						<input type="text" class="catSelect selectType" placeholder="Add Paper Type">
						<button class="pdfBtn redBtn">Add</button>
					</div>

					<div class="subcatPicker pdfbtnCont">
						<input type="text" class="catSelect selectType" placeholder="Add College">
						<button class="pdfBtn redBtn">Add</button>
					</div>

					<div class="subcatPicker pdfbtnCont">
						<input type="text" class="catSelect selectType" placeholder="Search User">
						<button class="pdfBtn redBtn">Search</button>
					</div>
				</li>

            </div>

            <div class="pdfdisplayCard">

				<div class="selectiondisplayCard pdfFrame">
	
					<ul class="resultDisplay displayTable">

						<li class="tableHeader">
							<div class="col col-1">Last Name</div>
							<div class="col col-2">First Name</div>
							<div class="col col-3">Email</div>
							<div class="col col-4">College</div>
							<div class="col col-5">Role Change</div>
						</li>
						@foreach($user as $users)
						<li class="tablepaperInfo">
							<div class="col col-1" data-label="Last Name:">{{$users->LastName}}</div>
							<div class="col col-2" data-label="First Name:">{{$users->FirstName}}</div>
							<div class="col col-3" data-label="Email:">{{$users->email}}</div>
							<div class="col col-4" data-label="College:">{{$users->college}}</div>
							<div class="col col-5" data-label="Role Change:"><button class="redBtn">Add</button></div>
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