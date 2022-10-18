@extends('layouts.auth')

@section('content')

<!-- SMALL LOGO -->
    <img class="smalllogoimg" src="img/SUDRSmallLogoTP.png">

            <!-- FORM HANDLER -->
                <form class="formcontainerlogin" method="POST" action="{{ route('login') }}" >
                    @csrf
                        <div class="inputcontent">
                            <!-- EMAIL INPUT -->
                            <div class="reginput">
                                <i class="fa-solid fa-envelope"></i>
                                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email" 
                                placeholder = "Email Address" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    

                            </div>

                            <!-- PASWORD INPUT -->
                            <div class="reginput">
                                <i class="fa-solid fa-lock"></i>
                                <input id="password" type="password" class="input" name="password" required autocomplete="current-password"
                                placeholder = "Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                        <!-- REMEMBER ME -->
                        <!--<div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <!-- REMEMBER ME -->

                        <!-- FORGOT PASWORD -->
                        <div class = "fpcont">
                                @if (Route::has('password.request'))
                                    <a class="fpasslink" href="#">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- LOGIN -->
                        <div class="buttoncont">
                            <button type="submit" class="buttonstyle1">
                                    {{ __('Login') }}
                            </button>
                            <button class="buttonstyle1"><a href = "{{ route('register') }}">Register</a></button>
                        </div>

                </form>

@endsection
