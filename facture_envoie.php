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

  $res = 2;

  if(!empty($_POST['fg'])){$fg = $_POST['fg'];}else{$fg = 0;}
  if(!empty($_POST['rg'])){$rg = $_POST['rg'];}else{$rg = 0;}
  if(!empty($_POST['hgpo'])){$hgpo = $_POST['hgpo'];}else{$hgpo = 0;}
  if(!empty($_POST['chol'])){$chol = $_POST['chol'];}else{$chol = 0;}
  if(!empty($_POST['tc'])){$tc = $_POST['tc'];}else{$tc = 0;}
  if(!empty($_POST['sgot'])){$sgot = $_POST['sgot'];}else{$sgot = 0;}
  if(!empty($_POST['ldh'])){$ldh = $_POST['ldh'];}else{$ldh = 0;}
  if(!empty($_POST['sgptalt'])){$sgptalt = $_POST['sgptalt'];}else{$sgptalt = 0;}
  if(!empty($_POST['urea'])){$urea = $_POST['urea'];}else{$urea = 0;}
  if(!empty($_POST['crea'])){$crea = $_POST['crea'];}else{$crea = 0;}
  if(!empty($_POST['ua'])){$ua = $_POST['ua'];}else{$ua = 0;}
  if(!empty($_POST['alb'])){$alb = $_POST['alb'];}else{$alb = 0;}
  if(!empty($_POST['br'])){$br = $_POST['br'];}else{$br = 0;}
  if(!empty($_POST['brdi'])){$brdi = $_POST['brdi'];}else{$brdi = 0;}
  if(!empty($_POST['alkphos'])){$alkphos = $_POST['alkphos'];}else{$alkphos = 0;}
  if(!empty($_POST['calc'])){$calc = $_POST['calc'];}else{$calc = 0;}
  if(!empty($_POST['magn'])){$magn = $_POST['magn'];}else{$magn = 0;}
  if(!empty($_POST['ptp'])){$ptp = $_POST['ptp'];}else{$ptp = 0;}
  if(!empty($_POST['gtt'])){$gtt = $_POST['gtt'];}else{$gtt = 0;}
  if(!empty($_POST['iosk'])){$iosk = $_POST['iosk'];}else{$iosk = 0;}
  if(!empty($_POST['cbc'])){$cbc = $_POST['cbc'];}else{$cbc = 0;}
  if(!empty($_POST['abog'])){$abog = $_POST['abog'];}else{$abog = 0;}
  if(!empty($_POST['ptaptt'])){$ptaptt = $_POST['ptaptt'];}else{$ptaptt = 0;}
  if(!empty($_POST['tpinr'])){$tpinr = $_POST['tpinr'];}else{$tpinr = 0;}
  if(!empty($_POST['rbcm'])){$rbcm = $_POST['rbcm'];}else{$rbcm = 0;}
  if(!empty($_POST['testemel'])){$testemel = $_POST['testemel'];}else{$testemel = 0;}
  if(!empty($_POST['tauret'])){$tauret = $_POST['tauret'];}else{$tauret = 0;}
  if(!empty($_POST['esr'])){$esr = $_POST['esr'];}else{$esr = 0;}
  if(!empty($_POST['urin'])){$urin = $_POST['urin'];}else{$urin = 0;}
  if(!empty($_POST['stol'])){$stol = $_POST['stol'];}else{$stol = 0;}
  if(!empty($_POST['urinbs'])){$urinbs = $_POST['urinbs'];}else{$urinbs = 0;}
  if(!empty($_POST['sob'])){$sob = $_POST['sob'];}else{$sob = 0;}
  if(!empty($_POST['pus'])){$pus = $_POST['pus'];}else{$pus = 0;}
  if(!empty($_POST['csfre'])){$csfre = $_POST['csfre'];}else{$csfre = 0;}
  if(!empty($_POST['pore'])){$pore = $_POST['pore'];}else{$pore = 0;}
  if(!empty($_POST['pgorg'])){$pgorg = $_POST['pgorg'];}else{$pgorg = 0;}
  if(!empty($_POST['pvatb'])){$pvatb = $_POST['pvatb'];}else{$pvatb = 0;}
  if(!empty($_POST['pvatbrs'])){$pvatbrs = $_POST['pvatbrs'];}else{$pvatbrs = 0;}
  if(!empty($_POST['burin'])){$burin = $_POST['burin'];}else{$burin = 0;}
  if(!empty($_POST['psa'])){$psa = $_POST['psa'];}else{$psa = 0;}
  if(!empty($_POST['tsh'])){$tsh = $_POST['tsh'];}else{$tsh = 0;}
  if(!empty($_POST['t3'])){$t3 = $_POST['t3'];}else{$t3 = 0;}
  if(!empty($_POST['t4'])){$t4 = $_POST['t4'];}else{$t4 = 0;}
  if(!empty($_POST['betahcg'])){$betahcg = $_POST['betahcg'];}else{$betahcg = 0;}
  if(!empty($_POST['acahbc'])){$acahbc = $_POST['acahbc'];}else{$acahbc = 0;}
  if(!empty($_POST['ca125'])){$ca125 = $_POST['ca125'];}else{$ca125 = 0;}
  if(!empty($_POST['ca19'])){$ca19 = $_POST['ca19'];}else{$ca19 = 0;}
  if(!empty($_POST['testo'])){$testo = $_POST['testo'];}else{$testo = 0;}
  if(!empty($_POST['tropo'])){$tropo = $_POST['tropo'];}else{$tropo = 0;}
  if(!empty($_POST['dimeres'])){$dimeres = $_POST['dimeres'];}else{$dimeres = 0;}
  if(!empty($_POST['prl'])){$prl = $_POST['prl'];}else{$prl = 0;}
  if(!empty($_POST['fsh'])){$fsh = $_POST['fsh'];}else{$fsh = 0;}
  if(!empty($_POST['lh'])){$lh = $_POST['lh'];}else{$lh = 0;}
  if(!empty($_POST['hbsag'])){$hbsag = $_POST['hbsag'];}else{$hbsag = 0;}
  if(!empty($_POST['hcvab'])){$hcvab = $_POST['hcvab'];}else{$hcvab = 0;}
  if(!empty($_POST['hivab'])){$hivab = $_POST['hivab'];}else{$hivab = 0;}
  if(!empty($_POST['hbc'])){$hbc = $_POST['hbc'];}else{$hbc = 0;}
  if(!empty($_POST['crp'])){$crp = $_POST['crp'];}else{$crp = 0;}
  if(!empty($_POST['facrhu'])){$facrhu = $_POST['facrhu'];}else{$facrhu = 0;}
  if(!empty($_POST['aslo'])){$aslo = $_POST['aslo'];}else{$aslo = 0;}
  if(!empty($_POST['vdrl'])){$vdrl = $_POST['vdrl'];}else{$vdrl = 0;}
  if(!empty($_POST['hbpylo'])){$hbpylo = $_POST['hbpylo'];}else{$hbpylo = 0;}
  if(!empty($_POST['toxo'])){$toxo = $_POST['toxo'];}else{$toxo = 0;}
  if(!empty($_POST['rub'])){$rub = $_POST['rub'];}else{$rub = 0;}



  $sql = "INSERT INTO examens (ide,idp,name,phone,address,age,sex,numcard,price,heurfexam,datej,fg,rg,hgpo,chol,tc,sgot,ldh,sgptalt,urea,crea,ua,alb,br,brdi,alkphos,calc,magn,ptp,gtt,iosk,cbc,abog,ptaptt,tpinr,rbcm,testemel,tauret,esr,urin,stol,urinbs,sob,pus,csfre,pore,pgorg,pvatb,pvatbrs,burin,psa,tsh,t3,t4,betahcg,acahbc,ca125,ca19,testo,tropo,dimeres,prl,fsh,lh,hbsag,hcvab,hivab,hbc,crp,facrhu,aslo,vdrl,hbpylo,toxo,rub,pandoc,pcandoc,chk,res) VALUES ('$idexam','$idpa','$nom','$tel','$adresse','$age','$sex','$numcard','$price','$heurfexam','$datedujour','$fg','$rg','$hgpo','$chol','$tc','$sgot','$ldh','$sgptalt','$urea','$crea','$ua','$alb','$br','$brdi','$alkphos','$calc','$magn','$ptp','$gtt','$iosk','$cbc','$abog','$ptaptt','$tpinr','$rbcm','$testemel','$tauret','$esr','$urin','$stol','$urinbs','$sob','$pus','$csfre','$pore','$pgorg','$pvatb','$pvatbrs','$burin','$psa','$tsh','$t3','$t4','$betahcg','$acahbc','$ca125','$ca19','$testo','$tropo','$dimeres','$prl','$fsh','$lh','$hbsag','$hcvab','$hivab','$hbc','$crp','$facrhu','$aslo','$vdrl','$hbpylo','$toxo','$rub','$pandoc','$pcandoc','$chk','$res')";
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

?>
