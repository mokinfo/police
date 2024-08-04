<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                        <div class="col-xl-3 float-end">
                          <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                              class="fas fa-print text-primary"></i> Imprimer</a>
                          <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                              class="far fa-file-pdf text-danger"></i> Exporter</a>
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
                                $con = mysqli_connect("localhost","root","","spn");
                                if(isset($_POST['datedebut']) && isset($_POST['datefin']))
                                {
                                    $from_date = $_POST['datedebut'];
                                    $to_date = $_POST['datefin'];
                                    $idp = $_POST['idp'];

                                    $query = "SELECT * FROM facture WHERE datef BETWEEN '$from_date' AND '$to_date' and idp = '$idp'";
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
                                          <td><?= $row['desg']; ?></td>
                                          <td><?= $row['datef']; ?></td>
                                          <td><?= $row['mt']; ?></td>
                                          <td><?= $row['mt']; ?></td>
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
                          </div>
                          <div class="col-xl-2">
                            <button type="button" class="btn btn-primary"
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
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
