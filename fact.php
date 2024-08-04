<?php
// Inclusion des bibliothèques FPDF et JoliFacture
require('fpdf/fpdf.php');
require('jolifacture/src/JoliFacture.php');

// Création de la classe de facture étendant FPDF
class FacturePDF extends FPDF {
    // En-tête de page
    function Header() {
        // Logo ou autre contenu de l'en-tête
        $this->Image('logo.png', 10, 10, 30);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(30, 10, 'Facture', 0, 0, 'C');
        $this->Ln(20);
    }

    // Pied de page
    function Footer() {
        // Numéro de page
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Création d'une instance de la classe FacturePDF
$pdf = new FacturePDF();
$pdf->AddPage();

// Contenu de la facture (exemple)
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nom de l\'entreprise', 0, 1);
$pdf->Cell(0, 10, 'Adresse', 0, 1);
$pdf->Cell(0, 10, 'Ville, Code Postal', 0, 1);
$pdf->Cell(0, 10, 'Pays', 0, 1);
$pdf->Ln(10);

// Ajouter les articles de la facture avec JoliFacture
$joliFacture = new JoliFacture($pdf);
$joliFacture->setLogo('logo.png');
$joliFacture->setSociete([
    'Nom'            => 'Nom de votre entreprise',
    'Adresse'        => 'Adresse de votre entreprise',
    'Contact'        => 'Contact de votre entreprise',
    'Numéro de TVA'  => 'Numéro de TVA de votre entreprise',
    'Email'          => 'Email de votre entreprise',
    'Site web'       => 'Site web de votre entreprise',
]);

$joliFacture->setClient([
    'Nom'      => 'Nom du client',
    'Adresse'  => 'Adresse du client',
    'Ville'    => 'Ville du client',
    'Pays'     => 'Pays du client',
]);

$joliFacture->setNumero(['Référence' => 'RF123456']);
$joliFacture->setDate(['Date' => date('d/m/Y')]);
$joliFacture->setExpedition(['Date' => date('d/m/Y')]);

$joliFacture->setPaiement([
    'Date'      => date('d/m/Y'),
    'Mode de paiement' => 'Carte bancaire',
]);

$joliFacture->setItems([
    [
        'Désignation' => 'Service 1',
        'Quantité'    => 1,
        'Prix unitaire' => 100,
        'Total HT'    => 100,
        'TVA'         => '20%',
        'Total TTC'   => 120,
    ],
    [
        'Désignation' => 'Service 2',
        'Quantité'    => 2,
        'Prix unitaire' => 50,
        'Total HT'    => 100,
        'TVA'         => '20%',
        'Total TTC'   => 120,
    ],
]);

$joliFacture->setTotal([
    'Total HT' => 200,
    'TVA'      => '20%',
    'Total TTC' => 240,
]);

$joliFacture->setConditions([
    'Conditions de paiement' => 'Paiement à réception de facture',
    'Conditions de vente' => 'Aucune condition générale de vente n\'a été définie',
]);

// Génération du PDF
$joliFacture->output('facture.pdf', 'I');