<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "spn");
$cn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
	die("Connection à la base est echoué: " . mysqli_connect_errno() . " (" . mysqli_connect_errno() . " )");
}
?>