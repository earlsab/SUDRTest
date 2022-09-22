@extends('layouts.main')

@section('content')

<div class="mypapersblock">
        <h1 class="papersheading">View PDF</h1>	        
        <hr class="modline">

        <div class="paperinfoblock">

        <div class="paperinfo">
                    <h2>
                        <!-- is it possible make this into the paper title? -->
                         <span class="disptitle"><b>{{ $papers->title }}</b></span> 
                    </h2>
                </div>

                <div class="paperinfo">
                        <span>Author(s): </span>
                        <!-- is it possible make this into the author of the paper? -->
                        <span class="dispauthor"></span>
                </div>

        </div>


                <iframe  class="pdfviewer" src="/assets/{{$papers->file}}"></iframe>

</div>

@endsection