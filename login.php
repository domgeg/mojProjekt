<?php
include("db.php");
session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
		  $username = mysqli_real_escape_string($conn,$_POST['username']);
		  $password = mysqli_real_escape_string($conn,$_POST['password']); 
		  if(!empty($username)&&!empty($password)){
			  $sql = "SELECT tip_korisnika, naziv FROM korisnici WHERE username = '$username' and password = '$password'";
			  $result = mysqli_query($conn,$sql);
      
			  if(mysqli_num_rows($result)==0) 
			  {
				  echo "ne postoji";
			  }else{
				 //session_register("myusername");
				 list($tip,$ime)=mysqli_fetch_array($result);
					$_SESSION['tip_korisnika']=$tip;
					$_SESSION['naziv']=$ime;
			  }          
				//echo $ime;
				 header("location: index.php");
              
			  }
		else{
			 echo "ne postoji";
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
		<form action="login.php" method="post">
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