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
	$idan = $_POST['idpexam'];
	$identexam = $_POST['identexam'];
	$motiff = $_POST['motiff'];
	$datexam = date("d/m/Y");
	$heurdexam = date("H:m:s");
	$fg = "";
	$rg = "";
	$gtt = "";
	$lp = "";
	$chol = "";
	$tc = "";
	$hdlc = "";
	$ldlc = "";
	$lft = "";
	$br = "";
	$sgptalt = "";
	$alkphos = "";
	$brdi = "";
	$cp = "";
	$sgot = "";
	$cpk = "";
	$ldh = "";
	$rp = "";
	$urea = "";
	$crea = "";
	$ua = "";
	$el = "";
	$na = "";
	$k = "";
	$chlor = "";
	$calc = "";
	$phos = "";
	$alb = "";
	$glob = "";
	$ratio = "";
	$amy = "";
	$cbc = "";
	$esr = "";
	$hemo = "";
	$mala = "";
	$btct = "";
	$ptaptt = "";
	$rc = "";
	$plat = "";
	$rha = "";
	$abog = "";
	$ctdi = "";
	$rbcm = "";
	$pregt = "";
	$wt = "";
	$raf = "";
	$tpha = "";
	$vdrl = "";
	$hivab = "";
	$hbsag = "";
	$hcvab = "";
	$mant = "";
	$hcgd = "";
	$bruc = "";
	$toxo = "";
	$asot = "";
	$hpa = "";
	$cprpcr = "";
	$anfana = "";
	$tbs = "";
	$psa = "";
	$urin = "";
	$stol = "";
	$sre = "";
	$csfre = "";
	$safb = "";
	$abfre = "";
	$bjp = "";
	$urinbs = "";
	$urinbp = "";
	$urobil = "";
	$sob = "";
	$srs = "";
	$usgcpc = "";
	$vsgcpc = "";
	$vst = "";
	$tb = "";
	$tsh = "";
	$t3 = "";
	$t4 = "";
	$fp = "";
	$fsh = "";
	$lh = "";
	$prl = "";
	$testo = "";
	$proges = "";
	$e2 = "";
	$gh = "";
	$aus = "";
	$ecg = "";
	$cxr = "";
	$bhcg = "";
	$hba1c = "";

	//Chimie
	if(!empty($_POST['fg'])){$fg = $_POST['fg']; $pp1=2; }else{$fg = 0; $pp1 = 0; }
	if(!empty($_POST['rg'])){$rg = $_POST['rg']; $pp2=2;  }else{$rg = 0; $pp2 = 0; }
	if(!empty($_POST['gtt'])){$gtt = $_POST['gtt']; $pp3=8;  }else{$gtt = 0; $pp3 = 0; }
	
	if(!empty($_POST['rha'])){$rha = $_POST['rha']; $pp40=2;  }else{$rha = 0; $pp40 = 0; }
	if(!empty($_POST['abog'])){$abog = $_POST['abog']; $pp41=2;  }else{$abog = 0; $pp41 = 0; }
	if(!empty($_POST['urin'])){$urin = $_POST['urin']; $pp61=2;  }else{$urin = 0; $pp61 = 0; }
	if(!empty($_POST['stol'])){$stol = $_POST['stol']; $pp62=2;  }else{$stol = 0; $pp62 = 0; }
	if(!empty($_POST['chol'])){$chol = $_POST['chol']; $pp5=3;  }else{$chol = 0; $pp5 = 0; }
	if(!empty($_POST['tc'])){$tc = $_POST['tc']; $pp6=3;  }else{$tc = 0; $pp6 = 0; }
	if(!empty($_POST['hdlc'])){$hdlc = $_POST['hdlc']; $pp7=3;  }else{$hdlc = 0; $pp7 = 0; }
	if(!empty($_POST['ldlc'])){$ldlc = $_POST['ldlc']; $pp8=3;  }else{$ldlc = 0; $pp8 = 0; }
	if(!empty($_POST['br'])){$br = $_POST['br']; $pp10=3;  }else{$br = 0; $pp10 = 0; }
	if(!empty($_POST['sgptalt'])){$sgptalt = $_POST['sgptalt']; $pp11=3;  }else{$sgptalt = 0; $pp11 = 0; }
	if(!empty($_POST['alkphos'])){$alkphos = $_POST['alkphos']; $pp12=3;  }else{$alkphos = 0; $pp12 = 0; }
	if(!empty($_POST['brdi'])){$brdi = $_POST['brdi']; $pp13=3;  }else{$brdi = 0; $pp13 = 0; }
	if(!empty($_POST['sgot'])){$sgot = $_POST['sgot']; $pp15=3;  }else{$sgot = 0; $pp15 = 0; }
	if(!empty($_POST['cpk'])){$cpk = $_POST['cpk']; $pp16=3;  }else{$cpk = 0; $pp16 = 0; }
	if(!empty($_POST['urea'])){$urea = $_POST['urea']; $pp19=3;  }else{$urea = 0; $pp19 = 0; }
	if(!empty($_POST['crea'])){$crea = $_POST['crea']; $pp20=3;  }else{$crea = 0; $pp20 = 0; }
	if(!empty($_POST['ua'])){$ua = $_POST['ua']; $pp9=4;  }else{$ua = 0; $pp9 = 0; }
	if(!empty($_POST['na'])){$na = $_POST['na']; $pp21=5;  }else{$na = 0; $pp21 = 0; }
	if(!empty($_POST['k'])){$k = $_POST['k']; $pp22=5;  }else{$k = 0; $pp22 = 0; }
	if(!empty($_POST['chlor'])){$chlor = $_POST['chlor']; $pp23=5;  }else{$chlor = 0; $pp23 = 0; }
	if(!empty($_POST['calc'])){$calc = $_POST['calc']; $pp24=5;  }else{$calc = 0; $pp24 = 0; }
	if(!empty($_POST['phos'])){$phos = $_POST['phos']; $pp25=5;  }else{$phos = 0; $pp25 = 0; }
	if(!empty($_POST['alb'])){$alb = $_POST['alb']; $pp26=5;  }else{$alb = 0; $pp26 = 0; }
	if(!empty($_POST['glob'])){$glob = $_POST['glob']; $pp27=5;  }else{$glob = 0; $pp27 = 0; }
	if(!empty($_POST['ratio'])){$ratio = $_POST['ratio']; $pp28=5;  }else{$ratio = 0; $pp28 = 0; }
	if(!empty($_POST['amy'])){$amy = $_POST['amy']; $pp29=5;  }else{$amy = 0; $pp29 = 0; }
	
	//Hématologie / Sérologie / Virologie

	if(!empty($_POST['cbc'])){$cbc = $_POST['cbc']; $pp32=6;}else{$cbc = 0; $pp32 = 0; }
	
	/*if(!empty($_POST['cbcwbc'])){$cbcwbc = $_POST['cbcwbc']; $pp32=6;}else{$cbcwbc = 0; $pp32 = 0; }
	if(!empty($_POST['cbclymphh'])){$cbclymphh = $_POST['cbclymphh']; $pp32=6;}else{$cbclymphh = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmidh'])){$cbcmidh = $_POST['cbcmidh']; $pp32=6;}else{$cbcmidh = 0; $pp32 = 0; }
	if(!empty($_POST['cbcgranh'])){$cbcgranh = $_POST['cbcgranh']; $pp32=6;}else{$cbcgranh = 0; $pp32 = 0; }
	if(!empty($_POST['cbclymphp'])){$cbclymphp = $_POST['cbclymphp']; $pp32=6;}else{$cbclymphp = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmidp'])){$cbcmidp = $_POST['cbcmidp']; $pp32=6;}else{$cbcmidp = 0; $pp32 = 0; }
	if(!empty($_POST['cbcgranp'])){$cbcgranp = $_POST['cbcgranp']; $pp32=6;}else{$cbcgranp = 0; $pp32 = 0; }
	if(!empty($_POST['cbcrbc'])){$cbcrbc = $_POST['cbcrbc']; $pp32=6;}else{$cbcrbc = 0; $pp32 = 0; }
	if(!empty($_POST['cbchgb'])){$cbchgb = $_POST['cbchgb']; $pp32=6;}else{$cbchgb = 0; $pp32 = 0; }
	if(!empty($_POST['cbchct'])){$cbchct = $_POST['cbchct']; $pp32=6;}else{$cbchct = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmcv'])){$cbcmcv = $_POST['cbcmcv']; $pp32=6;}else{$cbcmcv = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmch'])){$cbcmch = $_POST['cbcmch']; $pp32=6;}else{$cbcmch = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmchc'])){$cbcmchc = $_POST['cbcmchc']; $pp32=6;}else{$cbcmchc = 0; $pp32 = 0; }
	if(!empty($_POST['cbcrdwcv'])){$cbcrdwcv = $_POST['cbcrdwcv']; $pp32=6;}else{$cbcrdwcv = 0; $pp32 = 0; }
	if(!empty($_POST['cbcrdwsd'])){$cbcrdwsd = $_POST['cbcrdwsd']; $pp32=6;}else{$cbcrdwsd = 0; $pp32 = 0; }
	if(!empty($_POST['cbcplt'])){$cbcplt = $_POST['cbcplt']; $pp32=6;}else{$cbcplt = 0; $pp32 = 0; }
	if(!empty($_POST['cbcmpv'])){$cbcmpv = $_POST['cbcmpv']; $pp32=6;}else{$cbcmpv = 0; $pp32 = 0; }
	if(!empty($_POST['cbcpdw'])){$cbcpdw = $_POST['cbcpdw']; $pp32=6;}else{$cbcpdw = 0; $pp32 = 0; }
	if(!empty($_POST['cbcpct'])){$cbcpct = $_POST['cbcpct']; $pp32=6;}else{$cbcpct = 0; $pp32 = 0; }
	*/
	if(!empty($_POST['esr'])){$esr = $_POST['esr']; $pp33=2;  }else{$esr = 0; $pp33 = 0; }
	if(!empty($_POST['hemo'])){$hemo = $_POST['hemo']; $pp34=2;  }else{$hemo = 0; $pp34 = 0; }


	if(!empty($_POST['pregt'])){$pregt = $_POST['pregt']; $pp44=3;  }else{$pregt = 0; $pp44 = 0; }
	if(!empty($_POST['mala'])){$mala = $_POST['mala']; $pp35=4;  }else{$mala = 0; $pp35 = 0; }
	if(!empty($_POST['wt'])){$wt = $_POST['wt']; $pp45=4;  }else{$wt = 0; $pp45 = 0; }
	if(!empty($_POST['raf'])){$raf = $_POST['raf']; $pp46=4;  }else{$raf = 0; $pp46 = 0; }
	if(!empty($_POST['tpha'])){$tpha = $_POST['tpha']; $pp76=4;  }else{$tpha = 0; $pp76 = 0; }
	if(!empty($_POST['vdrl'])){$vdrl = $_POST['vdrl']; $pp47=4;  }else{$vdrl = 0; $pp47 = 0; }
	if(!empty($_POST['hivab'])){$hivab = $_POST['hivab']; $pp48=4;  }else{$hivab = 0; $pp48 = 0; }
	if(!empty($_POST['hbsag'])){$hbsag = $_POST['hbsag']; $pp49=4;  }else{$hbsag = 0; $pp49 = 0; }
	if(!empty($_POST['bruc'])){$bruc = $_POST['bruc']; $pp53=4;  }else{$bruc = 0; $pp53 = 0; }
	if(!empty($_POST['toxo'])){$toxo = $_POST['toxo']; $pp54=4;  }else{$toxo = 0; $pp54 = 0; }
	if(!empty($_POST['asot'])){$asot = $_POST['asot']; $pp55=4;  }else{$asot = 0; $pp55 = 0; }
	if(!empty($_POST['hpa'])){$hpa = $_POST['hpa']; $pp56=4;  }else{$hpa = 0; $pp56 = 0; }
	if(!empty($_POST['hcvab'])){$hcvab = $_POST['hcvab']; $pp50=5;  }else{$hcvab = 0; $pp50 = 0; }
	if(!empty($_POST['tsh'])){$tsh = $_POST['tsh']; $pp77=10;  }else{$tsh = 0; $pp77 = 0; }
	if(!empty($_POST['t3'])){$t3 = $_POST['t3']; $pp85=10;  }else{$t3 = 0; $pp85 = 0; }
	if(!empty($_POST['t4'])){$t4 = $_POST['t4']; $pp86=10;  }else{$t4 = 0; $pp86 = 0; }
	if(!empty($_POST['fsh'])){$fsh = $_POST['fsh']; $pp79=10;  }else{$fsh = 0; $pp79 = 0; }
	if(!empty($_POST['lh'])){$lh = $_POST['lh']; $pp80=10;  }else{$lh = 0; $pp80 = 0; }
	if(!empty($_POST['prl'])){$prl = $_POST['prl']; $pp81=10;  }else{$prl = 0; $pp81 = 0; }
	if(!empty($_POST['testo'])){$testo = $_POST['testo']; $pp82=10;  }else{$testo = 0; $pp82 = 0; }
	if(!empty($_POST['proges'])){$proges = $_POST['proges']; $pp78=10;  }else{$proges = 0; $pp78 = 0; }
	if(!empty($_POST['ldh'])){$ldh = $_POST['ldh']; $pp4=5;  }else{$ldh = 0; $pp4 = 0; }
	if(!empty($_POST['btct'])){$btct = $_POST['btct']; $pp83=10;  }else{$btct = 0; $pp83 = 0; }
	if(!empty($_POST['ptaptt'])){$ptaptt = $_POST['ptaptt']; $pp9=10;  }else{$ptaptt = 0; $pp9 = 0; }
	if(!empty($_POST['rc'])){$rc = $_POST['rc']; $pp14=5;  }else{$rc = 0; $pp14 = 0; }
	if(!empty($_POST['plat'])){$plat = $_POST['plat']; $pp17=5;  }else{$plat = 0; $pp17 = 0; }
	if(!empty($_POST['ctdi'])){$ctdi = $_POST['ctdi']; $pp18=5;  }else{$ctdi = 0; $pp18 = 0; }
	if(!empty($_POST['rbcm'])){$rbcm = $_POST['rbcm']; $pp30=5;  }else{$rbcm = 0; $pp30 = 0; }
	if(!empty($_POST['mant'])){$mant = $_POST['mant']; $pp31=10;  }else{$mant = 0; $pp31 = 0; }
	if(!empty($_POST['hcgd'])){$hcgd = $_POST['hcgd']; $pp36=10;  }else{$hcgd = 0; $pp36 = 0; }
	if(!empty($_POST['cprpcr'])){$cprpcr = $_POST['cprpcr']; $pp37=5;  }else{$cprpcr = 0; $pp37 = 0; }
	if(!empty($_POST['anfana'])){$anfana = $_POST['anfana']; $pp38=5;  }else{$anfana = 0; $pp38 = 0; }
	if(!empty($_POST['tbs'])){$tbs = $_POST['tbs']; $pp39=5;  }else{$tbs = 0; $pp39 = 0; }
	if(!empty($_POST['psa'])){$psa = $_POST['psa']; $pp42=5;  }else{$psa = 0; $pp42 = 0; }
	if(!empty($_POST['sre'])){$sre = $_POST['sre']; $pp43=6;  }else{$sre = 0; $pp43 = 0; }
	if(!empty($_POST['csfre'])){$csfre = $_POST['csfre']; $pp51=10;  }else{$csfre = 0; $pp51 = 0; }
	if(!empty($_POST['safb'])){$safb = $_POST['safb']; $pp52=10;  }else{$safb = 0; $pp52 = 0; }
	if(!empty($_POST['abfre'])){$abfre = $_POST['abfre']; $pp58=10;  }else{$abfre = 0; $pp58 = 0; }
	if(!empty($_POST['bjp'])){$bjp = $_POST['bjp']; $pp59=10;  }else{$bjp = 0; $pp59 = 0; }
	if(!empty($_POST['urinbs'])){$urinbs = $_POST['urinbs']; $pp63=10;  }else{$urinbs = 0; $pp63 = 0; }
	if(!empty($_POST['urinbp'])){$urinbp = $_POST['urinbp']; $pp64=10;  }else{$urinbp = 0; $pp64 = 0; }
	if(!empty($_POST['urobil'])){$urobil = $_POST['urobil']; $pp65=10;  }else{$urobil = 0; $pp65 = 0; }
	if(!empty($_POST['sob'])){$sob = $_POST['sob']; $pp66=10;  }else{$sob = 0; $pp66 = 0; }
	if(!empty($_POST['srs'])){$srs = $_POST['srs']; $pp67=10;  }else{$srs = 0; $pp67 = 0; }
	if(!empty($_POST['usgcpc'])){$usgcpc = $_POST['usgcpc']; $pp68=10;  }else{$usgcpc = 0; $pp68 = 0; }
	if(!empty($_POST['vsgcpc'])){$vsgcpc = $_POST['vsgcpc']; $pp69=10;  }else{$vsgcpc = 0; $pp69 = 0; }
	if(!empty($_POST['vst'])){$vst = $_POST['vst']; $pp70=10;  }else{$vst = 0; $pp70 = 0; }
	if(!empty($_POST['e2'])){$e2 = $_POST['e2']; $pp71=10;  }else{$e2 = 0; $pp71 = 0; }
	if(!empty($_POST['gh'])){$gh = $_POST['gh']; $pp72=10;  }else{$gh = 0; $pp72 = 0; }
	if(!empty($_POST['aus'])){$aus = $_POST['aus']; $pp73=10;  }else{$aus = 0; $pp73 = 0; }
	if(!empty($_POST['ecg'])){$ecg = $_POST['ecg']; $pp74=10;  }else{$ecg = 0; $pp74 = 0; }
	if(!empty($_POST['cxr'])){$cxr = $_POST['cxr']; $pp75=10;  }else{$cxr = 0; $pp75 = 0; }
	if(!empty($_POST['bhcg'])){$bhcg = $_POST['bhcg']; $pp84=10;  }else{$bhcg = 0; $pp84 = 0; }
	if(!empty($_POST['hba1c'])){$hba1c = $_POST['hba1c']; $pp57=10;  }else{$hba1c = 0; $pp57 = 0; }


	$pandoc =  $pp1 + $pp2 + $pp3 + $pp4 + $pp5 + $pp6 + $pp7 + $pp8 + $pp9 + $pp10 + $pp11 + $pp12 + $pp13 + $pp14 + $pp15 + $pp16 + $pp17 + $pp18 + $pp19 + $pp20 + $pp21 + $pp22 + $pp23 + $pp24 + $pp25 + $pp26 + $pp27 + $pp28 + $pp29 + $pp30 + $pp31 + $pp32 + $pp33 + $pp34 + $pp35 + $pp36 + $pp37 + $pp38 + $pp39 + $pp40 + $pp41 + $pp42 + $pp43 + $pp44 + $pp45 + $pp46 + $pp47 + $pp48 + $pp49 + $pp50 + $pp51 + $pp52 + $pp53 + $pp54 + $pp55 + $pp56 + $pp57 + $pp58 + $pp59 + $pp60 + $pp61 + $pp62 + $pp63 + $pp64 + $pp65 + $pp66 + $pp67 + $pp68 + $pp69 + $pp70 + $pp71 + $pp72 + $pp73 + $pp74 + $pp75 + $pp76 + $pp77 + $pp78 + $pp79 + $pp80 + $pp81 + $pp82 + $pp83 + $pp84 + $pp85 + $pp86;
	 $res = 2;
	 $chk = "NON";
	 $datehos = date("Y-m-d G:i");

	$sql = "INSERT INTO andoc (idexam, idan, identexam, heurdexam, datexam, motif, fg, rg, gtt, chol, tc, hdlc, ldlc, br, sgptalt, alkphos, brdi, sgot, cpk, ldh, urea, crea, ua, na, k, chlor, calc, phos, alb, glob, ratio, amy, cbc, esr, hemo, mala, btct, ptaptt, rc, plat, rha, abog, ctdi, rbcm, pregt, wt, raf, tpha, vdrl, hivab, hbsag, hcvab, mant, hcgd, bruc, toxo, asot, hpa, cprpcr, anfana, tbs, psa, urin, stol, sre, csfre, safb, abfre, bjp, urinbs, urinbp, urobil, sob, srs, usgcpc, vsgcpc, vst, tsh, t3, t4, fsh, lh, prl, testo, proges, e2, gh, aus, ecg, cxr, bhcg, hba1c, pandoc, chk) VALUES ('$idexam', '$idan', '$identexam', '$heurdexam', '$datexam', '$motiff', '$fg', '$rg', '$gtt', '$chol', '$tc', '$hdlc', '$ldlc', '$br', '$sgptalt', '$alkphos', '$brdi', '$sgot', '$cpk', '$ldh', '$urea', '$crea', '$ua', '$na', '$k', '$chlor', '$calc', '$phos', '$alb', '$glob', '$ratio', '$amy', '$cbc', '$esr', '$hemo', '$mala', '$btct', '$ptaptt', '$rc', '$plat', '$rha', '$abog', '$ctdi', '$rbcm', '$pregt', '$wt', '$raf', '$tpha', '$vdrl', '$hivab', '$hbsag', '$hcvab', '$mant', '$hcgd', '$bruc', '$toxo', '$asot', '$hpa', '$cprpcr', '$anfana', '$tbs', '$psa', '$urin', '$stol', '$sre', '$csfre', '$safb', '$abfre', '$bjp', '$urinbs', '$urinbp', '$urobil', '$sob', '$srs', '$usgcpc', '$vsgcpc', '$vst', '$tsh', '$t3', '$t4', '$fsh', '$lh', '$prl', '$testo', '$proges', '$e2', '$gh', '$aus', '$ecg', '$cxr', '$bhcg', '$hba1c', '$pandoc', '$chk')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	if (isset($mysqli)) {
			redirect_to("Consultation?id=" . $identexam);
	} else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>