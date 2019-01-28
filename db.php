<?php 
	$localhost="localhost";
	$username="root";
	$password="";
	$baza="fakultet";



	$conn = mysqli_connect($localhost,$username,$password,$baza);
	if($conn){
	echo "spojeno";
	}else{
	echo "nije spojeno";
	}
	

?>