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
	$idord = $_POST['idord'];
	$idp = $_POST['idpo'];
	$idpc = $_POST['idpc'];
	$medic = $_POST['medic'];
	$poso = $_POST['poso'];
	$nbrj = $_POST['nbrj'];
	$datedujourn = $_POST['datedujours'];
	$ddj = date("d/m/Y");

	foreach ($medic as $index => $noms) {
		//echo $noms." : ".$poso[$index]." : ".$nbrj[$index]."  ";

		$s_medic = $noms;
		$s_poso = $poso[$index];
		$s_nbrj = $nbrj[$index];
		$s_idp = $idp[$index];
		$s_idpc = $idpc[$index];
		$s_idord = $idord;
		$datedujour = $datedujourn[$index];

		$query = "INSERT INTO ordonnance (medic,poso,nbrjr,idp,idpc,idord,datord) VALUES ('$s_medic','$s_poso','$s_nbrj','$s_idp','$s_idpc','$s_idord','$datedujour')";
		$query_run = mysqli_query($con, $query); 
	}
	if ($query_run) {
		$querys = "INSERT INTO prescription (id, idp, idpc, datord) VALUES ('$idord','$s_idp','$s_idpc','$ddj')";
		$query_runs = mysqli_query($con, $querys);
		if ($query_runs) {
			$_SESSION['statut'] = "Ordonnance ajouté avec succès.";
			header("Location: Affiche_ordonnance?id=$idord");
			exit(0);
		}else{
			$_SESSION['statut'] = "Ordonnance n'est pas ajouté.";
			header("Location: Affiche_Consultation");
			exit(0);
		}
	}else{
		$_SESSION['statut'] = "Ordonnance n'est pas ajouté...";
		header("Location: Affiche_Consultation");
		exit(0);
	}
	
}
?>