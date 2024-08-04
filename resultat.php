<?php
header('Content-Type: text/html; charset=utf-8');
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 

if(!empty($_GET['id'])) {
	$ids = $_GET['id'];
}else{
	redirect_to("Accueil");
}
// Connexion à la BDD (à personnaliser)
$link = mysqli_connect('localhost', 'root', '', 'spn');
// Si base de données en UTF-8, utiliser la fonction utf8_decode pour tous les champs de texte à afficher

// extraction des données à afficher dans le sous-titre (nom du voyageur et dates de son voyage)

$requete = "SELECT examens.ide,  examens.idp, examens.name, examens.phone, examens.address, examens.age, examens.sex, examens.numcard, examens.price, examens.heurfexam, examens.datej, examens.fg, examens.rg, examens.hgpo, examens.chol, examens.c_hdl, examens.c_ldl, examens.tc, examens.sgot, examens.ldh, examens.sgptalt, examens.urea, examens.crea, examens.ua, examens.alb, examens.br, examens.brdi, examens.alkphos, examens.calc, examens.magn, examens.ptp, examens.gtt, examens.ioskna, examens.ioskk, examens.ioskcl, examens.proteinurie, examens.fer_serique, examens.ferritine, examens.proteinurie_24h, examens.ck_mb, examens.lipasemie, examens.cbc, examens.cbc2, examens.cbc3, examens.cbc4, examens.cbc5, examens.cbc6, examens.cbc7, examens.cbc8, examens.cbc9, examens.cbc10, examens.cbc11, examens.abog, examens.ptaptt, examens.tpinr, examens.rbcm, examens.testemel, examens.tauret, examens.esr, examens.ge_fm, examens.urin, examens.u_asp, examens.u_leu, examens.u_hema, examens.u_bac, examens.u_lev, examens.u_e_par, examens.u_cris, examens.u_cyl, examens.u_c_epi, examens.stol, examens.s_asp, examens.s_leu, examens.s_lev, examens.s_hema, examens.s_para, examens.s_cul, examens.s_es_id, examens.s_sen, examens.s_resis, examens.s_con, examens.urinbs, examens.c_asp, examens.c_leu, examens.c_hema, examens.c_bac, examens.c_cris, examens.c_cyl, examens.c_c_epi, examens.c_cul, examens.c_con, examens.sob, examens.bs_asp, examens.bs_leu, examens.bs_lev, examens.bs_hema, examens.bs_para, examens.bs_cul, examens.bs_con, examens.pus, examens.csfre, examens.coproculture, examens.cytobacterio_expectorations, examens.liquide_ponction, examens.recherche_rotadeno_selles, examens.recherche_ag_h_pylori_selles, examens.recherche_hav_selles, examens.pore, examens.pgorg, examens.pvatb, examens.bv_asp, examens.bv_ode, examens.bv_leu, examens.bv_hema, examens.bv_c_epi, examens.bv_f_sl, examens.bv_t_vag, examens.bv_cul, examens.bv_con, examens.pvatbrs, examens.rs_rch, examens.rs_rm_uu, examens.rs_rm_mh, examens.rs_ant_sen, examens.rs_resis, examens.burin, examens.psa, examens.tsh, examens.t3, examens.t4, examens.betahcg, examens.psa_free, examens.progestérone, examens.acahbc, examens.ca125, examens.ca19, examens.testo, examens.tropo, examens.ac_anti_hbs, examens.oestradiol, examens.dimeres, examens.prl, examens.fsh, examens.lh, examens.ag_hbe, examens.ac_anti_hbe, examens.nt_proBNP, examens.hbsag, examens.hcvab, examens.hivab, examens.hbc, examens.crp, examens.facrhu, examens.aslo, examens.vdrl, examens.hav, examens.serologie_typhoide, examens.hbpylo, examens.toxo, examens.rub, examens.serologie_brucellose, examens.pandoc, examens.pcandoc, examens.chk, examens.res, patient.idp, patient.civi, patient.nom, patient.sex, patient.age, patient.daten, patient.tel, patient.address, andocs.idan, andocs.heurdexam, andocs.datexam FROM patient, examens, andocs where examens.idp = patient.idp and examens.idp = andocs.idan and examens.ide = '$ids'";

$ide = "";
$nom = "";
$datej = "";
$age = 0;
$daten = "";
$sex = "";
$fg = "";
$rg = "";
$hgpo = "";
$chol = "";
$c_hdl = "";
$c_ldl = "";
$tc = "";
$sgot = "";
$ldh  = "";
$sgptalt  = "";
$urea = "";
$crea = "";
$ua = "";
$alb  = "";
$br = "";
$brdi = "";
$alkphos  = "";
$calc = "";
$magn = "";
$ptp  = "";
$gtt  = "";
$ioskna = "";
$ioskk = "";
$ioskcl = "";
$proteinurie = "";
$fer_serique = "";
$ferritine = "";
$proteinurie_24h = "";
$ck_mb = "";
$lipasemie = "";
$cbc  = "";
$abog = "";
$ptaptt = "";
$tpinr  = "";
$rbcm = "";
$testemel = "";
$tauret = "";
$esr  = "";
$ge_fm = "";
$abog = "";
$ptaptt = "";
$tpinr = "";
$rbcm = "";
$testemel = "";
$tauret = "";
$esr = "";
$ge_fm = "";
$urin = "";
$u_asp = "";
$u_leu = "";
$u_hema = "";
$u_bac = "";
$u_lev = "";
$u_e_par = "";
$u_cris = "";
$u_cyl = "";
$u_c_epi = "";
$stol = "";
$s_asp = "";
$s_leu = "";
$s_lev = "";
$s_hema = "";
$s_para = "";
$s_cul = "";
$s_es_id = "";
$s_sen = "";
$s_resis = "";
$s_con = "";
$urinbs = "";
$c_asp = "";
$c_leu = "";
$c_hema = "";
$c_bac = "";
$c_cris = "";
$c_cyl = "";
$c_c_epi = "";
$c_cul = "";
$c_con = "";
$sob = "";
$bs_asp = "";
$bs_leu = "";
$bs_lev = "";
$bs_hema = "";
$bs_para = "";
$bs_cul = "";
$bs_con = "";
$pus = "";
$csfre = "";
$pore = "";
$pgorg = "";
$pvatb = "";
$bv_asp = "";
$bv_ode = "";
$bv_leu = "";
$bv_hema = "";
$bv_c_epi = "";
$bv_f_sl = "";
$bv_t_vag = "";
$bv_cul = "";
$bv_con = "";
$pvatbrs = "";
$rs_rch = "";
$rs_rm_uu = "";
$rs_rm_mh = "";
$rs_ant_sen = "";
$rs_resis = "";
$burin  = "";
$psa  = "";
$tsh  = "";
$t3 = "";
$t4 = "";
$betahcg  = "";
$psa_free  = "";
$progestérone  = "";
$acahbc = "";
$ca125  = "";
$ca19 = "";
$testo  = "";
$tropo  = "";
$ac_anti_hbs  = "";
$oestradiol  = "";
$dimeres  = "";
$prl  = "";
$fsh  = "";
$lh = "";
$ag_hbe = "";
$ac_anti_hbe = "";
$nt_proBNP = "";
$hbsag  = "";
$hcvab  = "";
$hivab  = "";
$hbc  = "";
$crp  = "";
$facrhu = "";
$aslo = "";
$vdrl = "";
$hav  = "";
$serologie_typhoide  = "";
$hbpylo = "";
$toxo = "";
$rub  = "";
$serologie_brucellose  = "";
$coproculture = "";
$cytobacterio_expectorations = "";
$liquide_ponction = "";
$recherche_rotadeno_selles = "";
$recherche_ag_h_pylori_selles = "";
$recherche_hav_selles = "";


$result = mysqli_query($link, $requete);
// tableau des résultats de la ligne > $data_voyageur['nom_champ']
$rowfact = mysqli_fetch_array($result);
mysqli_free_result($result);

$ide = $rowfact["ide"];
$civi = $rowfact["civi"];
$nom = substr($rowfact["nom"],0,20);
$datej = $rowfact["datej"];
$age = $rowfact["age"];
$daten = $rowfact["daten"];
$sex = $rowfact["sex"];
$fg = $rowfact["fg"];
$rg = $rowfact["rg"];
$hgpo = $rowfact["hgpo"];
$chol = $rowfact["chol"];
$c_hdl = $rowfact["c_hdl"];
$c_ldl = $rowfact["c_ldl"];
$tc = $rowfact["tc"];
$sgot = $rowfact["sgot"];
$ldh = $rowfact["ldh"];
$sgptalt = $rowfact["sgptalt"];
$urea = $rowfact["urea"];
$crea = $rowfact["crea"];
$ua = $rowfact["ua"];
$alb = $rowfact["alb"];
$br = $rowfact["br"];
$brdi = $rowfact["brdi"];
$alkphos = $rowfact["alkphos"];
$calc = $rowfact["calc"];
$magn = $rowfact["magn"];
$ptp = $rowfact["ptp"];
$gtt = $rowfact["gtt"];
$ioskna = $rowfact["ioskna"];
$ioskk = $rowfact["ioskk"];
$ioskcl = $rowfact["ioskcl"];
$proteinurie = $rowfact["proteinurie"];
$fer_serique = $rowfact["fer_serique"];
$ferritine = $rowfact["ferritine"];
$proteinurie_24h = $rowfact["proteinurie_24h"];
$ck_mb = $rowfact["ck_mb"];
$lipasemie = $rowfact["lipasemie"];
$cbc = $rowfact["cbc"];
$cbc2 = $rowfact["cbc2"];
$cbc3 = $rowfact["cbc3"];
$cbc4 = $rowfact["cbc4"];
$cbc5 = $rowfact["cbc5"];
$cbc6 = $rowfact["cbc6"];
$cbc7 = $rowfact["cbc7"];
$cbc8 = $rowfact["cbc8"];
$cbc9 = $rowfact["cbc9"];
$cbc10 = $rowfact["cbc10"];
$cbc11 = $rowfact["cbc11"];
$abog = $rowfact["abog"];
$ptaptt = $rowfact["ptaptt"];
$tpinr = $rowfact["tpinr"];
$rbcm = $rowfact["rbcm"];
$testemel = $rowfact["testemel"];
$tauret = $rowfact["tauret"];
$ge_fm = $rowfact["ge_fm"];
$esr = $rowfact["esr"];
$urin = $rowfact["urin"];
$u_asp = $rowfact["u_asp"];
$u_leu = $rowfact["u_leu"];
$u_hema = $rowfact["u_hema"];
$u_bac = $rowfact["u_bac"];
$u_lev = $rowfact["u_lev"];
$u_e_par = $rowfact["u_e_par"];
$u_cris = $rowfact["u_cris"];
$u_cyl = $rowfact["u_cyl"];
$u_c_epi = $rowfact["u_c_epi"];
$stol = $rowfact["stol"];
$s_asp = $rowfact["s_asp"];
$s_leu = $rowfact["s_leu"];
$s_lev = $rowfact["s_lev"];
$s_hema = $rowfact["s_hema"];
$s_para = $rowfact["s_para"];
$s_cul = $rowfact["s_cul"];
$s_es_id = $rowfact["s_es_id"];
$s_sen = $rowfact["s_sen"];
$s_resis = $rowfact["s_resis"];
$s_con = $rowfact["s_con"];
$urinbs = $rowfact["urinbs"];
$c_asp = $rowfact["c_asp"];
$c_leu = $rowfact["c_leu"];
$c_hema = $rowfact["c_hema"];
$c_bac = $rowfact["c_bac"];
$c_cris = $rowfact["c_cris"];
$c_cyl = $rowfact["c_cyl"];
$c_c_epi = $rowfact["c_c_epi"];
$c_cul = $rowfact["c_cul"];
$c_con = $rowfact["c_con"];
$sob = $rowfact["sob"];
$bs_asp = $rowfact["bs_asp"];
$bs_leu = $rowfact["bs_leu"];
$bs_lev = $rowfact["bs_lev"];
$bs_hema = $rowfact["bs_hema"];
$bs_para = $rowfact["bs_para"];
$bs_cul = $rowfact["bs_cul"];
$bs_con = $rowfact["bs_con"];
$pus = $rowfact["pus"];
$csfre = $rowfact["csfre"];
$pore = $rowfact["pore"];
$pgorg = $rowfact["pgorg"];
$pvatb = $rowfact["pvatb"];
$bv_asp = $rowfact["bv_asp"];
$bv_ode = $rowfact["bv_ode"];
$bv_leu = $rowfact["bv_leu"];
$bv_hema = $rowfact["bv_hema"];
$bv_c_epi = $rowfact["bv_c_epi"];
$bv_f_sl = $rowfact["bv_f_sl"];
$bv_t_vag = $rowfact["bv_t_vag"];
$bv_cul = $rowfact["bv_cul"];
$bv_con = $rowfact["bv_con"];
$pvatbrs = $rowfact["pvatbrs"];
$rs_rch = $rowfact["rs_rch"];
$rs_rm_uu = $rowfact["rs_rm_uu"];
$rs_rm_mh = $rowfact["rs_rm_mh"];
$rs_ant_sen = $rowfact["rs_ant_sen"];
$rs_resis = $rowfact["rs_resis"];
$burin = $rowfact["burin"];
$psa = $rowfact["psa"];
$tsh = $rowfact["tsh"];
$t3 = $rowfact["t3"];
$t4 = $rowfact["t4"];
$betahcg = $rowfact["betahcg"];
$psa_free = $rowfact["psa_free"];
$progestérone = $rowfact["progestérone"];
$acahbc = $rowfact["acahbc"];
$ca125 = $rowfact["ca125"];
$ca19 = $rowfact["ca19"];
$testo = $rowfact["testo"];
$tropo = $rowfact["tropo"];
$ac_anti_hbs = $rowfact["ac_anti_hbs"];
$oestradiol = $rowfact["oestradiol"];
$dimeres = $rowfact["dimeres"];
$prl = $rowfact["prl"];
$fsh = $rowfact["fsh"];
$lh = $rowfact["lh"];
$ag_hbe = $rowfact["ag_hbe"];
$ac_anti_hbe = $rowfact["ac_anti_hbe"];
$nt_proBNP = $rowfact["nt_proBNP"];
$hbsag = $rowfact["hbsag"];
$hcvab = $rowfact["hcvab"];
$hivab = $rowfact["hivab"];
$hbc = $rowfact["hbc"];
$crp = $rowfact["crp"];
$facrhu = $rowfact["facrhu"];
$aslo = $rowfact["aslo"];
$vdrl = $rowfact["vdrl"];
$hav = $rowfact["hav"];
$serologie_typhoide = $rowfact["serologie_typhoide"];
$hbpylo = $rowfact["hbpylo"];
$toxo = $rowfact["toxo"];
$rub = $rowfact["rub"];
$serologie_brucellose = $rowfact["serologie_brucellose"];
$coproculture = $rowfact["coproculture"];
$cytobacterio_expectorations = $rowfact["cytobacterio_expectorations"];
$liquide_ponction = $rowfact["liquide_ponction"];
$recherche_rotadeno_selles = $rowfact["recherche_rotadeno_selles"];
$recherche_ag_h_pylori_selles = $rowfact["recherche_ag_h_pylori_selles"];
$recherche_hav_selles = $rowfact["recherche_hav_selles"];


$ide = $ide."\n";
$nom = $nom."\n";
$datej = $datej."\n";
$age = $age."\n";
$daten = $daten."\n";
$sex = $sex."\n";
$fg = $fg."\n";
$rg = $rg."\n";
$hgpo = $hgpo."\n";
$chol = $chol."\n";
$c_hdl = $c_hdl."\n";
$c_ldl = $c_ldl."\n";
$tc = $tc."\n";
$sgot = $sgot."\n";
$ldh = $ldh."\n";
$sgptalt = $sgptalt."\n";
$urea = $urea."\n";
$crea = $crea."\n";
$ua = $ua."\n";
$alb = $alb."\n";
$br = $br."\n";
$brdi = $brdi."\n";
$alkphos = $alkphos."\n";
$calc = $calc."\n";
$magn = $magn."\n";
$ptp = $ptp."\n";
$gtt = $gtt."\n";
$ioskna = $ioskna."\n";
$ioskk = $ioskk."\n";
$ioskcl = $ioskcl."\n";
$proteinurie = $proteinurie."\n";
$fer_serique = $fer_serique."\n";
$ferritine = $ferritine."\n";
$proteinurie_24h = $proteinurie_24h."\n";
$ck_mb = $ck_mb."\n";
$lipasemie = $lipasemie."\n";
$cbc = $cbc."\n";
$cbc2 = $cbc2."\n";
$cbc3 = $cbc3."\n";
$cbc4 = $cbc4."\n";
$cbc5 = $cbc5."\n";
$cbc6 = $cbc6."\n";
$cbc7 = $cbc7."\n";
$cbc8 = $cbc8."\n";
$cbc9 = $cbc9."\n";
$cbc10 = $cbc10."\n";
$cbc11 = $cbc11."\n";
$abog = $abog."\n";
$ptaptt = $ptaptt."\n";
$tpinr = $tpinr."\n";
$rbcm = $rbcm."\n";
$testemel = $testemel."\n";
$tauret = $tauret."\n";
$ge_fm = $ge_fm."\n";
$esr = $esr."\n";
$urin = $urin."\n";
$u_asp = $u_asp."\n";
$u_leu = $u_leu."\n";
$u_hema = $u_hema."\n";
$u_bac = $u_bac."\n";
$u_lev = $u_lev."\n";
$u_e_par = $u_e_par."\n";
$u_cris = $u_cris."\n";
$u_cyl = $u_cyl."\n";
$u_c_epi = $u_c_epi."\n";
$stol = $stol."\n";
$s_asp = $s_asp."\n";
$s_leu = $s_leu."\n";
$s_lev = $s_lev."\n";
$s_hema = $s_hema."\n";
$s_para = $s_para."\n";
$s_cul = $s_cul."\n";
$s_es_id = $s_es_id."\n";
$s_sen = $s_es_id."\n";
$s_resis = $s_es_id."\n";
$s_con = $s_con."\n";
$urinbs = $urinbs."\n";
$c_asp = $c_asp."\n";
$c_leu = $c_leu."\n";
$c_hema = $c_hema."\n";
$c_bac = $c_bac."\n";
$c_cris = $c_cris."\n";
$c_cyl = $c_cyl."\n";
$c_c_epi = $c_c_epi."\n";
$c_cul = $c_cul."\n";
$c_con = $c_con."\n";
$sob = $sob."\n";
$bs_asp = $bs_asp."\n";
$bs_leu = $bs_leu."\n";
$bs_lev = $bs_lev."\n";
$bs_hema = $bs_hema."\n";
$bs_para = $bs_para."\n";
$bs_cul = $bs_cul."\n";
$bs_con = $bs_con."\n";
$pus = $pus."\n";
$csfre = $csfre."\n";
$pore = $pore."\n";
$pgorg = $pgorg."\n";
$pvatb = $pvatb."\n";
$bv_asp = $bv_asp."\n";
$bv_ode = $bv_ode."\n";
$bv_leu = $bv_leu."\n";
$bv_hema = $bv_hema."\n";
$bv_c_epi = $bv_c_epi."\n";
$bv_f_sl = $bv_f_sl."\n";
$bv_t_vag = $bv_t_vag."\n";
$bv_cul = $bv_cul."\n";
$bv_con = $bv_con."\n";
$pvatbrs = $pvatbrs."\n";
$rs_rch = $rs_rch."\n";
$rs_rm_uu = $rs_rm_uu."\n";
$rs_rm_mh = $rs_rm_mh."\n";
$rs_ant_sen = $rs_ant_sen."\n";
$rs_resis = $rs_resis."\n";
$burin = $burin."\n";
$psa = $psa."\n";
$tsh = $tsh."\n";
$t3 = $t3."\n";
$t4 = $t4."\n";
$betahcg = $betahcg."\n";
$psa_free = $psa_free."\n";
$progestérone = $progestérone."\n";
$acahbc = $acahbc."\n";
$ca125 = $ca125."\n";
$ca19 = $ca19."\n";
$testo = $testo."\n";
$tropo = $tropo."\n";
$ac_anti_hbs = $ac_anti_hbs."\n";
$oestradiol = $oestradiol."\n";
$dimeres = $dimeres."\n";
$prl = $prl."\n";
$fsh = $fsh."\n";
$lh = $lh."\n";
$ag_hbe = $ag_hbe."\n";
$ac_anti_hbe = $ac_anti_hbe."\n";
$nt_proBNP = $nt_proBNP."\n";
$hbsag = $hbsag."\n";
$hcvab = $hcvab."\n";
$hivab = $hivab."\n";
$hbc = $hbc."\n";
$crp = $crp."\n";
$facrhu = $facrhu."\n";
$aslo = $aslo."\n";
$vdrl = $vdrl."\n";
$hav = $hav."\n";
$serologie_typhoide = $serologie_typhoide."\n";
$hbpylo = $hbpylo."\n";
$toxo = $toxo."\n";
$rub = $rub."\n";
$serologie_brucellose = $serologie_brucellose."\n";
$coproculture = $coproculture."\n";
$cytobacterio_expectorations = $cytobacterio_expectorations."\n";
$liquide_ponction = $liquide_ponction."\n";
$recherche_rotadeno_selles =  $recherche_rotadeno_selles."\n";
$recherche_ag_h_pylori_selles = $recherche_ag_h_pylori_selles."\n";
$recherche_hav_selles = $recherche_hav_selles."\n";


$datedujour = date("d/m/Y");
$h = date("H");
$m = date("i");
$s = date("s");
$hs = $h + 2;
$dc = date('d/m/Y ');
$datedc = $dc." ".$hs.":".$m.":".$s ;



/*$sql1 = $link->query("SELECT prescription.id, prescription.datord, ordonnance.ido, ordonnance.medic, ordonnance.poso, ordonnance.nbrjr, patient.civi, patient.nom FROM patient, ordonnance, prescription where prescription.id = ordonnance.idord and prescription.id = '$ids' and patient.idp = prescription.idp order by ordonnance.ido ASC");
$row_cnt1 = $sql1->num_rows;
mysqli_free_result($result);*/

// Appel de la librairie FPDF
require("fpdf/fpdf.php");
require('fpdf/font/helveticai.php');

class PDF extends FPDF
{
    function addSignature($name)
    {
        $this->Ln(20); // Espace avant la signature
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'LE BIOLOGISTE', 0, 1, 'C');
        $this->Ln(1); // Espace entre 'Signature:' et le nom
        $this->Cell(0, 10, $name, 0, 1, 'C');
    }
}

// Création de la class PDF polic.png

// On active la classe une fois pour toutes les pages suivantes
// Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
$pdf = new PDF('P','mm','A4');

// Nouvelle page A4 (incluant ici logo, titre et pied de page)
$pdf->AddPage();
$image = "policess.png";
$pdf-> Image($image,25,10,40,48);
$pdf->SetFont('times', 'B',11);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"REPUBLIQUE DE DJIBOUTI",0,1,'C');
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"******************",0,1,'C');
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"MINISTERE DE L'INTERIEUR",0,1,'C');
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"******************",0,1,'C');
$pdf->SetFont('times', 'B',11);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(90  ,5,"HOPITAL POLICE NATIONALE",0,1,'C');
$pdf->Cell(90  ,5,"",0,0);
$pdf->SetFont('times', '',18);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(90  ,5,"----------------------",0,1,'C');
//$pdf->Cell(90  ,5,"",0,0);
$pdf->Cell(189, 5, '', 0, 1);
$pdf->Cell(189, 5, '', 0, 1);
$pdf->SetTextColor(0, 128, 0);
// Ajouter le texte

$pdf->Cell(189, 5, utf8_decode("Laboratoire de Biologie Médicale"), 0, 1, 'C');
$pdf->Cell(189, 5, utf8_decode(""), 0, 1, 'C');

// Ajouter une ligne en dessous pour souligner toute la ligne
$pdf->SetDrawColor(0, 128, 0); // Assurez-vous que la ligne est de la même couleur que le texte
$x = 10; // Position de départ en x (marge gauche standard)
$y = $pdf->GetY(); // Position de la ligne en y (juste après le texte)
$pdf->Line($x, $y, 200, $y); // Ligne de marge gauche à marge droite (A4 width is 210mm)
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', '', 10);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(189, 5, '', 0, 1);
//$pdf->Cell(20  ,5,'Nom : ',0,0);
//$pdf->SetFont('Arial', 'B',10);
/*$pdf->Cell(75  ,5,$civi ." ". $nom,0,1);
$pdf->SetFont('Arial', '',8);
$pdf->Cell(13  ,5,utf8_decode('Né(e) le : '),0,0);
$pdf->SetFont('Arial', '',8);
$pdf->Cell(20  ,5,$daten. ', Sexe : ' . $sex,0,1);


$pdf->SetFont('Arial', '',8);
$pdf->Cell(13  ,5,utf8_decode('Dossier N°: '. $rowfact['idp']),0,1);

$pdf->Cell(13  ,5,utf8_decode('Date de l\'examen : '. $datej . ' '. $rowfact['heurfexam']),0,1);*/

$pdf->Cell(189  ,5,$civi ." ". $nom,0,1,'L');
$pdf->SetFont('Arial', '',8);
//$pdf->Cell(13  ,5,utf8_decode('Né(e) le : '),0,0,'C');
$pdf->SetFont('Arial', '',8);
$pdf->Cell(189  ,5,utf8_decode('Né(e) le : ').$daten. ', Sexe : ' . utf8_decode($sex),0,1,);


$pdf->SetFont('Arial', '',8);
$pdf->Cell(189  ,5,utf8_decode('Dossier N°: '. $rowfact['idp']),0,1);

$pdf->Cell(90  ,5,utf8_decode('Date de l\'examen : '. $datej . ' '. $rowfact['heurfexam']),0,0);
$pdf->Cell(99  ,5,utf8_decode('Date de résultat : '. $datedc),0,1,'R');



$pdf->SetFont('Arial', 'B',11);
/*
$pdf->Cell(75  ,5,"Description ",0,0);
$pdf->Cell(30  ,5,"Bas / Haut ",0,0,'C');
$pdf->Cell(40  ,5,"Resultat ",0,0,'C');
$pdf->Cell(30  ,5,"Intervalle",0,0,'C'); */
//$pdf->Cell(40  ,5,"Range ",0,0,'C');
//$pdf->Cell(189  ,5,"",0,1);
$pdf->SetFont('Arial', '',10);

if ($fg != 0 or $rg != 0 or $hgpo!= 0 or $chol!= 0 or $tc != 0 or $sgot!= 0 or $ldh!= 0 or $sgptalt!= 0 or $urea!= 0 or $crea!= 0 or $ua != 0 or $alb!= 0 or $br != 0 or $brdi!= 0 or $alkphos!= 0 or $calc!= 0 or $magn!= 0 or $ptp!= 0 or $gtt!= 0 or $ioskna!= 0 or $ioskk!= 0 or $ioskcl!= 0 or $proteinurie!= 0 or $fer_serique!= 0 or $ferritine!= 0 or $proteinurie_24h!= 0 or $ck_mb!= 0 or $lipasemie!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,10,"BIOCHIMIE SANGUINE",1,1,'C');
	$pdf->Cell(189  ,5,'',0,1);
}
if ($fg != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Glycemie a jeun: ")),0,0); $pdf->SetFont('Arial', '',10); if($fg< 0.70){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($fg > 1.20){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$fg,0,0,'C'); $pdf->Cell(30,5,"0.70 - 1.20 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 GOD-POD) "),0,1);$pdf->SetFont('Arial', '',10);}
if ($rg != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Glycémie post prandiale : "),0,0); $pdf->SetFont('Arial', '',10); if($rg< 0.70){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($rg > 1.20){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$rg,0,0,'C'); $pdf->Cell(30,5,"0.70 - 1.20 g/l",0,1);$pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 GOD-POD) "),0,1);$pdf->SetFont('Arial', '',10);}
if ($hgpo!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Hyperglycémie provoquée par voie orale (HGPO): "),0,0);$pdf->SetFont('Arial', '',10); if($hgpo< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hgpo > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hgpo,0,0,'C'); $pdf->Cell(30,5,utf8_decode(""),0,1); $pdf->SetFont('Arial', '',8); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 GOD-POD) "),0,1);$pdf->SetFont('Arial', '',10);}
if ($hgpo!= 0) { $pdf->Cell(189,5,utf8_decode("- Glycémie à jeun : 5.1 mmol/L (0.92 g/L)."),0,1,'C'); }
if ($hgpo!= 0) { $pdf->Cell(189,5,utf8_decode("- Glycémie à 1h : 10 mmol/L (1.80 g/L)."),0,1,'C'); }
if ($hgpo!= 0) { $pdf->Cell(189,5,utf8_decode("- Glycémie à 2h : 8.5 mmol/L (1.53g/L). "),0,1,'C'); }
if ($chol!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cholesterol Total: ")),0,0); $pdf->SetFont('Arial', '',10); if($chol< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($chol > 2.00){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$chol,0,0,'C'); $pdf->Cell(30,5,"<2.00 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 CHOD-POD) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($c_hdl!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("C-HDL : ")),0,0); $pdf->SetFont('Arial', '',10); if($c_hdl< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($c_hdl > 2.00){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$c_hdl,0,0,'C'); $pdf->Cell(30,5,"<2.00 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 CHOD-POD) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($c_ldl!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("C-LDL : ")),0,0); $pdf->SetFont('Arial', '',10); if($c_ldl< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($c_ldl > 2.00){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$c_ldl,0,0,'C'); $pdf->Cell(30,5,"<2.00 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 CHOD-POD) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($tc != 0) {  $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Triglycérides: "),0,0); $pdf->SetFont('Arial', '',10); if($tc< 0.55){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($tc > 1.65){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$tc,0,0,'C'); $pdf->Cell(30,5,"0.55 - 1.65 g/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 GPO-POD) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($sgot!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("ASAT: "),0,0);$pdf->SetFont('Arial', '',10); if($sgot< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($sgot > 35 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$sgot,0,0,'C'); $pdf->Cell(30,5,"<35 Ul/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ldh!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("LDH: "),0,0); $pdf->SetFont('Arial', '',10); if($ldh < 0.12){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ldh > 0.94){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ldh ,0,0,'C'); $pdf->Cell(30,5,"0.12 - 0.94 g/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($sgptalt!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("ALAT: "),0,0);$pdf->SetFont('Arial', '',10); if($sgptalt < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($sgptalt > 40 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$sgptalt ,0,0,'C'); $pdf->Cell(30,5,"<40 Ul/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($urea!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Urée: "),0,0);$pdf->SetFont('Arial', '',10); if($urea< 0.15){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($urea > 0.45){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$urea,0,0,'C'); $pdf->Cell(30,5,"0.15 - 0.45 g/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Uréase-GLDH) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($crea!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Créatinine : "),0,0);$pdf->SetFont('Arial', '',10); if($crea< 6 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($crea > 13 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$crea,0,0,'C'); $pdf->Cell(30,5,"6 - 13 mg/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Méthode de Jaffé) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ua != 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Acide urique(Uricémie) : "),0,0);$pdf->SetFont('Arial', '',10); if($ua< 22){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ua > 77 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ua,0,0,'C'); $pdf->Cell(30,5,"22 - 77 mg/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Uricase-Peroxydase) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($alb!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Albumine: "),0,0);$pdf->SetFont('Arial', '',10); if($alb < 34){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($alb > 54 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$alb ,0,0,'C'); $pdf->Cell(30,5,"34 - 54 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Vert de Bromocrésol) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($br != 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Bilirubine Totale: "),0,0);$pdf->SetFont('Arial', '',10); if($br< 2 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($br > 13 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$br,0,0,'C'); $pdf->Cell(30,5,"2 - 13 mg/l",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($brdi!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Bilirubine Conjuguée (Directe) : "),0,0);$pdf->SetFont('Arial', '',10); if($brdi< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($brdi > 3){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$brdi,0,0,'C'); $pdf->Cell(30,5,"0 - 3 mg/l ",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($alkphos!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Phosphatase Alcaline (PAL) : "),0,0);$pdf->SetFont('Arial', '',10); if($alkphos < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($alkphos > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$alkphos ,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC Modifié) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($calc!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Calcium: "),0,0);$pdf->SetFont('Arial', '',10); if($calc< 2.20){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($calc > 2.60){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$calc,0,0,'C'); $pdf->Cell(30,5,"2.20 - 2.60 mmol/l ",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Arsenazo III) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($magn!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Magnésium: "),0,0);$pdf->SetFont('Arial', '',10); if($magn< 0.7 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($magn > 1.1){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$magn,0,0,'C'); $pdf->Cell(30,5,"0.7 - 1.1 mmol/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Bleu de Xylidyl) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($ptp!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Protéines Totales(Protidémie): "),0,0);$pdf->SetFont('Arial', '',10); if($ptp < 65){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ptp > 80 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ptp ,0,0,'C'); $pdf->Cell(30,5,"65 - 80 g/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Biuret) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($gtt!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Gamma-Glutamyl-Tranférase (GGT): "),0,0);$pdf->SetFont('Arial', '',10); if($gtt < 37){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($gtt > 45 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$gtt ,0,0,'C'); $pdf->Cell(30,5,"37 - 45 Ul/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Szasz /IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ioskna!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ionogramme Sanguin (Na+): "),0,0); $pdf->SetFont('Arial', '',10); if($ioskna< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ioskna > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ioskna,0,0,'C'); $pdf->Cell(30,5,"135 - 145 mmol/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ioskk!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ionogramme Sanguin (K+): "),0,0); $pdf->SetFont('Arial', '',10); if($ioskk< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ioskk > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ioskk,0,0,'C'); $pdf->Cell(30,5,"3,5 - 5,00 mmol/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ioskcl!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ionogramme Sanguin (Cl-): "),0,0); $pdf->SetFont('Arial', '',10); if($ioskcl< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ioskcl > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ioskcl,0,0,'C'); $pdf->Cell(30,5,"97 - 107 mmol/l",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($proteinurie!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Protéinurie: "),0,0); $pdf->SetFont('Arial', '',10); if($proteinurie< 28 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($proteinurie > 141){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$proteinurie,0,0,'C'); $pdf->Cell(30,5,"28 - 141 mg/24H",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 DSA) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($fer_serique!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Fer sérique : "),0,0); $pdf->SetFont('Arial', '',10); if($fer_serique< 6 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($fer_serique > 28){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$fer_serique,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Colorimétrique) "),0,1); $pdf->SetFont('Arial', '',10); $pdf->Cell(159,5,"Homme : ",0,0,'R');
$pdf->Cell(30,5,"8.1 - 28.3 umol/l",0,1,'R');
$pdf->Cell(159,5,"Femme : ",0,0,'R');
$pdf->Cell(30,5,utf8_decode("6.6 - 26.0 umol/l"),0,1,'R');
}
if ($ferritine!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ferritine (Ferritinémie) :  "),0,0); $pdf->SetFont('Arial', '',10); if($ferritine< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ferritine > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ferritine,0,0,'C'); $pdf->Cell(30,5,utf8_decode(""),0,1);$pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Colorimétrique) "),0,1); $pdf->SetFont('Arial', '',10);$pdf->Cell(129,5,"Homme adulte : ",0,0,'R');
$pdf->Cell(60,5,utf8_decode("20 à 200 µg/l"),0,1,'R');
$pdf->Cell(129,5,"Femme adulte : ",0,0,'R');
$pdf->Cell(60,5,utf8_decode("avant la ménopause : 10 à 125 µg/l"),0,1,'R');
$pdf->Cell(129,5,"",0,0,'R');
$pdf->Cell(60,5,utf8_decode("après la ménopause : 20 à 200 µg/l"),0,1,'R');
$pdf->Cell(129,5,"",0,0,'R');
$pdf->Cell(60,5,utf8_decode("Chef l'enfant entre : 15 - 600 ug/l"),0,1,'R');
}
if ($proteinurie_24h!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Protéinurie de 24H : "),0,0); $pdf->SetFont('Arial', '',10); if($proteinurie_24h< 28 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($proteinurie_24h > 141){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$proteinurie_24h,0,0,'C'); $pdf->Cell(30,5,"28 - 141 mg/24H",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 Rouge de Pyrogallol Molybdate) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($ck_mb!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("CK-MB : "),0,0); $pdf->SetFont('Arial', '',10); if($ck_mb< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ck_mb > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ck_mb,0,0,'C'); $pdf->Cell(30,5,"Homme : <5,2 ng/mL Femme : < 3,1 ng/mL",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($lipasemie!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Lipasémie : "),0,0); $pdf->SetFont('Arial', '',10); if($lipasemie< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($lipasemie > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$lipasemie,0,0,'C'); $pdf->Cell(30,5,utf8_decode(" "),0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Mindray BS-240 IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($cbc!= 0 or $cbc!= 0 or $cbc2!= 0 or $cbc3!= 0 or $cbc4!= 0 or $cbc5!= 0 or $cbc6!= 0 or $cbc7!= 0 or $cbc8!= 0 or $cbc9!= 0 or $cbc10!= 0 or $cbc11!= 0 or $abog!= 0 or $ptaptt != 0 or $tpinr!= 0 or $rbcm!= 0 or $testemel!= 0 or $tauret != 0 or $esr!= 0 or $ge_fm != 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,10,"HEMATOLOGIE",1,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}
if ($cbc!= 0 or $cbc!= 0 or $cbc2!= 0 or $cbc3!= 0 or $cbc4!= 0 or $cbc5!= 0 or $cbc6!= 0 or $cbc7!= 0 or $cbc8!= 0 or $cbc9!= 0 or $cbc10!= 0 or $cbc11!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,"NUMERATION FORMULE SANGUINE",0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,"Principe de Coulter - Nihon Kohden",0,1,'C');
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($cbc!= 0) {$pdf->SetFont('Arial', 'B',12); $pdf->Cell(75,5,utf8_decode("Hématies : "),0,0); if($cbc < 4){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc > 5.8 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("H : 4.5-6.5   F : 4-5.8 mm³"),0,1); $pdf->SetFont('Arial', '',10);}
if ($cbc2!= 0) { $pdf->Cell(75,5,utf8_decode("Hémoglobine : "),0,0,'R'); if($cbc2 < 4){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc2 > 5.8 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc2 ,0,0,'C'); $pdf->Cell(30,5,"H : 13-18g/dl    F : 12-16d/d",0,1); }
if ($cbc3!= 0) { $pdf->Cell(75,5,utf8_decode("Hématocrite : "),0,0,'R'); if($cbc3 < 4){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc3 > 5.8 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc3 ,0,0,'C'); $pdf->Cell(30,5,"H : 40-54%     F : 37-47%",0,1); }
if ($cbc4!= 0) { $pdf->Cell(75,5,utf8_decode("VGM : "),0,0,'R'); if($cbc4 < 80){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc4 > 100 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc4 ,0,0,'C'); $pdf->Cell(30,5,"80-100 fl",0,1); }
if ($cbc5!= 0) { $pdf->Cell(75,5,utf8_decode("TCMH : "),0,0,'R'); if($cbc5 < 27){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc5 > 33 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc5 ,0,0,'C'); $pdf->Cell(30,5,"27-33  pg",0,1); }
if ($cbc6!= 0) { $pdf->Cell(75,5,utf8_decode("CCMH : "),0,0,'R'); if($cbc6 < 32){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc6 > 36 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc6 ,0,0,'C'); $pdf->Cell(30,5,"32-36 %",0,1); }
if ($cbc7!= 0) {$pdf->SetFont('Arial', 'B',12); $pdf->Cell(75,5,utf8_decode("Leucocytes : "),0,0); if($cbc7 < 4000){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc7 > 10000 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc7 ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("4000-10 000/ mm³"),0,1); $pdf->SetFont('Arial', '',10);}
if ($cbc8!= 0) { $pdf->Cell(75,5,utf8_decode("Granulocytes : "),0,0,'R'); if($cbc8 < 2000){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc8 > 7000 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc8 ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("2000-7000/ mm³"),0,1); }
if ($cbc9!= 0) { $pdf->Cell(75,5,utf8_decode("Lymphocytes : "),0,0,'R'); if($cbc9 < 1000){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc9 > 4000 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc9 ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("1000-4000/ mm³"),0,1); }
if ($cbc10!= 0) { $pdf->Cell(75,5,utf8_decode("Monocytes : "),0,0,'R'); if($cbc10 < 100){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc10 > 1000 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc10 ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("100-1000/ mm³"),0,1); }
if ($cbc11!= 0) {$pdf->SetFont('Arial', 'B',12); $pdf->Cell(75,5,utf8_decode("Plaquettes : "),0,0); if($cbc11 < 150000){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($cbc11 > 400000 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$cbc11 ,0,0,'C'); $pdf->Cell(30,5,utf8_decode("150 000-400 000/ mm³"),0,1); $pdf->SetFont('Arial', '',10);}

if ($abog != 0){
	if (!empty($abog)) {
		$pdf->Cell(189  ,5,'',0,1);
		$pdf->SetFont('Arial', 'B',14);
		$pdf->Cell(189  ,5,"Groupage sanguine (GSRh)",0,1,'C');
		$pdf->SetFont('Arial', '',10);
		$pdf->Cell(189  ,5,'',0,1);
		$pdf->SetFont('Arial', '',10);
	}
	if (!empty($abog)) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Groupage sanguine (GSRh): "),0,0); $pdf->SetFont('Arial', '',10); $pdf->Cell(30,5,"",0,0,'C'); if($abog = "A+"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : A  Rhésus : Positif "),0,0,'C'); }elseif($abog = "A-"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : A  Rhésus : Positif "),0,0,'C'); }elseif($abog = "B+"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : B  Rhésus : Positif "),0,0,'C'); }elseif($abog = "B-"){ $pdf->Cell(30,5,"Groupe sanguin : B  Rhésus : Positif ",0,0,'C'); }elseif($abog = "AB+"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : AB  Rhésus : Positif "),0,0,'C'); }elseif($abog = "AB-"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : AB  Rhésus : Positif "),0,0,'C'); }elseif($abog = "O+"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : O  Rhésus : Positif "),0,0,'C'); }elseif($abog = "O-"){ $pdf->Cell(30,5,utf8_decode("Groupe sanguin : O  Rhésus : Positif "),0,0,'C'); }$pdf->Cell(40,5,$abog,0,0,'C'); $pdf->Cell(30,5,"",0,1);$pdf->SetFont('Arial', '',8); $pdf->Cell(30,5,utf8_decode("(Beth Vincent- Simonin)"),0,1); $pdf->SetFont('Arial', '',10);
	}
}

if ($ptaptt != 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("Hémostase"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($ptaptt != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TP/TCK/INR : "),0,0); $pdf->SetFont('Arial', '',10); if($ptaptt< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ptaptt > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ptaptt,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(IFCC) "),0,1); $pdf->SetFont('Arial', '',10);}
if ($tpinr!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TP/INR : "),0,0); $pdf->SetFont('Arial', '',10); if($tpinr < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($tpinr > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$tpinr ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($rbcm!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("Frottis sanguin"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($rbcm!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Frottis sanguin : "),0,0); $pdf->SetFont('Arial', '',10); if($rbcm< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($rbcm > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$rbcm,0,0,'C'); $pdf->Cell(30,5,"",0,1);  $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Méthode manuelle) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($testemel!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("Test d'Emmel"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($testemel!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Test d'Emmel: "),0,0); $pdf->SetFont('Arial', '',10); if($testemel< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($testemel > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$testemel,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($tauret != 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("Taux de réticulocytes"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($tauret != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Taux de réticulocytes: "),0,0); $pdf->SetFont('Arial', '',10); if($tauret< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($tauret > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$tauret,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Méthode manuelle) "),0,1); $pdf->SetFont('Arial', '',10);}

if ($esr!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("Vitesse de sédimentation"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($esr!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Vitesse de sédimentation: "),0,0); $pdf->SetFont('Arial', '',10); if($esr < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($esr > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$esr ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($ge_fm != 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,utf8_decode("GE/FM"),0,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', '',10);
}

if ($ge_fm != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("GE/FM : "),0,0); $pdf->SetFont('Arial', '',10); if($ge_fm< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ge_fm > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ge_fm,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode("(Méthode manuelle) "),0,1); $pdf->SetFont('Arial', '',10);}

//Microbiologie
if ($csfre != 0 or $pore!= 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'B',14);
    $pdf->Cell(189  ,8,utf8_decode("Examen cyto-bactériologique des urines"),1,1,'C');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,"",0,1,'C');
    $pdf->Cell(189  ,5,'',0,1);
}


if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Macroscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($u_asp != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Aspect: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_asp,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Microscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}


if ($u_leu != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Leucocytes: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_leu,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_hema != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Hématies : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_hema,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_bac != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Bactéries : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_bac,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_lev != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Levures : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_lev,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_e_par != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Eléments parasitaires  : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_e_par,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_cris != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cristaux: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_cris,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_cyl != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cylindre : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_cyl,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_c_epi != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cellules épithéliales: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$u_c_epi,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($csfre != 0 or $pore!= 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'B',14);
    $pdf->Cell(189  ,8,utf8_decode("Examen parasitologique des selles (KAOP)"),1,1,'C');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,"",0,1,'C');
    $pdf->Cell(189  ,5,'',0,1);
}


if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Macroscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($s_asp != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Aspect : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_asp,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Microscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($s_leu != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Leucocytes : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_leu,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($s_lev != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Levure : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_lev,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($s_hema != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Hématies : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_hema,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($s_para != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Parasites : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_para,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Culture sur milieu spécifique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($s_cul != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Culture : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_cul,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($s_es_id != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Espèce identifiée : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_con,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Antibiogramme"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($s_sen != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Sensible : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_sen,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($s_resis != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Résistant : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$s_resis,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($c_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'B',14);
    $pdf->Cell(189  ,8,utf8_decode("Examen cytobactériologique des urines"),1,1,'C');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,"",0,1,'C');
    $pdf->Cell(189  ,5,'',0,1);
}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Macroscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($c_asp != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Aspect : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_asp,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Microscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($c_leu != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Leucocytes : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_leu,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($c_hema != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Hématies : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_hema,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($c_bac != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Bactérie : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_bac,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($c_cris != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cristaux : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_cris,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($c_cyl != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cylindre : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_cyl,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($c_c_epi != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cellules épithéliales : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_c_epi,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Culture sur milieu spécifique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($c_cul != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Culture : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$c_cul,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Conclusion"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($c_con != 0){ $pdf->Cell(189,5,$c_con,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(""),0,1);$pdf->SetFont('Arial', '',10);}


if ($sob!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Examen bactériologique des selles: "),0,0); $pdf->SetFont('Arial', '',10); if($sob < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($sob > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$sob ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($c_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'B',14);
    $pdf->Cell(189  ,8,utf8_decode("Examen bactériologique des selles"),1,1,'C');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,"",0,1,'C');
    $pdf->Cell(189  ,5,'',0,1);
}

if ($bs_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Macroscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($bs_asp != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Aspect : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bs_asp,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($bs_leu != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Examen Microscopique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($bs_leu != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Leucocytes: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bs_leu,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bs_lev != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Levure: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bs_lev,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bs_hema != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Hématies: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bs_hema,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bs_para != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Parasites: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bs_para,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bs_cul != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Culture sur milieu spécifique"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($bs_cul != 0){ $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Culture: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bs_cul),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($u_asp != 0){
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("Conclusion"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($bs_con != 0){ $pdf->Cell(189,5,$bs_con,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(""),0,1);$pdf->SetFont('Arial', '',10);}




if ($pus!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Pus: "),0,0); $pdf->SetFont('Arial', '',10); if($pus < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($pus > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$pus ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($csfre!= 0) {$pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("LCR/CSF: "),0,0); $pdf->SetFont('Arial', '',10); if($csfre < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($csfre > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$csfre ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($pore!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Prélèvement d'oreille: "),0,0); $pdf->SetFont('Arial', '',10); if($pore< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($pore > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$pore,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($pgorg!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Prélèvement de Gorge: "),0,0); $pdf->SetFont('Arial', '',10); if($pgorg < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($pgorg > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$pgorg ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

if ($bv_asp != 0) {
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'B',14);
    $pdf->Cell(189  ,8,utf8_decode("EXAMEN CYTOBACTERIOLOGIQUE VAGINAL"),1,1,'C');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,"",0,1,'C');
    $pdf->Cell(189  ,5,'',0,1);
}

if ($bv_asp != 0) {
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("I.  EXAMENS MACROSCOPIQUES "),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($bv_t_vag != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Aspect: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bv_t_vag),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_f_sl != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Odeur : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bv_f_sl),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}

if ($bv_leu != 0) {
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("II. EXAMENS MICROSCOPIQUES "),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}

if ($bv_c_epi != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Leucocytes: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bv_c_epi),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_hema != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Hématies: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bv_hema),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_leu != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cellules épithéliales: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bv_leu,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_ode != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Filaments et  spores de levures : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bv_ode,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_asp != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Trichomonas vaginalis : ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bv_asp,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_leu != 0) {
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', 'BU',14);
    $pdf->Cell(189  ,5,utf8_decode("III.   CULTURES"),0,1,'L');
    $pdf->SetFont('Arial', '',10);
    $pdf->Cell(189  ,5,'',0,1);
    $pdf->SetFont('Arial', '',10);
}
if ($bv_cul != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Cultures: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,utf8_decode($bv_cul),0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}
if ($bv_con != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode(strtoupper("Conclusion: ")),0,0); $pdf->SetFont('Arial', '',10);$pdf->Cell(40,5,$bv_con,0,0,'C'); $pdf->Cell(30,5,"",0,1); $pdf->SetFont('Arial', '',8); $pdf->Cell(75,5,utf8_decode(" "),0,1);$pdf->SetFont('Arial', '',10);}


if ($burin!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Bandelette urinaire: "),0,0); $pdf->SetFont('Arial', '',10); if($burin < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($burin > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$burin ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }


//Hormonologie
if ($psa!= 0 or $tsh!= 0 or $t3 != 0 or $t4 != 0 or $betahcg!= 0 or $psa_free!= 0 or $progestérone!= 0 or $acahbc != 0 or $ca125!= 0 or $ca19!= 0 or $testo!= 0 or $tropo!= 0 or $ac_anti_hbs!= 0 or $oestradiol!= 0 or $dimeres!= 0 or $prl!= 0 or $fsh!= 0 or $lh != 0 or $ag_hbe!= 0 or $ac_anti_hbe!= 0 or $nt_proBNP!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,"HORMONOLOGIE",1,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,"Principe de Coulter - Nihon Kohden",0,1,'C');
	$pdf->Cell(189  ,5,'',0,1);
}


if ($psa!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("PSA: "),0,0); $pdf->SetFont('Arial', '',10); if($psa < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($psa > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$psa ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($tsh!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TSH : "),0,0); $pdf->SetFont('Arial', '',10); if($tsh < 0.25){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($tsh > 5){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$tsh ,0,0,'C'); $pdf->Cell(30,5,"0.25 - 5 Uui/ml",0,1); }
if ($t3 != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("FT3 : "),0,0); $pdf->SetFont('Arial', '',10); if($t3< 4 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($t3 > 8.3){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$t3,0,0,'C'); $pdf->Cell(30,5,"4 - 8.3 Pmol/l ",0,1); }
if ($t4 != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("FT4 : "),0,0); $pdf->SetFont('Arial', '',10); if($t4< 9 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($t4 > 20 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$t4,0,0,'C'); $pdf->Cell(30,5,"9 - 20 Pmol/l",0,1); }
if ($betahcg!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("BETA HCG: "),0,0); $pdf->SetFont('Arial', '',10); if($betahcg < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($betahcg > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$betahcg ,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"5-15 mIU/ml",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Cyclique : < 5 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Ménopause : < 10 mIU/ml"),0,1);
}

if ($psa_free!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("PSA Free: "),0,0); $pdf->SetFont('Arial', '',10); if($psa_free < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($psa_free > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$psa_free ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($progestérone!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Progestérone : "),0,0); $pdf->SetFont('Arial', '',10); if($progestérone < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($progestérone > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$progestérone ,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"0.11-0.56 ng/ml",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase ovulatoire : 0.12-6.22 ng/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase folliculaire : 0.10-0.54 ng/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase lutéale : 1.5-20 ng/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Ménopause : 0.1-0.41 ng/ml"),0,1);
}
if ($acahbc != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("AC ANTI HBC TOTAUX : "),0,0); $pdf->SetFont('Arial', '',10); if($acahbc< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($acahbc > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$acahbc,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($ca125!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("CA 125 : "),0,0); $pdf->SetFont('Arial', '',10); if($ca125 < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ca125 > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ca125 ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($ca19!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("CA 19.9: "),0,0); $pdf->SetFont('Arial', '',10); if($ca19< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ca19 > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ca19,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($testo!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TESTOSTERONE: "),0,0); $pdf->SetFont('Arial', '',10); if($testo < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($testo > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$testo ,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"3.0-10.6",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("0.1-0.9 ng/ml"),0,1);
}
if ($tropo!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TROPONINE: "),0,0); $pdf->SetFont('Arial', '',10); if($tropo < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($tropo > 19 ){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$tropo ,0,0,'C'); $pdf->Cell(30,5,"<19 ng/l",0,1); }
if ($ac_anti_hbs!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ac Anti Hbs : "),0,0); $pdf->SetFont('Arial', '',10); if($ac_anti_hbs < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ac_anti_hbs > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ac_anti_hbs ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($oestradiol!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Oestradiol : "),0,0); $pdf->SetFont('Arial', '',10); if($oestradiol < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($oestradiol > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$oestradiol ,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"< 62 Pg/ml",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase folliculaire : 18 - 147 Pg/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase pré-ovulatoire :93 - 573 Pg/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase lutéale : 43 - 214 Pg/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Ménopause : < 58 Pg/ml"),0,1);
}
if ($dimeres!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("DDIMERES: "),0,0); $pdf->SetFont('Arial', '',10); if($dimeres < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($dimeres > 500){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$dimeres ,0,0,'C'); $pdf->Cell(30,5,"<500 ng/ml ",0,1); }
if ($prl!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("PROLACTINE : "),0,0); $pdf->SetFont('Arial', '',10); if($prl < 5 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($prl > 20){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$prl ,0,1,'C'); $pdf->Cell(189,5,"Homme : 5-  15 ng/ml",0,1,'C');$pdf->Cell(189,5,utf8_decode("Femme avant la ménopause : 5-20 ng/ml"),0,1,'C'); 

}

if ($fsh!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("FSH: "),0,0); $pdf->SetFont('Arial', '',10); if($fsh < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($fsh > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$fsh ,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"1.7 -  12.0 mIU/ml",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase ovulatoire : 6.3 - 24.0 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase folliculaire : 2.9 - 12.0 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase lutéale : 1.5 – 7.0 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Ménopause : 17 – 95.0 mIU/ml"),0,1);
}
if ($lh != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("LH : "),0,0); $pdf->SetFont('Arial', '',10); if($lh< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($lh > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$lh,0,0,'C'); $pdf->Cell(30,5,"",0,1); 
$pdf->Cell(30,5,"Homme : ",0,0,'R');
$pdf->Cell(159,5,"1.1 -  7.0 mIU/ml",0,1);
$pdf->Cell(30,5,"Femme : ",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase ovulatoire : 9.6- 80 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase folliculaire : 1.5 - 8 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Phase lutéale : 0.2 – 6.5 mIU/ml"),0,1);
$pdf->Cell(30,5,"",0,0,'R');
$pdf->Cell(159,5,utf8_decode("Ménopause : 8 - 33 mIU/ml"),0,1);
}
if ($ag_hbe!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ag Hbe : "),0,0); $pdf->SetFont('Arial', '',10); if($ag_hbe < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ag_hbe > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ag_hbe ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($ac_anti_hbe!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ac Anti Hbe : "),0,0); $pdf->SetFont('Arial', '',10); if($ac_anti_hbe < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($ac_anti_hbe > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$ac_anti_hbe ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($nt_proBNP!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("NT-proBNP : "),0,0); $pdf->SetFont('Arial', '',10); if($nt_proBNP < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($nt_proBNP > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$nt_proBNP ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }

//Sérologie
if ($hbsag!= 0 or $hcvab!= 0 or $hivab!= 0 or $hbc!= 0 or $crp!= 0 or $facrhu != 0 or $aslo!= 0 or $vdrl!= 0 or $hav!= 0 or $serologie_typhoide!= 0 or $hbpylo != 0 or $toxo!= 0 or $rub!= 0 or $serologie_brucellose!= 0){
	$pdf->Cell(189  ,5,'',0,1);
	$pdf->SetFont('Arial', 'B',14);
	$pdf->Cell(189  ,5,"SEROLOGIE",1,1,'C');
	$pdf->SetFont('Arial', '',10);
	$pdf->Cell(189  ,5,"Principe de Coulter - Nihom Kohden",0,1,'C');
	$pdf->Cell(189  ,5,'',0,1);
}


if ($hbsag!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ag Hbs : "),0,0); $pdf->SetFont('Arial', '',10); if($hbsag < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hbsag > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hbsag ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($hcvab!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ac Anti HCV: "),0,0); $pdf->SetFont('Arial', '',10); if($hcvab < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hcvab > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hcvab ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($hivab!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Ac antiHIV: "),0,0); $pdf->SetFont('Arial', '',10); if($hivab < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hivab > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hivab ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($hbc!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("HBC: "),0,0); $pdf->SetFont('Arial', '',10); if($hbc < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hbc > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hbc ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($crp!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("CRP: "),0,0); $pdf->SetFont('Arial', '',10); if($crp < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($crp > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$crp ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($facrhu != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("FACTEUR RHUMATOIDE : "),0,0); $pdf->SetFont('Arial', '',10); if($facrhu< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($facrhu > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$facrhu,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($aslo!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("ASLO: "),0,0); $pdf->SetFont('Arial', '',10); if($aslo< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($aslo > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$aslo,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($vdrl!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("SYPHILIS: "),0,0); $pdf->SetFont('Arial', '',10); if($vdrl< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($vdrl > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$vdrl,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($hav!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("HAV : "),0,0); $pdf->SetFont('Arial', '',10); if($hav < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hav > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hav ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($serologie_typhoide!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Sérologie Typhoïde : "),0,0); $pdf->SetFont('Arial', '',10); if($serologie_typhoide < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($serologie_typhoide > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$serologie_typhoide ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($hbpylo != 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("HELICOBACTER PYLORI (HP): "),0,0); $pdf->SetFont('Arial', '',10); if($hbpylo< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($hbpylo > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$hbpylo,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($toxo!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("TOXOPLASMOSE: "),0,0); $pdf->SetFont('Arial', '',10); if($toxo< 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($toxo > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$toxo,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($rub!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("RUBEOLE : "),0,0); $pdf->SetFont('Arial', '',10); if($rub < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($rub > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$rub ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }
if ($serologie_brucellose!= 0) { $pdf->SetFont('Arial', 'B',10); $pdf->Cell(75,5,utf8_decode("Sérologie Brucellose : "),0,0); $pdf->SetFont('Arial', '',10); if($serologie_brucellose < 0 ){ $pdf->Cell(30,5,"B",0,0,'C'); }elseif($serologie_brucellose > 100){ $pdf->Cell(30,5,"H",0,0,'C'); }else{$pdf->Cell(30,5,"",0,0,'C'); }$pdf->Cell(40,5,$serologie_brucellose ,0,0,'C'); $pdf->Cell(30,5,"",0,1); }



 $pdf->SetFont('Arial', '',10);
$did = "";
$iddd = $_SESSION['iduser'];
// Ajoutez la signature
$connd = new mysqli('localhost', 'root', '', 'spn');
$sqld = $connd->query("SELECT * FROM utilisateur where id = '$iddd'");
while($datad = $sqld->fetch_array()){
	$did = $datad['nom'];
}
//$pdf->SetFont('Arial', 'B',10);
$pdf->addSignature($did);
// Fonction en-tête des tableaux en 3 colonnes de largeurs variables

// AFFICHAGE EN-TÊTE DU TABLEAU
// Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (60 mm)
$position_entete = 70;
// police des caractères
$pdf->SetFont('Helvetica','',9);
$pdf->SetTextColor(0);
// on affiche les en-têtes du tableau





$pdf->Output('test.pdf','I'); // affichage à l'écran
// Ou export sur le serveur
// $pdf->Output('F', '../test.pdf');
?>