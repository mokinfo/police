<?php
// Inclure le fichier de connexion à la base de données
require 'base.php';

// Activer les rapports d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définir la fonction de mappage des spécialités
function mapSpecialite($code) {
    $specialites = [
        'GEN' => 'Généraliste',
        'DEN' => 'Dentiste',
        'CTC' => 'Chirurgie thoracique cardiovasculaire',
        'OPH' => 'Ophtalmologie',
        'CAN' => 'Cancérologie',
        'ORL' => 'ORL',
        'CAR' => 'Cardiologie',
        'ORT' => 'Orthopédie',
        'CHP' => 'Chirurgie pédiatrique',
        'PED' => 'Pédiatrie',
        'URO' => 'Urologie',
        'NEU' => 'Neurologie',
        'ANS' => 'Anesthesie',
        'GYO' => 'Gynécologie obstétrique',
        'CHG' => 'Chirurgie générale',
        'GAS' => 'Gastrologie',
        'HEM' => 'Hématologie',
        'URG' => 'Urgence'
    ];

    return $specialites[$code] ?? $code;
}

// Requête SQL pour obtenir les statistiques par médecin et par jour
$sql = "
SELECT 
    m.nom AS medecin,
    c.datcons,
    COUNT(c.idcons) AS nombre_consultations
FROM 
    consult c
JOIN 
    medecin m ON c.numed = m.idmed
GROUP BY 
    m.nom, c.datcons
ORDER BY 
    m.nom, c.datcons;
";

try {
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll();

    // Vérifier les données récupérées
    if (!$data) {
        echo "Aucune donnée trouvée.";
        $medecins = [];
        $dates = [];
        $consultations = [];
    } else {
        // Préparer les données pour Chart.js
        $medecins = [];
        $consultations = [];

        foreach ($data as $row) {
            $medecins[] = $row['medecin'] . ' - ' . $row['datcons'];
            $consultations[] = $row['nombre_consultations'];
        }
    }
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

// Requête SQL pour obtenir les statistiques par spécialité
$sqls = "
SELECT 
    m.specialite AS specialite,
    COUNT(DISTINCT c.idpa) AS nombre_patients
FROM 
    consult c
JOIN 
    medecin m ON c.numed = m.idmed
GROUP BY 
    m.specialite
ORDER BY 
    nombre_patients DESC;
";

try {
    $stmts = $pdo->query($sqls);
    $datas = $stmts->fetchAll();

    // Vérifier les données récupérées
    if (!$datas) {
        echo "Aucune donnée trouvée.";
        $specialites = [];
        $nombre_patients = [];
    } else {
        // Préparer les données pour Chart.js
        $specialites = [];
        $nombre_patients = [];

        foreach ($datas as $rows) {
            $specialites[] = mapSpecialite($rows['specialite']);
            $nombre_patients[] = $rows['nombre_patients'];
        }

        
    }
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

// Requête SQL pour obtenir le nombre de patients consultés par sexe et par jour pendant la dernière semaine
$sqlSexe = "
SELECT 
    DATE_FORMAT(STR_TO_DATE(c.datcons, '%d/%m/%Y'), '%Y-%m-%d') AS jour_consultation,
    p.sex AS sexe,
    COUNT(DISTINCT c.idpa) AS nombre_patients
FROM 
    consult c
JOIN 
    patient p ON c.idpa = p.idp
WHERE 
    STR_TO_DATE(c.datcons, '%d/%m/%Y') >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
GROUP BY 
    DATE_FORMAT(STR_TO_DATE(c.datcons, '%d/%m/%Y'), '%Y-%m-%d'), p.sex
ORDER BY 
    DATE_FORMAT(STR_TO_DATE(c.datcons, '%d/%m/%Y'), '%Y-%m-%d');";

try {
    $stmtSexe = $pdo->query($sqlSexe);
    $dataSexe = $stmtSexe->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier les données récupérées
    if (!$dataSexe) {
        echo "Aucune donnée trouvée pour le nombre de patients consultés par sexe et par jour.";
        $jours_consultation_sexe = [];
        $nombre_patients_par_sexe = [];
    } else {
        // Préparer les données pour Chart.js
        $jours_consultation_sexe = [];
        $nombre_patients_par_sexe = ['Masculin' => [], 'Féminin' => []];

        foreach ($dataSexe as $row) {
            $jour_consultation = $row['jour_consultation'];
            $sexe = $row['sexe'];
            $nombre_patients = $row['nombre_patients'];

            if (!in_array($jour_consultation, $jours_consultation_sexe)) {
                $jours_consultation_sexe[] = $jour_consultation;
            }

            if (!isset($nombre_patients_par_sexe[$sexe])) {
                $nombre_patients_par_sexe[$sexe] = [];
            }

            $nombre_patients_par_sexe[$sexe][] = $nombre_patients;
        }
    }
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les données
$sql = "SELECT service, SUM(mt) AS somme_mt FROM facture WHERE etat = 'OK' GROUP BY service";
$result = $conn->query($sql);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Requête SQL pour récupérer la somme des montants par service
$sqldd = "SELECT service, SUM(mt) AS total FROM facture WHERE etat = 'OK' GROUP BY service";
$resultdd = $conn->query($sqldd);

$dataTable = array(); // Tableau pour stocker les données du tableau et du graphique

// Récupération des données pour le tableau et le graphique
if ($resultdd->num_rows > 0) {
    while($row = $resultdd->fetch_assoc()) {
        $dataTable[] = array($row["service"], $row["total"]);
    }
} else {
    echo "0 résultats";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord des consultations</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
    <script src="jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nombre de consultations par médecin et par jour</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="consultationChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Nombre de patients par spécialité</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="consultationCharts" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Consultations par sexe et par jour</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="consultationChartSexe" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Recette par service</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <table id="resultTable" class="display">
                            <thead>
                            <tr>
                                <th>Service</th>
                                <th>Somme MT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Affichage des résultats
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['service'] . "</td>";
                                    echo "<td>" . $row['somme_mt'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='2'>Aucun résultat trouvé</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(document).ready( function () {
                                $('#resultTable').DataTable();
                            });
                        </script>

                        <?php
                        // Fermeture de la connexion
                        $conn->close();
                        ?>
                        <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si les données sont disponibles
            const medecins = <?php echo json_encode($medecins); ?>;
            const consultations = <?php echo json_encode($consultations); ?>;
            const specialites = <?php echo json_encode(["Neurologie", "Cardiologie", "Hématologie"]); ?>;
            const nombrePatients = <?php echo json_encode([3, 1, 1]); ?>;
            const joursConsultationSexe = <?php echo json_encode($jours_consultation_sexe); ?>;
            const nombrePatientsParSexe = <?php echo json_encode($nombre_patients_par_sexe); ?>;
            
            if (medecins.length === 0 || consultations.length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des consultations.');
                return;
            }
            if (specialites.length === 0 || nombrePatients.length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des patients.');
                return;
            }
            if (joursConsultationSexe.length === 0 || Object.keys(nombrePatientsParSexe).length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des consultations par sexe.');
                return;
            }

            // Initialiser Chart.js
            const ctx = document.getElementById('consultationChart').getContext('2d');
            const ctxs = document.getElementById('consultationCharts').getContext('2d');
            const ctxSexe = document.getElementById('consultationChartSexe').getContext('2d');

            const consultationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: medecins,
                    datasets: [{
                        label: 'Nombre de consultations',
                        data: consultations,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de consultations'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Médecin - Date'
                            }
                        }
                    }
                }
            });

            const consultationCharts = new Chart(ctxs, {
                type: 'bar',
                data: {
                    labels: specialites,
                    datasets: [{
                        label: 'Nombre de patients',
                        data: nombrePatients,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nombre de patients'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Spécialité'
                            }
                        }
                    }
                }
            });

            const barChartSexe = new Chart(ctxSexe, {
                type: 'bar',
                data: {
                    labels: joursConsultationSexe,
                    datasets: [
                        {
                            label: 'Masculin',
                            data: nombrePatientsParSexe['Masculin'],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Féminin',
                            data: nombrePatientsParSexe['Féminin'],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jour de consultation'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nombre de patients'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>