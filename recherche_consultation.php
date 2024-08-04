<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("Accueil");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Santé - Police - National</title>
  
  <link rel="icon" href="dist/img/police.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="jquery-3.5.1.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
  <script src="jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script src="bootstrap.min.js"></script>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    

  <script>
  //Système d'onglet

let afficherOnglet = function (a, animations) {
    if (animations === undefined) {
        animations = true
    }
    let li = a.parentNode
    let div = a.parentNode.parentNode.parentNode
    let activeTab = div.querySelector(".tab-content.active") //contenu actif
    let aAfficher = div.querySelector(a.getAttribute("href")) //contenu à afficher

    // Si on clique sur l'onglet deja actif on ne modifie rien
    if (li.classList.contains("active")) {
        return false
    }

    //on retire la class "active"
    div.querySelector(".tabs .active").classList.remove("active")

    //ajouter la class active à l'onglet actuel
    li.classList.add("active")

    if (animations) {

        activeTab.classList.add("fade")
        activeTab.classList.remove("in")

        let transitionends = function () {

            this.classList.remove("fade")
            this.classList.remove("active")
            aAfficher.classList.add("fade")
            aAfficher.classList.add("active")
            aAfficher.offsetWidth //On force le navi à ne pas réaliser les OP en même temps
            aAfficher.classList.add("in")
            activeTab.removeEventListener("transitionend", transitionends)
            activeTab.removeEventListener("WebkitTransitionEnd", transitionends)
            activeTab.removeEventListener("oTransitionEnd", transitionends)
        }

        activeTab.addEventListener("transitionend", transitionends)
        activeTab.addEventListener("WebkitTransitionEnd", transitionends)
        activeTab.addEventListener("oTransitionEnd", transitionends)
    } else {
        aAfficher.classList.add("active")
        activeTab.classList.remove("active")
    }
}

let tabs = document.querySelectorAll(".tabs a")

for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", function (e) {
        afficherOnglet(this)
    })
}

//Garder les onglets actif lors de l'actualisation de la page et Lorsque l'on fais précédent le hash et l'onglet change.
var hashChange = function () {
    let hash = window.location.hash
    let a = document.querySelector('a[href="' + hash + '"]')
    // Si j'ai un élément qui correspont à "a" et que mon élément n'a pas la classe active alors...
    if (a !== null && !a.parentNode.classList.contains("active")) {
        afficherOnglet(a, e !== undefined)
    }
}

window.addEventListener("hashchange", hashChange)
hashChange()
  </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/police.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Accueil" class="nav-link"><i class="fas fa-home"></i> Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Accueil" class="nav-link"><i class="fas fa-save"></i> Sauvegarder</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/police.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Santé - PN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dr Mahyoub Abdallah</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Nouveau patient</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div id="London" class="tabcontent">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-light">
                  <form method="POST" action="recherche_consultation.php">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-3" style="line-height: 50px;">  Début : </label>
                          <div class="col-sm-9">
                            <input type="date" name="date_debut" data-date="" data-date-format="DD/MM/YYYY" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <label class="col-sm-3" style="line-height: 50px;">  Fin : </label>
                            <input type="date" name="date_fin" class="form-control" data-date="" data-date-format="DD/MM/YYYY" required>
                          </div>
                        </div>
                      </div> 
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="submit" name="rechercher" class="btn btn-primary form-control">
                          </div>
                        </div>
                      </div> 
                    </div>
                  </form>
                </div>
                  <?php 
                    if(isset($_POST['date_debut']) || isset($_POST['date_fin'])){
                      
                      $var = $_POST['date_debut'];
                      $var2 = $_POST['date_fin'];
                      $date = str_replace('/', '-', $var);
                      $date2 = str_replace('/', '-', $var2);
                      $dd = date('d-m-Y', strtotime($date));
                      $df = date('d-m-Y', strtotime($date2));
                      $conn = new mysqli('localhost', 'root', '', 'spn');
                      $sql = $conn->query("SELECT consult.idpa, consult.datcons, consult.motif, consult.examc, consult.heurdc, consult.heurfc, consult.statcons, patient.nom, patient.civi FROM patient, consult where  consult.datcons BETWEEN '$dd' AND '$df'");
                  ?>
                <div class="card-header bg-light"> 
                  <?php 
                    
                    $row_cnt = $sql->num_rows;
                  ?>
                  <h5 class="card-title">Nombre des consultations : <?php
                  
                  echo "Début : ".$dd." | Fin : "; echo $df."\n "; ?><b> <?php  echo($row_cnt); ?></b></h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table  table-striped table-bordred table-hover" id="jaktab">
                        <thead>
                          <tr>
                            <td>Date</td>
                            <td>Nom complet</td>
                            <td>Motif</td>
                            <td>Analyse</td>
                            <td>Début</td>
                            <td>Fin</td>
                            <td>Fin</td>
                            <td>Etat</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody><?php 
                            while($data = $sql->fetch_array()){
                              if ($data['statcons'] == "A") {
                                $fik = "<td><i class=\"fa fa-hourglass-half text-warning align-items-center\"></i> En attente</td>";
                              }else if ($data['statcons'] == "F") {
                                $fik = "<td><i class=\"fa fa-check-circle text-success align-items-center\"></i> Terminer</td>";
                              }else{
                                $fik = "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> En consultation</td>";
                              }
                              echo '<tr>
                                <td>'.$data['datcons'].'</td>
                                <td>'.$data['civi'].' '.$data['nom'].'</td>
                                <td>'.$data['motif'].'</td>
                                <td>'.$data['examc'].'</td>
                                <td>'.$data['heurdc'].'</td>
                                <td>'.$data['heurfc'].'</td>
                                <td>'.$fik.'</td>
                                <td><a href="Affiche_Consultation?id=' . $data['idpa'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
                              </tr>';
                            }
                          ?><?php /* | <a href="delete_coop.php?id=' . $data['idpa'] .' "><i class="fas fa-trash-alt" style="color:red;"></i></a>*/ ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <?php }else{
                    
                  } ?>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
        </div>
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