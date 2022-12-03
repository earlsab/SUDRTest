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
                        @if($loop->last)
                        {{$keywords->tag_name}}
                        @else
                        {{$keywords->tag_name}},
                        @endif
                    @endforeach
                </div>
                <div class="pdfbtnCont">
                    <button class="pdfBtn redBtn" onclick="location.href='{{route('MyProfile')}}'">Back</button>
                    <button class="pdfBtn redBtn" id="modalOneBtn">Bookmark</button>
                    <button class="pdfBtn redBtn" id="modalTwoBtn">Cite</button>
                </div>
            </li>

            <div id="modalOne" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m1Close close">&times;</span>
                    <div class="modalinfoCont">

                        <h2>Add bookmark</h2>

                        <form class="bookmarkInput" action="{{ route('Bookmarks')}} " method="POST" >
                            @csrf
                            <div class="group">      
                                <input class="inputInfo" type="text" name="BookmarkName" required>
                                <input class="idpaperauto" type="text" name="paper_id"  value="{{$paper->PaperID}}" required>
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

            <div id="modalTwo" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m2Close close">&times;</span>
                    <div class="modalTwoCont modalinfoCont">

                        <h2>Cite this paper</h2>
                        <br>
                        Here are the most common formats
                        <li class="paperinfoHeader">
								APA
						</li>
			
						<li class="pdfpaperInfo">
							<div>
                                
                                @foreach($cite as $cites)
                                    {{$cites->Citation}}
                                @endforeach
                                
                            .({{$paper->DateCompleted}}).<i>{{$paper->PaperTitle}}</i>.Silliman University.[sudr.online]
                            </div>
						</li>

                        <li class="paperinfoHeader">
								MLA
						</li>
			
						<li class="pdfpaperInfo">
							<div>

                            @foreach($cite as $cites)
                                {{$cites->Citation}}
                            @endforeach
                            
                            .<i>{{$paper->PaperTitle}}</i>, Silliman University,({{$paper->DateCompleted}}),[sudr.online]
                            </div>
						</li>

                        <li class="paperinfoHeader">
								IEEE
						</li>
			
						<li class="pdfpaperInfo">
							<div>
                                
                            @foreach($cite as $cites)
                                {{$cites->Citation}}
                            @endforeach
                            
                            ."{{$paper->PaperTitle}}". [sudr.online]. URL (Date Accessed) 
                            </div>
						</li>
                    </div>
                </div>
            
            </div>
            
            @if($paper->UploaderUserID == ($user = \Auth::guard('web')->user()->UserID))
            <div id="modalThree" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m3Close close">&times;</span>
                    <div class="modalinfoCont">
                        <h2>Edit Paper</h2>
                        @include('papers.updatepaper')
                    </div>
                </div>
            </div>
            @endif

        </div>

        <div class="pdfdisplayCard">

            <iframe  class="pdfFrame" src="/assets/{{$paper->file}}#toolbar=0"></iframe>

        </div>

    </div>

    @if(Session::has('message'))        
		    <div id="modalFour" style="display:block" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="m4Close close">&times;</span>
                    <div class="modalinfoCont">
                        <h2>Success!</h2>
						<br>
                        {{Session::get('message')}}  
                    </div>
                </div>
            </div>
	 @endif
    
</div>

<footer>
<p>Silliman University Digital Repository</p>
</footer>

<script>

    var modalOne = document.getElementById("modalOne");
    var modalTwo = document.getElementById("modalTwo");
    var modalThree = document.getElementById("modalThree");
    var modalFour = document.getElementById("modalFour");

    // Get the button that opens the modal
    var modalOneBtn = document.getElementById("modalOneBtn");
    var modalTwoBtn = document.getElementById("modalTwoBtn");
    var modalThreeBtn = document.getElementById("modalThreeBtn");

    // Get the <span> element that closes the modal
    var m1span = document.getElementsByClassName("m1Close")[0];
    var m2span = document.getElementsByClassName("m2Close")[0];
    var m3span = document.getElementsByClassName("m3Close")[0];
    var m4span = document.getElementsByClassName("m4Close")[0];

    // When the user clicks the button, open the modal 
    modalOneBtn.onclick = function() {
        modalOne.style.display = "block";
    }

    modalTwoBtn.onclick = function() {
        modalTwo.style.display = "block"
    }

    modalThreeBtn.onclick = function() {
        modalThree.style.display = "block"
    }

    // When the user clicks on <span> (x), close the modal
    m1span.onclick = function() {
        modalOne.style.display = "none";
    }

    m2span.onclick = function() {
        modalTwo.style.display = "none";
    }

    m3span.onclick = function() {
        modalThree.style.display = "none";
    }

	m4span.onclick = function() {
		modalFour.style.display = "none";
    }



</script>

@endsection