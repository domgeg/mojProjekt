<?php 
include("header.php");
require("fpdf17/fpdf.php");
//require("libxl-win-3.8.4/libxl-3.8.4.0/lib/libxl.lib");

$korisnici     = "select id, ime_korisnika from korisnici where tip_korisnika = 2";
$upitKorisnici = mysqli_query($conn, $korisnici);

$broj=0;


if(isset($_POST['PDF'])){

  
   $korisnik = $_POST['korisnik'];
   $podaci = "select korisnici.ime_korisnika, korisnici.datum_rođenja, korisnici.adresa, korisnici.PDF,
                     korisnici.telefon, smjerovi.naziv, skolska_godina.godina 
              from korisnici join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
              join smjerovi on smjerovi.id = zahtjevzaupisom.smjer_id 
              join skolska_godina on skolska_godina.id = zahtjevzaupisom.skolskaGodina 
              where korisnici.id = '$korisnik'";
   $upitPodaci = mysqli_query($conn, $podaci);
   
    
  
	 $pdf = new FPDF();
   $pdf->AddPage();
   $pdf->SetFont('arial', 'B', 16);
   $pdf->Cell(190, 10, 'Fakultet', 1, 0, 'C');
   $pdf->ln();
   
   $pdf->SetFont('arial', 'B', 10);
   $pdf->Cell(29.67, 10, iconv("UTF-8", "ISO-8859-2", 'Ime i prezime'), 1, 0, 'C');
   $pdf->Cell(27.67, 10, iconv("UTF-8", "ISO-8859-2", 'Godina rođenja'), 1, 0, 'C');
   $pdf->Cell(59.67, 10, iconv("UTF-8", "ISO-8859-2", 'Adresa'), 1, 0, 'C');
   $pdf->Cell(23.67, 10, iconv("UTF-8", "ISO-8859-2", 'Telefon'), 1, 0, 'C');
   $pdf->Cell(30.67, 10, iconv("UTF-8", "ISO-8859-2", 'Smjer'), 1, 0, 'C');
   $pdf->Cell(18.67, 10, iconv("UTF-8", "ISO-8859-2", 'Ak. godina'), 1, 0, 'C');
   $pdf->ln();
   
   
   while($row = mysqli_fetch_assoc($upitPodaci)){
   
      $ime          = $row['ime_korisnika'];
      $datumRodenja = $row['datum_rođenja'];
      $adresa       = $row['adresa'];
      $telefon      = $row['telefon'];
      $smjer        = $row['naziv'];
      $akGodina     = $row['godina'];
   
   
      $pdf->SetFont('arial', '', 10);
      $pdf->Cell(29.67, 10, iconv("UTF-8", "ISO-8859-2", $ime), 1, 0, 'C');
      $pdf->Cell(27.67, 10, iconv("UTF-8", "ISO-8859-2", $datumRodenja), 1, 0, 'C');
      $pdf->Cell(59.67, 10, iconv("UTF-8", "ISO-8859-2", $adresa), 1, 0, 'C');
      $pdf->Cell(23.67, 10, iconv("UTF-8", "ISO-8859-2", $telefon), 1, 0, 'C');
      $pdf->Cell(30.67, 10, iconv("UTF-8", "ISO-8859-2", $smjer), 1, 0, 'C');
      $pdf->Cell(18.67, 10, iconv("UTF-8", "ISO-8859-2", $akGodina), 1, 0, 'C');
      $pdf->ln();

   }
   
   $sqlUpdate = "update korisnici set PDF = 'Generirano' where id = '$korisnik'";
   $upitUpdate = mysqli_query($conn, $sqlUpdate);
   
   
    
  $pdf->Output();
  
  
}




include("izvjestaji.tpl.html");
?>