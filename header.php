<?php 
include("db.php");
//include("login.php");
session_start();

//echo $_SESSION['naziv'];
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
          <li class="nav-item active">
            <a class="nav-link" href="#"> Studenti <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"> Moj profil <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"> Smjerovi <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        
      </div>
    </nav>
  </div>
    </div>

</body>




