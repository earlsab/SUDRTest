@extends('layouts.main')

@section('content')

<div class="mypapersblock">
        <h1 class="papersheading">View PDF</h1>
			<hr class="modline">

            <iframe  height="650" width="1400" src="/assets/{{$data->file}}"></iframe>

</div>

@endsection