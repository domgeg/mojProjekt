<?php
include("db.php");
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM korisnici WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $username;
         
         header("location: welcome.php");
      }
   }



?>



<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>FER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>

<div class ="container">
	<div class="col-xs-6">
		<form method="post">
			<div class = "form-group">
				<label>Unesite korisničko ime:</label>
				<input type="text" name="username" class="form-control">
			</div> 
			<div class = "form-group">
				<label>Unesite lozinku:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type = "submit" class="btn btn-info" name="login" value ="Prijavi se">
		</form>
	</div>


</div>
</body>
</html>