<?php
// Appel de la librairie FPDF
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php'); // Assurez-vous que le chemin vers fpdf.php est correct

// Vérifier si l'ID est passé en paramètre
if (!isset($_GET['id'])) {
    die("ID manquant");
}

$id = $_GET['id'];

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

class PDF extends FPDF
{
    function addSignature($name)
    {
        $this->Ln(20); // Espace avant la signature
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Signature du patient ou du représentant légal :', 0, 1, 'C');
        $this->Ln(1); // Espace entre 'Signature:' et le nom
        $this->Cell(0, 10, $data['nom'], 0, 1, 'C');
    }
}




// Création de la class PDF polic.png

// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('P','mm','A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
$image = "policess.png";
$pdf-> Image($image,25,10,40,48);
$pdf->SetFont('times', 'B',11);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"REPUBLIQUE DE DJIBOUTI",0,1,'C');
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"******************",0,1,'C');
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"MINISTERE DE L'INTERIEUR",0,1,'C');
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"******************",0,1,'C');
$pdf->SetFont('times', 'B',11);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"HOPITAL POLICE NATIONALE",0,1,'C');
$pdf->Cell(90  ,5,"",0,0);
$pdf->SetFont('times', '',18);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(90  ,5,"----------------------",0,1,'C');
//$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(189, 5, '', 0, 1);
$pdf->Cell(189, 5, '', 0, 1);
$pdf->SetTextColor(0, 128, 0);
// Ajouter le texte

$pdf->Cell(189, 5, utf8_decode("BILLET D'HOSPITALISATION"), 0, 1, 'C');
$pdf->Cell(189, 5, utf8_decode(""), 0, 1, 'C');

// Ajouter une ligne en dessous pour souligner toute la ligne
$pdf->SetDrawColor(0, 128, 0); // Assurez-vous que la ligne est de la même couleur que le texte
$x = 10; // Position de départ en x (marge gauche standard)
$y = $pdf->GetY(); // Position de la ligne en y (juste après le texte)
$pdf->Line($x, $y, 200, $y); // Ligne de marge gauche à marge droite (A4 width is 210mm)
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', '', 10);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(189, 5, '', 0, 1);
//$pdf->Cell(20  ,5,'Nom : ',0,0);
//$pdf->SetFont('Arial', 'B',10);
/*$pdf->Cell(75  ,5,$civi ." ". $nom,0,1);
$pdf->SetFont('Arial', '',8);
$pdf->Cell(13  ,5,utf8_decode('Né(e) le : '),0,0);
$pdf->SetFont('Arial', '',8);
$pdf->Cell(20  ,5,$daten. ', Sexe : ' . $sex,0,1);


$pdf->SetFont('Arial', '',8);
$pdf->Cell(13  ,5,utf8_decode('Dossier N°: '. $rowfact['idp']),0,1);

$pdf->Cell(13  ,5,utf8_decode('Date de l\'examen : '. $datej . ' '. $rowfact['heurfexam']),0,1);*/

$pdf->Cell(189  ,5,$data['civi'] ." ". $data['nom'],0,1,'L');
$pdf->SetFont('Arial', '',8);
//$pdf->Cell(13  ,5,utf8_decode('Né(e) le : '),0,0,'C');
$pdf->SetFont('Arial', '',8);
$pdf->Cell(90  ,5,utf8_decode('Né(e) le : ').$data['daten']. ', Sexe : ' . utf8_decode($data['sex']),0,0,);
// Titre
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(90, 5, utf8_decode('Hospitalisation numéro : SSPN-' . $data['idh']), 0, 1, 'R');


$pdf->Ln(10);

// Informations générales
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, utf8_decode('Information générale'), 0, 1, 'L');
$pdf->Ln(5);

// Tableau
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(200, 220, 255);

// Largeur des colonnes
$w = [90, 100]; 

// Entête du tableau
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell($w[0], 5, utf8_decode('Libellé'), 1, 0, 'L', true);
$pdf->Cell($w[1], 5, utf8_decode('Détails'), 1, 1, 'L', true);

// Données
$pdf->Cell($w[0], 5, utf8_decode('Nom du patient'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['nom']), 'LR', 1);

$pdf->Cell($w[0], 5, utf8_decode('Date de naissance'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['daten']), 'LR', 1);

// Catégorie de patient
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
$pdf->Cell($w[0], 5, utf8_decode('Catégorie de patient'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($catepatient), 'LR', 1);

$pdf->Cell($w[0], 5, utf8_decode('Matricule'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['matricule']), 'LR', 1);

$pdf->Cell($w[0], 5, utf8_decode('Adresse'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['address']), 'LR', 1);

$pdf->Cell($w[0], 5, utf8_decode('Numéro téléphone'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['tel']), 'LR', 1);

// Hospitalisé par
$pdf->Cell($w[0], 5, utf8_decode('Hospitalisé par'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['hospar']), 'LR', 1);

// Médecin traitant
$pdf->Cell($w[0], 5, utf8_decode('Médecin traitant'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['med_trai']), 'LR', 1);

// Date hospitalisé
$pdf->Cell($w[0], 5, utf8_decode('Date hospitalisé'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['date_hos']), 'LR', 1);

// Motif
$pdf->Cell($w[0], 5, utf8_decode('Motif'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['motif_hos']), 'LR', 1);

// Service
$services = [
    'MI' => 'Médecine',
    'PD' => 'Pédiatrie',
    'OP' => 'Chirurgie',
    'GO' => 'Gynécologie obstétrique'
];
$service = $services[$data['service']] ?? 'NSP';
$pdf->Cell($w[0], 5, utf8_decode('Service'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($service), 'LR', 1);

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
$pdf->Cell($w[0], 5, utf8_decode('Chambre'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($chambre), 'LR', 1);
$pdf->Cell($w[0], 5, utf8_decode('Lit'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['lit']), 'LR', 1);

// Tuteur
$pdf->Cell($w[0], 5, utf8_decode('Tuteur'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['tuteur']), 'LR', 1);

// Date de naissance du tuteur
$pdf->Cell($w[0], 5, utf8_decode('Date de naissance du tuteur'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['date_nai_garde']), 'LR', 1);

// CDI N°
$pdf->Cell($w[0], 5, utf8_decode('CDI N°'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['cdi']), 'LR', 1);

// Date CDI
$pdf->Cell($w[0], 5, utf8_decode('Date CDI'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($data['date_cdi']), 'LR', 1);

// Etat actuel
$etat = [
    'HOS' => 'Hospitalisé',
    'SOR' => 'SORTIE',
    'ENT' => 'En Attente'
];
$etat_actuel = $etat[$data['etat']] ?? 'NSP';
$pdf->Cell($w[0], 5, utf8_decode('Etat actuel du patient'), 'LR');
$pdf->Cell($w[1], 5, utf8_decode($etat_actuel), 'LR', 1);

// Fermer les bordures pour la dernière ligne
$pdf->Cell($w[0], 5, '', 'LRB');
$pdf->Cell($w[1], 5, '', 'LRB', 1);

$pdf->Cell(189  ,5,'',0,1);

// Informations générales
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, utf8_decode('CONSENTEMENTS ET AUTORISATIONS'), 0, 1, 'L');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 10, utf8_decode('Consentement éclairé pour les soins et traitements : ...........................................................................'), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode('Autorisation de partage d\'informations médicales : ...........................................................................'), 0, 1, 'L');
$pdf->Cell(50, 10, utf8_decode('Date : ........................................'), 0, 0, 'L');
$pdf->Cell(0, 10, utf8_decode('Cachet du service des admissions : '), 0, 1, 'L');

$pdf->Cell(0, 10, utf8_decode('Signature du patient ou du représentant légal : ...........................................................................'), 0, 1, 'L');


// Sortie du PDF
$pdf->Output('I', 'Formulaire_Hospitalisation_' . $data['idh'] . '.pdf');

// Fermer la connexion
$conn->close();
?>