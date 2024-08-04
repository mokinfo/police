<?php
require('fpdf/fpdf.php'); // Assurez-vous que le chemin vers fpdf.php est correct



$id = 3;

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'spn');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du patient
$sql = $conn->query("SELECT hospitalisation.*, patient.* FROM patient 
                      JOIN hospitalisation ON patient.idp = hospitalisation.idp 
                      WHERE hospitalisation.idh = '$id'");

$data = $sql->fetch_assoc();
if (!$data) {
    die("Aucune donnée trouvée");
}

// Création du PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Titre
$pdf->Cell(0, 10, 'Hospitalisation numéro : ' . $data['idh'], 0, 1, 'C');
$pdf->Ln(10);

// Informations générales
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Information générale', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nom du patient : ' . $data['nom'], 0, 1);
$pdf->Cell(0, 10, 'Date de naissance : ' . $data['daten'], 0, 1);

$categories = [
    'POA' => 'Policier actif',
    'POR' => 'Policier retraité',
    'CIV' => 'Civile',
    'FPA' => 'Famille Policier actif',
    'FPR' => 'Famille Policier retraité',
    'MIL' => 'Militaire',
    'GEN' => 'Gendarme',
    'GAR' => 'Garde républicaine',
    'GAC' => 'Garde de côte'
];
$catepatient = $categories[$data['catp']] ?? 'NSP';

$pdf->Cell(0, 10, 'Catégorie de patient : ' . $catepatient, 0, 1);
$pdf->Cell(0, 10, 'Matricule : ' . $data['matricule'], 0, 1);
$pdf->Cell(0, 10, 'Adresse : ' . $data['address'], 0, 1);
$pdf->Cell(0, 10, 'Numéro téléphone : ' . $data['tel'], 0, 1);

// Hospitalisé par
$pdf->Cell(0, 10, 'Hospitalisé par : ' . $data['hospar'], 0, 1);
$pdf->Cell(0, 10, 'Médecin traitant : ' . $data['med_trai'], 0, 1);
$pdf->Cell(0, 10, 'Date hospitalisé : ' . $data['date_hos'], 0, 1);
$pdf->Cell(0, 10, 'Motif : ' . $data['motif_hos'], 0, 1);

// Service
$services = [
    'MI' => 'Médecine',
    'PD' => 'Pédiatrie',
    'OP' => 'Chirurgie',
    'GO' => 'Gynécologie obstétrique'
];
$service = $services[$data['service']] ?? 'NSP';
$pdf->Cell(0, 10, 'Service : ' . $service, 0, 1);

// Chambre
$chambres = [
    1 => 'Commune',
    2 => '3 lits',
    3 => '2 lits',
    4 => 'VIP',
    5 => 'Normal',
    6 => 'Catégorie'
];
$chambre = $chambres[$data['chambre']] ?? 'NSP';
$pdf->Cell(0, 10, 'Chambre : ' . $chambre, 0, 1);
$pdf->Cell(0, 10, 'Lit : ' . $data['lit'], 0, 1);

// Tuteur
$pdf->Cell(0, 10, 'Tuteur : ' . $data['tuteur'], 0, 1);
$pdf->Cell(0, 10, 'Date de naissance du tuteur : ' . $data['date_nai_garde'], 0, 1);
$pdf->Cell(0, 10, 'CDI N° : ' . $data['cdi'], 0, 1);
$pdf->Cell(0, 10, 'Date CDI : ' . $data['date_cdi'], 0, 1);

// Etat actuel
$etat = [
    'HOS' => 'Hospitalisé',
    'SOR' => 'SORTIE',
    'ENT' => 'En Attente'
];
$etat_actuel = $etat[$data['etat']] ?? 'NSP';
$pdf->Cell(0, 10, 'Etat actuel du patient : ' . $etat_actuel, 0, 1);

// Sortie du PDF
$pdf->Output('I', 'Formulaire_Hospitalisation_' . $data['idh'] . '.pdf');

// Fermer la connexion
$conn->close();
?>