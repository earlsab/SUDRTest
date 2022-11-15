@extends('layouts.main')

@section('content')


<tbody>
						
	<table class="stripedtable">
		<tbody>
			@foreach($bm as $bookmarks)

				<tr>
					<td>{{$bookmarks->BookmarkName}}</td>
					<td>{{$bookmarks->paper_id}}</td>
				</tr>

			@endforeach
	</table>

						

@endsection