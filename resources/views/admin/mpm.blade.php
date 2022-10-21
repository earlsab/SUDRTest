@extends('layouts.adminlayout')
<!-- INDEX OF THE PAPERS -->
@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">Maintain Papers</h1>
			<hr class="modline">

			<div class="tablewrapper">

				<table class="papertable" border="1px">
				<tr>
					<th>Title</th>
					<th>Paper Type</th>
					<th>View</th>
					<th>Delete</th>
					<th>Update</th>
				</tr>

				@foreach($papers as $papers)

				<tr>
					<td>{{$papers->PaperTitle}}</td>
					<td>{{$papers->PaperType}}</td>
					<td><a class="viewlink" href="{{route('AdminView', $papers->PaperID) }}">View</a></td>
					<td class="deletecol">
					<form method="POST" action="{{route('papers.destroy', $papers->PaperID) }}">
							@csrf
							@method('DELETE')
								<button type="submit" class="buttonstyle3" >Delete</button>
					</form>
					</td>
					<td><a class="viewlink" href="{{route('papers.edit', $papers->PaperID)}}">Update</a></td>
				</tr>

				@endforeach
				</table>

			</div>
			
</div>

@endsection