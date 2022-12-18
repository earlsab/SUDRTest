@extends('layouts.Adminauth')
@section('content')

	<div class="categorypageCont viewPDFCont">

        <div class="pdfinfoDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Add Categories
				</li>

				<li class="pdfpaperInfo">
					<form class="subcatPicker pdfbtnCont" action="{{ route('StorePT') }} " method="POST">
					@csrf
						<input type="text" class="catSelect selectType" id="task" placeholder="Add Paper Type" name="PaperTypeName" required>
						<button class="pdfBtn redBtn" id="btn" type="submit">Add</button>
					</form>

					<form class="subcatPicker pdfbtnCont" action="{{ route('StoreCol') }} " method="POST">
					@csrf
						<input type="text" class="catSelect selectType" id="task" placeholder="Add College" name="CollegeName" required>
						<input type="text" class="catSelect selectType" id="task" placeholder="Add Abbreviation" name="CollegeAbbr" required>
						<button class="pdfBtn redBtn" id="btn" type="submit" >Add</button>
					</form>

					<form class="subcatPicker pdfbtnCont" action="{{ route('SuperAdminPage') }}" method="GET" role="search">
						<input type="text" class="catSelect selectType" id="inputbox" placeholder="Search User" name="term">
						<button class="pdfBtn redBtn" id="buttoninput">Search</button>
					</form>
				</li>

            </div>

            <div class="pdfdisplayCard">

				<div class="selectiondisplayCard pdfFrame">
	
					<ul class="resultDisplay displayTable">

						<li class="tableHeader">
							<div class="col col-1">Last Name</div>
							<div class="col col-2">First Name</div>
							<div class="col col-3">Organization Name</div>
							<div class="col col-4">Email</div>
							<div class="col col-5">College</div>
							<div class="col col-6">Role Change</div>
						</li>
						@foreach($user as $users)
						<li class="tablepaperInfo">
							<div class="col col-1" data-label="Last Name:">{{$users->LastName}}</div>
							<div class="col col-2" data-label="First Name:">{{$users->FirstName}}</div>
							<div class="col col-3" data-label="Organization Name:">{{$users->OrganizationName}}</div>
							<div class="col col-4" data-label="Email:">{{$users->email}}</div>
							<div class="col col-5" data-label="College:">{{$users->college}}</div>
							<div class="col col-6" data-label="Role Change:"><button class="redBtn" onclick="location.href='{{route('Roles', $users->UserID)}}'">Add</button></div>
						</li>
						@endforeach
					</ul>
					{{ $user->links() }}
				</div>

            </div>
        
        </div>
    </div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>

	<script>

	</script>

	@endsection