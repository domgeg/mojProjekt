<?php 
include ("header.php");
$sql	= "select id,naziv from smjerovi";
$query	= mysqli_query($conn,$sql);

   
include ("smjerovi.tpl.html");

?>

<?php include("footer.html"); ?>