<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if (!isset($_SESSION['user'])) {
    redirect_to("Login");
}

// Fonction pour établir une connexion à la base de données
function get_db_connection() {
    $conn = new mysqli('localhost', 'root', '', 'spn');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Vérification et traitement pour le bouton 'suite'
if (isset($_POST['suite']) && isset($_POST['idpa'])) {
    $idpa = $_POST["idpa"];
    $ident = $_POST["ident"];
    $_SESSION['idcons'] = $_POST['idpa'];
    $_SESSION['motif'] = $_POST['motif'];
    $_SESSION['diag'] = $_POST['diag'];
    $_SESSION['trait'] = $_POST['trait'];
    $_SESSION['hist'] = $_POST['hist'];
    $_SESSION['para'] = $_POST['para'];
    $_SESSION['exampc'] = $_POST['exampc'];
    $_SESSION['note'] = $_POST['note'];

    redirect_to("Consultation?id=$ident");
}

// Vérification et traitement pour le bouton 'enreg'
if (isset($_POST['enreg']) && isset($_POST['idcons'])) {
    $idcons = $_POST["idcons"];
    $idpa = $_POST["idpa"];
    $numed = $_POST["numed"];
    $ante = $_POST["ante"];
    $motif = $_POST["motif"];
    $examc = $_POST["examc"];
    $diag = $_POST["diag"];
    $para = $_POST["para"];
    $trait = $_POST["trait"];
    $examd = $_POST["examd"];
    $hist = $_POST["hist"];
    $exampc = $_POST["exampc"];
    $note = $_POST["note"];
    $question = $_POST["question"];
    $maladi = $_POST["maladi"];
    $datent = $_POST["datent"];
    $heurdc = $_POST["datedc"];
    $heurfc = date("G:i");
    $statut = "F";
    $datedujour = date("d/m/Y");

    // Établir la connexion à la base de données
    $conn = get_db_connection();

    // Vérifier si l'utilisateur est un médecin
    $stmt = $conn->prepare("SELECT idmed FROM medecin WHERE idutilisateur = ?");
    $stmt->bind_param("i", $numed);
    $stmt->execute();
    $stmt->bind_result($idmed); // Lier le résultat à la variable $idmed
    $stmt->fetch(); // Récupérer la valeur

    if ($idmed === null) {
        echo '<script>alert("Vous ne pouvez pas consulter le patient car vous n\'êtes pas un médecin.")</script>';
    } else {
        $stmt->close();

        // Insérer les données de consultation
        $sql = "INSERT INTO consult (idcons, idpa, numed, ante, motif, examc, diagnostic, traitement, examdem, hist, para, exampc, note, heurdc, heurfc, statcons, datcons) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiissssssssssssss', $idcons, $idpa, $idmed, $ante, $motif, $examc, $diag, $trait, $examd, $hist, $para, $exampc, $note, $heurdc, $heurfc, $statut, $datedujour);

        if ($stmt->execute()) {
            // Mettre à jour le statut dans la table entre
            $update_sql = "UPDATE entre SET statut = ?, heurf = ? WHERE codepatient = ? AND datent = ?";
            $stmt_update = $conn->prepare($update_sql);
            $stmt_update->bind_param('ssss', $statut, $heurfc, $idpa, $datent);
            $stmt_update->execute();
            
            // Réinitialiser les variables de session
            unset($_SESSION['idcons']);
            unset($_SESSION['motif']);
            unset($_SESSION['diag']);
            unset($_SESSION['hist']);
            unset($_SESSION['para']);
            unset($_SESSION['exampc']);
            unset($_SESSION['note']);
            
            // Rediriger vers la page de consultation
            redirect_to("Affiche_Consultation?id=$idcons");
        } else {
            echo "Erreur : " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}
?>