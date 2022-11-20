@extends('layouts.main')

@section('content')


<div class="viewPDFCont">

    <div class="pdfinfoDisplay">

        <div class="pdfinfoCard">

            <li class="paperinfoHeader">
                Paper Information:
            </li>

            <li class="pdfpaperInfo">
                <div class="colpdf col-1" data-label="Title:">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                    optio,</div>
                <div class="colpdf" data-label="Paper Type:">Thesis</div>
                <div class="colpdf" data-label="College:">CCS</div>
                <div class="colpdf" data-label="Authors:">ms. meow meow</div>
                <div class="pdfbtnCont">
                    <button class="pdfBtn redBtn">Back</button>
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

                        <form class="bookmarkInput">

                            <div class="group">      
                                <input class="inputInfo" type="text" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="infoLabel">Bookmark Name</label>
                            </div>

                            <br>
                            <br>

                            <button class="redBtn">Add</button>
                        </form>
                    </div>
                </div>
            
            </div>

            <div id="citeModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="ctClose close">&times;</span>
                    <div class="modalinfoCont">

                        <h2>Cite this paper</h2>
                        add citation here
                        
                    </div>
                </div>
            
            </div>

        </div>

        <div class="pdfdisplayCard">

            <iframe  class="pdfFrame" src=""></iframe>

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