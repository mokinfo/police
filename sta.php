<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Requête SQL pour récupérer la somme des montants par service
$sql = "SELECT service, SUM(mt) AS total FROM facture WHERE etat = 'OK' GROUP BY service";
$result = $conn->query($sql);

$dataTable = array(); // Tableau pour stocker les données du tableau et du graphique

// Récupération des données pour le tableau et le graphique
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dataTable[] = array($row["service"], $row["total"]);
    }
} else {
    echo "0 résultats";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau avec DataTables et Graphique</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Tableau -->
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Service</th>
            <th>Montant total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Affichage des données dans le tableau
            foreach ($dataTable as $data) {
                echo "<tr>";
                echo "<td>" . $data[0] . "</td>";
                echo "<td>" . $data[1] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th><?php echo array_sum(array_column($dataTable, 1)); ?></th>
        </tr>
    </tfoot>
</table>

<!-- Div pour le graphique -->
<div style="width: 50%;">
    <canvas id="myChart"></canvas>
</div>

<!-- Script pour DataTables -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<!-- Script pour le graphique -->
<script>
    // Récupération des données pour le graphique
    var labels = <?php echo json_encode(array_column($dataTable, 0)); ?>;
    var data = <?php echo json_encode(array_column($dataTable, 1)); ?>;
    
    // Affichage des données du graphique pour débogage
    console.log(labels);
    console.log(data);

    // Création du graphique
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Montant total par service',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>