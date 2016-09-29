<?php
  include 'insert.php';
  session_start();
?>
<?php
if( isset($_POST['delete'])) // if an email has been assigned to the POST delete:
{
  $delete = $_POST['delete'];
  $sql = "DELETE FROM survey
          WHERE (email='$delete')"; // sql query for deleting a tuple with a specific email
  $result = $con->query($sql);
}
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
    <?php
      if ( !isset($_SESSION["account"])) // if the account isn't stored in session:
      {
        header('Location: login.php'); // redirect to the login page
      }
      else //else display the admin page.
      {
        # code...

    ?>
    <div class="admin">
    <div class="container">
      <div class="row">
  			<div class="col-sm-6">
  				<h2>Admin Console</h2>
  			</div>
  			<div class="col-sm-6" style="text-align:right; padding-top: 40px;"> <!-- link to go back to the survey screen -->
  				<a  href="index.php">Back to survey</a>
  		  </div>
  		</div>
    <p>Results for CS survey</p>
    <?php
      $sql = "SELECT * FROM survey ORDER BY timestamp desc";
      $result = $con->query($sql);
    ?>
    <table class="table .table-bordered">
    <?php
      // Print the table's header row
      $numFields = $result->field_count;
      $finfo = $result->fetch_fields();
      ?>
      <tr style="background-color: black; border: 1px solid white;">
      <?php
      foreach ($finfo as $val)
      {
          echo "<td><b>" . $val->name . "</b></td>";
      }
      echo "</tr>";
      // Print each row
      while($row = $result->fetch_row())
      {
         echo "<tr>";
         for($j = 0; $j < $numFields; $j++)
         {
             echo "<td>" . $row[$j] . "</td>";
         }
         echo "</tr>";
      }

      echo "</table>";
    ?>
      <!-- form for deleting tuples from database by email -->
      <form action="admin.php" method="POST">
        <div class="form-group">
  			  <label for="delete">Delete all rows where email = </label>
  			  <select class="form-control" name="delete" id="delete">
            <?php
              $sql = "SELECT DISTINCT email
                      FROM survey"; //query for selecting each email only once
              $result = $con->query($sql);
              while ($row=$result->fetch_assoc())
              {
             	  foreach ($row as $fieldname =>$email) //for each email in database:
             	    echo "<option>$email</option>"; //use it as an option in the drop down
              }
            ?>
  			  </select>
  			</div>
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-default">Submit</button> <!-- Submit button for deleting -->
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <p><input type="button" class="btn btn-default" value="Logout" onclick="location.href='logout.php'; return false"></p>
          </div>
        </div>


      </form>
    </div>
  </div>
  <!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php } ?> <!-- end of if satement for login -->
  </body>
</html>
