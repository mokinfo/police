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
<!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>

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
            </div>*/ 
            ?>
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
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-info-circle text-primary"></i> Information générale</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="card">
                            <form id="updateForm" action="Modif_Hospitalisation" method="post">
                              <div class="card-header bg-light">
                                <?php
                                  if(!empty($_GET['id'])) {
                                    $ids = $_GET['id'];  
                                  }
                                  $conn = new mysqli('localhost', 'root', '', 'spn');
                                  $sql = $conn->query("SELECT hospitalisation.idh, hospitalisation.idp, hospitalisation.hospar, hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.motif_hos, hospitalisation.service, hospitalisation.chambre, hospitalisation.lit, hospitalisation.tuteur, hospitalisation.date_nai_garde, hospitalisation.cdi, hospitalisation.date_cdi, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age, patient.daten, patient.catp, patient.matricule, patient.address, patient.tel FROM patient, hospitalisation where patient.idp = hospitalisation.idp and hospitalisation.idh = '$ids' ORDER BY hospitalisation.idh ASC");
                                  while($data = $sql->fetch_array()){
                                ?>
                                <h5 class="card-title">Hospitalisation numéro : <b><?php  echo $data['idh']; ?><input type="hidden" name="idh" value="<?php echo $data['idh']; ?>"></b></h5>  
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
                                      <input class="form-control" type="text" value="<?php  echo $data['nom']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6"> 
                                    <div class="form-group">
                                      <label>Date de naissance</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['daten']; ?>">
                                    </div>
                                  </div>                                  
                                  <div class="col-sm-3"> 
                                    <div class="form-group">
                                      <label>Catégorie de patient</label>
                                      <?php 
                                      if($data['catp'] == 'POA'){ $catepatient = 'Policier actif';}
                                      if($data['catp'] == 'POR'){ $catepatient = 'Policier retraité';}
                                      if($data['catp'] == 'CIV'){ $catepatient = 'Civile';}
                                      if($data['catp'] == 'FPA'){ $catepatient = 'Famille Policier actif';}
                                      if($data['catp'] == 'FPR'){ $catepatient = 'Famille Policier retraité';}
                                      if($data['catp'] == 'MIL'){ $catepatient = 'Militaire';}
                                      if($data['catp'] == 'GEN'){ $catepatient = 'Gendarme';}
                                      if($data['catp'] == 'GAR'){ $catepatient = 'Garde républicaine';}
                                      if($data['catp'] == 'GAC'){ $catepatient = 'Garde de côte';} 
                                      ?>
                                      <input class="form-control" type="text" value="<?php  echo $catepatient; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3"> 
                                    <div class="form-group">
                                      <label>Matricule</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['matricule']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3"> 
                                    <div class="form-group">
                                      <label>Adresse</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['address']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-3"> 
                                    <div class="form-group">
                                      <label>Numéro téléphone</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['tel']; ?>">
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
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>">
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
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date hospitalisé</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['date_hos']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Motif</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['motif_hos']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Service</label>
                                      <?php if($data['service'] =="MI"){ $services = "Médecine";}elseif($data['service'] =="PD"){ $services = "Pédiatrie";}elseif($data['service'] =="OP"){ $services = "Chirurgie";}elseif($data['service'] =="GO"){ $services = "Gynécologie obstétrique";}?>
                                        <input class="form-control" type="text" value="<?php  echo $services; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Chambre</label>
                                      <?php 


                                      if ($data['chambre'] == 1) {
                                        $cham = "Commune";
                                      }elseif ($data['chambre'] == 2) {
                                        $cham = "3 lits";
                                      }elseif ($data['chambre'] == 3) {
                                        $cham = "2 lits";
                                      }elseif ($data['chambre'] == 4) {
                                        $cham = "VIP";
                                      }elseif ($data['chambre'] == 5) {
                                        $cham = "Normal";
                                      }elseif ($data['chambre'] == 6) {
                                        $cham = "Catégorie";
                                      }else{
                                        $cham = "NSP";
                                      } ?>
                                        <input class="form-control" type="text" value="<?php  echo $cham; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Lit</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['lit']; ?>">
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
                                        <input class="form-control" type="text" value="<?php   echo $data['tuteur']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date de naissance du tuteur</label>
                                        <input class="form-control" type="text" value="<?php   echo $data['date_nai_garde']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>CDI N°</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['cdi']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date CDI</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['date_cdi']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Etat actuel du patient</label>
                                        <?php if($data['etat'] =="HOS"){ $etat = "Hospitalisé";}
                                        if($data['etat'] =="SOR"){ $etat = "SORTIE";} if($data['etat'] =="ENT"){ $etat = "En Attente";}?>
                                        <input class="form-control" type="text" value="<?php  echo $etat; ?>">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <a href="Imprimer_Fiche_Hosp?id=<?php echo $data['idh'];} ?>" class="form-control btn btn-primary" name="imprimer"><i class="fas fa-print"></i> Imprimer le Formulaire d'admission</a>
                                      </div>
                                    </div>
                                  <div class="col-sm-12">
                                      <div class="form-group">
                                        <button class="form-control bg-warning" type="submit" name="enreg" id="submitBtn"><i class="fas fa-bed"></i> Hospitalisé le patient</button>
                                      </div>
                                  </div>  
                                </div>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <a href="#" class="btn btn-warning" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus"></i> Nouveau Acte</a>
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
                          <a href="#" class="btn btn-warning" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal4"><i class="fas fa-analytics"></i> Suivi patient</a>
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
                      <div class="table-responsive"> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<script>
document.getElementById('submitBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche la soumission du formulaire

    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous êtes sur le point d'hospitalisé le patient.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, mettre à jour!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('updateForm').submit(); // Soumet le formulaire si confirmé
        }
    });
});
</script>
        

        
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
  });
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>


<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>



</body>
</html>