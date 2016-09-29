<?php
    session_start();
    if ( isset($_POST["account"]) && isset($_POST["pw"]) ) //if the account and password were submitted from login form:
    {
        unset($_SESSION["account"]);  // Logout current user
        if ( $_POST['pw'] == 'admin' ) // if the password submitted equals admin:
        {
            $_SESSION["account"] = $_POST["account"]; // set the session account to the submitted string
            $_SESSION["success"] = "Logged in.";
            header( 'Location: admin.php' ) ; // return to the admin console page
            return;
        }
        else
        {
            $_SESSION["error"] = "Incorrect password."; // else authenticate wrong password
            header( 'Location: login.php' ) ; // redirect back to the login page to try again
            return;
        }
    }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Bootstrap MaxCDN and other css used -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/survey/css/style.css">
  </head>
  <body style="font-family: sans-serif;">
    <div class="logincontainer">
      <h1>Please Log In</h1>
      <?php
          if ( isset($_SESSION["error"]) ) {
              echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
              unset($_SESSION["error"]);
          }
          if ( isset($_SESSION["success"]) ) {
              echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
              unset($_SESSION["success"]);
          }
      ?>
      <form method="POST">
  			<div class="form-group">
  	      <label for="account">Account:</label>
  	      <input required type="text" class="form-control login" name="account" id="account">
      	</div>
        <div class="form-group">
          <label for="pw">Password:</label>
          <input required type="password" class="form-control login" name="pw" id="pw">
        </div>
        <button type="submit" class="btn btn-default" value="Log In">Log In</button>

      </form>
      <a  href="index.php"><br>Back to survey</a>
    </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
