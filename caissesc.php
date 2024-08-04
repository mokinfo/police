<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}

require_once("tetef.php");

function toteles(){
    $piecesx = $this->DB->query("SELECT sum(mt) as totales FROM facture WHERE etat = 'IMPAYER'");
    foreach ($piecesx as  $piecex) {
        $totel = $piecex->totales;
    }
    return $totel;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DataTables Example</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#jaktab').DataTable({
                "order": [], // Permet de désactiver le tri initial
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/French.json" // Charge la traduction française
                }
            });
        });
    </script>
</head>
<body>
  <!-- Your existing HTML content -->
  <!-- ... -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid"><br>
        <div class="row">
          <div class="col-lg-12 col-6">
            <a href="#" style="text-decoration: none;">
              <div class="small-box bg-light" style="box-shadow: 5px 5px 10px 5px #1F618D;">
                <div class="inner">
                  <center><b style="text-align:right; font-size: 30px; color: #1F618D;">CAISSE</b></center>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php 
                        $datess = date("d/m/Y");
                        $pieces = $DB->query("SELECT facture.idf, facture.desg, patient.idp, facture.datef, facture.etat, facture.mt, patient.nom, patient.civi FROM facture, patient where facture.idp = patient.idp and facture.etat = 'IMPAYER' and facture.mt > 0 group by facture.datef");
                      ?> 
                      <?php 
                        $conn = new mysqli('localhost', 'root', '', 'spn');
                        $sql = $conn->query("SELECT facture.idf, facture.desg, facture.datef, facture.etat, facture.mt, patient.nom, patient.civi FROM facture, patient where facture.idp = patient.idp and facture.etat = 'IMPAYER' and facture.mt > 0 group by facture.datef");
                        
                        $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Listes des actes impayer : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktab">
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
                              <?php   
                                foreach ($pieces as $piece):
                                  $idpr = $piece->idp;
                                  $idff = $piece->idf;
                                  echo "<tr>";
                                  echo "<td>" . $piece->idf . "</td>";
                                  echo "<td>" . $piece->civi .' '. $piece->nom ."</td>";
                                  echo "<td>" . $piece->desg . "</td>";
                                  echo "<td>" . $piece->datef . "</td>";
                                  echo "<td>" . $piece->etat . "</td>";
                                  echo "<td><button class='btn btn-primary btn-sm view-details' data-idfacture='" . $idff . "' data-toggle='modal' data-target='#exampleModalc'><i class=\"fa fa-calculator align-items-center\" ></i></button>
                                  <a href=\"Envoie_facture?id=" . $piece->idf . "\"></a> <a href=\"#\" class=\"nav-link\" data-toggle=\"modal\" data-target=\"#exampleModalc \"></a></tr>";
                                endforeach;
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
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark"></aside>

  <div class="modal fade" id="exampleModalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="exampleModalLabel">Caisse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"></div>
      </div>
    </div>
  </div>

  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="plugins/sparklines/sparkline.js"></script>
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
</body>
</html>