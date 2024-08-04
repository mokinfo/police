<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tete.php");
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            
            <?php 
            $datess = date("d/m/Y");
              $pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp ORDER BY entre.num ASC");
              /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
              ?>
              
              <div id="zonereq">
                
                <?php  echo count($pieces); ?> patient(s) est en attente</b>
              </div>
            <table class="table  table-striped table-bordred table-hover" id="jaktab" style="width:100%">
              <thead>
                  <tr>
                      <th></th>
                      <th> N° </th>
                      <th> Nom complet </th>
                      <th> Né(e) le  </th>
                      <th> Statut </th>
                      <th> Arrivé à </th>
                      <th> Consultation </th>
                      <th> Docteur </th>
                      <th> Motif </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                <?php   
                  foreach ($pieces as $piece):
                    if($piece->idp & 1){
                      echo "<tr  bgcolor=\"#fff5e6\">";
                      if ($piece->sex == "Féminin") {
                        echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                      }else if ($piece->sex == "Masculin") {
                        echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                      }else{
                        echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                      }
                      echo "<td>" . $piece->num . "</td>";
                      echo "<td>" . $piece->nom . "</td>";
                      echo "<td>" . $piece->daten . "</td>";
                      if ($piece->statut == "A") {
                        echo "<td><i class=\"fa fa-hourglass-half text-warning align-items-center\"></i> En attente</td>";
                      }else if ($piece->statut == "F") {
                        echo "<td><i class=\"fa fa-check-circle text-success align-items-center\"></i> Terminer</td>";
                      }else{
                        echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> En consultation</td>";
                      }
                      echo "<td>" . $piece->heura . "</td>";
                      echo "<td>" . $piece->heurf . "</td>";
                      echo "<td>" . $piece->nom_medecin . "</td>";
                      echo "<td>" . $piece->motif . "</td>";
                      /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                      echo "<td><a href=\"printentre.php?id=" . $piece->ident . "\" target=\"_blank\"><i class=\"fa fa-print\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"Consultation?id=" . $piece->ident . "\"><i class=\"fa fa-eye  text-warning align-items-center\" ></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"Dossier?id=" . $piece->idp . "\"><i class=\"fa fa-folder-open  text-success align-items-center\" ></i></a></tr>";
                    }
                    else{
                      echo "<tr>";
                      if ($piece->sex == "Féminin") {
                        echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                      }else if ($piece->sex == "Masculin") {
                        echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                      }else{
                        echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                      }
                      echo "<td>" . $piece->num . "</td>";
                      echo "<td>" . $piece->nom . "</td>";
                      echo "<td>" . $piece->daten . "</td>";
                      if ($piece->statut == "A") {
                        echo "<td><i class=\"fa fa-hourglass-half text-warning align-items-center\"></i> En attente</td>";
                      }else if ($piece->statut == "F") {
                        echo "<td><i class=\"fa fa-check-circle text-success align-items-center\"></i> Terminer</td>";
                      }else{
                        echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> En consultation</td>";
                      }
                      echo "<td>" . $piece->heura . "</td>";
                      echo "<td>" . $piece->heurf . "</td>";
                      echo "<td>" . $piece->nom_medecin . "</td>";
                      echo "<td>" . $piece->motif . "</td>";
                      /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                      echo "<td><a href=\"printentre.php?id=" . $piece->ident . "\" target=\"_blank\"><i class=\"fa fa-print\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"Consultation?id=" . $piece->ident . "\"><i class=\"fa fa-eye  text-warning align-items-center\" ></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"Dossier?id=" . $piece->idp . "\"><i class=\"fa fa-folder-open  text-success align-items-center\" ></i></a></tr>";
                    }
                    
                    /*}
                    mysqli_free_result($res); */
                  endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
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
<script>
  $(document).ready(function () {
      $('#ronno').DataTable();
      $('#donno').DataTable();
      $('#jaktab').DataTable();
      $('#jaktal').DataTable();
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
</body>
</html>
