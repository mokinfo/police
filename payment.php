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
require_once("tete.php");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">

            
              <?php 
              $datepayment = date("Y-m-d");
              $pieces = $DB->query("SELECT * FROM care  where  res = 2");
              ?>
              <div id="zonereq">
                
                <?php  echo count($pieces); ?> patient(s) attente à payé</b>
              </div>      
              <div id="zonetab">
              <table>
                <tr>
                  <th> CARD </th>
                  <th> NAME </th>
                  <th> SEX </th>
                  <th> DATE </th>
                  <th> Price </th>
                  <th> Action </th>
              <?php 
              //while ($search = mysqli_fetch_array($res)) {
              foreach ($pieces as $piece):
                if($piece->idcare & 1){
                  echo "<tr  bgcolor=\"#fff5e6\">";
                echo "<td>" . $piece->numcard . "</td>";
                echo "<td>" . $piece->name . "</td>";
                echo "<td>" . $piece->sex . "</td>";
                echo "<td>" . $piece->datej . "</td>";
                echo "<td>" . $piece->pandoc . "</td>";
                echo "<td><a class=\"add addPanier\" href=\"laboratory.php?id=" . $piece->idcare . "\"><button><img src=\"image/pm.png\" width=\"30\" height=\"30\"></button></a></tr>";
                }
                else{
                  echo "<tr>";
                echo "<td>" . $piece->numcard . "</td>";
                echo "<td>" . $piece->name . "</td>";
                echo "<td>" . $piece->sex . "</td>";
                echo "<td>" . $piece->datej . "</td>";
                echo "<td>" . $piece->pandoc . "</td>";
                echo "<td><a class=\"add addPanier\" href=\"laboratory.php?id=" . $piece->idcare . "\"><button><img src=\"image/pm.png\" width=\"30\" height=\"30\"></button></a></tr>";
                }
                
                /*}
                mysqli_free_result($res);*/ 
                endforeach;
                ?>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
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
