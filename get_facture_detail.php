<?php
require_once("includes/db_connection.php");

// Vérifiez si l'ID de la facture est défini
if(isset($_POST['id_facture'])) {
    $id_facture = $_POST['id_facture'];

    // Requête pour récupérer les détails de la facture
    $query = "SELECT facture.idf, facture.desg, facture.datef, facture.mt, patient.nom, patient.civi 
              FROM facture 
              JOIN patient ON facture.idp = patient.idp 
              WHERE facture.idf = ?";
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param("i", $id_facture);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $facture = $result->fetch_assoc();
            // Affichez les détails de la facture
            echo "<p>ID Facture: " . $facture['idf'] . "</p>";
            echo "<p>Nom: " . $facture['civi'] . " " . $facture['nom'] . "</p>";
            echo "<p>Acte: " . $facture['desg'] . "</p>";
            echo "<p>Date: " . $facture['datef'] . "</p>";
            echo "<p>Montant: " . $facture['mt'] . " €</p>";
        } else {
            echo "<p>Aucune facture trouvée pour cet ID.</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>