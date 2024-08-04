<?php  require("tetecd.php");?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
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
                            $pieces = $DB->query("SELECT examens.ide,  examens.idp, examens.name, examens.phone, examens.address, examens.age, examens.sex, examens.numcard, examens.price, examens.heurfexam, examens.datej, examens.fg, examens.rg, examens.hgpo, examens.chol, examens.c_hdl, examens.c_ldl, examens.tc, examens.sgot, examens.ldh, examens.sgptalt, examens.urea, examens.crea, examens.ua, examens.alb, examens.br, examens.brdi, examens.alkphos, examens.calc, examens.magn, examens.ptp, examens.gtt, examens.ioskna, examens.ioskk, examens.ioskcl, examens.proteinurie, examens.fer_serique, examens.ferritine, examens.proteinurie_24h, examens.ck_mb, examens.lipasemie, examens.cbc, examens.cbc2, examens.cbc3, examens.cbc4, examens.cbc5, examens.cbc6, examens.cbc7, examens.cbc8, examens.cbc9, examens.cbc10, examens.cbc11, examens.abog, examens.ptaptt, examens.tpinr, examens.rbcm, examens.testemel, examens.tauret, examens.esr, examens.ge_fm, examens.urin, examens.u_asp, examens.u_leu, examens.u_hema, examens.u_bac, examens.u_lev, examens.u_e_par, examens.u_cris, examens.u_cyl, examens.u_c_epi, examens.stol, examens.s_asp, examens.s_leu, examens.s_lev, examens.s_hema, examens.s_para, examens.s_cul, examens.s_es_id, examens.s_sen, examens.s_resis, examens.s_con, examens.urinbs, examens.c_asp, examens.c_leu, examens.c_hema, examens.c_bac, examens.c_cris, examens.c_cyl, examens.c_c_epi, examens.c_cul, examens.c_con, examens.sob, examens.bs_asp, examens.bs_leu, examens.bs_lev, examens.bs_hema, examens.bs_para, examens.bs_cul, examens.bs_con, examens.pus, examens.csfre, examens.coproculture, examens.cytobacterio_expectorations, examens.liquide_ponction, examens.recherche_rotadeno_selles, examens.recherche_ag_h_pylori_selles, examens.recherche_hav_selles, examens.pore, examens.pgorg, examens.pvatb, examens.bv_asp, examens.bv_ode, examens.bv_leu, examens.bv_hema, examens.bv_c_epi, examens.bv_f_sl, examens.bv_t_vag, examens.bv_cul, examens.bv_con, examens.pvatbrs, examens.rs_rch, examens.rs_rm_uu, examens.rs_rm_mh, examens.rs_ant_sen, examens.rs_resis, examens.burin, examens.psa, examens.tsh, examens.t3, examens.t4, examens.betahcg, examens.psa_free, examens.progestérone, examens.acahbc, examens.ca125, examens.ca19, examens.testo, examens.tropo, examens.ac_anti_hbs, examens.oestradiol, examens.dimeres, examens.prl, examens.fsh, examens.lh, examens.ag_hbe, examens.ac_anti_hbe, examens.nt_proBNP, examens.hbsag, examens.hcvab, examens.hivab, examens.hbc, examens.crp, examens.facrhu, examens.aslo, examens.vdrl, examens.hav, examens.serologie_typhoide, examens.hbpylo, examens.toxo, examens.rub, examens.serologie_brucellose, examens.pandoc, examens.pcandoc, examens.chk, examens.res, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.tel, patient.address FROM patient, examens where examens.idp = patient.idp and examens.ide = '$ids'");
                          foreach ($pieces as $piece):?>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">Patient  </label>
                              <div class="col-sm-8">
                                <input type="hidden" name="idexam" value="<?php echo $piece->idexam; ?>"> 
                                <input type="hidden" name="idpa" value="<?php echo $piece->idp; ?>" class="form-control">
                                <input type="text" class="form-control" name="nom" value="<?php echo $piece->nom; ?>" class="form-control">
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label">Sexe : </label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="sex" value="<?php echo $piece->sex; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-6 col-form-label">Âge :  </label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" name="age" value="<?php echo $piece->age; ?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-5 col-form-label">Date d'examen :  </label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" name="datexam" value="<?php echo $piece->datej; echo " - "; echo $piece->heurfexam; ?>" class="form-control" disabled>  
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

                              <?php if($piece->fg > 0){ ?><tr class="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fg > 0){ ?>  <?php echo("Glycémie à jeun : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="fg" value="<?php echo $piece->fg; ?>" disabled></td><td><?php if($piece->fg > 0){echo "0.70 - 1.20 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->rg > 0){ ?><tr class="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rg > 0){ ?>  <?php echo("Glycémie post prandiale  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="rg" value="<?php echo $piece->rg; ?>" disabled></td><td><?php if($piece->rg > 0){echo "0.70 - 1.20 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->hgpo > 0){ ?><tr class="<?php if($piece->hgpo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hgpo > 0){ ?>  <?php echo("Hyperglycémie provoquée par voie orale (HGPO) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hgpo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hgpo" value="<?php echo $piece->hgpo; ?>" disabled></td><td><?php if($piece->hgpo > 0){echo "Glycémie à jeun : 5.1 mmol/L (0.92 g/L). - Glycémie à 1h : 10 mmol/L (1.80 g/L). - Glycémie à 2h : 8.5 mmol/L (1.53g/L).";} ?></td></tr><?php } ?>
                              <?php if($piece->chol > 0){ ?><tr class="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->chol > 0){ ?>  <?php echo("Cholestérol Total  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="chol" value="<?php echo $piece->chol; ?>" disabled></td><td><?php if($piece->chol > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>

                              <?php if($piece->c_hdl > 0){ ?><tr class="<?php if($piece->c_hdl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->c_hdl > 0){ ?>  <?php echo("C-HDL  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->c_hdl > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="c_hdl" value="<?php echo $piece->c_hdl; ?>" disabled></td><td><?php if($piece->c_hdl > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->c_ldl > 0){ ?><tr class="<?php if($piece->c_ldl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->c_ldl > 0){ ?>  <?php echo("C-LDL : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->c_ldl > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="c_ldl" value="<?php echo $piece->c_ldl; ?>" disabled></td><td><?php if($piece->c_ldl > 0){echo "<2.00 g/l";} ?></td></tr><?php } ?>



                              <?php if($piece->tc > 0){ ?><tr class="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tc > 0){ ?>  <?php echo("Triglycérides  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="tc" value="<?php echo $piece->tc; ?>" disabled></td><td><?php if($piece->tc > 0){echo "0.55 - 1.65 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->sgot > 0){ ?><tr class="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->sgot > 0){ ?>  <?php echo("ASAT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="sgot" value="<?php echo $piece->sgot; ?>" disabled></td><td><?php if($piece->sgot > 0){echo "<35 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ldh > 0){ ?><tr class="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ldh > 0){ ?>  <?php echo("LDH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ldh" value="<?php echo $piece->ldh; ?>" disabled></td><td><?php if($piece->ldh > 0){echo "0.12 - 0.94 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->sgptalt > 0){ ?><tr class="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->sgptalt > 0){ ?>  <?php echo("ALAT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="sgptalt" value="<?php echo $piece->sgptalt; ?>" disabled></td><td><?php if($piece->sgptalt > 0){echo "<40 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->urea > 0){ ?><tr class="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urea > 0){ ?>  <?php echo("Urée : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="urea" value="<?php echo $piece->urea; ?>" disabled></td><td><?php if($piece->urea > 0){echo "0.15 - 0.45 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->crea > 0){ ?><tr class="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->crea > 0){ ?>  <?php echo("Créatinine : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="crea" value="<?php echo $piece->crea; ?>" disabled></td><td><?php if($piece->crea > 0){echo "6 - 13 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ua > 0){ ?><tr class="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ua > 0){ ?>  <?php echo("Acide urique(Uricémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ua" value="<?php echo $piece->ua; ?>" disabled></td><td><?php if($piece->ua > 0){echo "22 - 77 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->alb > 0){ ?><tr class="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->alb > 0){ ?>  <?php echo("Albumine  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="alb" value="<?php echo $piece->alb; ?>" disabled></td><td><?php if($piece->alb > 0){echo "34 - 54 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->br > 0){ ?><tr class="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->br > 0){ ?>  <?php echo("Bilirubine Totale  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="br" value="<?php echo $piece->br; ?>" disabled></td><td><?php if($piece->br > 0){echo "2 - 13 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->brdi > 0){ ?><tr class="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->brdi > 0){ ?>  <?php echo("Bilirubine Conjuguée (Directe) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="brdi" value="<?php echo $piece->brdi; ?>" disabled></td><td><?php if($piece->brdi > 0){echo "0 - 3 mg/l";} ?></td></tr><?php } ?>
                              <?php if($piece->alkphos > 0){ ?><tr class="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->alkphos > 0){ ?>  <?php echo("Phosphatase Alcaline (PAL) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="alkphos" value="<?php echo $piece->alkphos; ?>" disabled></td><td><?php if($piece->alkphos > 0){echo "Adultes 40 – 129 U/l (hommes) – 35 – 104 U/l (femmes)";} ?></td></tr><?php } ?>
                              <?php if($piece->calc > 0){ ?><tr class="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->calc > 0){ ?>  <?php echo("Calcium : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="calc" value="<?php echo $piece->calc; ?>" disabled></td><td><?php if($piece->calc > 0){echo "2.20 - 2.60 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->magn > 0){ ?><tr class="<?php if($piece->magn > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->magn > 0){ ?>  <?php echo("Magnésium : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->magn > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="magn" value="<?php echo $piece->magn; ?>" disabled></td><td><?php if($piece->magn > 0){echo "0.7 - 1.1 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ptp > 0){ ?><tr class="<?php if($piece->ptp > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ptp > 0){ ?>  <?php echo("Protéines Totales(Protidémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ptp > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ptp" value="<?php echo $piece->ptp; ?>" disabled></td><td><?php if($piece->ptp > 0){echo "65 - 80 g/l";} ?></td></tr><?php } ?>
                              <?php if($piece->gtt > 0){ ?><tr class="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->gtt > 0){ ?>  <?php echo("Gamma-Glutamyl-Tranférase (GGT) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="gtt" value="<?php echo $piece->gtt; ?>" disabled></td><td><?php if($piece->gtt > 0){echo "37 - 45 Ul/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskna > 0){ ?><tr class="<?php if($piece->ioskna > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskna > 0){ ?>  <?php echo("Ionogramme Sanguin (Na+)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskna > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ioskna" value="<?php echo $piece->ioskna; ?>" disabled></td><td><?php if($piece->ioskna > 0){echo "135 - 145 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskk > 0){ ?><tr class="<?php if($piece->ioskk > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskk > 0){ ?>  <?php echo("Ionogramme Sanguin (K+)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskk > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ioskk" value="<?php echo $piece->ioskk; ?>" disabled></td><td><?php if($piece->ioskk > 0){echo "3,5 - 5,00 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ioskcl > 0){ ?><tr class="<?php if($piece->ioskcl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ioskcl > 0){ ?>  <?php echo("Ionogramme Sanguin (Cl)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ioskcl > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ioskcl" value="<?php echo $piece->ioskcl; ?>" disabled></td><td><?php if($piece->ioskcl > 0){echo "97 - 107 mmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->proteinurie > 0){ ?><tr class="<?php if($piece->proteinurie > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->proteinurie > 0){ ?>  <?php echo("Protéinurie  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->proteinurie > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="proteinurie" value="<?php echo $piece->proteinurie; ?>" disabled></td><td><?php if($piece->proteinurie > 0){echo "28 - 141 mg/24H";} ?></td></tr><?php } ?>

                              <?php if($piece->fer_serique > 0){ ?><tr class="<?php if($piece->fer_serique > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fer_serique > 0){ ?>  <?php echo("Fer sérique : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fer_serique > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="fer_serique" value="<?php echo $piece->fer_serique; ?>" disabled></td><td><?php if($piece->fer_serique > 0){echo "8.1 - 28.3 umol/l (hommes) – 6.6 - 26.0 umol/l (femmes)";} ?></td></tr><?php } ?>
                              <?php if($piece->ferritine > 0){ ?><tr class="<?php if($piece->ferritine > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ferritine > 0){ ?>  <?php echo("Ferritine (Ferritinémie) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ferritine > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ferritine" value="<?php echo $piece->ferritine; ?>" disabled></td><td><?php if($piece->ferritine > 0){echo "chez l’homme adulte : 20 à 200 µg/l; Chez la femme adulte avant la ménopause : 10 à 125 µg/l ; après la ménopause : 20 à 200 µg/l; Chef l'enfant entre 15 - 600 ug/l";} ?></td></tr><?php } ?>
                              <?php if($piece->proteinurie_24h > 0){ ?><tr class="<?php if($piece->proteinurie_24h > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->proteinurie_24h > 0){ ?>  <?php echo("Protéinurie de 24H : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->proteinurie_24h > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="proteinurie_24h" value="<?php echo $piece->proteinurie_24h; ?>" disabled></td><td><?php if($piece->proteinurie_24h > 0){echo "28 - 141 mg/24H";} ?></td></tr><?php } ?>
                              <?php if($piece->ck_mb > 0){ ?><tr class="<?php if($piece->ck_mb > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ck_mb > 0){ ?>  <?php echo("CK-MB : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ck_mb > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ck_mb" value="<?php echo $piece->ck_mb; ?>" disabled></td><td><?php if($piece->ck_mb > 0){echo "Homme : <5,2 ng/mL Femme : < 3,1 ng/mL";} ?></td></tr><?php } ?>
                              <?php if($piece->lipasemie > 0){ ?><tr class="<?php if($piece->lipasemie > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->lipasemie > 0){ ?>  <?php echo("Lipasémie : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->lipasemie > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="lipasemie" value="<?php echo $piece->lipasemie; ?>" disabled></td><td><?php if($piece->lipasemie > 0){echo "– 240 UI/l (unités internationales par litre)";} ?></td></tr><?php } ?>

                              <?php if($piece->cbc > 0){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc1" value="<?php echo $piece->cbc; ?>" disabled></td>
                                  <td>H : 4.5-6.5       F : 4-5.8 M/mm³   </td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hémoglobine  : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc2" value="<?php echo $piece->cbc2; ?>" disabled></td>
                                  <td>H : 13-18g/dl    F : 12-16d/d</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématocrite : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc3" value="<?php echo $piece->cbc3; ?>" disabled></td>
                                  <td>H : 40-54%     F : 37-47%</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("VGM : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc4" value="<?php echo $piece->cbc4; ?>" disabled></td>
                                  <td>80-100 fl</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("TCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc5" value="<?php echo $piece->cbc5; ?>" disabled></td>
                                  <td>27-33  pg</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("CCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc6" value="<?php echo $piece->cbc6; ?>" disabled></td>
                                  <td>32-36 %</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc7" value="<?php echo $piece->cbc7; ?>" disabled></td>
                                  <td>4000-10 000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Granulocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc8" value="<?php echo $piece->cbc8; ?>" disabled></td>
                                  <td>2000-7000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Lymphocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc9" value="<?php echo $piece->cbc9; ?>" disabled></td>
                                  <td>1000-4000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Monocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc10" value="<?php echo $piece->cbc10; ?>" disabled></td>
                                  <td>100-1000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Plaquettes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc11" value="<?php echo $piece->cbc11; ?>" disabled></td>
                                  <td>150 000-400 000/ mm³</td>
                                </tr>
                              <?php } ?>

                              <?php if (!empty($piece->abog)){ ?><tr class="<?php if(!empty($piece->abog)){ echo("text"); }else{echo("hidden");} ?>"><td><?php if(!empty($piece->abog)){ ?>  <?php echo("Groupage sanguine (GSRh)  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if(!empty($piece->abog)){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="abog" value="<?php echo $piece->abog; ?>" disabled></td><td><?php if(!empty($piece->abog)){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ptaptt > 0){ ?><tr class="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ptaptt > 0){ ?>  <?php echo("TP/TCK/INR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ptaptt" value="<?php echo $piece->ptaptt; ?>" disabled></td><td><?php if($piece->ptaptt > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tpinr > 0){ ?><tr class="<?php if($piece->tpinr > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tpinr > 0){ ?>  <?php echo("TP/INR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tpinr > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="tpinr" value="<?php echo $piece->tpinr; ?>" disabled></td><td><?php if($piece->tpinr > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->rbcm > 0){ ?><tr class="<?php if($piece->rbcm > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rbcm > 0){ ?>  <?php echo("Frottis sanguin  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->rbcm > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="rbcm" value="<?php echo $piece->rbcm; ?>" disabled></td><td><?php if($piece->rbcm > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->testemel > 0){ ?><tr class="<?php if($piece->testemel > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->testemel > 0){ ?>  <?php echo("Test d’Emmel : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->testemel > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="testemel" value="<?php echo $piece->testemel; ?>" disabled></td><td><?php if($piece->testemel > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tauret > 0){ ?><tr class="<?php if($piece->tauret > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tauret > 0){ ?>  <?php echo("Taux de réticulocytes  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tauret > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="tauret" value="<?php echo $piece->tauret; ?>" disabled></td><td><?php if($piece->tauret > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->esr > 0){ ?><tr class="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->esr > 0){ ?>  <?php echo("Vitesse de sédimentation : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="esr" value="<?php echo $piece->esr; ?>" disabled></td><td><?php if($piece->esr > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ge_fm > 0){ ?><tr class="<?php if($piece->ge_fm > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ge_fm > 0){ ?>  <?php echo("GE/FM  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ge_fm > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ge_fm" value="<?php echo $piece->ge_fm; ?>" disabled></td><td><?php if($piece->ge_fm > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if(!empty($piece->cbc)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc1" value="<?php echo $piece->cbc; ?>" disabled></td>
                                  <td>H : 4.5-6.5       F : 4-5.8 M/mm³   </td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hémoglobine  : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc2" value="<?php echo $piece->cbc2; ?>" disabled></td>
                                  <td>H : 13-18g/dl    F : 12-16d/d</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématocrite : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc3" value="<?php echo $piece->cbc3; ?>" disabled></td>
                                  <td>H : 40-54%     F : 37-47%</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("VGM : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc4" value="<?php echo $piece->cbc4; ?>" disabled></td>
                                  <td>80-100 fl</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("TCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc5" value="<?php echo $piece->cbc5; ?>" disabled></td>
                                  <td>27-33  pg</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("CCMH : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc6" value="<?php echo $piece->cbc6; ?>" disabled></td>
                                  <td>32-36 %</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc7" value="<?php echo $piece->cbc7; ?>" disabled></td>
                                  <td>4000-10 000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Granulocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc8" value="<?php echo $piece->cbc8; ?>" disabled></td>
                                  <td>2000-7000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Lymphocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc9" value="<?php echo $piece->cbc9; ?>" disabled></td>
                                  <td>1000-4000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Monocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc10" value="<?php echo $piece->cbc10; ?>" disabled></td>
                                  <td>100-1000/ mm³</td>
                                </tr>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Plaquettes : "); ?></td>
                                  <td></td>
                                  <td><input type="text" class="form-control" name="cbc11" value="<?php echo $piece->cbc11; ?>" disabled></td>
                                  <td>150 000-400 000/ mm³</td>
                                </tr>
                              <?php } 
                              if(!empty($piece->u_asp)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("ECBU Aspect : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_asp" value="<?php echo $piece->u_asp; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_leu" value="<?php echo $piece->u_leu; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_hema" value="<?php echo $piece->u_hema; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Bactéries : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_bac" value="<?php echo $piece->u_bac; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levures : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_lev" value="<?php echo $piece->u_lev; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Eléments parasitaires : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_e_par" value="<?php echo $piece->u_e_par; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cristaux : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_cris" value="<?php echo $piece->u_cris; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cylindre : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_cyl" value="<?php echo $piece->u_cyl; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliales : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="u_c_epi" value="<?php echo $piece->u_c_epi; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if(!empty($piece->s_asp)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Examen parasitologique des selles (KAOP) : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_asp" value="<?php echo $piece->s_asp; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="s_leu" value="<?php echo $piece->s_leu; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levure : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_lev" value="<?php echo $piece->s_lev; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_hema" value="<?php echo $piece->s_hema; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Parasites : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_para" value="<?php echo $piece->s_para; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_cul" value="<?php echo $piece->s_cul; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Espèce identifiée : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_es_id" value="<?php echo $piece->s_es_id; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Sensible : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_sen" value="<?php echo $piece->s_sen; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Résistant : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="s_resis" value="<?php echo $piece->s_resis; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="s_con" value="<?php echo $piece->s_con; ?>" disabled><?php echo $piece->s_con; ?></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } ?>
                              <?php 
                              if(!empty($piece->c_asp)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("ECBU + Culture : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_asp" value="<?php echo $piece->c_asp; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_leu" value="<?php echo $piece->c_leu; ?>" disabled>
                                  </td>

                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_hema" value="<?php echo $piece->c_hema; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Bactéries : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_bac" value="<?php echo $piece->c_bac; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cristaux : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_cris" value="<?php echo $piece->c_cris; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cylindre : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_cyl" value="<?php echo $piece->c_cyl; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliales : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_c_epi" value="<?php echo $piece->c_c_epi; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="c_cul" value="<?php echo $piece->c_cul; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="c_con" value="<?php echo $piece->c_con; ?>" disabled><?php echo $piece->c_con; ?></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if(!empty($piece->bs_asp)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("Examen bactériologique des selles : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="bs_asp" value="<?php echo $piece->bs_asp; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td><input type="text"  class="form-control" name="bs_leu" value="<?php echo $piece->bs_leu; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Levure : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="bs_lev" value="<?php echo $piece->bs_lev; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="bs_hema" value="<?php echo $piece->bs_hema; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Parasites : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bs_para" value="<?php echo $piece->bs_para; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text" class="form-control" name="bs_cul" value="<?php echo $piece->bs_cul; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="bs_con" value="<?php echo $piece->bs_con; ?>" disabled><?php echo $piece->bs_con; ?></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } ?>
                              <?php if($piece->pus > 0){ ?><tr class="<?php if($piece->pus > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pus > 0){ ?>  <?php echo("Pus : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pus > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="pus" value="<?php echo $piece->pus; ?>" disabled></td><td><?php if($piece->pus > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->csfre > 0){ ?><tr class="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->csfre > 0){ ?>  <?php echo("LCR/CSF : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="csfre" value="<?php echo $piece->csfre; ?>" disabled></td><td><?php if($piece->csfre > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->pore > 0){ ?><tr class="<?php if($piece->pore > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pore > 0){ ?>  <?php echo("Prélèvement d’oreille  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pore > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="pore" value="<?php echo $piece->pore; ?>" disabled></td><td><?php if($piece->pore > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->pgorg > 0){ ?><tr class="<?php if($piece->pgorg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pgorg > 0){ ?>  <?php echo("Prélèvement de Gorge : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pgorg > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="pgorg" value="<?php echo $piece->pgorg; ?>" disabled></td><td><?php if($piece->pgorg > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if(!empty($piece->bv_asp)){ ?>
                                <tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo(" PV + ATB : Aspect "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bv_asp" value="<?php echo $piece->bv_asp; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Odeur : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bv_ode" value="<?php echo $piece->bv_ode; ?>" disabled></td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Leucocytes : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_leu" value="<?php echo $piece->bv_leu; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Hématies : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_hema" value="<?php echo $piece->bv_hema; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Cellules épithéliale : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input type="text"  class="form-control" name="bv_c_epi" value="<?php echo $piece->bv_c_epi; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Filaments et  spores de levures : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_f_sl" value="<?php echo $piece->bv_f_sl; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Trichomonas vaginalis : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_t_vag" value="<?php echo $piece->bv_t_vag; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Score de Nugent : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_t_vag" value="<?php echo $piece->bv_t_vag; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Vaginose bactérienne : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_t_vag" value="<?php echo $piece->bv_t_vag; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Culture : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="bv_cul" value="<?php echo $piece->bv_cul; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Conclusion : "); ?></td>
                                  <td></td>
                                  <td>
                                    <textarea class="form-control" name="bv_con" value="<?php echo $piece->bv_con; ?>" disabled><?php echo $piece->bv_con; ?></textarea>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } 
                              if(!empty($piece->rs_rch)){ ?><tr class="text">
                                  <td style="font-weight: bold; font-size: 20px"><?php echo("PV + ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia) : Recherche Chlamydia "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="rs_rch" value="<?php echo $piece->rs_rch; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Recherche Mycoplasma : Uréaplasme uréalyticum"); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="rs_rm_uu" value="<?php echo $piece->rs_rm_uu; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Recherche Mycoplasma : Mycoplasma hominis"); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="rs_rm_mh" value="<?php echo $piece->rs_rm_mh; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Antibiogramme : Sensible"); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="rs_ant_sen" value="<?php echo $piece->rs_ant_sen; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                                <tr class="text">
                                  <td style="text-align: right;"><?php echo("Résistant : "); ?></td>
                                  <td></td>
                                  <td>
                                    <input class="form-control" name="rs_resis" value="<?php echo $piece->rs_resis; ?>" disabled>
                                  </td>
                                  <td></td>
                                </tr>
                              <?php } ?>
                              <?php if($piece->pvatb > 0){ ?><tr class="<?php if($piece->pvatb > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pvatb > 0){ ?>  <?php echo("PV+ATB : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pvatb > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="pvatb" value="<?php echo $piece->pvatb; ?>" disabled></td><td><?php if($piece->pvatb > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->pvatbrs > 0){ ?><tr class="<?php if($piece->pvatbrs > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->pvatbrs > 0){ ?>  <?php echo(" PV+ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->pvatbrs > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="pvatbrs" value="<?php echo $piece->pvatbrs; ?>" disabled></td><td><?php if($piece->pvatbrs > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->burin > 0){ ?><tr class="<?php if($piece->burin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->burin > 0){ ?>  <?php echo("Bandelette urinaire : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->burin > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="burin" value="<?php echo $piece->burin; ?>" disabled></td><td><?php if($piece->burin > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->psa > 0){ ?><tr class="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->psa > 0){ ?>  <?php echo("PSA : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="psa" value="<?php echo $piece->psa; ?>" disabled></td><td><?php if($piece->psa > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tsh > 0){ ?><tr class="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tsh > 0){ ?>  <?php echo("TSH  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="tsh" value="<?php echo $piece->tsh; ?>" disabled></td><td><?php if($piece->tsh > 0){echo "0.25 - 5 Uui/ml";} ?></td></tr><?php } ?>
                              <?php if($piece->t3 > 0){ ?><tr class="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->t3 > 0){ ?>  <?php echo("FT3  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="t3" value="<?php echo $piece->t3; ?>" disabled></td><td><?php if($piece->t3 > 0){echo "4 - 8.3 Pmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->t4 > 0){ ?><tr class="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->t4 > 0){ ?>  <?php echo("FT4  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="t4" value="<?php echo $piece->t4; ?>" disabled></td><td><?php if($piece->t4 > 0){echo "9 - 20 Pmol/l";} ?></td></tr><?php } ?>
                              <?php if($piece->betahcg > 0){ ?><tr class="<?php if($piece->betahcg > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->betahcg > 0){ ?>  <?php echo("BETA HCG : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->betahcg > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="betahcg" value="<?php echo $piece->betahcg; ?>" disabled></td><td><?php if($piece->betahcg > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->psa_free > 0){ ?><tr class="<?php if($piece->psa_free > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->psa_free > 0){ ?>  <?php echo("PSA free : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->psa_free > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="psa_free" value="<?php echo $piece->psa_free; ?>" disabled></td><td><?php if($piece->psa_free > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->progestérone > 0){ ?><tr class="<?php if($piece->progestérone > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->progestérone > 0){ ?>  <?php echo("Progestérone : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->progestérone > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="progestérone" value="<?php echo $piece->progestérone; ?>" disabled></td><td><?php if($piece->progestérone > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->acahbc > 0){ ?><tr class="<?php if($piece->acahbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->acahbc > 0){ ?>  <?php echo("AC ANTI HBC TOTAUX : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->acahbc > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="acahbc" value="<?php echo $piece->acahbc; ?>" disabled></td><td><?php if($piece->acahbc > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ca125 > 0){ ?><tr class="<?php if($piece->ca125 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ca125 > 0){ ?>  <?php echo("CA 125 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ca125 > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ca125" value="<?php echo $piece->ca125; ?>" disabled></td><td><?php if($piece->ca125 > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ca19 > 0){ ?><tr class="<?php if($piece->ca19 > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ca19 > 0){ ?>  <?php echo("CA 19.9 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ca19 > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ca19" value="<?php echo $piece->ca19; ?>" disabled></td><td><?php if($piece->ca19 > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->testo > 0){ ?><tr class="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->testo > 0){ ?>  <?php echo("TESTOSTERONE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="testo" value="<?php echo $piece->testo; ?>" disabled></td><td><?php if($piece->testo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->tropo > 0){ ?><tr class="<?php if($piece->tropo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->tropo > 0){ ?>  <?php echo("TROPONINE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->tropo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="tropo" value="<?php echo $piece->tropo; ?>" disabled></td><td><?php if($piece->tropo > 0){echo "<19 ng/l";} ?></td></tr><?php } ?>
                              <?php if($piece->ac_anti_hbs > 0){ ?><tr class="<?php if($piece->ac_anti_hbs > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ac_anti_hbs > 0){ ?>  <?php echo("Ac Anti Hbs : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ac_anti_hbs > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ac_anti_hbs" value="<?php echo $piece->ac_anti_hbs; ?>" disabled></td><td><?php if($piece->ac_anti_hbs > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->oestradiol > 0){ ?><tr class="<?php if($piece->oestradiol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->oestradiol > 0){ ?>  <?php echo("Œstradiol : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->oestradiol > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="oestradiol" value="<?php echo $piece->oestradiol; ?>" disabled></td><td><?php if($piece->oestradiol > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->dimeres > 0){ ?><tr class="<?php if($piece->dimeres > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->dimeres > 0){ ?>  <?php echo("DDIMERES : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->dimeres > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="dimeres" value="<?php echo $piece->dimeres; ?>" disabled></td><td><?php if($piece->dimeres > 0){echo "<500 ng/ml";} ?></td></tr><?php } ?>
                              <?php if($piece->prl > 0){ ?><tr class="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->prl > 0){ ?>  <?php echo("PROLACTINE  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="prl" value="<?php echo $piece->prl; ?>" disabled></td><td><?php if($piece->prl > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->fsh > 0){ ?><tr class="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->fsh > 0){ ?>  <?php echo("FSH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="fsh" value="<?php echo $piece->fsh; ?>" disabled></td><td><?php if($piece->fsh > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->lh > 0){ ?><tr class="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->lh > 0){ ?>  <?php echo("LH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="lh" value="<?php echo $piece->lh; ?>" disabled></td><td><?php if($piece->lh > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if($piece->ag_hbe > 0){ ?><tr class="<?php if($piece->ag_hbe > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ag_hbe > 0){ ?>  <?php echo("Ag Hbe: "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ag_hbe > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ag_hbe" value="<?php echo $piece->ag_hbe; ?>" disabled></td><td><?php if($piece->ag_hbe > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->ac_anti_hbe > 0){ ?><tr class="<?php if($piece->ac_anti_hbe > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->ac_anti_hbe > 0){ ?>  <?php echo("Ac Anti Hbe  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->ac_anti_hbe > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="ac_anti_hbe" value="<?php echo $piece->ac_anti_hbe; ?>" disabled></td><td><?php if($piece->ac_anti_hbe > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->nt_proBNP > 0){ ?><tr class="<?php if($piece->nt_proBNP > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->nt_proBNP > 0){ ?>  <?php echo("NT-proBNP : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->nt_proBNP > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="nt_proBNP" value="<?php echo $piece->nt_proBNP; ?>" disabled></td><td><?php if($piece->nt_proBNP > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if($piece->hbsag > 0){ ?><tr class="<?php if($piece->hbsag > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbsag > 0){ ?>  <?php echo("Ag Hbs : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbsag > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hbsag" value="<?php echo $piece->hbsag; ?>" disabled></td><td><?php if($piece->hbsag > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hcvab > 0){ ?><tr class="<?php if($piece->hcvab > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hcvab > 0){ ?>  <?php echo("Ac Anti HCV : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hcvab > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hcvab" value="<?php echo $piece->hcvab; ?>" disabled></td><td><?php if($piece->hcvab > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hivab > 0){ ?><tr class="<?php if($piece->hivab > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hivab > 0){ ?>  <?php echo("Ac anti  HIV : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hivab > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hivab" value="<?php echo $piece->hivab; ?>" disabled></td><td><?php if($piece->hivab > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hbc > 0){ ?><tr class="<?php if($piece->hbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbc > 0){ ?>  <?php echo("HBC : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbc > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hbc" value="<?php echo $piece->hbc; ?>" disabled></td><td><?php if($piece->hbc > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->crp > 0){ ?><tr class="<?php if($piece->crp > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->crp > 0){ ?>  <?php echo("CRP : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->crp > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="crp" value="<?php echo $piece->crp; ?>" disabled></td><td><?php if($piece->crp > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->facrhu > 0){ ?><tr class="<?php if($piece->facrhu > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->facrhu > 0){ ?>  <?php echo("FACTEUR RHUMATOIDE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->facrhu > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="facrhu" value="<?php echo $piece->facrhu; ?>" disabled></td><td><?php if($piece->facrhu > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->aslo > 0){ ?><tr class="<?php if($piece->aslo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->aslo > 0){ ?>  <?php echo("ASLO : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->aslo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="aslo" value="<?php echo $piece->aslo; ?>" disabled></td><td><?php if($piece->aslo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->vdrl > 0){ ?><tr class="<?php if($piece->vdrl > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->vdrl > 0){ ?>  <?php echo("SYPHILIS : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->vdrl > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="vdrl" value="<?php echo $piece->vdrl; ?>" disabled></td><td><?php if($piece->vdrl > 0){echo "";} ?></td></tr><?php } ?>

                              <?php if($piece->hav > 0){ ?><tr class="<?php if($piece->hav > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hav > 0){ ?>  <?php echo("HAV  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hav > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hav" value="<?php echo $piece->hav; ?>" disabled></td><td><?php if($piece->hav > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->serologie_typhoide > 0){ ?><tr class="<?php if($piece->serologie_typhoide > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->serologie_typhoide > 0){ ?>  <?php echo("Sérologie Typhoïde : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->serologie_typhoide > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="serologie_typhoide" value="<?php echo $piece->serologie_typhoide; ?>" disabled></td><td><?php if($piece->serologie_typhoide > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->hbpylo > 0){ ?><tr class="<?php if($piece->hbpylo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->hbpylo > 0){ ?>  <?php echo("HELICOBACTER PYLORI (HP) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->hbpylo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="hbpylo" value="<?php echo $piece->hbpylo; ?>" disabled></td><td><?php if($piece->hbpylo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->toxo > 0){ ?><tr class="<?php if($piece->toxo > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->toxo > 0){ ?>  <?php echo("TOXOPLASMOSE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->toxo > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="toxo" value="<?php echo $piece->toxo; ?>" disabled></td><td><?php if($piece->toxo > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->rub > 0){ ?><tr class="<?php if($piece->rub > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->rub > 0){ ?>  <?php echo("RUBEOLE  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->rub > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="rub" value="<?php echo $piece->rub; ?>" disabled></td><td><?php if($piece->rub > 0){echo "";} ?></td></tr><?php } ?>
                              <?php if($piece->serologie_brucellose > 0){ ?><tr class="<?php if($piece->serologie_brucellose > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->serologie_brucellose > 0){ ?>  <?php echo("Sérologie Brucellose : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?></td><td></td><td><input type="<?php if($piece->serologie_brucellose > 0){ echo("text"); }else{echo("hidden");} ?>" class="form-control" name="serologie_brucellose" value="<?php echo $piece->serologie_brucellose; ?>" disabled></td><td><?php if($piece->serologie_brucellose > 0){echo "";} ?></td></tr><?php } ?>

                            </tbody>
                          </table>
                          <input type="hidden" name="pandoc" value="<?php echo $piece->pandoc; ?>"> 
                          <?php 
                            endforeach; 
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <button class="form-control bg-light"><i class="fas fa-save"></i> <a href="Resultat?id=<?php echo $ids;?>">Imprimer</a></button>
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