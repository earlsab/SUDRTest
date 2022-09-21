@extends('layouts.adminlayout')

@section('content')

<div class="mypapersblock">
        <h1 class="papersheading">View PDF</h1>
			<hr class="modline">

            <div class="paperinfoblock">

                <div class="paperinfo">
                    <h2>
                        <!-- is it possible make this into the paper title? -->
                        <span class="dispfullname"><b>{{ Auth::user()->name }}</b></span> 
                    </h2>
                </div>

                <div class="paperinfo">
                    <span>Author(s): </span>
                    <!-- is it possible make this into the author of the paper? -->
                    <span class="dispemail">asdasdasd</span>
                </div>
                
            </div>

            <iframe  class="pdfviewer" src="/assets/{{$data->file}}"></iframe>

</div>

@endsection