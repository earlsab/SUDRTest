@extends('layouts.auth')

@section('content')
<div class="verifyCont">


        <div class="verifyinfoCard">

            <li class="paperinfoHeader">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            </li>

            <li class="verifypaperInfo">
                <div class="colverify">
                    
                    <div class="card">
                        <img class="smallLogo" src="/img/SUDRSmallLogo.png">
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            <div>{{ __('Before proceeding, please check your email for a verification link.') }}</div>

                            <br>
                            <br>

                            <div>{{ __('If you did not receive the email') }},</div>

                            <br>

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="redBtn">Resend Link</button>
                            </form>

                            <br>

                            {{ __('Click the button above to request another.') }}
                        </div>
                    </div>
                </div>
            </li>

        </div>
</div> 

<footer>
<p>Silliman University Digital Repository</p>
</footer>

@endsection
