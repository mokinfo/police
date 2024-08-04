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
  $idan = $_POST['idan'];
  if(!empty($_POST['fg'])){$fg = $_POST['fg'];}else{$fg = 0;}
  if(!empty($_POST['rg'])){$rg = $_POST['rg'];}else{$rg = 0;}
  if(!empty($_POST['gtt'])){$gtt = $_POST['gtt'];}else{$gtt = 0;}
  if(!empty($_POST['chol'])){$chol = $_POST['chol'];}else{$chol = 0;}
  if(!empty($_POST['tc'])){$tc = $_POST['tc'];}else{$tc = 0;}
  if(!empty($_POST['hdlc'])){$hdlc = $_POST['hdlc'];}else{$hdlc = 0;}
  if(!empty($_POST['ldlc'])){$ldlc = $_POST['ldlc'];}else{$ldlc = 0;}
  if(!empty($_POST['br'])){$br = $_POST['br'];}else{$br = 0;}
  if(!empty($_POST['sgptalt'])){$sgptalt = $_POST['sgptalt'];}else{$sgptalt = 0;}
  if(!empty($_POST['alkphos'])){$alkphos = $_POST['alkphos'];}else{$alkphos = 0;}
  if(!empty($_POST['brdi'])){$brdi = $_POST['brdi'];}else{$brdi = 0;}
  if(!empty($_POST['sgot'])){$sgot = $_POST['sgot'];}else{$sgot = 0;}
  if(!empty($_POST['cpk'])){$cpk = $_POST['cpk'];}else{$cpk = 0;}
  if(!empty($_POST['ldh'])){$ldh = $_POST['ldh'];}else{$ldh = 0;}
  if(!empty($_POST['urea'])){$urea = $_POST['urea'];}else{$urea = 0;}
  if(!empty($_POST['crea'])){$crea = $_POST['crea'];}else{$crea = 0;}
  if(!empty($_POST['ua'])){$ua = $_POST['ua'];}else{$ua = 0;}
  if(!empty($_POST['na'])){$na = $_POST['na'];}else{$na = 0;}
  if(!empty($_POST['k'])){$k = $_POST['k'];}else{$k = 0;}
  if(!empty($_POST['chlor'])){$chlor = $_POST['chlor'];}else{$chlor = 0;}
  if(!empty($_POST['calc'])){$calc = $_POST['calc'];}else{$calc = 0;}
  if(!empty($_POST['phos'])){$phos = $_POST['phos'];}else{$phos = 0;}
  if(!empty($_POST['alb'])){$alb = $_POST['alb'];}else{$alb = 0;}
  if(!empty($_POST['glob'])){$glob = $_POST['glob'];}else{$glob = 0;}
  if(!empty($_POST['ratio'])){$ratio = $_POST['ratio'];}else{$ratio = 0;}
  if(!empty($_POST['amy'])){$amy = $_POST['amy'];}else{$amy = 0;}
  if(!empty($_POST['esr'])){$esr = $_POST['esr'];}else{$esr = 0;}
  if(!empty($_POST['hemo'])){$hemo = $_POST['hemo'];}else{$hemo = 0;}
  if(!empty($_POST['mala'])){$mala = $_POST['mala'];}else{$mala = 0;}
  if(!empty($_POST['btct'])){$btct = $_POST['btct'];}else{$btct = 0;}
  if(!empty($_POST['ptaptt'])){$ptaptt = $_POST['ptaptt'];}else{$ptaptt = 0;}
  if(!empty($_POST['rc'])){$rc = $_POST['rc'];}else{$rc = 0;}
  if(!empty($_POST['plat'])){$plat = $_POST['plat'];}else{$plat = 0;}
  if(!empty($_POST['rha'])){$rha = $_POST['rha'];}else{$rha = 0;}
  if(!empty($_POST['abog'])){$abog = $_POST['abog'];}else{$abog = 0;}
  if(!empty($_POST['ctdi'])){$ctdi = $_POST['ctdi'];}else{$ctdi = 0;}
  if(!empty($_POST['rbcm'])){$rbcm = $_POST['rbcm'];}else{$rbcm = 0;}
  if(!empty($_POST['pregt'])){$pregt = $_POST['pregt'];}else{$pregt = 0;}
  if(!empty($_POST['wt'])){$wt = $_POST['wt'];}else{$wt = 0;}
  if(!empty($_POST['raf'])){$raf = $_POST['raf'];}else{$raf = 0;}
  if(!empty($_POST['tpha'])){$tpha = $_POST['tpha'];}else{$tpha = 0;}
  if(!empty($_POST['vdrl'])){$vdrl = $_POST['vdrl'];}else{$vdrl = 0;}
  if(!empty($_POST['hivab'])){$hivab = $_POST['hivab'];}else{$hivab = 0;}
  if(!empty($_POST['hbsag'])){$hbsag = $_POST['hbsag'];}else{$hbsag = 0;}
  if(!empty($_POST['hcvab'])){$hcvab = $_POST['hcvab'];}else{$hcvab = 0;}
  if(!empty($_POST['mant'])){$mant = $_POST['mant'];}else{$mant = 0;}
  if(!empty($_POST['hcgd'])){$hcgd = $_POST['hcgd'];}else{$hcgd = 0;}
  if(!empty($_POST['bruc'])){$bruc = $_POST['bruc'];}else{$bruc = 0;}
  if(!empty($_POST['toxo'])){$toxo = $_POST['toxo'];}else{$toxo = 0;}
  if(!empty($_POST['asot'])){$asot = $_POST['asot'];}else{$asot = 0;}
  if(!empty($_POST['hpa'])){$hpa = $_POST['hpa'];}else{$hpa = 0;}
  if(!empty($_POST['cprpcr'])){$cprpcr = $_POST['cprpcr'];}else{$cprpcr = 0;}
  if(!empty($_POST['anfana'])){$anfana = $_POST['anfana'];}else{$anfana = 0;}
  if(!empty($_POST['tbs'])){$tbs = $_POST['tbs'];}else{$tbs = 0;}
  if(!empty($_POST['psa'])){$psa = $_POST['psa'];}else{$psa = 0;}
  if(!empty($_POST['sre'])){$sre = $_POST['sre'];}else{$sre = 0;}
  if(!empty($_POST['csfre'])){$csfre = $_POST['csfre'];}else{$csfre = 0;}
  if(!empty($_POST['safb'])){$safb = $_POST['safb'];}else{$safb = 0;}
  if(!empty($_POST['abfre'])){$abfre = $_POST['abfre'];}else{$abfre = 0;}
  if(!empty($_POST['bjp'])){$bjp = $_POST['bjp'];}else{$bjp = 0;}
  if(!empty($_POST['urinbs'])){$urinbs = $_POST['urinbs'];}else{$urinbs = 0;}
  if(!empty($_POST['urinbp'])){$urinbp = $_POST['urinbp'];}else{$urinbp = 0;}
  if(!empty($_POST['urobil'])){$urobil = $_POST['urobil'];}else{$urobil = 0;}
  if(!empty($_POST['sob'])){$sob = $_POST['sob'];}else{$sob = 0;}
  if(!empty($_POST['srs'])){$srs = $_POST['srs'];}else{$srs = 0;}
  if(!empty($_POST['usgcpc'])){$usgcpc = $_POST['usgcpc'];}else{$usgcpc = 0;}
  if(!empty($_POST['vsgcpc'])){$vsgcpc = $_POST['vsgcpc'];}else{$vsgcpc = 0;}
  if(!empty($_POST['vst'])){$vst = $_POST['vst'];}else{$vst = 0;}
  if(!empty($_POST['tsh'])){$tsh = $_POST['tsh'];}else{$tsh = 0;}
  if(!empty($_POST['t3'])){$t3 = $_POST['t3'];}else{$t3 = 0;}
  if(!empty($_POST['t4'])){$t4 = $_POST['t4'];}else{$t4 = 0;}
  if(!empty($_POST['fsh'])){$fsh = $_POST['fsh'];}else{$fsh = 0;}
  if(!empty($_POST['lh'])){$lh = $_POST['lh'];}else{$lh = 0;}
  if(!empty($_POST['prl'])){$prl = $_POST['prl'];}else{$prl = 0;}
  if(!empty($_POST['testo'])){$testo = $_POST['testo'];}else{$testo = 0;}
  if(!empty($_POST['proges'])){$proges = $_POST['proges'];}else{$proges = 0;}
  if(!empty($_POST['e2'])){$e2 = $_POST['e2'];}else{$e2 = 0;}
  if(!empty($_POST['gh'])){$gh = $_POST['gh'];}else{$gh = 0;}
  if(!empty($_POST['aus'])){$aus = $_POST['aus'];}else{$aus = 0;}
  if(!empty($_POST['ecg'])){$ecg = $_POST['ecg'];}else{$ecg = 0;}
  if(!empty($_POST['cxr'])){$cxr = $_POST['cxr'];}else{$cxr = 0;}
  if(!empty($_POST['bhcg'])){$bhcg = $_POST['bhcg'];}else{$bhcg = 0;}
  if(!empty($_POST['hba1c'])){$hba1c = $_POST['hba1c'];}else{$hba1c = 0;}
  if(!empty($_POST['cbcwbc'])){$cbcwbc = $_POST['cbcwbc'];}else{$cbcwbc = 0;}
  if(!empty($_POST['cbclymphh'])){$cbclymphh = $_POST['cbclymphh'];}else{$cbclymphh = 0;}
  if(!empty($_POST['cbcmidh'])){$cbcmidh = $_POST['cbcmidh'];}else{$cbcmidh = 0;}
  if(!empty($_POST['cbcgranh'])){$cbcgranh = $_POST['cbcgranh'];}else{$cbcgranh = 0;}
  if(!empty($_POST['cbclymphp'])){$cbclymphp = $_POST['cbclymphp'];}else{$cbclymphp = 0;}
  if(!empty($_POST['cbcmidp'])){$cbcmidp = $_POST['cbcmidp'];}else{$cbcmidp = 0;}
  if(!empty($_POST['cbcgranp'])){$cbcgranp = $_POST['cbcgranp'];}else{$cbcgranp = 0;}
  if(!empty($_POST['cbcrbc'])){$cbcrbc = $_POST['cbcrbc'];}else{$cbcrbc = 0;}
  if(!empty($_POST['cbchgb'])){$cbchgb = $_POST['cbchgb'];}else{$cbchgb = 0;}
  if(!empty($_POST['cbchct'])){$cbchct = $_POST['cbchct'];}else{$cbchct = 0;}
  if(!empty($_POST['cbcmcv'])){$cbcmcv = $_POST['cbcmcv'];}else{$cbcmcv = 0;}
  if(!empty($_POST['cbcmch'])){$cbcmch = $_POST['cbcmch'];}else{$cbcmch = 0;}
  if(!empty($_POST['cbcmchc'])){$cbcmchc = $_POST['cbcmchc'];}else{$cbcmchc = 0;}
  if(!empty($_POST['cbcrdwcv'])){$cbcrdwcv = $_POST['cbcrdwcv'];}else{$cbcrdwcv = 0;}
  if(!empty($_POST['cbcrdwsd'])){$cbcrdwsd = $_POST['cbcrdwsd'];}else{$cbcrdwsd = 0;}
  if(!empty($_POST['cbcplt'])){$cbcplt = $_POST['cbcplt'];}else{$cbcplt = 0;}
  if(!empty($_POST['cbcmpv'])){$cbcmpv = $_POST['cbcmpv'];}else{$cbcmpv = 0;}
  if(!empty($_POST['cbcpdw'])){$cbcpdw = $_POST['cbcpdw'];}else{$cbcpdw = 0;}
  if(!empty($_POST['cbcpct'])){$cbcpct = $_POST['cbcpct'];}else{$cbcpct = 0;}
  if(!empty($_POST['urincol'])){$urincol = $_POST['urincol'];}else{$urincol = "";}
  if(!empty($_POST['urinapea'])){$urinapea = $_POST['urinapea'];}else{$urinapea = "";}
  if(!empty($_POST['urinof'])){$urinof = $_POST['urinof'];}else{$urinof = "";}
  if(!empty($_POST['urinwbc'])){$urinwbc = $_POST['urinwbc'];}else{$urinwbc = "";}
  if(!empty($_POST['urinrbc'])){$urinrbc = $_POST['urinrbc'];}else{$urinrbc = "";}
  if(!empty($_POST['urinbact'])){$urinbact = $_POST['urinbact'];}else{$urinbact = "";}
  if(!empty($_POST['uringast'])){$uringast = $_POST['uringast'];}else{$uringast = "";}
  if(!empty($_POST['urincrys'])){$urincrys = $_POST['urincrys'];}else{$urincrys = "";}
  if(!empty($_POST['urinyeast'])){$urinyeast = $_POST['urinyeast'];}else{$urinyeast = "";}
  if(!empty($_POST['urinepith'])){$urinepith = $_POST['urinepith'];}else{$urinepith = "";}
  if(!empty($_POST['urinpara'])){$urinpara = $_POST['urinpara'];}else{$urinpara = "";}
  if(!empty($_POST['urinofs'])){$urinofs = $_POST['urinofs'];}else{$urinofs = "";}
  if(!empty($_POST['urinph'])){$urinph = $_POST['urinph'];}else{$urinph = "";}
  if(!empty($_POST['urinsg'])){$urinsg = $_POST['urinsg'];}else{$urinsg = "";}
  if(!empty($_POST['uringluc'])){$uringluc = $_POST['uringluc'];}else{$uringluc = "";}
  if(!empty($_POST['urinprot'])){$urinprot = $_POST['urinprot'];}else{$urinprot = "";}
  if(!empty($_POST['urinnitrat'])){$urinnitrat = $_POST['urinnitrat'];}else{$urinnitrat = "";}
  if(!empty($_POST['urinket'])){$urinket = $_POST['urinket'];}else{$urinket = "";}
  if(!empty($_POST['urinurob'])){$urinurob = $_POST['urinurob'];}else{$urinurob = "";}
  if(!empty($_POST['urinbr'])){$urinbr = $_POST['urinbr'];}else{$urinbr = "";}
  if(!empty($_POST['urinblood'])){$urinblood = $_POST['urinblood'];}else{$urinblood = "";}
  if(!empty($_POST['urinleuc'])){$urinleuc = $_POST['urinleuc'];}else{$urinleuc = "";}
  if(!empty($_POST['stolcol'])){$stolcol = $_POST['stolcol'];}else{$stolcol = "";}
  if(!empty($_POST['stolcons'])){$stolcons = $_POST['stolcons'];}else{$stolcons = "";}
  if(!empty($_POST['stolblood'])){$stolblood = $_POST['stolblood'];}else{$stolblood = "";}
  if(!empty($_POST['stolmucus'])){$stolmucus = $_POST['stolmucus'];}else{$stolmucus = "";}
  if(!empty($_POST['stolpus'])){$stolpus = $_POST['stolpus'];}else{$stolpus = "";}
  if(!empty($_POST['stolof'])){$stolof = $_POST['stolof'];}else{$stolof = "";}
  if(!empty($_POST['stolova'])){$stolova = $_POST['stolova'];}else{$stolova = "";}
  if(!empty($_POST['stolcyst'])){$stolcyst = $_POST['stolcyst'];}else{$stolcyst = "";}
  if(!empty($_POST['stoltroph'])){$stoltroph = $_POST['stoltroph'];}else{$stoltroph = "";}
  if(!empty($_POST['stollarv'])){$stollarv = $_POST['stollarv'];}else{$stollarv = "";}
  if(!empty($_POST['stolrbc'])){$stolrbc = $_POST['stolrbc'];}else{$stolrbc = "";}
  if(!empty($_POST['stolwbc'])){$stolwbc = $_POST['stolwbc'];}else{$stolwbc = "";}
  if(!empty($_POST['stolbact'])){$stolbact = $_POST['stolbact'];}else{$stolbact = "";}
  if(!empty($_POST['stolyeast'])){$stolyeast = $_POST['stolyeast'];}else{$stolyeast = "";}
  if(!empty($_POST['stolofs'])){$stolofs = $_POST['stolofs'];}else{$stolofs = "";}
  if(!empty($_POST['stolocultbloodtest'])){$stolocultbloodtest = $_POST['stolocultbloodtest'];}else{$stolocultbloodtest = "";}
  if(!empty($_POST['stolothtest'])){$stolothtest = $_POST['stolothtest'];}else{$stolothtest = "";}

  $res = 4;

  $sql = "INSERT INTO saisilab (idan, fg, rg, gtt, chol, tc, hdlc, ldlc, br, sgptalt, alkphos, brdi, sgot, cpk, ldh, urea, crea, ua, na, k, chlor, calc, phos, alb, glob, ratio, amy, esr, hemo, mala, btct, ptaptt, rc, plat, rha, abog, ctdi, rbcm, pregt, wt, raf, tpha, vdrl, hivab, hbsag, hcvab, mant, hcgd, bruc, toxo, asot, hpa, cprpcr, anfana, tbs, psa, sre, csfre, safb, abfre, bjp, urinbs, urinbp, urobil, sob, srs, usgcpc, vsgcpc, vst, tsh, t3, t4, fsh, lh, prl, testo, proges, e2, gh, aus, ecg, cxr, bhcg, cbcwbc, cbclymphh, cbcmidh, cbcgranh, cbclymphp, cbcmidp, cbcgranp, cbcrbc, cbchgb, cbchct, cbcmcv, cbcmch, cbcmchc, cbcrdwcv, cbcrdwsd, cbcplt, cbcmpv, cbcpdw, cbcpct, urincol, urinapea, urinof, urinwbc, urinrbc, urinbact, uringast, urincrys, urinyeast, urinepith, urinpara, urinofs, urinph, urinsg, uringluc, urinprot, urinnitrat, urinket, urinurob, urinbr, urinblood, urinleuc, stolcol, stolcons, stolblood, stolmucus, stolpus, stolof, stolova, stolcyst, stoltroph, stollarv, stolrbc, stolwbc, stolbact, stolyeast, stolofs, stolocultbloodtest, stolothtest, hba1c) VALUES ('$idan', '$fg', '$rg', '$gtt', '$chol', '$tc', '$hdlc', '$ldlc', '$br', '$sgptalt', '$alkphos', '$brdi', '$sgot', '$cpk', '$ldh', '$urea', '$crea', '$ua', '$na', '$k', '$chlor', '$calc', '$phos', '$alb', '$glob', '$ratio', '$amy', '$esr', '$hemo', '$mala', '$btct', '$ptaptt', '$rc', '$plat', '$rha', '$abog', '$ctdi', '$rbcm', '$pregt', '$wt', '$raf', '$tpha', '$vdrl', '$hivab', '$hbsag', '$hcvab', '$mant', '$hcgd', '$bruc', '$toxo', '$asot', '$hpa', '$cprpcr', '$anfana', '$tbs', '$psa', '$sre', '$csfre', '$safb', '$abfre', '$bjp', '$urinbs', '$urinbp', '$urobil', '$sob', '$srs', '$usgcpc', '$vsgcpc', '$vst', '$tsh', '$t3', '$t4', '$fsh', '$lh', '$prl', '$testo', '$proges', '$e2', '$gh', '$aus', '$ecg', '$cxr', '$bhcg', '$cbcwbc', '$cbclymphh', '$cbcmidh', '$cbcgranh', '$cbclymphp', '$cbcmidp', '$cbcgranp', '$cbcrbc', '$cbchgb', '$cbchct', '$cbcmcv', '$cbcmch', '$cbcmchc', '$cbcrdwcv', '$cbcrdwsd', '$cbcplt', '$cbcmpv', '$cbcpdw', '$cbcpct', '$urincol', '$urinapea', '$urinof', '$urinwbc', '$urinrbc', '$urinbact', '$uringast', '$urincrys', '$urinyeast', '$urinepith', '$urinpara', '$urinofs', '$urinph', '$urinsg', '$uringluc', '$urinprot', '$urinnitrat', '$urinket', '$urinurob', '$urinbr', '$urinblood', '$urinleuc', '$stolcol', '$stolcons', '$stolblood', '$stolmucus', '$stolpus', '$stolof', '$stolova', '$stolcyst', '$stoltroph', '$stollarv', '$stolrbc', '$stolwbc', '$stolbact', '$stolyeast', '$stolofs', '$stolocultbloodtest', '$stolothtest', '$hba1c')";
  $mysqli = new mysqli('localhost','root','','spn');
  $mysqli->query($sql);
  if (isset($mysqli)) {
    $dellist = mysqli_connect('localhost','root','','spn');
    $result = mysqli_query($dellist, "DELETE FROM andoc WHERE idan = '$idan'");
    if (isset($result)) {
      $JIKO = mysqli_connect('localhost','root','','spn');
      $cares = mysqli_query($JIKO, "UPDATE care SET fg='$fg', rg='$rg', gtt='$gtt', chol='$chol', tc='$tc', hdlc='$hdlc', ldlc='$ldlc', br='$br', sgptalt='$sgptalt', alkphos='$alkphos', brdi='$brdi', sgot='$sgot', cpk='$cpk', ldh='$ldh', urea='$urea', crea='$crea', ua='$ua', na='$na', k='$k', chlor='$chlor', calc='$calc', phos='$phos', alb='$alb', glob='$glob', ratio='$ratio', amy='$amy', esr='$esr', hemo='$hemo', mala='$mala', btct='$btct', ptaptt='$ptaptt', rc='$rc', plat='$plat', rha='$rha', abog='$abog', ctdi='$ctdi', rbcm='$rbcm', pregt='$pregt', wt='$wt', raf='$raf', tpha='$tpha', vdrl='$vdrl', hivab='$hivab', hbsag='$hbsag', hcvab='$hcvab', mant='$mant', hcgd='$hcgd', bruc='$bruc', toxo='$toxo', asot='$asot', hpa='$hpa', cprpcr='$cprpcr', anfana='$anfana', tbs='$tbs', psa='$psa', sre='$sre', csfre='$csfre', safb='$safb', abfre='$abfre', bjp='$bjp', urinbs='$urinbs', urinbp='$urinbp', urobil='$urobil', sob='$sob', srs='$srs', usgcpc='$usgcpc', vsgcpc='$vsgcpc', vst='$vst', tsh='$tsh', t3='$t3', t4='$t4', fsh='$fsh', lh='$lh', prl='$prl', testo='$testo', proges='$proges', e2='$e2', gh='$gh', aus='$aus', ecg='$ecg', cxr='$cxr', bhcg='$bhcg', cbcwbc='$cbcwbc', cbclymphh='$cbclymphh', cbcmidh='$cbcmidh', cbcgranh='$cbcgranh', cbclymphp='$cbclymphp', cbcmidp='$cbcmidp', cbcgranp='$cbcgranp', cbcrbc='$cbcrbc', cbchgb='$cbchgb', cbchct='$cbchct', cbcmcv='$cbcmcv', cbcmch='$cbcmch', cbcmchc='$cbcmchc', cbcrdwcv='$cbcrdwcv', cbcrdwsd='$cbcrdwsd', cbcplt='$cbcplt', cbcmpv='$cbcmpv', cbcpdw='$cbcpdw', cbcpct='$cbcpct', urincol='$urincol', urinapea='$urinapea', urinof='$urinof', urinwbc='$urinwbc', urinrbc='$urinrbc', urinbact='$urinbact', uringast='$uringast', urincrys='$urincrys', urinyeast='$urinyeast', urinepith='$urinepith', urinpara='$urinpara', urinofs='$urinofs', urinph='$urinph', urinsg='$urinsg', uringluc='$uringluc', urinprot='$urinprot', urinnitrat='$urinnitrat', urinket='$urinket', urinurob='$urinurob', urinbr='$urinbr', urinblood='$urinblood', urinleuc='$urinleuc', stolcol='$stolcol', stolcons='$stolcons', stolblood='$stolblood', stolmucus='$stolmucus', stolpus='$stolpus', stolof='$stolof', stolova='$stolova', stolcyst='$stolcyst', stoltroph='$stoltroph', stollarv='$stollarv', stolrbc='$stolrbc', stolwbc='$stolwbc', stolbact='$stolbact', stolyeast='$stolyeast', stolofs='$stolofs', stolocultbloodtest='$stolocultbloodtest', stolothtest='$stolothtest', hba1c='$hba1c', res='$res' where idcare = '$idan'");
      if (isset($cares)) {
        $delsai = mysqli_connect('localhost','root','','spn');
        $result = mysqli_query($delsai, "DELETE FROM saisilab WHERE idan = '$idan'");
      }
    }
  } else {
      echo "Erreur: " . $sql . "<br>" . $con->error;
  }
} else {
  //redirect_to("nouveau.php");
  ?>
    <?php 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Santé - Police - National</title>
  
  <link rel="icon" href="dist/img/police.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
    
  <script src="jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="js/code.js"></script>
  <style>
    h5.hidden{
      display: none;
    }
    tr.hidden{
      display: none;
    }
    th.hidden{
      display: none;
    }
    select.hidden{
      display: none;
    }
  </style> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/police.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Accueil" class="nav-link">Accueil</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Ali Robleh
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Urgence d'un patient...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Ahmed Robleh
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">J'ai réçu votre message</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Yahya Abdo
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Vos suggestions</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Heurs passés</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Voir tout les messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nouveaux messages
            <span class="float-right text-muted text-sm">3 min</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 demandes
            <span class="float-right text-muted text-sm">12 heurs</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nouveaux rapports
            <span class="float-right text-muted text-sm">2 jours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Voir tout les notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/police.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Santé - PN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dr Mahyoub Abdallah</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nouveau patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste d'attente</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i>
              <p>
                Patients
                <span class="right badge badge-danger">Nouveau</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Consultations
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-vial"></i>   
              <p>
                Laboratoires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                Bloc opératoire
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Pédiatrie
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
          <div class="col-sm-12">
              <?php 
      if(!empty($_GET['id'])) {
        $id = $_GET['id'];
      }else{
        redirect_to("Accueil");
      }
      $pieces = $DB->query("SELECT care.name, care.sex, care.age, care.datej, andoc.idan, andoc.fg, andoc.rg, andoc.gtt, andoc.chol, andoc.tc, andoc.hdlc, andoc.ldlc, andoc.br, andoc.sgptalt, andoc.alkphos, andoc.brdi, andoc.sgot, andoc.cpk, andoc.ldh, andoc.urea, andoc.crea, andoc.ua,  andoc.na, andoc.k, andoc.chlor, andoc.calc, andoc.phos, andoc.alb, andoc.glob, andoc.ratio, andoc.amy, andoc.cbc, andoc.esr, andoc.hemo, andoc.mala, andoc.btct, andoc.ptaptt, andoc.rc, andoc.plat, andoc.rha, andoc.abog, andoc.ctdi, andoc.rbcm, andoc.pregt, andoc.wt, andoc.raf, andoc.tpha, andoc.vdrl, andoc.hivab, andoc.hbsag, andoc.hcvab, andoc.mant, andoc.hcgd, andoc.bruc, andoc.toxo, andoc.asot, andoc.hpa, andoc.cprpcr, andoc.anfana, andoc.tbs, andoc.psa, andoc.urin, andoc.stol, andoc.sre, andoc.csfre, andoc.safb, andoc.abfre, andoc.bjp, andoc.urinbs, andoc.urinbp, andoc.urobil, andoc.sob, andoc.srs, andoc.usgcpc, andoc.vsgcpc, andoc.vst, andoc.tsh, andoc.t3, andoc.t4,  andoc.fsh, andoc.lh, andoc.prl, andoc.testo, andoc.proges, andoc.e2, andoc.gh, andoc.aus, andoc.ecg, andoc.cxr, andoc.bhcg, andoc.hba1c FROM care, andoc where care.idcare = andoc.idan and andoc.idan = '$id'");
      //$pieces = $DB->query("SELECT * FROM care WHERE idp = '$id'");
      ?>
      <form action="saisilabo.php" method="post">
      <?php 
        foreach ($pieces as $piece):
      ?>
      <input type="hidden" name="idan" value="<?php echo $piece->idan ?>">
      <h3><b>Name : <?php echo $piece->name ?></h3></b>
      <?php echo $piece->age ?> years old<br>
      Sex : <?php if($piece->sex == 1){ echo "Male"; }else{echo "Female";} ?><br>
      Date : <?php echo $piece->datej ?><br>
      <h2>Chemistry</h2>  
      <table>
        <tr><td><h3><b><center>Analyse</center></b></h3></td><td><h3><b><center></center></b></h3></td><td><h3><b><center>Write result</center></b></h3></td><td><h3><b><center>Scale</center></b></h3></td></tr>
<tr class="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->fg> 0){ ?>  <?php echo("Fasting Glucose : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->fg > 0){ echo("text"); }else{echo("hidden");} ?>" name="fg"></td><td>(75-115)Mg%</td></tr><tr class="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->rg> 0){ ?>  <?php echo("Random Glucose : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->rg > 0){ echo("text"); }else{echo("hidden");} ?>" name="rg"></td><td>(75-180)Mg%</td></tr><tr class="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->gtt> 0){ ?>  <?php echo("GTT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->gtt > 0){ echo("text"); }else{echo("hidden");} ?>" name="gtt"></td></tr><tr class="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->chol> 0){ ?>  <?php echo("Cholesterol : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->chol > 0){ echo("text"); }else{echo("hidden");} ?>" name="chol"></td><td>(Up to 220mg/%)</td></tr><tr class="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->tc> 0){ ?>  <?php echo("Triglycerides : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->tc > 0){ echo("text"); }else{echo("hidden");} ?>" name="tc"></td><td>(Up to 35 - 190 mg/%)</td></tr><tr class="<?php if($piece->hdlc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hdlc> 0){ ?>  <?php echo("HDL Chol : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->hdlc > 0){ echo("text"); }else{echo("hidden");} ?>" name="hdlc"></td><td>55mg/%</td></tr><tr class="<?php if($piece->ldlc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ldlc> 0){ ?>  <?php echo("LDL Chol : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ldlc > 0){ echo("text"); }else{echo("hidden");} ?>" name="ldlc"></td><td>14mg/%</td></tr><tr class="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->br> 0){ ?>  <?php echo("Billrubin : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->br > 0){ echo("text"); }else{echo("hidden");} ?>" name="br"></td><td>(Up to 1.1 mg/%)</td></tr><tr class="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->sgptalt> 0){ ?>  <?php echo("SGPT (ALT) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->sgptalt > 0){ echo("text"); }else{echo("hidden");} ?>" name="sgptalt"></td><td>(Up to 40 U/L)</td></tr><tr class="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->alkphos> 0){ ?>  <?php echo("Alk phos : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->alkphos > 0){ echo("text"); }else{echo("hidden");} ?>" name="alkphos"></td><td>(65 - 306)U/L</td></tr><tr class="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->brdi> 0){ ?>  <?php echo("Bilirubin Dir / inD : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->brdi > 0){ echo("text"); }else{echo("hidden");} ?>" name="brdi"></td><td>(Up to 0.30 Ug%)</td></tr><tr class="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->sgot> 0){ ?>  <?php echo("SGOT (AST) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->sgot > 0){ echo("text"); }else{echo("hidden");} ?>" name="sgot"></td><td>(Up to 38 U/L)</td></tr><tr class="<?php if($piece->cpk > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->cpk> 0){ ?>  <?php echo("CPK : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cpk > 0){ echo("text"); }else{echo("hidden");} ?>" name="cpk"></td><td>(25 - 195)U/L</td></tr><tr class="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ldh> 0){ ?>  <?php echo("LDH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ldh > 0){ echo("text"); }else{echo("hidden");} ?>" name="ldh"></td><td>(230-470)</td></tr><tr class="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->urea> 0){ ?>  <?php echo("Urea : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urea > 0){ echo("text"); }else{echo("hidden");} ?>" name="urea"></td><td>(15-45)Mg%</td></tr><tr class="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->crea> 0){ ?>  <?php echo("Creatinine : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->crea > 0){ echo("text"); }else{echo("hidden");} ?>" name="crea"></td><td>(0.5-1.2)Mg%</td></tr><tr class="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ua> 0){ ?>  <?php echo("Uric Acid : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ua > 0){ echo("text"); }else{echo("hidden");} ?>" name="ua"></td><td>Male(3.4-7.0)Mg%</td></tr><tr class="<?php if($piece->na > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->na> 0){ ?>  <?php echo("Soduim (NA) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->na > 0){ echo("text"); }else{echo("hidden");} ?>" name="na"></td><td>(135-155)MMOL/L</td></tr><tr class="<?php if($piece->k > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->k> 0){ ?>  <?php echo("Potassium (K) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->k > 0){ echo("text"); }else{echo("hidden");} ?>" name="k"></td><td>(3.5-5.3)MMOL/L</td></tr><tr class="<?php if($piece->chlor > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->chlor> 0){ ?>  <?php echo("Chloride : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->chlor > 0){ echo("text"); }else{echo("hidden");} ?>" name="chlor"></td><td>(95-105)MMOL/L</td></tr><tr class="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->calc> 0){ ?>  <?php echo("Calcium : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->calc > 0){ echo("text"); }else{echo("hidden");} ?>" name="calc"></td><td>(8.10-10.4)Mg%</td></tr><tr class="<?php if($piece->phos > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->phos> 0){ ?>  <?php echo("Phosphorus : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->phos > 0){ echo("text"); }else{echo("hidden");} ?>" name="phos"></td><td>(2.8-4.8)Mg%</td></tr><tr class="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->alb> 0){ ?>  <?php echo("Albumin : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->alb > 0){ echo("text"); }else{echo("hidden");} ?>" name="alb"></td></tr><tr class="<?php if($piece->glob > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->glob> 0){ ?>  <?php echo("Globulin : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->glob > 0){ echo("text"); }else{echo("hidden");} ?>" name="glob"></td></tr><tr class="<?php if($piece->ratio > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ratio> 0){ ?>  <?php echo("A/G ratio : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ratio > 0){ echo("text"); }else{echo("hidden");} ?>" name="ratio"></td><td>(11-50)U/L</td></tr><tr class="<?php if($piece->amy > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->amy> 0){ ?>  <?php echo("Amylase : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->amy > 0){ echo("text"); }else{echo("hidden");} ?>" name="amy"></td></tr><tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><th class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>">CBC : </th><tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" WBC  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcwbc"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Lymph#   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbclymphh"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Mid#   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmidh"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Gran#  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcgranh"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Lymph%   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbclymphp"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Mid%   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmidp"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" Gran%  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcgranp"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" HGB  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbchgb"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" RBC  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcrbc"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" HCT  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbchct"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" MCV  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmcv"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" MCH  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmch"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" MCHC   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmchc"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" RDW-CV   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcrdwcv"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" RDW-SD   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcrdwsd"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" PLT  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcplt"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" MPV  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcmpv"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" PDW  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcpdw"></td></tr>
<tr class="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->cbc> 0){ ?>  <?php echo(" PCT  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cbc > 0){ echo("text"); }else{echo("hidden");} ?>" name="cbcpct"></td></tr>
</tr><tr class="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->esr> 0){ ?>  <?php echo("E.S.R : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->esr > 0){ echo("text"); }else{echo("hidden");} ?>" name="esr"></td></tr><tr class="<?php if($piece->hemo > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hemo> 0){ ?>  <?php echo("Hemoglobin : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->hemo > 0){ echo("text"); }else{echo("hidden");} ?>" name="hemo"></td></tr><tr class="<?php if($piece->mala > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->mala> 0){ ?>  <?php echo("Malaria : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="mala" class="<?php if($piece->mala> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->btct > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->btct> 0){ ?>  <?php echo("BT/CT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->btct > 0){ echo("text"); }else{echo("hidden");} ?>" name="btct"></td></tr><tr class="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ptaptt> 0){ ?>  <?php echo("P.T/A.P.T.T : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ptaptt > 0){ echo("text"); }else{echo("hidden");} ?>" name="ptaptt"></td></tr><tr class="<?php if($piece->rc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->rc> 0){ ?>  <?php echo("Retics count : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->rc > 0){ echo("text"); }else{echo("hidden");} ?>" name="rc"></td></tr><tr class="<?php if($piece->plat > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->plat> 0){ ?>  <?php echo("Platelets : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->plat > 0){ echo("text"); }else{echo("hidden");} ?>" name="plat"></td></tr><tr class="<?php if($piece->rha > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->rha> 0){ ?>  <?php echo("Rh Antibody : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->rha > 0){ echo("text"); }else{echo("hidden");} ?>" name="rha"></td></tr><tr class="<?php if($piece->abog > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->abog> 0){ ?>  <?php echo("ABO Grouping : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->abog > 0){ echo("text"); }else{echo("hidden");} ?>" name="abog"></td></tr><tr class="<?php if($piece->ctdi > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ctdi> 0){ ?>  <?php echo("Coombs test (Direct/Indirect) : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ctdi > 0){ echo("text"); }else{echo("hidden");} ?>" name="ctdi"></td></tr><tr class="<?php if($piece->rbcm > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->rbcm> 0){ ?>  <?php echo("RBC Morphology : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->rbcm > 0){ echo("text"); }else{echo("hidden");} ?>" name="rbcm"></td></tr><tr class="<?php if($piece->pregt > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->pregt> 0){ ?>  <?php echo("Pregnancy test : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>   
</td><td></td><td><select name="pregt" class="<?php if($piece->pregt> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->wt > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->wt> 0){ ?>  <?php echo("Widal Test : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="wt" class="<?php if($piece->wt> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->raf > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->raf> 0){ ?>  <?php echo("Ra factor : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="raf" class="<?php if($piece->raf> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->tpha > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->tpha> 0){ ?>  <?php echo("TPHA : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="tpha" class="<?php if($piece->tpha> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->vdrl > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->vdrl> 0){ ?>  <?php echo("VDRL : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="vdrl" class="<?php if($piece->vdrl> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->hivab > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hivab> 0){ ?>  <?php echo("HIV Ab : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="hivab" class="<?php if($piece->hivab> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->hbsag > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hbsag> 0){ ?>  <?php echo("Hbs Ag : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="hbsag" class="<?php if($piece->hbsag> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->hcvab > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hcvab> 0){ ?>  <?php echo("HCV Ab : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="hcvab" class="<?php if($piece->hcvab> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->mant > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->mant> 0){ ?>  <?php echo("Mantoux : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->mant > 0){ echo("text"); }else{echo("hidden");} ?>" name="mant"></td></tr><tr class="<?php if($piece->hcgd > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hcgd> 0){ ?>  <?php echo("HCG in dilition : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->hcgd > 0){ echo("text"); }else{echo("hidden");} ?>" name="hcgd"></td></tr><tr class="<?php if($piece->bruc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->bruc> 0){ ?>  <?php echo("Brucella : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="bruc" class="<?php if($piece->bruc> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->toxo > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->toxo> 0){ ?>  <?php echo("Toxoplasmosis : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="toxo" class="<?php if($piece->toxo> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->asot > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->asot> 0){ ?>  <?php echo("ASOT : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="asot" class="<?php if($piece->asot> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->hpa > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hpa> 0){ ?>  <?php echo("H.pylria Antibody : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="hpa" class="<?php if($piece->hpa> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">POSITIVE</option> <option value="2">NEGATIVE</option> </select></td></tr><tr class="<?php if($piece->cprpcr > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->cprpcr> 0){ ?>  <?php echo("CRP/PCR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><select name="cprpcr" class="<?php if($piece->cprpcr> 0){ echo("view"); }else{ echo ("hidden"); } ?>"> <option value="0">--CHOOSE--</option> <option value="1">REACTIVE</option> <option value="2">NON-REACTIVE</option> </select></td></tr><tr class="<?php if($piece->anfana > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->anfana> 0){ ?>  <?php echo("ANF/ANA : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->anfana > 0){ echo("text"); }else{echo("hidden");} ?>" name="anfana"></td></tr><tr class="<?php if($piece->tbs > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->tbs> 0){ ?>  <?php echo("TB serology : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->tbs > 0){ echo("text"); }else{echo("hidden");} ?>" name="tbs"></td></tr><tr class="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->psa> 0){ ?>  <?php echo("PSA : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->psa > 0){ echo("text"); }else{echo("hidden");} ?>" name="psa"></td></tr><tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><th class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>">------- URINE RE --------</th><tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo("  Colour   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urincol"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Appearance   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinapea"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Other finding  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinof"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Wbc  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinwbc"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Rbc  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinrbc"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Bacteria   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinbact"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Gasts  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="uringast"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Crystal  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urincrys"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Yeast  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinyeast"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Epithelial   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinepith"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Parasite   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinpara"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Other finding  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinofs"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Ph   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinph"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Specific Gravity   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinsg"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Glucose  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="uringluc"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Protein  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinprot"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Nitrate  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinnitrat"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Ketone   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinket"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Urobilinogen   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinurob"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Bilirubin  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinbr"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Blood  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinblood"></td></tr>
<tr class="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->urin> 0){ ?>  <?php echo(" Leucocytes   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urin > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinleuc"></td></tr>

</tr><tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><th class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>">------- STOOL --------</th><tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Colour   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolcol"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Consistency  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolcons"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Blood  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolblood"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Mucus  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolmucus"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Pus  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolpus"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Other Finger   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolof"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Ova  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolova"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Cyst   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolcyst"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Trophzoite   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stoltroph"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Larvae   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stollarv"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Rbc  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolrbc"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Wbc  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolwbc"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Bacteria   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolbact"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Yeast Cell (fungi)   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolyeast"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Other Finding  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolofs"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Occult Blood Test  : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolocultbloodtest"></td></tr>
<tr class="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>"><td><?php if($piece->stol> 0){ ?>  <?php echo(" Other Test   : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->stol > 0){ echo("text"); }else{echo("hidden");} ?>" name="stolothtest"></td></tr>
</tr><tr class="<?php if($piece->sre > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->sre> 0){ ?>  <?php echo("Semen RE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->sre > 0){ echo("text"); }else{echo("hidden");} ?>" name="sre"></td></tr><tr class="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->csfre> 0){ ?>  <?php echo("CSF RE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->csfre > 0){ echo("text"); }else{echo("hidden");} ?>" name="csfre"></td></tr><tr class="<?php if($piece->safb > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->safb> 0){ ?>  <?php echo("Sputum AFB : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->safb > 0){ echo("text"); }else{echo("hidden");} ?>" name="safb"></td></tr><tr class="<?php if($piece->abfre > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->abfre> 0){ ?>  <?php echo("ALL Body Fluid RE : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->abfre > 0){ echo("text"); }else{echo("hidden");} ?>" name="abfre"></td></tr><tr class="<?php if($piece->bjp > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->bjp> 0){ ?>  <?php echo("Bence Jones Protein : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->bjp > 0){ echo("text"); }else{echo("hidden");} ?>" name="bjp"></td></tr><tr class="<?php if($piece->urinbs > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->urinbs> 0){ ?>  <?php echo("Urine B/S : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urinbs > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinbs"></td></tr><tr class="<?php if($piece->urinbp > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->urinbp> 0){ ?>  <?php echo("Urine B/P : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urinbp > 0){ echo("text"); }else{echo("hidden");} ?>" name="urinbp"></td></tr><tr class="<?php if($piece->urobil > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->urobil> 0){ ?>  <?php echo("Urobilinogen : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->urobil > 0){ echo("text"); }else{echo("hidden");} ?>" name="urobil"></td></tr><tr class="<?php if($piece->sob > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->sob> 0){ ?>  <?php echo("Stool Occult Blood : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->sob > 0){ echo("text"); }else{echo("hidden");} ?>" name="sob"></td></tr><tr class="<?php if($piece->srs > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->srs> 0){ ?>  <?php echo("Stool Reducing Substance : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->srs > 0){ echo("text"); }else{echo("hidden");} ?>" name="srs"></td></tr><tr class="<?php if($piece->usgcpc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->usgcpc> 0){ ?>  <?php echo("Urethral Smear G/C. P/C : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->usgcpc > 0){ echo("text"); }else{echo("hidden");} ?>" name="usgcpc"></td></tr><tr class="<?php if($piece->vsgcpc > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->vsgcpc> 0){ ?>  <?php echo("Veginal Swab G/C. P/C : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->vsgcpc > 0){ echo("text"); }else{echo("hidden");} ?>" name="vsgcpc"></td></tr><tr class="<?php if($piece->vst > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->vst> 0){ ?>  <?php echo("Veginal Swab for Trichomonas : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->vst > 0){ echo("text"); }else{echo("hidden");} ?>" name="vst"></td></tr><tr class="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->tsh> 0){ ?>  <?php echo("TSH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->tsh > 0){ echo("text"); }else{echo("hidden");} ?>" name="tsh"></td></tr><tr class="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->t3> 0){ ?>  <?php echo("T3 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->t3 > 0){ echo("text"); }else{echo("hidden");} ?>" name="t3"></td></tr><tr class="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->t4> 0){ ?>  <?php echo("T4 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->t4 > 0){ echo("text"); }else{echo("hidden");} ?>" name="t4"></td></tr><tr class="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->fsh> 0){ ?>  <?php echo("FSH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->fsh > 0){ echo("text"); }else{echo("hidden");} ?>" name="fsh"></td></tr><tr class="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->lh> 0){ ?>  <?php echo("LH : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->lh > 0){ echo("text"); }else{echo("hidden");} ?>" name="lh"></td></tr><tr class="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->prl> 0){ ?>  <?php echo("PRL : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->prl > 0){ echo("text"); }else{echo("hidden");} ?>" name="prl"></td></tr><tr class="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->testo> 0){ ?>  <?php echo("Testosterone : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->testo > 0){ echo("text"); }else{echo("hidden");} ?>" name="testo"></td></tr><tr class="<?php if($piece->proges > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->proges> 0){ ?>  <?php echo("Progesterone : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->proges > 0){ echo("text"); }else{echo("hidden");} ?>" name="proges"></td></tr><tr class="<?php if($piece->e2 > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->e2> 0){ ?>  <?php echo("E2 : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->e2 > 0){ echo("text"); }else{echo("hidden");} ?>" name="e2"></td></tr><tr class="<?php if($piece->gh > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->gh> 0){ ?>  <?php echo("Growth hormone : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->gh > 0){ echo("text"); }else{echo("hidden");} ?>" name="gh"></td></tr><tr class="<?php if($piece->aus > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->aus> 0){ ?>  <?php echo("Abdominal Ultra-Sound : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->aus > 0){ echo("text"); }else{echo("hidden");} ?>" name="aus"></td></tr><tr class="<?php if($piece->ecg > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->ecg> 0){ ?>  <?php echo("ECG : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->ecg > 0){ echo("text"); }else{echo("hidden");} ?>" name="ecg"></td></tr><tr class="<?php if($piece->cxr > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->cxr> 0){ ?>  <?php echo("CXR : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->cxr > 0){ echo("text"); }else{echo("hidden");} ?>" name="cxr"></td></tr><tr class="<?php if($piece->bhcg > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->bhcg> 0){ ?>  <?php echo("B-HCG : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->bhcg > 0){ echo("text"); }else{echo("hidden");} ?>" name="bhcg"></td></tr><tr class="<?php if($piece->hba1c > 0){ echo("text"); }else{echo("hidden");} ?>"><td>
<?php if($piece->hba1c> 0){ ?>  <?php echo("HBA1C : "); }else{ ?> <h5 class="hidden"> <?php echo("");?></h5><?php } ?>     </td><td></td><td><input type="<?php if($piece->hba1c > 0){ echo("text"); }else{echo("hidden");} ?>" name="hba1c"></td></tr>
      </table>
      <input type="submit" name="enreg" value="SAVE">
      <input type="reset" name="reset" value="RESET">
      <?php 
        endforeach; 
      ?>
    </form>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
