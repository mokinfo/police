<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'spn');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Vérifier si l'ID de l'utilisateur est défini dans la requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idUtilisateur = $_POST['id'];
    // Préparer la requête pour récupérer les détails de l'utilisateur
    $sql = "SELECT utilisateur.nom, utilisateur.role, utilisateur.uploaded_on  AS date, medecin.email, medecin.tel, utilisateur.status AS statut, utilisateur.file_name FROM utilisateur, medecin WHERE utilisateur.id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $idUtilisateur);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Récupérer les données de l'utilisateur
            $row = $result->fetch_assoc();

            // Renvoyer les détails de l'utilisateur sous forme de JSON
            echo json_encode($row);
        } else {
            echo json_encode(array('error' => 'Utilisateur non trouvé'));
        }
    } else {
        echo json_encode(array('error' => 'Erreur lors de l\'exécution de la requête'));
    }
    // Fermer la requête et la connexion
    $stmt->close();
}
// Fermer la connexion à la base de données
$mysqli->close();
?>