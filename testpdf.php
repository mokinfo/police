<?php
// Connexion à la BDD (à personnaliser)

$link = mysqli_connect('localhost', 'root', '', 'spn');
//Select the Products you want to show in your PDF file
$result = mysqli_query($link, "SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.codepatient, patient.idp, patient.nom, patient.daten FROM patient, entre where entre.codepatient = patient.idp end entre.ident = '$ids'");


// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$data_voyageur = mysqli_fetch_array($result);
mysqli_free_result($result);

// Appel de la librairie FPDF
require("fpdf/fpdf.php");