<?php
require_once("includes/session.php");

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

if (isset($_POST['Enregistrer'])) {
    $idim = $_POST['idexam'];
    $idp = $_POST["idpa"];
    $user = $_SESSION['user'];
    $dateim = date('Y-m-d H:i:s');
    
    // Vérifier si les fichiers ont été téléchargés
    $radioxx = isset($_FILES['radiox']) ? $_FILES['radiox'] : null;
    $echoo = isset($_FILES['echo']) ? $_FILES['echo'] : null;
    $ecgg = isset($_FILES['ecg']) ? $_FILES['ecg'] : null;

    $uploaddir = 'imagerie/images/';
    
    // Vérifier si le répertoire existe, sinon le créer
    if (!file_exists($uploaddir) && !is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Obtenir les noms des fichiers
    $radiox = $radioxx ? pathinfo($_FILES['radiox']['name'], PATHINFO_FILENAME) : null;
    $echo = $echoo && $_FILES['echo']['name'] != '' ? $_FILES['echo']['name'] : null;
    $ecg = $ecgg && $_FILES['ecg']['name'] != '' ? $_FILES['ecg']['name'] : null;

    // Chemins de téléchargement des fichiers
    $uploadfile1 = $radiox ? $uploaddir . basename($_FILES['radiox']['name']) : null;
    $uploadfile2 = $echo ? $uploaddir . basename($echo) : null;
    $uploadfile3 = $ecg ? $uploaddir . basename($ecg) : null;

    $uploadOk = 1;

    $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    $filePaths = [$uploadfile1, $uploadfile2, $uploadfile3];
    $fileTypes = [
        $radiox ? strtolower(pathinfo($uploadfile1, PATHINFO_EXTENSION)) : null,
        $echo ? strtolower(pathinfo($uploadfile2, PATHINFO_EXTENSION)) : null,
        $ecg ? strtolower(pathinfo($uploadfile3, PATHINFO_EXTENSION)) : null
    ];

    // Vérifier les types de fichiers et les chemins d'accès
    foreach ($fileTypes as $fileType) {
        if ($fileType && !in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            break;
        }
    }

    foreach ($filePaths as $filePath) {
        if ($filePath && file_exists($filePath)) {
            echo "Sorry, one of the images already exists in the database. Please rename the image(s)!";
            $uploadOk = 0;
            break;
        }
    }

    // Vérifier si le téléchargement est réussi
    if ($uploadOk == 1) {
        $uploadsSuccessful = true;

        if ($radiox && !move_uploaded_file($_FILES['radiox']['tmp_name'], $uploadfile1)) {
            $uploadsSuccessful = false;
        }
        if ($echo && !move_uploaded_file($_FILES['echo']['tmp_name'], $uploadfile2)) {
            $uploadsSuccessful = false;
        }
        if ($ecg && !move_uploaded_file($_FILES['ecg']['tmp_name'], $uploadfile3)) {
            $uploadsSuccessful = false;
        }

        if ($uploadsSuccessful) {
            $conn = new mysqli('localhost', 'root', '', 'spn');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Remplacer les valeurs NULL par des chaînes vides
            $radiox = $radiox ? $radiox : '';
            $echo = $echo ? $echo : '';
            $ecg = $ecg ? $ecg : 'default_value'; // Valeur par défaut pour le champ ecg

            // Préparer la requête d'insertion
            $stmt = $conn->prepare("INSERT INTO imagerie (idim, idp, dateim, radiox, echo, ecg) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissss", $idim, $idp, $dateim, $radiox, $echo, $ecg);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "<script>alert('Record has been saved successfully!');</script>";

                // Enregistrer l'action dans le journal
                $journalStmt = $conn->prepare("INSERT INTO journal (user, action, datedc) VALUES (?, ?, ?)");
                $journalStmt->bind_param("sss", $user, $action, $dateim);
                $action = "Ajout utilisateur";
                $journalStmt->execute();

                // Rediriger vers la page de gestion des utilisateurs
                redirect_to("Liste_Imagerie");
                //var_dump($_POST);
                //var_dump($_FILES);
            } else {
                echo "Error: " . $stmt->error;
            }

            // Fermer les déclarations et la connexion
            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your files.";
        }
    } else {
        echo "Sorry, your files were not uploaded.";
    }
} else {
    redirect_to("Accueil.php");
}
?>