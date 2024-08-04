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


  if(!empty($_POST['fg'])){$fg = $_POST['fg']; $pp1=2; }else{$fg = 0; $pp1 = 0; }
  if(!empty($_POST['rg'])){$rg = $_POST['rg']; $pp2=2;  }else{$rg = 0; $pp2 = 0; }
  if(!empty($_POST['gtt'])){$gtt = $_POST['gtt']; $pp3=8;  }else{$gtt = 0; $pp3 = 0; }
  if(!empty($_POST['esr'])){$esr = $_POST['esr']; $pp33=2;  }else{$esr = 0; $pp33 = 0; }
  if(!empty($_POST['hemo'])){$hemo = $_POST['hemo']; $pp34=2;  }else{$hemo = 0; $pp34 = 0; }
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
  if(!empty($_POST['cbc'])){$cbc = $_POST['cbc']; $pp32=6;  }else{$cbc = 0; $pp32 = 0; }
  if(!empty($_POST['tsh'])){$tsh = $_POST['tsh']; $pp77=10;  }else{$tsh = 0; $pp77 = 0; }
  if(!empty($_POST['t3'])){$t3 = $_POST['t3']; $pp85=10;  }else{$t3 = 0; $pp85 = 0; }
  if(!empty($_POST['t4'])){$t4 = $_POST['t4']; $pp86=10;  }else{$t4 = 0; $pp86 = 0; }
  if(!empty($_POST['fsh'])){$fsh = $_POST['fsh']; $pp79=10;  }else{$fsh = 0; $pp79 = 0; }
  if(!empty($_POST['lh'])){$lh = $_POST['lh']; $pp80=10;  }else{$lh = 0; $pp80 = 0; }
  if(!empty($_POST['prl'])){$prl = $_POST['prl']; $pp81=10;  }else{$prl = 0; $pp81 = 0; }
  if(!empty($_POST['testo'])){$testo = $_POST['testo']; $pp82=10;  }else{$testo = 0; $pp82 = 0; }
  if(!empty($_POST['proges'])){$proges = $_POST['proges']; $pp78=10;  }else{$proges = 0; $pp78 = 0; }
  if(!empty($_POST['ldh'])){$ldh = $_POST['ldh']; $pp4=5;  }else{$ldh = 0; $pp4 = 0; }
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

  $sql = "INSERT INTO andoc (idan, fg, rg, gtt, chol, tc, hdlc, ldlc, br, sgptalt, alkphos, brdi, sgot, cpk, ldh, urea, crea, ua, na, k, chlor, calc, phos, alb, glob, ratio, amy, cbc, esr, hemo, mala, btct, ptaptt, rc, plat, rha, abog, ctdi, rbcm, pregt, wt, raf, tpha, vdrl, hivab, hbsag, hcvab, mant, hcgd, bruc, toxo, asot, hpa, cprpcr, anfana, tbs, psa, urin, stol, sre, csfre, safb, abfre, bjp, urinbs, urinbp, urobil, sob, srs, usgcpc, vsgcpc, vst, tsh, t3, t4, fsh, lh, prl, testo, proges, e2, gh, aus, ecg, cxr, bhcg, hba1c, pandoc) VALUES ('$idan', '$fg', '$rg', '$gtt', '$chol', '$tc', '$hdlc', '$ldlc', '$br', '$sgptalt', '$alkphos', '$brdi', '$sgot', '$cpk', '$ldh', '$urea', '$crea', '$ua', '$na', '$k', '$chlor', '$calc', '$phos', '$alb', '$glob', '$ratio', '$amy', '$cbc', '$esr', '$hemo', '$mala', '$btct', '$ptaptt', '$rc', '$plat', '$rha', '$abog', '$ctdi', '$rbcm', '$pregt', '$wt', '$raf', '$tpha', '$vdrl', '$hivab', '$hbsag', '$hcvab', '$mant', '$hcgd', '$bruc', '$toxo', '$asot', '$hpa', '$cprpcr', '$anfana', '$tbs', '$psa', '$urin', '$stol', '$sre', '$csfre', '$safb', '$abfre', '$bjp', '$urinbs', '$urinbp', '$urobil', '$sob', '$srs', '$usgcpc', '$vsgcpc', '$vst', '$tsh', '$t3', '$t4', '$fsh', '$lh', '$prl', '$testo', '$proges', '$e2', '$gh', '$aus', '$ecg', '$cxr', '$bhcg', '$hba1c', '$pandoc')";
  $mysqli = new mysqli('localhost','root','','bormed');
  $mysqli->query($sql);
  if (isset($mysqli)) {
    $JIKO = mysqli_connect('localhost','root','','bormed');
    $cares = mysqli_query($JIKO, "UPDATE care SET pandoc='$pandoc', cbc = '$cbc', urin = '$urin', stol = '$stol', res='$res' where idcare = '$idan'");
    if (isset($cares)) {
      $delsai = mysqli_connect('localhost','root','','bormed');
      $result = mysqli_query($delsai, "DELETE FROM patient WHERE idp = '$idan'");
    }
    if (isset($result)) {
      redirect_to("Accueil");
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

            <div id="qmoa">
              <?php 
                if(!empty($_GET['id'])) {
                  $id = $_GET['id'];
                }else{
                  redirect_to("home.php");
                }
                $pieces = $DB->query("SELECT * FROM care WHERE idcare = '$id'");
                ?>
                <form action="analysis.php" method="post">
                <?php 
                  foreach ($pieces as $piece):
                ?>
                <input type="hidden" name="idan" value="<?php echo $piece->idcare ?>">
                Full name : <?php echo $piece->name ?><br>
                Age : <?php echo $piece->age ?><br>
                Sex : <?php echo $piece->sex ?><br>
                Date : <?php echo $piece->datej ?><br><br><br>
                
                <div id="che">
                  <h2>Chemistry</h2>
                  <input type="checkbox" name="fg" value="1">Fasting Glucose<br>
                  <input type="checkbox" name="rg" value="1">Random Glucose<br>
                  <input type="checkbox" name="gtt" value="1">GTT<br>
                  <input type="checkbox" name="chol" value="1">Cholesterol<br>
                  <input type="checkbox" name="tc" value="1">Triglycerides<br>
                  <input type="checkbox" name="hdlc" value="1">HDL Chol<br>
                  <input type="checkbox" name="ldlc" value="1">LDL Chol<br>
                  <input type="checkbox" name="br" value="1">Billrubin<br>
                  <input type="checkbox" name="sgptalt" value="1">SGPT (ALT)<br>
                  <input type="checkbox" name="alkphos" value="1">Alk phos<br>
                  <input type="checkbox" name="brdi" value="1">Bilirubin Dir / inD<br>
                  <input type="checkbox" name="sgot" value="1">SGOT (AST)<br>
                  <input type="checkbox" name="cpk" value="1">CPK<br>
                  <input type="checkbox" name="ldh" value="1">LDH<br>
                  <input type="checkbox" name="urea" value="1">Urea<br>
                  <input type="checkbox" name="crea" value="1">Creatinine<br>
                  <input type="checkbox" name="ua" value="1">Uric Acid<br>
                  <input type="checkbox" name="na" value="1">Soduim (NA)<br>
                  <input type="checkbox" name="k" value="1">Potassium (K)<br>
                  <input type="checkbox" name="chlor" value="1">Chloride<br>
                  <input type="checkbox" name="calc" value="1">Calcium<br>
                  <input type="checkbox" name="phos" value="1">Phosphorus<br>
                  <input type="checkbox" name="alb" value="1">Albumin<br>
                  <input type="checkbox" name="glob" value="1">Globulin<br>
                  <input type="checkbox" name="ratio" value="1">A/G ratio<br>
                  <input type="checkbox" name="amy" value="1">Amylase<br>
                </div>
                <div id="hem">
                  <h2>Hemathology</h2>  
                  <input type="checkbox" name="cbc" value="1">CBC/RBC indices<br>
                  <input type="checkbox" name="esr" value="1">E.S.R<br>
                  <input type="checkbox" name="hemo" value="1">Hemoglobin<br>
                  <input type="checkbox" name="mala" value="1">Malaria<br>
                  <input type="checkbox" name="btct" value="1">BT/CT<br>
                  <input type="checkbox" name="ptaptt" value="1">P.T/A.P.T.T<br>
                  <input type="checkbox" name="rc" value="1">Retics count<br>
                  <input type="checkbox" name="plat" value="1">Platelets<br>
                  <input type="checkbox" name="rha" value="1">Rh Antibody<br>
                  <input type="checkbox" name="abog" value="1">ABO Grouping<br>
                  <input type="checkbox" name="ctdi" value="1">Coombs test (Direct/Indirect)<br>
                  <input type="checkbox" name="rbcm" value="1">RBC Morphology<br>
                  <h2>Serology / Virology</h2>  
                  <input type="checkbox" name="pregt" value="1">Pregnancy test<br>
                  <input type="checkbox" name="wt" value="1">Widal Test<br>
                  <input type="checkbox" name="raf" value="1">Ra factor<br>
                  <input type="checkbox" name="tpha" value="1">TPHA<br>
                  <input type="checkbox" name="vdrl" value="1">VDRL<br>
                  <input type="checkbox" name="hivab" value="1">HIV Ab<br>
                  <input type="checkbox" name="hbsag" value="1">Hbs Ag<br>
                  <input type="checkbox" name="hcvab" value="1">HCV Ab<br>
                  <input type="checkbox" name="mant" value="1">Mantoux<br>
                  <input type="checkbox" name="hcgd" value="1">HCG in dilition<br>
                  <input type="checkbox" name="bruc" value="1">Brucella<br>
                  <input type="checkbox" name="toxo" value="1">Toxoplasmosis<br>
                  <input type="checkbox" name="asot" value="1">ASOT<br>
                  <input type="checkbox" name="hpa" value="1">H.pylria Antibody<br>
                  <input type="checkbox" name="cprpcr" value="1">CRP/PCR<br>
                  <input type="checkbox" name="anfana" value="1">ANF/ANA<br>
                  <input type="checkbox" name="tbs" value="1">TB serology<br>
                  <input type="checkbox" name="psa" value="1">PSA<br>
                </div>
                <div id="cli">
                  <h2>Clinical Pathology</h2> 
                  <input type="checkbox" name="urin" value="1">URINE RE<br>
                  <input type="checkbox" name="stol" value="1">STOOL RE<br>
                  <input type="checkbox" name="sre" value="1">Semen RE<br>
                  <input type="checkbox" name="csfre" value="1">CSF RE<br>
                  <input type="checkbox" name="safb" value="1">Sputum AFB<br>
                  <input type="checkbox" name="abfre" value="1">ALL Body Fluid RE<br>
                  <input type="checkbox" name="bjp" value="1">Bence Jones Protein<br>
                  <input type="checkbox" name="urinbs" value="1">Urine B/S<br>
                  <input type="checkbox" name="urinbp" value="1">Urine B/P<br>
                  <input type="checkbox" name="urobil" value="1">Urobilinogen<br>
                  <input type="checkbox" name="sob" value="1">Stool Occult Blood<br>
                  <input type="checkbox" name="srs" value="1">Stool Reducing Substance<br>
                  <input type="checkbox" name="usgcpc" value="1">Urethral Smear G/C. P/C<br>
                  <input type="checkbox" name="vsgcpc" value="1">Veginal Swab G/C. P/C<br>
                  <input type="checkbox" name="vst" value="1">Veginal Swab for Trichomonas<br>
                  <h2>Hormones</h2> 
                  <input type="checkbox" name="tsh" value="1">TSH<br>
                  <input type="checkbox" name="t3" value="1">T3<br>
                  <input type="checkbox" name="t4" value="1">T4<br>
                  <input type="checkbox" name="fsh" value="1">FSH<br>
                  <input type="checkbox" name="lh" value="1">LH<br>
                  <input type="checkbox" name="prl" value="1">PRL<br>
                  <input type="checkbox" name="testo" value="1">Testosterone<br>
                  <input type="checkbox" name="proges" value="1">Progesterone<br>
                  <input type="checkbox" name="e2" value="1">E2<br>
                  <input type="checkbox" name="gh" value="1">Growth hormone<br>
                  <input type="checkbox" name="aus" value="1">Abdominal Ultra-Sound<br>
                  <input type="checkbox" name="ecg" value="1">ECG<br>
                  <input type="checkbox" name="cxr" value="1">CXR<br>
                  <input type="checkbox" name="bhcg" value="1">B-HCG<br>
                  <input type="checkbox" name="hba1c" value="1">HBA1C<br>
                </div><br>
                <div id="inp">
                  <input type="submit" name="enreg" value="SAVE">
                  <input type="reset" name="reset" value="RESET">
                </div>
                <?php 
                  endforeach; 
                ?>
              </form>
            </div>
          </div><!-- /.col -->  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
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
