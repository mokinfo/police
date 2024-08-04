<?php
require_once("includes/session.php");
require_once("includes/db_connection.php"); 
require_once("includes/functions.php"); 

if (!isset($_SESSION['user'])) {
    redirect_to("index.php");
}  

$codf = $_POST['idf'];
$idp = $_POST['idp'];
$datefacture = $_POST['datefacture'];
$typepaix = "";
$nature = "";
$mtt = $_POST['mtt'];
$etat = "OK";

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'spn');

// Insertion des données de facture
$sql_insert = "INSERT INTO factures (codf, idp, datef, type_paix, mtt, nature) VALUES (?, ?, ?, ?, ?, ?)";
$stmt_insert = $mysqli->prepare($sql_insert);
$stmt_insert->bind_param("ssssds", $codf, $idp, $datefacture, $typepaix, $mtt, $nature);
$stmt_insert->execute();
$stmt_insert->close();

// Sélection des données de facture
$sql_select = "SELECT * FROM facture WHERE idp = ?";
$stmt_select = $mysqli->prepare($sql_select);
$stmt_select->bind_param("s", $idp);
$stmt_select->execute();
$result = $stmt_select->get_result();

while ($row = $result->fetch_assoc()) {
    // Traitement des données de facture et mise à jour
    $idff = $row['idf'];
    $desg = $row['desg'];
    $datef = $row['datef'];
    $type_paix = $row['type_paix'];
    $mt = $row['mt'];
    $mt_cnss = $row['mt_cnss'];
    $etat = "OK";
    $datehosdt = date("Y-m-d G:i");

    // Mise à jour de la table facture
    $sql_update = "UPDATE facture SET desg = ?, datef = ?, type_paix = ?, mt = ?, mt_cnss = ?, etat = ?, date_paix = ?, codf = ? WHERE idf = ?";
    $stmt_update = $mysqli->prepare($sql_update);
    $stmt_update->bind_param("sssssssss", $desg, $datef, $type_paix, $mt, $mt_cnss, $etat, $datehosdt, $codf, $idff);
    $stmt_update->execute();
    $stmt_update->close();

    // Mise à jour de la table entre
    $datedujourn = date("d/m/Y");
    $sql_update_entre = "UPDATE entre SET statut = 'B' WHERE codepatient = ? and datent = ?";
    $stmt_update_entre = $mysqli->prepare($sql_update_entre);
    $stmt_update_entre->bind_param("ss", $idp, $datedujourn);
    $stmt_update_entre->execute();
    $stmt_update_entre->close();
}

$stmt_select->close();
$mysqli->close();

// Affichage de l'alerte JavaScript et redirection
echo '<script type="text/javascript">'; 
echo 'alert("Veuillez passer à l\'admission cher patient !");'; 
echo 'window.location.href = "Caisse";';
echo '</script>';
//redirect_to("Caisse");



?>