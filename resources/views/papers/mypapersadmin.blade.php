@extends('layouts.adminlayout')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">All Papers</h1>
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
			
</div>



@endsection