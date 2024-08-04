<?php 
$con = mysqli_connect("localhost", "root", "", "spn");
if(!$con){
	echo "connection echoué". mysqli_connect_error();
}
?>