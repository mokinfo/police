<?php
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("Accueil");
} 
$con = mysqli_connect('localhost', 'root', '', 'spn');
if(isset($_POST['save_multiple_data'])){
	$ida = $_POST['ida'];
	$idp = $_POST['idp'];
	$idh = $_POST['idh'];
	$intitule = $_POST['intitule'];
	$date_acte = $_POST['date_acte'];
	$ddj = date("d/m/Y");
  	$datehosdt = date("Y-m-d G:i");
  	$etats = "IMPAYER";
  	$typ = "ESPECE";
  	$service = "Hospitalisation";
  	$etat_cnss = "";
  	$etat_cnss = "";
  	$codf = 0;
  	$date_paix = 0;


	foreach ($intitule as $index => $noms) {
		//echo $noms." : ".$date_acte[$index]." : ".$nbrj[$index]."  ";

        $s_intitule = $noms;
		$s_date_acte = $date_acte[$index];
		$s_idp = $idp[$index];
		$s_idh = $idh[$index];
		$d = 0;
		$d1 = 0;
        $d2 = 0;
        $desgg = $s_intitule;

        // Récupérer la valeur de cnss du patient
        $stmt_cnss = $con->prepare("SELECT cnss FROM patient WHERE idp = ?");
        $stmt_cnss->bind_param("i", $s_idp);
        $stmt_cnss->execute();
        $stmt_cnss->bind_result($cnss);
        $stmt_cnss->fetch();
        $stmt_cnss->close();

        // Récupérer les prix de l'acte
        $stmt_prix = $con->prepare("SELECT prix_struct, prix_cnss, prix_diff FROM acte WHERE libelle = ?");
        $stmt_prix->bind_param("s", $s_intitule);
        $stmt_prix->execute();
        $stmt_prix->bind_result($prix_struct, $prix_cnss, $prix_diff);
        $stmt_prix->fetch();
        $stmt_prix->close();

        if ($cnss == "OUI") {
            $d1 = $prix_diff;
            $d2 = $prix_cnss;
        } else {
            $d1 = $prix_struct;
            $d2 = 0;
        }

        // Préparer la requête pour insérer dans actes
        $query = "INSERT INTO actes (intitule, prix_struct, rem_cnss, prix_ticket, date_acte, idh) VALUES ('$s_intitule','$d', '$d','$d','$s_date_acte','$s_idh')";
		$query_run = mysqli_query($con, $query); 

        if ($query_run) {
            // Préparer la requête pour insérer dans facture
            $querysx = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, etat_cnss, date_paix, service, codf) VALUES ('', '$desgg', '$idp', '$datehosdt', '$typ', '$d1', '$d2', '$etats', '$etat_cnss', '$date_paix', '$service', '$codf')";
			$query_runsx = mysqli_query($con, $querysx);
        }	
	}
	/*foreach ($intitules as $indexs => $nomss) {
		$s_intitules = $nomss;
		$querys = "SELECT * FROM actes where intitule = '$s_intitules')";*/

	var_dump($intitule[0]);

	if ($query_run) {
		$user = $_SESSION['user'];
		$querys = "INSERT INTO journal (id, user, action, datedc, datefc) VALUES ('$ida','$user','$ida','$ddj','')";
		$query_runs = mysqli_query($con, $querys);
		if ($query_runs) {
			$_SESSION['statut'] = "L'acte est ajouté avec succès.";
			//header("Location: convert_acte.php");
			exit(0);
			//var_dump($_POST);
			//var_dump($_SESSION['user']);
		}else{
			$_SESSION['statut'] = "L'acte n'est pas ajouté.";
			//header("Location: convert_acte.php");
			exit(0);
		}
	}else{
		$_SESSION['statut'] = "L'acte n'est pas ajouté...";
		//header("Location: Hospitalisation");
		exit(0);
	}
	
}
?>
<?php /*
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();
require_once("includes/db_connection.php");
require_once("includes/functions.php");

if (!isset($_SESSION['user'])) {
    redirect_to("Accueil");
}

$con = new mysqli('localhost', 'root', '', 'spn');
if ($con->connect_error) {
    die("Échec de la connexion : " . $con->connect_error);
}

if (isset($_POST['save_multiple_data'])) {
    $ida = $_POST['ida'];
    $idp = $_POST['idp'];
    $idh = $_POST['idh'];
    $intitule = $_POST['intitule'];
    $date_acte = $_POST['date_acte'];
    $ddj = date("d/m/Y");
    $datehosdt = date("Y-m-d G:i");
    $etats = "IMPAYER";
    $typ = "ESPECE";
    $service = "Hospitalisation";
    $codf = 0;
    $date_paix = 0;


    foreach ($intitule as $index => $noms) {
        $s_intitule = $con->real_escape_string($noms);
        $s_date_acte = $con->real_escape_string($date_acte[$index]);
        $s_idp = $con->real_escape_string($idp[$index]);
        $s_idh = $con->real_escape_string($idh[$index]);
        $d1 = 0;
        $d2 = 0;

        // Récupérer la valeur de cnss du patient
        $stmt_cnss = $con->prepare("SELECT cnss FROM patient WHERE idp = ?");
        $stmt_cnss->bind_param("i", $s_idp);
        $stmt_cnss->execute();
        $stmt_cnss->bind_result($cnss);
        $stmt_cnss->fetch();
        $stmt_cnss->close();

        // Récupérer les prix de l'acte
        $stmt_prix = $con->prepare("SELECT prix_struct, prix_cnss, prix_diff FROM acte WHERE libelle = ?");
        $stmt_prix->bind_param("s", $s_intitule);
        $stmt_prix->execute();
        $stmt_prix->bind_result($prix_struct, $prix_cnss, $prix_diff);
        $stmt_prix->fetch();
        $stmt_prix->close();

        if ($cnss == "OUI") {
            $d1 = $prix_diff;
            $d2 = $prix_cnss;
        } else {
            $d1 = $prix_struct;
            $d2 = 0;
        }

        // Préparer la requête pour insérer dans actes
        $stmt_actes = $con->prepare("INSERT INTO actes (intitule, prix_struct, rem_cnss, prix_ticket, date_acte, idh) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_actes->bind_param("sddssi", $s_intitule, $prix_struct, $prix_cnss, $prix_diff, $s_date_acte, $s_idh);
        $query_run = $stmt_actes->execute();
        $stmt_actes->close();

        if ($query_run) {
            // Préparer la requête pour insérer dans facture
            $stmt_facture = $con->prepare("INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, etat_cnss, date_paix, service, codf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt_facture->bind_param("isissdsssisi", $idf = null, $s_intitule, $s_idp, $datehosdt, $typ, $d1, $d2, $etats, $etat_cnss, $date_paix, $service, $codf);
            $query_runsx = $stmt_facture->execute();
            $stmt_facture->close();
        }


        if ($query_run) {
        $user = $_SESSION['user'];
        // Préparer la requête pour insérer dans journal
        $stmt_journal = $con->prepare("INSERT INTO journal (id, user, action, datedc, datefc) VALUES (?, ?, ?, ?, ?)");
        $stmt_journal->bind_param("issss", $ida, $user, $ida, $ddj, $datefc = '');
        $query_runs = $stmt_journal->execute();
        $stmt_journal->close();

	        if ($query_runs) {
	            $_SESSION['statut'] = "L'acte est ajouté avec succès.";
	            //header("Location: convert_acte.php");
	            exit(0);
	        } else {
	            $_SESSION['statut'] = "L'acte n'est pas ajouté.";
	            //header("Location: convert_acte.php");
	            exit(0);
	        }
	    } else {
	        $_SESSION['statut'] = "L'acte n'est pas ajouté...";
	        //header("Location: Hospitalisation");
	        exit(0);
	    }
	}
}

$con->close();
*/ ?>