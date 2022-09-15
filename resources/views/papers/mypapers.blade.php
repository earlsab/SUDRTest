@extends('layouts.main')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">My Papers</h1>
			<hr class="modline">

			<table border="1px">
			<tr>
				<th>Title</th>
				<th>Paper Type</th>
				<th>File</th>
				<th>View</th>
			</tr>

			@foreach($data as $data)

			<tr>
				<td>{{$data->title}}</td>
				<td>{{$data->papertype}}</td>
				<td>{{$data->file}}</td>
				<td><a href="{{route('viewPDF',$data->id)}}">View</a></td>
			</tr>

			@endforeach
			</table>
			<button class="uploadlink">
            <a href = "{{ route('UploadPaperPage') }}">
				<i class="fau fa-solid fa-plus"></i>
            </a>
			</button>
</div>



@endsection