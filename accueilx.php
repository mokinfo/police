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
require_once("tete.php");?>
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
            <div id="rosess">
              <?php $role = $_SESSION['role']; if ($role == 8) : ?>
                <a href="#" class="w"  data-toggle="modal" data-target="#exampleModal"><img src="image/firstcare.png" width="100" height="100"></a>
                <a href="Listeattente" class="w"><img src="image/liste.png" width="100" height="100"></a>
                <a href="Dossier" class="w"><img src="image/dossier.png" width="100" height="100"></a>
                <a href="Consultation" class="w"><img src="image/consult.png" width="100" height="100"></a>
                <a href="Ordonnances" class="w"><img src="image/ordonnance.png" width="100" height="100"></a>
                <a href="Laboratoire" class="w"><img src="image/laboratory.png" width="100" height="100"></a>
                <a href="Hospitalisation" class="w"><img src="image/hospitalisation.png" width="100" height="100"></a>
                <a href="Bloc" class="w"><img src="image/bloc.png" width="100" height="100"></a>
                <a href="Imagerie" class="w"><img src="image/imagerie.png" width="100" height="100"></a>
                <a href="pharmacy.php" class="w"><img src="image/pharmacie.png" width="100" height="100"></a>
                <a href="Gestion_utilisateur" class="w"><img src="image/users.png" width="100" height="100"></a>
                <a href="Journal" class="w"><img src="image/journal.png" width="100" height="100"></a>
                <a href="Facturation" class="w"><img src="image/facturation.png" width="100" height="100"></a>
                <a href="Caisse" class="w"><img src="image/caisse.png" width="100" height="100"></a>
              <?php elseif ($role == 1) : ?>
                <a href="#" class="w"  data-toggle="modal" data-target="#exampleModal"><img src="image/firstcare.png" width="100" height="100"></a>
                <a href="Listeattente" class="w"><img src="image/liste.png" width="100" height="100"></a>
                <a href="Laboratoire" class="w"><img src="image/laboratory.png" width="100" height="100"></a>
              <?php elseif ($role == 2) : ?>
                <a href="Caisse" class="w"><img src="image/caisse.png" width="100" height="100"></a>
              <?php elseif ($role == 3) : ?>
                <a href="Dossier" class="w"><img src="image/dossier.png" width="100" height="100"></a>
                <a href="Consultation" class="w"><img src="image/consult.png" width="100" height="100"></a>
                <a href="Ordonnances" class="w"><img src="image/ordonnance.png" width="100" height="100"></a>
              <?php elseif ($role == 4) : ?>
                <a href="Dossier" class="w"><img src="image/dossier.png" width="100" height="100"></a>
                <a href="Consultation" class="w"><img src="image/consult.png" width="100" height="100"></a>
                <a href="Ordonnances" class="w"><img src="image/ordonnance.png" width="100" height="100"></a>
              <?php elseif ($role == 5) : ?>
                <a href="Laboratoire" class="w"><img src="image/laboratory.png" width="100" height="100"></a>
                <a href="Imagerie" class="w"><img src="image/imagerie.png" width="100" height="100"></a>
              <?php elseif ($role == 6) : ?>
                <a href="Facturation" class="w"><img src="image/facturation.png" width="100" height="100"></a>
              <?php endif; ?>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header bg-light   ">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Ajoutpatient" method="post">
                    <h1 class="display-4 text-left">Information général</h1>
                    <?php 
                      $coss = new mysqli('localhost', 'root', '', 'spn');
                      $pss = $coss->query("SELECT MAX(idp) AS id FROM patient");
                      while($rows = mysqli_fetch_assoc($pss)){
                          $ss = $rows["id"] + 1;
                    ?>
                    <input type="hidden" name="idp" value="<?php echo $ss;} ?>" class="form-control">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Nom complet</label>
                            <input type="text" class="form-control" name="nom" placeholder="Nom complet" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Civilité</label>
                            <select class="form-control" name="civi" id="civi" onchange="sexedef()" required>
                              <option value="0">Civilité</option>
                              <option value="M.">M.</option>
                              <option value="Mlle">Mlle</option>
                              <option value="Mme">Mme</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Date de naissance</label>
                            <input type="date" class="form-control" name="daten"  id="age" onkeyup="calculate_age()" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Âge"  id="calculated_age">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Sexe</label>
                            <input type="text" class="form-control" name="sex" placeholder="Sexe" id="sexe" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Situation familiale</label>
                            <select class="form-control" name="sitfam">
                              <option value="SF">Situation familiale</option>
                              <option value="Célibataire">Célibataire</option>
                              <option value="Marié">Marié</option>
                              <option value="Divorcé">Divorcé</option>
                              <option value="Veuf">Veuf</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <h1 class="display-4 text-left">Contact</h1>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Adresse</label>
                          <textarea class="form-control" rows="1" name="address" placeholder="Adresse"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Téléphone</label>
                          <input type="text" class="form-control" name="tel" placeholder="Téléphone" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                    </div>
                    <style>
                      .hidden {
                        display: none;
                      }
                    </style>
                    <h1 class="display-4 text-left">Autres informations</h1>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Catégorie de patient</label>
                          <select class="form-control" name="categorie" id="cate" onchange="toggleMatriculeField()" required>
                            <option value="CCC">--Choisir--</option>
                            <option value="POA">Policier active</option>
                            <option value="POR">Policier rétraité</option>
                            <option value="CIV">Civile</option>
                            <option value="FPA">Famille Policier active</option>
                            <option value="FPR">Famille Policier rétraité</option>
                            <option value="MIL">Militaire</option>
                            <option value="GEN">Gendarme</option>
                            <option value="GAR">Garde républicaine</option>
                            <option value="GAC">Garde de côte</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Possède t-il une carte CNSS ?</label>
                          <select class="form-control" name="possession" id="possession" onchange="toggleMatriculeField()" required>
                            <option value="0">Carte CNSS</option>
                            <option value="OUI">OUI</option>
                            <option value="NON">NON</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="matricule" id="matriculeLabel" class="hidden">Matricule</label>
                          <input  type="text" id="matricule" name="matricule" class="hidden" class="form-control"  placeholder="Numéro de Matricule">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="cnss" class="hidden" id="cnsslabel">Numéro de Carte CNSS</label>
                          <input type="text" name="cnss" id="cnss" class="hidden" placeholder="Numéro de la carte CNSS">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Affectation</label>
                          <select class="form-control" name="affect">
                            <option value="0">Choisir le service</option>
                            <option value="med">Consultation</option>
                            <option value="urg">Urgence</option>
                            <option value="lab">Laboratoire</option>
                            <option value="hos">Hospitalisation</option>
                            <option value="img">Imagerie</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>
                    </div>
                  </form>

                  <script>
                        function toggleMatriculeField() {
                          var typeSelect = document.getElementById('cate');
                          var matriculeField = document.getElementById('matricule');
                          var matriculeLabel = document.getElementById('matriculeLabel');
                          var typeSelect1 = document.getElementById('possession');
                          var cnssField1 = document.getElementById('cnss');
                          var cnssLabel1 = document.getElementById('cnsslabel');

                          if (typeSelect.value === 'POA' || typeSelect.value === 'POR' || typeSelect.value === 'FPA' || typeSelect.value === 'FPR') {
                            matriculeField.classList.remove('hidden');
                            matriculeLabel.style.display = 'block';
                          } else {
                            matriculeField.classList.add('hidden');
                            matriculeLabel.style.display = 'none';
                          }
                          if (typeSelect1.value === 'OUI') {
                            cnssField1.classList.remove('hidden');
                            cnssLabel1.style.display = 'block';
                          } else {
                            cnssField1.classList.add('hidden');
                            cnssLabel1.style.display = 'none';
                          }
                        }
                      </script>
                </div>
              </div>
              </div>
            </div>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];
                ?>
                <h3><?php echo $sexam;} ?></h3>

                <p>Patients traités</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];
                ?>
                <h3><?php if ($sexam > 0) { $o = $s/$sexam; $oss = $o * 100; echo number_format($oss, 1, '.', '');}else{echo"0";}} ?><sup style="font-size: 20px">%</sup></h3>

                <p>Corps de police</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];
                ?>
                <h3><?php echo $sexam;} ?></h3>

                <p>Dossiers Enregistrés</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div><?php /*
              <a href="#" class="small-box-footer">Plus de détail <i class="fas fa-arrow-circle-right"></i></a> */?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient where catp = 'Civile' or catp = 'AC'");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexams = $rowexam["nbr"];
                ?>
                <h3><?php if ($sexam > 0) { $o = $sexams/$sexam; $oss = $o * 100; echo number_format($oss, 1, '.', '');}else{echo"0";}} ?><sup style="font-size: 20px">%</sup></h3>

                <p>Patients externes</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
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
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>