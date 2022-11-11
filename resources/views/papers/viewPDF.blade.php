@extends('layouts.main')

@section('content')

<div class="mypapersblock">
        <h1 class="papersheading"><b>{{ $paper->PaperTitle }}</b></h1>	        
        <hr class="modline">

        
       <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookmark">
  Bookmark This
</button>

<!-- Modal -->
<div class="modal fade" id="addBookmark" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Bookmark</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('Bookmarks')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                        <label>Bookmark Name</label>
                        <input type="text" class="form-control" name="BookmarkName">
                </div>
                <br/>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

        <div class="paperinfoblock">
                <!-- AUTHORS
                <div class="paperinfo">
                        <span>Author(s): </span>
                        
                        <span class="dispauthor"></span>
                </div>
                -->
        </div>


                <iframe  class="pdfviewer" src="/assets/{{$paper->file}}"></iframe>

</div>

@endsection