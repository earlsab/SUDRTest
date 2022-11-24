
<form class="updatePaperForm" action="{{ route('papers.update', $paper->PaperID) }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="group">      
								<input class="inputchecker1 inputInfo" type="text" name="PaperTitle"  required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="infoLabel">Paper Title</label>
							</div>

							<div class="group">      
								<input class="inputchecker2 inputInfo" id="inputID" type="text" name="Authors" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="infoLabel">Author(s)</label>
							</div>

							<select class="selectType" name="PaperType">
                                
								<option selected="true" disabled="disabled">Select Paper Type</option>

								@foreach($PT as $PaperType)
                                	<option value="{{$PaperType->PaperTypeName}}">{{$PaperType->PaperTypeName}}</option>
                                @endforeach
                                
							</select>

							<input class="datepicker selectType" id="inputID" type="date" placeholder="Date Published" name="DatePublished" required>

                            <div class="addPDF">
							@csrf
									<input class="redBtn" 
									name='file' type="file" accept="application/pdf" >
							</div>

							<br>
							<br>

							<button class="redBtn" type="submit">Update Paper</button>
                        </form>
