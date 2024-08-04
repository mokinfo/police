<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php"); 
require_once("includes/functions.php"); 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php $role = $_SESSION['role']; if ($role == 8) : ?>
            <div class="col-md-3 col-sm-6 col-12">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color: black;">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="nav-icon fas fa-vial  text-danger"></i></span>
                <?php 
                  $datess = date("d/m/Y");
                    $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.heurdexam, andocs.datexam, andocs.chk, andocs.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, andocs where andocs.idan = patient.idp and andocs.chk = 'NON'");
                  /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
                ?>
                <div class="info-box-content">

                  <span class="info-box-text">Nouvel examen</span>
                  <span class="info-box-number"><?php echo count($pieces); ?></span>
                </div>
              
                <!-- /.info-box-content -->
              </div></a>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <a href="Liste_Labo" class="nav-link" style="text-decoration: none; color: black;">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-list-alt"></i></span>
                <?php 
                    $conn = new mysqli('localhost', 'root', '', 'spn');
                    $sql = $conn->query("SELECT * FROM examens ORDER BY ide DESC");
                  
                  $row_cnt = $sql->num_rows;
                ?>
                <div class="info-box-content">
                  <span class="info-box-text">Listes des résultat</span>
                  <span class="info-box-number"><?php  echo($row_cnt); ?></span>
                </div>
                <!-- /.info-box-content -->
              </div></a>
              <!-- /.info-box -->
            </div>
          <?php elseif ($role == 1) : ?>
            <div class="col-md-3 col-sm-6 col-12">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color: black;">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="nav-icon fas fa-vial  text-danger"></i></span>
                <?php 
                  $datess = date("d/m/Y");
                    $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.heurdexam, andocs.datexam, andocs.chk, andocs.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, andocs where andocs.idan = patient.idp and andocs.chk = 'NON'");
                  /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
                ?>
                <div class="info-box-content">
                  <span class="info-box-text">Nouvel examen</span>
                  <span class="info-box-number"><?php echo count($pieces); ?></span>
                </div>
              
                <!-- /.info-box-content -->
              </div></a>
              <!-- /.info-box -->
            </div>
          <?php elseif ($role == 2) : ?>
            <div class="col-md-3 col-sm-6 col-12">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color: black;">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="nav-icon fas fa-vial  text-danger"></i></span>
                <?php 
                  $datess = date("d/m/Y");
                    $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.heurdexam, andocs.datexam, andocs.chk, andocs.motif, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.affect FROM patient, andocs where andocs.idan = patient.idp and andocs.chk = 'NON'");
                  /*$pieces = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.datent = '$datess' ORDER BY entre.num ASC");*/
                ?>
                <div class="info-box-content">
                  <span class="info-box-text">Nouvel examen</span>
                  <span class="info-box-number"><?php echo count($pieces); ?></span>
                </div>
              
                <!-- /.info-box-content -->
              </div></a>
              <!-- /.info-box -->
            </div>
          <?php endif; ?>
          
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            
            
            
              <div class="card">
                <div class="card-header bg-warning">
                  
                  <b><?php echo count($pieces); ?> patient(s) est en attente pour un examen</b>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table  table-striped table-bordred table-hover" id="jaktab" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th> N° </th>
                                <th> Nom complet </th>
                                <th> Agé de </th>
                                <th> Date & Heure </th>
                                <th> Affectation </th>
                                <th> Motif </th>
                                <?php $role = $_SESSION['role']; 
                                if ($role == 8) :?>
                                  <th> Action </th><?php 
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                  
                                endif; ?>
                                
                            </tr>
                        </thead>
                        <tbody>
                          <?php   
                            foreach ($pieces as $piece):
                              if($piece->idp & 1){
                                echo "<tr  bgcolor=\"#fff5e6\">";
                                if ($piece->sex == "Féminin") {
                                  echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                                }else if ($piece->sex == "Masculin") {
                                  echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                                }else{
                                  echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                                }
                                echo "<td>" . $piece->idp . "</td>";
                                echo "<td>" . $piece->civi ." ". $piece->nom . "</td>";
                                echo "<td>" . $piece->age . "</td>";
                                
                                /*echo "<td>" . $piece->heura . "</td>";
                                echo "<td>" . $piece->heurf . "</td>";*/
                                echo "<td>" . $piece->heurdexam . "</td>";
                                if ($piece->affect == "med") {
                                  echo "<td> Médecin</td>";
                                }else if ($piece->affect == "lab") {
                                  echo "<td> Laboratoire</td>";
                                }else{
                                  echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> Autre</td>";
                                }
                                echo "<td>" . $piece->motif . "</td>";
                                $role = $_SESSION['role']; 
                                if ($role == 8) :
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                  echo "<td><a href=\"Examen?id=" . $piece->idexam . "\"><i class=\"fa fa-eye  text-warning align-items-center\" ></i></a></tr>";
                                endif;
                              }
                              else{
                                echo "<tr>";
                                if ($piece->sex == "Féminin") {
                                  echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
                                }else if ($piece->sex == "Masculin") {
                                  echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
                                }else{
                                  echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
                                }
                                echo "<td>" . $piece->idp . "</td>";
                                echo "<td>" . $piece->civi ." ". $piece->nom . "</td>";
                                echo "<td>" . $piece->age . "</td>";
                                echo "<td>" . $piece->heurdexam . "</td>";
                                if ($piece->affect == "med") {
                                  echo "<td> Médecin</td>";
                                }else if ($piece->affect == "lab") {
                                  echo "<td> Laboratoire</td>";
                                }else{
                                  echo "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> Autre</td>";
                                }
                                echo "<td>" . $piece->motif . "</td>";
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                $role = $_SESSION['role']; 
                                if ($role == 8) :
                                /*echo "<td><a class=\"add addPanier\" href=\"analysis.php?id=" . $piece->idp . "\"><i class=\"fa fa-save\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-edit\"></i></a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href=\"delpatient.php?id=" . $piece->idp . "\"><i class=\"fa fa-trash\"></i></a></tr>";*/
                                  echo "<td><a href=\"Examen?id=" . $piece->idexam . "\"><i class=\"fa fa-eye  text-warning align-items-center\" ></i></a></tr>";
                                endif;
                              }
                              /*}
                              mysqli_free_result($res); */
                            endforeach;?>
                        </tbody>
                      </table>
                    </div>
                        <!-- /.col -->
                  </div>
                </div>
              </div>
          </div> 
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouvel examen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 bg-warning">
                      <form action="examendirect.php" method="post"> 
                        <?php  
                          $cosexam = new mysqli('localhost', 'root', '', 'spn');
                          $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM andocs");
                          while($rowexam = mysqli_fetch_assoc($psexam)){
                            $sexam = $rowexam["id"] + 1;
                        ?>
                        <input type="hidden" name="idexam" value="<?php echo $sexam; }?>">
                        <div class="form-group">
                          <label>Patient</label>
                          <div class="search_select_box">
                            <select class="w-100" data-live-search="true" name="idpatient" >
                                <?php  
                                  $patient = $DB->query("SELECT * FROM patient");
                                ?>
                                <option value="0">
                                  Nom du patient
                                </option>  
                                </thead>
                                <tbody>
                                <?php   
                                  foreach ($patient as $patien):?> 
                                    <option value="<?php  echo $patien->idp ; ?>">
                                      <?php 
                                        echo "<td>" . $patien->nom . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                        echo "<td>" . $patien->daten . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                        echo "<td>" . $patien->age . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                        echo "<td>" . $patien->tel . "</td>";
                                      ?>
                                    </option><?php 
                                  endforeach;?>
                                </tbody>
                              </table>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Motif</label>
                          <input type="text" class="form-control" name="motif" placeholder="Motif">
                        </div>
                        <?php $heura = date("G:i"); $heurf = date("G:i"); ?>
                        <input type="hidden" name="heura" value="<?php echo $heura; ?>">
                        <input type="hidden" name="heurf" value="<?php echo $heurf; ?>">
                        <div class="card shadow mb-4">  
                          <div class="col-lg-12 col-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-folder-open text-warning"></i> Biochimie </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user text-danger"></i> Hématologie</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-search text-info"></i> Microbiologie</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="path-tab" data-toggle="tab" href="#hormone" role="tab" aria-controls="hormone" aria-selected="false"><i class="fas fa-heartbeat"></i> Hormonologie </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="path-tab" data-toggle="tab" href="#serologie" role="tab" aria-controls="serologie" aria-selected="false"><i class="fas fa-vial text-success"></i> Sérologie  </a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <h2>Biochimie</h2>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
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
                                      <label class="col-sm-10 form-check-label">  Glycémie post prandiale  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="hgpo" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Hyperglycémie provoquée par voie orale (HGPO) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="chol" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label"> Cholestérol Total  </label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="c_hdl" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> C-HDL </label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="c_ldl" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> C-LDL </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="tc" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Triglycérides </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="sgot" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  SGOT (ASAT)  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ldh" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  LDH </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="sgptalt" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  SGPT (ALAT)  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="urea" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Urée  </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
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
                                      <label class="col-sm-10 form-check-label">  Acide urique (Uricémie) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="alb" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Albumine  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="br" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Bilirubine Totale   </label>
                                    </div>   
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="brdi" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Bilirubine Conjuguée (Directe)  </label>
                                    </div>
                                    <!-- Fer sérique -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="fer_serique" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Fer sérique </label>
                                    </div>

                                    <!-- Ferritine (Ferritinémie) -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ferritine" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Ferritine (Ferritinémie) </label>
                                    </div>

                                    <!-- Protéinurie de 24H -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="proteinurie_24h" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Protéinurie de 24H </label>
                                    </div>

                                    <!-- CK-MB -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ck_mb" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> CK-MB </label>
                                    </div>  
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="alkphos" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Phosphatase Alcaline (PAL) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="calc" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Calcium </label>
                                    </div>                        
                                  </div>
                                  <div class="col-sm-4"> 
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="magn" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Magnésium</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ptp" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Protéines Totales(Protidémie) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="gtt" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Gamma-Glutamyl-Tranférase (GGT) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ioskna" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Ionogramme Sanguin (Na+) Kaliémie.  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ioskk" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Ionogramme Sanguin (k+) Kaliémie.  </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ioskcl" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">  Ionogramme Sanguin (Cl-) Kaliémie.  </label>
                                    </div>
                                    <!-- Protéinurie -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="proteinurie" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Protéinurie </label>
                                    </div>
                                    <!-- Lipasémie -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="lipasemie" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Lipasémie </label>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <h2>Hématologie</h2>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="cbc" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">NFS Indices CBC/RBC</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="abog" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Groupage sanguin (GSRh) ABO </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ptaptt" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">TP/TCK/INR P.T/A.P.T.T</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="tpinr" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">TP/INR</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="rbcm" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Frottis sanguin RBC Morphologie </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="testemel" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Test d’Emmel</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="tauret" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Taux de réticulocytes </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="esr" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Vitesse de sédimentation E.S.R. </label>
                                    </div>
                                    <!-- GE/FM -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ge_fm" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> GE/FM </label>
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                  <div class="col-sm-12 bg-warning">
                                    <h2>Microbiologie</h2>
                                  </div>
                                  <div class="col-sm-7">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="urin" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">ECBU URINE RE </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="stol" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Examen parasitologique des selles  (KAOP)</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="urinbs" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">ECBU + Culture </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="sob" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Examen bactériologique des selles </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="pus" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Pus</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="csfre" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">LCR </label>
                                    </div>
                                    <!-- Coproculture -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="coproculture" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Coproculture </label>
                                    </div>

                                    <!-- Examen cytobactériologique des expectorations -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="cytobacterio_expectorations" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Examen cytobactériologique des expectorations (crachats) </label>
                                    </div>

                                    <!-- Liquide de ponction (ascite - pleural - péricardique - péritonéal) -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="liquide_ponction" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Liquide de ponction (ascite - pleural - péricardique - péritonéal) </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-5"> 
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="pore" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Prélèvement d’oreille </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="pgorg" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Prélèvement de Gorge </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="pvatb" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">PV + ATB</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="pvatbrs" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">PV+ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia)</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="burin" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Bandelette urinaire </label>
                                    </div>
                                    <!-- Recherche de Rota/Adénovirus dans les selles -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="recherche_rotadeno_selles" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Recherche de Rota/Adénovirus dans les selles </label>
                                    </div>

                                    <!-- Recherche Ag. H.pylori dans les selles -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="recherche_ag_h_pylori_selles" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Recherche Ag. H.pylori dans les selles </label>
                                    </div>

                                    <!-- Recherche HAV dans les selles -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="recherche_hav_selles" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Recherche HAV dans les selles </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="hormone" role="tabpanel" aria-labelledby="path-tab">
                                <div class="row">
                                  <div class="col-sm-12 bg-warning">
                                    <h2>Hormones</h2>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="psa" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">PSA</label>
                                    </div>
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
                                      <label class="col-sm-10 form-check-label">FT3 </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="t4" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">FT4 </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="betahcg" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">BETA HCG </label>
                                    </div>
                                    <!-- PSA free -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="psa_free" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> PSA free </label>
                                    </div>

                                    <!-- Progestérone -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="progestérone" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Progestérone </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="acahbc" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">AC ANTI HBC TOTAUX </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ca125" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">CA 125 </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="ca19" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">CA 19.9 </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="testo" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Testostérone </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="tropo" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Troponine </label>
                                    </div>
                                    <!-- Ac Anti Hbs -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ac_anti_hbs" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Ac Anti Hbs </label>
                                    </div>

                                    <!-- Œstradiol -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="oestradiol" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Œstradiol </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="dimeres" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">DDIMERES </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="prl" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">PROLACTINE </label>
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


                                    <!-- Ag Hbe -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ag_hbe" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Ag Hbe </label>
                                    </div>

                                    <!-- Ac Anti Hbe -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="ac_anti_hbe" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Ac Anti Hbe </label>
                                    </div>

                                    <!-- NT-proBNP -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="nt_proBNP" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> NT-proBNP </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="serologie" role="tabpanel" aria-labelledby="path-tab">
                                <div class="row">
                                  <div class="col-sm-12 bg-warning">
                                    <h2>Sérologie</h2>
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
                                      <label class="col-sm-10 form-check-label">Ac Anti HCV</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="hivab" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">Ac anti  HIV</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="hbc" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">HBC</label>
                                    </div>
                                    <!-- ASLO -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="aslo" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> ASLO </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="crp" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">CRP</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="facrhu" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">FACTEUR RHUMATOIDE</label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="vdrl" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">SYPHILIS </label>
                                    </div>
                                    <!-- HAV -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="hav" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> HAV </label>
                                    </div>
                                    <!-- Sérologie Typhoïde -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="serologie_typhoide" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Sérologie Typhoïde </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="hbpylo" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">HELICOBACTER PYLORI (HP) </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="toxo" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">TOXOPLASMOSE </label>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-2">
                                      <input type="checkbox" name="rub" value="1"  >
                                      </div>
                                      <label class="col-sm-10 form-check-label">RUBEOLE  </label>
                                    </div>

                                    <!-- Sérologie Brucellose -->
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <input type="checkbox" name="serologie_brucellose" value="1">
                                        </div>
                                        <label class="col-sm-10 form-check-label"> Sérologie Brucellose </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="table-responsive"> 
                            </div>
                          </div>
                        </div> 
                        
                        <div class="modal-footer">
                          <div class="form-group">
                            <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>
          <?php /* //Ajout d'un nouvau patient 
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-light   ">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Ajoutpatient" method="post">
                    <h1 class="display-4 text-left">Information général</h1>
                    <?php 
                      $coss = new mysqli('localhost', 'root', '', 'spn');
                      $pss = $coss->query("SELECT MAX(idp) AS id FROM patient");
                      while($rows = mysqli_fetch_assoc($pss)){
                          $ss = $rows["id"] + 1;
                    ?>
                    <input type="hidden" name="idp" value="<?php echo $ss;} ?>" class="form-control">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Nom complet</label>
                            <input type="text" class="form-control" name="nom" placeholder="Nom complet">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Civilité</label>
                            <select class="form-control" name="civi" id="civi" onchange="sexedef()">
                              <option value="0">Civilité</option>
                              <option value="M.">M.</option>
                              <option value="Mlle">Mlle</option>
                              <option value="Mme">Mme</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Date de naissance</label>
                            <input type="date" class="form-control" name="daten"  id="age" onkeyup="calculate_age()">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Âge"  id="calculated_age">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Sexe</label>
                            <input type="text" class="form-control" name="sex" placeholder="Sexe" id="sexe">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Situation familiale</label>
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
                          <label>Téléphone</label>
                          <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>*/?> 
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