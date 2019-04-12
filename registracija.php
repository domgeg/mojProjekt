<?php 
include("db.php");


$smjer    = "select id, naziv from smjerovi";
$rezultat = mysqli_query($conn,$smjer);

$godina     = "select id, godina from skolska_godina";
$upitGodina = mysqli_query($conn, $godina);

If(isset($_POST['registracija'])){
  

        $ime           = $_POST['ime'];
        $datum         = $_POST['datumRodenja'];
        $adresa        = $_POST['adresa'];
        $telefon       = $_POST['telefon'];
        $korisnickoIme = $_POST['korisnickoIme'];
        $password      = $_POST['password'];
        $file          = $_FILES['fileToUpload'];
        $smjer         = $_POST['smjerovi'];
        $godine        = $_POST['godine'];
        $fileIme       = $_FILES['fileToUpload']['name'];
        $fileTempIme   = $_FILES['fileToUpload']['tmp_name'];
        $fileSize      = $_FILES['fileToUpload']['size'];
        $fileError     = $_FILES['fileToUpload']['error'];
        $fileType      = $_FILES['fileToUpload']['type'];
        $target_dir    = "/korisnici";
        $targer_file   = $target_dir . basename($_FILES['fileToUpload']['name']);
        $filext        =explode('.', '$fileIme');
        $fileLower     = strtolower(end($filext));
        $vrsta         = array('jpg', 'jpeg', 'png', 'pdf');
        
      
        //staviti $targer_file u $Lokacija
    
      
              $FileNewName = uniqid('', true). "." . $fileLower;
              $Lokacija = "korisnici/". $targer_file;
                if(move_uploaded_file($fileTempIme, $Lokacija)){
                  $insert = "Insert into korisnici (tip_korisnika, ime_korisnika, datum_rođenja, adresa, telefon, username, password, slika)  
                               values ('2','$ime', '$datum', '$adresa', '$telefon', '$korisnickoIme', '$password', '$targer_file')";
	                $sql    = mysqli_query($conn, $insert);  
                
                
                }else {
                  $insert = "Insert into korisnici (tip_korisnika, ime_korisnika, datum_rođenja, adresa, telefon, username, password)  
                               values ('2','$ime', '$datum', '$adresa', '$telefon', '$korisnickoIme', '$password')";
	                $sql    = mysqli_query($conn, $insert);  
                
                }
            
            
    $selectId = "select id from korisnici where ime_korisnika = '$ime' 
                and datum_rodenja = '$datum' 
                and adresa        = '$adresa' 
                and telefon       = '$telefon'
                and username      = '$korisnickoIme'
                and password      = '$password'";
    $sqlId   = mysqli_query($conn, $selectId);
   
    $insertZahtjev = "insert into zahtjevzaupisom (korisnik_id, skolskaGodina, smjer_id) values(
      (select id from korisnici where ime_korisnika = '$ime'
        and datum_rođenja = '$datum' 
        and adresa        = '$adresa' 
        and telefon       = '$telefon'
        and username      = '$korisnickoIme'
        and password      = '$password'),
      '$godine',
      '$smjer')";
  $sqlInsert     = mysqli_query($conn, $insertZahtjev);
      
          
          
        




  //header("location: login.php");
}




include("registracija.html");



?>