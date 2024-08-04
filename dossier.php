<?php  require("tetecd.php"); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <div class="form">
              <div class="input-group" data-widget="sidebar-search">
                <?php 
                  if(!empty($_GET['id'])) {
                    $ids = $_GET['id'];
                    $pieces = $DB->query("SELECT idp, nom, sex, age, daten FROM patient where idp = '$ids'");
                    ?>
                    <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <?php 
                          foreach ($pieces as $patien): ?>
                            <?php  if ($patien->sex == "Masculin") { 
                              echo "<center><img src=\"image/male.png\" width=\"125\" height=\"125\"></center>";
                            }else if ($patien->sex == "Féminin") { 
                              echo "<img src=\"image/female.png\" width=\"125\" height=\"125\">";
                            }  ?>
                            
                        </div>
                        <?php 
                          endforeach;?>
                      </div>
                    </div>
                    <div class="col-lg-10 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <?php 
                          foreach ($pieces as $patien): ?>
                            <h3><?php  echo $patien->nom ; ?> - PSPN° : <?php  echo $patien->idp ; ?></h3>
                            <i>Sexe : <?php  echo $patien->sex ; ?>&nbsp;&nbsp;</i><br>
                            <i>Né(e) le : <?php  echo $patien->daten ; ?></i><br>
                            <i>Âge : <?php  echo $patien->age ; ?> ans</i>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person"></i>
                        </div>
                        <?php 
                          endforeach;?>
                      </div>
                    </div>
                    <div class="col-lg-12 col-6">
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-folder-open text-warning"></i> Dossier médicale</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-heartbeat text-danger"></i> Antécédents</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-info-circle"></i> Informations</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Documents" role="tab" aria-controls="Documents" aria-selected="false"><i class="fas fa-file text-success"></i> Documents</a>
                                </li>
                              </ul>
                          </div>
                          <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                  <div class="col-sm-4 bg-white">
                                    <div class="form-group">
                                       <p  for="inputEmail3" class="floatingInputValue"><i class="fa fa-clipboard-list" style="color:green;"></i> Consultation</p>
                                      <?php 
                                      //Consultation
                                        $consult = $DB->query("SELECT idcons, datcons FROM consult where idpa = '$ids'");
                                      ?>
                                      <?php 
                                      foreach ($consult as $consul): ?>
                                        <p class="col-sm-12"><a href="ac.php?id=<?php echo $consul->idcons ?>" target="iframe_a"><i class="fa fa-clipboard-list" style="color:green;"></i> <?php echo $consul->datcons; ?></a></p>
                                        <?php 
                                      endforeach;?>
                                      <p  for="inputEmail3" class="floatingInputValue"><i class="fa fa-capsules" style="color:purple;"></i> Ordonnance</p>
                                      <?php 
                                      //Ordonnance
                                        $ordonnance = $DB->query("SELECT id, datord FROM prescription where idp = '$ids'");
                                      ?>
                                      <?php 
                                      foreach ($ordonnance as $ordonnanc): ?>
                                        <p  for="inputEmail3" class="col-sm-12"><a href="Affiche_ordonnance?id=<?php echo $ordonnanc->id ?>" target="iframe_a"><i class="fa fa-capsules" style="color:purple;"></i> Ordonnance <?php echo $ordonnanc->datord; ?></a></p>
                                        <?php 
                                      endforeach;?>

                                      <p  for="inputEmail3" class="floatingInputValue"><i class="fa fa-vials"  style="color:orange;"></i>  Examen Laboratoire</p>
                                      <?php 
                                      //Examen laboratoire
                                        $examen = $DB->query("SELECT ide, datej FROM examens where idp = '$ids'");
                                      ?>
                                      <?php 
                                      foreach ($examen as $exam): ?>
                                        <p for="inputEmail3" class="col-sm-12"><a href="Resultat?id=<?php echo $exam->ide ?>" target="iframe_a"><i class="fa fa-vials"  style="color:orange;"></i> <?php echo $exam->datej; ?></a></p>
                                        <?php 
                                      endforeach;?>

                                      <p  for="inputEmail3" class="floatingInputValue"><i class="fa fa-receipt" style="color:black;"></i>  Imagerie</p>
                                      <?php 
                                      //Imagerie
                                        $images = $DB->query("SELECT idim, dateim FROM imagerie where idp = '$ids'");
                                      
                                      foreach ($images as $imag): ?>
                                        <p  for="inputEmail3" class="col-sm-12"><a href="Resultat_Imagerie?id=<?php echo $imag->idim ?>" target="iframe_a"><i class="fa fa-receipt" style="color:black;"></i><?php echo $imag->dateim; ?></a></p>
                                        <?php 
                                      endforeach;?>
                                      <p  for="inputEmail3" class="floatingInputValue"><i class="fa fa-envelope-open-text" style="color:blue;"></i> Arrêt de travail</p>
                                    </div>
                                    <div class="form-group">
                                      <p class="label label-primary"><i class="fa fa-bed" style="color:brown;"></i> Hospitalisation</p>
                                      <?php 
                                      //Hospitalisation
                                        $hospit = $DB->query("SELECT idh, date_hos FROM hospitalisation where idp = '$ids'");
                                      ?>
                                      <?php 
                                      foreach ($hospit as $hosp): ?>
                                        <p class="col-sm-12"><a href="affiche_hospital.php?id=<?php echo $hosp->idh ?>" target="iframe_a"><i class="fa fa-bed" style="color:brown;"></i> <?php echo $hosp->date_hos; ?></a></p>
                                        <?php 
                                      endforeach;?>
                                    </div>
                                    <div class="form-group">
                                        <p class="label label-primary"><i class="fa fa-calendar" style="color:red;"></i> RDV</p>
                                    </div>
                                  </div>
                                  <div class="col-sm-8 bg-light">
                                    <div class="form-group">
                                      <iframe src="mokinfo.html" name="iframe_a" height="500px" width="100%" title="Iframe Example" style="border:none; display: block;"></iframe>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h2></h2>

                                <!-- Trigger/Open The Modal -->
                                

                                <!-- The Modal -->
                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                              </div>
                              <div class="tab-pane fade" id="Documents" role="tabpanel" aria-labelledby="contact-tab">
                                <form action="autresdocs.php" method="post" enctype="multipart/form-data">
                                  <input class="form-control" type="hidden" name="codepatient" id="codepatient" value="<?php echo $ids; ?>"><br><br>
                                  
                                  <label class="form-control" for="files">Choisissez des fichiers (PDF, Word, Images):</label>
                                  <input class="form-control" type="file" name="files[]" id="files" multiple required><br><br>
                                  
                                  <input class="form-control" type="submit" name="submit" value="Upload">
                                </form>
                                <?php
                                // Configuration de la connexion à la base de données
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "spn";

                                // Créer une connexion
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Vérifier la connexion
                                if ($conn->connect_error) {
                                    die("La connexion a échoué: " . $conn->connect_error);
                                }

                                // Récupérer les documents pour un code patient spécifique
                                $codepatient = 19; // Remplacez par le code du patient souhaité ou obtenez-le dynamiquement

                                $sql = "SELECT * FROM document WHERE codepatient = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $codepatient);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Début du code HTML
                              ?>
                              <h2 class="mb-4">Documents pour le Patient <?php echo htmlspecialchars($codepatient); ?></h2>
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Nom du Fichier</th>
                                          <th>Libellé</th>
                                          <th>Date</th>
                                          <th>Consulter</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php while ($row = $result->fetch_assoc()): ?>
                                          <tr>
                                              <td><?php echo htmlspecialchars($row['iddoc']); ?></td>
                                              <td><?php echo htmlspecialchars($row['nom']); ?></td>
                                              <td><?php echo htmlspecialchars($row['libelle']); ?></td>
                                              <td><?php echo htmlspecialchars($row['date']); ?></td>
                                              <td>
                                                  <a href="Documents/<?php echo htmlspecialchars($codepatient); ?>/<?php echo htmlspecialchars($row['nom']); ?>" target="_blank" class="">Consulter</a>
                                              </td>
                                          </tr>
                                      <?php endwhile; ?>
                                  </tbody>
                              </table>
                              <?php
                                // Fermer la connexion
                                $stmt->close();
                                $conn->close();
                              ?>
                              </div>
                            </div>
                            <div class="table-responsive"> 
                              
                            </div>
                          </div>
                      </div> 
                    </div>
                  <?php  
                  }else{?>
                    <div id="London" class="tabcontent">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header bg-light">
                              <?php 
                                  $conn = new mysqli('localhost', 'root', '', 'spn');
                                  /*$sql = $conn->query("SELECT consult.idcons, consult.idpa, consult.datcons, consult.motif, consult.examc, consult.heurdc, consult.heurfc, consult.statcons, patient.idp, patient.nom, patient.civi FROM patient, consult where patient.idp = consult.idpa ORDER BY consult.heurdc ASC"); */
                                  $sql = $conn->query("SELECT * FROM patient");  
                                $row_cnt = $sql->num_rows;
                              ?>
                              <h5 class="card-title">Nombre des dossiers : <b><?php  echo($row_cnt); ?></b></h5>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <table class="table  table-striped table-bordred table-hover" id="jaktab">
                                    <thead>
                                      <tr>
                                        <td>ID</td>
                                        <td>Nom complet</td>
                                        <td>Âge</td>
                                        <td>Situation Familiale</td>
                                        <td>Catégorie</td>
                                        <td>CNSS</td>
                                        <td>Date inscription</td>
                                        <td>Action</td>
                                      </tr>
                                    </thead>
                                    <tbody><?php 
                                        while($data = $sql->fetch_array()){
                                          if($data['catp'] == 'POA'){ $catp = 'Policier active';}
                                          if($data['catp'] == 'POR'){ $catp = 'Policier rétraité';}
                                          if($data['catp'] == 'CIV'){ $catp = 'Civile';}
                                          if($data['catp'] == 'FPA'){ $catp = 'Famille Policier active';}
                                          if($data['catp'] == 'FPR'){ $catp = 'Famille Policier rétraité';}
                                          if($data['catp'] == 'MIL'){ $catp = 'Militaire';}
                                          if($data['catp'] == 'GEN'){ $catp = 'Gendarme';}
                                          if($data['catp'] == 'GAR'){ $catp = 'Garde républicaine';}
                                          if($data['catp'] == 'GAC'){ $catp = 'Garde de côte';}
                                          echo '<tr>
                                            <td>'.$data['idp'].'</td>
                                            <td>'.$data['civi'].' '.$data['nom'].'</td>
                                            <td>'.$data['age'].'</td>
                                            <td>'.$data['sitfam'].'</td>
                                            <td>'.$catp.'</td>
                                            <td>'.$data['cnss'].'</td>
                                            <td>'.$data['dateinsp'].'</td>
                                            <td><a href="Dossier?id=' . $data['idp'] .' " style=\"text-align:center;\"><i class="fas fa-folder-open fa-2x text-warning"></i></a></td>
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
                        </div>
                      </div>
                    </div><?php   
                  }
                ?>    
              </div>
            </div>
            <?php /*
            <i class="fas fa-user-plus fa-3x"></i> Nouveau Patient</a>*/
            ?>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo "
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: 'Les fichiers ont été téléchargés avec succès!',
            confirmButtonText: 'OK'
        });
        ";
    }
    ?>
</script>
<!-- ./wrapper -->
<script>
  $(document).ready(function(){
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();
  });
</script>
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>