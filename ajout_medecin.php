<?php
/*// Inclure les fichiers nécessaires
require_once("includes/session.php");
require_once("includes/db_connection.php");

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$specialite = $_POST['specialite'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];


$mysqli = new mysqli('localhost', 'root', '', 'spn');
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}


// Vérifier si le médecin existe déjà dans la base de données
$sqlCheckMedecin = "SELECT * FROM medecin WHERE mail = '$mail'";
$resultCheckMedecin = $mysqli->query($sqlCheckMedecin);





if ($resultCheckMedecin->num_rows > 0) {
    // Le médecin existe déjà
    $response = array('success' => false);
} else {
    // Ajouter le médecin à la base de données
    $sqlAddMedecin = "INSERT INTO medecin (idmed, nom, specialite, mail, tel) VALUES ('', '$nom', '$specialite', '$mail', '$tel')";
    if ($mysqli->query($sqlAddMedecin)) {
        // Ajout réussi
        $response = array('success' => true);
    } else {
        // Erreur lors de l'ajout
        $response = array('success' => false);
    }
}
/*
// Renvoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);*/
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
require_once("includes/session.php");
require_once("includes/db_connection.php");

// Récupérer les données du formulaire
$idmed = $_POST['idmed'];
$nom = $_POST['nom'];
$specialite = $_POST['specialite'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];

$mysqli = new mysqli('localhost', 'root', '', 'spn');
if ($mysqli->connect_error) {
    die('Erreur de connexion à la base de données : ' . $mysqli->connect_error);
}

// Vérifier si le médecin existe déjà dans la base de données
$sqlCheckMedecin = "SELECT * FROM medecin WHERE email = '$mail'";
$resultCheckMedecin = $mysqli->query($sqlCheckMedecin);
echo $resultCheckMedecin->num_rows;
if ($resultCheckMedecin->num_rows > 0) {
    // Le médecin existe déjà, afficher une alerte
    echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Erreur d\'ajout ggg',
                  text: 'Le médecin est déjà dans la base.',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'Ajouter_medecin'; // Redirigez vers la page souhaitée
                  }
                });
              </script>";
} else {
    // Ajouter le médecin à la base de données
    $sqlAddMedecin = "INSERT INTO medecin (idmed, nom, specialite, email, tel) VALUES ('$idmed', '$nom', '$specialite', '$mail', '$tel')";
    if ($mysqli->query($sqlAddMedecin)) {
        // Ajout réussi, afficher une alerte
        echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Médecin ajouté',
                  text: 'Le médecin a été ajouté avec succès!',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'Ajouter_medecin'; // Redirigez vers la page souhaitée
                  }
                });
              </script>";
    } else {
        // Erreur lors de l'ajout, afficher une alerte
        echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Erreur d\'ajout ssss',
                  text: 'Le médecin est déjà dans la base.',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'Ajouter_medecin'; // Redirigez vers la page souhaitée
                  }
                });
              </script>";
    }
}
?>