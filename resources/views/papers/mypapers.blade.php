@extends('layouts.main')

@section('content')

<div class="mypapersblock">
			<h1 class="papersheading">My Papers</h1>
			<hr class="modline">

			<div class="tablewrapper">

				<div style="overflow-x:auto;">
				<form action="{{ route('MyPapers') }}" method="GET" role="search" class="searchbar">
					<span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Paper Titles">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search Paper Titles" id="term">
                        <a href="{{ route('MyPapers') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
				</form>
					<table class="stripedtable">
						<thead>
							<tr>
								<th>Title</th>
								<th>Paper Type</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
						@foreach($paper as $papers)

						<tr>
							<td>{{$papers->PaperTitle}}</td>
							<td>{{$papers->PaperType}}</td>
							<td><a class="viewlink" href="{{route('viewPDF',$papers->PaperID)}}">View</a></td>
						</tr>

						@endforeach
					</table>
					{{ $paper->links() }}
				</div>

				<button class="uploadlink buttonstyle3">
				<a href = "{{ route('papers.create') }}">
					ADD A PAPER
				</a>
				</button>

			</div>
</div>



@endsection