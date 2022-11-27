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
							<div class="col col-1">Full Name</div>
							<div class="col col-2">Email</div>
							<div class="col col-3">College</div>
							<div class="col col-4">Add Admin</div>
						</li>
						<li class="tablepaperInfo">
							<div class="col col-1" data-label="Full Name">Kyle Angelee Estabillo</div>
							<div class="col col-2" data-label="Email:">kyleestabillo@su.edu.ph</div>
							<div class="col col-3" data-label="College:">CCS</div>
							<div class="col col-4" data-label="Add as Admin"><button class="redBtn">Add</button></div>
						</li>
						
					</ul>
				</div>

            </div>
        
        </div>
    </div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>

	@endsection