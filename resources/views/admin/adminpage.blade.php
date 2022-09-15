@extends('layouts.adminlayout')

@section('content')
    
		<div class="searchcont">
			<div class="searchcard">
				<h1 class="advsearch">Advanced Search</h1>
				<form class="searchbar">
					<input class="searchinput" type="text" placeholder="Search.." name="search">
					<button><i class="fas fa-solid fa-filter"></i></button>
					<button type="submit"><i class="fas fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
		</div>

		<div class="categories">

			<div class="catbtn">
				<button class="catlinks">
					<i class="fac fa-solid fa-school"></i>
					<span>Colleges</span>
				</button>
				<button class="catlinks">
					<i class="fac fa-solid fa-image-portrait"></i>
					<span>Authors</span>
				</button>
				<!--
				<button class="catlinks">
					<i class="fac fa-solid fa-school"></i>
					<span>SUSG</span>
				</button>-->
				<button class="catlinks">
					<i class="fac fa-solid fa-scroll"></i>
					<span><a href ="{{ route('MyPapersAdmin') }}">All Papers</a></span>
				</button>
			</div>
		</div>

@endsection
