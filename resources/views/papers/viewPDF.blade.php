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
                <div class="colpdf" data-label="Author(s):">{{ $paper->Authors }}</div>
                <div class="colpdf" data-label="Date Published):">{{ $paper->DatePublished }}</div>
                <div class="pdfbtnCont">
                    <button class="pdfBtn redBtn" onclick="location.href='{{route('MyProfile')}}'">Back</button>
                    <button class="pdfBtn redBtn" id="bookmarkBtn">Bookmark</button>
                    <button class="pdfBtn redBtn" id="citeBtn">Cite</button>
                </div>
            </li>

            <div id="bookmarkModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="bkClose close">&times;</span>
                    <div class="modalinfoCont">

                        <h2>Add bookmark</h2>

                        <form class="bookmarkInput" action="{{ route('Bookmarks')}} " method="POST" >
                            @csrf
                            <div class="group">      
                                <input class="inputInfo" type="text" name="BookmarkName" required>
                                <input class="idpaperauto inputInfo" type="text" name="paper_id"  value="{{$paper->PaperID}}" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="infoLabel">Bookmark Name</label>
                            </div>
                           
                            <br>
                            <br>

                            <button class="redBtn" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            
            </div>

            <div id="citeModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="ctClose close">&times;</span>
                    <div class="citemodalCont modalinfoCont">

                        <h2>Cite this paper</h2>
                        <br>
                        Important values you need:
                        <br>
                        Paper Title:{{$paper->PaperTitle}}
                        <br>
                        Author(s):{{$paper->Authors}}
                        <br>
                        Date Published:{{$paper->DatePublished}} 
                        <br>
                        Here are the most common formats
                        <li class="paperinfoHeader">
								APA
						</li>
			
						<li class="pdfpaperInfo">
							<div class="colpdf">
                            Johnson, S. (Publication Date).<i>Sample Title</i>.Publisher.Inc.Sample URL
                            </div>
						</li>

                        <li class="paperinfoHeader">
								MLA
						</li>
			
						<li class="pdfpaperInfo">
							<div class="colpdf">
                            Johnson, S.<i>Paper Title</i>, Publisher, Publication Date, URL 
                            </div>
						</li>

                        <li class="paperinfoHeader">
								IEEE
						</li>
			
						<li class="pdfpaperInfo">
							<div class="colpdf">
                            S, Johnson."Paper Title". Website Name. URL (accessed Nov. 22, 2022) 
                            </div>
						</li>
                    </div>
                </div>
            
            </div>

        </div>

        <div class="pdfdisplayCard">

            <iframe  class="pdfFrame" src="/assets/{{$paper->file}}#toolbar=0"></iframe>

        </div>

    </div>
</div>

<footer>
<p>Silliman University Digital Repository</p>
</footer>

<script>

    var bookmarkModal = document.getElementById("bookmarkModal");
    var citeModal = document.getElementById("citeModal");

    // Get the button that opens the modal
    var bookmarkBtn = document.getElementById("bookmarkBtn");
    var citeBtn = document.getElementById("citeBtn")

    // Get the <span> element that closes the modal
    var bkspan = document.getElementsByClassName("bkClose")[0];
    var ctspan = document.getElementsByClassName("ctClose")[0];

    // When the user clicks the button, open the modal 
    bookmarkBtn.onclick = function() {
        bookmarkModal.style.display = "block";
    }

    citeBtn.onclick = function() {
        citeModal.style.display = "block"
    }

    // When the user clicks on <span> (x), close the modal
    bkspan.onclick = function() {
        bookmarkModal.style.display = "none";
    }

    ctspan.onclick = function() {
        citeModal.style.display = "none";
    }

    

</script>

@endsection