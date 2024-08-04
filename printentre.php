<?php
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 

if(!empty($_GET['id'])) {
	$ids = $_GET['id'];
}else{
	redirect_to("home.php");
}
// Connexion à la BDD (à personnaliser)
$link = mysqli_connect('localhost', 'root', '', 'spn');
// Si base de données en UTF-8, utiliser la fonction utf8_decode pour tous les champs de texte à afficher

// extraction des données à afficher dans le sous-titre (nom du voyageur et dates de son voyage)
$requete = "SELECT entre.ident, entre.num, entre.motif, entre.datent, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.codepatient, patient.idp, patient.nom, patient.age, patient.catp FROM patient, entre where entre.codepatient = patient.idp and entre.ident = '$ids'";



$result = mysqli_query($link, $requete);
// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$data_voyageur = mysqli_fetch_array($result);
mysqli_free_result($result);

if($data_voyageur["num_medecin"] == "GEN"){ $affectation = "Généraliste";}
if($data_voyageur["num_medecin"] == "DEN"){ $affectation = "Dentiste";}
if($data_voyageur["num_medecin"] == "CTC"){ $affectation = "Chirurgie thoracique cardiovasculaire";}
if($data_voyageur["num_medecin"] == "OPH"){ $affectation = "Ophtalmologie";}
if($data_voyageur["num_medecin"] == "CAN"){ $affectation = "Cancérologie";}
if($data_voyageur["num_medecin"] == "ORL"){ $affectation = "ORL";}
if($data_voyageur["num_medecin"] == "CAR"){ $affectation = "Cardiologie";}
if($data_voyageur["num_medecin"] == "ORT"){ $affectation = "Orthopédie";}
if($data_voyageur["num_medecin"] == "CHP"){ $affectation = "Chirurgie pédiatrique";}
if($data_voyageur["num_medecin"] == "PED"){ $affectation = "Pédiatrie";}
if($data_voyageur["num_medecin"] == "URO"){ $affectation = "Urologie";}
if($data_voyageur["num_medecin"] == "NEU"){ $affectation = "Neurologie";}
if($data_voyageur["num_medecin"] == "ANS"){ $affectation = "Anesthesie";}
if($data_voyageur["num_medecin"] == "GYO"){ $affectation = "Gynécologie obstétrique";}
if($data_voyageur["num_medecin"] == "CHG"){ $affectation = "Chirurgie générale";}

if($data_voyageur["catp"] == "POA"){ $catepatient = "Policier actif";}
if($data_voyageur["catp"] == "POR"){ $catepatient = "Policier retraité";}
if($data_voyageur["catp"] == "CIV"){ $catepatient = "Civile";}
if($data_voyageur["catp"] == "FPA"){ $catepatient = "Famille Policier actif";}
if($data_voyageur["catp"] == "FPR"){ $catepatient = "Famille Policier retraité";}
if($data_voyageur["catp"] == "MIL"){ $catepatient = "Militaire";}
if($data_voyageur["catp"] == "GEN"){ $catepatient = "Gendarme";}
if($data_voyageur["catp"] == "GAR"){ $catepatient = "Garde républicaine";}
if($data_voyageur["catp"] == "GAC"){ $catepatient = "Garde de côte";}



// Appel de la librairie FPDF
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php');

// Création de la class PDF polic.png

// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new FPDF('P','mm',array(100,150));

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9

$pdf->SetFont('Arial', 'B',15);
$image = "policop.png";
$pdf-> Image($image,7,66,88,88);

$pdf->Ln();
$pdf->Line(10,6,90,6);

$pdf->SetFont('Courier', '',21);
$pdf->Cell(6  ,5,'S   .   P   .   N',0,0);
$pdf->Ln();
$pdf->Line(10,20,90,20);
$pdf->Cell(189	,5,'',0,1);

$pdf->SetFont('Times', '',15);
$pdf->Cell(80  ,30,$data_voyageur["nom"].'',1,1,'C');

$pdf->Cell(189  ,2,'',0,1);
$pdf->SetFont('Times', 'B',15);
$pdf->Cell(30  ,15,utf8_decode('Âge : '.$data_voyageur["age"].''),0,0,'L');
$pdf->Cell(50  ,15,utf8_decode($catepatient),0,1,'R');
$pdf->SetFont('Times', '',15);
$data_voyageur['datent'];

$pdf->Cell(80  ,15,'Date : '.$data_voyageur["datent"].'  '.$data_voyageur['heura'].'',0,1,'C');
$data_voyageur['datent'];

$pdf->SetFont('Arial', 'B',100);
$pdf->Cell(80,30,$data_voyageur['num'],0,1,'C');

$pdf->SetFont('Arial', 'B',14);
$pdf->Cell(80,10,utf8_decode($affectation),0,1,'C');

$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', 'B',10);

// Fonction en-tête des tableaux en 3 colonnes de largeurs variables

// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau

$pdf->Output('test.pdf','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>
