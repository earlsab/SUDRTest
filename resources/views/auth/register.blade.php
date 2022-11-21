@extends('layouts.auth')

@section('content')
<div class="indexCont">
		<div class="indexWrapper">

			<div class="registerCard">

		        <img class="smallLogo" src="Img/SUDRSmallLogo.png">
   
                <form class="formcontainerreg" method="POST" action="{{ route('register') }}">
                    @csrf

                        <div class="usertype">

                            <h4 id="typeheader">Please select a user type:</h4>

                                
                                <input id="facultytab" type="radio" name="UserType" value="Faculty" onclick="text(3)"/>
                                <label id="facultylabel" class="uitab" for="facultytab">Faculty</label>

                                <input id="orgtab" type="radio" name="UserType" value="Organization" onclick="text(2)"/>
                                <label id="orglabel" class="uitab" for="orgtab">Organization</label>

                                <input id="studenttab" type="radio" name="UserType"  value="Student" onclick="text(1)" />
                                <label id="studentlabel"class="uitab" for="studenttab">Student</label>
                        </div>

                        <div class="typelayout">
                                <section class="faculstud" id="student">
                                    <!-- USER NAME -->
                                    <div class="reginput" >
                                        <i class="fa-solid fa-at"></i>
                                        <input id="name" type="text" class="input" name="UserName" value="{{ old('UserName') }}" required autocomplete="name" 
                                        placeholder = "User Name" autofocus>   
                                    </div>

                                    <!-- FIRST NAME -->
                                    <div class="reginput" >
                                        <i class="fa-solid fa-1"></i>
                                        <input id="Fname" type="text" class="input" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="Fname" 
                                        placeholder = "First Name" autofocus>   
                                    </div>
                                        @error('Fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                    <!-- MIDDLE NAME -->
                                    <div class="reginput" >
                                        <i class="fa-solid fa-2"></i>
                                        <input id="Mname" type="text" class="input" name="MiddleName" value="{{ old('MiddleName') }}" 
                                        placeholder = "Middle Name" autofocus>   
                                    </div>
                                        @error('Mname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    <!-- LAST NAME -->
                                    <div class="reginput" >
                                            <i class="fa-solid fa-3"></i>
                                            <input id="Lname" type="text" class="input" name="LastName" value="{{ old('LastName') }}" required autocomplete="Lname" 
                                            placeholder = "Last Name" autofocus>
                                    </div>
                                    <!--
                                        @error('studid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror-->

                                    <!-- COLLEGE -->
                                    <div class="reginput" id="collegeinput">
                                        <i class="fa-solid fa-graduation-cap"></i>

                                        <select class="college style" name="college">
                                            <option value="blank">Select College</option>

                                            @foreach($College as $Colleges)
                                                <option value="{{$Colleges->CollegeName}}">{{$Colleges->CollegeName}}</option>
                                            @endforeach
    
                                        </select> 
                                    </div>
                                        @error('college')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </section>    
                            
                                

                                <div class="regrequired">

                                    <section class="org" id="organization">
                                        <div class="reginput" >
                                            <i class="fa-solid fa-school"></i>
                                            <input id="Orgname" type="text" class="input" name="OrganizationName" value="{{ old('OrganizationName') }}"  
                                            placeholder = "Organization Name">   
                                        </div>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </section> 

                                    <!-- EMAIL -->
                                    <div class="reginput" >
                                            <i class="fa-solid fa-envelope"></i>
                                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder = "Email Address">
                                    </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    <!-- PASSWORD -->
                                    <div class="reginput">
                                            <i class="fa-solid fa-lock"></i>
                                            <input id="password" type="password" class="input" name="password" required autocomplete="new-password"
                                            placeholder = "Password">
                                    </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    

                                    <!-- CONFIRM PASSWORD -->
                                    <div class="reginput">
                                            <i class="fa-solid fa-square-check"></i>
                                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password"
                                            placeholder = "Confirm Password">
                                    </div>

                                </div>

                        </div>

                        
                  
                        <!-- REGISTER -->
                        <div class="buttoncont">
                            <button class="indexBtn">
                                <a href = "{{ route('login') }}">Back</a>
                            </button>

                            <button type="submit" class="indexBtn">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <script>

                            document.getElementById('student').style.display = "none";
                            document.getElementById("collegeinput").style.display = "none";
                            document.getElementById("organization").style.display = "none";

                            function text(x){
                                if ( x == 1){
                                    document.getElementById('student').style.display = "block";
                                    document.getElementById("collegeinput").style.display = "block";
                                    document.getElementById("organization").style.display = "none";
                                }
                                else if ( x == 2){
                                    document.getElementById("student").style.display = "none";
                                    document.getElementById("organization").style.display = "block";
                                }
                                else if ( x == 3){
                                    document.getElementById("student").style.display = "block";
                                    document.getElementById("collegeinput").style.display = "none";
                                    document.getElementById("organization").style.display = "none";
                                }
                                return; 
                            }
                        </script>

                </form>
            </div>
        </div>
    </div>
    <footer>
		<p>Silliman University Digital Repository</p>
	</footer>

@endsection
