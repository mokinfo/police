<?php 
session_start();
function mes(){
	if (isset($_SESSION["mes"])) {
		$output = "<div class=\"mes\">";
		$output .= htmlentities($_SESSION["mes"]);
		$output .= "</div>";

		$_SESSION["mes"] = null;
		return $output;
	}
}
function errors(){
	if (isset($_SESSION["errors"])) {
		$errors = $_SESSION["errors"];
		$_SESSION["errors"] = null;
		return $errors;
	}
}
?>