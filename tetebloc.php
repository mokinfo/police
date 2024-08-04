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
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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

  <!-- pour inserer le recherche automatique de SELECT
  <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
  <script src="library/dselect.js"></script>-->

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
        <a href="Bloc" class="nav-link"><i class="fas fa-bed"> Bloc opération</i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"> Nouvel opération</i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Dossier" class="nav-link"><i class="fas fa-folder-open text-warning"></i> Dossier</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Consultation" class="nav-link"><i class="fas fa-stethoscope text-info"></i> Nouvelle consult.</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Consultation" class="nav-link"><i class="fas fa-clock text-dark"></i> Dernière consult.</a>
      </li>        
              
              
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a href="Logout" class="nav-link">Se deconnecter</a>
        
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Ali Robleh
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Urgence d'un patient...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Ahmed Robleh
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">J'ai réçu votre message</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Yahya Abdo
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Vos suggestions</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Voir tout les messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nouveaux messages
            <span class="float-right text-muted text-sm">3 min</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 demandes
            <span class="float-right text-muted text-sm">12 heurs</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nouveaux rapports
            <span class="float-right text-muted text-sm">2 jours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Voir tout les notifications</a>
        </div>
      </li>
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
      <img src="dist/img/police.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Santé - PN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <?php 
          $coss = new mysqli('localhost', 'root', '', 'spn');
          $user = $_SESSION['user'];
          $pss = $coss->query("SELECT * FROM utilisateur where utilisateur = '$user'");
          while($rows = mysqli_fetch_assoc($pss)){
              $ss = $rows["id"] + 1;
        ?>
        <div class="image">
          <img src="images/utilisateur/<?php echo $rows["file_name"]; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $rows["nom"]; }?></a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
         
          
      </div>
      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <?php $role = $_SESSION['role']; if ($role == 8) : ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="Accueil" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Listeattente" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Liste d'attente</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Dossier" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Patients
                <span class="right badge badge-danger">Nouveau</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Consultation" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Consultations
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Laboratoire" class="nav-link">
              <i class="nav-icon fas fa-vial"></i>   
              <p>
                Laboratoires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Bloc" class="nav-link">
              <i class="nav-icon fas fa-ban"></i>
              <p>
                Bloc opératoire
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Hosp_admission" class="nav-link">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Hôspitalisation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Dossier" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Dossier médicale
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Facturation" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Facturation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <?php else : ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="Accueil" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>  
      <?php endif; ?>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
