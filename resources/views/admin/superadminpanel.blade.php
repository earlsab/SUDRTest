@extends('layouts.Adminauth')
@section('content')

<div class="ctrlpanel">
		<input id="tab1" type="radio" name="tabs" checked>
		<label class="uitab" for="tab1">Add Admin</label>
		  
		<input id="tab2" type="radio" name="tabs">
		<label class="uitab" for="tab2">Others</label>
		
		  
		<section id="content1">
			<form class="usersearch">
				<input type="text" placeholder="Search.." name="search2">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>

			<div style="overflow-x:auto;">
				<table id="userstable" class="stripedtable">
					<thead>
						<tr>
							<th>Add</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>College</th>
							<th>Role</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><button class="addbtn"><i class="fa-regular fa-square-plus"></i></button></td>
							<td>Juan</td>
							<td>Dela Cruz</td>
							<td>juandelacruz@su.edu.ph</td>
							<td>College of Computer Studies</td>
							<td>Admin</td>
						</tr>
				</table>
			</div>
		</section>
		  
		<section id="content2">
			<div class="catblock">
				<h3 class="heading2">Add College:</h3>
				<form class="addcat">
					<input type="text" placeholder="Add New College" name="collegename">
					<button type="submit"><i class="fa-solid fa-circle-plus"></i></button>
				</form>
		 	</div>

			 <div class="catblock">
				<h3 class="heading2">Add Paper Type:</h3>
				<form class="addcat">
					<input type="text" placeholder="Add New Paper Type" name="papername">
					<button type="submit"><i class="fa-solid fa-circle-plus"></i></button>
				</form>
		 	</div>
		</section>
		  
	</div>

	@endsection