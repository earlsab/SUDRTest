@extends('layouts.adminlayout')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">Maintain Papers</h1>
			<hr class="modline">

			<table border="1px">
			<tr>
				<th>Title</th>
				<th>Paper Type</th>
				<th>File</th>
				<th>View</th>
				<th>Delete</th>
			</tr>

			@foreach($data as $data)

			<tr>
				<td>{{$data->title}}</td>
				<td>{{$data->papertype}}</td>
				<td>{{$data->file}}</td>
				<td><a class="view" href="{{route('viewPDFAdmin',$data->id)}}">View</a></td>
				<td>
				<form method="POST" action="{{route('MyPapersDelete', $data->id) }}" accept-charset="UTF-8" style="display:inline">
													@csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Papers" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
				</td>
			</tr>

			@endforeach
			</table>
			
</div>

@endsection