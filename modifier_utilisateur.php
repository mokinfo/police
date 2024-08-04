<?php 
require_once("includes/session.php");
?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color: black;">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="nav-icon fas fa-user-plus text-secondary"></i></span>
              <?php 
                $datess = date("d/m/Y");
                  $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.heurdexam, andocs.datexam, andocs.chk, andocs.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, andocs where andocs.idan = patient.idp and andocs.chk = 'NON'");
                /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
              ?>
              <div class="info-box-content">

                <span class="info-box-text">Nouveau</span>
                <span class="info-box-number">Utilisateur</span>
              </div>
            
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <a href="Ajouter_medecin" class="nav-link" style="text-decoration: none; color: black;">
              <style>
                .dodgerblue {
                    color: #3498db; /* Pour assurer une visibilité appropriée du texte sur le fond bleu */
                }
              </style>
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="nav-icon fas fa-user-md dodgerblue" ></i></span>
              <?php 
                $datess = date("d/m/Y");
                  $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.heurdexam, andocs.datexam, andocs.chk, andocs.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, andocs where andocs.idan = patient.idp and andocs.chk = 'NON'");
                /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
              ?>
              <div class="info-box-content">

                <span class="info-box-text dodgerblue">Nouveau</span>
                <span class="info-box-number ">Médecin</span>
              </div>
            
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      <div class="container-fluid">
        <div class="row mb-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success"> 
                        <b>Liste des utilisateurs du système</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover" id="jaktab" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>N°</th>
                                    <th>Nom complet</th>
                                    <th>Rôle</th>
                                    <th>Date & Heure</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql1 = $DB->query("SELECT * FROM utilisateur");
                                while($data1 = $sql1->fetch_array()){
                                    // Conversion du rôle en texte
                                    $role = get_role_text($data1['role']);
                                    // Conversion du statut en badge Bootstrap
                                    $badge_color = get_status_badge_color($data1['status']);
                                    $statut = get_status_text($data1['status']);
                                    ?>
                                    <tr>
                                        <td><img src="images/utilisateur/<?php echo $data1['file_name']; ?>" width="40" height="40" style="border-radius: 50%"></td>
                                        <td><?php echo $data1['id']; ?></td>
                                        <td><?php echo $data1['nom']; ?></td>
                                        <td><?php echo $role; ?></td>
                                        <td><?php echo $data1['uploaded_on']; ?></td>
                                        <td><span class="badge badge-<?php echo $badge_color; ?>"><?php echo $statut; ?></span></td>
                                        <td>
                                            <a href="modifier_utilisateur.php?id=<?php echo $data1['id']; ?>"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    function submitForm() {
        // Récupérer les valeurs des champs du formulaire
        var nom = document.getElementsByName('nom')[0].value;
        var specialite = document.getElementsByName('specialite')[0].value;
        var mail = document.getElementsByName('mail')[0].value;
        var tel = document.getElementsByName('tel')[0].value;

        // Envoyer les données au serveur avec AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajout_medecin.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Traitement de la réponse du serveur
                var response = JSON.parse(xhr.responseText);

                if (response.success) {
                    // Succès
                    Swal.fire({
                        icon: 'success',
                        title: 'Medecin ajouté avec succès!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Erreur - Medecin déjà présent dans la base
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Le medecin est déjà dans la base de données.',
                    });
                }
            }
        };
        xhr.send('nom=' + nom + '&specialite=' + specialite + '&mail=' + mail + '&tel=' + tel);

        // Empêcher la soumission du formulaire par défaut
        return false;
    }
  </script>
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