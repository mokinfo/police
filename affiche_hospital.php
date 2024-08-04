<?php require 'db.class.php';
$DB = new DB(); ?>
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
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
  
  <script src="jquery-3.5.1.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
  <script src="jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script src="bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<div class="content-wrapper">
  <div class='row'>
    <div class='col-md-12'>
        <div class='card shadow mb-4'>
            <div class='card-header py-3'>
                <ul class='nav nav-tabs' id='myTab' role='tablist'>
                    <li class='nav-item'>
                        <a class='nav-link active' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'><i class='fas fa-info-circle text-primary'></i> Information générale</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='false'><i class='fas fa-list text-danger'></i> Actes</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' id='suivie-tab' data-toggle='tab' href='#suivie' role='tab' aria-controls='suivie' aria-selected='false'><i class='fas fa-signal text-info'></i> Suivi patient</a>
                    </li>
                </ul>
            </div>
            <div class='card-body'>
                <div class='tab-content' id='myTabContent'>
                    <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                        <div class="row">
                            <div class="card">
                              <div class="card-header bg-light">
                                <?php
                                  if(!empty($_GET['id'])) {
                                    $ids = $_GET['id'];  
                                  }
                                  $conn = new mysqli('localhost', 'root', '', 'spn');
                                  $sql = $conn->query("SELECT hospitalisation.idh, hospitalisation.idp, hospitalisation.hospar, hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.motif_hos, hospitalisation.service, hospitalisation.chambre, hospitalisation.lit, hospitalisation.tuteur, hospitalisation.date_nai_garde, hospitalisation.cdi, hospitalisation.date_cdi, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age FROM patient, hospitalisation where patient.idp = hospitalisation.idp and hospitalisation.idh = '$ids' ORDER BY hospitalisation.idh ASC");
                                  while($data = $sql->fetch_array()){
                                ?>
                                <h5 class="card-title">Hospitalisation numéro : <b><?php  echo $data['idh']; ?></b></h5>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header bg-secondary">
                                        <H4>Information générale</H3>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"> 
                                    <div class="form-group">
                                      <label>Nom du patient</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['nom']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospitalisé par</label>
                                        <?php 
                                        $oper = $data['hospar'];
                                        $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                        foreach ($pieces as $piece):
                                          $oper_nom = $piece->nom;
                                        endforeach; ?>
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Médecin traitant</label>
                                        <?php 
                                        $oper = $data['med_trai'];
                                        $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                        foreach ($pieces as $piece):
                                          $oper_nom = $piece->nom;
                                        endforeach; ?>
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date hospitalisé</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['date_hos']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Motif</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['motif_hos']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Service</label>
                                      <?php if($data['service'] =="MI"){ $services = "Médecine";}elseif($data['service'] =="PD"){ $services = "Pédiatrie";}elseif($data['service'] =="OP"){ $services = "Chirurgie";}elseif($data['service'] =="GO"){ $services = "Gynécologie obstétrique";}?>
                                        <input class="form-control" type="text" value="<?php  echo $services; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Chambre</label>
                                      <?php if ($data['chambre'] == 1) {
                                        $cham = "Catégorie"; 
                                      }else{
                                        $cham = "Normal"; 
                                      } ?>
                                        <input class="form-control" type="text" value="<?php  echo $cham; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Lit</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['lit']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header bg-secondary">
                                        <H4>Tuteur ou garde</H3>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Tuteur</label>
                                        <input class="form-control" type="text" value="<?php   echo $data['tuteur']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date de naissance du tuteur</label>
                                        <input class="form-control" type="text" value="<?php   echo $data['date_nai_garde']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>CDI N°</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['cdi']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date CDI</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['date_cdi']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Etat actuel du patient</label>
                                        <?php if($data['etat'] =="HOS"){ $etat = "Hospitalisé";}
                                        if($data['etat'] =="SOR"){ $etat = "SORTIE";}
                                        if($data['etat'] =="ENT"){ $etat = "En attente";}?>
                                        <input class="form-control" type="text" value="<?php  echo $etat;} ?>" disabled>
                                    </div>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div id="London" class="tabcontent">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header bg-light">
                                    <?php 
                                      $conn = new mysqli('localhost', 'root', '', 'spn');
                                      $sql = $conn->query("SELECT * FROM actes where idh = '$ids' ORDER BY ida DESC");
                                      $row_cnt = $sql->num_rows;
                                    ?>
                                    <h5 class="card-title">Nombres d'actes subis : <b><?php  echo($row_cnt); ?></b></h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <table class="table  table-striped table-bordred table-hover" id="jaktab">
                                          <thead>
                                            <tr>
                                              <th>Intitulé</th>
                                              <th>Date - heure</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody><?php 
                                              while($data = $sql->fetch_array()){
                                                /*if ($data['service'] == "MI") {
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
                                                if ($data['etat'] == "HOS") {
                                                  $etat = "<i class=\"fa fa-user text-warning align-items-center\"> hospitalisé</i>";
                                                }else if ($data['sex'] == "Masculin") {
                                                  $etat = "<i class=\"fa fa-user text-success align-items-center\"> Sortie</i>";
                                                }else{
                                                  $etat = "<i class=\"fa fa-user text-light align-items-center\"> NSP</i>";
                                                }*/

                                                /*$oper = $data['med_trai'];
                                                $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                                foreach ($pieces as $piece):
                                                  $oper_nom = $piece->nom;
                                                endforeach; */
                                                echo '<tr>
                                                  <td>'.$data['intitule'].'</td>
                                                  <td>'.$data['date_acte'].'</td>
                                                  <td><a href="Affiche_Hospitalisation?id=' . $data['ida'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
                        <div class="tab-pane fade" id="suivie" role="tabpanel" aria-labelledby="suivie-tab">
                          <div id="London" class="tabcontent">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header bg-light">
                                    <?php 
                                      $conn = new mysqli('localhost', 'root', '', 'spn');
                                      $sql = $conn->query("SELECT * FROM suivie where idh = '$ids' ORDER BY ids DESC");
                                      $row_cnt = $sql->num_rows;
                                    ?>
                                    <h5 class="card-title">Nombre des traitements reçu : <b><?php  echo($row_cnt); ?></b></h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <table class="table  table-striped table-bordred table-hover" id="jaktab">
                                          <thead>
                                            <tr>
                                              <th>Intitulé</th>
                                              <th>Date - heure</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody><?php 
                                              while($data = $sql->fetch_array()){
                                                echo '<tr>
                                                  <td>'.$data['intitule'].'</td>
                                                  <td>'.$data['date_suivie'].'</td>
                                                  <td><a href="Affiche_Hospitalisation?id=' . $data['ids'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
                </div>
            </div>
        </div>
    </div>
  </div>