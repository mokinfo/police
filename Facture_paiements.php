<?php
// Connexion à la base de données
$con = mysqli_connect("localhost","root","","spn");

if(!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération des données du formulaire
$idf = $_POST['idf'];
$datefacture = $_POST['datefacture'];
$mtt = $_POST['mtt'];
$idp = $_POST['idp'];

// Mise à jour de l'état de la facture
$query = "UPDATE facture SET etat='PAYER' WHERE idf='$idf'";
if(mysqli_query($con, $query)) {
    // Génération du contenu HTML de la facture
    echo "<h1>Facture N° $idf</h1>";
    echo "<p>Date de facture: $datefacture</p>";
    echo "<p>Montant total: $mtt FDJ</p>";

    // Récupération des détails de la facture
    $query_details = "SELECT * FROM facture WHERE idf='$idf'";
    $result = mysqli_query($con, $query_details);

    if(mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Montant</th>
                </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['desg'] . "</td>
                    <td>" . $row['datef'] . "</td>
                    <td>" . $row['mt'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun détail de facture trouvé.";
    }
} else {
    echo "Erreur lors de la mise à jour de la facture : " . mysqli_error($con);
}

// Fermeture de la connexion
mysqli_close($con);
?>