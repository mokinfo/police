<?php require_once("includes/session.php") ?>

<?php 
$user = $_SESSION['user'];
$datedc = date('D d/m/Y H:i:s', time());
$datefc = date('D d/m/Y H:i:s', time());
$mysqli = new mysqli('localhost', 'root', '', 'spn');
$sqls = "insert into journal(id, user, action, datefc) VALUES ('', '$user', 'Deconnexion', '$datefc')";
$mysqli->query($sqls);
function redirect_to($new_location){
	header("location: ". $new_location);
	exit;
}
  $_SESSION["user"] = null;

  redirect_to("Login");
?>
