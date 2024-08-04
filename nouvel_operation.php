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
if (isset($_POST['hikolo'])) {
	//var_dump($_POST);
	$ido = $_POST['ido'];
	$idp = $_POST['idp'];
	$tox = $_POST['too'];
	$opx = $_POST['opp'];
	//$assist = $_POST['assist'];
	$anes = "Dr Kamil Ahmed Kamil";
	//$mode_anes = $_POST['mode_anes'];
	if ($_POST['mode_anes'] == "10B") {
		$mode_anes = "AG (anesthésie générale avec intubation)";
	}elseif($_POST['mode_anes'] == "10C"){
		$mode_anes = "AR (anesthésie régionale ou locorégionale)";
	}elseif($_POST['mode_anes'] == "10D"){
		$mode_anes = "AS (anesthésie par sédation sans intubation)";
	}elseif($_POST['mode_anes'] == "10E"){
		$mode_anes = "AL (anesthésie locale)";
	}elseif($_POST['mode_anes'] == "SANS"){
		$mode_anes = "Sans anesthésie";
	}
	//$indic = $_POST['indic'];
	
	//$dated = $_POST['dated'];
	//$datef = $_POST['datef'];
	//$statuts = $_POST['statu'];
	//$mode_ann = $_POST['mode_ann'];
	$datenrop = date("d/m/Y");
	$datehosdt = date("Y-m-d G:i");
	$paix = "ESP";
	$etat = "IMPAYER";

	$sql = "INSERT INTO operation (ido, idp, too, opp, anes, mode_anes, datenrop) VALUES ('$ido', '$idp', '$tox', '$opx', '$anes', '$mode_anes', '$datenrop')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	if (isset($mysqli)) {
		$mysqlif = new mysqli('localhost','root','','spn');
	    $mysqlika = new mysqli('localhost','root','','spn');
	    //echo "TOX est :".$tox;
		$ksf = $mysqlika->query("SELECT * FROM acte WHERE id = '$tox'");
		while($kasf = $ksf->fetch_array()){
	        // Récupérer les détails de l'acte
	        $libelleActe = $kasf['libelle'];
	        $prixStructActe = $kasf['prix_struct'];
	        $prixCnssActe = $kasf['prix_cnss'];
	        $prixDiffActe = $kasf['prix_diff'];
	        //echo "Prix acquis !";
	        //$sqlk = "SELECT * from patient WHERE idp = '$idp'";
			$mysqlik = new mysqli('localhost','root','','spn');
			$ps = $mysqlik->query("SELECT * from patient WHERE idp = '$idp'");
			while($pas = $ps->fetch_array()){ 
				if ($pas['cnss'] == 'OUI' and ($pas['catp'] == 'CIV' or $pas['catp'] == 'MIL' or $pas['catp'] == 'GEN' or $pas['catp'] == 'GAR' or $pas['catp'] == 'GAC')) {
					$mt = $prixDiffActe;
					$mt_cnss = $prixCnssActe;
					$pp103 = 1500; $pc103 = 10000;
					$pp104 = 1500; $pc104 = 10000;
					$pp105 = 1500; $pc105 = 10000;
					$pp106 = 1500; $pc106 = 10000;					//echo $mt;
					//echo "Patient identifié ! montant :".$mt;
				}elseif($pas['cnss'] == 'OUI' and ($pas['catp'] == 'POA' or $pas['catp'] == 'POR' or $pas['catp'] == 'FPA' or $pas['catp'] == 'FPR')){
					$mt = 0;
					$mt_cnss = $prixCnssActe;
					$pp103 = 0; $pc103 = 10000;
					$pp104 = 0; $pc104 = 10000;
					$pp105 = 0; $pc105 = 10000;
					$pp106 = 0; $pc106 = 10000;
					//echo $mt;
					//echo "Patient identifié ! montant :".$mt;
				}elseif ($pas['cnss'] == 'NON' and ($pas['catp'] == 'CIV' or $pas['catp'] == 'MIL' or $pas['catp'] == 'GEN' or $pas['catp'] == 'GAR' or $pas['catp'] == 'GAC')) {
					$mt = $prixStructActe;
					$mt_cnss = 0;
					$pp103 = 1500; $pc103 = 10000;
					$pp104 = 1500; $pc104 = 10000;
					$pp105 = 1500; $pc105 = 10000;
					$pp106 = 1500; $pc106 = 10000;
					//echo $mt;
					//echo "Patient identifié ! montant :".$mt;
				}elseif($pas['cnss'] == 'NON' and ($pas['catp'] == 'POA' or $pas['catp'] == 'POR' or $pas['catp'] == 'FPA' or $pas['catp'] == 'FPR')){
					$mt = 0;
					$mt_cnss = 0;
					$pp103 = 0; $pc103 = 10000;
					$pp104 = 0; $pc104 = 10000;
					$pp105 = 0; $pc105 = 10000;
					$pp106 = 0; $pc106 = 10000;
					//echo $mt;
					//echo "Patient identifié ! montant :".$mt;
				};
			}
	        $requeteInsertFacture = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','$libelleActe', $idp, '$datehosdt', '$paix', '$mt', '$mt_cnss', '$etat')";
			$mysqlil = new mysqli('localhost','root','','spn');
			$mysqlil->query($requeteInsertFacture);
			if (isset($mysqlil)) {
				echo "L'acte est enregistré dans la Facture !";
				//redirect_to("Bloc_admission");
			}else {
		    	echo "L'acte n'est pas enregistrer dans la Facture !: " . $sql . "<br>" . $mysqlif->error;
			}
			/*
	        // Récupérer l'ID de la facture insérée
	        $idFacture = mysqli_insert_id($connexion);

	        // Insérer également les détails de l'acte dans la table 'caisse'
	        $requeteInsertCaisse = "INSERT INTO caisse (idf, idpatient, montant, date_operation) VALUES ($idFacture, $idpatient, $prixDiffActe, NOW())";
	        mysqli_query($connexion, $requeteInsertCaisse);*/
	    }
		/*if($_POST['mode_anes'] =='10B'){ $pp103 = 10000; $pc103 = 10000; $sqlf103 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AG (anesthésie générale avec intubation)','$idp','$datehosdt','$paix','$pp103','$pc103','$etat')"; $mysqlif->query($sqlf103);}
		elseif($_POST['mode_anes'] =='10C'){ //echo "anesthésie inserer dans la facture";
		 $pp104 = 10000; $pc104 = 10000; $sqlf104 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AR (anesthésie régionale ou locorégionale)','$idp','$datehosdt','$paix','$pp104','$pc104','$etat')"; $mysqlif->query($sqlf104);}
		elseif($_POST['mode_anes'] =='10D'){ //echo "anesthésie inserer dans la facture";
		 $pp105 = 10000; $pc105 = 10000; $sqlf105 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AS (anesthésie par sédation sans intubation)','$idp','$datehosdt','$paix','$pp105','$pc105','$etat')"; $mysqlif->query($sqlf105);}
		elseif($_POST['mode_anes'] =='10E'){ //echo "anesthésie inserer dans la facture";
		 $pp106 = 10000; $pc106 = 10000; $sqlf106 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AL (anesthésie locale)','$idp','$datehosdt','$paix','$pp106','$pc106','$etat')"; $mysqlif->query($sqlf106);}
		elseif($_POST['mode_anes'] =='SANS'){ //echo "anesthésie inserer dans la facture";
		 $pp106 = 0; $pc106 = 0; }*/
		if($_POST['mode_anes'] =='10B'){$sqlf103 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AG (anesthésie générale avec intubation)','$idp','$datehosdt','$paix','$pp103','$pc103','$etat')"; $mysqlif->query($sqlf103);}
		elseif($_POST['mode_anes'] =='10C'){ //echo "anesthésie inserer dans la facture";
		 $sqlf104 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AR (anesthésie régionale ou locorégionale)','$idp','$datehosdt','$paix','$pp104','$pc104','$etat')"; $mysqlif->query($sqlf104);}
		elseif($_POST['mode_anes'] =='10D'){ //echo "anesthésie inserer dans la facture";
		 $sqlf105 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AS (anesthésie par sédation sans intubation)','$idp','$datehosdt','$paix','$pp105','$pc105','$etat')"; $mysqlif->query($sqlf105);}
		elseif($_POST['mode_anes'] =='10E'){ //echo "anesthésie inserer dans la facture";
		 $sqlf106 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat) VALUES ('','AL (anesthésie locale)','$idp','$datehosdt','$paix','$pp106','$pc106','$etat')"; $mysqlif->query($sqlf106);}
		elseif($_POST['mode_anes'] =='SANS'){ //echo "anesthésie inserer dans la facture";
		 $pp106 = 0; $pc106 = 0; }

		if (isset($mysqlif)) {
			//echo "renvoie vers admission bloc";
			redirect_to("Bloc_admission");
		}else {
	    	echo "Erreur: " . $sql . "<br>" . $mysqlif->error;
		}
	} else {
	    echo "Erreur: " . $sql . "<br>" . $mysqli->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>