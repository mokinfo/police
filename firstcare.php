<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
?>
<?php
if (isset($_POST['name'])) {
  $name = $_POST["name"];
  $tel = $_POST["tel"];
  $address = $_POST["address"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $num = $_POST["num"];
  $price = $_POST["price"];
  $datej = $_POST["datej"];
  $datedujour = date("m/d/Y");
  $path = $_POST['path'];
  //if ($path == 1) {
    $res = 1;
    $nature = "First Care";
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {
    $sql = "INSERT INTO patient (idp, name, phone, address, age, sex, numcard, price, datej) VALUES ('', '$name', '$tel', '$address', '$age', '$sex', '$num', '$price', '$datej')";
    $mysqli = new mysqli('localhost','root','','bormed');

    $mysqli->query($sql);
    $result = mysqli_query($mysqli, "INSERT INTO care (idcare, name, phone, address, age, sex, numcard, price, datej, res) VALUES ((SELECT LAST_INSERT_ID()), '$name', '$tel', '$address', '$age', '$sex', '$num', '$price', '$datej', '$res')");
    if (isset($result)) {
      $factu = mysqli_query($mysqli, "insert into facture (idfacture, nomclient, adresseclient, dates, montant, nature) VALUES ('', '$name', '$address', '$datej', '$price', '$nature')");
      if (isset($result)) {
        redirect_to("Accueil");
      }
    } 
  /*}elseif ($path == 2) {
    $res = 2;
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {
    $sql = "INSERT INTO care (idcare, name, phone, address, age, sex, numcard, datej, res) VALUES ('', '$name', '$tel', '$address', '$age', '$sex', '$num', '$datej', '$res')";
    $mysqli = new mysqli('localhost','root','','bormed');

    $mysqli->query($sql);
    if (isset($mysqli)) {
      redirect_to("home.php");
    }
  }*/
  
}else{
  //redirect_to("nouveau.php");
  ?>
    <?php 
}
require_once("tete.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Nouveau patient</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="firstcare.php" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Patient</label>
                        <input type="text" class="form-control" name="name" placeholder="Nom complet">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Adresse</label>
                        <textarea class="form-control" rows="1" name="address" placeholder="Adresse"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" class="form-control" name="daten">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Age de la patient">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Motif d'entrée</label>
                        <input type="text" class="form-control" name="motif" placeholder="Motif">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="datej">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Numero du patient</label>
                        <input type="number" class="form-control" name="num" placeholder="Numéro de la patient">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="price" value="5" placeholder="price">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- textarea -->
                      <div class="form-group">
                        <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                      </div>
                    </div>
                  </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
