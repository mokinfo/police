<?php  require("tetecd.php");?>
<script src="js/sweetalert2"></script>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">  <?php //Ajout_consultation ?>
            <form class="form-horizontal" action="Ajout_consultation" method="post">
              <div class="row">
                <div class="col-sm-6">
                  <?php 
                    if(!empty($_GET['id'])) {
                      $ids = $_GET['id']; 
                      $conmod = new mysqli('localhost','root','','spn');
                      $pieces = $conmod->query("UPDATE entre SET statut = 'C' WHERE codepatient = '$ids'");
                      if (isset($pieces)) {
                        echo '<script>alert("Le Docteur est en consultation...")</script>';
                      }  
                      $cosens = new mysqli('localhost', 'root', '', 'spn');
                      $psens = $cosens->query("SELECT MAX(idcons) AS id FROM consult");
                      while($rowenso = mysqli_fetch_assoc($psens)){
                          $sens = $rowenso["id"] + 1;
                  ?>
                  <input type="hidden" name="idcons" value="<?php echo $sens;} ?>">
                  <?php  
                    $patientf = $DB->query("SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.datent, entre.statut, entre.codepatient, patient.idp, patient.nom, patient.age, patient.sex, patient.daten FROM patient, entre where entre.codepatient = patient.idp and entre.ident = '$ids'");
                    foreach ($patientf as $patienf):?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient  </label>
                        <div class="col-sm-10">
                          <input type="hidden" name="ident" value="<?php echo $patienf->ident; ?>" class="form-control">
                          <input type="hidden" name="idpa" value="<?php echo $patienf->idp; ?>" class="form-control">
                          <input type="text" name="nom" value="<?php echo $patienf->nom; ?>" class="form-control">
                        </div>
                      </div>
                      <input type="hidden" name="numed" value="<?php echo $_SESSION['iduser']; ?>">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Antécédents  </label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="ante"></textarea>
                      </div>
                    </div>  
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Âge  </label>
                    <div class="col-sm-8">
                    <input type="text" name="age" value="<?php echo $patienf->age; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  <?php // Assurez-vous de récupérer l'identifiant du médecin à partir de la table 'medecin'
                    /*$iduser = $_SESSION['iduser'];// Récupérez le nom du médecin depuis la variable appropriée
                    $connMedecin = new mysqli('localhost', 'root', '', 'spn');
                    $stmtMedecin = $connMedecin->prepare("SELECT medecin.idmed FROM medecin, utilisateur WHERE medecin.idmed = utilisateur.id and utilisateur.id = '$iduser'");*/
                  ?>
                  
                  
                    <!-- Afficher l'identifiant du médecin dans l'input -->
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Médecin</label>
                      <div class="col-sm-8">
                          <input type="text" name="med" value="<?php echo $_SESSION['iduser']; ?>" class="form-control" disabled>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Date  </label>
                    <div class="col-sm-8">
                      <?php $datedc = date("G:i"); ?>
                    <input type="text" name="datents" value="<?php echo $patienf->datent . "  " . $patienf->heura; ?>" class="form-control" disabled>
                    </div>
                    <input type="hidden" name="datent" value="<?php echo $patienf->datent; ?>">
                    <input type="hidden" name="datedc" value="<?php echo $datedc; ?>">
                  </div>
                </div>
                
              </div>
              <div class="col-lg-12 col-6">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Général</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-vial text-danger"> </i> Bilan</a>
                        </li><?php /* 
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-info-circle"></i> Informations</a>
                        </li> */?>
                      </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="motif" class="col-sm-12 col-form-label bg-info">Motif</label>
                                  <textarea id="motif" class="form-control" rows="3" name="motif" required><?php echo $patienf->motif; ?></textarea>
                                  <span id="motifError" class="text-danger"></span>
                                  
                                  <label for="diag" class="col-sm-12 col-form-label bg-danger">Hypothèse diagnostic</label>
                                  <textarea id="diag" class="form-control" rows="3" name="diag" required><?php 
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['diag'];}else{echo "";}?></textarea>
                                  <span id="diagError" class="text-danger"></span>
                                  
                                  <label for="trait" class="col-sm-12 col-form-label bg-info">Traitement</label>
                                  <textarea id="trait" class="form-control" rows="3" name="trait" required><?php 
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['trait'];}else{echo "";} ?></textarea>
                                  <label class="col-sm-12 col-form-label">Est-ce-que le patient a t'il une maladie à déclaration obligatoire (MDO) ou une maladie sous surveillance ?</label>
                                  <select id="traitsome" name="question" class="form-control">
                                    <option value="NON">NON</option>
                                    <option value="OUI">OUI</option>
                                  </select>
                                  <label id="maladi2" class="col-sm-12 col-form-label">Si oui laquelle ?</label>
                                  <select id="maladi" name="maladi" class="form-control">
                                    <option value="Choléra">Choléra</option>
                                    <option value="Chikungunya">Chikungunya</option>
                                    <option value="Covid-19">Covid-19</option>
                                    <option value="DS">Diarrhées Sanglantes</option>
                                    <option value="DAA">Diarrhées Aqueuses Aigue</option>
                                    <option value="Polio">Polio</option>
                                    <option value="SG">Syndrome Grippal</option>
                                    <option value="TN">Tétanos Néonatal</option>
                                    <option value="Paludisme">Paludisme</option>
                                    <option value="Rugeole">Rugeole</option>
                                    <option value="Méningite">Méningite</option>
                                    <option value="Dengue">Dengue</option>
                                  </select>
                                  <span id="traitsom" class="text-warning"></span>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="hist" class="col-sm-12 col-form-label bg-info">Historique</label>
                                  <textarea id="hist" class="form-control" rows="3" name="hist"><?php 
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['hist'];}else{echo "";} ?></textarea>
                                  
                                  <label for="para" class="col-sm-12 col-form-label bg-info">Paramètres</label>
                                  <textarea id="para" class="form-control" rows="3" name="para"><?php  
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['para'] ;}else{echo "";}?></textarea>
                                  
                                  <label for="exampc" class="col-sm-12 col-form-label bg-info">Examen Clinique</label>
                                  <textarea id="exampc" class="form-control" rows="3" name="exampc"><?php  
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['exampc'] ;}else{echo "";}?></textarea>
                                  
                                  <label for="note" class="col-sm-12 col-form-label bg-warning">Note</label>
                                  <textarea id="note" class="form-control" rows="3" name="note"><?php  
                                  if (isset($_SESSION['diag'])) {echo $_SESSION['note'] ;}else{echo "";}?></textarea>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Bilan biologique</label>
                              <!-- Trigger/Open The Modal -->
                              <a href="#" class="nav-link bg-light" data-toggle="modal" data-target="#exampleModal2" type="submit"><i class="fas fa-vial text-danger"> </i> Bilan biologique</a>
                              <textarea class="form-control text-dark" rows="3" name="examc"><?php
                                  $connl = new mysqli('localhost','root','','spn');
                                  $datest = $patienf->daten;
                                  $mysqli = $connl->query("SELECT * FROM andocs where identexam = '$ids'");
                                  while($rowens = $mysqli->fetch_array()){
                                      if ($rowens['fg'] == 1) {echo "Glycémie à jeun,";}else{echo "";}
                                      if ($rowens['rg'] == 1) {echo "Glycémie post prandiale ,";}else{echo "";}
                                      if ($rowens['hgpo'] == 1) {echo "Hyperglycémie provoquée par voie orale (HGPO),";}else{echo "";}
                                      if ($rowens['chol'] == 1) {echo "Cholestérol Total ,";}else{echo "";}
                                      if ($rowens['tc'] == 1) {echo "Triglycérides ,";}else{echo "";}
                                      if ($rowens['sgot'] == 1) {echo "ASAT,";}else{echo "";}
                                      if ($rowens['ldh'] == 1) {echo "LDH,";}else{echo "";}
                                      if ($rowens['sgptalt'] == 1) {echo "ALAT,";}else{echo "";}
                                      if ($rowens['urea'] == 1) {echo "Urée,";}else{echo "";}
                                      if ($rowens['crea'] == 1) {echo "Créatinine,";}else{echo "";}
                                      if ($rowens['ua'] == 1) {echo "Acide urique(Uricémie),";}else{echo "";}
                                      if ($rowens['alb'] == 1) {echo "Albumine ,";}else{echo "";}
                                      if ($rowens['br'] == 1) {echo "Bilirubine Totale ,";}else{echo "";}
                                      if ($rowens['brdi'] == 1) {echo "Bilirubine Conjuguée (Directe),";}else{echo "";}
                                      if ($rowens['alkphos'] == 1) {echo "Phosphatase Alcaline (PAL),";}else{echo "";}
                                      if ($rowens['calc'] == 1) {echo "Calcium,";}else{echo "";}
                                      if ($rowens['magn'] == 1) {echo "Magnésium,";}else{echo "";}
                                      if ($rowens['ptp'] == 1) {echo "Protéines Totales(Protidémie),";}else{echo "";}
                                      if ($rowens['gtt'] == 1) {echo "Gamma-Glutamyl-Tranférase (GGT),";}else{echo "";}
                                      if ($rowens['ioskna'] == 1) {echo "Ionogramme Sanguin (Na+, k+, Cl-) ,";}else{echo "";}
                                      if ($rowens['cbc'] == 1) {echo "NFS,";}else{echo "";}
                                      if ($rowens['abog'] == 1) {echo "Groupage sanguine (GSRh) ,";}else{echo "";}
                                      if ($rowens['ptaptt'] == 1) {echo "TP/TCK/INR,";}else{echo "";}
                                      if ($rowens['tpinr'] == 1) {echo "TP/INR,";}else{echo "";}
                                      if ($rowens['rbcm'] == 1) {echo "Frottis sanguin ,";}else{echo "";}
                                      if ($rowens['testemel'] == 1) {echo "Test d’Emmel,";}else{echo "";}
                                      if ($rowens['tauret'] == 1) {echo "Taux de réticulocytes ,";}else{echo "";}
                                      if ($rowens['esr'] == 1) {echo "Vitesse de sédimentation,";}else{echo "";}
                                      if ($rowens['urin'] == 1) {echo "ECBU ,";}else{echo "";}
                                      if ($rowens['stol'] == 1) {echo "Examen parasitologique des selles  (KAOP),";}else{echo "";}
                                      if ($rowens['urinbs'] == 1) {echo "ECBU+Culture ,";}else{echo "";}
                                      if ($rowens['sob'] == 1) {echo "Examen bactériologique des selles ,";}else{echo "";}
                                      if ($rowens['pus'] == 1) {echo "Pus,";}else{echo "";}
                                      if ($rowens['csfre'] == 1) {echo "LCR/CSF,";}else{echo "";}
                                      if ($rowens['pore'] == 1) {echo "Prélèvement d’oreille ,";}else{echo "";}
                                      if ($rowens['pgorg'] == 1) {echo "Prélèvement de Gorge,";}else{echo "";}
                                      if ($rowens['pvatb'] == 1) {echo "PV+ATB,";}else{echo "";}
                                      if ($rowens['pvatbrs'] == 1) {echo "PV+ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia),";}else{echo "";}
                                      if ($rowens['burin'] == 1) {echo "Bandelette urinaire,";}else{echo "";}
                                      if ($rowens['psa'] == 1) {echo "PSA,";}else{echo "";}
                                      if ($rowens['tsh'] == 1) {echo "TSH ,";}else{echo "";}
                                      if ($rowens['t3'] == 1) {echo "FT3 ,";}else{echo "";}
                                      if ($rowens['t4'] == 1) {echo "FT4 ,";}else{echo "";}
                                      if ($rowens['betahcg'] == 1) {echo "BETA HCG,";}else{echo "";}
                                      if ($rowens['acahbc'] == 1) {echo "AC ANTI HBC TOTAUX,";}else{echo "";}
                                      if ($rowens['ca125'] == 1) {echo "CA 125,";}else{echo "";}
                                      if ($rowens['ca19'] == 1) {echo "CA 19.9,";}else{echo "";}
                                      if ($rowens['testo'] == 1) {echo "TESTOSTERONE,";}else{echo "";}
                                      if ($rowens['tropo'] == 1) {echo "TROPONINE,";}else{echo "";}
                                      if ($rowens['dimeres'] == 1) {echo "DDIMERES,";}else{echo "";}
                                      if ($rowens['prl'] == 1) {echo "PROLACTINE ,";}else{echo "";}
                                      if ($rowens['fsh'] == 1) {echo "FSH,";}else{echo "";}
                                      if ($rowens['lh'] == 1) {echo "LH,";}else{echo "";}
                                      if ($rowens['hbsag'] == 1) {echo "Ag Hbs,";}else{echo "";}
                                      if ($rowens['hcvab'] == 1) {echo "Ac Anti HCV,";}else{echo "";}
                                      if ($rowens['hivab'] == 1) {echo "Ac anti  HIV,";}else{echo "";}
                                      if ($rowens['hbc'] == 1) {echo "HBC,";}else{echo "";}
                                      if ($rowens['crp'] == 1) {echo "CRP,";}else{echo "";}
                                      if ($rowens['facrhu'] == 1) {echo "FACTEUR RHUMATOIDE,";}else{echo "";}
                                      if ($rowens['aslo'] == 1) {echo "ASLO,";}else{echo "";}
                                      if ($rowens['vdrl'] == 1) {echo "SYPHILIS,";}else{echo "";}
                                      if ($rowens['hbpylo'] == 1) {echo "HELICOBACTER PYLORI (HP),";}else{echo "";}
                                      if ($rowens['toxo'] == 1) {echo "TOXOPLASMOSE,";}else{echo "";}
                                      if ($rowens['rub'] == 1) {echo "RUBEOLE,";}else{echo "";}
                                      if ($rowens['ge_fm'] == 1) {echo "GE/FM,";}else{echo "";}
                                  }
                                ?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label  for="inputEmail3" class="col-sm-12 col-form-label bg-info">Imagerie médicale</label>
                              <!-- Trigger/Open The Modal -->
                              <a href="#" class="nav-link bg-light" data-toggle="modal" data-target="#exampleModal3"><i class="fas fa-receipt text-black"> </i> Imagerie médicale</a>
                              <textarea class="form-control text-dark" rows="3" name="examd"><?php
                                  $connl = new mysqli('localhost','root','','spn');
                                  $datest = $patienf->daten;
                                  $mysqli = $connl->query("SELECT * FROM radiolo where identexam = '$ids'");
                                  while($rowens = $mysqli->fetch_array()){
                                      if ($rowens['radiox'] == 1) {echo "Radiographie,";}else{echo "";}
                                      if ($rowens['echo'] == 1) {echo "Echographie ,";}else{echo "";}
                                      if ($rowens['ecg'] == 1) {echo "ECG,";}else{echo "";}
                                  }
                                ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div><?php /*
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      </div> */?>
                    </div><?php endforeach;?>
                    <div class="table-responsive"> 
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <input class="form-control bg-warning" type="submit" name="suite" value="Suite ...">
                    </div>
                    <div class="form-group">
                      <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                    </div>
                  </div>
                </div>    
              </div> 
            </form>  
                <?php   
              }else{?>
          </div><!-- /.col -->  
        </div> 
          <?php 
            if (isset($_SESSION['statut'])) {
              ?>
                <h4 class="alert alert-success"><?php echo $_SESSION['statut']; ?></h4>
              <?php 
              unset($_SESSION['statut']);
            }
          ?>
          <div id="London" class="tabcontent">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-light">
                    <?php 
                        $conn = new mysqli('localhost', 'root', '', 'spn');
                        $sql = $conn->query("SELECT consult.idcons, consult.idpa, consult.datcons, consult.motif, consult.examc, consult.heurdc, consult.heurfc, consult.statcons, patient.nom, patient.civi, patient.sex FROM patient, consult where patient.idp = consult.idpa ORDER BY consult.heurdc ASC");
                      
                      $row_cnt = $sql->num_rows;
                    ?>
                    <h5 class="card-title">Nombre des consultations : <b><?php  echo($row_cnt); ?></b></h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table  table-striped table-bordred table-hover" id="jaktab">
                          <thead>
                            <tr>
                              <td></td>
                              <td>Date</td>
                              <td>Nom complet</td>
                              <td>Motif</td>
                              <td>Début</td>
                              <td>Fin</td>
                              <td>Etat</td>
                              <td>Action</td>
                            </tr>
                          </thead>
                          <tbody><?php 
                              while($data = $sql->fetch_array()){
                                if ($data['statcons'] == "A") {
                                  $fik = "<i class=\"fa fa-hourglass-half text-warning align-items-center\"></i> En attente";
                                }else if ($data['statcons'] == "F") {
                                  $fik = "<i class=\"fa fa-check-circle text-success align-items-center\"></i> Terminer";
                                }else{
                                  $fik = "<i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> En consultation";
                                }
                                if ($data['sex'] == "Féminin") {
                                  $sexe = "<i class=\"fa fa-female text-danger align-items-center\"></i>";
                                }else if ($data['sex'] == "Masculin") {
                                  $sexe = "<i class=\"fa fa-male text-primary align-items-center\"></i>";
                                }else{
                                  $sexe = "<i class=\"fa fa-user text-light align-items-center\"></i>";
                                }
                                echo '<tr>

                                  <td>'.$sexe.'</td>
                                  <td>'.$data['datcons'].'</td>
                                  <td>'.$data['civi'].' '.$data['nom'].'</td>
                                  <td>'.$data['motif'].'</td>
                                  <td>'.$data['heurdc'].'</td>
                                  <td>'.$data['heurfc'].'</td>
                                  <td>'.$fik.'</td>
                                  <td><a href="Affiche_Consultation?id=' . $data['idcons'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
            <?php
              }
              ?>      
            <?php /*  
            <i class="fas fa-user-plus fa-3x"></i> Nouveau Patient</a>*/
            ?>
        <div class="row mb-12">
          <div class="col-sm-12">
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <div class="col-sm-12">
                      <form action="examen.php" method="post"> 
                        <?php  

                            $cosexam = new mysqli('localhost', 'root', '', 'spn');
                            $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM andocs");
                            while($rowexam = mysqli_fetch_assoc($psexam)){
                              $sexam = $rowexam["id"] + 1;
                          ?>
                          <input type="hidden" name="idexam" value="<?php echo $sexam; ?>"> 
                          <input type="hidden" name="motiff" value="<?php echo $patienf->motif; ?>">
                          <input type="hidden" name="idpexam" value="<?php echo $patienf->idp; ?>">
                          <input type="hidden" name="identexam" value="<?php echo $patienf->ident; }?>">
                        <div class="card shadow mb-4">  
                          <div class="col-lg-12 col-6">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#biochimie" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-folder-open text-warning"></i> Biochimie </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#hematologie" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user text-danger"></i> Hématologie</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#microbiologie" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-search text-info"></i> Microbiologie</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="path-tab" data-toggle="tab" href="#hormone" role="tab" aria-controls="hormone" aria-selected="false"><i class="fas fa-heartbeat"></i> Hormonologie </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="path-tab" data-toggle="tab" href="#serologie" role="tab" aria-controls="serologie" aria-selected="false"><i class="fas fa-vial text-success"></i> Sérologie  </a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="biochimie" role="tabpanel" aria-labelledby="home-tab">
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
                              <div class="tab-pane fade" id="hematologie" role="tabpanel" aria-labelledby="profile-tab">
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
                                      <label class="col-sm-10 form-check-label">TP/TCK/INR</label>
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
                              <div class="tab-pane fade" id="microbiologie" role="tabpanel" aria-labelledby="contact-tab">
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

            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-light   ">
                    <h5 class="modal-title" id="exampleModalLabel">Imagerie médicale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12 bg-warning">
                        <form action="examenrd_cons.php" method="POST"> 
                        <?php  
                          $cosexam = new mysqli('localhost', 'root', '', 'spn');
                          $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM radiolo");
                          while($rowexam = mysqli_fetch_assoc($psexam)){
                            $sexam = $rowexam["id"] + 1;
                        ?>
                        <input type="hidden" name="idexam" value="<?php echo $sexam;} ?>"> 
                        <input type="hidden" name="motiff" value="<?php echo $patienf->motif; ?>">
                        <input type="hidden" name="idpexam" value="<?php echo $patienf->idp; ?>">
                        <input type="hidden" name="identexam" value="<?php echo $patienf->ident; ?>">
                      </div>
                      <div class="col-lg-12 col-6">
                        <div class="row">
                          <div class="col-sm-12 bg-info">
                            <div class="form-group">
                              <h2>Radiologie</h2>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group row">
                              <div class="col-sm-2">
                              <input type="checkbox" name="radio" value="1"  >
                              </div>
                              <label class="col-sm-10 form-check-label">  Radiographie </label>
                            </div>
                          </div>
                          <div class="col-sm-12 bg-info">
                            <div class="form-group">
                              <h2>Echographie</h2>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group row">
                              <div class="col-sm-2">
                              <input type="checkbox" name="echo" value="1"  >
                              </div>
                              <label class="col-sm-10 form-check-label">  Echographie  </label>
                            </div>
                          </div>
                          <div class="col-sm-12 bg-info">
                            <div class="form-group">
                              <h2>ECG</h2>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group row">
                              <div class="col-sm-2">
                              <input type="checkbox" name="ecg" value="1"  >
                              </div>
                              <label class="col-sm-10 form-check-label">  ECG </label>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-light">
                        <input type="submit" name="enreg" value="Sauvegarder">
                      </form>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div> 
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="card-header">
          Veuillez remplir le formulaire
          <span class="close">&times;</span>
      </div>
      <div class="card-footer">
        <button type="submit" name="Enregistrer" class="btn btn-primary">Enregistrer</button>
        <button type="submit" name="Annuler" class="btn btn-default float-right">Annuler</button>
      </div>
    </div>
  </div>   </div></div>
    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
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
<!-- jQuery -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  $(document).ready(function(){
    $('#maladi').hide();
    $('#maladi2').hide(); // Masquer le champ "maladi" au début
    $('#traitsome').change(function(){
        if($(this).val() == 'OUI') {
            $('#maladi2').show();
            $('#maladi').show();
        } else {
            $('#maladi').hide();
            $('#maladi2').hide();
        }
    });
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();

    $('form').submit(function(event) {
        let isValid = true;
        
        $('.form-control:required').each(function() {
            if ($(this).val().trim() === '') {
                $(this).css('border', '2px solid red');
                let errorId = $(this).attr('id') + 'Error';
                $('#' + errorId).text('Ce champ est obligatoire.');
                isValid = false;
            } else {
                $(this).css('border', '');
                let errorId = $(this).attr('id') + 'Error';
                $('#' + errorId).text('');
            }
        });

        if (!isValid) {
            event.preventDefault();
        }
    });
    
  });
</script><script>
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