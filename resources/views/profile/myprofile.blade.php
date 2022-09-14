@extends('layouts.main')

@section('content')

<div class="profileblock">
			<h1 class="heading">My Profile</h1>
			<hr class="modline">

			<div class="profileinfo">
				<span>Full Name:</span>
				<span class="dispfullname"><b>{{ Auth::user()->name }}</b></span>
			</div>

			<div class="profileinfo">
				<span>SU Email: </span>
				<span class="dispemail"><b>{{ Auth::user()->email }}</b></span>
			</div>

			<div class="profileinfo">
				<span>ID Number:</span>
				<span class="dispid"><b>{{ Auth::user()->studid }}</b></span>
			</div>

			<hr class="modline">

			<div class="profileinfo">
				<span>College: </span><br>
				<span class="dispecol"><b>{{ Auth::user()->college }}</b></span>
			</div>

			<div class="profileinfo">
				<span>Password:</span>
				<span class="dispass"><b>s*******01</b></span>
				<button class="buttonstyle1">CHANGE</button>
			</div>
		</div>

@endsection