@extends('layouts.auth')

@section('content')

<div class="indexCont">
		<div class="indexWrapper">

			<div class="loginCard">
				<img class="smallLogo" src="img/SUDRSmallLogo.png">

				<form class="loginForm" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="inputcontent">
                            <!-- EMAIL INPUT -->
                        <div class="reginput">
                            <i class="fa-solid fa-envelope"></i>
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email" 
                            placeholder="Email Address" autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 

                            <!-- PASWORD INPUT -->
                        <div class="reginput">
                            <i class="fa-solid fa-lock"></i>
                            <input id="password" type="password" class="input" name="password" required autocomplete="current-password"
                            placeholder = "Password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>

					<a class="registerLink" href = "{{ route('register') }}">Register</a>

                        <!-- LOGIN -->
                    <div class="buttoncont">
                        <button type="submit" class="indexBtn">{{ __('Login') }}</button>
                    </div>
                </form>
			</div>

		</div>
	</div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>

@endsection
