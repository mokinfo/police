<?php  require("tetecd.php");?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <form class="form-horizontal" action="Examen_Imagerie" method="post">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <div class="row">
                        <div class="col-sm-4">
                          <?php 
                            
                              $ids = $_GET['id']; 
                              /*$conmod = new mysqli('127.0.0.1:3307','root','','spn');
                              $pieces = $conmod->query("UPDATE entre SET statut = 'C' WHERE codepatient = '$ids'");
                              if (isset($pieces)) {
                                echo '<script>alert("Le Docteur est en consultation...")</script>';
                              } */                   
                            $pieces = $DB->query("SELECT radiolo.idexam, radiolo.idan, radiolo.heurdexam, radiolo.datexam, radiolo.motif, radiolo.radiox, radiolo.echo, radiolo.ecg, radiolo.chk, patient.idp, patient.nom, patient.sex, patient.age, patient.tel, patient.address FROM patient, radiolo where radiolo.idan = patient.idp and radiolo.idexam = '$ids'");
                          foreach ($pieces as $piece):?>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">Patient  </label>
                              <div class="col-sm-8">
                                <input type="hidden" name="idexam" value="<?php echo $piece->idexam; ?>"> 
                                <input type="hidden" name="idpa" value="<?php echo $piece->idp; ?>" class="form-control">
                                <input type="text" name="nom" value="<?php echo $piece->nom; ?>" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Sexe : </label>
                            <div class="col-sm-7">
                              <input type="text" name="sex" value="<?php echo $piece->sex; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Âge :  </label>
                            <div class="col-sm-6">
                              <input type="text" name="age" value="<?php echo $piece->age; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-5 col-form-label">Date d'examen :  </label>
                              <div class="col-sm-7">
                                <input type="text" name="datexam" value="<?php echo $piece->datexam; ?>" class="form-control" disabled>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="col-sm-12">
                        <div class="form-group row">
                          <input type="hidden" name="tel" value="<?php echo $piece->tel ?>">
                          <input type="hidden" name="adresse" value="<?php echo $piece->address; ?>"> 
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Examen</th>
                                <th scope="col"></th>
                                <th scope="col">Résultat</th>
                                <th scope="col">Intervalle</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if($piece->radiox > 0){ ?><tr class="<?php if($piece->radiox > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->radiox > 0){ ?>  <?php echo("Radiographie : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->radiox > 0){ echo("file"); }else{echo("hidden");} ?>" name="radiox"></td><td><?php if($piece->radiox > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->echo> 0){ ?><tr class="<?php if($piece->echo> 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->echo> 0){ ?>  <?php echo("Echographie : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->echo> 0){ echo("file"); }else{echo("hidden");} ?>" name="echo"></td><td><?php if($piece->echo> 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ecg> 0){ ?><tr class="<?php if($piece->ecg> 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ecg> 0){ ?>  <?php echo("Electrocardiogramme ECG : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ecg> 0){ echo("file"); }else{echo("hidden");} ?>" name="ecg"></td><td><?php if($piece->ecg> 0){echo "";} ?></td></tr><?php } ?>
                            </tbody>
                          </table>
                          <input type="hidden" name="pandoc" value="<?php echo $piece->pandoc; ?>"> 
                          <input type="hidden" name="pcandoc" value="<?php echo $piece->pcandoc; ?>"> 
                          <?php 
                            endforeach; 
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <button class="form-control bg-secondary" type="submit" name="enreg"><i class="fas fa-save"></i> Enregistrer</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <button class="form-control bg-light" type="reset" name="reset"><i class="fas fa-trush"></i>Réinitialiser</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>       
                    
            
          </div><!-- /.col -->  
        </div> 
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
</div>
<!-- ./wrapper -->
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
<!-- jQuery -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  $(document).ready(function(){
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();
  });
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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