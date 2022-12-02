@extends('layouts.main')

@section('content')


<div class="viewPDFCont">

    <div class="pdfinfoDisplay">

        <div class="pdfinfoCard">

            <li class="paperinfoHeader">
                Paper Information:
            </li>

            <li class="pdfpaperInfo">
                <div class="colpdf col-1" data-label="Title:">{{ $paper->PaperTitle }}</div>
                <div class="colpdf" data-label="Paper Type:">{{ $paper->PaperType }}</div>
                <div class="colpdf" data-label="College:">{{ $paper->College }}</div>
                <div class="colpdf" data-label="Author(s):">
                    @foreach($result as $results)
                        {{ $results->FullName }}
                    @endforeach  
                </div>
                <div class="colpdf" data-label="Content Adviser:">{{ $paper->ContentAdviser }}</div>
                <div class="colpdf" data-label="Date Completed:">{{ $paper->DateCompleted }}</div>
                <div class="colpdf" data-label="Key Words:">
                    @foreach($keyword as $keywords)
                        {{$keywords->tag_name}}
                    @endforeach
                </div>
                <div class="pdfbtnCont">
                    <button class="pdfBtn redBtn" onclick="location.href='{{route('MyProfile')}}'">Back</button>
                    <button class="pdfBtn redBtn" id="modalOneBtn">Update</button>
                </div>
            </li>

            <div id="modalOne" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m1Close close">&times;</span>
                    <div class="modalinfoCont">

                        <h2>Update Paper</h2>

                            @include('papers.updatepaper')
                    </div>
                </div>
            
            </div>

        </div>

        <div class="pdfdisplayCard">

            <iframe class="pdfFrame" src="/assets/{{$paper->file}}#toolbar=0"></iframe>

        </div>

    </div>
</div>

<footer>
<p>Silliman University Digital Repository</p>
</footer>

<script>

    var modalOne = document.getElementById("modalOne");

    // Get the button that opens the modal
    var modalOneBtn = document.getElementById("modalOneBtn");

    // Get the <span> element that closes the modal
    var m1span = document.getElementsByClassName("m1Close")[0];

    // When the user clicks the button, open the modal 
    modalOneBtn.onclick = function() {
        modalOne.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    m1span.onclick = function() {
        modalOne.style.display = "none";
    }

    

</script>

@endsection