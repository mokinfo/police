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
	$ids = $_GET['id'];
}else{
	redirect_to("home.php");
}
require('fpdf17/fpdf.php');
require('fpdf17/font/helveticai.php');
 
$user = $_SESSION['user'];
/*$datedc = date('D m/d/Y H:i:s', time());
$datefc = date('D m/d/Y H:i:s', time());
$journ = new mysqli('localhost','root','','bormed');
$sqljour = "insert into connection (id, user, action, datedc) VALUES ('', '$user', 'Imprimer une facture', '$datedc')";
$journ->query($sqljour);*/
$mysqli = mysqli_connect('localhost', 'root', '', 'spn');
//Select the Products you want to show in your PDF file
$fact = mysqli_query($mysqli, "SELECT entre.ident, entre.num, entre.motif, entre.num_medecin, entre.nom_medecin, entre.heura, entre.heurf, entre.codepatient, patient.idp, patient.nom, patient.daten FROM patient, entre where entre.codepatient = patient.idp end entre.ident = '$ids'");
/*$com = mysqli_query($mysqli, "Select * from bondecommande where numfacture = '$ids'");
$number_of_products = mysqli_num_rows($com);*/

//Initialize the 3 columns and the montant
$ident = "";
$nom = "";
$daten = "";
$heura = "";
$num = 0;



//For each row, add the field to the corresponding column
$rowfact = mysqli_fetch_array($fact);
mysqli_free_result($fact);



$ident = $rowfact["ident"];
$nom = substr($rowfact["name"],0,20);
$daten = $rowfact["datej"];
$heura = $rowfact["heura"];
$num = $rowfact["num"];


$ident = $ident."\n";
$nom = $nom."\n";
$daten = $daten."\n";
$heura = $heura."\n";
$num = $num."\n";


//Sum all the Prices (montant)

$pdf = new FPDF('P','mm','A5');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B',15);
$image = "medpresc.jpg";
$pdf-> Image('image/'.$image,10,12,128,151);
$pdf->Cell(189	,5,'',0,1);
$pdf->Cell(189	,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(6  ,5,'ID : ',0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(10  ,5,$ident,0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(18  ,5,'PT Name : ',0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(55  ,5,$nom,0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(9  ,5,'Age : ',0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(17  ,5,$daten ."years",0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(10  ,5,'Sex : ',0,0);
if ($sex = 1) {
    $sex = "M";
}else{
    $sex = "F";
}
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(20  ,5,$heura,0,0);
$pdf->Cell(189  ,5,'',0,1);

$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', 'B',10);


$pdf->Cell(189  ,5,'',0,1);

$pdf->SetFont('Arial', '',10);

$pdf->SetFont('Arial', '',13);

if (!empty($p1)) {$pdf->Cell(20  ,5,$p1,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p2)) {$pdf->Cell(20  ,5,$p2,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p3)) {$pdf->Cell(20  ,5,$p3,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p4)) {$pdf->Cell(20  ,5,$p4,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p5)) {$pdf->Cell(20  ,5,$p5,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p6)) {$pdf->Cell(20  ,5,$p6,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p7)) {$pdf->Cell(20  ,5,$p7,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p8)) {$pdf->Cell(20  ,5,$p8,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p9)) {$pdf->Cell(20  ,5,$p9,0,1);}
$pdf->Cell(189  ,5,'',0,1);
if (!empty($p10)) {$pdf->Cell(20  ,5,$p10,0,1);}



$pdf->Ln();
$pdf->Line(10,184,138,184);
$pdf->SetFont('Arial', '',12);
$pdf->SetXY(5, 184);
$pdf->Cell(5,5,"",0,0);
$pdf->Cell(80,5,"Dr. Sign : Buhane",0,0);
$pdf->Cell(15,5,"Date : ",0,0);
$pdf->Cell(39,5,$daten,0,0);
$pdf->Output();

?>