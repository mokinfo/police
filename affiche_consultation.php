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
 
if(!empty($_GET['id'])) {
  $ids = $_GET['id']; 
}else{
  redirect_to('Consultation');
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
<?php  
                  $patientf = $DB->query("SELECT consult.ante, consult.motif, consult.motif, consult.examc, consult.diagnostic, consult.traitement, consult.examdem, consult.hist, consult.para, consult.note, consult.heurdc, consult.heurfc, consult.datcons, patient.idp, patient.nom, patient.civi, patient.age, patient.sex, patient.daten FROM patient, consult  where consult.idpa = patient.idp and consult.idcons = '$ids'");
                  foreach ($patientf as $patienf):?>
  <!-- Navbar -->
  <style>
    .warning-icon {
        color: #ffc107; /* Couleur d'avertissement typique */
    }
</style>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Ordonnance?id=<?php echo $patienf->idp; ?>" class="nav-link" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-address-card"></i> Ordonnance</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Listeattente" class="nav-link"><i class="fas fa-list warning-icon"></i> Liste d'attente</a>
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
            <a href="Hospitalisation" class="nav-link">
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
      <?php elseif ($role == 3) : ?>
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
            <a href="Bloc" class="nav-link">
              <i class="nav-icon fas fa-ban"></i>
              <p>
                Bloc opératoire
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Hospitalisation" class="nav-link">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-12">
        <div class="col-sm-12">  
          <form class="form-horizontal" action="Ajout_consultation" method="post">
            <div class="row">
              <div class="col-sm-6">
                
                
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Patient  </label>
                      <div class="col-sm-10">
                        <input type="hidden" name="idpa" value="<?php echo $patienf->idp; ?>" class="form-control">
                        <input type="text" name="nom" value="<?php echo $patienf->civi.' '.$patienf->nom; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Antécédents  </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" name="ante" disabled><?php echo $patienf->ante ; ?></textarea>
                    </div>
                  </div>  
              </div>
              
              <div class="col-sm-3">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Âge  </label>
                  <div class="col-sm-8">
                  <input type="text" name="age" value="<?php echo $patienf->age; ?>" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Date   </label>
                  <div class="col-sm-8">
                  <input type="text" name="med" value="<?php echo $patienf->datcons .' à '.$patienf->heurdc; ?>" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Jusqu'à  </label>
                  <div class="col-sm-8">
                  <input type="text" name="datents" value="<?php echo $patienf->heurfc; ?>" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Montant</label>
                  <div class="col-sm-7">
                  <input type="text" name="montant" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Paiement</label>
                  <div class="col-sm-7">
                  <input type="text" name="paix" class="form-control" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Reste à payer</label>
                  <div class="col-sm-7">
                  <input type="text" name="reste" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Général</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-copy"></i> Suivie</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-file-archive"></i> Actes médicaux</a>
                    </li>
                  </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Motif</label>
                          <textarea class="form-control" rows="3" name="motif" disabled><?php echo $patienf->motif ; ?></textarea>
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Bilan biologique</label>
                          <textarea class="form-control text-dark" rows="3" name="examc" disabled><?php echo $patienf->examc ; ?>
                          </textarea>

                        
                          
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-danger">Diagnostic</label>
                          <textarea class="form-control" rows="3" name="diag" disabled><?php echo $patienf->diagnostic ; ?></textarea>
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Traitement</label>
                          <textarea class="form-control" rows="3" name="trait" disabled><?php echo $patienf->traitement ; ?></textarea>
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Bilan radiologique</label>
                          <textarea class="form-control" rows="3" name="examd" disabled><?php echo $patienf->examdem ; ?></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Historique</label>
                          <textarea class="form-control" rows="3" name="hist" disabled><?php echo $patienf->hist ; ?></textarea>
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Paramètres</label>
                          <textarea class="form-control" rows="3" name="para" disabled><?php echo $patienf->para ; ?></textarea>
                          <label  for="inputEmail3" class="col-sm-12 col-form-label bg-warning">Note</label>
                          <textarea class="form-control" rows="3" name="note" disabled><?php echo $patienf->note ; ?></textarea><br>
                          <button class="form-control btn btn-secondary"><a href="Consultation" style="text-decoration: none; color:white;"><i class="fas fa-save"></i> Suite ...</a></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2></h2>
                      <?php
                        endforeach;
                      ?>
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  </div>
                </div>
                <div class="table-responsive"> 
                </div>
              </div>
            </div>        
            
          </form>  
        </div><!-- /.col -->  
      </div> 
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content --> 
  <!-- /.content -->
</div>  
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-light   ">
                  <h5 class="modal-title" id="exampleModalLabel">Ordonnance</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="gene-tab" data-toggle="tab" href="#gene" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Générale</a>
                    </li>
                    <?php /* 
                    <li class="nav-item">
                      <a class="nav-link" id="secon-tab" data-toggle="tab" href="#secon" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-save"></i> Enregistrer</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="tris-tab" data-toggle="tab" href="#tris" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-print"></i> Imprimer</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="genes-tab" data-toggle="tab" href="#genes" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-address-card"></i> Ordonnance type</a>
                    </li>*/?>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="gene" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                        <?php 
                        $cosen = new mysqli('localhost', 'root', '', 'spn');
                        $psen = $cosen->query("SELECT consult.idcons, consult.datcons, consult.ante, consult.motif, consult.examc, consult.heurdc, consult.heurfc, consult.statcons, patient.idp, patient.nom, patient.civi, patient.age, patient.sitfam  FROM patient, consult where patient.idp = consult.idpa and consult.idcons = '$ids' ");
                        while($rowen = mysqli_fetch_assoc($psen)){
                        ?>
                        <div class="col-sm-8">
                          <p></p>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Patient : </label>
                            <div class="col-sm-9">
                              <input type="hidden" name="idpa" class="form-control">
                              <input type="text" name="nom" class="form-control" value="<?php echo $rowen['nom']; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Antécédents : </label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="1" name="ante" disabled><?php echo $rowen['ante']; ?></textarea>
                            </div>
                          </div>  
                        </div>
                        <div class="col-sm-4">
                          <p></p>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Âge : </label>
                            <div class="col-sm-8">
                            <input type="text" name="age" class="form-control" value="<?php echo $rowen['age']; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Date :  </label>
                            <div class="col-sm-8">
                            <input type="text" name="datents"  class="form-control" value="<?php echo $rowen['datcons']; ?>" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="card-header">
                          <div class="col-sm-12">
                            <h5>Préscription</h5>
                          </div>
                        </div>
                        <form action="code.php" method="POST">
                          
                        <div class="main-form mt-3 border-bottom">
                          <?php 
                            $conng = new mysqli('localhost', 'root', '', 'spn');
                            $sql = $conng->query("SELECT MAX(id) AS idord FROM prescription");
                            while($rowg = mysqli_fetch_assoc($sql)){
                              $sg = $rowg["idord"] + 1;
                            ?>
                            <input type="hidden" name="idord" value="<?php   echo $sg;} ?>" class="form-control" id="inputEmail3">
                          <table class="table  table-striped table-bordred table-hover">
                            <thead>
                              <tr>
                                <td>Médicament</td>
                                <td>Posologie</td>
                                <td>Nombre de jour</td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                <td>
                                  <div class="form-group mb-2">
                                    <input type="hidden" name="idpo[]" value="<?php echo $rowen['idp']; ?>">
                                    <input type="hidden" name="idpc[]" value="<?php echo $rowen['idcons']; ?>">
                                    <input type="text" name="medic[]" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group mb-2">
                                    <input type="text" name="poso[]" class="form-control" required>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group mb-2">
                                    <input type="text" name="nbrj[]" class="form-control" required>
                                    <input type="hidden" name="datedujours[]" class="form-control" value="<?php echo date("d/m/Y"); ?>">
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group mb-2">
                                    <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary"><i class="fa fa-plus"></i></a>
                                  </div>
                                </td>
                              </tr>
                              
                            </tbody>
                          </table>
                          <div class="paste-new-forms">
                              
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="col-sm-12">
                            <button type="submit" name="save_multiple_data" class="btn btn-warning"><i class="fa fa-save"></i> Enregistrer | <i class="fa fa-print"></i> Imprimer</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="secon" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="row">
                        <br>
                        <div class="col-sm-8">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Patient  </label>
                            <div class="col-sm-10">
                              <input type="hidden" name="idpa" class="form-control">
                              <input type="text" name="nom" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Antécédents  </label>
                            <div class="col-sm-10">
                              <textarea class="form-control" rows="3" name="ante"></textarea>
                            </div>
                          </div>  
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Âge  </label>
                            <div class="col-sm-8">
                            <input type="text" name="age" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Médecin  </label>
                            <div class="col-sm-8">
                            <input type="text" name="med" class="form-control" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Date  </label>
                            <div class="col-sm-8">
                            <input type="text" name="datents"  class="form-control" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tris" role="tabpanel" aria-labelledby="contact-tab">

                    </div>
                  </div>
                </div>
              </div>
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
<!-- ./wrapper -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){

      $(document).on('click', '.remove_btn', function(){
        $(this).closest('.main-form').remove();
      });

      $(document).on('click', '.add-more-form', function(){
        $('.paste-new-forms').append('<input type="hidden" name="idpo[]" value="<?php echo $rowen['idp']; ?>">\
          <input type="hidden" name="idpc[]" value="<?php echo $rowen['idcons'];} ?>"><div class="main-form mt-3 border-bottom"><table class="table  table-striped table-bordred table-hover">\
            <tbody>\
              <tr><tr>\
          <td>\
            <div class="form-group mb-2">\
              <input type="text" name="medic[]" class="form-control" required>\
            </div>\
          </td>\
          <td>\
            <div class="form-group mb-2">\
              <input type="text" name="poso[]" class="form-control" required>\
            </div>\
          </td>\
          <td>\
            <div class="form-group mb-2">\
              <input type="text" name="nbrj[]" class="form-control" required>\
            </div>\
            <input type="hidden" name="datedujours[]" class="form-control" value="<?php echo date("d/m/Y"); ?>">\
          </td>\
          <td>\
            <div class="form-group mb-2">\
              <button type="button" class="remove_btn btn btn-danger"><i class="fa fa-trash"></i></button>\
            </div>\
          </td>\
                              \
                            </tbody>\
                          </table></div>');
      });
    });
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

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>