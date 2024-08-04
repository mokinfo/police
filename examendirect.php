<?php 
require_once("includes/session.php");
require'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
if (isset($_POST['enreg'])) {
	$idexam = $_POST['idexam'];
	$idan = $_POST['idpatient'];
	$identexam = "";
	$motiff = $_POST['motif'];
	$datexam = date("d/m/Y");
	$heurdexam = date("H:m:s");

	$fg = "";
	$rg = "";
	$hgpo = "";
	$chol = "";
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
	$cbc  = "";
	$abog = "";
	$ptaptt = "";
	$tpinr  = "";
	$rbcm = "";
	$testemel = "";
	$tauret = "";
	$esr  = "";
	$urin = "";
	$stol = "";
	$urinbs = "";
	$sob  = "";
	$pus  = "";
	$csfre  = "";
	$pore = "";
	$pgorg  = "";
	$pvatb  = "";
	$pvatbrs  = "";
	$burin  = "";
	$psa  = "";
	$tsh  = "";
	$t3 = "";
	$t4 = "";
	$betahcg  = "";
	$acahbc = "";
	$ca125  = "";
	$ca19 = "";
	$testo  = "";
	$tropo  = "";
	$dimeres  = "";
	$prl  = "";
	$fsh  = "";
	$lh = "";
	$hbsag  = "";
	$hcvab  = "";
	$hivab  = "";
	$hbc  = "";
	$crp  = "";
	$facrhu = "";
	$aslo = "";
	$vdrl = "";
	$hbpylo = "";
	$toxo = "";
	$rub  = "";

	//Ajout nouvelle
	$c_hdl =  "";
	$c_ldl =  "";
	$proteinurie =  "";
	$fer_serique =  "";
	$ferritine =  "";
	$proteinurie_24h =  "";
	$ck_mb =  "";
	$lipasemie =  "";
	$ge_fm =  "";
	$coproculture =  "";
	$cytobacterio_expectorations =  "";
	$liquide_ponction =  "";
	$recherche_rotadeno_selles =  "";
	$recherche_ag_h_pylori_selles =  "";
	$recherche_hav_selles =  "";
	$psa_free =  "";
	$progestérone =  "";
	$ac_anti_hbs =  "";
	$oestradiol =  "";
	$ag_hbe =  "";
	$ac_anti_hbe =  "";
	$nt_proBNP =  "";
	$hav =  "";
	$serologie_typhoide =  "";
	$serologie_brucellose =  "";


	$res = 2;
	$chk = "NON";
	$paix = "ESP";
	$etat = "IMPAYER";
	$datehos = date("Y-m-d G:i");

	$date_paix = "";
	$codf = 0;



	//Chimie

	if(!empty($_POST['fg'])){$fg = $_POST['fg']; $pp1 = 500; $pc1 = 500  ;}else{$pp1 = 0; $pc1 = 0; $fg = 0;}
	if(!empty($_POST['rg'])){$rg = $_POST['rg']; $pp2 = 500; $pc2 = 500  ;}else{$pp2 = 0; $pc2 = 0; $rg = 0;}
	if(!empty($_POST['hgpo'])){$hgpo = $_POST['hgpo']; $pp3 = 1500   ; $pc3 = 500  ;}else{$pp3 = 0; $pc3 = 0; $hgpo = 0;}
	if(!empty($_POST['chol'])){$chol = $_POST['chol']; $pp4 = 500; $pc4 = 500  ;}else{$pp4 = 0; $pc4 = 0; $chol = 0;}
	if(!empty($_POST['tc'])){$tc = $_POST['tc']; $pp5 = 500; $pc5 = 500  ;}else{$pp5 = 0; $pc5 = 0; $tc = 0;}
	if(!empty($_POST['sgot'])){$sgot = $_POST['sgot']; $pp6 = 500; $pc6 = 500  ;}else{$pp6 = 0; $pc6 = 0; $sgot = 0;}
	if(!empty($_POST['ldh'])){$ldh  = $_POST['ldh']; $pp7 = 500; $pc7 = 500  ;}else{$pp7 = 0; $pc7 = 0; $ldh  = 0;}
	if(!empty($_POST['sgptalt'])){$sgptalt  = $_POST['sgptalt']; $pp8 = 500; $pc8 = 500  ;}else{$pp8 = 0; $pc8 = 0; $sgptalt  = 0;}
	if(!empty($_POST['urea'])){$urea = $_POST['urea']; $pp9 = 500; $pc9 = 500  ;}else{$pp9 = 0; $pc9 = 0; $urea = 0;}
	if(!empty($_POST['crea'])){$crea = $_POST['crea']; $pp10 = 500; $pc10 = 500  ;}else{$pp10  = 0; $pc10  = 0; $crea = 0;}
	if(!empty($_POST['ua'])){$ua = $_POST['ua']; $pp11 = 500; $pc11 = 500  ;}else{$pp11  = 0; $pc11  = 0; $ua = 0;}
	if(!empty($_POST['alb'])){$alb  = $_POST['alb']; $pp12 = 500; $pc12 = 500  ;}else{$pp12  = 0; $pc12  = 0; $alb  = 0;}
	if(!empty($_POST['br'])){$br = $_POST['br']; $pp13 = 500; $pc13 = 500  ;}else{$pp13  = 0; $pc13  = 0; $br = 0;}
	if(!empty($_POST['brdi'])){$brdi = $_POST['brdi']; $pp14 = 500; $pc14 = 500  ;}else{$pp14  = 0; $pc14  = 0; $brdi = 0;}
	if(!empty($_POST['alkphos'])){$alkphos  = $_POST['alkphos']; $pp15 = 500; $pc15 = 500  ;}else{$pp15  = 0; $pc15  = 0; $alkphos  = 0;}
	if(!empty($_POST['calc'])){$calc = $_POST['calc']; $pp16 = 500; $pc16 = 500  ;}else{$pp16  = 0; $pc16  = 0; $calc = 0;}
	if(!empty($_POST['magn'])){$magn = $_POST['magn']; $pp17 = 500; $pc17 = 500  ;}else{$pp17  = 0; $pc17  = 0; $magn = 0;}
	if(!empty($_POST['ptp'])){$ptp  = $_POST['ptp']; $pp18 = 500; $pc18 = 500  ;}else{$pp18  = 0; $pc18  = 0; $ptp  = 0;}
	if(!empty($_POST['gtt'])){$gtt  = $_POST['gtt']; $pp19 = 500; $pc19 = 500  ;}else{$pp19  = 0; $pc19  = 0; $gtt  = 0;}
	if(!empty($_POST['ioskna'])){$ioskna = $_POST['ioskna']; $pp20 = 2000   ; $pc20 = 500  ;}else{$pp20  = 0; $pc20  = 0; $ioskna = 0;}
	
	if(!empty($_POST['cbc'])){$cbc  = $_POST['cbc']; $pp21 = 500; $pc21 = 500  ;}else{$pp21  = 0; $pc21  = 0; $cbc  = 0;}
	if(!empty($_POST['abog'])){$abog = $_POST['abog']; $pp22 = 500; $pc22 = 500  ;}else{$pp22  = 0; $pc22  = 0; $abog = 0;}
	if(!empty($_POST['ptaptt'])){$ptaptt = $_POST['ptaptt']; $pp23 = 1500   ; $pc23 = 500  ;}else{$pp23  = 0; $pc23  = 0; $ptaptt = 0;}
	if(!empty($_POST['tpinr'])){$tpinr  = $_POST['tpinr']; $pp24 = 1000   ; $pc24 = 500  ;}else{$pp24  = 0; $pc24  = 0; $tpinr  = 0;}
	if(!empty($_POST['rbcm'])){$rbcm = $_POST['rbcm']; $pp25 = 2000   ; $pc25 = 500  ;}else{$pp25  = 0; $pc25  = 0; $rbcm = 0;}
	if(!empty($_POST['testemel'])){$testemel = $_POST['testemel']; $pp26 = 1000   ; $pc26 = 500  ;}else{$pp26  = 0; $pc26  = 0; $testemel = 0;}
	if(!empty($_POST['tauret'])){$tauret = $_POST['tauret']; $pp27 = 1000   ; $pc27 = 500  ;}else{$pp27  = 0; $pc27  = 0; $tauret = 0;}
	if(!empty($_POST['esr'])){$esr  = $_POST['esr']; $pp28 = 500; $pc28 = 500  ;}else{$pp28  = 0; $pc28  = 0; $esr  = 0;}
	if(!empty($_POST['urin'])){$urin = $_POST['urin']; $pp29 = 500; $pc29 = 500  ;}else{$pp29  = 0; $pc29  = 0; $urin = 0;}
	if(!empty($_POST['stol'])){$stol = $_POST['stol']; $pp30 = 500; $pc30 = 500  ;}else{$pp30  = 0; $pc30  = 0; $stol = 0;}
	if(!empty($_POST['urinbs'])){$urinbs = $_POST['urinbs']; $pp31 = 4000   ; $pc31 = 500  ;}else{$pp31  = 0; $pc31  = 0; $urinbs = 0;}
	if(!empty($_POST['sob'])){$sob  = $_POST['sob']; $pp32 = 4000   ; $pc32 = 500  ;}else{$pp32  = 0; $pc32  = 0; $sob  = 0;}
	if(!empty($_POST['pus'])){$pus  = $_POST['pus']; $pp33 = 4000   ; $pc33 = 500  ;}else{$pp33  = 0; $pc33  = 0; $pus  = 0;}
	if(!empty($_POST['csfre'])){$csfre  = $_POST['csfre']; $pp34 = 5500   ; $pc34 = 500  ;}else{$pp34  = 0; $pc34  = 0; $csfre  = 0;}
	if(!empty($_POST['pore'])){$pore = $_POST['pore']; $pp35 = 3500   ; $pc35 = 500  ;}else{$pp35  = 0; $pc35  = 0; $pore = 0;}
	if(!empty($_POST['pgorg'])){$pgorg  = $_POST['pgorg']; $pp36 = 3500   ; $pc36 = 500  ;}else{$pp36  = 0; $pc36  = 0; $pgorg  = 0;}
	if(!empty($_POST['pvatb'])){$pvatb  = $_POST['pvatb']; $pp37 = 4000   ; $pc37 = 500  ;}else{$pp37  = 0; $pc37  = 0; $pvatb  = 0;}
	if(!empty($_POST['pvatbrs'])){$pvatbrs  = $_POST['pvatbrs']; $pp38 = 6500   ; $pc38 = 500  ;}else{$pp38  = 0; $pc38  = 0; $pvatbrs  = 0;}
	if(!empty($_POST['burin'])){$burin  = $_POST['burin']; $pp39 = 3000   ; $pc39 = 500  ;}else{$pp39  = 0; $pc39  = 0; $burin  = 0;}
	if(!empty($_POST['psa'])){$psa  = $_POST['psa']; $pp40 = 3000   ; $pc40 = 500  ;}else{$pp40  = 0; $pc40  = 0; $psa  = 0;}
	if(!empty($_POST['tsh'])){$tsh  = $_POST['tsh']; $pp41 = 2500   ; $pc41 = 500  ;}else{$pp41  = 0; $pc41  = 0; $tsh  = 0;}
	if(!empty($_POST['t3'])){$t3 = $_POST['t3']; $pp42 = 2500   ; $pc42 = 500  ;}else{$pp42  = 0; $pc42  = 0; $t3 = 0;}
	if(!empty($_POST['t4'])){$t4 = $_POST['t4']; $pp43 = 2500   ; $pc43 = 500  ;}else{$pp43  = 0; $pc43  = 0; $t4 = 0;}
	if(!empty($_POST['betahcg'])){$betahcg  = $_POST['betahcg']; $pp44 = 2500   ; $pc44 = 500  ;}else{$pp44  = 0; $pc44  = 0; $betahcg  = 0;}
	if(!empty($_POST['acahbc'])){$acahbc = $_POST['acahbc']; $pp45 = 2500   ; $pc45 = 500  ;}else{$pp45  = 0; $pc45  = 0; $acahbc = 0;}
	if(!empty($_POST['ca125'])){$ca125  = $_POST['ca125']; $pp46 = 2500   ; $pc46 = 500  ;}else{$pp46  = 0; $pc46  = 0; $ca125  = 0;}
	if(!empty($_POST['ca19'])){$ca19 = $_POST['ca19']; $pp47 = 2500   ; $pc47 = 500  ;}else{$pp47  = 0; $pc47  = 0; $ca19 = 0;}
	if(!empty($_POST['testo'])){$testo  = $_POST['testo']; $pp48 = 2500   ; $pc48 = 500  ;}else{$pp48  = 0; $pc48  = 0; $testo  = 0;}
	if(!empty($_POST['tropo'])){$tropo  = $_POST['tropo']; $pp49 = 3500   ; $pc49 = 500  ;}else{$pp49  = 0; $pc49  = 0; $tropo  = 0;}
	if(!empty($_POST['dimeres'])){$dimeres  = $_POST['dimeres']; $pp50 = 4000   ; $pc50 = 500  ;}else{$pp50  = 0; $pc50  = 0; $dimeres  = 0;}
	if(!empty($_POST['prl'])){$prl  = $_POST['prl']; $pp51 = 2500   ; $pc51 = 500  ;}else{$pp51  = 0; $pc51  = 0; $prl  = 0;}
	if(!empty($_POST['fsh'])){$fsh  = $_POST['fsh']; $pp52 = 2500   ; $pc52 = 500  ;}else{$pp52  = 0; $pc52  = 0; $fsh  = 0;}
	if(!empty($_POST['lh'])){$lh = $_POST['lh']; $pp53 = 2500   ; $pc53 = 500  ;}else{$pp53  = 0; $pc53  = 0; $lh = 0;}
	if(!empty($_POST['hbsag'])){$hbsag  = $_POST['hbsag']; $pp54 = 500; $pc54 = 500  ;}else{$pp54  = 0; $pc54  = 0; $hbsag  = 0;}
	if(!empty($_POST['hcvab'])){$hcvab  = $_POST['hcvab']; $pp55 = 500; $pc55 = 500  ;}else{$pp55  = 0; $pc55  = 0; $hcvab  = 0;}
	if(!empty($_POST['hivab'])){$hivab  = $_POST['hivab']; $pp56 = 500; $pc56 = 500  ;}else{$pp56  = 0; $pc56  = 0; $hivab  = 0;}
	if(!empty($_POST['hbc'])){$hbc  = $_POST['hbc']; $pp57 = 500; $pc57 = 500  ;}else{$pp57  = 0; $pc57  = 0; $hbc  = 0;}
	if(!empty($_POST['crp'])){$crp  = $_POST['crp']; $pp58 = 500; $pc58 = 500  ;}else{$pp58  = 0; $pc58  = 0; $crp  = 0;}
	if(!empty($_POST['facrhu'])){$facrhu = $_POST['facrhu']; $pp59 = 500; $pc59 = 500  ;}else{$pp59  = 0; $pc59  = 0; $facrhu = 0;}
	if(!empty($_POST['aslo'])){$aslo = $_POST['aslo']; $pp60 = 500; $pc60 = 500  ;}else{$pp60  = 0; $pc60  = 0; $aslo = 0;}
	if(!empty($_POST['vdrl'])){$vdrl = $_POST['vdrl']; $pp61 = 500; $pc61 = 500  ;}else{$pp61  = 0; $pc61  = 0; $vdrl = 0;}
	if(!empty($_POST['hbpylo'])){$hbpylo = $_POST['hbpylo']; $pp62 = 500; $pc62 = 500  ;}else{$pp62  = 0; $pc62  = 0; $hbpylo = 0;}
	if(!empty($_POST['toxo'])){$toxo = $_POST['toxo']; $pp63 = 500; $pc63 = 500  ;}else{$pp63  = 0; $pc63  = 0; $toxo = 0;}
	if(!empty($_POST['rub'])){$rub  = $_POST['rub']; $pp64 = 500; $pc64 = 500  ;}else{$pp64  = 0; $pc64  = 0; $rub  = 0;}


	//nouvelle analyse ajouté
	if(!empty($_POST['c_hdl'])){$c_hdl = $_POST['c_hdl']; $pp65 = 500; $pc65 = 500;}else{$pp65 = 0; $pc65 = 0; $c_hdl = 0;}
	if(!empty($_POST['c_ldl'])){$c_ldl = $_POST['c_ldl']; $pp66 = 500; $pc66 = 500;}else{$pp66 = 0; $pc66 = 0; $c_ldl = 0;}
	if(!empty($_POST['proteinurie'])){$proteinurie = $_POST['proteinurie']; $pp67 = 500; $pc67 = 500;}else{$pp67 = 0; $pc67 = 0; $proteinurie = 0;}
	if(!empty($_POST['fer_serique'])){$fer_serique = $_POST['fer_serique']; $pp68 = 500; $pc68 = 500;}else{$pp68 = 0; $pc68 = 0; $fer_serique = 0;}
	if(!empty($_POST['ferritine'])){$ferritine = $_POST['ferritine']; $pp69 = 1000; $pc69 = 500;}else{$pp69 = 0; $pc69 = 0; $ferritine = 0;}
	if(!empty($_POST['proteinurie_24h'])){$proteinurie_24h = $_POST['proteinurie_24h']; $pp70 = 500; $pc70 = 500;}else{$pp70 = 0; $pc70 = 0; $proteinurie_24h = 0;}
	if(!empty($_POST['ck_mb'])){$ck_mb = $_POST['ck_mb']; $pp71 = 1000; $pc71 = 500;}else{$pp71 = 0; $pc71 = 0; $ck_mb = 0;}
	if(!empty($_POST['lipasemie'])){$lipasemie = $_POST['lipasemie']; $pp72 = 500; $pc72 = 500;}else{$pp72 = 0; $pc72 = 0; $lipasemie = 0;}
	if(!empty($_POST['ge_fm'])){$ge_fm = $_POST['ge_fm']; $pp73 = 500; $pc73 = 500;}else{$pp73 = 0; $pc73 = 0; $ge_fm = 0;}
	if(!empty($_POST['coproculture'])){$coproculture = $_POST['coproculture']; $pp74 = 2500; $pc74 = 500;}else{$pp74 = 0; $pc74 = 0; $coproculture = 0;}
	if(!empty($_POST['cytobacterio_expectorations'])){$cytobacterio_expectorations = $_POST['cytobacterio_expectorations']; $pp75 = 2500; $pc75 = 500;}else{$pp75 = 0; $pc75 = 0; $cytobacterio_expectorations = 0;}
	if(!empty($_POST['liquide_ponction'])){$liquide_ponction = $_POST['liquide_ponction']; $pp76 = 3500; $pc76 = 500;}else{$pp76 = 0; $pc76 = 0; $liquide_ponction = 0;}
	if(!empty($_POST['recherche_rotadeno_selles'])){$recherche_rotadeno_selles = $_POST['recherche_rotadeno_selles']; $pp77 = 1000; $pc77 = 500;}else{$pp77 = 0; $pc77 = 0; $recherche_rotadeno_selles = 0;}
	if(!empty($_POST['recherche_ag_h_pylori_selles'])){$recherche_ag_h_pylori_selles = $_POST['recherche_ag_h_pylori_selles']; $pp78 = 500; $pc78 = 500;}else{$pp78 = 0; $pc78 = 0; $recherche_ag_h_pylori_selles = 0;}
	if(!empty($_POST['recherche_hav_selles'])){$recherche_hav_selles = $_POST['recherche_hav_selles']; $pp79 = 500; $pc79 = 500;}else{$pp79 = 0; $pc79 = 0; $recherche_hav_selles = 0;}
	if(!empty($_POST['psa_free'])){$psa_free = $_POST['psa_free']; $pp80 = 2000; $pc80 = 500;}else{$pp80 = 0; $pc80 = 0; $psa_free = 0;}
	if(!empty($_POST['progestérone'])){$progestérone = $_POST['progestérone']; $pp81 = 2000; $pc81 = 500;}else{$pp81 = 0; $pc81 = 0; $progestérone = 0;}
	if(!empty($_POST['ac_anti_hbs'])){$ac_anti_hbs = $_POST['ac_anti_hbs']; $pp82 = 2000; $pc82 = 500;}else{$pp82 = 0; $pc82 = 0; $ac_anti_hbs = 0;}
	if(!empty($_POST['oestradiol'])){$oestradiol = $_POST['oestradiol']; $pp83 = 2000; $pc83 = 500;}else{$pp83 = 0; $pc83 = 0; $oestradiol = 0;}
	if(!empty($_POST['ag_hbe'])){$ag_hbe = $_POST['ag_hbe']; $pp84 = 2500; $pc84 = 500;}else{$pp84 = 0; $pc84 = 0; $ag_hbe = 0;}
	if(!empty($_POST['ac_anti_hbe'])){$ac_anti_hbe = $_POST['ac_anti_hbe']; $pp85 = 2500; $pc85 = 500;}else{$pp85 = 0; $pc85 = 0; $ac_anti_hbe = 0;}
	if(!empty($_POST['nt_proBNP'])){$nt_proBNP = $_POST['nt_proBNP']; $pp86 = 4500; $pc86 = 500;}else{$pp86 = 0; $pc86 = 0; $nt_proBNP = 0;}
	if(!empty($_POST['hav'])){$hav = $_POST['hav']; $pp88 = 500; $pc88 = 500;}else{$pp88 = 0; $pc88 = 0; $hav = 0;}
	if(!empty($_POST['serologie_typhoide'])){$serologie_typhoide = $_POST['serologie_typhoide']; $pp89 = 500; $pc89 = 500;}else{$pp89 = 0; $pc89 = 0; $serologie_typhoide = 0;}
	if(!empty($_POST['serologie_brucellose'])){$serologie_brucellose = $_POST['serologie_brucellose']; $pp90 = 500; $pc90 = 500;}else{$pp90 = 0; $pc90 = 0; $serologie_brucellose = 0;}
	if(!empty($_POST['ioskk'])){$ioskk = $_POST['ioskk']; $pp91 = 2000   ; $pc91 = 500  ;}else{$pp91  = 0; $pc91  = 0; $ioskk = 0;}
	if(!empty($_POST['ioskcl'])){$ioskcl = $_POST['ioskcl']; $pp92 = 2000   ; $pc92 = 500  ;}else{$pp92  = 0; $pc92  = 0; $ioskcl = 0;}


	$pandoc =  $pp1 + $pp2 + $pp3 + $pp4 + $pp5 + $pp6 + $pp7 + $pp8 + $pp9 + $pp10 + $pp11 + $pp12 + $pp13 + $pp14 + $pp15 + $pp16 + $pp17 + $pp18 + $pp19 + $pp20 + $pp21 + $pp22 + $pp23 + $pp24 + $pp25 + $pp26 + $pp27 + $pp28 + $pp29 + $pp30 + $pp31 + $pp32 + $pp33 + $pp34 + $pp35 + $pp36 + $pp37 + $pp38 + $pp39 + $pp40 + $pp41 + $pp42 + $pp43 + $pp44 + $pp45 + $pp46 + $pp47 + $pp48 + $pp49 + $pp50 + $pp51 + $pp52 + $pp53 + $pp54 + $pp55 + $pp56 + $pp57 + $pp58 + $pp59 + $pp60 + $pp61 + $pp62 + $pp63 + $pp64 + $pp65 + $pp66 + $pp67 + $pp68 + $pp69 + $pp70 + $pp71 + $pp72 + $pp73 + $pp74 + $pp75 + $pp76 + $pp77 + $pp78 + $pp79 + $pp80 + $pp81 + $pp82 + $pp83 + $pp84 + $pp85 + $pp86 + $pp87 + $pp88 + $pp89 + $pp90 + $pp91 + $pp92;
	$pcandoc =  $pc1 + $pc2 + $pc3 + $pc4 + $pc5 + $pc6 + $pc7 + $pc8 + $pc9 + $pc10 + $pc11 + $pc12 + $pc13 + $pc14 + $pc15 + $pc16 + $pc17 + $pc18 + $pc19 + $pc20 + $pc21 + $pc22 + $pc23 + $pc24 + $pc25 + $pc26 + $pc27 + $pc28 + $pc29 + $pc30 + $pc31 + $pc32 + $pc33 + $pc34 + $pc35 + $pc36 + $pc37 + $pc38 + $pc39 + $pc40 + $pc41 + $pc42 + $pc43 + $pc44 + $pc45 + $pc46 + $pc47 + $pc48 + $pc49 + $pc50 + $pc51 + $pc52 + $pc53 + $pc54 + $pc55 + $pc56 + $pc57 + $pc58 + $pc59 + $pc60 + $pc61 + $pc62 + $pc63 + $pc64 + $pc65 + $pc66 + $pc67 + $pc68 + $pc69 + $pc70 + $pc71 + $pc72 + $pc73 + $pc74 + $pc75 + $pc76 + $pc77 + $pc78 + $pc79 + $pc80 + $pc81 + $pc82 + $pc83 + $pc84 + $pc85 + $pc86 + $pc87 + $pc88 + $pc89 + $pc90 + $pc91 + $pc92;
	 $res = 2;
	 $chk = "NON";

	$sql = "INSERT INTO andocs (idexam, idan, identexam, heurdexam, datexam, motif, fg,rg,hgpo,chol,tc,sgot,ldh,sgptalt,urea,crea,ua,alb,br,brdi,alkphos,calc,magn,ptp,gtt,ioskna,ioskk,ioskcl,cbc,abog,ptaptt,tpinr,rbcm,testemel,tauret,esr,urin,stol,urinbs,sob,pus,csfre,pore,pgorg,pvatb,pvatbrs,burin,psa,tsh,t3,t4,betahcg,acahbc,ca125,ca19,testo,tropo,dimeres,prl,fsh,lh,hbsag,hcvab,hivab,hbc,crp,facrhu,aslo,vdrl,hbpylo,toxo,rub, pandoc, pcandoc, chk,c_hdl,c_ldl,proteinurie,fer_serique,ferritine,proteinurie_24h,ck_mb,lipasemie,ge_fm,coproculture,cytobacterio_expectorations,liquide_ponction,recherche_rotadeno_selles,recherche_ag_h_pylori_selles,recherche_hav_selles,psa_free,progestérone,ac_anti_hbs,oestradiol,ag_hbe,ac_anti_hbe,nt_proBNP,hav,serologie_typhoide,serologie_brucellose) VALUES ('$idexam','$idan','$identexam','$heurdexam','$datexam','$motiff','$fg','$rg','$hgpo','$chol','$tc','$sgot','$ldh','$sgptalt','$urea','$crea','$ua','$alb','$br','$brdi','$alkphos','$calc','$magn','$ptp','$gtt','$ioskna','$ioskk','$ioskcl','$cbc','$abog','$ptaptt','$tpinr','$rbcm','$testemel','$tauret','$esr','$urin','$stol','$urinbs','$sob','$pus','$csfre','$pore','$pgorg','$pvatb','$pvatbrs','$burin','$psa','$tsh','$t3','$t4','$betahcg','$acahbc','$ca125','$ca19','$testo','$tropo','$dimeres','$prl','$fsh','$lh','$hbsag','$hcvab','$hivab','$hbc','$crp','$facrhu','$aslo','$vdrl','$hbpylo','$toxo','$rub','$pandoc','$pcandoc','$chk','$c_hdl','$c_ldl','$proteinurie','$fer_serique','$ferritine','$proteinurie_24h','$ck_mb','$lipasemie','$ge_fm','$coproculture','$cytobacterio_expectorations','$liquide_ponction','$recherche_rotadeno_selles','$recherche_ag_h_pylori_selles','$recherche_hav_selles','$psa_free','$progestérone','$ac_anti_hbs','$oestradiol','$ag_hbe','$ac_anti_hbe','$nt_proBNP','$hav','$serologie_typhoide','$serologie_brucellose')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	if (isset($mysqli)) {
		$mysqlif = new mysqli('localhost','root','','spn');
		//$mysqlif->query($sqlf);
		if(!empty($_POST['fg'])){$fg = $_POST['fg'];$pp1 =500; $pc1 =500;$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Glycémie à jeun','$idan','$datehos','$paix','$pp1','$pc1','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf1 );}else{$pp1 = 0; $pc1 = 0; $fg = 0;}
		if(!empty($_POST['rg'])){$rg = $_POST['rg'];$pp2 =500; $pc2 =500;$sqlf2 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Glycémie post prandiale','$idan','$datehos','$paix','$pp2','$pc2','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf2 );}else{$pp2 = 0; $pc2 = 0; $rg = 0;}
		if(!empty($_POST['hgpo'])){$hgpo = $_POST['hgpo'];$pp3 =1500; $pc3 =500;$sqlf3 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Hyperglycémie provoquée par voie orale (HGPO)','$idan','$datehos','$paix','$pp3','$pc3','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf3 );}else{$pp3 = 0; $pc3 = 0; $hgpo = 0;}
		if(!empty($_POST['chol'])){$chol = $_POST['chol'];$pp4 =500; $pc4 =500;$sqlf4 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Cholestérol Total','$idan','$datehos','$paix','$pp4','$pc4','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf4 );}else{$pp4 = 0; $pc4 = 0; $chol = 0;}
		if(!empty($_POST['tc'])){$tc = $_POST['tc'];$pp5 =500; $pc5 =500;$sqlf5 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Triglycérides','$idan','$datehos','$paix','$pp5','$pc5','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf5 );}else{$pp5 = 0; $pc5 = 0; $tc = 0;}
		if(!empty($_POST['sgot'])){$sgot = $_POST['sgot'];$pp6 =500; $pc6 =500;$sqlf6 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ASAT','$idan','$datehos','$paix','$pp6','$pc6','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf6 );}else{$pp6 = 0; $pc6 = 0; $sgot = 0;}
		if(!empty($_POST['ldh'])){$ldh = $_POST['ldh'];$pp7 =500; $pc7 =500;$sqlf7 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','LDH','$idan','$datehos','$paix','$pp7','$pc7','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf7 );}else{$pp7 = 0; $pc7 = 0; $ldh = 0;}
		if(!empty($_POST['sgptalt'])){$sgptalt = $_POST['sgptalt'];$pp8 =500; $pc8 =500;$sqlf8 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ALAT','$idan','$datehos','$paix','$pp8','$pc8','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf8 );}else{$pp8 = 0; $pc8 = 0; $sgptalt = 0;}
		if(!empty($_POST['urea'])){$urea = $_POST['urea'];$pp9 =500; $pc9 =500;$sqlf9 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Urée','$idan','$datehos','$paix','$pp9','$pc9','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf9 );}else{$pp9 = 0; $pc9 = 0; $urea = 0;}
		if(!empty($_POST['crea'])){$crea = $_POST['crea'];$pp10 =500; $pc10 =500;$sqlf10 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Créatinine','$idan','$datehos','$paix','$pp10','$pc10','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf10 );}else{$pp10 = 0; $pc10 = 0; $crea = 0;}
		if(!empty($_POST['ua'])){$ua = $_POST['ua'];$pp11 =500; $pc11 =500;$sqlf11 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Acide urique(Uricémie)','$idan','$datehos','$paix','$pp11','$pc11','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf11 );}else{$pp11 = 0; $pc11 = 0; $ua = 0;}
		if(!empty($_POST['alb'])){$alb = $_POST['alb'];$pp12 =500; $pc12 =500;$sqlf12 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Albumine','$idan','$datehos','$paix','$pp12','$pc12','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf12 );}else{$pp12 = 0; $pc12 = 0; $alb = 0;}
		if(!empty($_POST['br'])){$br = $_POST['br'];$pp13 =500; $pc13 =500;$sqlf13 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Bilirubine Totale','$idan','$datehos','$paix','$pp13','$pc13','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf13 );}else{$pp13 = 0; $pc13 = 0; $br = 0;}
		if(!empty($_POST['brdi'])){$brdi = $_POST['brdi'];$pp14 =500; $pc14 =500;$sqlf14 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Bilirubine Conjuguée (Directe)','$idan','$datehos','$paix','$pp14','$pc14','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf14 );}else{$pp14 = 0; $pc14 = 0; $brdi = 0;}
		if(!empty($_POST['alkphos'])){$alkphos = $_POST['alkphos'];$pp15 =500; $pc15 =500;$sqlf15 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Phosphatase Alcaline (PAL)','$idan','$datehos','$paix','$pp15','$pc15','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf15 );}else{$pp15 = 0; $pc15 = 0; $alkphos = 0;}
		if(!empty($_POST['calc'])){$calc = $_POST['calc'];$pp16 =500; $pc16 =500;$sqlf16 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Calcium','$idan','$datehos','$paix','$pp16','$pc16','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf16 );}else{$pp16 = 0; $pc16 = 0; $calc = 0;}
		if(!empty($_POST['magn'])){$magn = $_POST['magn'];$pp17 =500; $pc17 =500;$sqlf17 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Magnésium','$idan','$datehos','$paix','$pp17','$pc17','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf17 );}else{$pp17 = 0; $pc17 = 0; $magn = 0;}
		if(!empty($_POST['ptp'])){$ptp = $_POST['ptp'];$pp18 =500; $pc18 =500;$sqlf18 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Protéines Totales(Protidémie)','$idan','$datehos','$paix','$pp18','$pc18','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf18 );}else{$pp18 = 0; $pc18 = 0; $ptp = 0;}
		if(!empty($_POST['gtt'])){$gtt = $_POST['gtt'];$pp19 =500; $pc19 =500;$sqlf19 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Gamma-Glutamyl-Tranférase (GGT)','$idan','$datehos','$paix','$pp19','$pc19','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf19 );}else{$pp19 = 0; $pc19 = 0; $gtt = 0;}
		if(!empty($_POST['ioskna'])){$ioskna = $_POST['ioskna'];$pp20 =2000; $pc20 =500;$sqlf20 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ionogramme Sanguin (Na+, k+, Cl-)','$idan','$datehos','$paix','$pp20','$pc20','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf20 );}else{$pp20 = 0; $pc20 = 0; $ioskna = 0;}
		if(!empty($_POST['cbc'])){$cbc = $_POST['cbc'];$pp21 =500; $pc21 =500;$sqlf21 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','NFS','$idan','$datehos','$paix','$pp21','$pc21','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf21 );}else{$pp21 = 0; $pc21 = 0; $cbc = 0;}
		if(!empty($_POST['abog'])){$abog = $_POST['abog'];$pp22 =500; $pc22 =500;$sqlf22 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Groupage sanguine (GSRh)','$idan','$datehos','$paix','$pp22','$pc22','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf22 );}else{$pp22 = 0; $pc22 = 0; $abog = 0;}
		if(!empty($_POST['ptaptt'])){$ptaptt = $_POST['ptaptt'];$pp23 =1500; $pc23 =500;$sqlf23 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TP/TCK/INR','$idan','$datehos','$paix','$pp23','$pc23','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf23 );}else{$pp23 = 0; $pc23 = 0; $ptaptt = 0;}
		if(!empty($_POST['tpinr'])){$tpinr = $_POST['tpinr'];$pp24 =1000; $pc24 =500;$sqlf24 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TP/INR','$idan','$datehos','$paix','$pp24','$pc24','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf24 );}else{$pp24 = 0; $pc24 = 0; $tpinr = 0;}
		if(!empty($_POST['rbcm'])){$rbcm = $_POST['rbcm'];$pp25 =2000; $pc25 =500;$sqlf25 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Frottis sanguin','$idan','$datehos','$paix','$pp25','$pc25','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf25 );}else{$pp25 = 0; $pc25 = 0; $rbcm = 0;}
		if(!empty($_POST['testemel'])){$testemel = $_POST['testemel'];$pp26 =1000; $pc26 =500;$sqlf26 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Test d’Emmel','$idan','$datehos','$paix','$pp26','$pc26','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf26 );}else{$pp26 = 0; $pc26 = 0; $testemel = 0;}
		if(!empty($_POST['tauret'])){$tauret = $_POST['tauret'];$pp27 =1000; $pc27 =500;$sqlf27 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Taux de réticulocytes','$idan','$datehos','$paix','$pp27','$pc27','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf27 );}else{$pp27 = 0; $pc27 = 0; $tauret = 0;}
		if(!empty($_POST['esr'])){$esr = $_POST['esr'];$pp28 =500; $pc28 =500;$sqlf28 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Vitesse de sédimentation','$idan','$datehos','$paix','$pp28','$pc28','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf28 );}else{$pp28 = 0; $pc28 = 0; $esr = 0;}
		if(!empty($_POST['urin'])){$urin = $_POST['urin'];$pp29 =500; $pc29 =500;$sqlf29 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ECBU','$idan','$datehos','$paix','$pp29','$pc29','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf29 );}else{$pp29 = 0; $pc29 = 0; $urin = 0;}
		if(!empty($_POST['stol'])){$stol = $_POST['stol'];$pp30 =500; $pc30 =500;$sqlf30 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Examen parasitologique des selles  (KAOP)','$idan','$datehos','$paix','$pp30','$pc30','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf30 );}else{$pp30 = 0; $pc30 = 0; $stol = 0;}
		if(!empty($_POST['urinbs'])){$urinbs = $_POST['urinbs'];$pp31 =4000; $pc31 =500;$sqlf31 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ECBU+Culture','$idan','$datehos','$paix','$pp31','$pc31','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf31 );}else{$pp31 = 0; $pc31 = 0; $urinbs = 0;}
		if(!empty($_POST['sob'])){$sob = $_POST['sob'];$pp32 =4000; $pc32 =500;$sqlf32 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Examen bactériologique des selles','$idan','$datehos','$paix','$pp32','$pc32','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf32 );}else{$pp32 = 0; $pc32 = 0; $sob = 0;}
		if(!empty($_POST['pus'])){$pus = $_POST['pus'];$pp33 =4000; $pc33 =500;$sqlf33 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Pus','$idan','$datehos','$paix','$pp33','$pc33','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf33 );}else{$pp33 = 0; $pc33 = 0; $pus = 0;}
		if(!empty($_POST['csfre'])){$csfre = $_POST['csfre'];$pp34 =5500; $pc34 =500;$sqlf34 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','LCR/CSF','$idan','$datehos','$paix','$pp34','$pc34','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf34 );}else{$pp34 = 0; $pc34 = 0; $csfre = 0;}
		if(!empty($_POST['pore'])){$pore = $_POST['pore'];$pp35 =3500; $pc35 =500;$sqlf35 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Prélèvement d’oreille','$idan','$datehos','$paix','$pp35','$pc35','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf35 );}else{$pp35 = 0; $pc35 = 0; $pore = 0;}
		if(!empty($_POST['pgorg'])){$pgorg = $_POST['pgorg'];$pp36 =3500; $pc36 =500;$sqlf36 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Prélèvement de Gorge','$idan','$datehos','$paix','$pp36','$pc36','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf36 );}else{$pp36 = 0; $pc36 = 0; $pgorg = 0;}
		if(!empty($_POST['pvatb'])){$pvatb = $_POST['pvatb'];$pp37 =4000; $pc37 =500;$sqlf37 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','PV+ATB','$idan','$datehos','$paix','$pp37','$pc37','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf37 );}else{$pp37 = 0; $pc37 = 0; $pvatb = 0;}
		if(!empty($_POST['pvatbrs'])){$pvatbrs = $_POST['pvatbrs'];$pp38 =6500; $pc38 =500;$sqlf38 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('',' PV+ATB ET RECHERCHE SPECIFIQUE (mycoplasme ; chlamydia)','$idan','$datehos','$paix','$pp38','$pc38','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf38 );}else{$pp38 = 0; $pc38 = 0; $pvatbrs = 0;}
		if(!empty($_POST['burin'])){$burin = $_POST['burin'];$pp39 =3000; $pc39 =500;$sqlf39 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Bandelette urinaire','$idan','$datehos','$paix','$pp39','$pc39','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf39 );}else{$pp39 = 0; $pc39 = 0; $burin = 0;}
		if(!empty($_POST['psa'])){$psa = $_POST['psa'];$pp40 =3000; $pc40 =500;$sqlf40 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','PSA','$idan','$datehos','$paix','$pp40','$pc40','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf40 );}else{$pp40 = 0; $pc40 = 0; $psa = 0;}
		if(!empty($_POST['tsh'])){$tsh = $_POST['tsh'];$pp41 =2500; $pc41 =500;$sqlf41 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TSH','$idan','$datehos','$paix','$pp41','$pc41','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf41 );}else{$pp41 = 0; $pc41 = 0; $tsh = 0;}
		if(!empty($_POST['t3'])){$t3 = $_POST['t3'];$pp42 =2500; $pc42 =500;$sqlf42 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','FT3','$idan','$datehos','$paix','$pp42','$pc42','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf42 );}else{$pp42 = 0; $pc42 = 0; $t3 = 0;}
		if(!empty($_POST['t4'])){$t4 = $_POST['t4'];$pp43 =2500; $pc43 =500;$sqlf43 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','FT4','$idan','$datehos','$paix','$pp43','$pc43','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf43 );}else{$pp43 = 0; $pc43 = 0; $t4 = 0;}
		if(!empty($_POST['betahcg'])){$betahcg = $_POST['betahcg'];$pp44 =2500; $pc44 =500;$sqlf44 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','BETA HCG','$idan','$datehos','$paix','$pp44','$pc44','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf44 );}else{$pp44 = 0; $pc44 = 0; $betahcg = 0;}
		if(!empty($_POST['acahbc'])){$acahbc = $_POST['acahbc'];$pp45 =2500; $pc45 =500;$sqlf45 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','AC ANTI HBC TOTAUX','$idan','$datehos','$paix','$pp45','$pc45','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf45 );}else{$pp45 = 0; $pc45 = 0; $acahbc = 0;}
		if(!empty($_POST['ca125'])){$ca125 = $_POST['ca125'];$pp46 =2500; $pc46 =500;$sqlf46 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','CA 125','$idan','$datehos','$paix','$pp46','$pc46','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf46 );}else{$pp46 = 0; $pc46 = 0; $ca125 = 0;}
		if(!empty($_POST['ca19'])){$ca19 = $_POST['ca19'];$pp47 =2500; $pc47 =500;$sqlf47 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','CA 19.9','$idan','$datehos','$paix','$pp47','$pc47','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf47 );}else{$pp47 = 0; $pc47 = 0; $ca19 = 0;}
		if(!empty($_POST['testo'])){$testo = $_POST['testo'];$pp48 =2500; $pc48 =500;$sqlf48 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TESTOSTERONE','$idan','$datehos','$paix','$pp48','$pc48','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf48 );}else{$pp48 = 0; $pc48 = 0; $testo = 0;}
		if(!empty($_POST['tropo'])){$tropo = $_POST['tropo'];$pp49 =3500; $pc49 =500;$sqlf49 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TROPONINE','$idan','$datehos','$paix','$pp49','$pc49','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf49 );}else{$pp49 = 0; $pc49 = 0; $tropo = 0;}
		if(!empty($_POST['dimeres'])){$dimeres = $_POST['dimeres'];$pp50 =4000; $pc50 =500;$sqlf50 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','DDIMERES','$idan','$datehos','$paix','$pp50','$pc50','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf50 );}else{$pp50 = 0; $pc50 = 0; $dimeres = 0;}
		if(!empty($_POST['prl'])){$prl = $_POST['prl'];$pp51 =2500; $pc51 =500;$sqlf51 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','PROLACTINE','$idan','$datehos','$paix','$pp51','$pc51','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf51 );}else{$pp51 = 0; $pc51 = 0; $prl = 0;}
		if(!empty($_POST['fsh'])){$fsh = $_POST['fsh'];$pp52 =2500; $pc52 =500;$sqlf52 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','FSH','$idan','$datehos','$paix','$pp52','$pc52','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf52 );}else{$pp52 = 0; $pc52 = 0; $fsh = 0;}
		if(!empty($_POST['lh'])){$lh = $_POST['lh'];$pp53 =2500; $pc53 =500;$sqlf53 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','LH','$idan','$datehos','$paix','$pp53','$pc53','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf53 );}else{$pp53 = 0; $pc53 = 0; $lh = 0;}
		if(!empty($_POST['hbsag'])){$hbsag = $_POST['hbsag'];$pp54 =500; $pc54 =500;$sqlf54 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ag Hbs','$idan','$datehos','$paix','$pp54','$pc54','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf54 );}else{$pp54 = 0; $pc54 = 0; $hbsag = 0;}
		if(!empty($_POST['hcvab'])){$hcvab = $_POST['hcvab'];$pp55 =500; $pc55 =500;$sqlf55 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ac Anti HCV','$idan','$datehos','$paix','$pp55','$pc55','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf55 );}else{$pp55 = 0; $pc55 = 0; $hcvab = 0;}
		if(!empty($_POST['hivab'])){$hivab = $_POST['hivab'];$pp56 =500; $pc56 =500;$sqlf56 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ac anti  HIV','$idan','$datehos','$paix','$pp56','$pc56','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf56 );}else{$pp56 = 0; $pc56 = 0; $hivab = 0;}
		if(!empty($_POST['hbc'])){$hbc = $_POST['hbc'];$pp57 =500; $pc57 =500;$sqlf57 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','HBC','$idan','$datehos','$paix','$pp57','$pc57','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf57 );}else{$pp57 = 0; $pc57 = 0; $hbc = 0;}
		if(!empty($_POST['crp'])){$crp = $_POST['crp'];$pp58 =500; $pc58 =500;$sqlf58 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','CRP','$idan','$datehos','$paix','$pp58','$pc58','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf58 );}else{$pp58 = 0; $pc58 = 0; $crp = 0;}
		if(!empty($_POST['facrhu'])){$facrhu = $_POST['facrhu'];$pp59 =500; $pc59 =500;$sqlf59 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','FACTEUR RHUMATOIDE','$idan','$datehos','$paix','$pp59','$pc59','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf59 );}else{$pp59 = 0; $pc59 = 0; $facrhu = 0;}
		if(!empty($_POST['aslo'])){$aslo = $_POST['aslo'];$pp60 =500; $pc60 =500;$sqlf60 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ASLO','$idan','$datehos','$paix','$pp60','$pc60','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf60 );}else{$pp60 = 0; $pc60 = 0; $aslo = 0;}
		if(!empty($_POST['vdrl'])){$vdrl = $_POST['vdrl'];$pp60 =500; $pc61 =500;$sqlf61 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','SYPHILIS','$idan','$datehos','$paix','$pp60','$pc61','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf61 );}else{$pp61 = 0; $pc61 = 0; $vdrl = 0;}
		if(!empty($_POST['hbpylo'])){$hbpylo = $_POST['hbpylo'];$pp61 =500; $pc62 =500;$sqlf62 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','HELICOBACTER PYLORI (HP)','$idan','$datehos','$paix','$pp61','$pc62','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf62 );}else{$pp62 = 0; $pc62 = 0; $hbpylo = 0;}
		if(!empty($_POST['toxo'])){$toxo = $_POST['toxo'];$pp62 =500; $pc63 =500;$sqlf63 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','TOXOPLASMOSE','$idan','$datehos','$paix','$pp62','$pc63','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf63 );}else{$pp63 = 0; $pc63 = 0; $toxo = 0;}
		if(!empty($_POST['rub'])){$rub = $_POST['rub'];$pp63 =500; $pc64 =500;$sqlf64 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','RUBEOLE','$idan','$datehos','$paix','$pp63','$pc64','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf64 );}else{$pp64 = 0; $pc64 = 0; $rub = 0;}
	//Analyse ajouter recement

		if(!empty($_POST['c_hdl'])){$c_hdl = $_POST['c_hdl']; $pp65 = 500; $pc65 = 500 ;$sqlf65 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','C-HDL','$idan','$datehos','$paix','$pp65','$pc65','$etat','$date_paix','$codf')";$mysqlif->query($sqlf65 );}else{$pp65 = 0; $pc65 = 0; $c_hdl = 0;}
		if(!empty($_POST['c_ldl'])){$c_ldl = $_POST['c_ldl']; $pp66 = 500; $pc66 = 500 ;$sqlf66 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','C-LDL','$idan','$datehos','$paix','$pp66','$pc66','$etat','$date_paix','$codf')";$mysqlif->query($sqlf66 );}else{$pp66 = 0; $pc66 = 0; $c_ldl = 0;}
		if(!empty($_POST['proteinurie'])){$proteinurie = $_POST['proteinurie']; $pp67 = 500; $pc67 = 500 ;$sqlf67 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Protéinurie','$idan','$datehos','$paix','$pp67','$pc67','$etat','$date_paix','$codf')";$mysqlif->query($sqlf67 );}else{$pp67 = 0; $pc67 = 0; $proteinurie = 0;}
		if(!empty($_POST['fer_serique'])){$fer_serique = $_POST['fer_serique']; $pp68 = 500; $pc68 = 500 ;$sqlf68 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Fer sérique','$idan','$datehos','$paix','$pp68','$pc68','$etat','$date_paix','$codf')";$mysqlif->query($sqlf68 );}else{$pp68 = 0; $pc68 = 0; $fer_serique = 0;}
		if(!empty($_POST['ferritine'])){$ferritine = $_POST['ferritine']; $pp69 = 1000; $pc69 = 500 ;$sqlf69 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ferritine (Ferritinémie)','$idan','$datehos','$paix','$pp69','$pc69','$etat','$date_paix','$codf')";$mysqlif->query($sqlf69 );}else{$pp69 = 0; $pc69 = 0; $ferritine = 0;}
		if(!empty($_POST['proteinurie_24h'])){$proteinurie_24h = $_POST['proteinurie_24h']; $pp70 = 500; $pc70 = 500 ;$sqlf70 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Protéinurie de 24H','$idan','$datehos','$paix','$pp70','$pc70','$etat','$date_paix','$codf')";$mysqlif->query($sqlf70 );}else{$pp70 = 0; $pc70 = 0; $proteinurie_24h = 0;}
		if(!empty($_POST['ck_mb'])){$ck_mb = $_POST['ck_mb']; $pp71 = 1000; $pc71 = 500 ;$sqlf71 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','CK-MB','$idan','$datehos','$paix','$pp71','$pc71','$etat','$date_paix','$codf')";$mysqlif->query($sqlf71 );}else{$pp71 = 0; $pc71 = 0; $ck_mb = 0;}
		if(!empty($_POST['lipasemie'])){$lipasemie = $_POST['lipasemie']; $pp72 = 500; $pc72 = 500 ;$sqlf72 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Lipasémie','$idan','$datehos','$paix','$pp72','$pc72','$etat','$date_paix','$codf')";$mysqlif->query($sqlf72 );}else{$pp72 = 0; $pc72 = 0; $lipasemie = 0;}
		if(!empty($_POST['ge_fm'])){$ge_fm = $_POST['ge_fm']; $pp73 = 500; $pc73 = 500 ;$sqlf73 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','GE/FM','$idan','$datehos','$paix','$pp73','$pc73','$etat','$date_paix','$codf')";$mysqlif->query($sqlf73 );}else{$pp73 = 0; $pc73 = 0; $ge_fm = 0;}
		if(!empty($_POST['coproculture'])){$coproculture = $_POST['coproculture']; $pp74 = 2500; $pc74 = 500 ;$sqlf74 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Coproculture','$idan','$datehos','$paix','$pp74','$pc74','$etat','$date_paix','$codf')";$mysqlif->query($sqlf74 );}else{$pp74 = 0; $pc74 = 0; $coproculture = 0;}
		if(!empty($_POST['cytobacterio_expectorations'])){$cytobacterio_expectorations = $_POST['cytobacterio_expectorations']; $pp75 = 2500; $pc75 = 500 ;$sqlf75 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Examen cytobactériologique des expectorations (crachats)','$idan','$datehos','$paix','$pp75','$pc75','$etat','$date_paix','$codf')";$mysqlif->query($sqlf75 );}else{$pp75 = 0; $pc75 = 0; $cytobacterio_expectorations = 0;}
		if(!empty($_POST['liquide_ponction'])){$liquide_ponction = $_POST['liquide_ponction']; $pp76 = 3500; $pc76 = 500 ;$sqlf76 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Liquide de ponction (ascite - pleural - péricardique - péritonéal)','$idan','$datehos','$paix','$pp76','$pc76','$etat','$date_paix','$codf')";$mysqlif->query($sqlf76 );}else{$pp76 = 0; $pc76 = 0; $liquide_ponction = 0;}
		if(!empty($_POST['recherche_rotadeno_selles'])){$recherche_rotadeno_selles = $_POST['recherche_rotadeno_selles']; $pp77 = 1000; $pc77 = 500 ;$sqlf77 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Recherche de Rota/Adénovirus dans les selles','$idan','$datehos','$paix','$pp77','$pc77','$etat','$date_paix','$codf')";$mysqlif->query($sqlf77 );}else{$pp77 = 0; $pc77 = 0; $recherche_rotadeno_selles = 0;}
		if(!empty($_POST['recherche_ag_h_pylori_selles'])){$recherche_ag_h_pylori_selles = $_POST['recherche_ag_h_pylori_selles']; $pp78 = 500; $pc78 = 500 ;$sqlf78 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Recherche Ag. H.pylori dans les selles','$idan','$datehos','$paix','$pp78','$pc78','$etat','$date_paix','$codf')";$mysqlif->query($sqlf78 );}else{$pp78 = 0; $pc78 = 0; $recherche_ag_h_pylori_selles = 0;}
		if(!empty($_POST['recherche_hav_selles'])){$recherche_hav_selles = $_POST['recherche_hav_selles']; $pp79 = 500; $pc79 = 500 ;$sqlf79 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Recherche HAV dans les selles','$idan','$datehos','$paix','$pp79','$pc79','$etat','$date_paix','$codf')";$mysqlif->query($sqlf79 );}else{$pp79 = 0; $pc79 = 0; $recherche_hav_selles = 0;}
		if(!empty($_POST['psa_free'])){$psa_free = $_POST['psa_free']; $pp80 = 2000; $pc80 = 500 ;$sqlf80 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','PSA free','$idan','$datehos','$paix','$pp80','$pc80','$etat','$date_paix','$codf')";$mysqlif->query($sqlf80 );}else{$pp80 = 0; $pc80 = 0; $psa_free = 0;}
		if(!empty($_POST['progestérone'])){$progestérone = $_POST['progestérone']; $pp81 = 2000; $pc81 = 500 ;$sqlf81 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Progestérone','$idan','$datehos','$paix','$pp81','$pc81','$etat','$date_paix','$codf')";$mysqlif->query($sqlf81 );}else{$pp81 = 0; $pc81 = 0; $progestérone = 0;}
		if(!empty($_POST['ac_anti_hbs'])){$ac_anti_hbs = $_POST['ac_anti_hbs']; $pp82 = 2000; $pc82 = 500 ;$sqlf82 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ac Anti Hbs','$idan','$datehos','$paix','$pp82','$pc82','$etat','$date_paix','$codf')";$mysqlif->query($sqlf82 );}else{$pp82 = 0; $pc82 = 0; $ac_anti_hbs = 0;}
		if(!empty($_POST['oestradiol'])){$oestradiol = $_POST['oestradiol']; $pp83 = 2000; $pc83 = 500 ;$sqlf83 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Œstradiol','$idan','$datehos','$paix','$pp83','$pc83','$etat','$date_paix','$codf')";$mysqlif->query($sqlf83 );}else{$pp83 = 0; $pc83 = 0; $oestradiol = 0;}
		if(!empty($_POST['ag_hbe'])){$ag_hbe = $_POST['ag_hbe']; $pp84 = 2500; $pc84 = 500 ;$sqlf84 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ag Hbe','$idan','$datehos','$paix','$pp84','$pc84','$etat','$date_paix','$codf')";$mysqlif->query($sqlf84 );}else{$pp84 = 0; $pc84 = 0; $ag_hbe = 0;}
		if(!empty($_POST['ac_anti_hbe'])){$ac_anti_hbe = $_POST['ac_anti_hbe']; $pp85 = 2500; $pc85 = 500 ;$sqlf85 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ac Anti Hbe','$idan','$datehos','$paix','$pp85','$pc85','$etat','$date_paix','$codf')";$mysqlif->query($sqlf85 );}else{$pp85 = 0; $pc85 = 0; $ac_anti_hbe = 0;}
		if(!empty($_POST['nt_proBNP'])){$nt_proBNP = $_POST['nt_proBNP']; $pp86 = 4500; $pc86 = 500 ;$sqlf86 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','NT-proBNP','$idan','$datehos','$paix','$pp86','$pc86','$etat','$date_paix','$codf')";$mysqlif->query($sqlf86 );}else{$pp86 = 0; $pc86 = 0; $nt_proBNP = 0;}
		if(!empty($_POST['aslo'])){$aslo = $_POST['aslo']; $pp87 = 500; $pc87 = 500 ;$sqlf87 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','ASLO','$idan','$datehos','$paix','$pp87','$pc87','$etat','$date_paix','$codf')";$mysqlif->query($sqlf87 );}else{$pp87 = 0; $pc87 = 0; $aslo = 0;}
		if(!empty($_POST['hav'])){$hav = $_POST['hav']; $pp88 = 500; $pc88 = 500 ;$sqlf88 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','HAV','$idan','$datehos','$paix','$pp88','$pc88','$etat','$date_paix','$codf')";$mysqlif->query($sqlf88 );}else{$pp88 = 0; $pc88 = 0; $hav = 0;}
		if(!empty($_POST['serologie_typhoide'])){$serologie_typhoide = $_POST['serologie_typhoide']; $pp89 = 500; $pc89 = 500 ;$sqlf89 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Sérologie Typhoïde','$idan','$datehos','$paix','$pp89','$pc89','$etat','$date_paix','$codf')";$mysqlif->query($sqlf89 );}else{$pp89 = 0; $pc89 = 0; $serologie_typhoide = 0;}
		if(!empty($_POST['serologie_brucellose'])){$serologie_brucellose = $_POST['serologie_brucellose']; $pp90 = 500; $pc90 = 500 ;$sqlf90 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Sérologie Brucellose','$idan','$datehos','$paix','$pp90','$pc90','$etat','$date_paix','$codf')";$mysqlif->query($sqlf90 );}else{$pp90 = 0; $pc90 = 0; $serologie_brucellose = 0;}
		if(!empty($_POST['ioskk'])){$ioskk = $_POST['ioskk'];$pp91 =2000; $pc91 =500;$sqlf20 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ionogramme Sanguin (k+)','$idan','$datehos','$paix','$pp65','$pc65','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf20 );}else{$pp91 = 0; $pc91 = 0; $ioskk = 0;}
		if(!empty($_POST['ioskcl'])){$ioskcl = $_POST['ioskcl'];$pp66 =2000; $pc66 =500;$sqlf20 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, codf) VALUES ('','Ionogramme Sanguin (Cl)','$idan','$datehos','$paix','$pp92','$pc92','$etat', '$date_paix', '$codf')";$mysqlif->query($sqlf20 );}else{$pp92 = 0; $pc92 = 0; $ioskcl = 0;}

		if (isset($mysqlif)) {
			redirect_to("Laboratoire");
		}else {
	    echo "Erreur: " . $sql . "<br>" . $mysqlif->error;
		}
		//var_dump($_POST);
	} else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>