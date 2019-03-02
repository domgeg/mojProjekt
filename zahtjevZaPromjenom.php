<?php 
include("header.php");
$sql="select zahtjevzaupisom.id, korisnici.ime_korisnika, smjerovi.naziv, zahtjevzapromjenomsmjera.korisnik_id,zahtjevzapromjenomsmjera.zeljeni_smjer 
    from zahtjevzapromjenomsmjera 
	  join korisnici on korisnici.id = zahtjevzapromjenomsmjera.korisnik_id 
	  join smjerovi on smjerovi.id = zahtjevzapromjenomsmjera.zeljeni_smjer
    join zahtjevzaupisom on zahtjevzaupisom.korisnik_id = korisnici.id";

$upit=mysqli_query($conn, $sql);


if(isset($_GET['kor_id']) && isset($_GET['sm_id'])){

  $zahtjevId    = $_GET['zh_id'];
  $kojikorisnik = $_GET['kor_id'];
  $kojismjer    = $_GET['sm_id'];

}

if(isset($_POST['prihvati'])){

	$update="update zahtjevzaupisom set smjer_id = '$kojismjer', status='Promijenjen' where korisnik_id='$kojikorisnik'";
	$query =mysqli_query($conn,$update);

  $delete     ="delete from zahtjevzapromjenomsmjera where id < '$zahtjevId' and korisnik_id = '$kojikorisnik'";
  $queryDelete=mysqli_query($conn, $delete);
  header("location: index.php");  
}

if(isset($_POST['odbaci'])){
  $odbaci     ="delete from zahtjevzapromjenomsmjera where korisnik_id = '$kojikorisnik' and zeljeni_smjer='$kojismjer'";
  $queryOdbaci=mysqli_query($conn, $odbaci);
  header("location: index.php");

}


include("zahtjevZaPromjenom.tpl.html");
?>