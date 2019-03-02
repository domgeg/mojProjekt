<?php 
include ("header.php");
$id=$_SESSION['id'];
$sql = "SELECT korisnici.ime_korisnika,korisnici.datum_rođenja,korisnici.adresa,korisnici.telefon, korisnici.slika, smjerovi.naziv, zahtjevzaupisom.status 
		   FROM korisnici 
			  inner join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
			  inner join smjerovi ON smjerovi.id = zahtjevzaupisom.smjer_id
		   WHERE zahtjevzaupisom.korisnik_id = '$id'"; 	
$result = mysqli_query($conn,$sql);
//mysqli_set_charset($result,"utf8");


$smjer="SELECT smjerovi.naziv FROM korisnici inner join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id inner join smjerovi 
             ON smjerovi.id = zahtjevzaupisom.smjer_id WHERE zahtjevzaupisom.korisnik_id = '$id'";
$upit=mysqli_query($conn, $smjer);    



if(mysqli_num_rows($upit)!=0){ 
    $smjer= "select id, naziv from smjerovi where naziv != 
                (SELECT smjerovi.naziv FROM korisnici inner join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id inner join smjerovi 
                 ON smjerovi.id = zahtjevzaupisom.smjer_id WHERE zahtjevzaupisom.korisnik_id = '$id')";

    $rezultat = mysqli_query($conn,$smjer);
}else{
    $smjer    = "select id, naziv from smjerovi";
    $rezultat = mysqli_query($conn,$smjer);
}


if(isset($_POST['promjenaSmjera'])){

    $zeljeniSmjer=$_POST['smjerovi'];

    $insert        ="insert into zahtjevzapromjenomsmjera (korisnik_id, zeljeni_smjer) values ('$id', '$zeljeniSmjer')";
    $slanjeZahtjeva=mysqli_query($conn,$insert);
    header("Location: index.php");
   


}





include("mojProfil.tpl.html")



      
?>