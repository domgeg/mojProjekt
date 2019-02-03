<?php 
include ("header.php");
$sql	= "select id,naziv from smjerovi";
$query	= mysqli_query($conn,$sql);


if(isset($_POST['noviSmjer'])){
  header("Location: noviSmjer.php");
}

if(isset($_POST['noviPredmet'])){
  header("Location: noviPredmet.php");
}   
include ("smjerovi.tpl.html");

?>

<?php include("footer.html"); ?>