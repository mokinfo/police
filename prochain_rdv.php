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
	$etat = "HOS";
	
	$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	if (isset($mysqli)) {
			redirect_to("Hospitalisation");
	} else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>