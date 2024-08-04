<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();
require_once("includes/db_connection.php"); 
require_once("includes/functions.php"); 

if(!isset($_SESSION['user'])){
    redirect_to("Login");
}

if (isset($_POST['enreg'])) {
	$idexam = $_POST['idexam'];
	$idan = $_POST['idpexam'];
	$identexam = $_POST['identexam'];
	$motiff = $_POST['motiff'];
	$datexam = date("d/m/Y");
	$heurq = date("G") + 2;
	$heurdexam = date("$heurq:i:s");
	
	$radiolo = "";
	$echogr = "";
	$ecg = "";
	$codf = 0;
	$date_paix = "";
	$etat_cnss = "";

	//Chimie

	if(!empty($_POST['radio'])){$radiolo = 1; $pp1 = 1500; $pc1 = 1000  ; }else{$pp1 = 0; $pc1 = 0; $radiolo = 0; }
	if(!empty($_POST['echo'])){$echogr = 1; $pp2 = 5000; $pc2 = 4000  ; }else{$pp2 = 0; $pc2 = 0; $echogr = 0; }
	if(!empty($_POST['ecg'])){$ecg = 1; $pp3 = 1500   ; $pc3 = 500  ; }else{$pp3 = 0; $pc3 = 0; $ecg = 0; }


	$pandoc =  $pp1 + $pp2 + $pp3;
	$pcandoc =  $pc1 + $pc2 + $pc3;
	$chk = "NON";
	$paix = "ESP";
	$etat = "IMPAYER";
	$datehosdt = date("Y-m-d G:i");

	$sql = "INSERT INTO radiolo(idexam,idan,identexam,heurdexam,datexam,motif,radiox,echo,ecg,pandoc,pcandoc,chk) VALUES ('$idexam', '$idan', '$identexam', '$heurdexam', '$datehosdt', '$motiff', '$radiolo','$echogr','$ecg','$pandoc','$pcandoc','$chk')";
	$mysqli = new mysqli('localhost','root','','spn');
	$mysqli->query($sql);
	if (isset($mysqli)) {
		$mysqlif = new mysqli('localhost','root','','spn');
		
		if(!empty($_POST['radio'])){$radiolo = $_POST['radio'];$pp1 =500; $pc1 =1000;$sqlf1 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, etat_cnss, date_paix, codf) VALUES ('', 'Radiologie', '$idan', '$datehosdt', '$paix','$pp1', '$pc1','$etat', '$etat_cnss', '$date_paix', '$codf')";$mysqlif->query($sqlf1 );}else{$pp1 = 0;; $pc1 = 0; $radiolo = 0; }
		if(!empty($_POST['echo'])){$echogr = $_POST['echo'];$pp2 =1000; $pc2 =4000;$sqlf2 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, etat_cnss, date_paix, codf) VALUES ('', 'Echographie ', '$idan', '$datehosdt', '$paix','$pp2', '$pc2','$etat', '$etat_cnss', '$date_paix', '$codf')";$mysqlif->query($sqlf2 ); }else{$pp2 = 0;; $pc2 = 0; $echogr = 0; }
		if(!empty($_POST['ecg'])){$ecg = $_POST['ecg'];$pp3 =1500; $pc3 =500;$sqlf3 = "INSERT INTO facture (idf, desg, idp, datef, type_paix, mt, mt_cnss, etat, etat_cnss, date_paix, codf) VALUES ('', 'ECG', '$idan', '$datehosdt', '$paix','$pp3', '$pc3','$etat', '$etat_cnss', '$date_paix', '$codf')";$mysqlif->query($sqlf3 ); }else{$pp3 = 0;; $pc3 = 0; $ecg = 0; }
		if (isset($mysqlif)) {
			redirect_to("Consultation?id=$identexam");
		}else {
	    echo "Erreur: " . $sql . "<br>" . $mysqlif->error;
		}
		//var_dump($_POST['mok']);
			
	} else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
} else {
	//redirect_to("nouveau.php");
	?>
		<?php 
}
?>