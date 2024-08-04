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
        <a href="Accueil" class="nav-link">Accueil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/police.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nouveau patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste d'attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Patients
                <span class="right badge badge-danger">Nouveau</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Consultations
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-vial"></i>   
              <p>
                Laboratoires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Bloc opératoire
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Pédiatrie
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <div id="qmoa">
              <?php 
      if(!empty($_GET['id'])) {
        $id = $_GET['id'];
      }else{
        redirect_to("home.php");
      }
      $pieces = $DB->query("SELECT * FROM care where idcare = '$id'");
      //$pieces = $DB->query("SELECT * FROM care WHERE idp = '$id'");
      ?>
      <form action="resultat.php" method="post" id="presform">
      <?php 
        foreach ($pieces as $piece):
      ?>
      <input type="hidden" name="idan" value="<?php echo $piece->idcare ?>">
      <b><?php echo $piece->name ?></b><br>
      <?php echo $piece->age ?> ans<br>

      Sex : <?php $sx = $piece->sex; if($sx == 1){ echo "Male"; }elseif($sx == 2){echo "Female";} ?><br>
      Date : <?php echo $piece->datej ?><br>
      <h2>RESULT OF LABORATORY</h2> 
      <table>
        <tr><td><h3><b><center>Analyse</center></b></h3></td><td><h3><b><center></center></b></h3></td><td><h3><b><center>Write result</center></b></h3></td></tr>
      <tr class="<?php if(!empty( $piece->fg)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->fg)){ ?>  <?php echo("Fasting Glucose : ");?></td><td><b><center><?php if ($piece->fg<75) {echo "L";}elseif ($piece->fg>115) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->fg); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->rg)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->rg)){ ?>  <?php echo("Random Glucose : ");?></td><td><b><center><?php if ($piece->rg<75) {echo "L";}elseif ($piece->rg>180) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->rg); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->gtt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->gtt)){ ?>  <?php echo("GTT : ");?></td><td><?php echo( $piece->gtt); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->chol)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->chol)){ ?>  <?php echo("Cholesterol : ");?></td><td><b><center><?php if ($piece->chol>220) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->chol); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->tc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->tc)){ ?>  <?php echo("Triglycerides : ");?></td><td><b><center><?php if ($piece->tc<35) {echo "L";}elseif ($piece->tc>190) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->tc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hdlc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hdlc)){ ?>  <?php echo("HDL Chol : ");?></td><td><?php echo( $piece->hdlc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ldlc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ldlc)){ ?>  <?php echo("LDL Chol : ");?></td><td><?php echo( $piece->ldlc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->br)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->br)){ ?>  <?php echo("Billrubin : ");?></td><td><b><center><?php if ($piece->br>1.1) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->br); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->sgptalt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->sgptalt)){ ?>  <?php echo("SGPT (ALT) : ");?></td><td><b><center><?php if ($piece->sgptalt>40) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->sgptalt); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->alkphos)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->alkphos)){ ?>  <?php echo("Alk phos : ");?></td><td><b><center><?php if ($piece->alkphos<65) {echo "L";}elseif ($piece->alkphos>306) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->alkphos); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->brdi)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->brdi)){ ?>  <?php echo("Bilirubin Dir / inD : ");?></td><td><b><center><?php if ($piece->brdi>0.3) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->brdi); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->sgot)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->sgot)){ ?>  <?php echo("SGOT (AST) : ");?></td><td><b><center><?php if ($piece->sgot>38) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->sgot); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cpk)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cpk)){ ?>  <?php echo("CPK : ");?></td><td><b><center><?php if ($piece->cpk<25) {echo "L";}elseif ($piece->cpk>195) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cpk); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ldh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ldh)){ ?>  <?php echo("LDH : ");?></td><td><b><center><?php if ($piece->ldh<230) {echo "L";}elseif ($piece->ldh>470) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->ldh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urea)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urea)){ ?>  <?php echo("Urea : ");?></td><td><b><center><?php if ($piece->urea<15) {echo "L";}elseif ($piece->urea>45) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->urea); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->crea)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->crea)){ ?>  <?php echo("Creatinine : ");?></td><td><b><center><?php if ($piece->crea<0.5) {echo "L";}elseif ($piece->crea>1.2) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->crea); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ua)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ua)){ ?>  <?php echo("Uric Acid : ");?></td><td><b><center><?php if ($piece->ua<3.4) {echo "L";}elseif ($piece->ua>7) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->ua); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->na)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->na)){ ?>  <?php echo("Soduim (NA) : ");?></td><td><b><center><?php if ($piece->na<135) {echo "L";}elseif ($piece->na>155) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->na); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->k)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->k)){ ?>  <?php echo("Potassium (K) : ");?></td><td><b><center><?php if ($piece->k<3.5) {echo "L";}elseif ($piece->k>5.3) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->k); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->chlor)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->chlor)){ ?>  <?php echo("Chloride : ");?></td><td><b><center><?php if ($piece->chlor<95) {echo "L";}elseif ($piece->chlor>105) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->chlor); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->calc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->calc)){ ?>  <?php echo("Calcium : ");?></td><td><b><center><?php if ($piece->calc<8.1) {echo "L";}elseif ($piece->calc>10.4) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->calc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->phos)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->phos)){ ?>  <?php echo("Phosphorus : ");?></td><td><b><center><?php if ($piece->phos<2.8) {echo "L";}elseif ($piece->phos>4.8) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->phos); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->alb)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->alb)){ ?>  <?php echo("Albumin : ");?></td><td><b><center><?php if ($piece->alb<38) {echo "L";}elseif ($piece->alb>55) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->alb); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->glob)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->glob)){ ?>  <?php echo("Globulin : ");?></td><td><?php echo( $piece->glob); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ratio)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ratio)){ ?>  <?php echo("A/G ratio : ");?></td><td><?php echo( $piece->ratio); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->amy)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->amy)){ ?>  <?php echo("Amylase : ");?></td><td><b><center><?php if ($piece->amy<11) {echo "L";}elseif ($piece->amy>50) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->amy); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?><H3></td></tr>
      <tr class="<?php if(!empty($piece->cbcwbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcwbc)){ ?> <?php echo("CBC / RBC : ");?></td><td><?php echo(""); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></H3></td></tr>
      <tr class="<?php if(!empty( $piece->cbcwbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcwbc)){ ?> <?php echo("WBC : ");?></td><td><b><center><?php if ($piece->cbcwbc<4) {echo "L";}elseif ($piece->cbcwbc>10) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcwbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cbclymphh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbclymphh)){ ?>  <?php echo("Lymph# : ");?></td><td><b><center><?php if ($piece->cbcwbc<0.8) {echo "L";}elseif ($piece->cbclymphh>4) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbclymphh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cbcmidh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmidh)){ ?>  <?php echo("Mid# : ");?></td><td><b><center><?php if ($piece->cbcmidh<0.1) {echo "L";}elseif ($piece->cbcmidh>0.9) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmidh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cbcgranh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcgranh)){ ?>  <?php echo("Gran# : ");?></td><td><b><center><?php if ($piece->cbcgranh<2) {echo "L";}elseif ($piece->cbcgranh>7) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcgranh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbclymphp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbclymphp)){ ?>  <?php echo("Lymph% : ");?></td><td><b><center><?php if ($piece->cbclymphp<20) {echo "L";}elseif ($piece->cbclymphp>40) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbclymphp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcmidp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmidp)){ ?>  <?php echo("Mid% : ");?></td><td><b><center><?php if ($piece->cbcmidp<3) {echo "L";}elseif ($piece->cbcmidp>15) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmidp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcgranp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcgranp)){ ?>  <?php echo("Gran% : ");?></td><td><b><center><?php if ($piece->cbcgranp<50) {echo "L";}elseif ($piece->cbcgranp>70) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcgranp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcrbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcrbc)){ ?>  <?php echo("RBC : ");?></td><td><b><center><?php if ($piece->cbcrbc<3.5) {echo "L";}elseif ($piece->cbcrbc>5.5) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcrbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbchgb)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbchgb)){ ?>  <?php echo("HGB : ");?></td><td><b><center><?php if ($piece->cbchgb<11.5) {echo "L";}elseif ($piece->cbchgb>18) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbchgb); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbchct)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbchct)){ ?>  <?php echo("HCT : ");?></td><td><b><center><?php if ($piece->cbchct<25) {echo "L";}elseif ($piece->cbchct>45) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbchct); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcmcv)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmcv)){ ?>  <?php echo("MCV : ");?></td><td><b><center><?php if ($piece->cbcmcv<55) {echo "L";}elseif ($piece->cbcmcv>95) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmcv); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcmch)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmch)){ ?>  <?php echo("MCH : ");?></td><td><b><center><?php if ($piece->cbcmch<27) {echo "L";}elseif ($piece->cbcmch>36) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmch); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcmchc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmchc)){ ?>  <?php echo("MCHC : ");?></td><td><b><center><?php if ($piece->cbcmchc<315) {echo "L";}elseif ($piece->cbcmchc>365) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmchc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcrdwcv)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcrdwcv)){ ?>  <?php echo("RDW-CV : ");?></td><td><b><center><?php if ($piece->cbcrdwcv<11.5) {echo "L";}elseif ($piece->cbcrdwcv>16) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcrdwcv); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcrdwsd)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcrdwsd)){ ?>  <?php echo("RDW-SD : ");?></td><td><b><center><?php if ($piece->cbcrdwsd<30) {echo "L";}elseif ($piece->cbcrdwsd>56) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcrdwsd); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcplt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcplt)){ ?>  <?php echo("PLT : ");?></td><td><b><center><?php if ($piece->cbcplt<100) {echo "L";}elseif ($piece->cbcplt>300) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcplt); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcmpv)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcmpv)){ ?>  <?php echo("MPV : ");?></td><td><b><center><?php if ($piece->cbcmpv<6.5) {echo "L";}elseif ($piece->cbcmpv>12) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcmpv); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcpdw)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcpdw)){ ?>  <?php echo("PDW : ");?></td><td><b><center><?php if ($piece->cbcpdw<9) {echo "L";}elseif ($piece->cbcpdw>17) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcpdw); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
<tr class="<?php if(!empty( $piece->cbcpct)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cbcpct)){ ?>  <?php echo("PCT : ");?></td><td><b><center><?php if ($piece->cbcpct<0.108) {echo "L";}elseif ($piece->cbcpct>0.282) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->cbcpct); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>

      <tr class="<?php if(!empty( $piece->esr)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->esr)){ ?>  <?php echo("E.S.R : ");?></td><td><b><center><?php if ($piece->esr<0) {echo "L";}elseif ($piece->esr>15) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->esr); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hemo)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hemo)){ ?>  <?php echo("Hemoglobin : ");?></td><td><?php echo( $piece->hemo); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->mala)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->mala)){ ?>  <?php echo("Malaria : ");?></td><td><?php if($piece->mala == 1){echo ("Positive");}elseif($piece->mala == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->btct)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->btct)){ ?>  <?php echo("BT/CT : ");?></td><td><?php echo( $piece->btct); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ptaptt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ptaptt)){ ?>  <?php echo("P.T/A.P.T.T : ");?></td><td><?php echo( $piece->ptaptt); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->rc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->rc)){ ?>  <?php echo("Retics count : ");?></td><td><?php echo( $piece->rc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->plat)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->plat)){ ?>  <?php echo("Platelets : ");?></td><td><?php echo( $piece->plat); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->rha)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->rha)){ ?>  <?php echo("Rh Antibody : ");?></td><td><?php echo( $piece->rha); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->abog)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->abog)){ ?>  <?php echo("ABO Grouping : ");?></td><td><?php echo( $piece->abog); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ctdi)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ctdi)){ ?>  <?php echo("Coombs test (Direct/Indirect) : ");?></td><td><?php echo( $piece->ctdi); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->rbcm)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->rbcm)){ ?>  <?php echo("RBC Morphology : ");?></td><td><?php echo( $piece->rbcm); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->pregt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->pregt)){ ?>  <?php echo("Pregnancy test : ");?></td><td><?php if($piece->pregt == 1){echo ("Positive");}elseif($piece->pregt == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->wt)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->wt)){ ?>  <?php echo("Widal Test : ");?></td><td><?php if($piece->wt == 1){echo ("Reactive");}elseif($piece->wt == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->raf)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->raf)){ ?>  <?php echo("Ra factor : ");?></td><td><?php if($piece->raf == 1){echo ("Reqctive");}elseif($piece->raf == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->tpha)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->tpha)){ ?>  <?php echo("TPHA : ");?></td><td><?php if($piece->tpha == 1){echo ("Positive");}elseif($piece->tpha == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->vdrl)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->vdrl)){ ?>  <?php echo("VDRL : ");?></td><td><?php if($piece->vdrl == 1){echo ("Positive");}elseif($piece->vdrl == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hivab)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hivab)){ ?>  <?php echo("HIV Ab : ");?></td><td><?php if($piece->hivab == 1){echo ("Positive");}elseif($piece->hivab == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hbsag)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hbsag)){ ?>  <?php echo("Hbs Ag : ");?></td><td><?php if($piece->hbsag == 1){echo ("Positive");}elseif($piece->hbsag == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hcvab)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hcvab)){ ?>  <?php echo("HCV Ab : ");?></td><td><?php if($piece->hcvab == 1){echo ("Positive");}elseif($piece->hcvab == 2){echo ("Negative");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->mant)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->mant)){ ?>  <?php echo("Mantoux : ");?></td><td><?php echo( $piece->mant); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hcgd)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hcgd)){ ?>  <?php echo("HCG in dilition : ");?></td><td><?php echo( $piece->hcgd); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->bruc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->bruc)){ ?>  <?php echo("Brucella : ");?></td><td><?php if($piece->bruc == 1){echo ("Reactive");}elseif($piece->bruc == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->toxo)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->toxo)){ ?>  <?php echo("Toxoplasmosis : ");?></td><td><?php if($piece->toxo == 1){echo ("Reactive");}elseif($piece->toxo == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->asot)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->asot)){ ?>  <?php echo("ASOT : ");?></td><td><?php if($piece->asot == 1){echo ("Reactive");}elseif($piece->asot == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hpa)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hpa)){ ?>  <?php echo("H.pylria Antibody : ");?></td><td><?php if($piece->hpa == 1){echo ("Reactive");}elseif($piece->hpa == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cprpcr)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cprpcr)){ ?>  <?php echo("CRP/PCR : ");?></td><td><?php if($piece->cprpcr == 1){echo ("Reactive");}elseif($piece->cprpcr == 2){echo ("Non-Reactive");} }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->anfana)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->anfana)){ ?>  <?php echo("ANF/ANA : ");?></td><td><?php echo( $piece->anfana); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->tbs)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->tbs)){ ?>  <?php echo("TB serology : ");?></td><td><?php echo( $piece->tbs); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->psa)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->psa)){ ?>  <?php echo("PSA : ");?></td><td><?php echo( $piece->psa); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?> <H3></td></tr>
      <tr class="<?php if(!empty($piece->urincol)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urincol)){ ?> <?php echo("URINE RE : ");?></td><td><?php echo(""); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></H3></td></tr>
      <tr class="<?php if(!empty( $piece->urincol)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urincol)){ ?> <?php echo("Colour : ");?></td><td><?php echo( $piece->urincol); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinapea)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinapea)){ ?>  <?php echo("Appearance : ");?></td><td><?php echo( $piece->urinapea); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinof)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinof)){ ?>  <?php echo("Other finding : ");?></td><td><?php echo( $piece->urinof); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinwbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinwbc)){ ?>  <?php echo("Wbc : ");?></td><td><?php echo( $piece->urinwbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinrbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinrbc)){ ?>  <?php echo("Rbc : ");?></td><td><?php echo( $piece->urinrbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinbact)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinbact)){ ?>  <?php echo("Bacteria : ");?></td><td><?php echo( $piece->urinbact); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->uringast)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->uringast)){ ?>  <?php echo("Gasts : ");?></td><td><?php echo( $piece->uringast); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urincrys)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urincrys)){ ?>  <?php echo("Crystal : ");?></td><td><?php echo( $piece->urincrys); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinyeast)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinyeast)){ ?>  <?php echo("Yeast : ");?></td><td><?php echo( $piece->urinyeast); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinepith)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinepith)){ ?>  <?php echo("Epithelial : ");?></td><td><?php echo( $piece->urinepith); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinpara)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinpara)){ ?>  <?php echo("Parasite : ");?></td><td><?php echo( $piece->urinpara); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinofs)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinofs)){ ?>  <?php echo("Other finding : ");?></td><td><?php echo( $piece->urinofs); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinph)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinph)){ ?>  <?php echo("Ph : ");?></td><td><?php echo( $piece->urinph); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinsg)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinsg)){ ?>  <?php echo("Specific Gravity : ");?></td><td><?php echo( $piece->urinsg); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->uringluc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->uringluc)){ ?>  <?php echo("Glucose : ");?></td><td><?php echo( $piece->uringluc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinprot)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinprot)){ ?>  <?php echo("Protein : ");?></td><td><?php echo( $piece->urinprot); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinnitrat)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinnitrat)){ ?>  <?php echo("Nitrate : ");?></td><td><?php echo( $piece->urinnitrat); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinket)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinket)){ ?>  <?php echo("Ketone : ");?></td><td><?php echo( $piece->urinket); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinurob)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinurob)){ ?>  <?php echo("Urobilinogen : ");?></td><td><?php echo( $piece->urinurob); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinbr)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinbr)){ ?>  <?php echo("Bilirubin : ");?></td><td><?php echo( $piece->urinbr); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinblood)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinblood)){ ?>  <?php echo("Blood : ");?></td><td><?php echo( $piece->urinblood); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinleuc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinleuc)){ ?>  <?php echo("Leucocytes : ");?></td><td><?php echo( $piece->urinleuc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?> <H3></td></tr>
      <tr class="<?php if(!empty($piece->stolcol)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolcol)){ ?> <?php echo("STOOL RE : ");?></td><td><?php echo(""); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></H3></td></tr>
      <tr class="<?php if(!empty( $piece->stolcol)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolcol)){ ?> <?php echo("Colour  : ");?></td><td><?php echo( $piece->stolcol); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolcons)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolcons)){ ?>  <?php echo("Consistency : ");?></td><td><?php echo( $piece->stolcons); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolblood)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolblood)){ ?>  <?php echo("Blood : ");?></td><td><?php echo( $piece->stolblood); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolmucus)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolmucus)){ ?>  <?php echo("Mucus : ");?></td><td><?php echo( $piece->stolmucus); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolpus)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolpus)){ ?>  <?php echo("Pus : ");?></td><td><?php echo( $piece->stolpus); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolof)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolof)){ ?>  <?php echo("Other Finger : ");?></td><td><?php echo( $piece->stolof); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolova)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolova)){ ?>  <?php echo("Ova : ");?></td><td><?php echo( $piece->stolova); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolcyst)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolcyst)){ ?>  <?php echo("Cyst : ");?></td><td><?php echo( $piece->stolcyst); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stoltroph)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stoltroph)){ ?>  <?php echo("Trophzoite : ");?></td><td><?php echo( $piece->stoltroph); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stollarv)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stollarv)){ ?>  <?php echo("Larvae : ");?></td><td><?php echo( $piece->stollarv); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolrbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolrbc)){ ?>  <?php echo("Rbc : ");?></td><td><?php echo( $piece->stolrbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolwbc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolwbc)){ ?>  <?php echo("Wbc : ");?></td><td><?php echo( $piece->stolwbc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolbact)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolbact)){ ?>  <?php echo("Bacteria : ");?></td><td><?php echo( $piece->stolbact); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolyeast)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolyeast)){ ?>  <?php echo("Yeast Cell (fungi) : ");?></td><td><?php echo( $piece->stolyeast); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolofs)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolofs)){ ?>  <?php echo("Other Finding : ");?></td><td><?php echo( $piece->stolofs); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolocultbloodtest)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolocultbloodtest)){ ?>  <?php echo("Occult Blood Test : ");?></td><td><?php echo( $piece->stolocultbloodtest); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->stolothtest)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->stolothtest)){ ?>  <?php echo("Other Test : ");?></td><td><?php echo( $piece->stolothtest); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->sre)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->sre)){ ?>  <?php echo("Semen RE : ");?></td><td><?php echo( $piece->sre); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->csfre)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->csfre)){ ?>  <?php echo("CSF RE : ");?></td><td><?php echo( $piece->csfre); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->safb)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->safb)){ ?>  <?php echo("Sputum AFB : ");?></td><td><?php echo( $piece->safb); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->abfre)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->abfre)){ ?>  <?php echo("ALL Body Fluid RE : ");?></td><td><?php echo( $piece->abfre); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->bjp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->bjp)){ ?>  <?php echo("Bence Jones Protein : ");?></td><td><?php echo( $piece->bjp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinbs)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinbs)){ ?>  <?php echo("Urine B/S : ");?></td><td><?php echo( $piece->urinbs); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urinbp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urinbp)){ ?>  <?php echo("Urine B/P : ");?></td><td><?php echo( $piece->urinbp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->urobil)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->urobil)){ ?>  <?php echo("Urobilinogen : ");?></td><td><?php echo( $piece->urobil); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->sob)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->sob)){ ?>  <?php echo("Stool Occult Blood : ");?></td><td><?php echo( $piece->sob); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->srs)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->srs)){ ?>  <?php echo("Stool Reducing Substance : ");?></td><td><?php echo( $piece->srs); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->usgcpc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->usgcpc)){ ?>  <?php echo("Urethral Smear G/C. P/C : ");?></td><td><?php echo( $piece->usgcpc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->vsgcpc)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->vsgcpc)){ ?>  <?php echo("Veginal Swab G/C. P/C : ");?></td><td><?php echo( $piece->vsgcpc); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->vst)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->vst)){ ?>  <?php echo("Veginal Swab for Trichomonas : ");?></td><td><?php echo( $piece->vst); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->tb)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->tb)){ ?>  <?php echo("Thyroid profile : ");?></td><td><?php echo( $piece->tb); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->tsh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->tsh)){ ?>  <?php echo("TSH : ");?></td><td><b><center><?php if ($piece->tsh<0.4) {echo "L";}elseif($piece->tsh>8.9) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->tsh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->t3)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->t3)){ ?>  <?php echo("T3 : ");?></td><td><b><center><?php if ($piece->t3<0.8) {echo "L";}elseif ($piece->t3>2) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->t3); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->t4)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->t4)){ ?>  <?php echo("T4 : ");?></td><td><b><center><?php if ($piece->t4<4.6) {echo "L";}elseif ($piece->t4>11.7) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->t4); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->fp)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->fp)){ ?>  <?php echo("Fertility profile : ");?></td><td><?php echo( $piece->fp); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->fsh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->fsh)){ ?>  <?php echo("FSH : ");?></td><td><b><center><?php if ($piece->fsh<1) {echo "L";}elseif ($piece->fsh>11) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->fsh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->lh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->lh)){ ?>  <?php echo("LH : ");?></td><td><b><center><?php if ($piece->lh<1) {echo "L";}elseif ($piece->lh>8) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->lh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->prl)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->prl)){ ?>  <?php echo("PRL : ");?></td><td><b><center><?php if ($piece->prl<3 and $piece->sex = 1) {echo "L";}elseif ($piece->prl>25 and $piece->sex =1) {echo "H";}else{echo "";} if ($piece->prl<5 and $piece->sex = 2) {echo "L";}elseif ($piece->prl>35 and $piece->sex =2) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->prl); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->testo)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->testo)){ ?>  <?php echo("Testosterone : ");?></td><td><b><center><?php if ($piece->testo<2) {echo "L";}elseif ($piece->testo>8) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->testo); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->proges)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->proges)){ ?>  <?php echo("Progesterone : ");?></td><td><?php echo( $piece->proges); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->e2)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->e2)){ ?>  <?php echo("E2 : ");?></td><td><?php echo( $piece->e2); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->gh)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->gh)){ ?>  <?php echo("Growth hormone : ");?></td><td><?php echo( $piece->gh); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->aus)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->aus)){ ?>  <?php echo("Abdominal Ultra-Sound : ");?></td><td><?php echo( $piece->aus); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->ecg)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->ecg)){ ?>  <?php echo("ECG : ");?></td><td><?php echo( $piece->ecg); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->cxr)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->cxr)){ ?>  <?php echo("CXR : ");?></td><td><?php echo( $piece->cxr); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->bhcg)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->bhcg)){ ?>  <?php echo("B-HCG : ");?></td><td><b><center></center></b></td><td><?php echo( $piece->bhcg); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>
      <tr class="<?php if(!empty( $piece->hba1c)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->hba1c)){ ?>  <?php echo("HBA1C : ");?></td><td><b><center><?php if ($piece->hba1c<26) {echo "L";}elseif ($piece->hba1c>48) {echo "H";}else{echo "";} ?></center></b></td><td><?php echo( $piece->hba1c); }else{ ?> <h5 class="hidden"> <?php echo("");?> </h5> <?php } ?></td></tr>

    </table>
      <h2>Prescription : </h2>
      <input type="text" name="p1">  <br>
      <input type="text" name="p2">  <br>
      <input type="text" name="p3">  <br>
      <input type="text" name="p4">  <br>
      <input type="text" name="p5">  <br>
      <input type="text" name="p6">  <br>
      <input type="text" name="p7">  <br>
      <input type="text" name="p8">  <br>
      <input type="text" name="p9">  <br>
      <input type="text" name="p10">  <br>
 <?php /*
      <a href="resultat.php?id=<?php echo $id ?>"><img src="image/prin.png"><br></a> 

      <input type="reset" name="reset" value="Appointment">*/?>
      <input type="submit" name="enreg" value="Save and Print">
      <?php 
        endforeach; 
      ?>
    </form>
    </div>
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
