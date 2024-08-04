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

if (isset($_POST['enreg'])) {

  $idexam = $_POST['idexam'];
  $idpa = $_POST['idpa'];
  $nom = $_POST['nom'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $tel = $_POST['tel'];
  $adresse = $_POST['adresse'];
  $price = $_POST['pandoc'];
  $pandoc = $_POST['pandoc'];
  $pcandoc = $_POST['pcandoc'];
  $numcard = 0;
  $heurfexam = date("G:i");
  $datedujour = date("d/m/Y");
  
  $datehos = date("Y-m-d G:i");
  $chk = 0;
  $res = 2;

if(!empty($_POST['fg'])){$fg= $_POST['fg'];}else{$fg= 0;}
if(!empty($_POST['rg'])){$rg= $_POST['rg'];}else{$rg= 0;}
if(!empty($_POST['hgpo'])){$hgpo= $_POST['hgpo'];}else{$hgpo= 0;}
if(!empty($_POST['chol'])){$chol= $_POST['chol'];}else{$chol= 0;}
if(!empty($_POST['c_hdl'])){$c_hdl= $_POST['c_hdl'];}else{$c_hdl= 0;}
if(!empty($_POST['c_ldl'])){$c_ldl= $_POST['c_ldl'];}else{$c_ldl= 0;}
if(!empty($_POST['tc'])){$tc= $_POST['tc'];}else{$tc= 0;}
if(!empty($_POST['sgot'])){$sgot= $_POST['sgot'];}else{$sgot= 0;}
if(!empty($_POST['ldh'])){$ldh= $_POST['ldh'];}else{$ldh= 0;}
if(!empty($_POST['sgptalt'])){$sgptalt= $_POST['sgptalt'];}else{$sgptalt= 0;}
if(!empty($_POST['urea'])){$urea= $_POST['urea'];}else{$urea= 0;}
if(!empty($_POST['crea'])){$crea= $_POST['crea'];}else{$crea= 0;}
if(!empty($_POST['ua'])){$ua= $_POST['ua'];}else{$ua= 0;}
if(!empty($_POST['alb'])){$alb= $_POST['alb'];}else{$alb= 0;}
if(!empty($_POST['br'])){$br= $_POST['br'];}else{$br= 0;}
if(!empty($_POST['brdi'])){$brdi= $_POST['brdi'];}else{$brdi= 0;}
if(!empty($_POST['alkphos'])){$alkphos= $_POST['alkphos'];}else{$alkphos= 0;}
if(!empty($_POST['calc'])){$calc= $_POST['calc'];}else{$calc= 0;}
if(!empty($_POST['magn'])){$magn= $_POST['magn'];}else{$magn= 0;}
if(!empty($_POST['ptp'])){$ptp= $_POST['ptp'];}else{$ptp= 0;}
if(!empty($_POST['gtt'])){$gtt= $_POST['gtt'];}else{$gtt= 0;}
if(!empty($_POST['ioskna'])){$ioskna= $_POST['ioskna'];}else{$ioskna= 0;}
if(!empty($_POST['ioskk'])){$ioskk= $_POST['ioskk'];}else{$ioskk= 0;}
if(!empty($_POST['ioskcl'])){$ioskcl= $_POST['ioskcl'];}else{$ioskcl= 0;}
if(!empty($_POST['cbc1'])){$cbc1 = $_POST['cbc1'];}else{$cbc1 = 0;}
if(!empty($_POST['cbc2'])){$cbc2 = $_POST['cbc2'];}else{$cbc2 = 0;}
if(!empty($_POST['cbc3'])){$cbc3 = $_POST['cbc3'];}else{$cbc3 = 0;}
if(!empty($_POST['cbc4'])){$cbc4 = $_POST['cbc4'];}else{$cbc4 = 0;}
if(!empty($_POST['cbc5'])){$cbc5 = $_POST['cbc5'];}else{$cbc5 = 0;}
if(!empty($_POST['cbc6'])){$cbc6 = $_POST['cbc6'];}else{$cbc6 = 0;}
if(!empty($_POST['cbc7'])){$cbc7 = $_POST['cbc7'];}else{$cbc7 = 0;}
if(!empty($_POST['cbc8'])){$cbc8 = $_POST['cbc8'];}else{$cbc8 = 0;}
if(!empty($_POST['cbc9'])){$cbc9 = $_POST['cbc9'];}else{$cbc9 = 0;}
if(!empty($_POST['cbc10'])){$cbc10 = $_POST['cbc10'];}else{$cbc10 = 0;}
if(!empty($_POST['cbc11'])){$cbc11 = $_POST['cbc11'];}else{$cbc11 = 0;}
if(!empty($_POST['proteinurie'])){$proteinurie= $_POST['proteinurie'];}else{$proteinurie= 0;}
if(!empty($_POST['fer_serique'])){$fer_serique= $_POST['fer_serique'];}else{$fer_serique= 0;}
if(!empty($_POST['ferritine'])){$ferritine= $_POST['ferritine'];}else{$ferritine= 0;}
if(!empty($_POST['proteinurie_24h'])){$proteinurie_24h= $_POST['proteinurie_24h'];}else{$proteinurie_24h= 0;}
if(!empty($_POST['ck_mb'])){$ck_mb= $_POST['ck_mb'];}else{$ck_mb= 0;}
if(!empty($_POST['lipasemie'])){$lipasemie= $_POST['lipasemie'];}else{$lipasemie= 0;}
if(!empty($_POST['abog'])){$abog= $_POST['abog'];}else{$abog= 0;}
if(!empty($_POST['ptaptt'])){$ptaptt= $_POST['ptaptt'];}else{$ptaptt= 0;}
if(!empty($_POST['tpinr'])){$tpinr= $_POST['tpinr'];}else{$tpinr= 0;}
if(!empty($_POST['rbcm'])){$rbcm= $_POST['rbcm'];}else{$rbcm= 0;}
if(!empty($_POST['testemel'])){$testemel= $_POST['testemel'];}else{$testemel= 0;}
if(!empty($_POST['tauret'])){$tauret= $_POST['tauret'];}else{$tauret= 0;}
if(!empty($_POST['esr'])){$esr= $_POST['esr'];}else{$esr= 0;}
if(!empty($_POST['ge_fm'])){$ge_fm= $_POST['ge_fm'];}else{$ge_fm= 0;}
if(!empty($_POST['urin'])){$urin= $_POST['urin'];}else{$urin= 0;}
if(!empty($_POST['stol'])){$stol= $_POST['stol'];}else{$stol= 0;}
if(!empty($_POST['urinbs'])){$urinbs= $_POST['urinbs'];}else{$urinbs= 0;}
if(!empty($_POST['sob'])){$sob= $_POST['sob'];}else{$sob= 0;}
if(!empty($_POST['pus'])){$pus= $_POST['pus'];}else{$pus= 0;}
if(!empty($_POST['csfre'])){$csfre= $_POST['csfre'];}else{$csfre= 0;}
if(!empty($_POST['pore'])){$pore= $_POST['pore'];}else{$pore= 0;}
if(!empty($_POST['pgorg'])){$pgorg= $_POST['pgorg'];}else{$pgorg= 0;}
if(!empty($_POST['pvatb'])){$pvatb= $_POST['pvatb'];}else{$pvatb= 0;}
if(!empty($_POST['pvatbrs'])){$pvatbrs= $_POST['pvatbrs'];}else{$pvatbrs= 0;}
if(!empty($_POST['burin'])){$burin= $_POST['burin'];}else{$burin= 0;}
if(!empty($_POST['psa'])){$psa= $_POST['psa'];}else{$psa= 0;}
if(!empty($_POST['tsh'])){$tsh= $_POST['tsh'];}else{$tsh= 0;}
if(!empty($_POST['t3'])){$t3= $_POST['t3'];}else{$t3= 0;}
if(!empty($_POST['t4'])){$t4= $_POST['t4'];}else{$t4= 0;}
if(!empty($_POST['betahcg'])){$betahcg= $_POST['betahcg'];}else{$betahcg= 0;}
if(!empty($_POST['psa_free'])){$psa_free= $_POST['psa_free'];}else{$psa_free= 0;}
if(!empty($_POST['progestérone'])){$progestérone= $_POST['progestérone'];}else{$progestérone= 0;}
if(!empty($_POST['acahbc'])){$acahbc= $_POST['acahbc'];}else{$acahbc= 0;}
if(!empty($_POST['ca125'])){$ca125= $_POST['ca125'];}else{$ca125= 0;}
if(!empty($_POST['ca19'])){$ca19= $_POST['ca19'];}else{$ca19= 0;}
if(!empty($_POST['testo'])){$testo= $_POST['testo'];}else{$testo= 0;}
if(!empty($_POST['tropo'])){$tropo= $_POST['tropo'];}else{$tropo= 0;}
if(!empty($_POST['ac_anti_hbs'])){$ac_anti_hbs= $_POST['ac_anti_hbs'];}else{$ac_anti_hbs= 0;}
if(!empty($_POST['oestradiol'])){$oestradiol= $_POST['oestradiol'];}else{$oestradiol= 0;}
if(!empty($_POST['dimeres'])){$dimeres= $_POST['dimeres'];}else{$dimeres= 0;}
if(!empty($_POST['prl'])){$prl= $_POST['prl'];}else{$prl= 0;}
if(!empty($_POST['fsh'])){$fsh= $_POST['fsh'];}else{$fsh= 0;}
if(!empty($_POST['lh'])){$lh= $_POST['lh'];}else{$lh= 0;}
if(!empty($_POST['ag_hbe'])){$ag_hbe= $_POST['ag_hbe'];}else{$ag_hbe= 0;}
if(!empty($_POST['ac_anti_hbe'])){$ac_anti_hbe= $_POST['ac_anti_hbe'];}else{$ac_anti_hbe= 0;}
if(!empty($_POST['nt_proBNP'])){$nt_proBNP= $_POST['nt_proBNP'];}else{$nt_proBNP= 0;}
if(!empty($_POST['hbsag'])){$hbsag= $_POST['hbsag'];}else{$hbsag= 0;}
if(!empty($_POST['hcvab'])){$hcvab= $_POST['hcvab'];}else{$hcvab= 0;}
if(!empty($_POST['hivab'])){$hivab= $_POST['hivab'];}else{$hivab= 0;}
if(!empty($_POST['hbc'])){$hbc= $_POST['hbc'];}else{$hbc= 0;}
if(!empty($_POST['crp'])){$crp= $_POST['crp'];}else{$crp= 0;}
if(!empty($_POST['facrhu'])){$facrhu= $_POST['facrhu'];}else{$facrhu= 0;}
if(!empty($_POST['aslo'])){$aslo= $_POST['aslo'];}else{$aslo= 0;}
if(!empty($_POST['vdrl'])){$vdrl= $_POST['vdrl'];}else{$vdrl= 0;}
if(!empty($_POST['hav'])){$hav= $_POST['hav'];}else{$hav= 0;}
if(!empty($_POST['serologie_typhoide'])){$serologie_typhoide= $_POST['serologie_typhoide'];}else{$serologie_typhoide= 0;}
if(!empty($_POST['hbpylo'])){$hbpylo= $_POST['hbpylo'];}else{$hbpylo= 0;}
if(!empty($_POST['toxo'])){$toxo= $_POST['toxo'];}else{$toxo= 0;}
if(!empty($_POST['rub'])){$rub= $_POST['rub'];}else{$rub= 0;}
if(!empty($_POST['serologie_brucellose'])){$serologie_brucellose= $_POST['serologie_brucellose'];}else{$serologie_brucellose= 0;}

if(!empty($_POST['u_asp'])){$u_asp = $_POST['u_asp'];}else{$u_asp = 0;}
if(!empty($_POST['u_leu'])){$u_leu = $_POST['u_leu'];}else{$u_leu = 0;}
if(!empty($_POST['u_hema'])){$u_hema = $_POST['u_hema'];}else{$u_hema = 0;}
if(!empty($_POST['u_bac'])){$u_bac = $_POST['u_bac'];}else{$u_bac = 0;}
if(!empty($_POST['u_lev'])){$u_lev = $_POST['u_lev'];}else{$u_lev = 0;}
if(!empty($_POST['u_e_par'])){$u_e_par = $_POST['u_e_par'];}else{$u_e_par = 0;}
if(!empty($_POST['u_cris'])){$u_cris = $_POST['u_cris'];}else{$u_cris = 0;}
if(!empty($_POST['u_cyl'])){$u_cyl = $_POST['u_cyl'];}else{$u_cyl = 0;}
if(!empty($_POST['u_c_epi'])){$u_c_epi = $_POST['u_c_epi'];}else{$u_c_epi = 0;}
if(!empty($_POST['s_asp'])){$s_asp = $_POST['s_asp'];}else{$s_asp = 0;}
if(!empty($_POST['s_leu'])){$s_leu = $_POST['s_leu'];}else{$s_leu = 0;}
if(!empty($_POST['s_lev'])){$s_lev = $_POST['s_lev'];}else{$s_lev = 0;}
if(!empty($_POST['s_hema'])){$s_hema = $_POST['s_hema'];}else{$s_hema = 0;}
if(!empty($_POST['s_para'])){$s_para = $_POST['s_para'];}else{$s_para = 0;}
if(!empty($_POST['s_cul'])){$s_cul = $_POST['s_cul'];}else{$s_cul = 0;}
if(!empty($_POST['s_es_id'])){$s_es_id = $_POST['s_es_id'];}else{$s_es_id = 0;}
if(!empty($_POST['s_sen'])){$s_sen = $_POST['s_sen'];}else{$s_sen = 0;}
if(!empty($_POST['s_resis'])){$s_resis = $_POST['s_resis'];}else{$s_resis = 0;}
if(!empty($_POST['s_con'])){$s_con = $_POST['s_con'];}else{$s_con = 0;}
if(!empty($_POST['c_asp'])){$c_asp = $_POST['c_asp'];}else{$c_asp = 0;}
if(!empty($_POST['c_leu'])){$c_leu = $_POST['c_leu'];}else{$c_leu = 0;}
if(!empty($_POST['c_hema'])){$c_hema = $_POST['c_hema'];}else{$c_hema = 0;}
if(!empty($_POST['c_bac'])){$c_bac = $_POST['c_bac'];}else{$c_bac = 0;}
if(!empty($_POST['c_cris'])){$c_cris = $_POST['c_cris'];}else{$c_cris = 0;}
if(!empty($_POST['c_cyl'])){$c_cyl = $_POST['c_cyl'];}else{$c_cyl = 0;}
if(!empty($_POST['c_c_epi'])){$c_c_epi = $_POST['c_c_epi'];}else{$c_c_epi = 0;}
if(!empty($_POST['c_cul'])){$c_cul = $_POST['c_cul'];}else{$c_cul = 0;}
if(!empty($_POST['c_con'])){$c_con = $_POST['c_con'];}else{$c_con = 0;}
if(!empty($_POST['bs_asp'])){$bs_asp = $_POST['bs_asp'];}else{$bs_asp = 0;}
if(!empty($_POST['bs_leu'])){$bs_leu = $_POST['bs_leu'];}else{$bs_leu = 0;}
if(!empty($_POST['bs_lev'])){$bs_lev = $_POST['bs_lev'];}else{$bs_lev = 0;}
if(!empty($_POST['bs_hema'])){$bs_hema = $_POST['bs_hema'];}else{$bs_hema = 0;}
if(!empty($_POST['bs_para'])){$bs_para = $_POST['bs_para'];}else{$bs_para = 0;}
if(!empty($_POST['bs_cul'])){$bs_cul = $_POST['bs_cul'];}else{$bs_cul = 0;}
if(!empty($_POST['bs_con'])){$bs_con = $_POST['bs_con'];}else{$bs_con = 0;}
if(!empty($_POST['bv_asp'])){$bv_asp = $_POST['bv_asp'];}else{$bv_asp = 0;}
if(!empty($_POST['bv_ode'])){$bv_ode = $_POST['bv_ode'];}else{$bv_ode = 0;}
if(!empty($_POST['bv_leu'])){$bv_leu = $_POST['bv_leu'];}else{$bv_leu = 0;}
if(!empty($_POST['bv_hema'])){$bv_hema = $_POST['bv_hema'];}else{$bv_hema = 0;}
if(!empty($_POST['bv_c_epi'])){$bv_c_epi = $_POST['bv_c_epi'];}else{$bv_c_epi = 0;}
if(!empty($_POST['bv_f_sl'])){$bv_f_sl = $_POST['bv_f_sl'];}else{$bv_f_sl = 0;}
if(!empty($_POST['bv_t_vag'])){$bv_t_vag = $_POST['bv_t_vag'];}else{$bv_t_vag = 0;}
if(!empty($_POST['bv_t_vag'])){$bv_t_vag = $_POST['bv_t_vag'];}else{$bv_t_vag = 0;}
if(!empty($_POST['bv_t_vag'])){$bv_t_vag = $_POST['bv_t_vag'];}else{$bv_t_vag = 0;}
if(!empty($_POST['bv_cul'])){$bv_cul = $_POST['bv_cul'];}else{$bv_cul = 0;}
if(!empty($_POST['bv_con'])){$bv_con = $_POST['bv_con'];}else{$bv_con = 0;}
if(!empty($_POST['rs_rch'])){$rs_rch = $_POST['rs_rch'];}else{$rs_rch = 0;}
if(!empty($_POST['rs_rm_uu'])){$rs_rm_uu = $_POST['rs_rm_uu'];}else{$rs_rm_uu = 0;}
if(!empty($_POST['rs_rm_mh'])){$rs_rm_mh = $_POST['rs_rm_mh'];}else{$rs_rm_mh = 0;}
if(!empty($_POST['rs_ant_sen'])){$rs_ant_sen = $_POST['rs_ant_sen'];}else{$rs_ant_sen = 0;}
if(!empty($_POST['rs_resis'])){$rs_resis = $_POST['rs_resis'];}else{$rs_resis = 0;}
if(!empty($_POST['coproculture'])){$coproculture = $_POST['coproculture'];}else{$coproculture = 0;}
if(!empty($_POST['cytobacterio_expectorations'])){$cytobacterio_expectorations = $_POST['cytobacterio_expectorations'];}else{$cytobacterio_expectorations = 0;}
if(!empty($_POST['liquide_ponction'])){$liquide_ponction = $_POST['liquide_ponction'];}else{$liquide_ponction = 0;}
if(!empty($_POST['recherche_rotadeno_selles'])){$recherche_rotadeno_selles = $_POST['recherche_rotadeno_selles'];}else{$recherche_rotadeno_selles = 0;}
if(!empty($_POST['recherche_ag_h_pylori_selles'])){$recherche_ag_h_pylori_selles = $_POST['recherche_ag_h_pylori_selles'];}else{$recherche_ag_h_pylori_selles = 0;}
if(!empty($_POST['recherche_hav_selles'])){$recherche_hav_selles = $_POST['recherche_hav_selles'];}else{$recherche_hav_selles = 0;}



  $sql = "INSERT INTO examens (ide,idp,name,phone,address,age,sex,numcard,price,heurfexam,datej,fg,rg,hgpo,chol,c_hdl,c_ldl,tc,sgot,ldh,sgptalt,urea,crea,ua,alb,br,brdi,alkphos,calc,magn,ptp,gtt,ioskna,ioskk,ioskcl,proteinurie,fer_serique,ferritine,proteinurie_24h,ck_mb,lipasemie,cbc,cbc2,cbc3,cbc4,cbc5,cbc6,cbc7,cbc8,cbc9,cbc10,cbc11,abog,ptaptt,tpinr,rbcm,testemel,tauret,esr,ge_fm,urin,u_asp,u_leu,u_hema,u_bac,u_lev,u_e_par,u_cris,u_cyl,u_c_epi,stol,s_asp,s_leu,s_lev,s_hema,s_para,s_cul,s_es_id,s_sen,s_resis,s_con,urinbs,c_asp,c_leu,c_hema,c_bac,c_cris,c_cyl,c_c_epi,c_cul,c_con,sob,bs_asp,bs_leu,bs_lev,bs_hema,bs_para,bs_cul,bs_con,pus,csfre,coproculture,cytobacterio_expectorations,liquide_ponction,recherche_rotadeno_selles,recherche_ag_h_pylori_selles,recherche_hav_selles,pore,pgorg,pvatb,bv_asp,bv_ode,bv_leu,bv_hema,bv_c_epi,bv_f_sl,bv_t_vag,bv_cul,bv_con,pvatbrs,rs_rch,rs_rm_uu,rs_rm_mh,rs_ant_sen,rs_resis,burin,psa,tsh,t3,t4,betahcg,psa_free,progestérone,acahbc,ca125,ca19,testo,tropo,ac_anti_hbs,oestradiol,dimeres,prl,fsh,lh,ag_hbe,ac_anti_hbe,nt_proBNP,hbsag,hcvab,hivab,hbc,crp,facrhu,aslo,vdrl,hav,serologie_typhoide,hbpylo,toxo,rub,serologie_brucellose,pandoc,pcandoc,chk,res) VALUES ('$idexam','$idpa','$nom','$tel','$adresse','$age','$sex','$numcard','$price','$heurfexam','$datedujour','$fg','$rg','$hgpo','$chol','$c_hdl','$c_ldl','$tc','$sgot','$ldh','$sgptalt','$urea','$crea','$ua','$alb','$br','$brdi','$alkphos','$calc','$magn','$ptp','$gtt','$ioskna','$ioskk','$ioskcl','$proteinurie','$fer_serique','$ferritine','$proteinurie_24h','$ck_mb','$lipasemie','$cbc','$cbc2','$cbc3','$cbc4','$cbc5','$cbc6','$cbc7','$cbc8','$cbc9','$cbc10','$cbc11','$abog','$ptaptt','$tpinr','$rbcm','$testemel','$tauret','$esr','$ge_fm','$urin','$u_asp','$u_leu','$u_hema','$u_bac','$u_lev','$u_e_par','$u_cris','$u_cyl','$u_c_epi','$stol','$s_asp','$s_leu','$s_lev','$s_hema','$s_para','$s_cul','$s_es_id','$s_sen','$s_resis','$s_con','$urinbs','$c_asp','$c_leu','$c_hema','$c_bac','$c_cris','$c_cyl','$c_c_epi','$c_cul','$c_con','$sob','$bs_asp','$bs_leu','$bs_lev','$bs_hema','$bs_para','$bs_cul','$bs_con','$pus','$csfre','$coproculture','$cytobacterio_expectorations','$liquide_ponction','$recherche_rotadeno_selles','$recherche_ag_h_pylori_selles','$recherche_hav_selles','$pore','$pgorg','$pvatb','$bv_asp','$bv_ode','$bv_leu','$bv_hema','$bv_c_epi','$bv_f_sl','$bv_t_vag','$bv_cul','$bv_con','$pvatbrs','$rs_rch','$rs_rm_uu','$rs_rm_mh','$rs_ant_sen','$rs_resis','$burin','$psa','$tsh','$t3','$t4','$betahcg','$psa_free','$progestérone','$acahbc','$ca125','$ca19','$testo','$tropo','$ac_anti_hbs','$oestradiol','$dimeres','$prl','$fsh','$lh','$ag_hbe','$ac_anti_hbe','$nt_proBNP','$hbsag','$hcvab','$hivab','$hbc','$crp','$facrhu','$aslo','$vdrl','$hav','$serologie_typhoide','$hbpylo','$toxo','$rub','$serologie_brucellose','$pandoc','$pcandoc','$chk','$res')";
  $mysqli = new mysqli('localhost','root','','spn');
  $mysqli->query($sql);
  if (isset($mysqli)) {
    //$dellist = mysqli_connect('localhost','root','','nashos');
    //$result = mysqli_query($dellist, "DELETE FROM andoc WHERE idan = '$idan'");
    //if (isset($result)) {
      $JIKO = mysqli_connect('localhost','root','','spn');
      $cares = mysqli_query($JIKO, "UPDATE andocs SET chk='OUI' where idexam = '$idexam'");
      if (isset($cares)) {
        //var_dump($_POST);
        echo '<script type="text/javascript">'; 
        echo 'alert("Examen à été enregistré");'; 
        echo 'window.location.href = "Laboratoire";';
        echo '</script>';
      }
    //}
  } else {
      echo "Erreur: " . $sql . "<br>" . $con->error;
  }
} else {
  //redirect_to("nouveau.php");
  ?>
    <?php 
}
?>
