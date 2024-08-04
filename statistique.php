<?php 
require_once("includes/session.php");
//require 'db.class.php';
//$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tete.php");
?>
     <script src="js/chart.js"></script>
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
<script>
  function calculate_age(){
    var age = new Date(document.getElementById("age").value);
    var age_day = age.getDate();
    var age_month = age.getMonth();
    var age_year = age.getFullYear();
    
    var today_date = new Date();
    var today_day = today_date.getDate();
    var today_month = today_date.getMonth();
    var today_year = today_date.getFullYear();

    var calculated_age = 0;

    if(today_month > age_month) calculated_age = today_year - age_year;
    else if (today_month == age_month){
      if (today_day >= age_day) calculated_age = today_year - age_year;
      else calculated_age = today_year - age_year - 1;
    }
    else calculated_age = today_year - age_year - 1;

    var output_value = calculated_age;
    document.getElementById("calculated_age").value = calculated_age;
  }
  function sexedef(){
    var civi = document.getElementById("civi").value;
    var sexedef = 0;
    if (civi == "M.") sexedef = "Masculin";
    else if (civi == "Mme" || civi == "Mlle") sexedef = "Féminin";
    else sexedef = "SEXE";
    document.getElementById("sexe").value = sexedef;
  }
</script>
<style>
  
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-light">
                <div class="card-header">
                    <h1 class="card-title">Statistiques</h1>
                </div>
            </div>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                        <table id="resultTable" class="table table-striped table-bordered">
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
        </div>
    </div>
    <!-- Script pour DataTables -->


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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  </div>
  <footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->


<!-- Script pour le graphique -->
<script>
    // Récupération des données pour le graphique
    var labels = <?php echo json_encode(array_column($dataTable, 0)); ?>;
    var data = <?php echo json_encode(array_column($dataTable, 1)); ?>;
    
    // Affichage des données du graphique pour débogage
    console.log(labels);
    console.log(data);

    // Création du graphique
    var ctxd = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctxd, {
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>

<script src="js/bootstrap-select.min.js"></script>

<script src="script.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si les données sont disponibles
            const medecins = <?php echo json_encode($medecins); ?>;
            const consultations = <?php echo json_encode($consultations); ?>;
            const specialites = <?php echo json_encode($specialites); ?>;
            const nombrePatients = <?php echo json_encode($nombre_patients); ?>;
            
            if (medecins.length === 0 || consultations.length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des consultations.');
                return;
            }
            if (specialites.length === 0 || nombrePatients.length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique des patients.');
                return;
            }

            // Initialiser Chart.js
            const ctx = document.getElementById('consultationChart').getContext('2d');
            const ctxs = document.getElementById('consultationCharts').getContext('2d');

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
        });
    </script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vérifier si les données sont disponibles
            const medecins = <?php echo json_encode($medecins); ?>;
            const consultations = <?php echo json_encode($consultations); ?>;
            
            if (medecins.length === 0 || consultations.length === 0) {
                console.error('Aucune donnée disponible pour afficher le graphique.');
                return;
            }

            // Initialiser Chart.js
            const ctx = document.getElementById('consultationChart').getContext('2d');
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
                                text: 'Médecin'
                            }
                        }
                    }
                }
            });
        });
    </script>

<script src="js/chart.js"></script>
</body>
</html>