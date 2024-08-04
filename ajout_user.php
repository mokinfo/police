<?php
require_once("includes/session.php");

function redirect_to($new_location){
    echo "<script type='text/javascript'>window.location.href = '$new_location';</script>";
    exit;
}

if (isset($_POST['Enregistrer'])) {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $utilisateur = $_POST["user"];
    $motspasse = $_POST["pass"];
    $role = $_POST["role"];
    $statut = $_POST["statut"];
    $uploaded_on = date("Y-m-d H:i:s");

    // Informations spécifiques au médecin
    $specialite = isset($_POST["specialite"]) ? $_POST["specialite"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $tel = isset($_POST["tel"]) ? $_POST["tel"] : null;

    // Connexion à la base de données
    $mysqli = new mysqli('localhost', 'root', '', 'spn');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Vérifier si l'utilisateur existe déjà
    $stmt_check = $mysqli->prepare("SELECT * FROM utilisateur WHERE utilisateur = ?");
    $stmt_check->bind_param("s", $utilisateur);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Erreur!',
                        text: 'Utilisateur existe déjà!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.history.back();
                        }
                    });
                });
              </script>";
        exit;
    }
    $stmt_check->close();

    // Insérer l'utilisateur sans le nom de fichier
    $sql_user = "INSERT INTO utilisateur (nom, utilisateur, motspasse, role, uploaded_on, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_user = $mysqli->prepare($sql_user);

    if (!$stmt_user) {
        die("Erreur de préparation de la requête : " . $mysqli->error);
    }

    $stmt_user->bind_param("ssssss", $nom, $utilisateur, $motspasse, $role, $uploaded_on, $statut);

    if ($stmt_user->execute()) {
        // Récupérer l'ID de l'utilisateur inséré
        $idutilisateur = $mysqli->insert_id;

        // Renommer et déplacer le fichier téléchargé
        $file_name = $_FILES['userfile']['name'];
        $file_tmp = $_FILES['userfile']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = $idutilisateur . '.' . $file_ext;
        $upload_dir = 'images/utilisateur/';
        $upload_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Mettre à jour l'utilisateur avec le nouveau nom de fichier
            $sql_update_user = "UPDATE utilisateur SET file_name = ? WHERE id = ?";
            $stmt_update_user = $mysqli->prepare($sql_update_user);

            if (!$stmt_update_user) {
                die("Erreur de préparation de la requête de mise à jour : " . $mysqli->error);
            }

            $stmt_update_user->bind_param("si", $new_file_name, $idutilisateur);

            if ($stmt_update_user->execute()) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
                echo "<script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Succès!',
                                text: 'Nouvel utilisateur créé avec succès',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {";

                if ($role == 3 && $specialite && $email && $tel) {
                    // Insérer le médecin
                    $sql_medecin = "INSERT INTO medecin (idutilisateur, nom, specialite, email, tel) VALUES (?, ?, ?, ?, ?)";
                    $stmt_medecin = $mysqli->prepare($sql_medecin);

                    if (!$stmt_medecin) {
                        die("Erreur de préparation de la requête médecin : " . $mysqli->error);
                    }

                    $stmt_medecin->bind_param("issss", $idutilisateur, $nom, $specialite, $email, $tel);

                    if ($stmt_medecin->execute()) {
                        echo "Swal.fire('Succès!', ' et lié à la table médecin avec succès.', 'success').then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'Gestion_utilisateur';
                            }
                        });";
                    } else {
                        echo "Swal.fire('Erreur!', ' mais l\'insertion dans la table médecin a échoué : " . $stmt_medecin->error . "', 'error');";
                    }
                } else {
                    echo "window.location.href = 'Gestion_utilisateur';";
                }

                echo "});
                    });
                  </script>";
            } else {
                echo "Erreur de mise à jour de l'utilisateur : " . $stmt_update_user->error;
            }

            $stmt_update_user->close();
        } else {
            echo "Erreur de téléchargement du fichier.";
        }
    } else {
        echo "Erreur : " . $sql_user . "<br>" . $stmt_user->error;
    }

    $stmt_user->close();
    $mysqli->close();
}
?>