<?php
header('Content-Type: text/html; charset=utf-8');
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();
require_once("includes/db_connection.php");
require_once("includes/functions.php");
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php');

$idFacture = $_GET['id'];

class PDF extends FPDF
{
    // Header
    function Header()
    {
        global $idFacture; // Utiliser global pour accéder à la variable $idFacture

        // Logo
        $this->Image('police.png', 10, 6, 20);

        // Set font
        $this->SetFont('Arial', 'B', 12);
        // Colonne 1
        $this->SetX(10);
        $this->Cell(95, 10, 'Numéro : ' . $idFacture, 0, 0);

        // Set font
        $this->SetFont('Arial', '', 12);
        $this->Cell(95, 10, 'Date: ' . date('d/m/Y'), 0, 1);
        $this->Cell(95, 10, 'Emis par: ' . $this->emetteur, 0, 0);
        $this->Cell(95, 10, 'Pays: ' . $this->pays, 0, 1);

        // Set font for header title
        $this->SetFont('Arial', 'B', 15);
        // Couleur du texte
        $this->SetTextColor(33, 37, 41); // Couleur Bootstrap "dark"
        
        // Saut de ligne
        $this->Ln(10);
    }

    // Footer
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Set font
        $this->SetFont('Arial', 'I', 8);
        // Couleur du texte
        $this->SetTextColor(108, 117, 125); // Couleur Bootstrap "secondary"
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Table
    function FancyTable($header, $data, $total)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(134, 142, 150); // Couleur Bootstrap "secondary"
        $this->SetTextColor(255);
        $this->SetDrawColor(108, 117, 125); // Couleur Bootstrap "secondary"
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-tête
        $w = array(95, 30); // Ajuster les largeurs des colonnes
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(222, 226, 230); // Couleur Bootstrap "light"
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, number_format($row[1]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Ligne de séparation à la fin des données
        $this->Cell(array_sum($w), 0, '', 'T');
        $this->Ln();
        // Afficher le montant total
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($w[0], 8, 'Total', 1, 0, 'R', true);
        $this->Cell($w[1], 8, 'FDJ ' . number_format($total, 2, ',', ' '), 1, 0, 'R', true);
    }
}

// Empêcher toute sortie HTML avant la génération du PDF
ob_start();

// Récupérer les données de la base de données
$con = mysqli_connect("localhost", "root", "", "spn");

$query = "SELECT patient.idp, patient.civi, patient.catp, patient.address, patient.tel, patient.nom, facture.idf 
          FROM patient, facture 
          WHERE patient.idp = facture.idp AND facture.idf = '$idFacture'";
$query_run = mysqli_query($con, $query);
$patient_data = mysqli_fetch_assoc($query_run);

if (!$patient_data) {
    die('Erreur : aucune donnée trouvée pour cette facture.');
}

$query_details = "SELECT * FROM facture WHERE idp = '{$patient_data['idp']}' AND etat = 'IMPAYER'";
$query_run_details = mysqli_query($con, $query_details);

// Créer le PDF
$pdf = new PDF('P', 'mm', 'A5');
$pdf->AliasNbPages();
$pdf->AddPage();

$fik = "Non spécifié";
if ($patient_data['catp'] == "CCC") {
    $fik = "Choisir";
} elseif ($patient_data['catp'] == "POA") {
    $fik = "Policier active";
} elseif ($patient_data['catp'] == "POR") {
    $fik = "Policier rétraité";
} elseif ($patient_data['catp'] == "CIV") {
    $fik = "Civile";
} elseif ($patient_data['catp'] == "FPA") {
    $fik = "Famille Policier active";
} elseif ($patient_data['catp'] == "FPR") {
    $fik = "Famille Policier rétraité";
} elseif ($patient_data['catp'] == "MIL") {
    $fik = "Militaire";
} elseif ($patient_data['catp'] == "GEN") {
    $fik = "Gendarme";
} elseif ($patient_data['catp'] == "GAR") {
    $fik = "Garde républicaine";
} elseif ($patient_data['catp'] == "GAC") {
    $fik = "Garde de côte";
}

// Informations du patient
$pdf->SetFillColor(220, 220, 220); // Gris clair
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(0, 4, "Facture pour.", 0, 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 8, "{$patient_data['civi']} {$patient_data['nom']}", 0, 1, 'L', true);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 4, "{$fik}", 0, 1);
$pdf->Cell(0, 4, utf8_decode("Tél: {$patient_data['tel']}"), 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5, "", 0, 1);

// Tableau des factures
$header = array('Description', 'Montant');
$data = array();
$montant_total = 0;
$montant_cnss_total = 0;

while ($row = mysqli_fetch_assoc($query_run_details)) {
    // Vérification des indices
    if (isset($row['desg']) && isset($row['mt'])) {
        $data[] = array($row['desg'], $row['mt']);
        $montant_total += $row['mt'];
        $montant_cnss_total += isset($row['mt_cnss']) ? $row['mt_cnss'] : 0;
    }
}

$pdf->FancyTable($header, $data, $montant_total);

// Sauvegarder le fichier PDF
ob_end_clean();
$pdf->Output('D', 'facture.pdf');
?>