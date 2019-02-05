<?php 
include("header.php");
$sql="select korisnici.id, korisnici.ime_korisnika, smjerovi.naziv, smjerovi.id from zahtjevzapromjenomsmjera 
	  join korisnici on korisnici.id = zahtjevzapromjenomsmjera.korisnik_id 
	  join smjerovi on smjerovi.id = zahtjevzapromjenomsmjera.zeljeni_smjer";

$upit=mysqli_query($conn, $sql);



if(isset($_POST['prihvati'])){
	$insert="insert into zahtjevzaupisom (korisnik_id, smjer_id, status)
			     values	($student, $smjer, 'Upisan')";
	$query=mysqli_query($conn,$insert);

  //update za korisnika da promjeni smjer u Moj profil
}



include("zahtjevZaPromjenom.tpl.html");
?>