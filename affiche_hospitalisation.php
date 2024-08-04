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
require_once("tetehos.php");?>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <?php /* <div class="form">
              <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Patient" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                  <button class="btn btn-sidebar">
                    <i class="fas fa-folder fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>*/ 
            ?>
            <?php /*
            
            <i class="fas fa-user-plus fa-3x"></i> Nouveau Patient</a>*/
            ?>
            
            
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
              <?php 
            if (isset($_SESSION['statut'])) {
              ?>
                <h4 class="alert alert-success"><?php echo $_SESSION['statut']; ?></h4>
              <?php 
              unset($_SESSION['statut']);
            }
          ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-info-circle text-primary"></i> Information générale</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-list text-danger"></i> Actes</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="suivie-tab" data-toggle="tab" href="#suivie" role="tab" aria-controls="suivie" aria-selected="false"><i class="fas fa-signal text-info"></i> Suivi patient</a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="card">
                              <div class="card-header bg-light">
                                <?php
                                  if(!empty($_GET['id'])) {
                                    $ids = $_GET['id'];  
                                  }
                                  $conn = new mysqli('localhost', 'root', '', 'spn');
                                  $sql = $conn->query("SELECT hospitalisation.idh, hospitalisation.idp, hospitalisation.hospar, hospitalisation.med_trai, hospitalisation.date_hos, hospitalisation.motif_hos, hospitalisation.service, hospitalisation.chambre, hospitalisation.lit, hospitalisation.tuteur, hospitalisation.date_nai_garde, hospitalisation.cdi, hospitalisation.date_cdi, hospitalisation.etat, patient.nom, patient.civi, patient.sex, patient.age FROM patient, hospitalisation where patient.idp = hospitalisation.idp and hospitalisation.idh = '$ids' ORDER BY hospitalisation.idh ASC");
                                  while($data = $sql->fetch_array()){
                                ?>
                                <h5 class="card-title">Hospitalisation numéro : <b><?php  echo $data['idh']; ?></b></h5><button type="button" class="close" ><a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-person-booth text-success"></i> Sortie</a></button>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header bg-secondary">
                                        <H4>Information générale</H3>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"> 
                                    <div class="form-group">
                                      <label>Nom du patient</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['nom']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospitalisé par</label>
                                        <?php 
                                        $oper = $data['hospar'];
                                        $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                        foreach ($pieces as $piece):
                                          $oper_nom = $piece->nom;
                                        endforeach; ?>
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Médecin traitant</label>
                                        <?php 
                                        $oper = $data['med_trai'];
                                        $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                        foreach ($pieces as $piece):
                                          $oper_nom = $piece->nom;
                                        endforeach; ?>
                                        <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date hospitalisé</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['date_hos']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Motif</label>
                                      <input class="form-control" type="text" value="<?php  echo $data['motif_hos']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Service</label>
                                      <?php if($data['service'] =="MI"){ $services = "Médecine";}elseif($data['service'] =="PD"){ $services = "Pédiatrie";}elseif($data['service'] =="OP"){ $services = "Chirurgie";}elseif($data['service'] =="GO"){ $services = "Gynécologie obstétrique";}?>
                                        <input class="form-control" type="text" value="<?php  echo $services; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Chambre</label>
                                      <?php 
                                      if ($data['chambre'] == 1) {
                                        $cham = "Commune";
                                      }elseif ($data['chambre'] == 2) {
                                        $cham = "3 lits";
                                      }elseif ($data['chambre'] == 3) {
                                        $cham = "2 lits";
                                      }elseif ($data['chambre'] == 4) {
                                        $cham = "VIP";
                                      }elseif ($data['chambre'] == 5) {
                                        $cham = "Normal";
                                      }elseif ($data['chambre'] == 6) {
                                        $cham = "Catégorie";
                                      }else{
                                        $cham = "NSP";
                                      } ?>
                                        <input class="form-control" type="text" value="<?php  echo $cham; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Lit</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['lit']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header bg-secondary">
                                        <H4>Tuteur ou garde</H3>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Tuteur</label>
                                        <input class="form-control" type="text" value="<?php   echo $data['tuteur']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date de naissance du tuteur</label>
                                        <input class="form-control" type="text" value="<?php   echo $data['date_nai_garde']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>CDI N°</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['cdi']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Date CDI</label>
                                        <input class="form-control" type="text" value="<?php  echo $data['date_cdi']; ?>" disabled>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Etat actuel du patient</label>
                                        <?php if($data['etat'] =="HOS"){ $etat = "Hospitalisé";}
                                        if($data['etat'] =="SOR"){ $etat = "SORTIE";}?>
                                        <input class="form-control" type="text" value="<?php  echo $etat;} ?>" disabled>
                                    </div>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <a href="#" class="btn btn-warning" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus"></i> Nouveau Acte</a>
                          <div id="London" class="tabcontent">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header bg-light">
                                    <?php 
                                      $conn = new mysqli('localhost', 'root', '', 'spn');
                                      $sql = $conn->query("SELECT * FROM actes where idh = '$ids' ORDER BY ida DESC");
                                      $row_cnt = $sql->num_rows;
                                    ?>
                                    <h5 class="card-title">Nombres d'actes subis : <b><?php  echo($row_cnt); ?></b></h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <table class="table  table-striped table-bordred table-hover" id="jaktab">
                                          <thead>
                                            <tr>
                                              <th>Intitulé</th>
                                              <th>Date - heure</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody><?php 
                                              while($data = $sql->fetch_array()){
                                                /*if ($data['service'] == "MI") {
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
                                                }*/

                                                /*$oper = $data['med_trai'];
                                                $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                                                foreach ($pieces as $piece):
                                                  $oper_nom = $piece->nom;
                                                endforeach; */
                                                echo '<tr>
                                                  <td>'.$data['intitule'].'</td>
                                                  <td>'.$data['date_acte'].'</td>
                                                  <td><a href="Affiche_Hospitalisation?id=' . $data['ida'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
                        <div class="tab-pane fade" id="suivie" role="tabpanel" aria-labelledby="suivie-tab">
                          <a href="#" class="btn btn-warning" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal4"><i class="fas fa-analytics"></i> Suivi patient</a>
                          <div id="London" class="tabcontent">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                  <div class="card-header bg-light">
                                    <?php 
                                      $conn = new mysqli('localhost', 'root', '', 'spn');
                                      $sql = $conn->query("SELECT * FROM suivie where idh = '$ids' ORDER BY ids DESC");
                                      $row_cnt = $sql->num_rows;
                                    ?>
                                    <h5 class="card-title">Nombre des traitements reçu : <b><?php  echo($row_cnt); ?></b></h5>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <table class="table  table-striped table-bordred table-hover" id="jaktab">
                                          <thead>
                                            <tr>
                                              <th>Intitulé</th>
                                              <th>Date - heure</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody><?php 
                                              while($data = $sql->fetch_array()){
                                                echo '<tr>
                                                  <td>'.$data['intitule'].'</td>
                                                  <td>'.$data['date_suivie'].'</td>
                                                  <td><a href="Affiche_Hospitalisation?id=' . $data['ids'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
                      <div class="table-responsive"> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel">Patient sortant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="Sortie_Hospitalisation" method="post">
                      <input type="hidden" name="idh" value="<?php echo $ids; ?>">
                      <div class="modal-body">   
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Sortie</label>
                              <?php $date_sor = date("d/m/Y G:i"); ?>
                              <input type="text" class="form-control" name="date_sor" value="<?php echo $date_sor; ?>" >
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Par Dr.</label>
                              <?php 
                                $cos = new mysqli('localhost', 'root', '', 'spn');
                                $ps = $cos->query("SELECT * FROM medecin");
                              ?>
                              <select class="form-control" name="pardr">
                                <option value="0">Selectionner</option>

                              <?php while($pas = $ps->fetch_array()){ ?>
                                <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; }?></option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>A revoir</label>
                              <select class="form-control" name="revoir">
                                <option value="Dans 1 Semaine">Dans 1 Semaine</option>
                                <option value="Dans 2 Semaines">Dans 2 Semaines</option>
                                <option value="Dans 3 Semaines">Dans 3 Semaines</option>
                                <option value="Dans 4 Semaines">Dans 4 Semaines</option>
                                <option value="Dans 5 Semaines">Dans 5 Semaines</option>
                                <option value="Dans 6 Semaines">Dans 6 Semaines</option>
                                <option value="Dans 7 Semaines">Dans 7 Semaines</option>
                                <option value="Dans 8 Semaines">Dans 8 Semaines</option>
                                <option value="Dans 9 Semaines">Dans 9 Semaines</option>
                                <option value="Dans 10 Semaines">Dans 10 Semaines</option>
                                <option value="Dans 11 Semaines">Dans 11 Semaines</option>
                                <option value="Dans 12 Semaines">Dans 12 Semaines</option>
                                <option value="Dans 13 Semaines">Dans 13 Semaines</option>
                                <option value="Dans 14 Semaines">Dans 14 Semaines</option>
                                <option value="Dans 15 Semaines">Dans 15 Semaines</option>
                                <option value="Dans 16 Semaines">Dans 16 Semaines</option>
                                <option value="Dans 17 Semaines">Dans 17 Semaines</option>
                                <option value="Dans 18 Semaines">Dans 18 Semaines</option>
                                <option value="Dans 19 Semaines">Dans 19 Semaines</option>
                                <option value="Dans 20 Semaines">Dans 20 Semaines</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Date </label>
                              <input type="date" class="form-control" name="date_cni">
                            </div>
                          </div> 
                          <div class="col-sm-6">
                            <div class="form-group">
                              <button class="form-control bg-info" type="submit" name="enreg"><i class="fas fa-save"></i> OK</button>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <button class="form-control bg-warning" type="reset" name="reset"><i class="fas fa-file"></i> Annuler</button>
                            </div>
                          </div>     
                        </div>
                      </div>
                    </form>
                  </div>
                </div> 
              </div>

              <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel">Nouvel acte</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="Acte_Nouveau" method="post">
                      <?php   
                        $cosena = new mysqli('localhost', 'root', '', 'spn');
                        $psena = $cosena->query("SELECT MAX(ida) AS id FROM actes");
                        while($rowena = mysqli_fetch_assoc($psena)){
                            $sena = $rowena["id"] + 1;
                      ?>
                      <input type="hidden" name="idh" value="<?php echo $ids; ?>">
                      <input type="hidden" name="ida" value="<?php echo $sena;} ?>">
                      <div class="modal-body">   
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Sortie</label>
                              <?php $date_sor = date("d/m/Y G:i"); ?>
                              <input type="text" class="form-control" name="date_sor" value="<?php echo $date_sor; ?>" >
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Par Dr.</label>
                              <?php 
                                $cos = new mysqli('localhost', 'root', '', 'spn');
                                $ps = $cos->query("SELECT * FROM medecin");
                              ?>
                              <select class="form-control" name="pardr">
                                <option value="0">Selectionner</option>

                              <?php while($pas = $ps->fetch_array()){ ?>
                                <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; }?></option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Tuteur</label>
                              <input type="text" class="form-control" name="tuteur">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Carte d'identité National CNI°</label>
                              <input type="text" class="form-control" name="cni">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Délivré le </label>
                              <input type="date" class="form-control" name="date_cni">
                            </div>
                          </div> 
                          <div class="col-sm-6">
                            <div class="form-group">
                              <button class="form-control bg-info" type="submit" name="enreg"><i class="fas fa-save"></i> OK</button>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <button class="form-control bg-warning" type="reset" name="reset"><i class="fas fa-file"></i> Annuler</button>
                            </div>
                          </div>     
                        </div>
                      </div>
                    </form>
                  </div>
                </div> 
              </div>

              

              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-light   ">
                      <h5 class="modal-title" id="exampleModalLabel">Nouvel acte</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="gene-tab" data-toggle="tab" href="#gene" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Générale</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="gene" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <?php 
                            $cosenha = new mysqli('localhost', 'root', '', 'spn');
                            $psenha = $cosenha->query("SELECT hospitalisation.idh, hospitalisation.date_hos, hospitalisation.motif_hos, hospitalisation.chambre, hospitalisation.lit, patient.idp, patient.nom, patient.civi, patient.age, patient.sitfam  FROM patient, hospitalisation where patient.idp = hospitalisation.idp and hospitalisation.idh = '$ids' ");
                            while($rowenha = mysqli_fetch_assoc($psenha)){
                            ?>
                            <div class="col-sm-7">
                              <p></p>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Patient : </label>
                                <div class="col-sm-9">
                                  <input type="hidden" name="idp" class="form-control">
                                  <input type="text" name="nom" class="form-control" value="<?php echo $rowenha['nom']; ?>" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Antécédents </label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" rows="1" name="ante" disabled><?php echo $rowenha['motif_hos']; ?></textarea>
                                </div>
                              </div>  
                            </div>
                            <div class="col-sm-5">
                              <p></p>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Âge : </label>
                                <div class="col-sm-8">
                                <input type="text" name="age" class="form-control" value="<?php echo $rowenha['age']; ?>" disabled>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Date :  </label>
                                <div class="col-sm-8">
                                <input type="text" name="datents"  class="form-control" value="<?php echo $rowenha['date_hos']; ?>" disabled>
                                </div>
                              </div>
                            </div>

                            <form action="actes_hos.php" method="POST">
                              
                              <div class="main-form mt-3 border-bottom">
                                <?php 
                                  $conng = new mysqli('localhost', 'root', '', 'spn');
                                  $sqla = $conng->query("SELECT MAX(ida) AS idord FROM actes");
                                  while($rowg = mysqli_fetch_assoc($sqla)){
                                    $sg = $rowg["idord"] + 1;
                                ?>
                                <input type="hidden" name="ida" value="<?php   echo $sg;} ?>" class="form-control" id="inputEmail3">
                                <input type="hidden" name="idpsc" value="<?php   $rowenha['date_hos']; ?>" class="form-control" id="inputEmail3">
                                <table class="table  table-striped table-bordred table-hover">
                                  <thead>
                                    <tr>
                                      <td>Intitulé de l'actes </td>
                                      <td>Date</td>
                                      <td>Action</td>
                                    </tr>
                                  </thead>
                                  <tbody> 
                                    <tr>
                                      <td>
                                        <div class="form-group mb-2">
                                          <input type="hidden" name="idh[]" value="<?php echo $rowenha['idh']; ?>">
                                          <input type="hidden" name="idp[]" value="<?php echo $rowenha['idp']; ?>">
                                          <select class="form-control" name="intitule[]">
                                            <option value="0">Selectionner</option>
                                            <option value="10F">RM (réanimation d’indication médicale)  </option>
                                            <option value="10G">RC (réanimation d’indication chirurgicale)  </option>
                                            <option value="13D">Césarienne sous AG  </option>
                                            <option value="13E">Césarienne sous Anesthésie loco-regionale </option>
                                            <option value="13F">Hystérectomie voie basse  </option>
                                            <option value="13G">Hystérectomie voie haute  </option>
                                            <option value="C10K1">Ténotomie </option>
                                            <option value="C10K2">Suture  </option>
                                            <option value="C11B1">Biopsie rénale  </option>
                                            <option value="C11B10">Pyélostomie  </option>
                                            <option value="C11B2">Ponction ou Drainage d’une collection rénale ou péri-néphrétique  </option>
                                            <option value="C11B4">Néphropexie </option>
                                            <option value="C11B5">Néphrostomie  </option>
                                            <option value="C11B6">Néphrectomie partielle  </option>
                                            <option value="C11B9">Néphrectomie totale pour cancer </option>
                                            <option value="C11C7">Chirurgie du reflux vésico-urétérale  </option>
                                            <option value="C11D1">Cystostomie sus pubienne  </option>
                                            <option value="C11D2">Cystectomie partielle ou totale </option>
                                            <option value="C11D3">Chirurgie de la lithiase vésicale </option>
                                            <option value="C11E1">Circoncision  </option>
                                            <option value="C11E10">Urétrotomie interne ou externe </option>
                                            <option value="C11E11">Urétroplastie  </option>
                                            <option value="C11E12">Abcès, Phlegmon et Suppurations urétrales  </option>
                                            <option value="C11E2">Phimosis et paraphimosis  </option>
                                            <option value="C11E3">Hypospadias </option>
                                            <option value="C11E4">Epispadias  </option>
                                            <option value="C11E8">Méatotomie et Méatostomie </option>
                                            <option value="C11E9">Dilatation urétrale au beniquet </option>
                                            <option value="C11F1">Ponction biopsie de la prostate </option>
                                            <option value="C11F2">Prostatectomie pour cancer  </option>
                                            <option value="C11F3">Incision d'un abcès de la prostate par voie périnéale </option>
                                            <option value="C11G1">Biopsie testiculaire  </option>
                                            <option value="C11G4">Cure d’hydrocèle  </option>
                                            <option value="C11G5">Orchidectomie unilatérale ou castration </option>
                                            <option value="C11G6">Orchidopexie  </option>
                                            <option value="C1B1">Ponction péricardique  </option>
                                            <option value="C1C2">Injection intra-artérielle </option>
                                            <option value="C1C3">Abord vasculaire pour dialyse  </option>
                                            <option value="C1C4">Suture et/ou ligature  </option>
                                            <option value="C1C5">Dénudation veineuse  </option>
                                            <option value="C1C6">Chirurgie des anévrysmes artériels </option>
                                            <option value="C1C7">Chirurgie de la maladie thromboembolique veineuse et artérielle  </option>
                                            <option value="C2B4">Gastrostomie d’alimentation  </option>
                                            <option value="C2B5">Gastro-Entero-Anastomose </option>
                                            <option value="C2C4">Chirurgie du diverticule de Meckel </option>
                                            <option value="C2C5">Résection iléo-jéjunale  </option>
                                            <option value="C2D1">Appendicectomie simple par Laparotomie </option>
                                            <option value="C2D2">Appendicectomie simple par Laparoscopie  </option>
                                            <option value="C2D3">Colostomie de décharge ou de dérivation  </option>
                                            <option value="C2D8">Rétablissement de la continuité colique  </option>
                                            <option value="C2E1">Chirurgie des hémorroïdes  </option>
                                            <option value="C2E2">Chirurgie de la fissure anale  </option>
                                            <option value="C2E4">Chirurgie des suppurations ano-périnéales chroniques   </option>
                                            <option value="C2F11">Chirurgie des Voies Biliaires hors lithiase </option>
                                            <option value="C2F3">Drainage d’un abcès du foie  </option>
                                            <option value="C2F8">Cholécystectomie par laparotomie </option>
                                            <option value="C2F9">Cholécystectomie par laparoscopie  </option>
                                            <option value="C2H1">Chirurgie des hernies de l’aine, de l’ombilic, de la ligne blanche et éventrations </option>
                                            <option value="C2H3">Traitement chirurgical des collections liquidiennes péritonéales </option>
                                            <option value="C6A1">Réfection palpébrale traumatique </option>
                                            <option value="C6A3">Chirurgie du chalazion, kyste palpébral  </option>
                                            <option value="C6A5">Chirurgie du xanthélasma et du trichiasis  </option>
                                            <option value="C6A6">Extraction d’un corps étranger de l’orbite </option>
                                            <option value="C6C1">Ablation de pterygium,pingueculum  </option>
                                            <option value="C6H1">Corps étrangers du segment antérieur </option>
                                            <option value="C7A1A">Suture ou réfection simple du pavillon  </option>
                                            <option value="C7A1D">Ablation simple d’une tumeur ou d’une chéloïde de l’oreille   </option>
                                            <option value="C7A2A">Ablation de bouchon de cérumen uni ou bilatéral </option>
                                            <option value="C7A2B">Ablation de corps étrangers </option>
                                            <option value="C7B2K">Incision ou drainage d’une cellulite ou adénite génienne  </option>
                                            <option value="C7B2L">Chirurgie des collections suppurées de la face  </option>
                                            <option value="C7C10">Curage total  </option>
                                            <option value="C7C12">Lobectomie thyroïdienne </option>
                                            <option value="C7C13">Thyroïdectomie totale </option>
                                            <option value="C7C14">Trachéotomie  </option>
                                            <option value="C7C2">Curage sus claviculaire  </option>
                                            <option value="C7C3">Drainage cervical  </option>
                                            <option value="C7C4">Fistule cervicale  </option>
                                            <option value="C7C6">Sous Maxillectomie </option>
                                            <option value="C7C7">Parotidectomie superficielle </option>
                                            <option value="C7C8">Parotidectomie totale  </option>
                                            <option value="C7C9">Exerese glande sublinguale </option>
                                            <option value="C7D1">Réfection partielle ou totale des lèvres traumatique ou tumorale </option>
                                            <option value="C7G1">Adénoïdectomie </option>
                                            <option value="C7G11">Amygdalectomie associé adénoïdectomie </option>
                                            <option value="C7G3">Amygdalectomie par électrocoagulation  </option>
                                            <option value="C8A1">Nettoyage ou pansement d'une brûlure </option>
                                            <option value="C8A2">Prélèvement simple de peau ou de muqueuse pour examen histologique </option>
                                            <option value="C8A3">Suture secondaire d'une plaie après avivement  </option>
                                            <option value="C8B6">Correction d'une bride rétractile par plastie en Z </option>
                                            <option value="C9A1">Mise à plat ou drainage d’une collection pariétale (abcès, hématome, sérosité) </option>
                                            <option value="C9A6">Thoracotomie exploratrice  </option>
                                            <option value="C9C1">Résection d'un segment ou d’un lobe pulmonaire   </option>
                                            <option value="C9C3">Pneumonectomie élargie pour cancer avec curage ganglionnaire </option>
                                            <option value="C9C5">Exérèse de kyste hydatique par thoracotomie  </option>
                                            <option value="C9C6">Exérèse des malformations congénitales </option>
                                            <option value="C9D1">Décortication pleurale </option>
                                            <option value="C9D2">Drainage pleural </option>
                                            <option value="C9D3">Pleurectomie, pleurotomie ou pleurostomie  </option>
                                            <option value="C9D4">Pleuroscopie diagnostic ou thérapeutique </option>
                                            <option value="C9D5">Biopsie pleurale par thoracotomie ou thoracoscopie </option>
                                            <option value="C9F3">Traitement chirurgicale des lésions médiatisnales  </option>
                                          </select>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="form-group mb-2">
                                          <input type="date" name="date_acte[]" class="form-control">
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
                                  <button type="submit" name="save_multiple_data" class="btn btn-warning"><i class="fa fa-save"></i> Enregistrer</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary">
                      <h5 class="modal-title" id="exampleModalLabel">Suivie</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="Suivie_Nouveau" method="POST">
                      <?php   
                        $cosenas = new mysqli('localhost', 'root', '', 'spn');
                        $psenas = $cosenas->query("SELECT MAX(ids) AS id FROM suivie");
                        while($rowenas = mysqli_fetch_assoc($psenas)){
                            $senas = $rowenas["id"] + 1;
                      ?>
                      <input type="hidden" name="idh" value="<?php echo $ids; ?>">
                      <input type="hidden" name="ids" value="<?php echo $senas;} ?>">
                      <div class="modal-body">   
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Intitulé de suivie</label>
                              <textarea class="form-control" rows="3" name="intitule_suivie"></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Date : </label>
                              <input type="date" class="form-control" name="date_suivie">
                            </div>
                          </div> 
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input class="form-control bg-info" type="submit" name="enreg" value="OK">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <button class="form-control bg-warning" type="reset" name="reset"><i class="fas fa-file"></i> Annuler</button>
                            </div>
                          </div>     
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script>
    $(document).ready(function(){

      $(document).on('click', '.remove_btn', function(){
        $(this).closest('.main-form').remove();
      });

      $(document).on('click', '.add-more-form', function(){
        $('.paste-new-forms').append('<input type="hidden" name="idp[]" value="<?php echo $rowenha['idp']; ?>">\
                          <input type="hidden" name="idh[]" value="<?php echo $rowenha['idh'];} ?>"><div class="main-form mt-3 border-bottom"><table class="table  table-striped table-bordred table-hover">\
                            <tbody> \
                              <tr><tr><tr>\
          <td>\
            <div class="form-group mb-2">\
              <select class="form-control" name="intitule[]">\
                <option value="0">Selectionner</option>\
                <option value="10F">RM (réanimation d’indication médicale)  </option>\
                <option value="10G">RC (réanimation d’indication chirurgicale)  </option>\
                <option value="13D">Césarienne sous AG  </option>\
                <option value="13E">Césarienne sous Anesthésie loco-regionale </option>\
                <option value="13F">Hystérectomie voie basse  </option>\
                <option value="13G">Hystérectomie voie haute  </option>\
                <option value="C10K1">Ténotomie </option>\
                <option value="C10K2">Suture  </option>\
                <option value="C11B1">Biopsie rénale  </option>\
                <option value="C11B10">Pyélostomie  </option>\
                <option value="C11B2">Ponction ou Drainage d’une collection rénale ou péri-néphrétique  </option>\
                <option value="C11B4">Néphropexie </option>\
                <option value="C11B5">Néphrostomie  </option>\
                <option value="C11B6">Néphrectomie partielle  </option>\
                <option value="C11B9">Néphrectomie totale pour cancer </option>\
                <option value="C11C7">Chirurgie du reflux vésico-urétérale  </option>\
                <option value="C11D1">Cystostomie sus pubienne  </option>\
                <option value="C11D2">Cystectomie partielle ou totale </option>\
                <option value="C11D3">Chirurgie de la lithiase vésicale </option>\
                <option value="C11E1">Circoncision  </option>\
                <option value="C11E10">Urétrotomie interne ou externe </option>\
                <option value="C11E11">Urétroplastie  </option>\
                <option value="C11E12">Abcès, Phlegmon et Suppurations urétrales  </option>\
                <option value="C11E2">Phimosis et paraphimosis  </option>\
                <option value="C11E3">Hypospadias </option>\
                <option value="C11E4">Epispadias  </option>\
                <option value="C11E8">Méatotomie et Méatostomie </option>\
                <option value="C11E9">Dilatation urétrale au beniquet </option>\
                <option value="C11F1">Ponction biopsie de la prostate </option>\
                <option value="C11F2">Prostatectomie pour cancer  </option>\
                <option value="C11F3">Incision d\'un abcès de la prostate par voie périnéale </option>\
                <option value="C11G1">Biopsie testiculaire  </option>\
                <option value="C11G4">Cure d’hydrocèle  </option>\
                <option value="C11G5">Orchidectomie unilatérale ou castration </option>\
                <option value="C11G6">Orchidopexie  </option>\
                <option value="C1B1">Ponction péricardique  </option>\
                <option value="C1C2">Injection intra-artérielle </option>\
                <option value="C1C3">Abord vasculaire pour dialyse  </option>\
                <option value="C1C4">Suture et/ou ligature  </option>\
                <option value="C1C5">Dénudation veineuse  </option>\
                <option value="C1C6">Chirurgie des anévrysmes artériels </option>\
                <option value="C1C7">Chirurgie de la maladie thromboembolique veineuse et artérielle  </option>\
                <option value="C2B4">Gastrostomie d’alimentation  </option>\
                <option value="C2B5">Gastro-Entero-Anastomose </option>\
                <option value="C2C4">Chirurgie du diverticule de Meckel </option>\
                <option value="C2C5">Résection iléo-jéjunale  </option>\
                <option value="C2D1">Appendicectomie simple par Laparotomie </option>\
                <option value="C2D2">Appendicectomie simple par Laparoscopie  </option>\
                <option value="C2D3">Colostomie de décharge ou de dérivation  </option>\
                <option value="C2D8">Rétablissement de la continuité colique  </option>\
                <option value="C2E1">Chirurgie des hémorroïdes  </option>\
                <option value="C2E2">Chirurgie de la fissure anale  </option>\
                <option value="C2E4">Chirurgie des suppurations ano-périnéales chroniques   </option>\
                <option value="C2F11">Chirurgie des Voies Biliaires hors lithiase </option>\
                <option value="C2F3">Drainage d’un abcès du foie  </option>\
                <option value="C2F8">Cholécystectomie par laparotomie </option>\
                <option value="C2F9">Cholécystectomie par laparoscopie  </option>\
                <option value="C2H1">Chirurgie des hernies de l’aine, de l’ombilic, de la ligne blanche et éventrations </option>\
                <option value="C2H3">Traitement chirurgical des collections liquidiennes péritonéales </option>\
                <option value="C6A1">Réfection palpébrale traumatique </option>\
                <option value="C6A3">Chirurgie du chalazion, kyste palpébral  </option>\
                <option value="C6A5">Chirurgie du xanthélasma et du trichiasis  </option>\
                <option value="C6A6">Extraction d’un corps étranger de l’orbite </option>\
                <option value="C6C1">Ablation de pterygium,pingueculum  </option>\
                <option value="C6H1">Corps étrangers du segment antérieur </option>\
                <option value="C7A1A">Suture ou réfection simple du pavillon  </option>\
                <option value="C7A1D">Ablation simple d’une tumeur ou d’une chéloïde de l’oreille   </option>\
                <option value="C7A2A">Ablation de bouchon de cérumen uni ou bilatéral </option>\
                <option value="C7A2B">Ablation de corps étrangers </option>\
                <option value="C7B2K">Incision ou drainage d’une cellulite ou adénite génienne  </option>\
                <option value="C7B2L">Chirurgie des collections suppurées de la face  </option>\
                <option value="C7C10">Curage total  </option>\
                <option value="C7C12">Lobectomie thyroïdienne </option>\
                <option value="C7C13">Thyroïdectomie totale </option>\
                <option value="C7C14">Trachéotomie  </option>\
                <option value="C7C2">Curage sus claviculaire  </option>\
                <option value="C7C3">Drainage cervical  </option>\
                <option value="C7C4">Fistule cervicale  </option>\
                <option value="C7C6">Sous Maxillectomie </option>\
                <option value="C7C7">Parotidectomie superficielle </option>\
                <option value="C7C8">Parotidectomie totale  </option>\
                <option value="C7C9">Exerese glande sublinguale </option>\
                <option value="C7D1">Réfection partielle ou totale des lèvres traumatique ou tumorale </option>\
                <option value="C7G1">Adénoïdectomie </option>\
                <option value="C7G11">Amygdalectomie associé adénoïdectomie </option>\
                <option value="C7G3">Amygdalectomie par électrocoagulation  </option>\
                <option value="C8A1">Nettoyage ou pansement d\'une brûlure </option>\
                <option value="C8A2">Prélèvement simple de peau ou de muqueuse pour examen histologique </option>\
                <option value="C8A3">Suture secondaire d\'une plaie après avivement  </option>\
                <option value="C8B6">Correction d\'une bride rétractile par plastie en Z </option>\
                <option value="C9A1">Mise à plat ou drainage d’une collection pariétale (abcès, hématome, sérosité) </option>\
                <option value="C9A6">Thoracotomie exploratrice  </option>\
                <option value="C9C1">Résection d\'un segment ou d’un lobe pulmonaire   </option>\
                <option value="C9C3">Pneumonectomie élargie pour cancer avec curage ganglionnaire </option>\
                <option value="C9C5">Exérèse de kyste hydatique par thoracotomie  </option>\
                <option value="C9C6">Exérèse des malformations congénitales </option>\
                <option value="C9D1">Décortication pleurale </option>\
                <option value="C9D2">Drainage pleural </option>\
                <option value="C9D3">Pleurectomie, pleurotomie ou pleurostomie  </option>\
                <option value="C9D4">Pleuroscopie diagnostic ou thérapeutique </option>\
                <option value="C9D5">Biopsie pleurale par thoracotomie ou thoracoscopie </option>\
                <option value="C9F3">Traitement chirurgicale des lésions médiatisnales  </option>\
              </select>\
            </div>\
          </td>\
          <td>\
            <div class="form-group mb-2">\
              <input type="date" name="date_acte[]" class="form-control">\
            </div>\
          </td>\
          <td>\
            <div class="form-group mb-2">\
              <button type="button" class="remove_btn btn btn-danger"><i class="fa fa-trash"></i></button>\
            </div>\
          </td>\
        </tbody>\
      </table></div>');
      });
    });
  </script>
<!-- jQuery -->
<script>
  $(document).ready(function () {
      $('#ronno').DataTable();
  });
</script>

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