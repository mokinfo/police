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
require_once("teteblocs.php");?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                <center><b style="text-align:center; font-family:ALGERIAN; font-size: 60px;">BLOC OPERATOIRE</b></center>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-6 col-6">
            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];}
                ?>
                <p> Nouvelle</p>
                <h3>Chirurgie</h3>

                
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <a href="#" style="text-decoration: none;">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];}
                ?>
                <p>Liste des</p>
                <h3>Opération</h3>

                
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
                      $connv = new mysqli('localhost', 'root', '', 'spn');
                      $sqlv = $connv->query("SELECT operation.ido ,operation.idp ,operation.too, operation.opp, operation.indic, operation.datedop, operation.heurdop, patient.nom, patient.civi, patient.sex, patient.age FROM patient, operation, facture where patient.idp = operation.idp and facture.idp = operation.idp and facture.etat = 'OK' ORDER BY operation.ido ASC");
                      $row_cntv = $sqlv->num_rows;
                      if ($row_cntv > 0) {
                        $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT operation.ido ,operation.idp ,operation.too, operation.opp, operation.anes, operation.datedop, operation.datenrop, operation.heurdop, patient.nom, patient.civi, patient.sex, patient.age FROM patient, operation where patient.idp = operation.idp ORDER BY operation.ido ASC");
                           $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Nombres d'opérations : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktab">
                            <thead>
                              <tr>
                                <td></td>
                                <td>Nom complet</td>
                                <td>Opérateur</td>
                                <td>Type d'anesthésie</td>
                                <td>Anesthésiste</td>
                                <td>Date/heure d'opération </td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody><?php 
                                while($data = $sql->fetch_array()){
                                  $tox = $data['too'];
                                  $ksf = $conn->query("SELECT * FROM acte WHERE id = '$tox'");
                                  while($kasf = $ksf->fetch_array()){
                                    $fik = $kasf['libelle'];
                                    //echo "FIKKKKK ".$fik;
                                  }
                                  if ($data['sex'] == "Féminin") {
                                    $sexe = "<i class=\"fa fa-female text-danger align-items-center\"></i>";
                                  }else if ($data['sex'] == "Masculin") {
                                    $sexe = "<i class=\"fa fa-male text-primary align-items-center\"></i>";
                                  }else{
                                    $sexe = "<i class=\"fa fa-user text-light align-items-center\"></i>";
                                  }
                                  $oppp = $data['opp'];
                                  $ksfop = $conn->query("SELECT * FROM medecin WHERE idmed = '$oppp'");
                                  while($kasfop = $ksfop->fetch_array()){
                                    $opppo = $kasfop['nom'];
                                    //echo "FIKKKKK ".$fik;
                                  }
                                  echo '<tr>

                                    <td>'.$sexe.'</td>
                                    <td>'.$data['civi'].' '.$data['nom'].'</td>
                                    <td>'.$opppo.'</td>
                                    <td>'.$fik.'</td>
                                    <td>'.$data['anes'].'</td>
                                    <td>'.$data['datenrop'].'</td>
                                    <td><a href="Affiche_Operation?id=' . $data['ido'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
                                  </tr>';
                                }
                              ?><?php /* | <a href="delete_coop.php?id=' . $data['idpa'] .' "><i class="fas fa-trash-alt" style="color:red;"></i></a>*/ ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                    </div><?php 
                      } ?>
                          
                       
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
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouvelle chirurgie</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Nouvel_Operation" method="POST" id="operationForm">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Information générale</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <?php   
                          $cosen = new mysqli('localhost', 'root', '', 'spn');
                          $psen = $cosen->query("SELECT MAX(ido) AS id FROM operation");
                          while($rowen = mysqli_fetch_assoc($psen)){
                              $sen = $rowen["id"] + 1;
                        ?>
                        <input type="hidden" name="ido" value="<?php echo $sen;} ?>">
                        <div class="form-group">
                          <label>Patient</label>
                          <div class="search_select_box">
                            <select class="w-100" data-live-search="true" name="idp" >
                              <?php  
                                $patient = $DB->query("SELECT * FROM patient");
                              ?>
                                  <option value="0">
                                    Nom du patient
                                  </option>
                                    
                                </thead>
                                <tbody>
                              <?php   
                                foreach ($patient as $patien):

                                ?> 
                                  <option value="<?php  echo $patien->idp ; ?>">
                                    <?php
                                      /*if ($patien->sex == "Féminin") {
                                        $sexes = "<i class=\"fa fa-female text-danger align-items-center\"></i>";
                                      }else if ($patien->sex == "Masculin") {
                                        $sexes = "<i class=\"fa fa-male text-primary align-items-center\"></i>";
                                      }else{
                                        $sexes = "<i class=\"fa fa-user text-light align-items-center\"></i>";
                                      }*/
                                      echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i>- &nbsp;&nbsp; | &nbsp;&nbsp;"; 
                                      echo "<td>" . $patien->nom . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->daten . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->age . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->tel . "</td>";
                                    ?>
                                  </option><?php 
                                endforeach;?>
                                </tbody>
                              </table>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-5">
                        <div class="form-group">
                          <label>Mode d'anesthésie</label>
                          <select class="form-control" name="mode_anes">
                            <option value="0">--Choisir--</option>
                            <option value="10B">AG (anesthésie générale avec intubation)  </option>
                            <option value="10C">AR (anesthésie régionale ou locorégionale)  </option>
                            <option value="10D">AS (anesthésie par sédation sans intubation)  </option>
                            <option value="10E">AL (anesthésie locale)  </option>
                            <option value="SANS">Sans anesthésie</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="search_select_box">
                          <label>Type d'opération</label>
                          <select name="too" class="w-100" data-live-search="true" >
                            <?php  
                              $conacte = new mysqli('localhost', 'root', '', 'spn');
                              $pconacte = $conacte->query("SELECT * FROM acte");
                            ?>
                            <option value="0">--Choisir--</option>
                            <?php while($pconact = mysqli_fetch_assoc($pconacte)){ ?>
                            <option value="<?php echo $pconact['id']; ?>"><?php echo $pconact['libelle']; }?></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Opérateur</label>
                          <?php 
                            $cos = new mysqli('localhost', 'root', '', 'spn');
                            $ps = $cos->query("SELECT * FROM medecin");
                          ?>
                          <select class="form-control" name="opp">
                            <option value="0">Selectionner le médecin</option>

                          <?php while($pas = $ps->fetch_array()){ ?>
                            <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; }?></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Anesthésiste</label>
                            
                            <select class="form-control" name="anes">
                              <option value="1">Dr Kamil Ahmed Kamil</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="hikolo" value="Enregistrer" onclick="afficherSweetAlert()">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>      
                    </div>
                  </form>
                  <script>
                      function afficherSweetAlert() {
                          Swal.fire({
                              title: 'Êtes-vous sûr?',
                              text: 'Vous êtes sur le point d\'enregistrer cette opération.',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonText: 'Oui, enregistrez!',
                              cancelButtonText: 'Annuler'
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  // Soumettre le formulaire si l'utilisateur confirme
                                  document.getElementById("operationForm").submit();
                              }
                          });
                      }
                  </script>
                </div>
              </div>
            </div>
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


<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>

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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
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
<script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>