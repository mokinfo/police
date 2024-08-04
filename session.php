<?php
header('Content-Type: text/html; charset=utf-8');
require_once("includes/session.php");
$iddd = $_SESSION['iduser'];

$connd = new mysqli('localhost', 'root', '', 'spn');
$sqld = $connd->query("SELECT * FROM patient where idp = '$iddd'");
while($datad = $sqld->fetch_array()){
  echo $datad['nom']; 
 }
?>