@extends('layouts.adminlayout')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">All Papers</h1>
			<hr class="modline">

			<div class="tablewrapper">

				<table class="papertable" border="1px">
					<tr>
						<th>Title</th>
						<th>Paper Type</th>
						<th>File</th>
						<th>View</th>
					</tr>

					@foreach($papers as $papers)

					<tr>
						<td>{{$papers->title}}</td>
						<td>{{$papers->papertype}}</td>
						<td>{{$papers->file}}</td>
						<td><a href="{{route('viewPDFAdmin',$papers->id)}}">View</a></td>
					</tr>

					@endforeach
				</table>

			</div>
			
</div>



@endsection