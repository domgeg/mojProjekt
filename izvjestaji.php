<?php 
include("header.php");
require("fpdf181/fpdf.php");
$korisnici     = "select id, ime_korisnika from korisnici where tip_korisnika = 2";
$upitKorisnici = mysqli_query($conn, $korisnici);



if(isset($_POST['PDF'])){
	$korisnik = $_POST['korisnik'];
	$podaci = "select korisnici.ime_korisnika, korisnici.datum_rođenja, korisnici.adresa, korisnici.telefon, 
					smjerovi.naziv, skolska_godina.godina
			   from korisnici join zahtjevzaupisom on korisnici.id = zahtjevzaupisom.korisnik_id 
			   join smjerovi on smjerovi.id = zahtjevzaupisom.smjer_id 
			   join skolska_godina on skolska_godina.id = zahtjevzaupisom.skolskaGodina
			   join predmet on predmet.smjer_id=smjerovi.id";
	$upit = mysqli_query($conn, $podaci);

	$predmeti= "select naziv from predmet where smjer_id = (select smjer_id from zahtjevzaupisom where korisnik_id = '$korisnik')";
	$predmetiUpit = mysqli_query($conn, $predmeti);




		$pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AddFont("arial_hr_bd", "", "arial_iso88592_bd.php");
		$pdf->Cell(190, 10, iconv("UTF-8", "ISO-8859-2", 'FER', 1, 0, 'C', TRUE);
        $pdf->ln();
        $pdf->Cell(37.65, 10, iconv("UTF-8", "ISO-8859-2", 'Student'), 1, 0, 'C', TRUE);
        $pdf->Cell(36.45, 10, 'Datum rođenja', 1, 0, 'C', TRUE);
        $pdf->Cell(27.95, 10, iconv("UTF-8", "ISO-8859-2", 'Adresa'), 1, 0, 'C', TRUE);
        $pdf->Cell(32.75, 10, iconv("UTF-8", "ISO-8859-2", 'Telefon'), 1, 0, 'C', TRUE);
        $pdf->Cell(27.55, 10, iconv("UTF-8", "ISO-8859-2", 'Smjer'), 1, 0, 'C', TRUE);
        $pdf->Cell(27.55, 10, iconv("UTF-8", "ISO-8859-2", 'Akademska godina'), 1, 0, 'C', TRUE);
        $pdf->Cell(27.55, 10, iconv("UTF-8", "ISO-8859-2", 'Predmeti'), 1, 0, 'C', TRUE);
        $pdf->ln();



}



include("izvjestaji.tpl.html");
?>