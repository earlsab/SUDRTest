
<form class="paperInput" action="{{ route('papers.store') }} " method="POST" enctype="multipart/form-data">
@csrf
							<div class="group">      
								<input class="inputchecker1 inputInfo" type="text" name="PaperTitle" required>
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
								<option selected="true" disabled="disabled">Select College</option>
								<option>asdasd</option>
								<option>asdasdasd</option>
							</select>

							<select class="selectType" name="PaperType">
								<option selected="true" disabled="disabled">Select Paper Type</option>
								<option>Thesis</option>
								<option>Capstone</option>
							</select>

							<div class="addPDF">
								
									<input class="redBtn" 
									name='file' type="file" accept="application/pdf" >
							</div>

							<br>
							<br>

							<button class="redBtn" type="submit">Submit Paper</button>
						</form>

