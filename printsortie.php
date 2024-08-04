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
$requete = "SELECT sortie_hos.ids, sortie_hos.date_sor_hos, sortie_hos.pardr, sortie_hos.revoir, sortie_hos.date_deliv, patient.idp, patient.nom, patient.age, patient.catp, hospitalisation.idh FROM patient, sortie_hos, hospitalisation where sortie_hos.ids = hospitalisation.idh and sortie_hos.ids = '$ids' and hospitalisation.idp = patient.idp";



$result = mysqli_query($link, $requete);
// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$data_voyageur = mysqli_fetch_array($result);
mysqli_free_result($result);



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
$pdf->Cell(30  ,15,utf8_decode('Code : '.$data_voyageur["idh"].''),0,0,'L');
$pdf->Cell(50  ,15,utf8_decode($catepatient),0,1,'R');
$pdf->SetFont('Times', '',15);
$data_voyageur['date_sor_hos'];

$pdf->Cell(80  ,15,'Date : '.$data_voyageur["date_sor_hos"],0,1,'C');
$data_voyageur['date_sor_hos'];

$pdf->SetFont('Arial', 'B',20);
$pdf->Cell(80,30,'Ordonnance de sortie',0,1,'C');

$pdf->SetFont('Arial', 'B',12);
$codmed = $data_voyageur['pardr'];
$mede = $DB->query("SELECT * FROM medecin where idmed = '$codmed'");
foreach ($mede as $medes):
  $oper_nom = $medes->nom;
endforeach;
$pdf->Cell(80  ,15,utf8_decode('Médecin : '.$oper_nom),0,1,'C');


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
