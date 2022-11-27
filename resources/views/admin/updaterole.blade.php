@extends('layouts.Adminauth')
@section('content')

	<div class="categorypageCont viewPDFCont">

        <div class="pdfinfoDisplay">

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

                    <form>
                        <div class="subcatPicker pdfbtnCont">
                            <input type="text" class="catSelect selectType" placeholder="Change Role">
                            <button class="pdfBtn redBtn">Update</button>
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