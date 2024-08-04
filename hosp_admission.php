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
        <?php 
          if (isset($_SESSION['statut'])) {
            ?>
              <h4 class="alert alert-success"><?php echo $_SESSION['statut']; ?></h4>
            <?php 
            unset($_SESSION['statut']);
          }
        ?>
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
          <div class="col-lg-4 col-4">
            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];}
                ?>
                <p> Nouvelle</p>
                <h3>Hospitalisation</h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-4 col-4">
            <a href="Liste_Attente_Hosp" style="text-decoration: none;" >
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];}
                ?>
                <p> Liste</p>
                <h3>D'attente</h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <a href="Liste_Hospitalisation" style="text-decoration: none;">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];}
                ?>
                <p>Liste des Patients</p>
                <h3>Hospitalisés</h3>

                
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
            </div>
            </a>
          </div>





          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php 
                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT hospitalisation.idh ,hospitalisation.idp ,hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.chambre, hospitalisation.service, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age FROM patient, hospitalisation where patient.idp = hospitalisation.idp and (hospitalisation.etat = 'HOS' or hospitalisation.etat = 'SOR') ORDER BY hospitalisation.idh DESC");
                        
                        $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Nombres des patients hospitalisés : <b><?php  echo($row_cnt); ?></b></h5>
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
                                  if ($data['etat'] == "HOS") {
                                    $etat = "<i class=\"fa fa-user text-warning align-items-center\"> hospitalisé</i>";
                                  }elseif ($data['etat'] == "SOR") {
                                    $etat = "<i class=\"fa fa-user text-success align-items-center\"> Sortie</i>";
                                  }elseif ($data['etat'] == "ENT") {
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
                                    <td><a href="Affiche_Hospitalisation?id=' . $data['idh'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle hospitalisation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="Nouvel_Hospitalisation" method="post">
                    <div class="modal-body">
                      <?php   
                        $cosen = new mysqli('localhost', 'root', '', 'spn');
                        $psen = $cosen->query("SELECT MAX(idh) AS id FROM hospitalisation");
                        while($rowen = mysqli_fetch_assoc($psen)){
                            $sen = $rowen["id"] + 1;
                      ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <input type="hidden" name="idh" value="<?php echo $sen; } ?>">
                          <div class="form-group">
                            <label>Patient</label>
                            <div class="search_select_box">
                              <select class="w-100" data-live-search="true" name="idp">
                                <?php  
                                  $patient = $DB->query("SELECT * FROM patient");
                                ?>
                                  <option value="0">Nom du patient</option>
                                <?php   
                                  foreach ($patient as $patien):
                                ?> 
                                  <option value="<?php  echo $patien->idp; ?>">
                                    <?php
                                      echo $patien->nom . " | " . $patien->daten . " | " . $patien->age . " | " . $patien->tel;
                                    ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Hospitalisé par</label>
                            <?php 
                              $cos = new mysqli('localhost', 'root', '', 'spn');
                              $ps = $cos->query("SELECT * FROM medecin");
                            ?>
                            <select class="form-control" name="hospar">
                              <option value="0">Selectionner</option>
                              <?php while($pas = $ps->fetch_array()){ ?>
                              <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; } ?></option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Médecin traitant</label>
                            <?php 
                              $cos = new mysqli('localhost', 'root', '', 'spn');
                              $ps = $cos->query("SELECT * FROM medecin");
                            ?>
                            <select class="form-control" name="med_trai">
                              <option value="0">Selectionner le médecin</option>
                              <?php while($pas = $ps->fetch_array()){ ?>
                              <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; } ?></option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Date hospitalisation</label>
                            <input type="date" class="form-control" name="date_hos">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Type hospitalisation</label>
                            <select class="form-control" name="type_hos">
                              <option value="Normal">Normal</option>
                              <option value="REA">REA</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Motif</label>
                            <textarea class="form-control" name="motif_hos"></textarea>
                          </div>
                        </div>      
                      </div>
                    </div>
                    <div class="col-lg-12 col-6">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-folder-open text-warning"></i> Affectation </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user text-danger"></i> Garde malade</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-info-circle"></i> Note</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Service </label>
                                <select class="form-control" name="service" id="service">
                                  <option value="0">--Choisir--</option>
                                  <option value="MI">Médecine</option>
                                  <option value="PD">Pédiatrie</option>
                                  <option value="OP">Chirurgie</option>
                                  <option value="GO">Gynécologie obstétrique</option>
                                </select>
                              </div>
                            </div>  
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Chambre</label>
                                <select class="form-control" name="chambre" id="chambre">
                                  <option value="0">--Chambre--</option>
                                  <option value="1">Commune</option>
                                  <option value="2">3 lits</option>
                                  <option value="3">2 lits</option>
                                  <option value="4">VIP</option>
                                  <option value="5">Normal</option>
                                  <option value="6">Catégorie</option>
                                </select>
                              </div>
                            </div>  
                          </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Nom complet</label>
                                <input type="text" class="form-control" name="tuteur">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Né(e) le</label>
                                <input type="date" class="form-control" name="date_nai_garde">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>CDI N°</label>
                                <input type="text" class="form-control" name="cdi">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Délivré le </label>
                                <input type="date" class="form-control" name="date_cdi">
                              </div>
                            </div> 
                          </div> 
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        </div>
                      </div>
                      <div class="table-responsive"> 
                      </div>
                    </div>
                    <div class="modal-body">   
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <button class="form-control bg-info" type="submit" name="enreg"><i class="fas fa-save"></i> OK</button>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <button class="form-control bg-warning" type="reset" name="reset"><i class="fas fa-file"></i> Annuler</button>
                          </div>
                        </div>      
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
document.getElementById('service').addEventListener('change', function() {
  const serviceValue = this.value;
  const chambreSelect = document.getElementById('chambre');

  // Clear current options
  chambreSelect.innerHTML = '<option value="0">--Chambre--</option>';

  // Define options based on service selected
  const options = {
    'GO': [
      { value: '1', text: 'Commune' },
      { value: '2', text: '3 lits' },
      { value: '3', text: '2 lits' },
      { value: '4', text: 'VIP' }
    ],
    'MI': [
      { value: '5', text: 'Normal' },
      { value: '6', text: 'Catégorie' }
    ],
    'PD': [
      { value: '5', text: 'Normal' },
      { value: '6', text: 'Catégorie' }
    ],
    'OP': [
      { value: '5', text: 'Normal' },
      { value: '6', text: 'Catégorie' }
    ]
  };

  // Get appropriate options for selected service
  const selectedOptions = options[serviceValue] || [];

  // Add new options to the chambre select
  selectedOptions.forEach(option => {
    const newOption = document.createElement('option');
    newOption.value = option.value;
    newOption.text = option.text;
    chambreSelect.add(newOption);
  });
});
</script>
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


<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>

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