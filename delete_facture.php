<?php
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if (!isset($_SESSION['user'])) {
    redirect_to("index.php");
}

if (isset($_GET['id'])) {
    $facture_id = intval($_GET['id']);

    $conn = new mysqli('localhost', 'root', '', 'spn');

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM facture WHERE idf = ?");
    $stmt->bind_param("i", $facture_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Facture supprimée avec succès.";
        redirect_to("Caisse"); // Remplacez "Caisse" par la page où vous souhaitez rediriger
    } else {
        $_SESSION['message'] = "Erreur lors de la suppression de la facture.";
        redirect_to("Caisse"); // Remplacez "Caisse" par la page où vous souhaitez rediriger
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['message'] = "ID de facture manquant.";
    redirect_to("Caisse"); // Remplacez "Caisse" par la page où vous souhaitez rediriger
}
?>