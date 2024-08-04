<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}

require_once("tete.php"); ?>

<script src="js/custum.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <div id="rosess">
              <?php $role = $_SESSION['role']; 
              $role_options = [
                  8 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  1 => [
                      'firstcare.png' => 'Listeattente', 
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'laboratory.png' => 'Laboratoire'
                  ],
                  2 => [
                      'firstcare.png' => 'Listeattente', 
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'laboratory.png' => 'Laboratoire',
                      'caisse.png' => 'Caisse'
                  ],
                  3 => [
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances'
                  ],
                  4 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  5 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  6 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hospitalisation',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  // Ajoutez ici les autres rôles et leurs options
              ];

              if(array_key_exists($role, $role_options)) {
                foreach($role_options[$role] as $image => $link) {
                  echo "<a href=\"$link\" class=\"w\"><img src=\"image/$image\" width=\"100\" height=\"100\"></a>";
                }
              }
              ?>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-light">
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
                        $row = $pss->fetch_assoc();
                        $ss = $row['id'] + 1;
                      ?>
                      <input type="hidden" name="idp" value="<?php echo $ss; ?>" class="form-control">
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
                            <input type="text" id="matricule" name="matricule" class="hidden form-control" placeholder="Numéro de Matricule">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="numcnss" id="numcnssLabel" class="hidden">Numéro CNSS</label>
                            <input type="text" id="numcnss" name="numcnss" class="hidden form-control" placeholder="Numéro CNSS">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer bg-light">
                        <button type="submit" name="register" class="btn btn-primary">Enregistrer</button>
                        <button type="reset" class="btn btn-danger">Annuler</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

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