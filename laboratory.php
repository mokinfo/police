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
if(!empty($_GET['id'])) {
	$idcare = $_GET['id'];
	$res = 3;
	$JIKO = mysqli_connect('localhost','root','','bormed');
	$cares = mysqli_query($JIKO, "UPDATE care SET res='$res' where idcare = '$idcare'");
	if (isset($cares)) {
		$pieces = $DB->query("SELECT * FROM care where idcare = '$idcare'");
		foreach ($pieces as $piece):
			$name = $piece->name;
			$address = $piece->address;
			$datej = $piece->datej;
			$pandoc = $piece->pandoc;
			$nature = "Payment of analyzes";
		endforeach;
		$factus = mysqli_query($JIKO, "INSERT into facture (idfacture, nomclient, adresseclient, dates, montant, nature) VALUES ('', '$name', '$address', '$datej', '$pandoc', '$nature')");
			if (isset($factus)) {
				redirect_to("Accueil");
			}
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>