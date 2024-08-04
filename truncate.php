<?php

// Configuration de la connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'spn';

// Connexion à la base de données
$mysqli = new mysqli($host, $user, $password, $database);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
}

// Récupération de la liste des tables dans la base de données
$result = $mysqli->query("SHOW TABLES");
$tables = [];
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Exécution de TRUNCATE TABLE pour chaque table
foreach ($tables as $table) {
    $truncateQuery = "TRUNCATE TABLE $table";
    if ($mysqli->query($truncateQuery)) {
        echo "La table $table a été vidée avec succès.<br>";
    } else {
        echo "Erreur lors de la vidange de la table $table : " . $mysqli->error . "<br>";
    }
}

// Importation des données dans la table utilisateur
$insertUtilisateurQuery = "INSERT INTO `utilisateur` (`id`, `nom`, `utilisateur`, `motspasse`, `role`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 'Dr Mahyoub Abdallah', 'Mahyoub', 'admin', 5, 'avatar.jpg', '2020-11-01 13:20:34', '1'),
(2, 'Djama Siid Beile', 'mokinfo', '2020', 8, 'mok.png', 'Fri 17/11/2023  6:02:48', '1'),
(3, 'Sado', 'Admission', '123', 1, 'IMG_0729.JPG', 'Wed 31/01/2024  21:21:50', '1'),
(4, 'Caisse', 'Caisse', '123', 2, 'IMG_0712.JPG', 'Wed 31/01/2024  22:23:21', '1'),
(5, 'Rahma Mohamed Ismail', 'Rahma', 'rahma1234', 2, 'DJI_0017.JPG', 'Sun 04/02/2024  16:58:35', '1')";

if ($mysqli->query($insertUtilisateurQuery)) {
    echo "Données utilisateur insérées avec succès.<br>";
} else {
    echo "Erreur lors de l'insertion des données utilisateur : " . $mysqli->error . "<br>";
}

// Importation des données dans la table patient
$insertPatientQuery = "INSERT INTO `patient` (`idp`, `nom`, `civi`, `daten`, `age`, `sex`, `sitfam`, `address`, `tel`, `email`, `dateinsp`, `catp`, `cnss`, `numcnss`, `affect`) VALUES
(1, 'Abdi Ali', 'M.', '1982-12-12', 40, 'Masculin', 'Marié', 'HAYABLEY', '77767677', 'hskdjf@gmail.com', '18/02/2023', 'CIV', 'OUI', '82782738', 'med'),
(2, 'MOUSSA HOUSSEIN HADI', 'M.', '1965-12-12', 57, 'Masculin', 'Marié', 'BALBALA CHEIKH MOUSSA', '77020870', 'moussa@gmail.com', '06/03/2023', 'CIV', 'OUI', '19822930', 'med'),
(3, 'SADIK', 'M.', '1988-12-23', 34, 'Masculin', 'Marié', 'JKHKJH', '776767677', '', '06/03/2023', 'CIV', 'OUI', '23982984', 'med'),
(4, 'Dj', '0', '', 0, '', 'SF', '', '', '', '19/11/2023', 'CCC', '0', '', '0'),
(5, 'Djama Said', 'M.', '1985-12-23', 37, 'Masculin', 'Divorcé', 'Hayabley', '77692560', 'moktarsaid@gmail.com', '19/11/2023', 'CIV', 'OUI', '1234123', 'med'),
(6, 'Abdi ali Robleh', 'M.', '2000-02-25', 0, 'Masculin', 'SF', '', '', '', '25/11/2023', 'CCC', '0', '', '0'),
(7, 'Abdi Ali Hassan', 'M.', '1987-12-23', 35, 'Masculin', 'Marié', 'SJDHSKDJH', '787873823', '', '25/11/2023', 'CIV', 'OUI', '7352753263', 'med'),
(8, 'djama', 'M.', '1988-12-23', 34, 'Masculin', 'Marié', 'M', '77637437', 'moktarsaid@gmail.com', '01/12/2023', 'CIV', 'OUI', '129819182', 'med')";

if ($mysqli->query($insertPatientQuery)) {
    echo "Données patient insérées avec succès.<br>";
} else {
    echo "Erreur lors de l'insertion des données patient : " . $mysqli->error . "<br>";
}

// Fermeture de la connexion à la base de données
$mysqli->close();


// Redirection vers la page de connexion
//header("Location: Login");

// Affichage de l'alerte SweetAlert
echo <<<EOD
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  title: 'Toutes  les tables ont été vidées avec succès! et le deux tables sont bien chargé',
  icon: 'success',
  confirmButtonText: 'OK'
}).then((result) => {
  // Redirection vers la page de connexion
  if (result.isConfirmed || result.isDismissed) {
    window.location.href = 'Login';
  }
});
</script>
EOD;

?>



