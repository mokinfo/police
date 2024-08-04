<?php
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}

// Préparer la requête SQL
$query = "SELECT * FROM patient";
$result = mysqli_query($cn, $query);

// Vérifier les erreurs de la requête
if (!$result) {
    die("Erreur de la requête : " . mysqli_error($cn));
}

// Récupérer les résultats
$patients = [];
while ($row = mysqli_fetch_assoc($result)) {
    $patients[] = $row;
}

// Retourner les données au format JSON
echo json_encode(['data' => $patients]);
exit;
?>