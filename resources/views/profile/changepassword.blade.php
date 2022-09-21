@extends('layouts.main')

@section('content')
<div class="changepassblock">
        <h1 class="papersheading">Change Password</h1>
		<hr class="modline">

        <div class="passitem">
			<p class="passinfo">Enter new password:</p>
			<input class="passinput" type="password"  name="title">
		</div>

        <div class="passitem">
			<p class="passinfo">Confirm new password:</p>
			<input class="passinput" type="password"  name="title">
		</div>

        
		<div class="buttoncont">
			<input class="buttonstyle1" type="submit">
		</div>

</div>

@endsection