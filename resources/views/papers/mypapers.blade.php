@extends('layouts.main')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">My Papers</h1>
			<hr class="modline">

			<div class="tablewrapper">

				<table class="papertable" border="1px">
					<tr>
						<th>Title</th>
						<th>Paper Type</th>
						<th>View</th>
					</tr>

					@foreach($papers as $papers)

					<tr>
						<td>{{$papers->title}}</td>
						<td>{{$papers->papertype}}</td>
						<td><a class="viewlink" href="{{route('viewPDF',$papers->id)}}">View</a></td>
					</tr>

					@endforeach
				</table>

				<button class="uploadlink buttonstyle3">
				<a href = "{{ route('papers.create') }}">
					ADD A PAPER
				</a>
				</button>

			</div>
</div>



@endsection