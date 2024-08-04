<?php 
require_once("includes/session.php");
require 'db.class.php';
require_once("includes/db_connection.php");
require_once("includes/functions.php");

$DB = new DB();

if (!isset($_SESSION['user'])) {
    redirect_to("index.php");
}

require_once("tete.php");
?>

<!-- Inclure les fichiers CSS et JS de DataTables -->
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

<script>
function calculate_age() {
    var birthDate = new Date(document.getElementById("age").value);
    var today = new Date();
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById("calculated_age").value = age;
}

function sexedef() {
    var civility = document.getElementById("civi").value;
    var sex = "SEXE";
    if (civility === "M.") sex = "Masculin";
    else if (civility === "Mme" || civility === "Mlle") sex = "Féminin";
    document.getElementById("sexe").value = sex;
}

$(document).ready(function() {
    $('#jaktab').DataTable();
});
</script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-12">
                    <?php 
                    $currentDate = date("d/m/Y");
                    $query = "SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, 
                              patient.idp, patient.nom, patient.sex, patient.daten 
                              FROM patient, entre 
                              WHERE entre.codepatient = patient.idp 
                              AND entre.datent = '$currentDate' 
                              AND (entre.statut = 'C' OR entre.statut = 'B' OR entre.statut = 'P') 
                              ORDER BY entre.statut";
                    $patients = $DB->query($query);
                    ?>
                    
                    <div id="zonereq">
                        <?php echo count($patients); ?> patient(s) est en attente
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="jaktab" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>N°</th>
                                <th>Nom complet</th>
                                <th>Né(e) le</th>
                                <th>Statut</th>
                                <th>Arrivé à</th>
                                <th>Consultation</th>
                                <th>Docteur</th>
                                <th>Motif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patients as $patient):
                                switch ($patient->num_medecin) {
                                    case "GEN": $affectation = "Généraliste"; break;
                                    case "DEN": $affectation = "Dentiste"; break;
                                    case "CTC": $affectation = "Chirurgie thoracique cardiovasculaire"; break;
                                    case "OPH": $affectation = "Ophtalmologie"; break;
                                    case "CAN": $affectation = "Cancérologie"; break;
                                    case "ORL": $affectation = "ORL"; break;
                                    case "CAR": $affectation = "Cardiologie"; break;
                                    case "ORT": $affectation = "Orthopédie"; break;
                                    case "CHP": $affectation = "Chirurgie pédiatrique"; break;
                                    case "PED": $affectation = "Pédiatrie"; break;
                                    case "URO": $affectation = "Urologie"; break;
                                    case "NEU": $affectation = "Neurologie"; break;
                                    case "ANS": $affectation = "Anesthésie"; break;
                                    case "GYO": $affectation = "Gynécologie obstétrique"; break;
                                    case "CHG": $affectation = "Chirurgie générale"; break;
                                    case "GAS": $affectation = "Gastrologie"; break;
                                    case "HEM": $affectation = "Hématologie"; break;
                                    case "URG": $affectation = "Urgence"; break;
                                    default: $affectation = "Inconnu"; break;
                                }
                                $rowClass = ($patient->idp & 1) ? 'bgcolor="#fff5e6"' : '';
                                $sexIcon = $patient->sex === "Féminin" ? "fa-female text-danger" : ($patient->sex === "Masculin" ? "fa-male text-primary" : "fa-user text-light");
                                $statutIcon = $patient->statut === "A" ? "fa-hourglass-half text-warning" : ($patient->statut === "F" ? "fa-check-circle text-success" : "fa-arrow-circle-right text-primary");
                                ?>
                                <tr <?php echo $rowClass; ?>>
                                    <td><i class="fa <?php echo $sexIcon; ?>"></i></td>
                                    <td><?php echo $patient->num; ?></td>
                                    <td><?php echo $patient->nom; ?></td>
                                    <td><?php echo $patient->daten; ?></td>
                                    <td><i class="fa <?php echo $statutIcon; ?>"></i> <?php echo $patient->statut === "A" ? "En attente" : ($patient->statut === "F" ? "Terminé" : "En consultation"); ?></td>
                                    <td><?php echo $patient->heura; ?></td>
                                    <td><?php echo $patient->heurf; ?></td>
                                    <td><?php echo $affectation; ?></td>
                                    <td><?php echo $patient->motif; ?></td>
                                    <td>
                                        <a href="Ticket?id=<?php echo $patient->ident; ?>" target="_blank"><i class="fa fa-print"></i></a>
                                        <?php if ($_SESSION['role'] == 8): ?>
                                            &nbsp;&nbsp; | &nbsp;&nbsp;
                                            <a href="Consultation?id=<?php echo $patient->ident; ?>"><i class="fa fa-eye text-warning"></i></a>
                                            &nbsp;&nbsp; | &nbsp;&nbsp;
                                            <a href="Dossier?id=<?php echo $patient->idp; ?>"><i class="fa fa-folder-open text-success"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for new entry -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle entrée</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="nentree.php" method="post">
                        <?php
                        $result = $DB->query("SELECT MAX(ident) AS id FROM entre");
                        $nextId = $result ? $result[0]->id + 1 : 1;
                        ?>
                        <input type="hidden" name="ident" value="<?php echo $nextId; ?>">
                        <div class="form-group">
                            <label>Patient</label>
                            <div class="search_select_box">
                                <select class="w-100" data-live-search="true" name="idpatient" required>
                                    <option value="0">Liste de(s) patient(s)</option>
                                    <?php
                                    $patients = $DB->query("SELECT * FROM patient");
                                    foreach ($patients as $patient):
                                        $birthDate = new DateTime($patient->daten);
                                        $today = new DateTime();
                                        $age = $today->diff($birthDate)->y;
                                        echo "<option value='{$patient->idp}'>{$patient->nom} ({$patient->sex} - {$age} ans)</option>";
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Motif</label>
                            <input type="text" class="form-control" name="motif" required>
                        </div>
                        <div class="form-group">
                            <label>Affectation</label>
                            <select class="form-control" name="num_med" required>
                                <option value="GEN">Généraliste</option>
                                <option value="DEN">Dentiste</option>
                                <option value="CTC">Chirurgie thoracique cardiovasculaire</option>
                                <option value="OPH">Ophtalmologie</option>
                                <option value="CAN">Cancérologie</option>
                                <option value="ORL">ORL</option>
                                <option value="CAR">Cardiologie</option>
                                <option value="ORT">Orthopédie</option>
                                <option value="CHP">Chirurgie pédiatrique</option>
                                <option value="PED">Pédiatrie</option>
                                <option value="URO">Urologie</option>
                                <option value="NEU">Neurologie</option>
                                <option value="ANS">Anesthésie</option>
                                <option value="GYO">Gynécologie obstétrique</option>
                                <option value="CHG">Chirurgie générale</option>
                                <option value="GAS">Gastrologie</option>
                                <option value="HEM">Hématologie</option>
                                <option value="URG">Urgence</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nom du médecin</label>
                            <input type="text" class="form-control" name="nom_med" placeholder="Nom du médecin">
                        </div>
                        <input type="hidden" class="form-control" name="statut" value="C">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal for new entry -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle entrée</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="nentree.php" method="post">
                        <?php
                        $result = $DB->query("SELECT MAX(ident) AS id FROM entre");
                        $nextId = $result ? $result[0]->id + 1 : 1;
                        ?>
                        <input type="hidden" name="ident" value="<?php echo $nextId; ?>">
                        <div class="form-group">
                            <label>Patient</label>
                            <div class="search_select_box">
                                <select class="w-100" data-live-search="true" name="idpatient" required>
                                    <option value="0">Liste de(s) patient(s)</option>
                                    <?php
                                    $patients = $DB->query("SELECT * FROM patient");
                                    foreach ($patients as $patient):
                                    ?>
                                        <option value="<?php echo $patient->idp; ?>">
                                            <?php echo $patient->nom . " | " . $patient->daten . " | " . $patient->age . " | " . $patient->tel; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Motif</label>
                            <input type="text" class="form-control" name="motif" placeholder="Motif">
                        </div>
                        <div class="form-group">
                            <label>Consultation</label>
                            <select class="form-control" name="medecin" required>
                                <option value="0">-- type de médecin --</option>
                                <option value="GEN">Généraliste</option>
                                <option value="DEN">Dentiste</option>
                                <option value="CTC">Chirurgie thoracique cardiovasculaire</option>
                                <option value="OPH">Ophtalmologie</option>
                                <option value="CAN">Cancérologie</option>
                                <option value="ORL">ORL</option>
                                <option value="CAR">Cardiologie</option>
                                <option value="ORT">Orthopédie</option>
                                <option value="CHP">Chirurgie pédiatrique</option>
                                <option value="PED">Pédiatrie</option>
                                <option value="URO">Urologie</option>
                                <option value="NEU">Neurologie</option>
                                <option value="ANS">Anesthésie</option>
                                <option value="GYO">Gynécologie obstétrique</option>
                                <option value="CHG">Chirurgie générale</option>
                                <option value="GAS">Gastrologie</option>
                                <option value="HEM">Hématologie</option>
                                <option value="URG">Urgence</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nom du médecin</label>
                            <input type="text" class="form-control" name="nom_med" placeholder="Nom du médecin">
                        </div>
                        <input type="hidden" class="form-control" name="statut" value="C">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Other scripts -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.search_select_box select').selectpicker();
        });
    </script>
    <script>
  $(document).ready(function () {
      $('#ronno').DataTable();
      $('#donno').DataTable();
      $('#jaktab').DataTable();
      $('#jaktal').DataTable();
  });
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>

<script src="js/bootstrap-select.min.js"></script>

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