<?php 
require_once("includes/session.php");
//require 'db.class.php';
//require 'panier.class.php';
//$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("Classes/PHPExcel/IOFactory.php"); ?>
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
            <div class="form">
              <form action="pharmacy.php" method="POST">
                <div class="input-group">
                  <input class="form-control form-control-sidebar" type="text"  name="name" placeholder="Description">
                  <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      
                    <i class="fas fa-search fa-fw"><input type="submit" name="recherche" value="Rechercher" /></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
    
    <?php 
      /*
      <p>Click the button to display the time.</p>

      <button onclick="getElementById('demo').innerHTML=Date(D,M,Y)">What is the time?</button>

      <p id="demo"></p>*/
    ?>
    <?php 
    if(isset($_POST['recherche'])){
      $name = $_POST["name"];
      /*if (condition) {
        # code...
      }*/
      $pieces = $DB->query("SELECT * FROM medoc WHERE name like '%$name%'");
      //$sql = "SELECT * FROM piece WHERE marque like '%$marque%' AND model like '%$model%' AND annee like '%$annee%' AND descr like '%$descr%'";
      ?>
      <div id="zonereq">
        <b><?php  echo count($pieces); ?> : Articles trouvés.
        </b>
      </div>
      <?php
      //$res = mysqli_query($cn, $sql);
      //$nbrligne = mysqli_num_rows($pieces); 
      ?>
      
      <div id="zonetab">
      <table>
        <tr>
          <th> Case </th>
          <th> Name of Drugs</th>
          <th> Quantity </th>
          <th> Price </th>
          <th> Action </th>
      <?php 
      //while ($search = mysqli_fetch_array($res)) {
      foreach ($pieces as $piece):
        if ($piece->qt < 3) {
          echo "<tr>";
          echo "<td bgcolor=\"#fd5050\">" . $piece->kase . "</td>";
          echo "<td bgcolor=\"#fd5050\">" . $piece->name . "</td>";
          echo "<td bgcolor=\"#fd5050\">" . $piece->qt . "</td>";
          echo "<td bgcolor=\"#fd5050\">" . $piece->prix . "</td>";
          echo "<td><a class=\"add addPanier\" href=\"commandes.php?id=" . $piece->id . "\"><button onclick=\"myFunction()\"><img src=\"image/comd.png\" width=\"30\" height=\"30\"></button></a></tr>"/*
            <a href=\"editpiece.php?id=" . $piece->id . "\"><img src=\"image/mod.png\" width=\"30\" height=\"30\"></a></td>"
            <img src=\"image/comd.png\" width=\"30\" height=\"30\">
            */;
        }else{
          echo "<tr>";
          echo "<td>" . $piece->kase . "</td>";
          echo "<td>" . $piece->name . "</td>";
          echo "<td>" . $piece->qt . "</td>";
          echo "<td>" . $piece->prix . "</td>";
          echo "<td><a class=\"add addPanier\" href=\"commandes.php?id=" . $piece->id . "\"><button onclick=\"myFunction()\"><img src=\"image/comd.png\" width=\"30\" height=\"30\"></button></a></tr>"/*
            <a href=\"editpiece.php?id=" . $piece->id . "\"><img src=\"image/mod.png\" width=\"30\" height=\"30\"></a></td>"
            <img src=\"image/comd.png\" width=\"30\" height=\"30\">
            */;
        }
      /*}
      mysqli_free_result($res);*/ 
      endforeach;
    }else{
      echo "No Result !";
    }
  ?><div id=\"demo\"></div>

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
