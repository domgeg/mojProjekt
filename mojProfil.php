<?php 
include ("header.php");
$id=$_SESSION['id'];
$sql = "SELECT korisnici.ime_korisnika,korisnici.datum_rođenja,korisnici.adresa,korisnici.telefon, smjerovi.naziv 
		FROM korisnici 
			 inner join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
			 inner join smjerovi ON smjerovi.id = zahtjevzaupisom.smjer_id
		WHERE zahtjevzaupisom.korisnik_id = '$id'"; 
		
$result = mysqli_query($conn,$sql);
 
$smjer= "select id, naziv from smjerovi where naziv != 
            (SELECT smjerovi.naziv FROM korisnici inner join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id inner join smjerovi 
             ON smjerovi.id = zahtjevzaupisom.smjer_id WHERE zahtjevzaupisom.korisnik_id = '$id')";

$rezultat = mysqli_query($conn,$smjer);

include("mojProfil.tpl.html")



      
?>