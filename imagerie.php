<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");
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
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color: black;">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="nav-icon fa fa-receipt text-secondary"></i></span>
              <?php 
                $datess = date("d/m/Y");
                  $pieces = $DB->query("SELECT radiolo.idexam, radiolo.idan, radiolo.heurdexam, radiolo.datexam, radiolo.chk, radiolo.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, radiolo where radiolo.idan = patient.idp and radiolo.chk = 'NON'");
                /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
              ?>
              <div class="info-box-content">

                <span class="info-box-text">Nouveaux</span>
                <span class="info-box-number">Imagerie</span>
              </div>
            
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <a href="Liste_Imagerie" class="nav-link" style="text-decoration: none; color: black;">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="far fa-list-alt"></i></span>
              <?php 
                  $conn = new mysqli('localhost', 'root', '', 'spn');
                  $sql = $conn->query("SELECT * FROM radiolo ORDER BY idexam DESC");
                
                $row_cnt = $sql->num_rows;
              ?>
              <div class="info-box-content">
                <span class="info-box-text">Listes des résultats</span>
                <span class="info-box-number"><?php  echo($row_cnt); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            
            
            
              <div class="card">
                <div class="card-header bg-secondary">
                  
                  <b><?php echo count($pieces); ?> patient(s) est en attente pour un examen</b>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table  table-striped table-bordred table-hover" id="jaktab" style="width:100%">
                        <thead>
                          <tr>
                            <th>    </th>
                            <th> N° </th>
                            <th> Nom complet </th>
                            <th> Agé de </th>
                            <th> Date & Heure </th>
                            <th> Affectation </th>
                            <th> Motif </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php   
                            foreach ($pieces as $piece):
                              if($piece->idp & 1){
                                echo "<tr  bgcolor=\"#fff5e6\">";
                                if ($piece->sex == "Féminin") {
                                  echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                                }else if ($piece->sex == "Masculin") {
                                  echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                                }else{
                                  echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                                }
                                echo "<td>" . $piece->idp . "</td>";
                                echo "<td>" . $piece->civi ." ". $piece->nom . "</td>";
                                echo "<td>" . $piece->age . "</td>";
                                
                                /*echo "<td>" . $piece->heura . "</td>";
                                echo "<td>" . $piece->heurf . "</td>";*/
                                echo "<td>" . $piece->heurdexam . "</td>";
                                if ($piece->affect == "med") {
                                  echo "<td> Médecin</td>";
                                }else if ($piece->affect == "lab") {
                                  echo "<td> Laboratoire</td>";
                                }else{
                                  echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> Autre</td>";
                                }
                                echo "<td>" . $piece->motif . "</td>";
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                echo "<td><a href=\"Affiche_Imagerie?id=" . $piece->idexam . "\"><i class=\"fa fa-eye  text-warning align-items-center\" ></i></a></tr>";
                              }
                              else{
                                echo "<tr>";
                                if ($piece->sex == "Féminin") {
                                  echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                                }else if ($piece->sex == "Masculin") {
                                  echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                                }else{
                                  echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                                }
                                echo "<td>" . $piece->idp . "</td>";
                                echo "<td>" . $piece->civi ." ". $piece->nom . "</td>";
                                echo "<td>" . $piece->age . "</td>";
                                echo "<td>" . $piece->heurdexam . "</td>";
                                if ($piece->affect == "med") {
                                  echo "<td> Médecin</td>";
                                }else if ($piece->affect == "lab") {
                                  echo "<td> Laboratoire</td>";
                                }else{
                                  echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> Autre</td>";
                                }
                                echo "<td>" . $piece->motif . "</td>";
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                echo "<td><a href=\"Affiche_Imagerie?id=" . $piece->idexam . "\"><i class=\"fa fa-eye  text-primary align-items-center\" ></i></a></tr>";
                              }
                              /*}
                              mysqli_free_result($res); */
                            endforeach;?>
                        </tbody>
                      </table>
                    </div>
                        <!-- /.col -->
                  </div>
                </div>
              </div>
          </div> 
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouvel imagerie</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 bg-light">
                    <form action="examenrd.php" method="post"> 
                      <?php  
                          $cosexam = new mysqli('localhost', 'root', '', 'spn');
                          $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM radiolo");
                          while($rowexam = mysqli_fetch_assoc($psexam)){
                            $sexam = $rowexam["id"] + 1;
                        ?>
                        <input type="hidden" name="idexam" value="<?php echo $sexam; }?>">
                        <div class="form-group">
                          <label>Patient</label>
                          <div class="search_select_box">
                            <select class="w-100" data-live-search="true" name="idpatient" >
                                <?php  
                                  $patient = $DB->query("SELECT * FROM patient");
                                ?>
                                <option value="0">
                                  Nom du patient
                                </option>  
                                </thead>
                                <tbody>
                                <?php   
                                  foreach ($patient as $patien):?> 
                                    <option value="<?php  echo $patien->idp ; ?>">
                                      <?php 
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
                        <div class="form-group">
                          <label>Motif</label>
                          <input type="text" class="form-control" name="motif" placeholder="Motif">
                        </div>
                        <?php $heura = date("G:i"); $heurf = date("G:i"); ?>
                        <input type="hidden" name="heura" value="<?php echo $heura; ?>">
                        <input type="hidden" name="heurf" value="<?php echo $heurf; ?>">
                      <div class="col-lg-12 col-6">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="checkbox" class="form-control" name="radio" id="success-outlined">
                                <label class="btn btn-outline-success form-control" for="success-outlined">Radiographie</label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="checkbox" class="form-control" name="echo" id="primary-outlined">
                                <label class="btn btn-outline-primary form-control" for="primary-outlined">Echographie</label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <input type="checkbox" class="form-control" name="ecg" id="warning-outlined">
                                <label class="btn btn-outline-warning form-control" for="warning-outlined">ECG</label>
                              </div>
                            </div>
                          </div>
                        </div> 
                      <div class="modal-footer">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          <?php /* //Ajout d'un nouvau patient 
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" name="nom" placeholder="Nom complet">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Civilité</label>
                            <select class="form-control" name="civi" id="civi" onchange="sexedef()">
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
                            <input type="date" class="form-control" name="daten"  id="age" onkeyup="calculate_age()">
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
                            <input type="text" class="form-control" name="sex" placeholder="Sexe" id="sexe">
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
                          <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Email">
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
                </div>
              </div>
            </div>
          </div>*/?> 
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
<script src="js/jquery-3.3.1.slim.min.js"></script>
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