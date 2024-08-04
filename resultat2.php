<?php
// Inclusion des fichiers nécessaires
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");
require_once("db.class.php");
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php');

// Initialisation de la connexion à la base de données
$DB = new DB();
$link = mysqli_connect('localhost', 'root', '', 'spn');

// Récupération des données depuis la base de données
if(!empty($_GET['id'])) {
    $ids = $_GET['id'];
} else {
    redirect_to("Accueil");
}

// Requête SQL pour récupérer les données de la facture
$requete = "SELECT * FROM examens WHERE ide = '$ids'";
$result = mysqli_query($link, $requete);
$rowfact = mysqli_fetch_array($result);
mysqli_free_result($result);

// Création du PDF de la facture
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Fonction pour générer le contenu de la facture
function generateInvoiceContent($pdf, $rowfact) {
    // Ajoutez ici les cellules du PDF avec les données de la facture
}

// Génération du contenu de la facture
generateInvoiceContent($pdf, $rowfact);

// Enregistrement et affichage du PDF
$pdf->Output();
?>