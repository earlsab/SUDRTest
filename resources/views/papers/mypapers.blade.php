@extends('layouts.main')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">My Papers</h1>
			<hr class="modline">

			<button class="uploadlink">
            <a href = "{{ route('UploadPapers') }}">
				<i class="fau fa-solid fa-plus"></i>
            </a>
			</button>
</div>



@endsection