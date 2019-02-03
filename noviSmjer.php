<?php 
include("header.php");

If(isset($_POST['kreirajSmjer'])){
	$smjer=$_POST['smjer'];

	$sql  ="select naziv from smjerovi where naziv='$smjer'";
	$upit =mysqli_query($conn,$sql); 

	if(mysqli_num_rows($upit)==0){
		$sql="Insert into smjerovi (naziv) values ('$smjer')";
		$query=mysqli_query($conn,$sql);
		header("location: index.php");
	}else {
		header("location: index.php");
	}


}



include("noviSmjer.tpl.html");

?>



<?php include("footer.html"); ?>