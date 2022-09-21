@extends('layouts.main')

@section('content')
<div class="changepassblock">
        <h1 class="papersheading">Change Password</h1>
		<hr class="modline">

	<form action ="{{ route('passupdate') }}" method ="POST">
		@csrf 
		<div class="passitem">
			<p class="passinfo">Enter old password:</p>
			<input class="passinput" type="password"  name="oldpassword" id="OldPasswordInput">
		</div>

        <div class="passitem">
			<p class="passinfo">Enter new password:</p>
			<input class="passinput" type="password"  name="newpassword" id="NewPasswordInput">
		</div>

        <div class="passitem">
			<p class="passinfo">Confirm new password:</p>
			<input class="passinput" type="password"  name="confirmnewpass" id="ConfirmNewPasswordInput">
		</div>

        
		<div class="buttoncont">
			<input class="buttonstyle1" type="submit">
		</div>
	</form>
</div>

@endsection