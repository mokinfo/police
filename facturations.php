<?php 
require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");

  /*function total(){
    $total = 0;
    
      $pieces = $this->DB->query("SELECT idf, mt FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($pieces as  $piecex) {
      $total += $piecex->mt; 
    }
    return $total;
  }*/
  function toteles(){
    
    $piecesx = $this->DB->query("SELECT sum(mt) as totales FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($piecesx as  $piecex) {
        $totel = $piecex->totales;
    }
    return $totel;
  }
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <a href="#" style="text-decoration: none;">
            <!-- small box -->
            <div class="small-box bg-light" style="box-shadow: 5px 5px 10px 5px #1F618D;">
              <div class="inner">
                <center><b style="text-align:right; font-size: 30px; color: #1F618D;">FACTURATION</b></center>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-4 col-4">
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
                <h3>Facture</h3>
              </div>
              <div class="icon">
                <i class="ion ion-plus" style="color:#ECF0F1;"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <a href="#"  style="text-decoration: none;" data-toggle="modal" data-target="#exampleModalcai">
              <?php /* <a  href="listedesfacture.php"  style="text-decoration: none;"> */ ?>
            <div class="small-box bg-light">
              <div class="inner">
                <p>Journal des</p>
                <h3>Facture</h3>
              </div>
              <div class="icon">
                <i class="fas fa-file-alt" style="color:#F1948A;"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <a href="#"  style="text-decoration: none;" data-toggle="modal" data-target="#exampleModalg">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];}
                ?>
                <p>Prise en</p>
                <h3>Charge</h3>
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
                        $datess = date("d/m/Y");
                        $pieces = $DB->query("SELECT * FROM facture where etat = 'IMPAYER' and mt > 0");
                      ?> 
                      <?php 

                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT * FROM facture where etat = 'IMPAYER' and mt > 0");
                        
                        $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Listes des actes impayer : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktab">
                            
                            <thead>
                                <tr>
                                    <th> N° </th>
                                    <th> Libelle </th>
                                    <th> Date </th>
                                    <th> Etat </th>
                                    <th> Montant </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php   
                                foreach ($pieces as $piece):
                                    echo "<tr>";
                                    echo "<td>" . $piece->idf . "</td>";
                                    echo "<td>" . $piece->desg ."</td>";
                                    echo "<td>" . $piece->datef . "</td>";
                                    echo "<td>" . $piece->etat . "</td>";
                                    echo "<td>" . $piece->mt . "</td>";
                                    echo "<td><a href=\"Examen?id=" . $piece->idf . "\"><i class=\"fa fa-eye align-items-center\" ></i></a></tr>";
                                endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> Total :  </th>
                                    <th> <?php 
                                    $piecesx = $DB->query("SELECT sum(mt) as tot FROM facture where etat = 'IMPAYER' and mt > 0");
                                    foreach ($piecesx as  $piecex) :
                                      
                                      echo number_format($piecex->tot,2,',',' ');;
                                    endforeach; ?></th>
                                    <th>  </th>
                                </tr>
                            </tfoot>
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
              <div class="modal-header bg-secondary   ">
                <h5 class="modal-title" id="exampleModalLabel">Nouvelle facture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="Nouvel_facture" method="POST">
                  <?php   
                    $cosen = new mysqli('localhost', 'root', '', 'spn');
                    $psen = $cosen->query("SELECT MAX(codf) AS id FROM factures");
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
                    <div class="col-sm-6">
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
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Date facture</label>
                        <?php $datefacture = date("d-m-Y G:i"); ?>
                        <input type="text" class="form-control" name="datefacture" value="<?php echo $datefacture; ?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date Début : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datedebut" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date fin : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datefin" class="form-control">
                        </div>
                      </div>
                    </div>                      
                    <div class="col-sm-3">
                      <div class="form-group">
                        <button class="form-control bg-light" type="submit" name="charge">
                          <i class="fas fa-download"></i> Importer les services 
                        </button>
                      </div>
                    </div>    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="exampleModalcai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcai" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary   ">
                <h5 class="modal-title" id="exampleModalLabel">Liste des factures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="Nouvel_factures" method="POST">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header bg-info">
                          <H4>Information générale</H3>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date Début : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datedebut" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date fin : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datefin" class="form-control">
                        </div>
                      </div>
                    </div>                      
                    <div class="col-sm-3">
                      <div class="form-group">
                        <button class="form-control bg-light" type="submit" name="charge">
                          <i class="fas fa-download"></i> Importer les services 
                        </button>
                      </div>
                    </div>    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModalg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelg" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary   ">
                <h5 class="modal-title" id="exampleModalLabelg">Nouvelle facture CNSS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="Nouvel_facture_cnss" method="POST">
                  <?php   
                    $cosenf = new mysqli('localhost', 'root', '', 'spn');
                    $psenf = $cosenf->query("SELECT MAX(codf) AS id FROM factures");
                    while($rowenf = mysqli_fetch_assoc($psenf)){
                        $senf = $rowenf["id"] + 1;
                  ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-header bg-info">
                          <H4>Information générale</H3>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="ido" value="<?php echo $senf;} ?>">
                    
                        <?php $datefacture = date("d-m-Y G:i"); ?>
                        <input type="hidden" class="form-control" name="datefacture" value="<?php echo $datefacture; ?>" disabled>
                      
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date Début : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datedebut" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date fin : </label>
                        <div class="input-group mb-3">
                          <input type="date" name="datefin" class="form-control">
                        </div>
                      </div>
                    </div>                      
                    <div class="col-sm-3">
                      <div class="form-group">
                        <button class="form-control bg-light" type="submit" name="charge">
                          <i class="fas fa-download"></i> Importer les services 
                        </button>
                      </div>
                    </div>    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade" id="exampleModalli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelli" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary   ">
                <h5 class="modal-title" id="exampleModalLabelli">Liste des factures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php 
                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT hospitalisation.idh ,hospitalisation.idp ,hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.chambre, hospitalisation.service, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age FROM patient, hospitalisation where patient.idp = hospitalisation.idp ORDER BY hospitalisation.idh DESC");
                        
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
                                  }else if ($data['sex'] == "Masculin") {
                                    $etat = "<i class=\"fa fa-user text-success align-items-center\"> Sortie</i>";
                                  }else{
                                    $etat = "<i class=\"fa fa-user text-light align-items-center\"> NSP</i>";
                                  }

                                  $oper = $data['med_trai'];
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
                                    <td>'.$data['chambre'].'</td>
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
            </div>
          </div>
        </div>
      <?php /*
        <div class="modal fade" id="exampleModald" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeld" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabeld">Nouvelle facture</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Nouvel_Operation" method="POST">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H6>Veuillez sélectionner la période de facturation </H6>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Date</label>
                          <input type="date" name="datefacture">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Date</label>
                          <input type="date"  name="datefacture">
                        </div>
                      </div>
                      
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="hikolo" value="OK">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Annuler">
                        </div>
                      </div>      
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div> */
      ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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