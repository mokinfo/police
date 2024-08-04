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
	//var_dump($_POST);
	$idh = $_POST['idh'];
	$idp = $_POST['idp'];
	$hospar = $_POST['hospar'];
	$med_trai = $_POST['med_trai'];
	$date_hos = $_POST['date_hos'];
	$type_hos = $_POST['type_hos'];
	$motif_hos = $_POST['motif_hos'];
	$service = $_POST['service'];
	$chambre = $_POST['chambre'];
	$lit = $_POST['lit'];
	$tuteur = $_POST['tuteur'];
	//$datedhos = date("d/m/Y");
	//$heurdhos = date("H:m:s");
	$date_nai_garde = $_POST['date_nai_garde'];
	$cdi = $_POST['cdi'];
	$date_cdi = $_POST['date_cdi'];
	$etat = "ENT";
    $etats = "IMPAYER";
  	$datedujour = date("d/m/Y G:i");
  	$datehosdt = date("Y-m-d G:i");
  	$date_paix = "";
	$codf = 0;
	$etattt = "OK";

	$mys = new mysqli('localhost','root','','spn');
	$reqq = $mys->query("SELECT * from patient where idp = '$idp'");
	while($reqs = $reqq->fetch_array()){
		echo "Reached here 1"; // Ajoutez cette ligne
		if ($reqs['cnss'] == "OUI") {
			if ($reqs['catp'] == "CIV"){
				if ($type_hos == "Normal") {
			 		$mt1 = 0;
		 			$mt_cnss1 = 0;
			 	}elseif($type_hos == "REA"){
			 		$mt1 = 9000;
			 		$mt_cnss1 = 1000;
			 	} 
			 	if ($chambre == 2) {
			 		$mt2 = 10000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 3){
			 		$mt2 = 15000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 4){
			 		$mt2 = 40000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 5){
			 		$mt2 = 4000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 6){
			 		$mt2 = 7000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}else{
			 		$mt2 = 0;
			 		$mt_cnss2 = 0;
			 	}
			 	$mt = $mt1 + $mt2;
			 	$mt_cnss = $mt_cnss1 + $mt_cnss2;	
				$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, type_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$type_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
				$mysqli = new mysqli('localhost','root','','spn');
				$mysqli->query($sql);
				if (isset($mysqli)) {
					echo "Reached here 2"; // Ajoutez cette ligne
					$desgh = "Hospitalisation ".$type_hos; 
					$sqlf = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desgh', '$idp', '$datehosdt', '$mt1', '$mt_cnss1', '$etats', '$date_paix', '$codf')";
					$desghs = "Frais de chambre"; 
					$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desghs', '$idp', '$datehosdt', '$mt2', '$mt_cnss2', '$etats', '$date_paix', '$codf')";
			      	$mysqlif = new mysqli('localhost','root','','spn');
			      	$mysqlif->query($sqlf);
			      	$mysqlif->query($sqlf1);
					if (isset($mysqlif)) {
						redirect_to("Hosp_admission");
					}
				} else {
				    echo "Erreur: " . $sql . "<br>" . $con->error;
				}
			}elseif ($reqs['catp'] == "POA" || $reqs['catp'] == "POR" || $reqs['catp'] == "FPA" ||$reqs['catp'] == "FPR" || $reqs['catp'] == "CAS" || $reqs['catp'] == "AGE" || $reqs['catp'] == "FAE") {
				if ($type_hos == "Normal") {
			 		$mt1 = 0;
		 			$mt_cnss1 = 0;
			 	}elseif($type_hos == "REA"){
			 		$mt1 = 0;
			 		$mt_cnss1 = 1000;
			 	} 
			 	if ($chambre == 2) {
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 3){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 4){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 5){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 6){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}else{
			 		$mt2 = 0;
			 		$mt_cnss2 = 0;
			 	}

			 	$mt = $mt1 + $mt2;
			 	$mt_cnss = $mt_cnss1 + $mt_cnss2;	
				$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, type_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$type_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
				$mysqli = new mysqli('localhost','root','','spn');
				$mysqli->query($sql);
				if (isset($mysqli)) {
					echo "Reached here 2"; // Ajoutez cette ligne
					$desgh = "Hospitalisation ".$type_hos; 
					$sqlf = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desgh', '$idp', '$datehosdt', '$mt1', '$mt_cnss1', '$etattt', '$date_paix', '$codf')";
					$desghs = "Frais de chambre"; 
					$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desghs', '$idp', '$datehosdt', '$mt2', '$mt_cnss2', '$etattt', '$date_paix', '$codf')";
			      	$mysqlif = new mysqli('localhost','root','','spn');
			      	$mysqlif->query($sqlf);
			      	$mysqlif->query($sqlf1);
					if (isset($mysqlif)) {
						redirect_to("Hosp_admission");
					}
				} else {
				    echo "Erreur: " . $sql . "<br>" . $con->error;
				}
			}
		}if ($reqs['cnss'] == "NON") {
		echo "Reached here 3"; // Ajoutez cette ligne
			if ($reqs['catp'] == "CIV"){
				if ($type_hos == "Normal") {
			 		$mt1 = 0;
			 		$mt_cnss1 = 0;
			 	}elseif($type_hos == "REA"){
			 		$mt1 = 10000;
			 		$mt_cnss1 = 0;
			 	}
			 	if ($chambre == 1) {
			 		$mt2 = 5000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif ($chambre == 2) {
			 		$mt2 = 10000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 3){
			 		$mt2 = 15000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 4){
			 		$mt2 = 40000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 5){
			 		$mt2 = 4000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 6){
			 		$mt2 = 7000 * 3;
			 		$mt_cnss2 = 1000 * 3;
			 	}else{
			 		$mt2 = 0;
			 		$mt_cnss2 = 0;
			 	}
			 	$mt = $mt1 + $mt2;
			 	$mt_cnss = $mt_cnss1 + $mt_cnss2;	
				$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, type_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$type_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
				$mysqli = new mysqli('localhost','root','','spn');
				$mysqli->query($sql);
				if (isset($mysqli)) {
					echo "Reached here 2"; // Ajoutez cette ligne
					$desgh = "Hospitalisation ".$type_hos; 
					$sqlf = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desgh', '$idp', '$datehosdt', '$mt1', '$mt_cnss1', '$etats', '$date_paix', '$codf')";
					$desghs = "Frais de chambre"; 
					$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desghs', '$idp', '$datehosdt', '$mt2', '$mt_cnss2', '$etats', '$date_paix', '$codf')";
			      	$mysqlif = new mysqli('localhost','root','','spn');
			      	$mysqlif->query($sqlf);
			      	$mysqlif->query($sqlf1);
					if (isset($mysqlif)) {
						redirect_to("Hosp_admission");
					}
				} else {
				    echo "Erreur: " . $sql . "<br>" . $con->error;
				}
			}elseif ($reqs['catp'] == "POA" || $reqs['catp'] == "POR" || $reqs['catp'] == "FPA" ||$reqs['catp'] == "FPR" || $reqs['catp'] == "CAS" || $reqs['catp'] == "AGE" || $reqs['catp'] == "FAE") {
				if ($type_hos == "Normal") {
			 		$mt1 = 0;
			 		$mt_cnss1 = 0;
			 	}elseif($type_hos == "REA"){
			 		$mt1 = 0;
			 		$mt_cnss1 = 0;
			 	}
			 	if ($chambre == 2) {
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 3){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 4){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 5){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}elseif($chambre == 6){
			 		$mt2 = 0;
			 		$mt_cnss2 = 1000 * 3;
			 	}else{
			 		$mt2 = 0;
			 		$mt_cnss2 = 0;
			 	}
			 	$mt = $mt1 + $mt2;
			 	$mt_cnss = $mt_cnss1 + $mt_cnss2;	
				$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, type_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$type_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
				$mysqli = new mysqli('localhost','root','','spn');
				$mysqli->query($sql);
				if (isset($mysqli)) {
					echo "Reached here 2"; // Ajoutez cette ligne
					$desgh = "Hospitalisation ".$type_hos; 
					$sqlf = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desgh', '$idp', '$datehosdt', '$mt1', '$mt_cnss1', '$etattt', '$date_paix', '$codf')";
					$desghs = "Frais de chambre"; 
					$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, mt, mt_cnss, etat, date_paix, codf) VALUES ('', '$desghs', '$idp', '$datehosdt', '$mt2', '$mt_cnss2', '$etattt', '$date_paix', '$codf')";
			      	$mysqlif = new mysqli('localhost','root','','spn');
			      	$mysqlif->query($sqlf);
			      	$mysqlif->query($sqlf1);
					if (isset($mysqlif)) {
						redirect_to("Hosp_admission");
					}
				} else {
				    echo "Erreur: " . $sql . "<br>" . $con->error;
				}
			}
			
		}
 	}
} else {
	redirect_to("Hosp_admission");
	?>
		<?php 
}
?>