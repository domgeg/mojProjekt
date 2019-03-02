<?php 
include("header.php");

$sql	= "select korisnici.ime_korisnika, korisnici.datum_rođenja, korisnici.adresa, korisnici.telefon, smjerovi.naziv 
		   from korisnici join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
		   join smjerovi on smjerovi.id = zahtjevzaupisom.smjer_id";
$query	= mysqli_query($conn,$sql);

if(isset($_POST["pretraživanje"])){
  
  $pronadiIme = $_POST['pretraga'];
  
  $pronadiStudenta="select korisnici.ime_korisnika, korisnici.datum_rođenja, korisnici.adresa, korisnici.telefon, smjerovi.naziv 
		         from korisnici join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
		         join smjerovi on smjerovi.id = zahtjevzaupisom.smjer_id
             where ime_korisnika like '%$pronadiIme%'";
  
  $query=mysqli_query($conn,$pronadiStudenta);             


}




   
include ("studenti.tpl.html");


?>