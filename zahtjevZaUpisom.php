<?php
include("header.php");

$sql="select zahtjevzaupisom.id, korisnici.ime_korisnika, zahtjevzaupisom.korisnik_id, zahtjevzaupisom.smjer_id, smjerovi.naziv 
	  from zahtjevzaupisom 
	  join korisnici on korisnici.id = zahtjevzaupisom.korisnik_id 
	  join smjerovi on smjerovi.id = zahtjevzaupisom.smjer_id 
	  where status is null";
$upit = mysqli_query($conn, $sql);


if(isset($_GET['kor_id']) && isset($_GET['sm_id'])){

  $zahtjevId    = $_GET['zh_id'];
  $kojikorisnik = $_GET['kor_id'];
  $kojismjer    = $_GET['sm_id'];

}

if(isset($_POST['Upisi'])){

	$update="update zahtjevzaupisom set status='Upisan' where korisnik_id='$kojikorisnik'";
	$query =mysqli_query($conn,$update);

    header("location: index.php");  
}
if(isset($_POST['Obrisi'])){
  
  //$obrisiKorisnika = "delete from korisnici where id = '$kojikorisnik'";
  //$upitkorisnici   = mysqli_query($conn, $obrisiKorisnika); 

  $odbaci     ="delete from zahtjevzaupisom where id = '$zahtjevId'";
  $queryOdbaci=mysqli_query($conn, $odbaci);
  
  header("location: index.php");

}



include ("zahtjevZaUpisom.tpl.html")
?>