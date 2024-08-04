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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    

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
        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"> Ajouter</i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><i class="fas fa-edit text-primary"></i> Modifier</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Dossier" class="nav-link"><i class="fas fa-folder-open text-warning"></i> Dossier</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><i class="fas fa-print"> Impréssion</i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-stethoscope text-info"></i> Nouvelle examen.</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Consultation" class="nav-link"><i class="fas fa-clock text-dark"></i> Dernière consult.</a>
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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
         
          
      </div>
      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
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
            <a href="#" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Nouveau patient</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Listeattente" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Liste d'attente</p>
            </a>
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
            <a href="Consultation" class="nav-link">
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid"> 
      <?php /*<div id="London" class="tabcontent">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-light">
                <?php 
                    $conn = new mysqli('localhost', 'root', '', 'spn');
                    $sql = $conn->query("SELECT patient.idp, patient.nom, patient.civi, patient.age, andoc.idexam, andoc.idan, andoc.identexam, andoc.datexam FROM patient, andoc where patient.idp = andoc.idan ORDER BY andoc.idan DESC");
                  $row_cnt = $sql->num_rows;
                ?>
                <h5 class="card-title">Nombre totale d'ordonnances : <b><?php  echo($row_cnt); ?></b></h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table  table-striped table-bordred table-hover" id="jaktab">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Nom complet</td>
                          <td>Age</td>
                          <td>Date des examens</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody><?php 
                          while($data = $sql->fetch_array()){
                            echo '<tr>
                              <td>'.$data['idp'].'</td>
                              <td>'.$data['civi'].' '.$data['nom'].'</td>
                              <td>'.$data['age'].'</td>
                              <td>'.$data['datexam'].'</td>
                              <td><a href="Affiche_ordonnance?id=' . $data['idan'] .' " class="text-secondary" style=\"text-align:center;\" ><i class="fas fa-eye fa-2x "></i></a></td>
                            </tr>';
                          }
                        ?>
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
      </div> */?>
    </div><!-- /.container-fluid -->
  </div>

  
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              
              <div class="modal-content">
                <div class="modal-header bg-light   ">
                  <h5 class="modal-title" id="exampleModalLabel">Examen clinique et paraclinique</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-sm-12 bg-warning">
                        <form action="examen.php" method="POST"> 
                          <?php  
                            $cosexam = new mysqli('localhost', 'root', '', 'spn');
                            $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM andoc");
                            while($rowexam = mysqli_fetch_assoc($psexam)){
                              $sexam = $rowexam["id"] + 1;
                          ?>
                        <div class="form-group">
                          <label>Patient</label>
                          <select id="select_page" style="width:200px;" class="operator"> 
                              <option value="">Select a Page...</option>
                              <option value="alpha">alpha</option> 
                              <option value="beta">beta</option>
                              <option value="theta">theta</option>
                              <option value="omega">omega</option>
                            </select>
                            
                            <select class="w-100" data-live-search="true" name="idpatient" >
                              <?php  
                                $patient = $DB->query("SELECT * FROM patient");
                              ?>
                              <?php  
                                $cosexa = new mysqli('localhost', 'root', '', 'spn');
                                $psexa = $cosexa->query("SELECT * FROM patient");
                                
                              ?>
                                  <option value="0">
                                    Nom du patient
                                  </option>
                                    
                                </thead>
                                <tbody>
                              <?php   
                                while($rowexa = mysqli_fetch_assoc($psexa)){
                                  ?>
                                  <option value="<?php echo $rowexa['idp'] ; ?>">
                                    <?php 
                                      echo "<td>" . $rowexa['nom'] . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $rowexa['daten'] . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $rowexa['age'] . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $rowexa['tel'] . "</td>";
                                    ?>
                                  </option><?php 
                                }?>
                                </tbody>
                              </table>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Motif</label>
                          <input type="text" class="form-control" name="motif" placeholder="Motif">
                        </div>
                        <input type="hidden" name="idexam" value="<?php echo $sexam;} ?>"> 
                        <h2>Chimie</h2>
                        <input type="hidden" name="idpexam" value="<?php echo $patienf->idp; ?>">
                        <input type="hidden" name="identexam" value="<?php echo $patienf->ident; ?>">
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="fg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Glycémie à jeun </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Glycémie aléatoire  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="gtt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  GTT </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="chol" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Cholestérol </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Triglycérides </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hdlc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  HDL-chol  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ldlc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  LDL-chol  </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="br" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Billrubine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sgptalt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  SGPT (ALT)  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="alkphos" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Alkphos </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="brdi" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Bilirubine Dir / inD  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sgot" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  SGOT (AST)  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cpk" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label"> CPK </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ldh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  LDH </label>
                        </div>
                      </div>
                      <div class="col-sm-3"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urea" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Urée  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="crea" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Créatinine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ua" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Acide urique  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="na" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Soduim</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="k" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Potassium (K) </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="chlor" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Chlorure  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="calc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Calcium </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="phos" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Phosphore </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="alb" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Albumine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="glob" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Globuline </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ratio" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Rapport A/G </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="amy" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Amylase </label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Hématologie / Sérologie / Virologie</h2>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cbc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Indices CBC/RBC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="esr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">E.S.R. </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hemo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Hémoglobine</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="mala" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Paludisme</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="btct" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">BT/TC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ptaptt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">P.T/A.P.T.T</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Les rétiques comptent</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="plat" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Plaquettes </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rha" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Rh Anticorps </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="abog" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Groupement ABO </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ctdi" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test de Combes (direct/indirect) </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rbcm" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Morphologie des GR </label>
                        </div>
                      </div>
                      <div class="col-sm-3"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="pregt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test de grossesse</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="wt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test Widal </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="raf" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Facteur Ra </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tpha" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TPHA </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vdrl" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">VDRL </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hivab" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ac VIH </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hbsag" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ag Hbs </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hcvab" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ac anti-VHC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="mant" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Mantoux</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hcgd" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">HCG en dilution</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bruc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Brucelle </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="toxo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Toxoplasmose </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="asot" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ASOT </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hpa" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Anticorps H.pylria </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cprpcr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CRP/PCR</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="anfana" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ANF/ANA</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tbs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Sérologie TB </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="psa" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Message d'intérêt public </label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Pathologie clinique</h2>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urin" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">URINE RE </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="stol" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TABOURET RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Sperme RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="csfre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CSF RE </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="safb" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Crachats BAAR</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="abfre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TOUS les fluides corporels RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bjp" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Protéine Bence Jones </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urinbs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Urine B/S</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urinbp" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">BP urinaire</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urobil" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Urobilinogène</label>
                        </div>
                      </div>
                      <div class="col-sm-5"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sob" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Tabouret Sang Occulte</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="srs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Substance réduisant les selles </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="usgcpc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Frottis urétral G/C. P/C </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vsgcpc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Écouvillon végétal G/C. P/C</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vst" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Écouvillon végétal pour Trichomonas</label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Hormones</h2>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tsh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TSH</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="t3" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">T3 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="t4" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">T4 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="fsh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">FSH</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="lh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">LH </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="prl" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">PRL</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="testo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Testostérone </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="proges" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Progestérone </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="e2" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">E2 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="gh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Hormone de croissance</label>
                        </div>
                      </div>
                      <div class="col-sm-5"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="aus" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Échographie abdominale </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ecg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ECG</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cxr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CXR</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bhcg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">B-HCG</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hba1c" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">HBA1C</label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-light">
                        <input type="submit" name="enreg" value="Sauvegarder">
                      </form>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
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

    $("select").select2();
  });
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




<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>

<script src="js/bootstrap-select.min.js"></script>
</body>
</html>
