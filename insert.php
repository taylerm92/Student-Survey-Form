<?php
  $con = new mysqli("localhost","root","root","survey"); //sets up the connection

  if($con->connect_error) //if there was a problem with connecting then:
  {
    echo "Failed to connect to MySQL:".$con->connect_error; //show the error
  }
  else {
    echo "You are connected to database"."<br>"; //show that you are connected to database
  }

  if( isset($_POST['email'])) //if the form has set the email in POST
  {
    $email = $_POST['email'];
    $plans = $_POST['plans'];
    $strength = $_POST['strength'];
    $weakness = $_POST['weakness'];
    $timestamp = date('Y-m-d G:i:s');

    $sql = "INSERT INTO survey(timestamp, email, plans, strength, weakness)
            VALUES ( Now(),'$email','$plans','$strength','$weakness')"; //sql query to insert into database
    /*$sql = "DELETE FROM survey
            WHERE (email='$email')";*/
    if($con->query($sql) == false) //if the query doesn't work on the database
    {
      ?>
      <script>alert("It appears you have already submitted a survey with that email address. Please try again.")</script>
      <?php //indicating the database already contains that email.
    }
  }
?>
<!DOCTYPE html>
<html>
	<head></head>
  <body></body>
</html>
