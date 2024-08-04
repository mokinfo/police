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
if(isset($_POST['enreg'])){
	$ids = $_POST['ids'];
	$idp = $_POST['idp'];
	$idh = $_POST['idh'];
	$intitule = $_POST['intitule_suivie'];
	$date_suivie = $_POST['date_suivie'];
  	$datehosdt = date("Y-m-d G:i");

	
	$query = "INSERT INTO suivie (ids,intitule, date_suivie, idh) VALUES ('$ids','$intitule', '$date_suivie','$idh')";
	$query_run = mysqli_query($con, $query); 

	if ($query_run) {
		$user = $_SESSION['user'];
		$action = "Nouvelle suivie : ".$intitule;
		$querys = "INSERT INTO journal (id, user, action, datedc, datefc) VALUES ('','$user','$action','$datehosdt','$datehosdt')";
		$query_runs = mysqli_query($con, $querys);
		if ($query_runs) {
			$_SESSION['statut'] = "Le suivie est ajouté avec succès.";
			header("Location: Liste_Hospitalisation");
			exit(0);
			var_dump($_POST);
			//var_dump($_SESSION['user']);
		}else{
			$_SESSION['statut'] = "Le suivi n'est pas ajouté.";
			header("Location: Liste_Hospitalisation");
			exit(0);
		}
	}else{
		$_SESSION['statut'] = "L'acte n'est pas ajouté...";
		header("Location: Hospitalisation");
		exit(0);
	}
	
}
?>