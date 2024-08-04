<?php
function redirect_to($new_location){
	header("location: ". $new_location);
	exit;
}
?>