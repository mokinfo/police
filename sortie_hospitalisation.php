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
	$date_sor = $_POST['date_sor'];
	$pardr = $_POST['pardr'];
	$revoir = $_POST['revoir'];
	$cni = 0;
	$date_cni = $_POST['date_cni'];
	
	//$datedhos = date("d/m/Y");
	//$heurdhos = date("H:m:s");
	
	//$etat = "SOR";
	$sql = "INSERT INTO sortie_hos (ids, date_sor_hos, pardr, revoir, cni, date_deliv) VALUES ('$idh', '$date_sor', '$pardr', '$revoir', '$cni', '$date_cni')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	//$sql = "INSERT INTO hospitalisation (idh, idp, hospar, med_trai, date_hos, motif_hos, service, chambre, lit, tuteur, date_nai_garde, cdi, date_cdi, etat) VALUES ('$idh', '$idp', '$hospar', '$med_trai', '$date_hos', '$motif_hos', '$service', '$chambre', '$lit', '$tuteur', '$date_nai_garde', '$cdi', '$date_cdi', '$etat')";
	if (isset($mysqli)) {
		//$JIKO = mysqli_connect('localhost','root','','spn');
		//$cares = mysqli_query($JIKO, "UPDATE hospitalisation SET etat='$etat' where idh = '$idh'");
		//if (isset($cares)) {
			redirect_to("Hosp_admission");
		//}else {
	    //echo "Erreur: " . $cares . "<br>" . $con->error;
		//}
	}else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>