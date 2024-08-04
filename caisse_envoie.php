<?php 
require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetecd.php");

?>

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
            <?php
            $idFacture = $_GET['id'];
             /* <form action="Nouvel_facture" method="POST"> */?>
                <form action="Facture_paiement" method="POST">
                  <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                      <?php 
                        $conxf = mysqli_connect("localhost","root","","spn");
                        $querysf = "SELECT MAX(codf) AS id FROM factures";
                        $query_runxf = mysqli_query($conxf, $querysf);

                        while($query_r = mysqli_fetch_assoc($query_runxf)){
                          $sexam = $query_r["id"] + 1;
                      ?>
                      <?php 
                      //$idpr = $_POST['idp'];?>
                      <input type="hidden" name="idf" value="<?php echo $sexam; ?>">
                      <p style="color: #7e8d9f;font-size: 20px;">Facture >> <strong>N°: #<?php echo $sexam; echo date("Y"); }?></strong></p>
                    </div>
                    <hr>
                  </div>
                  <div class="container">
                    <div class="col-md-12">
                      <div class="text-center">
                        
                      </div>
                    </div>
                    <?php 
                      $conx = mysqli_connect("localhost","root","","spn");
                      $querys = "SELECT patient.idp, patient.civi, patient.catp, patient.address, patient.tel, patient.nom, facture.idf FROM patient, facture where patient.idp = facture.idp and facture.idf = '$idFacture'";
                      $query_runx = mysqli_query($conx, $querys);
                    ?>

                    <div class="row">
                      <div class="col-xl-2">
                        <img src="police.png" width="70" height="70" style="color:#5d9fc5 ;">
                      </div>
                      <div class="col-xl-6">
                        <ul class="list-unstyled">
                          <?php foreach($query_runx as $rowx){ ?>
                            <input type="hidden" name="idp" value="<?php echo $rowx['idp']; $idpvar = $rowx['idp'];?>">
                            <li class="text-muted"><h4><b><span style="size: 18px; color:#5d9fc5;"><?php echo $rowx['civi'] ." ". $rowx['nom']; ?></span></b></h4></li>
                            <li class="text-muted"><?php 
                            if($rowx['catp'] == "CCC")
                              {$fik = "Choisir";}
                            elseif ($rowx['catp'] == "POA") {$fik = "Policier active";}
                            elseif ($rowx['catp'] == "POR") {$fik = "Policier rétraité";}
                            elseif ($rowx['catp'] == "CIV") {$fik = "Civile";}
                            elseif ($rowx['catp'] == "FPA") {$fik = "Famille Policier active";}
                            elseif ($data['too'] == "FPR") {$fik = "Famille Policier rétraité";}
                            elseif ($rowx['catp'] == "MIL") {$fik = "Militaire";}
                            elseif ($rowx['catp'] == "GEN") {$fik = "Gendarme";}
                            elseif ($rowx['catp'] == "GAR") {$fik = "Garde républicaine";}
                            elseif ($data['too'] == "GAC") {$fik = "Garde de côte";}  
                            echo $fik; ?></li>
                            <li class="text-muted"><?php echo $rowx['address']; ?></li>
                            <li class="text-muted"><i class="fas fa-phone"></i> <?php echo $rowx['tel']; ?></li>
                          <?php } ?>
                        </ul>
                      </div>
                      <?php 
                        $conxf = mysqli_connect("localhost","root","","spn");
                        $querysf = "SELECT MAX(codf) AS id FROM factures";
                        $query_runxf = mysqli_query($conxf, $querysf);

                        while($query_r = mysqli_fetch_assoc($query_runxf)){
                          $sexamf = $query_r["id"] + 1;
                      ?>
                      <input type="hidden" name="idf" value="<?php echo $sexamf; ?>">
                      <div class="col-xl-4">
                        <p class="text-muted"> </p>
                        <ul class="list-unstyled">
                          <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="fw-bold">ID:</span>#<?php echo $sexamf . '2023';} ?></li>
                          <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="fw-bold">Date de facture : </span><?php echo date("d-m-Y G:i"); ?></li>
                            <input type="hidden" name="datefacture" value="<?php echo date("d-m-Y G:i"); ?>">
                          <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                              class="me-1 fw-bold">Statut : </span><span class="badge bg-warning text-black fw-bold">
                              Impayer</span></li>
                        </ul>
                      </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                      <table class="table table-striped table-borderless">
                        <thead style="background-color:#84B0CA ;" class="text-white">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Montant</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $con = mysqli_connect("localhost","root","","spn");
                            
                            /*$from_date = $_POST['datedebut'];
                            $to_date = $_POST['datefin'];
                            $idp = $_POST['idp'];*/

                            $query = "SELECT * FROM facture WHERE idp = '$idpvar' and etat = 'IMPAYER'";
                            $query_run = mysqli_query($con, $query);
                            $montant_total= 0;
                            $montant_cnss_total = 0;
                            if(mysqli_num_rows($query_run) > 0)
                            {
                              $d = 0;
                              foreach($query_run as $row)
                              { 
                                $d += 1;
                                $montant_total += $row['mt'];
                                $montant_cnss_total += $row['mt_cnss'];
                                ?>
                                <tr>
                                  <td><?= $d; ?></td>
                                  <td><?= $row['desg']; ?></td>
                                  <td><?= $row['datef']; ?></td>
                                  <td><?= $row['mt']; ?></td>
                                </tr>
                                <?php
                              }
                            }
                            else
                            {
                              echo "No Record Found";
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col-xl-8">

                      </div>
                      <div class="col-xl-4">
                        <ul class="list-unstyled">
                          <li class="text-muted ms-3"><span class="text-black me-4">Total CNSS : </span><?php echo number_format($montant_cnss_total,2,',',' '). ' FDJ';?></li>

                        </ul>
                        <p class="text-black float-start"><span class="text-black me-3"> Montant total : </span><span
                            style="font-size: 25px;"> <?php echo number_format($montant_total,2,',',' '). ' FDJ';?></span></p>
                            <input type="hidden" name="mtt" value="<?php echo $montant_total; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-xl-10">
                      <a href="imprimer_caisse.php?id=<?php echo $idFacture; ?>" class="btn btn-primary"> <i class="fas fa-print text-white"></i> Imprimer</a>
                      <a class="btn btn-warning text-capitalize" data-mdb-ripple-color="dark" href="Facturation"><i
                          class="far fa-file-pdf text-danger"></i> Annuler</a>
                      </div>
                      <div class="col-xl-2">
                        <button class="btn btn-primary"
                           type="submit" name="charge" style="background-color:#60bdf3 ;"><i class="fas fa-money-bill"></i> Paiement
                         </button>
                      </div>
                    </div>
                  </div>
                </form>
            <?php /*</form> */?>
            </a>
          </div>


          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

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
