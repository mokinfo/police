<?php
// Inclure le fichier de connexion à la base de données
require 'base.php';

// Activer les rapports d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord des consultations</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nombre de patients consultés par sexe et par jour</h3>
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
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const joursConsultationSexe = <?php echo json_encode($jours_consultation_sexe); ?>;
            const nombrePatientsParSexe = <?php echo json_encode($nombre_patients_par_sexe); ?>;

            if (joursConsultationSexe.length === 0 || Object.keys(nombrePatientsParSexe).length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des consultations par sexe.');
                return;
            }

            const ctxSexe = document.getElementById('consultationChartSexe').getContext('2d');
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
                            title: {
                                display: true,
                                text: 'Jour de consultation'
                            }
                        },
                        y: {
                            beginAtZero: true,
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