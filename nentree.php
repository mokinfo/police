<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("Login");
}
?>
<?php
if (isset($_POST['ident'])) {
  $ident = $_POST["ident"];
  $idpatient = $_POST["idpatient"];
  $motif = $_POST["motif"];
  $type_consult = $_POST["medecin"];
  $paix = $_POST["paix"];
  $codf = 0;
  $date_paix = 0;

  
  $cosen = new mysqli('localhost', 'root', '', 'spn');
  $psen = $cosen->query("SELECT * FROM patient where idp = '$idpatient'");
  
  while($pas = $psen->fetch_array()){
    if ($pas['catp'] == 'POA' || $pas['catp'] == 'POR' || $pas['catp'] == 'FPA' || $pas['catp'] == 'FPR' || $pas['catp'] == 'CAS' || $pas['catp'] == 'AGE' || $pas['catp'] == 'FAE') {
      $statut = 'P';
    }elseif ($pas['catp'] == 'CIV' || $pas['catp'] == 'MIL' || $pas['catp'] == 'GEN' || $pas['catp'] == 'GAR' || $pas['catp'] == 'GAC') {
      $statut = 'A';
    }
    if ($pas['cnss'] == "NON" && $paix == "ESP") {
      if ($type_consult == "GEN") {$mt = 3000;$mt_cnss = 0;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt = 5000;$mt_cnss = 0;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt = 5000;$mt_cnss = 0;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt = 5000;$mt_cnss = 0;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt = 5000;$mt_cnss = 0;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt = 5000;$mt_cnss = 0;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt = 5000;$mt_cnss = 0;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt = 5000;$mt_cnss = 0;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt = 5000;$mt_cnss = 0;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt = 5000;$mt_cnss = 0;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt = 5000;$mt_cnss = 0;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt = 5000;$mt_cnss = 0;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt = 5000;$mt_cnss = 0;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt = 5000;$mt_cnss = 0;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt = 5000;$mt_cnss = 0;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt = 5000;$mt_cnss = 0;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt = 5000;$mt_cnss = 0;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 1500;$mt_cnss = 0;$desg ="Urgence";}
    }elseif ($pas['cnss'] == "OUI" && $paix == "ESP") {
      if ($type_consult == "GEN") {$mt_cnss = 3000;$mt = 1500;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt_cnss = 3000;$mt = 2000;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt_cnss = 3000;$mt = 2000;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt_cnss = 3000;$mt = 2000;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt_cnss = 3000;$mt = 2000;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt_cnss = 3000;$mt = 2000;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt_cnss = 3000;$mt = 2000;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt_cnss = 3000;$mt = 2000;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt_cnss = 3000;$mt = 2000;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt_cnss = 3000;$mt = 2000;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt_cnss = 3000;$mt = 2000;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt_cnss = 3000;$mt = 2000;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt_cnss = 3000;$mt = 2000;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt_cnss = 3000;$mt = 2000;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 1500;$mt_cnss = 0;$desg ="Urgence";}
    }elseif ($pas['cnss'] == "OUI" && $paix == "PSC") {
      if ($type_consult == "GEN") {$mt_cnss = 3000;$mt = 1500;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt_cnss = 3000;$mt = 2000;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt_cnss = 3000;$mt = 2000;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt_cnss = 3000;$mt = 2000;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt_cnss = 3000;$mt = 2000;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt_cnss = 3000;$mt = 2000;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt_cnss = 3000;$mt = 2000;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt_cnss = 3000;$mt = 2000;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt_cnss = 3000;$mt = 2000;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt_cnss = 3000;$mt = 2000;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt_cnss = 3000;$mt = 2000;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt_cnss = 3000;$mt = 2000;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt_cnss = 3000;$mt = 2000;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt_cnss = 3000;$mt = 2000;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt_cnss = 3000;$mt = 2000;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 0;$mt_cnss = 0;$desg ="Urgence";}
    }elseif ($pas['cnss'] == "NON" && $paix == "PSC") {
      if ($type_consult == "GEN") {$mt_cnss = 3000;$mt = 0;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt_cnss = 5000;$mt = 0;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt_cnss = 5000;$mt = 0;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt_cnss = 5000;$mt = 0;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt_cnss = 5000;$mt = 0;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt_cnss = 5000;$mt = 0;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt_cnss = 5000;$mt = 0;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt_cnss = 5000;$mt = 0;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt_cnss = 5000;$mt = 0;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt_cnss = 5000;$mt = 0;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt_cnss = 5000;$mt = 0;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt_cnss = 5000;$mt = 0;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt_cnss = 5000;$mt = 0;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt_cnss = 5000;$mt = 0;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt_cnss = 5000;$mt = 0;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt_cnss = 5000;$mt = 0;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt_cnss = 5000;$mt = 0;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 0;$mt_cnss = 0;$desg ="Urgence";}
    }elseif ($pas['cnss'] == "NON" && ($paix == "CAS" || $paix == "AGE" || $paix == "FAE")) {
      if ($type_consult == "GEN") {$mt = 0;$mt_cnss = 0;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt = 0;$mt_cnss = 0;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt = 0;$mt_cnss = 0;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt = 0;$mt_cnss = 0;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt = 0;$mt_cnss = 0;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt = 0;$mt_cnss = 0;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt = 0;$mt_cnss = 0;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt = 0;$mt_cnss = 0;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt = 0;$mt_cnss = 0;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt = 0;$mt_cnss = 0;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt = 0;$mt_cnss = 0;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt = 0;$mt_cnss = 0;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt = 0;$mt_cnss = 0;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt = 0;$mt_cnss = 0;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt = 0;$mt_cnss = 0;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt = 0;$mt_cnss = 0;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt = 0;$mt_cnss = 0;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 0;$mt_cnss = 0;$desg ="Urgence";}
    }elseif ($pas['cnss'] == "OUI" && ($paix == "CAS" || $paix == "AGE" || $paix == "FAE")) {
      if ($type_consult == "GEN") {$mt_cnss = 3000;$mt = 0;$desg ="Généraliste";}
      if ($type_consult == "DEN") {$mt_cnss = 3000;$mt = 0;$desg ="Dentiste";}
      if ($type_consult == "CTC") {$mt_cnss = 3000;$mt = 0;$desg ="Chirurgie thoracique cardiovasculaire";}
      if ($type_consult == "OPH") {$mt_cnss = 3000;$mt = 0;$desg ="Ophtalmologie";}
      if ($type_consult == "CAN") {$mt_cnss = 3000;$mt = 0;$desg ="Cancérologie";}
      if ($type_consult == "ORL") {$mt_cnss = 3000;$mt = 0;$desg ="ORL";}
      if ($type_consult == "CAR") {$mt_cnss = 3000;$mt = 0;$desg ="Cardiologie";}
      if ($type_consult == "ORT") {$mt_cnss = 3000;$mt = 0;$desg ="Orthopédie";}
      if ($type_consult == "CHP") {$mt_cnss = 3000;$mt = 0;$desg ="Chirurgie pédiatrique";}
      if ($type_consult == "PED") {$mt_cnss = 3000;$mt = 0;$desg ="Pédiatrie";}
      if ($type_consult == "URO") {$mt_cnss = 3000;$mt = 0;$desg ="Urologie";}
      if ($type_consult == "NEU") {$mt_cnss = 3000;$mt = 0;$desg ="Neurologie";}
      if ($type_consult == "ANS") {$mt_cnss = 3000;$mt = 0;$desg ="Anesthesie";}
      if ($type_consult == "GYO") {$mt_cnss = 3000;$mt = 0;$desg ="Gynécologie obstétrique";}
      if ($type_consult == "CHG") {$mt_cnss = 3000;$mt = 0;$desg ="Chirurgie générale";}
      if ($type_consult == "GAS") {$mt_cnss = 3000;$mt = 0;$desg ="Gastrologie";}
      if ($type_consult == "HEM") {$mt_cnss = 3000;$mt = 0;$desg ="Hématologie";}
      if ($type_consult == "URG") {$mt = 0;$mt_cnss = 0;$desg ="Urgence";}
    }
  }
  
  //$nump = $_POST["nump"];
  $heura = $_POST["heura"];
  $heurf = $_POST["heurf"];
  //$statut = "A";
  $datedujour = date("d/m/Y");
  $datehosdt = date("Y-m-d G:i");

  $cosn = new mysqli('localhost', 'root', '', 'spn');
  $datedujourn = date("d/m/Y");
  $psn = $cosn->query("SELECT * FROM entre where datent = '$datedujourn' and num_medecin = '$type_consult'");
  $row_cnt = $psn->num_rows;
  $nump = $row_cnt + 1; 
  //Coût 
    $etat = "IMPAYER";
    $user = $_SESSION['user'];
    $servi = "consultation";
  //if ($path == 1) {
    $res = 1;
    $nature = "Entrée";
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {
    $sql = "INSERT INTO entre (ident, codepatient, motif, num_medecin, nom_medecin, num, heura, heurf, statut, datent) VALUES ('$ident', '$idpatient', '$motif', '$type_consult', '', '$nump', '$heura', '$heurf', '$statut', '$datedujour')";
    $mysqli = new mysqli('localhost','root','','spn');
    $desgfac = "Frais de consultation ".$desg;
    $mysqli->query($sql);
    if (isset($mysqli)) {
      $sqlf = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, date_paix, service, codf) VALUES ('', '$desgfac', '$idpatient', '$datehosdt', '$paix', '$mt', '$mt_cnss', '$etat', '$date_paix', '$servi', '$codf')";
      $mysqlif = new mysqli('localhost','root','','spn');
      $mysqlif->query($sqlf);
      if (isset($mysqlif)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Veuillez passer à la caisse cher patient !");'; 
        echo 'window.location.href = "Listeattente";';
        echo '</script>';
      }
      //redirect_to("Listeattente");
    }
  
}else{
  //redirect_to("nouveau.php");
  ?>
    <?php 
}
?>