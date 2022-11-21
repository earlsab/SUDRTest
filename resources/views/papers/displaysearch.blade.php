@extends ('layouts.main')

@section ('content')

@foreach($paper as $papers)
    {{$papers->PaperTitle}}
    {{$papers->PaperType}}
    {{$papers->Authors}}
    <button class="redBtn" onclick="location.href='{{route('viewPDF', $papers->PaperID)}}'">View</button>
@endforeach

@endsection