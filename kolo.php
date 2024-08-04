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
require_once("tetebloc.php");?>
	<form action="nouvel_operation.php" method="POST">
                    <?php   
                      $cosen = new mysqli('localhost', 'root', '', 'spn');
                      $psen = $cosen->query("SELECT MAX(ido) AS id FROM operation");
                      while($rowen = mysqli_fetch_assoc($psen)){
                          $sen = $rowen["id"] + 1;
                    ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Information générale</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <input type="text" name="ido" value="<?php echo $sen;} ?>">
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
                          <label>Assistant</label>
                          <input type="text" class="form-control" name="assist">
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
                          <label>Mode d'anesthésie</label>
                          <select class="form-control" name="mode_anes">
                            <option value="0">--Choisir--</option>
                            <option value="10B">AG (anesthésie générale avec intubation)  </option>
                            <option value="10C">AR (anesthésie régionale ou locorégionale)  </option>
                            <option value="10D">AS (anesthésie par sédation sans intubation)  </option>
                            <option value="10E">AL (anesthésie locale)  </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Opération</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Indication</label>
                          <input type="text" class="form-control" name="indic">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Statut</label>
                          <input type="text" class="form-control" name="statu">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Motif d'annulation</label>
                          <input type="text" class="form-control" name="mode_ann">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Déroulement</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transfert sanguine</label>
                          <input type="text" class="form-control" name="trans_sang">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Position patient</label>
                          <input type="text" class="form-control" name="posi_pat">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Lésions observées</label>
                          <textarea class="form-control" name="loos"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Gestes Opératoires</label>
                          <textarea class="form-control" name="goos"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Etat final</label>
                          <textarea class="form-control" name="effs"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Note</label>
                          <textarea class="form-control" name="notesx"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="hikolo" value="Enregistrer">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>      
                    </div>
                  </form>
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