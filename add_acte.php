<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("Classes/PHPExcel/IOFactory.php"); ?>
<?php
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
?>
<?php 
	if (isset($_POST['upload'])) {
		$inputfilename = $_FILES['file']['tmp_name'];
		$exceldata = array();
	}
	$con = mysqli_connect("localhost","root","","spn");
	if (!$con) {
		die("Connection echoué :". mysqli_connect_error());
	}
	try{
		$inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
		$objReader = PHPExcel_IOFactory::createReader($inputfiletype);
		$objPHPExcel = $objReader->load($inputfilename);
	}
	catch(Exception $e){
		die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$hightColumn = $sheet->getHighestColumn();

	for ($row=1; $row <= $highestRow; $row++) { 
	 	$rowData = $sheet->rangeToArray('A' . $row . ':' . $hightColumn . $row, NULL, TRUE, FALSE);
	 	$sql = "INSERT INTO acte (id, libelle, prix_struct, prix_cnss, prix_diff) VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."')";
	 	if(mysqli_query($con, $sql)){
	 		$exceldata[] = $rowData[0];
	 	}else{
	 		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	 	}
	}
	echo"<table>";
	echo"<tr>";
	echo"<b><td> ID </td><td> Libelle </td><td> Prix structure </td><td> CNSS </td><td> Différence </td></b>";
	foreach ($exceldata as $index => $excelraw) {
		echo"<tr>";
		foreach ($excelraw as $excelcolumn) {
			echo "<td>".$excelcolumn."</td>";
		}
	 	echo"<tr>";
	}
	echo"</table>";
	mysqli_close($con);
?>
<div id="xx">
	<a href="Hospitalisation" class="x">Hospitalisation</a>
</div>
<div class="logg">
	Cher <?php echo $_SESSION['user'];?>, Bienvenue | 
	<a href="logout.php"> Se deconnecter</a>
</div>

