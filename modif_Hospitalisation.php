<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
/*
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'spn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idh = $_POST['idh'];
    $idp = $_POST['idp'];
    $hospar = $_POST['hospar'];
    $med_trai = $_POST['med_trai'];
    $date_hos = $_POST['date_hos'];
    $motif_hos = $_POST['motif_hos'];
    $service = $_POST['service'];
    $chambre = $_POST['chambre'];
    $lit = $_POST['lit'];
    $tuteur = $_POST['tuteur'];
    $date_nai_garde = $_POST['date_nai_garde'];
    $cdi = $_POST['cdi'];
    $date_cdi = $_POST['date_cdi'];
    $etat = $_POST['etat'];

    // Préparation et exécution de la requête de mise à jour
    $stmt = $conn->prepare("UPDATE hospitalisation SET idp=?, hospar=?, med_trai=?, date_hos=?, motif_hos=?, service=?, chambre=?, lit=?, tuteur=?, date_nai_garde=?, cdi=?, date_cdi=?, etat=? WHERE idh=?");
    $stmt->bind_param("issssssssssssi", $idp, $hospar, $med_trai, $date_hos, $motif_hos, $service, $chambre, $lit, $tuteur, $date_nai_garde, $cdi, $date_cdi, $etat, $idh);

    if ($stmt->execute()) {
        echo "Hospitalisation mise à jour avec succès.";
    } else {
        echo "Erreur de mise à jour : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();*/

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'spn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $idh = $_POST['idh'];
    $etat = "HOS";

    // Préparation et exécution de la requête de mise à jour
    $stmt = $conn->prepare("UPDATE hospitalisation SET etat=? WHERE idh=?");
    $stmt->bind_param("si", $etat, $idh);

    if ($stmt->execute()) {
        echo "État mis à jour avec succès.";
        redirect_to('Hosp_admission');
    } else {
        echo "Erreur de mise à jour : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>