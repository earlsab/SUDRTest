@extends('layouts.main')

@section('content')

<div class="mypapersblock">
        <h1 class="papersheading"><b>{{ $papers->title }}</b></h1>	        
        <hr class="modline">

        <div class="paperinfoblock">
                <!-- AUTHORS
                <div class="paperinfo">
                        <span>Author(s): </span>
                        
                        <span class="dispauthor"></span>
                </div>
                -->
        </div>


                <iframe  class="pdfviewer" src="/assets/{{$papers->file}}"></iframe>

</div>

@endsection