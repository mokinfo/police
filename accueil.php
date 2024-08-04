<?php 
require_once("includes/session.php");
//require 'db.class.php';
//$DB = new DB();
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}

require_once("teteac.php"); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spn";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

$patients = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

$conn->close();
?>
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
<script>
        $(document).ready(function() {
          $('#patientTable').DataTable();
            function toggleFields() {
                var categorie = $('#cate').val();
                var possession = $('select[name="possession"]').val();

                if (categorie == 'POA' || categorie == 'POR' || categorie == 'FPA' || categorie == 'FPR') {
                    $('input[name="matricule"]').closest('.col-sm-4').removeClass('hidden');
                    $('input[name="matricule"]').attr('required', 'required');
                } else {
                    $('input[name="matricule"]').closest('.col-sm-4').addClass('hidden');
                    $('input[name="matricule"]').removeAttr('required');
                }

                if (possession == 'OUI') {
                    $('input[name="numcnss"]').closest('.col-sm-4').removeClass('hidden');
                    $('input[name="numcnss"]').attr('required', 'required');
                } else {
                    $('input[name="numcnss"]').closest('.col-sm-4').addClass('hidden');
                    $('input[name="numcnss"]').removeAttr('required');
                }
            }

            $('#cate').change(toggleFields);
            $('select[name="possession"]').change(toggleFields);

            toggleFields();

            $('input[name="matricule"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
            });

            $('input[name="numcnss"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);
            });


            // Validation avant soumission du formulaire
            $('form').on('submit', function(event) {
                var valid = true;

                // Vérification de la catégorie de patient
                var categorie = $('#cate').val();
                if (categorie === 'CCC') {
                    $('#cate').addClass('is-invalid');
                    valid = false;
                } else {
                    $('#cate').removeClass('is-invalid');
                }

                var possession = $('select[name="possession"]').val();
                if (possession === '0') {
                    $('select[name="possession"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('select[name="possession"]').removeClass('is-invalid');
                }

                var affect = $('select[name="affect"]').val();
                if (affect === '0') {
                    $('select[name="affect"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('select[name="affect"]').removeClass('is-invalid');
                }

                var sitfam = $('select[name="sitfam"]').val();
                if (sitfam === 'SF') {
                    $('select[name="sitfam"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('select[name="sitfam"]').removeClass('is-invalid');
                }

                var civi = $('select[name="civi"]').val();
                if (civi === '0') {
                    $('select[name="civi"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('select[name="civi"]').removeClass('is-invalid');
                }

                // Vérification du champ matricule
                var matricule = $('input[name="matricule"]').val();
                if ($('input[name="matricule"]').attr('required') && matricule.trim() === '') {
                    $('input[name="matricule"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('input[name="matricule"]').removeClass('is-invalid');
                }

                // Vérification du champ numéro CNSS
                var numcnss = $('input[name="numcnss"]').val();
                if ($('input[name="numcnss"]').attr('required') && numcnss.trim() === '') {
                    $('input[name="numcnss"]').addClass('is-invalid');
                    valid = false;
                } else {
                    $('input[name="numcnss"]').removeClass('is-invalid');
                }

                // Empêcher la soumission du formulaire si des champs obligatoires sont vides
                if (!valid) {
                    event.preventDefault();
                }
            });

            $('#patientTable').DataTable({
              "pageLength": 10,
              "lengthMenu": [
                  [10, 50, 100, 500, 1000, -1],
                  [10, 50, 100, 500, 1000, "Tout"]
              ],
              "paging": true,
              "pagingType": "full_numbers",
              "language": {
                  "sProcessing":    "Traitement en cours...",
                  "sSearch":        "Rechercher&nbsp;:",
                  "sLengthMenu":    "Afficher _MENU_ &eacute;l&eacute;ments",
                  "sInfo":          "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                  "sInfoEmpty":     "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                  "sInfoFiltered":  "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                  "sInfoPostFix":   "",
                  "sLoadingRecords": "Chargement en cours...",
                  "sZeroRecords":   "Aucun &eacute;l&eacute;ment &agrave; afficher",
                  "sEmptyTable":    "Aucune donn&eacute;e disponible dans le tableau",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
                  "oAria": {
                      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                  },
                  "select": {
                      "rows": {
                          "_": "%d lignes s&eacute;lectionn&eacute;es",
                          "0": "Aucune ligne s&eacute;lectionn&eacute;e",
                          "1": "1 ligne s&eacute;lectionn&eacute;e"
                      }
                  }
              }
          });
        });
    </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <div id="rosess">
              <?php $role = $_SESSION['role']; 
              $role_options = [
                  8 => [
                      'firstcare.png' => '#',
                      'liste.png' => 'Listeattente',
                      'dossier.png' => 'Dossier',
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'stat.png' => 'Statistique',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  1 => [
                      'firstcare.png' => '#', 
                      'liste.png' => 'Listeattente',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc_admission',
                      'imagerie.png' => 'Imageries',
                      'laboratory.png' => 'Laboratoire'
                  ],
                  2 => [
                      'firstcare.png' => '#',
                      'liste.png' => 'Listeattente',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'laboratory.png' => 'Laboratoire',
                      'caisse.png' => 'Caisse'
                  ],
                  3 => [
                      'liste.png' => 'Listeattente', 
                      'consult.png' => 'Consultation',
                      'dossier.png' => 'Dossier',
                      'ordonnance.png' => 'Ordonnances'
                  ],
                  4 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Listeattente', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  5 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  9 => [
                      'firstcare.png' => '#',
                      'liste.png' => 'Listeattente',
                      'dossier.png' => 'Dossier',
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  6 => [
                      'firstcare.png' => 'Listeattente', 
                      'liste.png' => 'Dossier', 
                      'consult.png' => 'Consultation',
                      'ordonnance.png' => 'Ordonnances',
                      'laboratory.png' => 'Laboratoire',
                      'hospitalisation.png' => 'Hosp_admission',
                      'bloc.png' => 'Bloc',
                      'imagerie.png' => 'Imageries',
                      'pharmacie.png' => 'pharmacy.php',
                      'users.png' => 'Gestion_utilisateur',
                      'journal.png' => 'Journal',
                      'facturation.png' => 'Facturation',
                      'caisse.png' => 'Caisse'
                  ],
                  // Ajoutez ici les autres rôles et leurs options
              ];
              if(array_key_exists($role, $role_options)) {
                foreach($role_options[$role] as $image => $link) {
                  if ($image == 'firstcare.png') {
                    echo "<a href=\"#\" class=\"w\" data-toggle=\"modal\" data-target=\"#exampleModal\"><img src=\"image/$image\" width=\"100\" height=\"100\"></a>";
                  } else {
                    echo "<a href=\"$link\" class=\"w\"><img src=\"image/$image\" width=\"100\" height=\"100\"></a>";
                  }
                }
              }

              /*if(array_key_exists($role, $role_options)) {
                foreach($role_options[$role] as $image => $link) {
                  echo "<a href=\"$link\" class=\"w\"><img src=\"image/$image\" width=\"100\" height=\"100\"></a>";
                }
              }*/
              ?>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="Ajoutpatient" method="post">  
                    <div class="modal-body">
                      <h1 class="display-4 text-left">Information général</h1>
                      <?php 
                        $coss = new mysqli('localhost', 'root', '', 'spn');
                        $pss = $coss->query("SELECT MAX(idp) AS id FROM patient");
                        $row = $pss->fetch_assoc();
                        $ss = $row['id'] + 1;
                      ?>
                      <input type="hidden" name="idp" value="<?php echo $ss; ?>" class="form-control">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Nom complet <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="nom" placeholder="Nom complet" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Civilité <b style="color: red">*</b></label>
                            <select class="form-control" name="civi" id="civi" onchange="sexedef()" required>
                              <option value="0">Civilité</option>
                              <option value="M.">M.</option>
                              <option value="Mlle">Mlle</option>
                              <option value="Mme">Mme</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Date de naissance <b style="color: red">*</b></label>
                            <input type="date" class="form-control" name="daten"  id="age" onkeyup="calculate_age()" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Age <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="age" placeholder="Âge"  id="calculated_age">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Sexe <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="sex" placeholder="Sexe" id="sexe" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Situation familiale <b style="color: red">*</b></label>
                            <select class="form-control" name="sitfam">
                              <option value="SF">Situation familiale</option>
                              <option value="Célibataire">Célibataire</option>
                              <option value="Marié">Marié</option>
                              <option value="Divorcé">Divorcé</option>
                              <option value="Veuf">Veuf</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <h1 class="display-4 text-left">Contact</h1>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Adresse</label>
                            <textarea class="form-control" rows="1" name="address" placeholder="Adresse"></textarea>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Téléphone <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="tel" placeholder="Téléphone" required>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
                      </div>
                      <style>
                        .hidden {
                          display: none;
                        }
                        .is-invalid {
                            border: 1px solid red;
                        }
                      </style>
                      <h1 class="display-4 text-left">Autres informations</h1>
                      <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Catégorie de patient <b style="color: red">*</b></label>
                                <select class="form-control" name="categorie" id="cate">
                                    <option value="CCC">--Choisir--</option>
                                    <option value="POA">Policier actif</option>
                                    <option value="POR">Policier retraité</option>
                                    <option value="CIV">Civile</option>
                                    <option value="FPA">Famille Policier actif</option>
                                    <option value="FPR">Famille Policier retraité</option>
                                    <option value="MIL">Militaire</option>
                                    <option value="GEN">Gendarme</option>
                                    <option value="GAR">Garde républicaine</option>
                                    <option value="GAC">Garde de côte</option>
                                    <option value="CAS">Cas Social</option>
                                    <option value="AGE">Agent entretien</option>
                                    <option value="FAE">Enfant agent entretien</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Possède-t-il une carte CNSS ? <b style="color: red">*</b></label>
                                <select class="form-control" name="possession">
                                    <option value="0">Carte CNSS</option>
                                    <option value="OUI">OUI</option>
                                    <option value="NON">NON</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 hidden">
                            <div class="form-group">
                                <label>Matricule <b style="color: red">*</b></label>
                                <input type="text" name="matricule" class="form-control" placeholder="Numéro de Matricule" maxlength="4">
                            </div>
                        </div>
                        <div class="col-sm-4 hidden">
                            <div class="form-group">
                                <label>Numéro CNSS <b style="color: red">*</b></label>
                                <input type="text" name="numcnss" class="form-control" placeholder="Numéro CNSS">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Affectation <b style="color: red">*</b></label>
                          <select class="form-control" name="affect">
                            <option value="0">Choisir le service</option>
                            <option value="med">Consultation</option>
                            <option value="urg">Urgence</option>
                            <option value="lab">Laboratoire</option>
                            <option value="hos">Hospitalisation</option>
                            <option value="img">Imagerie</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer bg-light">
                      <button type="submit" name="register" class="btn btn-primary">Enregistrer</button>
                      <button type="reset" class="btn btn-danger">Annuler</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card bg-light">
          <div class="inner">
            <center><b style="font-family:Candara; font-size: 20px;">Indicateurs</b></center>
          </div>
        </div>
        <div class="row">
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];
                ?>
                <h3 class="text-warning"><?php echo $sexam;} ?></h3>

                <p>Patients traités</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];
                ?>
                <h3 class="text-info"><?php if ($sexam > 0) { $o = $s/$sexam; $oss = $o * 100; echo number_format($oss, 1, '.', '');}else{echo"0";}} ?><sup style="color:black; font-size: 20px">%</sup></h3>

                <p>Corps de police</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];
                ?>
                <h3 class="text-success"><?php echo $sexam;} ?></h3>

                <p>Dossiers Enregistrés</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div><?php /*
              <a href="#" class="small-box-footer">Plus de détail <i class="fas fa-arrow-circle-right"></i></a> */?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient where catp = 'Civile' or catp = 'AC'");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexams = $rowexam["nbr"];
                ?>
                <h3 class="text-primary"><?php if ($sexam > 0) { $o = $sexams/$sexam; $oss = $o * 100; echo number_format($oss, 1, '.', '');}else{echo"0";}} ?><sup style="color:black; font-size: 20px">%</sup></h3>

                <p>Patients externes</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="card-title">Listes des patients</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 col-12 bg-white">
                <div class="col-lg-12 col-12">
                  <table id="patientTable" class="display">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nom</th>
                              <th>Civilité</th>
                              <th>Âge</th>
                              <th>Sexe</th>
                              <th>Situation Familiale</th>
                              <th>Téléphone</th>
                              <th>Email</th>
                              <th>Date d'Inscription</th>
                              <th>Catégorie</th>
                              <th>CNSS</th>
                              <th>Affectation</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($patients as $patient): ?>
                          <tr>
                              <td><?php echo $patient['idp']; ?></td>
                              <td><?php echo $patient['nom']; ?></td>
                              <td><?php echo $patient['civi']; ?></td>
                              <td><?php echo $patient['age']; ?></td>
                              <td><?php echo $patient['sex']; ?></td>
                              <td><?php echo $patient['sitfam']; ?></td>
                              <td><?php echo $patient['tel']; ?></td>
                              <td><?php echo $patient['email']; ?></td>
                              <td><?php echo $patient['dateinsp']; ?></td>
                              <td><?php echo $patient['catp']; ?></td>
                              <td><?php echo $patient['cnss']; ?></td>
                              <td><?php echo $patient['affect']; ?></td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div></div>
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
</div>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>