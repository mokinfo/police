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

                <span class="info-box-text dodgerblue">Liste des</span>
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
                      <?php 
                      $conn1 = new mysqli('localhost', 'root', '', 'spn');
                      $sql1 = $conn1->query('SELECT * FROM utilisateur');
                      $row_cnt1 = $sql1->num_rows;
                      ?>
                      <b>Liste des utilisateur(s) du système </b>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <table class="table table-striped table-bordered table-hover" id="jaktab" style="width:100%">
                                  <thead>
                                      <tr>
                                          <th>Photo</th>
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
                                      $conn1 = new mysqli('localhost', 'root', '', 'spn');
                                      if ($conn1->connect_error) {
                                          die("Connection failed: " . $conn1->connect_error);
                                      }
                                      $sql1 = $conn1->query('SELECT * FROM utilisateur');
                                      while ($data1 = $sql1->fetch_array()) {
                                          // Détermination du rôle
                                          $stat = "";
                                          switch ($data1['role']) {
                                              case 8: $stat = "Administrateur"; break;
                                              case 1: $stat = "Admission"; break;
                                              case 2: $stat = "Caisse"; break;
                                              case 3: $stat = "Médecin"; break;
                                              case 4: $stat = "Spécialiste"; break;
                                              case 5: $stat = "Laboratoire"; break;
                                              case 6: $stat = "Comptabilité"; break;
                                              case 7: $stat = "Sécretariat"; break;
                                              case 9: $stat = "Superviseur"; break;
                                              default: $stat = "Inconnu";
                                          }

                                          // Détermination du badge de statut
                                          $di = "";
                                          $si = "";
                                          switch ($data1['status']) {
                                              case 1: $di = "success"; $si = "Active"; break;
                                              case 2: $di = "danger"; $si = "Inactive"; break;
                                              default: $di = "warning"; $si = "Absent"; break;
                                          }

                                          echo '<tr>
                                                  <td><img src="images/utilisateur/'.$data1['file_name'].'" class="user-photo" width="40" height="40" style="border-radius: 50%"></td>
                                                  <td>'.$data1['id'].'</td>
                                                  <td>'.$data1['nom'].'</td>
                                                  <td>'.$stat.'</td>
                                                  <td>'.$data1['uploaded_on'].'</td>
                                                  <td class="project-state"><span class="badge badge-'.$di.'">'.$si.'</span></td>
                                                  <td>'.$data1['id'].'
                                                      <button type="button" class="btn btn-light btn-sm" onclick="afficherDetails('. $data1['id'].')">
                                                          <i class="fas fa-eye"></i> Voir détails
                                                      </button>
                                                      | <a href="#" class="btn btn-light btn-sm" onclick="confirmDelete(' . $data1['id'] . ')">
                                                          <i class="fas fa-trash-alt" style="color:red;"></i>
                                                      </a>
                                                  </td>
                                              </tr>';
                                      }
                                      $conn1->close();
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.col -->
                      </div>               
                  </div>

                  <!-- Modal Bootstrap pour les détails de l'utilisateur -->
                  <div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="modalDetailsLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalDetailsLabel"><b><span id="modalNom"></span></b></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div class="row">
                                      <div class="col-sm-4"><center>
                                          <img src="" id="modalPhoto" class="rounded-circle border border-success img-fluid mb-3" style="max-width: 300px;"></center>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="form-group">
                                              <span id="modalRole"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="modalDate">Date :</label>
                                              <span id="modalDate"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="modalEmail">Email :</label>
                                              <span id="modalEmail"></span>
                                          </div>
                                          <div class="form-group">
                                              <label for="modalTelephone">Téléphone :</label>
                                              <span id="modalTelephone"></span>
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div class="form-group">
                                              <label for="modalStatut">Statut :</label>
                                              <div id="modalStatut"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- ./card-body -->
                  <!-- /.card-footer -->

                  <script>
                      function confirmDelete(id) {
                          Swal.fire({
                              icon: 'warning',
                              title: 'Êtes-vous sûr?',
                              text: 'La suppression sera définitive!',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Oui, supprimer!',
                              cancelButtonText: 'Annuler'
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  $.ajax({
                                      url: 'delete_user.php',
                                      method: 'POST',
                                      data: { id: id },
                                      success: function(response) {
                                          Swal.fire('Supprimé!', 'L\'utilisateur a été supprimé.', 'success').then(() => {
                                              location.reload();
                                          });
                                      },
                                      error: function(xhr, status, error) {
                                          Swal.fire('Erreur!', 'Une erreur s\'est produite lors de la suppression de l\'utilisateur.', 'error');
                                      }
                                  });
                              }
                          });
                      }

                      function afficherDetails(idUtilisateur) {
                          $.ajax({
                              url: 'get_user_info.php',
                              method: 'POST',
                              dataType: 'json',
                              data: { id: idUtilisateur },
                              success: function(response) {
                                  $('#modalNom').text(response.nom);

                                  // Mise à jour du rôle en texte lisible
                                  switch (response.role) {
                                      case 8: $('#modalRole').text("Administrateur du système"); break;
                                      case 1: $('#modalRole').text("Responsable de l'admission"); break;
                                      case 2: $('#modalRole').text("Responsable de caisse"); break;
                                      case 3: $('#modalRole').text("Médecin"); break;
                                      case 4: $('#modalRole').text("Spécialiste"); break;
                                      case 5: $('#modalRole').text("Laboratoire"); break;
                                      case 6: $('#modalRole').text("Comptabilité"); break;
                                      case 7: $('#modalRole').text("Sécretariat"); break;
                                      case 9: $('#modalRole').text("Superviseur"); break;
                                      default: $('#modalRole').text("Inconnu");
                                  }

                                  // Détermination de l'image de statut
                                  var statutImage = '';
                                  if (response.statut == 1) {
                                      statutImage = '<img src="images/ok.jpg" style="max-width: 300px;">';
                                  } else if (response.statut == 2) {
                                      statutImage = '<img src="images/not_ok.png" style="max-width: 300px;">'; // Remplacez par l'image pour le statut 2 si nécessaire
                                  } else {
                                      statutImage = ''; // Pas d'image pour les autres statuts
                                  }

                                  console.log(response); // Pour débogage
                                  console.log('Statut: ' + response.statut); // Pour débogage

                                  $('#modalDate').text(response.date);
                                  $('#modalStatut').html(statutImage);
                                  $('#modalPhoto').attr('src', 'images/utilisateur/' + response.file_name);
                                  $('#modalEmail').text(response.email);
                                  $('#modalTelephone').text(response.tel);
                                  $('#modalDetails').modal('show');
                              },
                              error: function(xhr, status, error) {
                                  console.error('Erreur lors de la récupération des détails de l\'utilisateur:', error);
                              }
                          });
                      }
                  </script>
              </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouveau utilisateur</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header"> 
                          <?php 
                              $conn = new mysqli('localhost', 'root', '', 'spn');
                              $sql = $conn->query("SELECT count(id) AS id FROM utilisateur");
                              $s = 1; // Initialisez la variable $s à 1 avant la boucle
                              while($row = mysqli_fetch_assoc($sql)){
                                  $s = $row["id"] + 1;
                              }
                          ?>
                          <br>
                          <h3 class="card-title">Ajouter l'utilisateur numéro : <b>
                          </b></h3>
                        </div>
                        <form class="form-horizontal" action="ajout_user.php" method="POST" enctype="multipart/form-data">
                          <div class="card-body">
                            <div class="form-group row">
                              <input type="hidden" name="id" value="<?php echo $s; ?>" class="form-control" id="inputEmail3">
                            </div>
                            <div class="form-group row">
                              <label for="nom" class="col-sm-3 col-form-label">Nom Complet : </label>
                              <div class="col-sm-9">
                                <input type="text" name="nom" class="form-control" id="nom" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="user" class="col-sm-3 col-form-label">Utilisateur : </label>
                              <div class="col-sm-9">
                                <input type="text" name="user" class="form-control" id="user" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="pass" class="col-sm-3 col-form-label">Mot de passe : </label>
                              <div class="col-sm-9">
                                <input type="password" name="pass" class="form-control" id="pass" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="role" class="col-sm-3 col-form-label">Role : </label>
                              <div class="col-sm-9">
                                <select name="role" id="role" class="form-control" onchange="toggleMedecinFields()">
                                  <option value="0">--Rôle--</option>
                                  <option value="1">Admission</option>
                                  <option value="2">Caisse</option>
                                  <option value="3">Médecin</option>
                                  <option value="4">Spécialiste</option>
                                  <option value="5">Laboratoire</option>
                                  <option value="6">Comptabilité</option>
                                  <option value="7">Sécretariat</option>
                                  <option value="9">Superviseur</option>
                                  <option value="8">Administrateur</option>
                                </select>
                              </div>
                            </div>
                            <div id="medecinFields" style="display: none;">
                              <div class="form-group row">
                                <label for="specialite" class="col-sm-3 col-form-label">Spécialité : </label>
                                <div class="col-sm-9">
                                  <select name="specialite" class="form-control" id="specialite">
                                    <option value="0">-- Spécialité --</option>
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
                                    <option value="ANS">Anesthesie</option>
                                    <option value="GYO">Gynécologie obstétrique</option>
                                    <option value="CHG">Chirurgie générale</option>
                                    <option value="GAS">Gastrologie</option>
                                    <option value="HEM">Hématologie</option>
                                    <option value="URG">Urgence</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email : </label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" id="email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="tel" class="col-sm-3 col-form-label">Téléphone : </label>
                                <div class="col-sm-9">
                                  <input type="text" name="tel" class="form-control" id="tel">
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="userfile" class="col-sm-3 col-form-label">Photo : </label>
                              <div class="col-sm-9">
                                <input type="file" name="userfile" class="form-control" id="userfile">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="statut" class="col-sm-3 col-form-label">Statut : </label>
                              <div class="col-sm-9">
                                <select name="statut" id="statut" class="form-control">
                                  <option value="0">--Etat--</option>
                                  <option value="1">Active</option>
                                  <option value="2">Inactive</option>
                                </select>
                              </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" name="Enregistrer" class="btn btn-info">Enregistrer</button>
                              <button type="reset" name="Annuler" class="btn btn-default float-right">Annuler</button>
                            </div>
                          </div>
                        </form>
                        <!-- ./card-body -->
                        <script>
                          function toggleMedecinFields() {
                            const role = document.getElementById('role').value;
                            const medecinFields = document.getElementById('medecinFields');
                            if (role == 3) {
                              medecinFields.style.display = 'block';
                            } else {
                              medecinFields.style.display = 'none';
                            }
                          }
                        </script>
                        <!-- /.card-footer -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div> 
                </div>
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
</div></div>
<!-- ./wrapper -->

<!-- jQuery -->
<script>
  $(document).ready(function() {
    $('#jaktab').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
      }
    });
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



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>