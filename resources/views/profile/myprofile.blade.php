@extends('layouts.main')

@section('content')

<div class="profileCont">

	<div class="profileCard">
		<input id="profView" type="checkbox">

			<div class="placeholderPic">
				<img src="/img/user.png" alt="">
			</div>
			<!--If User is Student or Faculty Display This -->
			@if(Auth::user()->UserType == 'Student' || Auth::user()->UserType == 'Faculty')
			<div class="userName">@ {{ Auth::user()->UserName }}</div>

			<div class="fullNameBlock">
				<div class="firstName">
					<h2>{{ Auth::user()->FirstName }}</h2>
				</div>

				<div class="midLastName">
					<h2>{{ Auth::user()->MiddleName }}</h2>
					<h2>{{ Auth::user()->LastName }}</h2>
				</div>
			</div>
			@endif

			<!--Change Password Display and Modal -->
			<div class="changePwBlock">
					<button class="redBtn" id="modalBtn">Change Password</button>
			</div>

			<div id="myModal" class="modal">
			<div class="modal-content">
					  	<span class="close">&times;</span>
					  	<div class="modalinfoCont">

							<h2>Change Password</h2>

							<form class="newpassInput" action ="{{ route('passupdate') }}" method ="POST">
								@csrf
								
								<div class="group">      
									<input class="inputInfo" type="password" name="oldpassword" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">Old Password</label>
								</div>

								<div class="group">      
									<input class="inputInfo" id="inputID" type="password" name="newpassword" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">New Password</label>
								</div>

								<div class="group">      
									<input class="inputInfo" id="inputID" type="password" name="confirmnewpass" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">Confirm New Password</label>
								</div>

								<br>
								<br>

								<button class="redBtn" type="submit">Change</button>
							</form>
						</div>
					</div>
			</div>

			<!--Admin and User Views -->
			<div class="colEmailBlock">
				<div class="userTypeBlock">
					@if(Auth::user()->isAdmin == '2')
						<button class="nodesignBtn" onclick="location.href='{{route('SuperAdminPage')}}'"><i class="fa-solid fa-star"></i></button>
					@endif
					@if(Auth::user()->isAdmin == '1')
						<button class="nodesignBtn" onclick="location.href='{{route('AdminPage')}}'"><i class="fa-solid fa-star"></i></button>
					@endif
					<div>{{ Auth::user()->UserType }}</div>
				</div>

				<!--Displaying College -->
					@if(Auth::user()->UserType == 'Student')
						<div>{{ Auth::user()->college }}</div>
					@endif

				<!--Displaying if User Type is Organization -->
					@if(Auth::user()->UserType == 'Organization')
						<div>{{ Auth::user()->OrganizationName }}</div>
					@endif
					
				<!--Displays Email-->
				<div>{{ Auth::user()->email }}</div>
			</div>

		<label class="profDown" for="profView"></label>
	</div>

	<div class="userFunctionsCard">

		<div class="container">
			<div class="content">
				<input type="radio" name="slider" checked id="blockSection1">
				<input type="radio" name="slider" id="blockSection2">
				<input type="radio" name="slider" id="blockSection3">

				<div class="list">

					<label for="blockSection1" class="blockSection1">
					<i class="fas fa-solid fa-plus"></i>
					<span class="title">Add Paper</span>
					</label>

					<label for="blockSection2" class="blockSection2">
						<span class="icon"><i class="fas fa-solid fa-scroll"></i></span>
						<span class="title">My Papers</span>
					</label>

					<label for="blockSection3" class="blockSection3">
						<span class="icon"><i class="far fa-solid fa-bookmark"></i></span>
						<span class="title">Bookmarks</span>
					</label>
					<div class="slider"></div>
				</div>

				<div class="text-content">
					<div class="blockSection1 text">
						<div class="title">Add a Paper</div>
						
						@include('papers.uploadpaper')

					</div>

					<div class="blockSection2 text">
						<div class="title">My Papers</div>

						@include('papers.mypapers')

					</div>

					<div class="blockSection3 text">
						<div class="title">My Bookmarks</div>

						@include('papers.mybookmarks')

					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="footer">
		<p>Silliman University Digital Repository</p>
	</footer>

	<script>

		var modal = document.getElementById("myModal");
		var btn = document.getElementById("modalBtn");
		var span = document.getElementsByClassName("close")[0];

		function checkMediaQuery() {
		
			const boxinput1 = document.querySelector('.inputchecker1');
			const boxinput2 = document.querySelector('.inputchecker1');

			if (window.innerWidth <= 768) {
				if (boxinput1 === document.activeElement) {
					document.getElementById("footer").style.display = "none";
				} else if (boxinput2 === document.activeElement) {
					document.getElementById("footer").style.display = "none";
				}
			}
		}
		window.addEventListener('resize', checkMediaQuery);

		btn.onclick = function() {
		modal.style.display = "block";
		}

		span.onclick = function() {
		modal.style.display = "none";
		}

	</script>

</div>



@endsection