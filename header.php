<?php 
include("db.php");
session_start();


if(isset($_POST["odjava"])){
  session_destroy();
  header ("location: login.php");

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8"/>
	<title>FER</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class ="container">
		<div class ="jumbotron">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="index.php">Fakultet</a>
 
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				  <?php if($_SESSION['tip_korisnika'] == 1): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="zahtjevZaPromjenom.php"> Zahtjevi za promjenom smjera <span class="sr-only"></span>
					</a>
				  </li>
				  <?php endif ?>
				  <?php if($_SESSION['tip_korisnika'] == 1): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="zahtjevZaUpisom.php"> Zahtjevi za upisom <span class="sr-only"></span>
					</a>
				  </li>
				  <?php endif ?>
				  <?php if($_SESSION['tip_korisnika'] == 2): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="mojProfil.php">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
					 Moj profil <span class="sr-only"></span></a>
				  </li>
				  <?php endif ?>
				  <?php if($_SESSION['tip_korisnika'] == 1): ?>
				  <li class="nav-item active">
					<a class="nav-link" href="studenti.php">Studenti<span class="sr-only"></span>
					</a>
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
			  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>
			  <input type = "submit" class="btn btn-light" name = "odjava" value ="Odjavi se">
			  </form>
			</nav>
		</div>
	</div>

</body>




