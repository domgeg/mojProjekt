<?php 
include("db.php");
session_start();

//echo $id=$_SESSION['id'];

if(isset($_POST["odjava"])){
  session_destroy();
  header ("location: login.php");

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
		<div class ="jumbotron">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="index.php">FER</a>
 
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				  <?php if($_SESSION['tip_korisnika'] == 1): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="zahtjevZaPromjenom.php"> Zahtjevi za promjenom smjera <span class="sr-only"></span>
					</a>
				  </li>
				  <?php endif ?>
				  <?php if($_SESSION['tip_korisnika'] == 2): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="mojProfil.php"> Moj profil <span class="sr-only"></span></a>
				  </li>
				  <?php endif ?>
 				  <?php if($_SESSION['tip_korisnika'] == 1): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="izvjestaji.php"> PDF izvjestaji <span class="sr-only"></span>
					</a>
				  </li>
				  <?php endif ?>
				</ul>    
			  </div>
			  <form method= "post">
			  <input type = "submit" class="btn btn-light" name = "odjava" value  ="Odjavi se">
			  </form>
			</nav>
		</div>
	</div>

</body>




