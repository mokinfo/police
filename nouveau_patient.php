<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if (!isset($_SESSION['user'])) {
    redirect_to("index.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

$patients = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Santé - Police - National</title>
  
  <link rel="icon" href="dist/img/police.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="css/css.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <!-- DataTables JS -->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2vf"></script>
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="css/googlefont.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
</head>
<body>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="card bg-light">
          <div class="inner">
            <center><b style="font-family:Candara; font-size: 20px;">Indicateurs</b></center>
          </div>
        </div>
        <div class="card bg-warning">
          <div class="inner">
            <center><b style="font-family:Candara; font-size: 20px;">Listes des patients</b></center>
          </div>
        </div>
        <div class="row">
          <table id="patientTable" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Civilité</th>
                      <th>Date de Naissance</th>
                      <th>Âge</th>
                      <th>Sexe</th>
                      <th>Situation Familiale</th>
                      <th>Adresse</th>
                      <th>Téléphone</th>
                      <th>Email</th>
                      <th>Date d'Inscription</th>
                      <th>Catégorie</th>
                      <th>Matricule</th>
                      <th>CNSS</th>
                      <th>Numéro CNSS</th>
                      <th>Affectation</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($patients as $patient): ?>
                  <tr>
                      <td><?php echo $patient['idp']; ?></td>
                      <td><?php echo $patient['nom']; ?></td>
                      <td><?php echo $patient['civi']; ?></td>
                      <td><?php echo $patient['daten']; ?></td>
                      <td><?php echo $patient['age']; ?></td>
                      <td><?php echo $patient['sex']; ?></td>
                      <td><?php echo $patient['sitfam']; ?></td>
                      <td><?php echo $patient['address']; ?></td>
                      <td><?php echo $patient['tel']; ?></td>
                      <td><?php echo $patient['email']; ?></td>
                      <td><?php echo $patient['dateinsp']; ?></td>
                      <td><?php echo $patient['catp']; ?></td>
                      <td><?php echo $patient['matricule']; ?></td>
                      <td><?php echo $patient['cnss']; ?></td>
                      <td><?php echo $patient['numcnss']; ?></td>
                      <td><?php echo $patient['affect']; ?></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark"></aside>

  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <script>
      $(document).ready(function() {
          $('#patientTable').DataTable({
              "pageLength": 10,
              "lengthMenu": [
                  [10, 50, 100, 500, 1000, -1],
                  [10, 50, 100, 500, 1000, "Tout"]
              ],
              "paging": true,
              "pagingType": "full_numbers",
              "language": {
                  "sProcessing":    "Traitement en cours...",
                  "sSearch":        "Rechercher&nbsp;:",
                  "sLengthMenu":    "Afficher _MENU_ &eacute;l&eacute;ments",
                  "sInfo":          "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                  "sInfoEmpty":     "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                  "sInfoFiltered":  "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                  "sInfoPostFix":   "",
                  "sLoadingRecords": "Chargement en cours...",
                  "sZeroRecords":   "Aucun &eacute;l&eacute;ment &agrave; afficher",
                  "sEmptyTable":    "Aucune donn&eacute;e disponible dans le tableau",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
                  "oAria": {
                      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                  },
                  "select": {
                      "rows": {
                          "_": "%d lignes s&eacute;lectionn&eacute;es",
                          "0": "Aucune ligne s&eacute;lectionn&eacute;e",
                          "1": "1 ligne s&eacute;lectionn&eacute;e"
                      }
                  }
              }
          });
      });
  </script>
</div></div>
  <!-- /.content-wrapper -->
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
</div>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>