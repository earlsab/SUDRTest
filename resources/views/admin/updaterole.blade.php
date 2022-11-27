@extends('layouts.Adminauth')
@section('content')

	<div class="categorypageCont viewPDFCont">

        <div class="updateroleDisplay">

            <div class="pdfinfoCard">

				<li class="paperinfoHeader">
					Change Roles
				</li>

				<li class="pdfpaperInfo">
                    <br>

                    *Note <br><br>
                    REGULAR USER = 0 <br>
                    ADMIN = 1 <br>

                    <br>
                    <br>

                    <form action="{{ route('Changes.update', $user->UserID) }} " method="POST" >
                            @csrf
                            @method('PUT')

                           User: {{ $user->LastName}},{{ $user->FirstName}}
                            
                        <div class="subcatPicker pdfbtnCont">
                            <input type="text" class="catSelect selectType" placeholder="Change Role" name="isAdmin">
                            <button class="pdfBtn redBtn" type="submit">Update</button>
                        </div>
                    </form>
				</li>

            </div>
        
        </div>
    </div>

	<footer>
		<p>Silliman University Digital Repository</p>
	</footer>


	@endsection