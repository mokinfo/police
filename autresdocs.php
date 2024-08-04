<?php
function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

// Configuration de la connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $codepatient = $_POST['codepatient'];
    
    // Vérifiez que $codepatient n'est pas vide
    if (empty($codepatient)) {
        die("Le code patient est vide.");
    }

    $uploadDirectory = __DIR__ . "/Documents/" . $codepatient . "/";
    
    // Vérifiez que le répertoire d'upload existe, sinon, créez-le
    if (!is_dir($uploadDirectory)) {
        if (!mkdir($uploadDirectory, 0777, true)) {
            die("Échec de la création du répertoire d'upload.");
        }
    }

    $fileExists = false;

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $fileName = basename($_FILES['files']['name'][$key]);
        $fileTmpName = $_FILES['files']['tmp_name'][$key];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $libelle = $fileName;

        // Vérifiez si un fichier avec le même nom a déjà été uploadé pour ce patient
        $sqlCheck = "SELECT * FROM document WHERE libelle = '$libelle' AND codepatient = '$codepatient'";
        $result = $conn->query($sqlCheck);
        if ($result->num_rows > 0) {
            echo "Le fichier $libelle a déjà été uploadé pour ce patient.<br>";
            $fileExists = true;
            continue;
        }

        // Insérez d'abord une entrée vide pour obtenir l'iddoc auto-incrémenté
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO document (nom, libelle, date, codepatient) VALUES ('', '$libelle', '$date', '$codepatient')";
        if ($conn->query($sql) === TRUE) {
            $iddoc = $conn->insert_id;
            
            // Générer le nouveau nom de fichier
            $newFileName = $codepatient . "_" . $iddoc . "." . $fileType;
            $targetFilePath = $uploadDirectory . $newFileName;
            
            // Déplacer le fichier téléchargé dans le répertoire cible
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                // Mettre à jour l'entrée avec le nom de fichier correct
                $sqlUpdate = "UPDATE document SET nom = '$newFileName' WHERE iddoc = $iddoc";
                if ($conn->query($sqlUpdate) === TRUE) {
                    echo "Le fichier $libelle a été uploadé avec succès sous le nom $newFileName.<br>";
                } else {
                    echo "Erreur lors de la mise à jour du fichier $newFileName dans la base de données.<br>";
                }
            } else {
                echo "Erreur lors de l'upload du fichier $libelle.<br>";
            }
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    if (!$fileExists) {
        // Redirection après l'upload des fichiers
        redirect_to("dossier.php?id=" . urlencode($codepatient));
    }
}

$conn->close();
?>