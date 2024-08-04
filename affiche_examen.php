<?php  require("tetecd.php");?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
            <form class="form-horizontal" action="Examen_envoie" method="post">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <div class="row">
                        <div class="col-sm-4">
                          <?php 
                            
                              $ids = $_GET['id']; 
                              /*$conmod = new mysqli('127.0.0.1:3307','root','','spn');
                              $pieces = $conmod->query("UPDATE entre SET statut = 'C' WHERE codepatient = '$ids'");
                              if (isset($pieces)) {
                                echo '<script>alert("Le Docteur est en consultation...")</script>';
                              } */                   
                            $pieces = $DB->query("SELECT andocs.idexam, andocs.idan, andocs.identexam, andocs.heurdexam, andocs.datexam, andocs.motif, andocs.fg, andocs.rg, andocs.hgpo, andocs.chol, andocs.tc, andocs.sgot, andocs.ldh, andocs.sgptalt, andocs.urea, andocs.crea, andocs.ua, andocs.alb, andocs.br, andocs.brdi, andocs.alkphos, andocs.calc, andocs.magn, andocs.ptp, andocs.gtt, andocs.ioskna, andocs.ioskk, andocs.ioskcl, andocs.cbc, andocs.abog, andocs.ptaptt, andocs.tpinr, andocs.rbcm, andocs.testemel, andocs.tauret, andocs.esr, andocs.urin, andocs.stol, andocs.urinbs, andocs.sob, andocs.pus, andocs.csfre, andocs.pore, andocs.pgorg, andocs.pvatb, andocs.pvatbrs, andocs.burin, andocs.psa, andocs.tsh, andocs.t3, andocs.t4, andocs.betahcg, andocs.acahbc, andocs.ca125, andocs.ca19, andocs.testo, andocs.tropo, andocs.dimeres, andocs.prl, andocs.fsh, andocs.lh, andocs.hbsag, andocs.hcvab, andocs.hivab, andocs.hbc, andocs.crp, andocs.facrhu, andocs.aslo, andocs.vdrl, andocs.hbpylo, andocs.toxo, andocs.rub, andocs.pandoc, andocs.pcandoc, andocs.chk, andocs.c_hdl, andocs.c_ldl, andocs.proteinurie, andocs.fer_serique, andocs.ferritine, andocs.proteinurie_24h, andocs.ck_mb, andocs.lipasemie, andocs.ge_fm, andocs.coproculture, andocs.cytobacterio_expectorations, andocs.liquide_ponction, andocs.recherche_rotadeno_selles, andocs.recherche_ag_h_pylori_selles, andocs.recherche_hav_selles, andocs.psa_free, andocs.progestérone, andocs.ac_anti_hbs, andocs.oestradiol, andocs.ag_hbe, andocs.ac_anti_hbe, andocs.nt_proBNP, andocs.hav, andocs.serologie_typhoide, andocs.serologie_brucellose, patient.idp, patient.nom, patient.sex, patient.age, patient.tel, patient.address FROM patient, andocs where andocs.idan = patient.idp and andocs.idexam = '$ids'");
                          foreach ($pieces as $piece):?>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">Patient  </label>
                              <div class="col-sm-8">
                                <input type="hidden" name="idexam" value="<?php echo $piece->idexam; ?>"> 
                                <input type="hidden" name="idpa" value="<?php echo $piece->idp; ?>" class="form-control">
                                <input type="text"  class="form-control" name="nom" value="<?php echo $piece->nom; ?>" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Sexe : </label>
                            <div class="col-sm-7">
                              <input type="text"  class="form-control" name="sex" value="<?php echo $piece->sex; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Âge :  </label>
                            <div class="col-sm-6">
                              <input type="text"  class="form-control" name="age" value="<?php echo $piece->age; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-5 col-form-label">Date d'examen :  </label>
                              <div class="col-sm-7">
                                <input type="text"  class="form-control" name="datexam" value="<?php echo $piece->datexam; ?>" class="form-control" disabled>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="col-sm-12">
                        <div class="form-group row">
                          <input type="hidden" name="tel" value="<?php echo $piece->tel ?>">
                          <input type="hidden" name="adresse" value="<?php echo $piece->address; ?>"> 
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Examen</th>
                                <th scope="col"></th>
                                <th scope="col">Résultat</th>
                                <th scope="col">Intervalle</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if($piece->fg > 0){ ?><tr class="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fg > 0){ ?>  <?php echo("Glycémie à jeun : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>" name="fg"></td><td><?php if($piece->fg > 0){echo "0.70 - 1.10 g/l";} ?></td></tr><?php }?>
                              <?php if($piece->rg > 0){ ?><tr class="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rg > 0){ ?>  <?php echo("Glycémie post prandiale  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>" name="rg"></td><td><?php if($piece->rg > 0){echo "0.70 - 1.40 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->hgpo > 0){ ?><tr class="<?php if($piece->hgpo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hgpo > 0){ ?>  <?php echo("Hyperglycémie provoquée par voie orale (HGPO) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hgpo > 0){ echo("text"); }else{echo("hidden");} ?>" name="hgpo"></td><td><?php if($piece->hgpo > 0){echo "Glycémie à jeun : 5.1 mmol/L (0.92 g/L). - Glycémie à 1h : 10 mmol/L (1.80 g/L). - Glycémie à 2h : 8.5 mmol/L (1.53g/L).";} ?></td></tr><?php } ?>
                              <?php if($piece->chol > 0){ ?><tr class="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->chol > 0){ ?>  <?php echo("Cholestérol Total  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>" name="chol"></td><td><?php if($piece->chol > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>

                              <?php if($piece->c_hdl > 0){ ?><tr class="<?php if($piece->c_hdl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->c_hdl > 0){ ?>  <?php echo("C-HDL : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->c_hdl > 0){ echo("text"); }else{echo("hidden");} ?>" name="c_hdl"></td><td><?php if($piece->c_hdl > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->c_ldl > 0){ ?><tr class="<?php if($piece->c_ldl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->c_ldl > 0){ ?>  <?php echo("C-LDL  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->c_ldl > 0){ echo("text"); }else{echo("hidden");} ?>" name="c_ldl"></td><td><?php if($piece->c_ldl > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>


                              <?php if($piece->tc > 0){ ?><tr class="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tc > 0){ ?>  <?php echo("Triglycérides  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>" name="tc"></td><td><?php if($piece->tc > 0){echo "0.55 - 1.65 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->sgot > 0){ ?><tr class="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->sgot > 0){ ?>  <?php echo("ASAT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>" name="sgot"></td><td><?php if($piece->sgot > 0){echo "<35 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ldh > 0){ ?><tr class="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ldh > 0){ ?>  <?php echo("LDH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>" name="ldh"></td><td><?php if($piece->ldh > 0){echo "0.12 - 0.94 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->sgptalt > 0){ ?><tr class="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->sgptalt > 0){ ?>  <?php echo("ALAT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>" name="sgptalt"></td><td><?php if($piece->sgptalt > 0){echo "<40 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->urea > 0){ ?><tr class="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urea > 0){ ?>  <?php echo("Urée : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>" name="urea"></td><td><?php if($piece->urea > 0){echo "0.15 - 0.45 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->crea > 0){ ?><tr class="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->crea > 0){ ?>  <?php echo("Créatinine : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>" name="crea"></td><td><?php if($piece->crea > 0){echo "6 - 13 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ua > 0){ ?><tr class="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ua > 0){ ?>  <?php echo("Acide urique(Uricémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>" name="ua"></td><td><?php if($piece->ua > 0){echo "22 - 77 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->alb > 0){ ?><tr class="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->alb > 0){ ?>  <?php echo("Albumine  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>" name="alb"></td><td><?php if($piece->alb > 0){echo "34 - 54 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->br > 0){ ?><tr class="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->br > 0){ ?>  <?php echo("Bilirubine Totale  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>" name="br"></td><td><?php if($piece->br > 0){echo "2 - 13 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->brdi > 0){ ?><tr class="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->brdi > 0){ ?>  <?php echo("Bilirubine Conjuguée (Directe) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>" name="brdi"></td><td><?php if($piece->brdi > 0){echo "0 - 3 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->alkphos > 0){ ?><tr class="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->alkphos > 0){ ?>  <?php echo("Phosphatase Alcaline (PAL) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>" name="alkphos"></td><td><?php if($piece->alkphos > 0){echo "Adultes 40 – 129 U/l (hommes) – 35 – 104 U/l (femmes)";} ?></td></tr><?php } ?>
                              <?php if($piece->calc > 0){ ?><tr class="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->calc > 0){ ?>  <?php echo("Calcium : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>" name="calc"></td><td><?php if($piece->calc > 0){echo "2.20 - 2.60 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->magn > 0){ ?><tr class="<?php if($piece->magn > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->magn > 0){ ?>  <?php echo("Magnésium : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->magn > 0){ echo("text"); }else{echo("hidden");} ?>" name="magn"></td><td><?php if($piece->magn > 0){echo "0.7 - 1.1 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ptp > 0){ ?><tr class="<?php if($piece->ptp > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ptp > 0){ ?>  <?php echo("Protéines Totales(Protidémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ptp > 0){ echo("text"); }else{echo("hidden");} ?>" name="ptp"></td><td><?php if($piece->ptp > 0){echo "65 - 80 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->gtt > 0){ ?><tr class="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->gtt > 0){ ?>  <?php echo("Gamma-Glutamyl-Tranférase (GGT) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>" name="gtt"></td><td><?php if($piece->gtt > 0){echo "37 - 45 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskna > 0){ ?><tr class="<?php if($piece->ioskna > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskna > 0){ ?>  <?php echo("Ionogramme Sanguin (Na+, k+, Cl-)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskna > 0){ echo("text"); }else{echo("hidden");} ?>" name="ioskna"></td><td><?php if($piece->ioskna > 0){echo "135 - 145 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskk > 0){ ?><tr class="<?php if($piece->ioskk > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskk > 0){ ?>  <?php echo("Ionogramme Sanguin (k+)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskk > 0){ echo("text"); }else{echo("hidden");} ?>" name="ioskk"></td><td><?php if($piece->ioskk > 0){echo "3,5 - 5,00 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskcl > 0){ ?><tr class="<?php if($piece->ioskcl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskcl > 0){ ?>  <?php echo("Ionogramme Sanguin (Cl-)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskcl > 0){ echo("text"); }else{echo("hidden");} ?>" name="ioskcl"></td><td><?php if($piece->ioskcl > 0){echo "97 - 107 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->proteinurie > 0){ ?><tr class="<?php if($piece->proteinurie > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->proteinurie > 0){ ?>  <?php echo("Protéinurie  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->proteinurie > 0){ echo("text"); }else{echo("hidden");} ?>" name="proteinurie"></td><td><?php if($piece->proteinurie > 0){echo "28 - 141 mg/24H";} ?></td></tr><?php } ?>
                              <?php if($piece->fer_serique > 0){ ?><tr class="<?php if($piece->fer_serique > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fer_serique > 0){ ?>  <?php echo("Fer sérique : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fer_serique > 0){ echo("text"); }else{echo("hidden");} ?>" name="fer_serique"></td><td><?php if($piece->fer_serique > 0){echo "8.1 - 28.3 umol/l (hommes) – 6.6 - 26.0 umol/l (femmes)";} ?></td></tr><?php } ?>
                              <?php if($piece->ferritine > 0){ ?><tr class="<?php if($piece->ferritine > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ferritine > 0){ ?>  <?php echo("Ferritine (Ferritinémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ferritine > 0){ echo("text"); }else{echo("hidden");} ?>" name="ferritine"></td><td><?php if($piece->ferritine > 0){echo "chez l’homme adulte : 20 à 200 µg/l; Chez la femme adulte avant la ménopause : 10 à 125 µg/l ; après la ménopause : 20 à 200 µg/l; Chef l'enfant entre 15 - 600 ug/l";} ?></td></tr><?php } ?>
                              <?php if($piece->proteinurie_24h > 0){ ?><tr class="<?php if($piece->proteinurie_24h > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->proteinurie_24h > 0){ ?>  <?php echo("Protéinurie de 24H : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->proteinurie_24h > 0){ echo("text"); }else{echo("hidden");} ?>" name="proteinurie_24h"></td><td><?php if($piece->proteinurie_24h > 0){echo "28 - 141 mg/24H";} ?></td></tr><?php } ?>
                              <?php if($piece->ck_mb > 0){ ?><tr class="<?php if($piece->ck_mb > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ck_mb > 0){ ?>  <?php echo("CK-MB : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ck_mb > 0){ echo("text"); }else{echo("hidden");} ?>" name="ck_mb"></td><td><?php if($piece->ck_mb > 0){echo "Homme : <5,2 ng/mL Femme : < 3,1 ng/mL";} ?></td></tr><?php } ?>
                              <?php if($piece->lipasemie > 0){ ?><tr class="<?php if($piece->lipasemie > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->lipasemie > 0){ ?>  <?php echo("Lipasémie : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->lipasemie > 0){ echo("text"); }else{echo("hidden");} ?>" name="lipasemie"></td><td><?php if($piece->lipasemie > 0){echo "– 240 UI/l (unités internationales par litre)";} ?></td></tr><?php } ?>
                              <?php if($piece->cbc > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc1"></td>
                                  <td>H : 4.5-6.5       F : 4-5.8 M/mm³   </td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hémoglobine  : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc2"></td>
                                  <td>H : 13-18g/dl    F : 12-16d/d</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématocrite : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc3"></td>
                                  <td>H : 40-54%     F : 37-47%</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("VGM : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc4"></td>
                                  <td>80-100 fl</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("TCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc5"></td>
                                  <td>27-33  pg</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("CCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc6"></td>
                                  <td>32-36 %</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc7"></td>
                                  <td>4000-10 000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Granulocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc8"></td>
                                  <td>2000-7000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Lymphocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc9"></td>
                                  <td>1000-4000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Monocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc10"></td>
                                  <td>100-1000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Plaquettes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="cbc11"></td>
                                  <td>150 000-400 000/ mm³</td>
                                </tr>
                              <?php } ?>
                              <?php if($piece->abog > 0){ ?><tr class="<?php if($piece->abog > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->abog > 0){ ?>  <?php echo("Groupage sanguine (GSRh)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->abog > 0){ echo("text"); }else{echo("hidden");} ?>" name="abog"></td><td><?php if($piece->abog > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ptaptt > 0){ ?><tr class="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ptaptt > 0){ ?>  <?php echo("TP/TCK/INR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>" name="ptaptt"></td><td><?php if($piece->ptaptt > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tpinr > 0){ ?><tr class="<?php if($piece->tpinr > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tpinr > 0){ ?>  <?php echo("TP/INR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tpinr > 0){ echo("text"); }else{echo("hidden");} ?>" name="tpinr"></td><td><?php if($piece->tpinr > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->rbcm > 0){ ?><tr class="<?php if($piece->rbcm > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rbcm > 0){ ?>  <?php echo("Frottis sanguin  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><textarea class="form-control" name="rbcm"></textarea></td><td><?php if($piece->rbcm > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->testemel > 0){ ?><tr class="<?php if($piece->testemel > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->testemel > 0){ ?>  <?php echo("Test d’Emmel : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><textarea class="form-control" name="testemel"></textarea></td><td><?php if($piece->testemel > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tauret > 0){ ?><tr class="<?php if($piece->tauret > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tauret > 0){ ?>  <?php echo("Taux de réticulocytes  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tauret > 0){ echo("text"); }else{echo("hidden");} ?>" name="tauret"></td><td><?php if($piece->tauret > 0){echo "0,5 - 2%   20000 - 120000/mm³";} ?></td></tr><?php } ?>
                              <?php if($piece->esr > 0){ ?><tr class="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->esr > 0){ ?>  <?php echo("Vitesse de sédimentation : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>" name="esr"></td><td><?php if($piece->esr > 0){echo "5 - 25mm";} ?></td></tr><?php } ?>
                              <?php if($piece->ge_fm > 0){ ?><tr class="<?php if($piece->ge_fm > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ge_fm > 0){ ?>  <?php echo("Recherche d'hématozaire du paludisme"); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ge_fm > 0){ echo("text"); }else{echo("hidden");} ?>" name="ge_fm"></td><td><?php if($piece->ge_fm > 0){echo "";} ?></td></tr><?php } ?>


                              <?php 
                              //MICROBIOLOGIE
                              //ECBU URINE Examen cyto- bactériologique des urines    
                              if($piece->urin > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("ECBU Aspect : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_asp">
                                      <option value="Limpide">Limpide</option>
                                      <option value="Trouble">Trouble</option>
                                      <option value="Légèrement_trouble">Légèrement trouble</option>
                                      <option value="Hématique">Hématique</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_leu">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreux">Nombreux</option>
                                    </select>
                                  </td>

                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_hema">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreuses">Nombreuses</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Bactéries : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_bac">
                                      <option value="Bacilles_mobiles">Bacilles mobiles</option>
                                      <option value="Bacilles_immobiles">Bacilles immobiles</option>
                                      <option value="Coccies">Coccies</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levures : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_lev">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Eléments parasitaires : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_e_par">
                                      <option value="Absence">Absence</option>
                                      <option value="Schistosoma_haemotobium">Schistosoma haemotobium</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cristaux : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="u_cris">
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cylindre : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="u_cyl">
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliales : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="u_c_epi">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if($piece->stol > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Examen parasitologique des selles (KAOP) : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_asp">
                                      <option value="Limpide">Molle</option>
                                      <option value="Trouble">Moulée</option>
                                      <option value="Glaireux">Dur</option>
                                      <option value="Légèrement_trouble">Molle - Moulée</option>
                                      <option value="Hématique">Glaireuse</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Glaireuses"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_asp_gl">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Sanguinolentes"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_asp_sg">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Forme adulte"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_asp_sg">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="s_asp_sg_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_leu">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreux">Nombreux</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levure : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_lev">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_hema">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreuses">Nombreuses</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Parasites : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="s_para">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="s_para_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } ?>
                              <?php 
                              if($piece->urinbs > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("ECBU + Culture : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_asp">
                                      <option value="Limpide">Limpide</option>
                                      <option value="Trouble">Trouble</option>
                                      <option value="Légèrement_trouble">Légèrement trouble</option>
                                      <option value="Hématique">Hématique</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_leu">
                                      <option value="Absence">Absence</option>
                                      <option value="Présence">Présence</option>
                                    </select>
                                    <select class="form-control" name="c_leu_con">
                                      <option value="<10^2"> <10^2</option>
                                      <option value=">=10^3"> >=10^3</option>
                                      <option value=">=10^4"> >=10^4</option>
                                    </select>
                                  </td>

                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_hema">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Bactéries : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_bac">
                                      <option value="Bacilles_mobiles">Bacilles mobiles</option>
                                      <option value="Bacilles_immobiles">Bacilles immobiles</option>
                                      <option value="Coccies">Coccies</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cristaux : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_cris">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="c_cris_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cylindre : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_cyl">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="c_cyl_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliales : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_c_epi">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_cul">
                                      <option value="Stérile">Stérile</option>
                                      <option value="Positive_DGU_<10^3">Positive DGU <10^3</option>
                                      <option value="Positive_DGU_>=10^4">Positive DGU >=10^4</option>
                                      <option value="Positive_DGU_>=10^5">Positive DGU >=10^5</option>
                                      <option value="Positive_DGU_>=10^6">Positive DGU >=10^6</option>
                                    </select>
                                    <?php /*  Si >=10^4 à >=10^6 present ecrire un commentaire */?>
                                    <input type="text" name="c_cul_esp" class="form-control">
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="c_con"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if($piece->sob > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Examen bactériologique des selles : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_asp">
                                      <option value="Limpide">Molle</option>
                                      <option value="Trouble">Moulée</option>
                                      <option value="Glaireux">Dur</option>
                                      <option value="Légèrement_trouble">Molle - Moulée</option>
                                      <option value="Hématique">Glaireuse</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Glaireuses"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_asp_gl">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Sanguinolentes"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_asp_sg">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Forme adulte"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_asp_sg">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="bs_asp_sg_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_leu">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreux">Nombreux</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levure : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_lev">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_hema">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreuses">Nombreuses</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Parasites : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bs_para">
                                      <option value="Absence">Absence</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*  Si present ecrire un commentaire */?>
                                    <textarea class="form-control" name="bs_para_com"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="c_cul">
                                      <option value="Stérile">Négative</option>
                                      <option value="Positive">Positive</option>
                                    </select>
                                    <?php /*  Si >=10^4 à >=10^6 present ecrire un commentaire */?>
                                    <input type="text" name="bs_cul_esp" class="form-control">
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="bs_con"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if($piece->pus > 0){ ?><tr class="<?php if($piece->pus > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pus > 0){ ?>  <?php echo("Pus : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pus > 0){ echo("text"); }else{echo("hidden");} ?>" name="pus" class="form-control"></td><td><?php if($piece->pus > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->csfre > 0){ ?><tr class="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->csfre > 0){ ?>  <?php echo("LCR/CSF : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>" name="csfre" class="form-control"></td><td><?php if($piece->csfre > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->pore > 0){ ?><tr class="<?php if($piece->pore > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pore > 0){ ?>  <?php echo("Prélèvement d’oreille  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pore > 0){ echo("text"); }else{echo("hidden");} ?>" name="pore" class="form-control"></td><td><?php if($piece->pore > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->pgorg > 0){ ?><tr class="<?php if($piece->pgorg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pgorg > 0){ ?>  <?php echo("Prélèvement de Gorge : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pgorg > 0){ echo("text"); }else{echo("hidden");} ?>" name="pgorg" class="form-control"></td><td><?php if($piece->pgorg > 0){echo "";} ?></td></tr><?php } 
                              if($piece->pvatb > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo(" PV + ATB : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_asp">
                                      <option value="Blanchâtre">Blanchâtre</option>
                                      <option value="Blanchâtre_Lait_caillé">Blanchâtre, Lait caillé</option>
                                      <option value="Verdatre">Verdatre</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Odeur : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bv_ode"></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_leu">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreux">Nombreux</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_hema">
                                      <option value="Absence">Absence</option>
                                      <option value="Rares">Rares</option>
                                      <option value="Quelques">Quelques</option>
                                      <option value="Assez">Assez</option>
                                      <option value="Nombreuses">Nombreuses</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliale : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bv_c_epi">
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Filaments et  spores de levures : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_f_sl">
                                      <option value="Négative">Négative</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                    <?php /*Si présence  */ ?>
                                    <select class="form-control" name="bv_f_sl">
                                      <option value="levures_bourgeonnantes">Levures bourgeonnantes</option>
                                      <option value="levures_filamanteuses">Levures filamanteuses +</option>
                                      <option value="levures_pseudofilamants">Levures pseudofilamants +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Trichomonas vaginalis : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_t_vag">
                                      <option value="Négative">Négative</option>
                                      <option value="Presence">Presence +</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Score de Nugent : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="number" name="bv_t_vag" class="form-control">
                                    <?php /* si bv_t_vag = 0 à 3 bv_t_vag_score = Flore_Normale si 4 à 6 bv_t_vag_score = Flore_Intermediaire si 7 et 10 alors Vaginose_bactérienne */?>
                                    <select class="form-control" name="bv_t_vag_score">
                                      <option value="Flore_Normale">Flore Normale</option>
                                      <option value="Flore_Intermediaire">Flore Intermédiaire</option>
                                      <option value="Vaginose_bactérienne">Vaginose bactérienne</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="bv_cul">
                                      <option value="Négative">Négative</option>
                                      <option value="Positive">Positive</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="bv_con"></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if($piece->pvatbrs > 0){ ?><tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("PV + ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia) : Recherche Chlamydia "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="rs_rch">
                                      <option value="Négative">Négative</option>
                                      <option value="Positive">Positive</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Recherche Mycoplasma : Uréaplasme uréalyticum"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="rs_rm_uu">
                                      <option value="Négative">Négative</option>
                                      <option value="Positive">Positive</option>
                                    </select>
                                    <?php   /*SI positive */ ?>

                                    <select class="form-control" name="rs_rm_uu_com">
                                      <option value="Négative">Uu >= 10^4/ml</option>
                                      <option value="Positive">Mh >= 10^4/ml</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Recherche Mycoplasma : Mycoplasma hominis"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="rs_rm_mh">
                                      <option value="Absence">Absence</option>
                                      <option value="Stérile">Stérile</option>
                                      <option value="Positive_DGU_<10^4">Positive DGU < 10^4/ml</option>
                                      <option value="Positive_DGU_≥10^4">Positive DGU ≥ 10^4/ml</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Antibiogramme : Sensible"); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="rs_ant_sen">
                                      <option value="Erythromycine">Erythromycine</option>
                                      <option value="Clindamycine">Clindamycine</option>
                                      <option value="Lévofloxacine">Lévofloxacine</option>
                                      <option value="Roxamycine">Roxamycine</option>
                                      <option value="Tétracycline">Tétracycline</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Résistant : "); ?></td>
                                  <td></td>
                                  <td>
                                    <select class="form-control" name="rs_resis">
                                      <option value="Minocycline">Minocycline</option>
                                      <option value="Pristinamycine">Pristinamycine</option>
                                    </select>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if($piece->burin > 0){ ?><tr class="<?php if($piece->burin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->burin > 0){ ?>  <?php echo("Bandelette urinaire : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->burin > 0){ echo("text"); }else{echo("hidden");} ?>" name="burin" class="form-control"></td><td><?php if($piece->burin > 0){echo "";} ?></td></tr><?php } ?>



                              <?php 
                              //HORMONES 

                              if($piece->psa > 0){ ?><tr class="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->psa > 0){ ?>  <?php echo("PSA : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>" name="psa"></td><td><?php if($piece->psa > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tsh > 0){ ?><tr class="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tsh > 0){ ?>  <?php echo("TSH  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>" name="tsh"></td><td><?php if($piece->tsh > 0){echo "0.25 - 5 Uui/ml";} ?></td></tr><?php } ?>
                              <?php if($piece->t3 > 0){ ?><tr class="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->t3 > 0){ ?>  <?php echo("FT3  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>" name="t3"></td><td><?php if($piece->t3 > 0){echo "4 - 8.3 Pmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->t4 > 0){ ?><tr class="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->t4 > 0){ ?>  <?php echo("FT4  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>" name="t4"></td><td><?php if($piece->t4 > 0){echo "9 - 20 Pmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->betahcg > 0){ ?><tr class="<?php if($piece->betahcg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->betahcg > 0){ ?>  <?php echo("BETA HCG : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->betahcg > 0){ echo("text"); }else{echo("hidden");} ?>" name="betahcg"></td><td><?php if($piece->betahcg > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->psa_free > 0){ ?><tr class="<?php if($piece->psa_free > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->psa_free > 0){ ?>  <?php echo("PSA free : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->psa_free > 0){ echo("text"); }else{echo("hidden");} ?>" name="psa_free"></td><td><?php if($piece->psa_free > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->progestérone > 0){ ?><tr class="<?php if($piece->progestérone > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->progestérone > 0){ ?>  <?php echo("Progestérone : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->progestérone > 0){ echo("text"); }else{echo("hidden");} ?>" name="progestérone"></td><td><?php if($piece->progestérone > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->acahbc > 0){ ?><tr class="<?php if($piece->acahbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->acahbc > 0){ ?>  <?php echo("AC ANTI HBC TOTAUX : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->acahbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="acahbc"></td><td><?php if($piece->acahbc > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ca125 > 0){ ?><tr class="<?php if($piece->ca125 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ca125 > 0){ ?>  <?php echo("CA 125 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ca125 > 0){ echo("text"); }else{echo("hidden");} ?>" name="ca125"></td><td><?php if($piece->ca125 > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ca19 > 0){ ?><tr class="<?php if($piece->ca19 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ca19 > 0){ ?>  <?php echo("CA 19.9 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ca19 > 0){ echo("text"); }else{echo("hidden");} ?>" name="ca19"></td><td><?php if($piece->ca19 > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->testo > 0){ ?><tr class="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->testo > 0){ ?>  <?php echo("TESTOSTERONE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>" name="testo"></td><td><?php if($piece->testo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tropo > 0){ ?><tr class="<?php if($piece->tropo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tropo > 0){ ?>  <?php echo("TROPONINE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tropo > 0){ echo("text"); }else{echo("hidden");} ?>" name="tropo"></td><td><?php if($piece->tropo > 0){echo "<19 ng/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ac_anti_hbs > 0){ ?><tr class="<?php if($piece->ac_anti_hbs > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ac_anti_hbs > 0){ ?>  <?php echo("Ac Anti Hbs : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ac_anti_hbs > 0){ echo("text"); }else{echo("hidden");} ?>" name="ac_anti_hbs"></td><td><?php if($piece->ac_anti_hbs > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->oestradiol > 0){ ?><tr class="<?php if($piece->oestradiol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->oestradiol > 0){ ?>  <?php echo("Œstradiol : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->oestradiol > 0){ echo("text"); }else{echo("hidden");} ?>" name="oestradiol"></td><td><?php if($piece->oestradiol > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->dimeres > 0){ ?><tr class="<?php if($piece->dimeres > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->dimeres > 0){ ?>  <?php echo("DDIMERES : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->dimeres > 0){ echo("text"); }else{echo("hidden");} ?>" name="dimeres"></td><td><?php if($piece->dimeres > 0){echo "<500 ng/ml";} ?></td></tr><?php } ?>
                              <?php if($piece->prl > 0){ ?><tr class="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->prl > 0){ ?>  <?php echo("PROLACTINE  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>" name="prl"></td><td><?php if($piece->prl > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->fsh > 0){ ?><tr class="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fsh > 0){ ?>  <?php echo("FSH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>" name="fsh"></td><td><?php if($piece->fsh > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->lh > 0){ ?><tr class="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->lh > 0){ ?>  <?php echo("LH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>" name="lh"></td><td><?php if($piece->lh > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ag_hbe > 0){ ?><tr class="<?php if($piece->ag_hbe > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ag_hbe > 0){ ?>  <?php echo("Ag Hbe: "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ag_hbe > 0){ echo("text"); }else{echo("hidden");} ?>" name="ag_hbe"></td><td><?php if($piece->ag_hbe > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ac_anti_hbe > 0){ ?><tr class="<?php if($piece->ac_anti_hbe > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ac_anti_hbe > 0){ ?>  <?php echo("Ac Anti Hbe  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ac_anti_hbe > 0){ echo("text"); }else{echo("hidden");} ?>" name="ac_anti_hbe"></td><td><?php if($piece->ac_anti_hbe > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->nt_proBNP > 0){ ?><tr class="<?php if($piece->nt_proBNP > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->nt_proBNP > 0){ ?>  <?php echo("NT-proBNP : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->nt_proBNP > 0){ echo("text"); }else{echo("hidden");} ?>" name="nt_proBNP"></td><td><?php if($piece->nt_proBNP > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if($piece->hbsag > 0){ ?><tr class="<?php if($piece->hbsag > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbsag > 0){ ?>  <?php echo("Ag Hbs : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbsag > 0){ echo("text"); }else{echo("hidden");} ?>" name="hbsag"></td><td><?php if($piece->hbsag > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hcvab > 0){ ?><tr class="<?php if($piece->hcvab > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hcvab > 0){ ?>  <?php echo("Ac Anti HCV : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hcvab > 0){ echo("text"); }else{echo("hidden");} ?>" name="hcvab"></td><td><?php if($piece->hcvab > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hivab > 0){ ?><tr class="<?php if($piece->hivab > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hivab > 0){ ?>  <?php echo("Ac anti  HIV : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hivab > 0){ echo("text"); }else{echo("hidden");} ?>" name="hivab"></td><td><?php if($piece->hivab > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hbc > 0){ ?><tr class="<?php if($piece->hbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbc > 0){ ?>  <?php echo("HBC : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="hbc"></td><td><?php if($piece->hbc > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->crp > 0){ ?><tr class="<?php if($piece->crp > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->crp > 0){ ?>  <?php echo("CRP : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->crp > 0){ echo("text"); }else{echo("hidden");} ?>" name="crp"></td><td><?php if($piece->crp > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->facrhu > 0){ ?><tr class="<?php if($piece->facrhu > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->facrhu > 0){ ?>  <?php echo("FACTEUR RHUMATOIDE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->facrhu > 0){ echo("text"); }else{echo("hidden");} ?>" name="facrhu"></td><td><?php if($piece->facrhu > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->aslo > 0){ ?><tr class="<?php if($piece->aslo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->aslo > 0){ ?>  <?php echo("ASLO : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->aslo > 0){ echo("text"); }else{echo("hidden");} ?>" name="aslo"></td><td><?php if($piece->aslo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->vdrl > 0){ ?><tr class="<?php if($piece->vdrl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->vdrl > 0){ ?>  <?php echo("SYPHILIS : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->vdrl > 0){ echo("text"); }else{echo("hidden");} ?>" name="vdrl"></td><td><?php if($piece->vdrl > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hav > 0){ ?><tr class="<?php if($piece->hav > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hav > 0){ ?>  <?php echo("HAV  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hav > 0){ echo("text"); }else{echo("hidden");} ?>" name="hav"></td><td><?php if($piece->hav > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->serologie_typhoide > 0){ ?><tr class="<?php if($piece->serologie_typhoide > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->serologie_typhoide > 0){ ?>  <?php echo("Sérologie Typhoïde : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->serologie_typhoide > 0){ echo("text"); }else{echo("hidden");} ?>" name="serologie_typhoide"></td><td><?php if($piece->serologie_typhoide > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hbpylo > 0){ ?><tr class="<?php if($piece->hbpylo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbpylo > 0){ ?>  <?php echo("HELICOBACTER PYLORI (HP) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbpylo > 0){ echo("text"); }else{echo("hidden");} ?>" name="hbpylo"></td><td><?php if($piece->hbpylo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->toxo > 0){ ?><tr class="<?php if($piece->toxo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->toxo > 0){ ?>  <?php echo("TOXOPLASMOSE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->toxo > 0){ echo("text"); }else{echo("hidden");} ?>" name="toxo"></td><td><?php if($piece->toxo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->rub > 0){ ?><tr class="<?php if($piece->rub > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rub > 0){ ?>  <?php echo("RUBEOLE  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->rub > 0){ echo("text"); }else{echo("hidden");} ?>" name="rub"></td><td><?php if($piece->rub > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->serologie_brucellose > 0){ ?><tr class="<?php if($piece->serologie_brucellose > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->serologie_brucellose > 0){ ?>  <?php echo("Sérologie Brucellose : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->serologie_brucellose > 0){ echo("text"); }else{echo("hidden");} ?>" name="serologie_brucellose"></td><td><?php if($piece->serologie_brucellose > 0){echo "";} ?></td></tr><?php } ?>

                            </tbody>
                          </table>
                          <input type="hidden" name="pandoc" value="<?php echo $piece->pandoc; ?>"> 
                          <input type="hidden" name="pcandoc" value="<?php echo $piece->pcandoc; ?>"> 
                          <?php 
                            endforeach; 
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <button class="form-control bg-success" type="submit" name="enreg"><i class="fas fa-save"></i> Enregistrer</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>       
                    
            
          </div><!-- /.col -->  
        </div> 
      </div><!-- /.container-fluid -->
    </div>
  </div>  
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
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();
  });
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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