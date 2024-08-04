<?php 
require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetecd.php");

  /*function total(){
    $total = 0;
    
      $pieces = $this->DB->query("SELECT idf, mt FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($pieces as  $piecex) {
      $total += $piecex->mt; 
    }
    return $total;
  }*/
  function toteles(){
    
    $piecesx = $this->DB->query("SELECT sum(mt) as totales FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($piecesx as  $piecex) {
        $totel = $piecex->totales;
    }
    return $totel;
  }
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid"><br>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <a href="#" style="text-decoration: none;">
            <!-- small box -->
            <div class="small-box bg-light" style="box-shadow: 5px 5px 10px 5px #1F618D;">
              <div class="inner">
                <center><b style="text-align:right; font-size: 30px; color: #1F618D;">CAISSE</b></center>
              </div>
            </div>
            </a>
          </div>


          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <!-- Afficher le message d'erreur s'il existe -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>
            <div id="London" class="tabcontent">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <?php 
                                    $datess = date("d/m/Y");
                                    /*$pieces = $DB->query("SELECT facture.idf, facture.desg, patient.idp, facture.datef, facture.etat, facture.mt, patient.nom, patient.civi FROM facture, patient where facture.idp = patient.idp and patient.catp = 'CIV' and facture.etat = 'IMPAYER' group by facture.datef");*/
                                    $pieces = $DB->query("SELECT facture.idf, facture.desg, facture.datef, facture.etat, facture.mt, patient.idp, patient.nom, patient.civi FROM facture INNER JOIN patient ON facture.idp = patient.idp WHERE patient.catp = 'CIV' AND facture.etat = 'IMPAYER'");
                                ?> 
                                <?php 
                                    $conn = new mysqli('localhost', 'root', '', 'spn');
                                    $sql = $conn->query("SELECT facture.idf, facture.desg, facture.datef, facture.etat, facture.mt, patient.idp, patient.nom, patient.civi FROM facture INNER JOIN patient ON facture.idp = patient.idp WHERE patient.catp = 'CIV' AND facture.etat = 'IMPAYER'");
                                    
                                    $row_cnt = $sql->num_rows;
                                ?>
                                <h5 class="card-title">Listes des actes impayés : <b><?php echo($row_cnt); ?></b></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table  table-striped table-bordered table-hover" id="jaktab">
                                            <thead>
                                              <tr>
                                                  <th> N° </th>
                                                  <th> Nom </th>
                                                  <th> Acte </th>
                                                  <th> Date </th>
                                                  <th> Etat </th>
                                                  <th> Action </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($pieces as $piece): ?>
                                                  <?php 
                                                      $idpr = $piece->idp;
                                                      $idff = $piece->idf;
                                                  ?>
                                                  <tr>
                                                      <td><?= htmlspecialchars($piece->idf) ?></td>
                                                      <td><?= htmlspecialchars($piece->civi . ' ' . $piece->nom) ?></td>
                                                      <td><?= htmlspecialchars($piece->desg) ?></td>
                                                      <td><?= htmlspecialchars($piece->datef) ?></td>
                                                      <td><?= htmlspecialchars($piece->etat) ?></td>
                                                      
                                                      <td>
                                                        <a href="caisse_envoie.php?id=<?= $piece->idf ?>" class='btn btn-primary btn-sm'><i class="fa fa-calculator align-items-center"></i></a>
                                                        <a href="Envoie_facture?id=<?= $piece->idf ?>"></a>
                                                        <?php 
                                                        $role = $_SESSION['role'];
                                                        if ($role == 8 or $role == 9) {?>
                                                            <a href="#" class="btn btn-danger btn-sm delete-facture" data-idfacture="<?= $idff ?>"><i class="fa fa-trash align-items-center"></i></a><?php 
                                                        }
                                                        ?>
                                                      </td>
                                                  </tr>
                                              <?php endforeach; ?>
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
          <!-- right col -->
        </div>
        <div class="modal fade" id="exampleModalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary   ">
                <h5 class="modal-title" id="exampleModalLabel">Caisse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              </div>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.delete-facture').forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        var factureId = this.getAttribute('data-idfacture');
                        
                        Swal.fire({
                            title: 'Êtes-vous sûr?',
                            text: "Cette action est irréversible!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Oui, supprimer!',
                            cancelButtonText: 'Annuler'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'delete_facture.php?id=' + factureId;
                            }
                        });
                    });
                });
            });
        </script>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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
<?php /* */?>
<!-- ./wrapper -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->


<!-- jQuery -->
<script>
  $(document).ready(function () {
      $('#jaktab').DataTable();
      $('#jaktal').DataTable();
  });
</script> <?php /*<script src="jquery.min.js"></script> */?>

<script src="popper.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('.view-details').click(function(){
            var idFacture = $(this).data('idfacture');
            $.ajax({
                url: 'get_facture_details.php',
                type: 'post',
                data: {id_facture: idFacture},
                success: function(response){
                    $('.modal-body').html(response);
                }
            });
        });
    });
</script>

<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
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
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
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
<script>

    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>
</body>
</html>
