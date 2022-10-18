@extends('layouts.main')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">My Papers</h1>
			<hr class="modline">

			<div class="tablewrapper">

				<div style="overflow-x:auto;">
					<table class="stripedtable">
						<thead>
							<tr>
								<th>Title</th>
								<th>Paper Type</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
						@foreach($papers as $papers)

						<tr>
							<td>{{$papers->title}}</td>
							<td>{{$papers->papertype}}</td>
							<td><a class="viewlink" href="{{route('viewPDF',$papers->id)}}">View</a></td>
						</tr>

						@endforeach
					</table>
				</div>

				<button class="uploadlink buttonstyle3">
				<a href = "{{ route('papers.create') }}">
					ADD A PAPER
				</a>
				</button>

			</div>
</div>



@endsection