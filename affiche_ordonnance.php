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
	redirect_to("Accueil");
}
// Connexion à la BDD (à personnaliser)
$link = mysqli_connect('localhost', 'root', '', 'spn');
// Si base de données en UTF-8, utiliser la fonction utf8_decode pour tous les champs de texte à afficher

// extraction des données à afficher dans le sous-titre (nom du voyageur et dates de son voyage)
$requete = "SELECT prescription.id, prescription.datord, ordonnance.ido, ordonnance.medic, ordonnance.poso, ordonnance.nbrjr, patient.civi, patient.nom FROM patient, ordonnance, prescription where prescription.id = ordonnance.idord and prescription.id = '$ids' and patient.idp = prescription.idp order by ordonnance.ido ASC";

$result = mysqli_query($link, $requete);
// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$data_voyageur = mysqli_fetch_array($result);
$sql1 = $link->query("SELECT prescription.id, prescription.datord, ordonnance.ido, ordonnance.medic, ordonnance.poso, ordonnance.nbrjr, patient.civi, patient.nom FROM patient, ordonnance, prescription where prescription.id = ordonnance.idord and prescription.id = '$ids' and patient.idp = prescription.idp order by ordonnance.ido ASC");
$row_cnt1 = $sql1->num_rows;
mysqli_free_result($result);

// Appel de la librairie FPDF
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php');


// Création de la class PDF polic.png

// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new FPDF('P','mm',array(148,210));

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
// Polices par défaut : Helvetica taille 9

$pdf->SetFont('Arial', 'B',15);




$pdf->SetFont('times', '',8);
$pdf->Cell(90  ,5,"MINISTERE DE L'INTERIEUR",0,0);
$pdf->Cell(90  ,5,"REPUBLIQUE DE DJIBOUTI",0,1);
$pdf->SetFont('times', '',6);
$pdf->Cell(90  ,5,"       ****************************",0,0);
$pdf->Cell(90  ,5,"               Unité – Egalité – paix",0,1);
$pdf->SetFont('times', '',8);
$pdf->Cell(70  ,5,"       POLICE NATIONALE",0,1);
$image = "polices.png";
$pdf-> Image($image,65,10,20,28);

$pdf->SetFont('times', '',6);
$pdf->Cell(90  ,5,"       ****************************",0,1);
$pdf->SetFont('times', '',8);
$pdf->Cell(90  ,5,"          SERVICE SANTE",0,0);
$pdf->Cell(90  ,5,"                    Date : ".$data_voyageur['datord'],0,1);

$pdf->Cell(189	,5,'',0,1);
$pdf->Cell(189	,5,'',0,1);
$pdf->Cell(189	,5,'',0,1);


$pdf->SetFont('Times', '',15);
$pdf->Cell(128  ,10,'ORDONNANCE MEDICALE',1,1,'C');
/*
$pdf->SetFont('Times', '',15);
$pdf->Cell(80  ,30,'Patient : '.$data_voyageur["nom"].'',1,1,'C');
*/
$pdf->Cell(189  ,2,'',0,1);
$pdf->Cell(189  ,2,'',0,1);
$pdf->Cell(189  ,2,'',0,1);
$pdf->Cell(189  ,2,'',0,1);
$pdf->SetFont('Times', 'B',10);
$pdf->Cell(15  ,0,'Patient : ',0,0);
$pdf->SetFont('Times', '',10);
$pdf->Cell(100  ,0,$data_voyageur["civi"].'  '.$data_voyageur['nom'].'',0,1);


$pdf->Cell(189	,5,'',0,1);
$pdf->Cell(189	,5,'',0,1);

$pdf->SetFont('Arial', 'BU',10);
//$pdf->Cell(38,8,'NO. ',1,0);
$pdf->Cell(4,8,"",0,0);
$pdf->Cell(65,8,'Medicament ',0,0);
//$pdf->Cell(38,8,'Reference ',1,0);
$pdf->Cell(30,8,'Posologie ',0,0);
$pdf->Cell(20,8,'Nombre de jours',0,1);


$pdf->SetFont('Arial', '',10);
$i = 0;
while($row = mysqli_fetch_assoc($sql1)){
	$i = $i + 1;
	$pdf->Cell(1,8,"",0,0);
    $pdf->Cell(68,8,$i.". - ".$row["medic"],0,0);
    $pdf->Cell(30,8,$row["poso"],0,0);
    $pdf->Cell(28,8,$row["nbrjr"],0,1);
	//$pdf->Cell(47,8,$column,1,0);
}
/*foreach($header as $row) {

//$counter = 1;
foreach($row as $column)
	/*if($counter > 3){
        $pdf->Cell(45,12,$column,1);
    }else{
        $pdf->Cell(90,12,$column,1);
    }
    ++$counter;
    /*$pdf->Cell(1,8,"",0,0);
    $pdf->Cell(60,8,$row["descr"],1,0);
    $pdf->Cell(18,8,$row["qt"],1,0,'R');
    $pdf->Cell(20,8,$row["prix"],1,0,'R');
    $pdf->Cell(30,8,$row["total"],1,0,'R');
    //$pdf->Cell(47,8,$column,1,0);
}*/

$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', 'B',10);

$medreq = "SELECT prescription.id, medecin.nom, consult.idcons, prescription.idpc FROM consult, medecin, prescription where prescription.id = '$ids' and consult.idcons = prescription.idpc and consult.numed = medecin.idmed limit 1";

$rreq = mysqli_query($link, $medreq);
// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$datg = mysqli_fetch_array($rreq);

$pdf->SetFont('Arial', '',10);
$did = "";
$iddd = $_SESSION['iduser'];
// Ajoutez la signature
$connd = new mysqli('localhost', 'root', '', 'spn');
$sqld = $connd->query("SELECT * FROM utilisateur where id = '$iddd'");
while($datad = $sqld->fetch_array()){
    $did = $datad['nom'];
}
//$pdf->SetFont('Arial', 'B',10);
//$pdf->addSignature($did);

$pdf->Line(10,183,140,183); 
$pdf->SetXY(15, 170);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(120,8,$did,0,0,'C');
$pdf->Cell(29,8,"",0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(50,8,"",0,1);
$pdf->Line(10,45,140,45); 
$pdf->Ln();
$pdf->SetFont('Arial', '',10);
$pdf->SetXY(0, 184);
$pdf->Cell(10,5,"",0,0);
$pdf->Cell(128,5,"Boulevard Hassan Gouled, FNP, Service Sante Police Nationale (SSPN)",0,1,'C');




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
