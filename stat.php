<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données pour le sexe
$sql_sexe = "SELECT sex, COUNT(*) as count FROM patient GROUP BY sex";
$result_sexe = $conn->query($sql_sexe);

$sexe_data = [];
if ($result_sexe->num_rows > 0) {
    while($row = $result_sexe->fetch_assoc()) {
        $sexe_data[] = $row;
    }
}

// Récupération des données pour l'âge (en utilisant l'année pour calculer l'âge)
$sql_age = "SELECT age, COUNT(*) as count FROM patient GROUP BY age";
$result_age = $conn->query($sql_age);

$age_data = [];
if ($result_age->num_rows > 0) {
    while($row = $result_age->fetch_assoc()) {
        $age_data[] = $row;
    }
}

// Récupération des données pour l'hôpital
$sql_hopital = "SELECT cnss, COUNT(*) as count FROM patient GROUP BY cnss";
$result_hopital = $conn->query($sql_hopital);

$hopital_data = [];
if ($result_hopital->num_rows > 0) {
    while($row = $result_hopital->fetch_assoc()) {
        $hopital_data[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques Médecins</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Statistiques des Médecins</h2>

    <canvas id="sexeChart" width="400" height="400"></canvas>
    <canvas id="ageChart" width="400" height="400"></canvas>
    <canvas id="hopitalChart" width="400" height="400"></canvas>

    <script>
        // Données pour le sexe
        const sexeData = <?php echo json_encode($sexe_data); ?>;
        const sexeLabels = sexeData.map(item => item.sex === 'M' ? 'Masculin' : 'Féminin');
        const sexeCounts = sexeData.map(item => item.count);

        // Données pour l'âge
        const ageData = <?php echo json_encode($age_data); ?>;
        const ageLabels = ageData.map(item => item.age);
        const ageCounts = ageData.map(item => item.count);

        // Données pour l'hôpital
        const hopitalData = <?php echo json_encode($hopital_data); ?>;
        const hopitalLabels = hopitalData.map(item => item.cnss);
        const hopitalCounts = hopitalData.map(item => item.count);

        // Chart.js pour le sexe
        const ctx1 = document.getElementById('sexeChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: sexeLabels,
                datasets: [{
                    data: sexeCounts,
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Répartition par Sexe'
                    }
                }
            }
        });

        // Chart.js pour l'âge
        const ctx2 = document.getElementById('ageChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ageLabels,
                datasets: [{
                    label: 'Nombre de Patient',
                    data: ageCounts,
                    backgroundColor: '#FFCE56'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Répartition par Âge'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart.js pour l'hôpital
        const ctx3 = document.getElementById('hopitalChart').getContext('2d');
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: hopitalLabels,
                datasets: [{
                    label: 'Nombre de Médecins',
                    data: hopitalCounts,
                    backgroundColor: '#4BC0C0'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Possession de carte CNSS'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>