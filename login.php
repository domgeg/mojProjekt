<?php
include("db.php");
session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
		  $username = mysqli_real_escape_string($conn,$_POST['username']);
		  $password = mysqli_real_escape_string($conn,$_POST['password']); 
		  if(!empty($username)&&!empty($password)){
			
			
			$cookie_name = "istekVremena";
			$cookie_value = "vrijeme";
			setcookie($cookie_name, $cookie_value, time() + 3600, "/");



			  $sql = "SELECT id, tip_korisnika, ime_korisnika FROM korisnici WHERE username = '$username' && password = '$password'";
			  $result = mysqli_query($conn,$sql);
      
			  if(mysqli_num_rows($result)==0) 
			  {
				  echo "ne postoji";
			  }else{
				 list($id,$tip,$ime)=mysqli_fetch_array($result);
					$_SESSION['id']=$id;
					$_SESSION['tip_korisnika']=$tip;
					$_SESSION['ime_korisnika']=$ime;

				 header("location: index.php");
			  }          
              
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
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/>
				<path d="M0 0h24v24H0z" fill="none"/></svg>
				<input type="text" name="username"  class="form-control">
			</div> 
			<div class = "form-group">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/>
				<path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>				
				<input type="password" name="password" class="form-control">
			</div>
			</br>
			<input type = "submit" class="btn btn-info" name="login" value ="Prijavi se">
		</form>
		</br>
		<p><a href="registracija.php">Registriraj se</a></p>

	</div>


</div>
</body>
</html>