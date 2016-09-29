<?php
	include 'insert.php'; //reference file to insert data into database
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN and other css used -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/survey/css/style.css">
	</head>
	<body>
		<div class="form-holder">
			<div class="layer">
	<div class="container"> <!-- container for entire webpage-->
		<div class="row">
			<div class="col-sm-6">
				<h2>Exit Survey</h2>
			</div>
			<div class="col-sm-6 admin-link">
				<a href="admin.php">Admin Login</a> <!-- Link to the admin console (or login) -->
		  </div>
		</div>
		<p>Department of Computer Science -- Valdosta State University</p>
	  <form action="index.php" method="POST"> <!-- Start of form -->
			<div class="form-group"> <!-- Email text field -->
	      <label for="email">Email:</label>
	      <input required type="email" class="form-control" name="email" id="email" placeholder="Example: yourname@valdosta.edu"> <!-- created validation for email -->
    	</div>

			<div class="form-group"> <!-- Drop down for future plans -->
			  <label for="plans">What are your plans after graduation?</label>
			  <select class="form-control" name="plans" id="plans">
			    <option>Back to school - at Valdosta State</option>
			    <option>Back to school - elsewhere</option>
			    <option>Employment in CS or related field</option>
			    <option>Employment in some other field</option>
					<option>Taking a year off!</option>
					<option>Not sure yet</option>
					<option>Other</option>
			  </select>
			</div>

			<div class="form-group"> <!-- Text box for Strengths -->
			  <label for="strength">What do you perceive to be the strengths of the computer science program?</label>
			  <textarea required class="form-control" rows="10" name="strength" id="strength" style="resize:none;"></textarea>
			</div>

			<div class="form-group"> <!-- Text box for Weakness -->
			  <label for="weakness">What do you perceive to be the weaknesses of the computer science program?</label>
			  <textarea required class="form-control" rows="10" name="weakness" id="weakness" style="resize:none;"></textarea>
			</div>

			<button type="submit" class="btn btn-default" style="margin-bottom: 10px;">Submit</button> <!-- button to submit form -->

		</form>
  </div>
</div>
</div>
	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
