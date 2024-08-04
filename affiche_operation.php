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
require_once("tetebloc.php");?>
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
            </div>*/ ?>
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
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php
                        if(!empty($_GET['id'])) {
                          $ids = $_GET['id'];  
                        }
                        $conn = new mysqli('localhost', 'root', '', 'spn');
                        $sql = $conn->query("SELECT operation.ido ,operation.idp ,operation.too, operation.opp, operation.assist, operation.anes, operation.mode_anes, operation.indic, operation.datedop, operation.heurdop, operation.heurfop, operation.datef, operation.statu, operation.mode_ann, operation.trans_sang, operation.posi_pat, operation.loo, operation.goo, operation.eff, operation.note, patient.nom, patient.civi, patient.sex, patient.age FROM patient, operation where patient.idp = operation.idp and operation.ido = '$ids' ORDER BY operation.ido ASC");
                        while($data = $sql->fetch_array()){
                      ?>
                      <h5 class="card-title">Opération numéro : <b><?php  echo $data['ido']; ?></b></h5><button type="button" class="close" ><a href="Compte_rendu_operation?id=<?php echo $data['ido']; ?>" style="text-align:center; text-decoration: none;" target="_blank"><i class="fas fa-file-pdf"></i> Compte-rendu Opératoire </a></button>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header bg-info">
                              <H4>Information générale</H3>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-8"> 
                          <div class="form-group">
                            <label>Nom du patient</label>
                            <input class="form-control" type="text" value="<?php  echo $data['nom']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Type d'opération</label>
                            <?php if ($data['too'] == "10F") {$fik = "RM (réanimation d’indication médicale)";}
                                  elseif ($data['too'] == "10G") {$fik = "RC (réanimation d’indication chirurgicale)";}
                                  elseif ($data['too'] == "13D") {$fik = "Césarienne sous AG";}
                                  elseif ($data['too'] == "13E") {$fik = "Césarienne sous Anesthésie loco-regionale";}
                                  elseif ($data['too'] == "13F") {$fik = "Hystérectomie voie basse";}
                                  elseif ($data['too'] == "13G") {$fik = "Hystérectomie voie haute";}
                                  elseif ($data['too'] == "C10K1") {$fik = "Ténotomie";}
                                  elseif ($data['too'] == "C10K2") {$fik = "Suture";}
                                  elseif ($data['too'] == "C11B1") {$fik = "Biopsie rénale";}
                                  elseif ($data['too'] == "C11B10") {$fik = "Pyélostomie";}
                                  elseif ($data['too'] == "C11B2") {$fik = "Ponction ou Drainage d’une collection rénale ou péri-néphrétique";}
                                  elseif ($data['too'] == "C11B4") {$fik = "Néphropexie";}
                                  elseif ($data['too'] == "C11B5") {$fik = "Néphrostomie ";}
                                  elseif ($data['too'] == "C11B6") {$fik = "Néphrectomie partielle ";}
                                  elseif ($data['too'] == "C11B9") {$fik = "Néphrectomie totale pour cancer";}
                                  elseif ($data['too'] == "C11C7") {$fik = "Chirurgie du reflux vésico-urétérale";}
                                  elseif ($data['too'] == "C11D1") {$fik = "Cystostomie sus pubienne";}
                                  elseif ($data['too'] == "C11D2") {$fik = "Cystectomie partielle ou totale";}
                                  elseif ($data['too'] == "C11D3") {$fik = "Chirurgie de la lithiase vésicale";}
                                  elseif ($data['too'] == "C11E1") {$fik = "Circoncision";}
                                  elseif ($data['too'] == "C11E10") {$fik = "Urétrotomie interne ou externe";}
                                  elseif ($data['too'] == "C11E11") {$fik = "Urétroplastie";}
                                  elseif ($data['too'] == "C11E12") {$fik = "Abcès Phlegmon et Suppurations urétrales ";}
                                  elseif ($data['too'] == "C11E2") {$fik = "Phimosis et paraphimosis";}
                                  elseif ($data['too'] == "C11E3") {$fik = "Hypospadias";}
                                  elseif ($data['too'] == "C11E4") {$fik = "Epispadias";}
                                  elseif ($data['too'] == "C11E8") {$fik = "Méatotomie et Méatostomie";}
                                  elseif ($data['too'] == "C11E9") {$fik = "Dilatation urétrale au beniquet";}
                                  elseif ($data['too'] == "C11F1") {$fik = "Ponction biopsie de la prostate";}
                                  elseif ($data['too'] == "C11F2") {$fik = "Prostatectomie pour cancer";}
                                  elseif ($data['too'] == "C11F3") {$fik = "Incision d'un abcès de la prostate par voie périnéale";}
                                  elseif ($data['too'] == "C11G1") {$fik = "Biopsie testiculaire";}
                                  elseif ($data['too'] == "C11G4") {$fik = "Cure d’hydrocèle";}
                                  elseif ($data['too'] == "C11G5") {$fik = "Orchidectomie unilatérale ou castration";}
                                  elseif ($data['too'] == "C11G6") {$fik = "Orchidopexie";}
                                  elseif ($data['too'] == "C1B1") {$fik = "Ponction péricardique";}
                                  elseif ($data['too'] == "C1C2") {$fik = "Injection intra-artérielle";}
                                  elseif ($data['too'] == "C1C3") {$fik = "Abord vasculaire pour dialyse";}
                                  elseif ($data['too'] == "C1C4") {$fik = "Suture et/ou ligature";}
                                  elseif ($data['too'] == "C1C5") {$fik = "Dénudation veineuse";}
                                  elseif ($data['too'] == "C1C6") {$fik = "Chirurgie des anévrysmes artériels";}
                                  elseif ($data['too'] == "C1C7") {$fik = "Chirurgie de la maladie thromboembolique veineuse et artérielle";}
                                  elseif ($data['too'] == "C2B4") {$fik = "Gastrostomie d’alimentation";}
                                  elseif ($data['too'] == "C2B5") {$fik = "Gastro-Entero-Anastomose";}
                                  elseif ($data['too'] == "C2C4") {$fik = "Chirurgie du diverticule de Meckel";}
                                  elseif ($data['too'] == "C2C5") {$fik = "Résection iléo-jéjunale ";}
                                  elseif ($data['too'] == "C2D1") {$fik = "Appendicectomie simple par Laparotomie";}
                                  elseif ($data['too'] == "C2D2") {$fik = "Appendicectomie simple par Laparoscopie ";}
                                  elseif ($data['too'] == "C2D3") {$fik = "Colostomie de décharge ou de dérivation";}
                                  elseif ($data['too'] == "C2D8") {$fik = "Rétablissement de la continuité colique";}
                                  elseif ($data['too'] == "C2E1") {$fik = "Chirurgie des hémorroïdes";}
                                  elseif ($data['too'] == "C2E2") {$fik = "Chirurgie de la fissure anale";}
                                  elseif ($data['too'] == "C2E4") {$fik = "Chirurgie des suppurations ano-périnéales chroniques ";}
                                  elseif ($data['too'] == "C2F11") {$fik = "Chirurgie des Voies Biliaires hors lithiase";}
                                  elseif ($data['too'] == "C2F3") {$fik = "Drainage d’un abcès du foie";}
                                  elseif ($data['too'] == "C2F8") {$fik = "Cholécystectomie par laparotomie";}
                                  elseif ($data['too'] == "C2F9") {$fik = "Cholécystectomie par laparoscopie";}
                                  elseif ($data['too'] == "C2H1") {$fik = "Chirurgie des hernies de l’aine, de l’ombilic, de la ligne blanche et éventrations,";}
                                  elseif ($data['too'] == "C2H3") {$fik = "Traitement chirurgical des collections liquidiennes péritonéales";}
                                  elseif ($data['too'] == "C6A1") {$fik = "Réfection palpébrale traumatique";}
                                  elseif ($data['too'] == "C6A3") {$fik = "Chirurgie du chalazion, kyste palpébral";}
                                  elseif ($data['too'] == "C6A5") {$fik = "Chirurgie du xanthélasma et du trichiasis";}
                                  elseif ($data['too'] == "C6A6") {$fik = "Extraction d’un corps étranger de l’orbite";}
                                  elseif ($data['too'] == "C6C1") {$fik = "Ablation de pterygium,pingueculum";}
                                  elseif ($data['too'] == "C6H1") {$fik = "Corps étrangers du segment antérieur";}
                                  elseif ($data['too'] == "C7A1A") {$fik = "Suture ou réfection simple du pavillon";}
                                  elseif ($data['too'] == "C7A1D") {$fik = "Ablation simple d’une tumeur ou d’une chéloïde de l’oreille ";}
                                  elseif ($data['too'] == "C7A2A") {$fik = "Ablation de bouchon de cérumen uni ou bilatéral";}
                                  elseif ($data['too'] == "C7A2B") {$fik = "Ablation de corps étrangers";}
                                  elseif ($data['too'] == "C7B2K") {$fik = "Incision ou drainage d’une cellulite ou adénite génienne";}
                                  elseif ($data['too'] == "C7B2L") {$fik = "Chirurgie des collections suppurées de la face";}
                                  elseif ($data['too'] == "C7C10") {$fik = "Curage total";}
                                  elseif ($data['too'] == "C7C12") {$fik = "Lobectomie thyroïdienne";}
                                  elseif ($data['too'] == "C7C13") {$fik = "Thyroïdectomie totale";}
                                  elseif ($data['too'] == "C7C14") {$fik = "Trachéotomie";}
                                  elseif ($data['too'] == "C7C2") {$fik = "Curage sus claviculaire";}
                                  elseif ($data['too'] == "C7C3") {$fik = "Drainage cervical";}
                                  elseif ($data['too'] == "C7C4") {$fik = "Fistule cervicale";}
                                  elseif ($data['too'] == "C7C6") {$fik = "Sous Maxillectomie";}
                                  elseif ($data['too'] == "C7C7") {$fik = "Parotidectomie superficielle";}
                                  elseif ($data['too'] == "C7C8") {$fik = "Parotidectomie totale";}
                                  elseif ($data['too'] == "C7C9") {$fik = "Exerese glande sublinguale";}
                                  elseif ($data['too'] == "C7D1") {$fik = "Réfection partielle ou totale des lèvres traumatique ou tumorale";}
                                  elseif ($data['too'] == "C7G1") {$fik = "Adénoïdectomie";}
                                  elseif ($data['too'] == "C7G11") {$fik = "Amygdalectomie associé adénoïdectomie";}
                                  elseif ($data['too'] == "C7G3") {$fik = "Amygdalectomie par électrocoagulation";}
                                  elseif ($data['too'] == "C8A1") {$fik = "Nettoyage ou pansement d\'une brûlure";}
                                  elseif ($data['too'] == "C8A2") {$fik = "Prélèvement simple de peau ou de muqueuse pour examen histologique";}
                                  elseif ($data['too'] == "C8A3") {$fik = "Suture secondaire d\'une plaie après avivement";}
                                  elseif ($data['too'] == "C8B6") {$fik = "Correction d\'une bride rétractile par plastie en Z";}
                                  elseif ($data['too'] == "C9A1") {$fik = "Mise à plat ou drainage d’une collection pariétale (abcès, hématome, sérosité)";}
                                  elseif ($data['too'] == "C9A6") {$fik = "Thoracotomie exploratrice ";}
                                  elseif ($data['too'] == "C9C1") {$fik = "Résection d\'un segment ou d’un lobe pulmonaire";}
                                  elseif ($data['too'] == "C9C3") {$fik = "Pneumonectomie élargie pour cancer avec curage ganglionnaire";}
                                  elseif ($data['too'] == "C9C5") {$fik = "Exérèse de kyste hydatique par thoracotomie";}
                                  elseif ($data['too'] == "C9C6") {$fik = "Exérèse des malformations congénitales";}
                                  elseif ($data['too'] == "C9D1") {$fik = "Décortication pleurale";}
                                  elseif ($data['too'] == "C9D2") {$fik = "Drainage pleural";}
                                  elseif ($data['too'] == "C9D3") {$fik = "Pleurectomie, pleurotomie ou pleurostomie";}
                                  elseif ($data['too'] == "C9D4") {$fik = "Pleuroscopie diagnostic ou thérapeutique";}
                                  elseif ($data['too'] == "C9D5") {$fik = "Biopsie pleurale par thoracotomie ou thoracoscopie";}
                                  elseif ($data['too'] == "C9F3") {$fik = "Traitement chirurgicale des lésions médiatisnales";}?>
                            <input class="form-control" type="text" value="<?php  echo $fik; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label>Opérateur</label>
                              <?php 
                              $oper = $data['opp'];
                              $pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
                              foreach ($pieces as $piece):
                                $oper_nom = $piece->nom;
                              endforeach; ?>
                              <input class="form-control" type="text" value="<?php  echo $oper_nom; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Assistant</label>
                            <input class="form-control" type="text" value="<?php  echo $data['assist']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label>Anesthésiste</label>
                              <?php 
                              $anes = $data['anes'];
                              $pieces = $DB->query("SELECT * FROM medecin where idmed = '$anes'");
                              foreach ($pieces as $piece):
                                $anes_nom = $piece->nom;
                              endforeach; ?>
                              <input class="form-control" type="text" value="<?php  echo $data['anes']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Mode d'anesthésie</label>
                            <?php ?>

                              <input class="form-control" type="text" value="<?php  echo $data['mode_anes']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header bg-info">
                              <H4>Opération</H3>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Indication</label>
                            
                              <input class="form-control" type="text" value="<?php  echo $data['indic']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Date/Heure début</label>
                              <input class="form-control" type="text" value="<?php  echo $data['heurdop']; echo ' - '.$data['datedop'] ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Date/Heure Fin</label>
                              <input class="form-control" type="text" value="<?php  echo $data['heurfop']; echo ' - '.$data['datedop'] ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Statut</label>
                              <input class="form-control" type="text" value="<?php  echo $data['statu']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Motif d'annulation</label>
                              <input class="form-control" type="text" value="<?php  echo $data['mode_ann']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header bg-info">
                              <H4>Déroulement</H3>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Transfert sanguine</label>
                              <input class="form-control" type="text" value="<?php  echo $data['trans_sang']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Position patient</label>
                              <input class="form-control" type="text" value="<?php  echo $data['posi_pat']; ?>" disabled>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Lésions observées</label>
                            <textarea class="form-control" name="loo" disabled><?php echo $data['loo'];  ?></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Gestes Opératoires</label>
                            <textarea class="form-control" name="goo" disabled><?php echo $data['goo'];  ?></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Etat final</label>
                            <textarea class="form-control" name="eff" disabled><?php echo $data['eff'];  ?></textarea>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Note</label>
                            <textarea class="form-control" name="loo" disabled><?php echo $data['note'];  }?></textarea>
                          </div>
                        </div>    
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