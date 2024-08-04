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
require_once("tetehos.php");?>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <?php /* <div class="form">
              <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Patient" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                  <button class="btn btn-sidebar">
                    <i class="fas fa-folder fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>*/ ?>
            <?php /*
            
            <i class="fas fa-user-plus fa-3x"></i> Nouveau Patient</a>*/
            ?>
            
            
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <center><b style="text-align:center; font-family:ALGERIAN; font-size: 60px;">HOSPITALISATION</b></center>
              </div>
            </div>
            </a>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <?php 
          if (isset($_SESSION['statut'])) {
            ?>
              <h4 class="alert alert-success"><?php echo $_SESSION['statut']; ?></h4>
            <?php 
            unset($_SESSION['statut']);
          }
        ?>
        <div class="row">
          <div class="col-md-12">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php 
                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT hospitalisation.idh ,hospitalisation.idp ,hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.chambre, hospitalisation.service, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age, facture.etat, facture.datef, hospitalisation.date_hos FROM patient, hospitalisation, facture where patient.idp = hospitalisation.idp and hospitalisation.etat = 'ENT' and hospitalisation.idp = facture.idp and DATE(facture.datef) = hospitalisation.date_hos AND facture.etat = 'OK' and facture.desg = 'Frais de chambre' group by hospitalisation.idp ORDER BY hospitalisation.idh DESC");
                        
                        $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Nombres des patients en attente : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktab">
                            <thead>
                              <tr>
                                <td></td>
                                <td>Nom complet</td>
                                <td>Médecin traitant</td>
                                <td>Date - heure</td>
                                <td>Service</td>
                                <td>Chambre</td>
                                <td>Etat</td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody><?php 
                                while($data = $sql->fetch_array()){
                                  if ($data['service'] == "MI") {
                                    $fik = "Médecin interne";
                                  }else if ($data['service'] == "PD") {
                                    $fik = "Pédiatrie";
                                  }else{
                                    $fik = "Ophtalmo";
                                  }
                                  if ($data['sex'] == "Féminin") {
                                    $sexe = "<i class=\"fa fa-female text-danger align-items-center\"></i>";
                                  }else if ($data['sex'] == "Masculin") {
                                    $sexe = "<i class=\"fa fa-male text-primary align-items-center\"></i>";
                                  }else{
                                    $sexe = "<i class=\"fa fa-user text-light align-items-center\"></i>";
                                  }
                                  if ($data['etat'] == "ENT") {
                                    $etat = "<i class=\"fa fa-user text-warning align-items-center\"> Attente</i>";
                                  }else{
                                    $etat = "<i class=\"fa fa-user text-light align-items-center\"> NSP</i>";
                                  }
                                  if ($data['chambre'] == 1) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> Commune</i>";
                                  }elseif ($data['chambre'] == 2) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> 3 lits</i>";
                                  }elseif ($data['chambre'] == 3) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> 2 lits</i>";
                                  }elseif ($data['chambre'] == 4) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> VIP</i>";
                                  }elseif ($data['chambre'] == 5) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> Normal</i>";
                                  }elseif ($data['chambre'] == 6) {
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> Catégorie</i>";
                                  }else{
                                    $chambre = "<i class=\"fa fa-bed align-items-center\"> NSP</i>";
                                  }

                                  $oper = $data['med_trai'];
                                  $oper_nom = '';
                                  $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                  foreach ($pieces as $piece):
                                    $oper_nom = $piece->nom;
                                  endforeach; 
                                  echo '<tr>

                                    <td>'.$sexe.'</td>
                                    <td>'.$data['civi'].' '.$data['nom'].'</td>
                                    <td>'.$oper_nom.'</td>
                                    <td>'.$data['date_hos'].'</td>
                                    <td>'.$fik.'</td>
                                    <td>'.$chambre.'</td>
                                    <td>'.$etat.'</td>
                                    <td><a href="Modifier_Hospitalisation?id=' . $data['idh'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
                                  </tr>';
                                }
                              ?><?php /* | <a href="delete_coop.php?id=' . $data['idpa'] .' "><i class="fas fa-trash-alt" style="color:red;"></i></a>*/ ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->


<!-- jQuery -->
<script>
  $(document).ready(function () {
      $('#ronno').DataTable();
      $('#donno').DataTable();
      $('#jaktab').DataTable();
      $('#jaktal').DataTable();
  });
</script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

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