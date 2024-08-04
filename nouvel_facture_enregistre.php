<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php"); 
require_once("includes/functions.php"); 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}  
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();


  $codf = $_POST['idf'];
  $idp = $_POST['idp'];
  $datedebut = $_POST['datedebut'];
  $datefin = $_POST['datefin'];
  $datefacture = $_POST['datefacture'];
  $typepaix = "";
  $nature = "";
  $mtt = $_POST['mtt'];
  //$datehosdt = date("Y-m-d G:i");
  $etat = "OK";
  
    $sql = "INSERT INTO factures (codf, idp, datef, type_paix, mtt, nature) VALUES ('$codf', '$idp', '$datefacture', '$typepaix', '$mtt', '$nature')";
    $mysqli = new mysqli('localhost','root','','spn');
    $mysqli->query($sql);
    
    if (isset($mysqli)) {
      $conq = new mysqli('localhost','root','','spn');
      $queryq = "SELECT * FROM facture WHERE datef BETWEEN '$datedebut' AND '$datefin' AND idp = '$idp'";
      $query_runq = mysqli_query($conq, $queryq);
      /*$conn = new mysqli('localhost', 'root', '', 'spn');
      $sqlv = $conn->query("SELECT * FROM facture WHERE datef BETWEEN '$datedebut' AND '$datefin' and idp = '$idp'");
      $row_cnt = $sqlv->num_rows;*/
      //$i=0;
      //echo "nombre de ligne : ". $row_cnt;
      foreach($query_runq as $rowh){ 
        //echo $i;

        $idff = $rowh['idf'];
        $desg = $rowh['desg'];
        $idp = $rowh['idp'];
        $datef = $rowh['datef'];
        $type_paix = $rowh['type_paix'];
        $mt = $rowh['mt'];
        $mt_cnss = $rowh['mt_cnss'];
        $etat = "OK";
        $datehosdt = date("Y-m-d G:i");
        //echo $idf;
        $sqlf = "UPDATE facture SET idf = '$idff', desg = '$desg', idp = '$idp', datef = '$datef', type_paix = '$type_paix', mt = '$mt', mt_cnss = '$mt_cnss', etat = '$etat', date_paix = '$datehosdt', codf = '$codf' WHERE idf = '$idff'";
        $mysqlif = new mysqli('localhost','root','','spn');
        $mysqlif->query($sqlf);
        //$i= $i+1;
        echo '<script type="text/javascript">';
        echo '$(document).ready(function() {';
        echo 'swal({title: "Facture enregistré !",text: "Merci pour votre confiance !!",icon: "success",button: "Ok",timer: 2000});});</script>';
        
      }
      //redirect_to("Listeattente");
    }
  
//var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Santé - Police - National</title>
  
  <link rel="icon" href="dist/img/police.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <script src="jquery-3.5.1.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
  <script src="jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script src="bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="container mb-5 mt-3">
                  <form action="Nouvel_facture_enregistre" method="POST">
                    <div class="row d-flex align-items-baseline">
                      <div class="col-xl-9">
                        <?php 
                          $conxf = mysqli_connect("localhost","root","","spn");
                          $querysf = "SELECT MAX(codf) AS id FROM factures";
                          $query_runxf = mysqli_query($conxf, $querysf);

                          while($query_r = mysqli_fetch_assoc($query_runxf)){
                            $sexam = $query_r["id"] + 1;
                        ?>
                        <input type="hidden" name="idp" value="<?php echo $sexam; echo date("Y"); ?>">
                        <?php 
                        $datedebut = $_POST['datedebut'];
                        $datefin = $_POST['datefin']; ?>
                        <input type="hidden" name="datedebut" value="<?php echo $datedebut; ?>">
                        <input type="hidden" name="datefin" value="<?php echo $datefin; ?>">
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
                        $idp = $_POST['idp'];
                        $querys = "SELECT * FROM patient WHERE idp = '$idp'";
                        $query_runx = mysqli_query($conx, $querys);
                      ?>
                      <div class="row">
                        <div class="col-xl-8">
                          <ul class="list-unstyled">
                            <?php foreach($query_runx as $rowx){ ?>
                              <li class="text-muted"><h4><b><span style="size: 18px; color:#5d9fc5;"><?php echo $rowx['civi'] ." ". $rowx['nom']; ?></span></b></h4></li>
                              <li class="text-muted"><?php echo $rowx['address']; ?></li>
                              <li class="text-muted"><i class="fas fa-phone"></i> <?php echo $rowx['tel']; ?></li>
                            <?php } ?>
                          </ul>
                        </div>
                        <?php 
                          $conxf = mysqli_connect("localhost","root","","spn");
                          $querysf = "SELECT MAX(codf) AS id FROM factures";
                          $query_runxf = mysqli_query($conxf, $querysf);

                          while($query_r = mysqli_fetch_assoc($query_runxf)){
                            $sexam = $query_r["id"] + 1;
                        ?>
                        <div class="col-xl-4">
                          <p class="text-muted"> </p>
                          <ul class="list-unstyled">
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">ID:</span>#<?php echo $sexam . '2023';} ?></li>
                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                class="fw-bold">Date de facture : </span><?php echo date("d-m-Y G:i"); ?></li>
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
                              <th scope="col">Description</th>
                              <th scope="col">Date</th>
                              <th scope="col">Montant</th>
                              <th scope="col">Part patient</th>
                              <th scope="col">Part assurance</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $cong = mysqli_connect("localhost","root","","spn");
                              if(isset($datedebut) && isset($datefin))
                              {
                                  $from_date = $datedebut;
                                  $to_date = $datefin;
                                  $idps = $idp;
                                  $queryg = "SELECT * FROM facture WHERE datef BETWEEN '$from_date' AND '$to_date' and idp = '$idps'";
                                  $query_rung = mysqli_query($cong, $queryg);
                                  $montant_total= 0;
                                  $montant_cnss_total = 0;
                                  if(mysqli_num_rows($query_rung) > 0)
                                  {
                                    $d = 0;
                                    foreach($query_rung as $rowg)
                                    { 
                                      $d += 1;
                                      $montant_total += $rowg['mt'];
                                      $montant_cnss_total += $rowg['mt_cnss'];
                                      ?>
                                      <tr>
                                        <td><?= $d; ?></td>
                                        <td><?= $rowg['desg']; ?></td>
                                        <td><?= $rowg['datef']; ?></td>
                                        <td><?= $rowg['mt']; ?></td>
                                        <td><?= $rowg['mt']; ?></td>
                                        <td><?= $rowg['mt_cnss']; ?></td>
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
                          <ul class="list-unstyled">
                            <li class="text-muted ms-3"><span class="text-black me-4">Total CNSS : </span><?php echo number_format($montant_cnss_total,2,',',' '). ' FDJ';?></li>
                          </ul>
                          <p class="text-black float-start"><span class="text-black me-3"> Montant total : </span><span
                              style="font-size: 25px;"> <?php echo number_format($montant_total,2,',',' '). ' FDJ';?></span></p>
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
                          <a href="Facturation" class="btn btn-primary"
                             type="submit" name="charge" style="background-color:#60bdf3 ;"><i class="fa fa-backward"></i> Retour
                           </a>
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
</div>
<!-- ./wrapper -->
<script>
  window.addEventListener("load", window.print());
</script>
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
