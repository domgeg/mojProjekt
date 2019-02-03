<?php 
include("header.php");
$smjerovi  ="select id, naziv from smjerovi";
$upit = mysqli_query($conn,$smjerovi); 

If(isset($_POST['kreirajPredmet'])){
	$predmet =$_POST['predmet'];
	$smjerovi=$_POST['smjerovi'];

	$sql  = "select naziv from predmet where naziv='$predmet'";
	$upit = mysqli_query($conn,$sql); 

	if(mysqli_num_rows($upit)==0){
		$sql   = "Insert into predmet (smjer_id, naziv) values ('$smjerovi', '$predmet')";
		$query = mysqli_query($conn,$sql);
		header("location: index.php");
	}else {
		header("location: index.php");
	}


}



include("noviPredmet.tpl.html");

?>



<?php include("footer.html"); ?>