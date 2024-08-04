<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");

  /*function total(){
    $total = 0;
    
      $pieces = $this->DB->query("SELECT idf, mt FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($pieces as  $piecex) {
      $total += $piecex->mt; 
    }
    return $total;
  }*/
  function toteles(){
    
    $piecesx = $this->DB->query("SELECT sum(mt) as totales FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($piecesx as  $piecex) {
        $totel = $piecex->totales;
    }
    return $totel;
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="container mb-5 mt-3">
                    <form action="Nouvel_facture_cnss_enregistre" method="POST">
                      <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                          <?php 
                            $conxf = mysqli_connect("localhost","root","","spn");
                            $querysf = "SELECT MAX(codf) AS id FROM factures";
                            $query_runxf = mysqli_query($conxf, $querysf);

                            while($query_r = mysqli_fetch_assoc($query_runxf)){
                              $sexam = $query_r["id"] + 1;
                          ?>
                          <?php 
                          //$idpr = $_POST['idp'];
                          $datedebut = $_POST['datedebut'];
                          $datefin = $_POST['datefin']; ?>
                          
                          <input type="hidden" name="dated" value="<?php echo $datedebut; ?>">
                          <input type="hidden" name="datef" value="<?php echo $datefin; ?>">
                          <p style="color: #7e8d9f;font-size: 20px;">Facture >> <strong>N°: #<?php echo $sexam; echo date("Y"); }?></strong></p>
                        </div>
                        <hr>
                      </div>
                      <div class="container">
                        <div class="col-md-12">
                          <div class="text-center">
                            <img src="police.png" width="50" height="70" style="color:#5d9fc5 ;">
                          </div>
                        </div>
                        <?php 
                          $conx = mysqli_connect("localhost","root","","spn");
                          $querys = "SELECT * FROM patient";
                          $query_runx = mysqli_query($conx, $querys);
                        ?>
                          
                        <div class="row">
                          <div class="col-xl-8">
                            <ul class="list-unstyled">
                              
                                <li class="text-muted"><h4><b><span style="size: 18px; color:#5d9fc5;">CNSS</span></b></h4></li>
                                <li class="text-muted"><?php /*echo $rowx['address'];*/ ?></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 77654321<?php /*echo $rowx['tel'];*/ ?></li>
                              <?php  ?>
                            </ul>
                          </div>
                          <?php 
                            $conxf = mysqli_connect("localhost","root","","spn");
                            $querysf = "SELECT MAX(codf) AS id FROM factures";
                            $query_runxf = mysqli_query($conxf, $querysf);

                            while($query_r = mysqli_fetch_assoc($query_runxf)){
                              $sexamf = $query_r["id"] + 1;
                          ?>
                          <input type="hidden" name="idf" value="<?php echo $sexamf; ?>">
                          <div class="col-xl-4">
                            <p class="text-muted"> </p>
                            <ul class="list-unstyled">
                              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                  class="fw-bold">ID:</span>#<?php echo $sexamf . '2023';} ?></li>
                              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                  class="fw-bold">Date de facture : </span><?php echo date("d-m-Y G:i"); ?></li>
                                <input type="hidden" name="datefacture" value="<?php echo date("d-m-Y G:i"); ?>">
                              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                  class="me-1 fw-bold">Statut : </span><span class="badge bg-warning text-black fw-bold">
                                  Impayer</span></li>
                            </ul>
                          </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                          <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Numéro CNSS</th>
                                <th scope="col">Description</th>
                                <th scope="col">Montant</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $con = mysqli_connect("localhost","root","","spn");
                                if(isset($_POST['datedebut']) && isset($_POST['datefin']))
                                {
                                    $from_date = $_POST['datedebut'];
                                    $to_date = $_POST['datefin'];
                                    //$idp = $_POST['idp'];
                                    $query = "SELECT patient.nom, patient.numcnss, facture.desg,facture.mt,facture.mt_cnss,facture.datef FROM patient, facture WHERE facture.datef BETWEEN '$from_date' AND '$to_date' and mt_cnss > 0 AND facture.idp = patient.idp";
                                    $query_run = mysqli_query($con, $query);
                                    $montant_total= 0;
                                    $montant_cnss_total = 0;
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                      $d = 0;
                                      foreach($query_run as $row)
                                      { 
                                        $d += 1;
                                        $montant_total += $row['mt'];
                                        $montant_cnss_total += $row['mt_cnss'];
                                        ?>
                                        <tr>
                                          <td><?= $d; ?></td>
                                          <td><?= $row['datef']; ?></td>
                                          <td><?= $row['nom']; ?></td>
                                          <td><?= $row['numcnss']; ?></td>
                                          <td><?= $row['desg']; ?></td>
                                          <td><?= $row['mt_cnss']; ?></td>
                                        </tr>
                                        <?php
                                      }
                                    }
                                    else
                                    {
                                      echo "No Record Found";
                                    }
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="row">
                          <div class="col-xl-8">

                          </div>
                          <div class="col-xl-4">
                            <p class="text-black float-start"><span class="text-black me-3"> Montant total : </span><span
                                style="font-size: 25px;"> <?php echo number_format($montant_cnss_total,2,',',' '). ' FDJ';?></span></p>
                                <input type="hidden" name="mtt" value="<?php echo $montant_cnss_total; ?>">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-xl-10">
                          <button class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark" type="submit"><i
                              class="fas fa-print text-primary"></i> Imprimer</button>
                          <a class="btn btn-warning text-capitalize" data-mdb-ripple-color="dark" href="Facturation"><i
                              class="far fa-file-pdf text-danger"></i> Annuler</a>
                          </div>
                          <div class="col-xl-2">
                            <button class="btn btn-primary"
                               type="submit" name="charge" style="background-color:#60bdf3 ;"><i class="fas fa-money-bill"></i> Paiement
                             </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
