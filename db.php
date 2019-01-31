<?php 
	$localhost="localhost";
	$username="root";
	$password="";
	$baza="fakultet";



	$conn = mysqli_connect($localhost,$username,$password,$baza);
  mysqli_set_charset($conn,"utf8");

	if(!$conn){
	  echo "nije spojeno";
	}
	

?>