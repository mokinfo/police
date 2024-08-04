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
	redirect_to("Accueil");
}
/*if (isset($_POST['enreg'])) {
	$idan = $_POST['idan'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$p5 = $_POST['p5'];
	$p6 = $_POST['p6'];
	$p7 = $_POST['p7'];
	$p8 = $_POST['p8'];
	$p9 = $_POST['p9'];
	$p10 = $_POST['p10'];
	$res = 5;
	$JIKO = mysqli_connect('localhost','root','','bormed');
	$cares = mysqli_query($JIKO, "UPDATE care SET res = '$res', p1 = '$p1', p2 = '$p2', p3 = '$p3', p4 = '$p4', p5 = '$p5', p6 = '$p6', p7 = '$p7', p8 = '$p8', p9 = '$p9', p10 = '$p10' where ide = '$idan'");
} else {
    echo "Erreur: " . $sql . "<br>" . $con->error;
} */
require('fpdf17/fpdf.php');
require('fpdf17/font/helveticai.php');

$mysqli = mysqli_connect('localhost','root','','spn');
//Select the Products you want to show in your PDF file
$fact = mysqli_query($mysqli, "SELECT operation.ido ,operation.idp ,operation.too, operation.opp, operation.assist, operation.anes, operation.mode_anes, operation.indic, operation.datedop, operation.heurdop, operation.heurfop, operation.datef, operation.statu, operation.mode_ann,  operation.trans_sang, operation.posi_pat, operation.loo, operation.goo, operation.eff, operation.note, patient.nom, patient.civi, patient.sex, patient.age FROM patient, operation where patient.idp = operation.idp and operation.ido = '$ids'");
/*$com = mysqli_query($mysqli, "Select * from bondecommande where numfacture = '$ids'");
$number_of_products = mysqli_num_rows($com);*/

//Initialize the 3 columns and the montant




//For each row, add the field to the corresponding column
$rowfact = mysqli_fetch_array($fact);
mysqli_free_result($fact);

$oper = $rowfact['opp'];
$anes = $rowfact['anes'];



//Sum all the Prices (montant)

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('times', 'B',11);
$pdf->Cell(120  ,5,"       MINISTERE DE L'INTERIEUR",0,0);
$pdf->Cell(90  ,5,"         REPUBLIQUE DE DJIBOUTI",0,1);
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"          ****************************",0,1);
$pdf->SetFont('times', 'B',11);
$pdf->Cell(120  ,5,"               POLICE NATIONALE",0,0);
$pdf->SetFont('times', '',9);
$pdf->Cell(90  ,5,"                            Unite * Egalite * paix",0,1);
$pdf->SetFont('times', '',10);
$pdf->Cell(90  ,5,"                     *****************",0,1);
$pdf->SetFont('times', 'B',11);
$pdf->Cell(120  ,5,"               SERVICE DE SANTE",0,0);
$image = "polices.png";
$pdf-> Image($image,85,10,40,48);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Line(15,57,195,57);
$pdf->SetFont('Arial', 'B',18);
$pdf->Cell(189  ,5,"Compte-rendu operatoire ",0,1,'C');
$pdf->Cell(189  ,5,'',0,1);

$pdf->Line(15,68,195,68);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', 'B',14);
$pdf->Cell(100  ,5,'Patient',0,0);
$pdf->Cell(20  ,5,utf8_decode('Opérateur'),0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Nom et prenom : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['civi'] ." ". $rowfact['nom'],0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Nom et prenom : ',0,0);
$pdf->SetFont('Arial', '',10);

$pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
foreach ($pieces as $piece):
$pdf->Cell(70  ,5,$piece->nom,0,1);
endforeach;


//$pdf->Cell(70  ,5,$rowfact['opp'],0,1);
//$pdf->Cell(70  ,5,$piece->nom,0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,utf8_decode('Agé(e) de : '),0,0);
/*if ($sex == "1") {
    $sex = "Male";
}else{
    $sex = "Female";
}*/
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['age'],0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,utf8_decode('Spécialite : '),0,0);
$pdf->SetFont('Arial', '',10);

$pieces = $DB->query("SELECT * FROM medecin where idmed = '$oper'");
foreach ($pieces as $piece):
$pdf->Cell(70  ,5,$piece->tel,0,1);
endforeach;

//information generale

$pdf->Line(15,68,195,68);
$pdf->Cell(189  ,5,'',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', 'B',14);
$pdf->Cell(100  ,5,utf8_decode('Information générale'),0,0);
$pdf->Cell(20  ,5,'Anesthesie',0,1);
$pdf->Cell(189  ,5,'',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Intervention : ',0,0);
$pdf->SetFont('Arial', '',10);

$too = "";

if($rowfact['too'] =="10F"){ $too ="RM (réanimation d’indication médicale)";}
if($rowfact['too'] =="10G"){ $too ="RC (réanimation d’indication chirurgicale)";}
if($rowfact['too'] =="13D"){ $too ="Césarienne sous AG";}
if($rowfact['too'] =="13E"){ $too ="Césarienne sous Anesthésie loco-regionale";}
if($rowfact['too'] =="13F"){ $too ="Hystérectomie voie basse";}
if($rowfact['too'] =="13G"){ $too ="Hystérectomie voie haute";}
if($rowfact['too'] =="C10K1"){ $too ="Ténotomie";}
if($rowfact['too'] =="C10K2"){ $too ="Suture";}
if($rowfact['too'] =="C11B1"){ $too ="Biopsie rénale";}
if($rowfact['too'] =="C11B10"){ $too ="Pyélostomie";}
if($rowfact['too'] =="C11B2"){ $too ="Ponction ou Drainage d’une collection rénale ou péri-néphrétique";}
if($rowfact['too'] =="C11B4"){ $too ="Néphropexie";}
if($rowfact['too'] =="C11B5"){ $too ="Néphrostomie";}
if($rowfact['too'] =="C11B6"){ $too ="Néphrectomie partielle";}
if($rowfact['too'] =="C11B9"){ $too ="Néphrectomie totale pour cancer";}
if($rowfact['too'] =="C11C7"){ $too ="Chirurgie du reflux vésico-urétérale";}
if($rowfact['too'] =="C11D1"){ $too ="Cystostomie sus pubienne";}
if($rowfact['too'] =="C11D2"){ $too ="Cystectomie partielle ou totale";}
if($rowfact['too'] =="C11D3"){ $too ="Chirurgie de la lithiase vésicale";}
if($rowfact['too'] =="C11E1"){ $too ="Circoncision";}
if($rowfact['too'] =="C11E10"){ $too ="Urétrotomie interne ou externe";}
if($rowfact['too'] =="C11E11"){ $too ="Urétroplastie";}
if($rowfact['too'] =="C11E12"){ $too ="Abcès, Phlegmon et Suppurations urétrales";}
if($rowfact['too'] =="C11E2"){ $too ="Phimosis et paraphimosis";}
if($rowfact['too'] =="C11E3"){ $too ="Hypospadias";}
if($rowfact['too'] =="C11E4"){ $too ="Epispadias";}
if($rowfact['too'] =="C11E8"){ $too ="Méatotomie et Méatostomie";}
if($rowfact['too'] =="C11E9"){ $too ="Dilatation urétrale au beniquet";}
if($rowfact['too'] =="C11F1"){ $too ="Ponction biopsie de la prostate";}
if($rowfact['too'] =="C11F2"){ $too ="Prostatectomie pour cancer";}
if($rowfact['too'] =="C11F3"){ $too ="Incision d'un abcès de la prostate par voie périnéale";}
if($rowfact['too'] =="C11G1"){ $too ="Biopsie testiculaire";}
if($rowfact['too'] =="C11G4"){ $too ="Cure d’hydrocèle";}
if($rowfact['too'] =="C11G5"){ $too ="Orchidectomie unilatérale ou castration";}
if($rowfact['too'] =="C11G6"){ $too ="Orchidopexie";}
if($rowfact['too'] =="C1B1"){ $too ="Ponction péricardique";}
if($rowfact['too'] =="C1C2"){ $too ="Injection intra-artérielle";}
if($rowfact['too'] =="C1C3"){ $too ="Abord vasculaire pour dialyse";}
if($rowfact['too'] =="C1C4"){ $too ="Suture et/ou ligature";}
if($rowfact['too'] =="C1C5"){ $too ="Dénudation veineuse";}
if($rowfact['too'] =="C1C6"){ $too ="Chirurgie des anévrysmes artériels";}
if($rowfact['too'] =="C1C7"){ $too ="Chirurgie de la maladie thromboembolique veineuse et artérielle";}
if($rowfact['too'] =="C2B4"){ $too ="Gastrostomie d’alimentation";}
if($rowfact['too'] =="C2B5"){ $too ="Gastro-Entero-Anastomose";}
if($rowfact['too'] =="C2C4"){ $too ="Chirurgie du diverticule de Meckel";}
if($rowfact['too'] =="C2C5"){ $too ="Résection iléo-jéjunale";}
if($rowfact['too'] =="C2D1"){ $too ="Appendicectomie simple par Laparotomie";}
if($rowfact['too'] =="C2D2"){ $too ="Appendicectomie simple par Laparoscopie";}
if($rowfact['too'] =="C2D3"){ $too ="Colostomie de décharge ou de dérivation";}
if($rowfact['too'] =="C2D8"){ $too ="Rétablissement de la continuité colique";}
if($rowfact['too'] =="C2E1"){ $too ="Chirurgie des hémorroïdes";}
if($rowfact['too'] =="C2E2"){ $too ="Chirurgie de la fissure anale";}
if($rowfact['too'] =="C2E4"){ $too ="Chirurgie des suppurations ano-périnéales chroniques";}
if($rowfact['too'] =="C2F11"){ $too ="Chirurgie des Voies Biliaires hors lithiase";}
if($rowfact['too'] =="C2F3"){ $too ="Drainage d’un abcès du foie";}
if($rowfact['too'] =="C2F8"){ $too ="Cholécystectomie par laparotomie";}
if($rowfact['too'] =="C2F9"){ $too ="Cholécystectomie par laparoscopie";}
if($rowfact['too'] =="C2H1"){ $too ="Chirurgie des hernies de l’aine, de l’ombilic, de la ligne blanche et éventrations";}
if($rowfact['too'] =="C2H3"){ $too ="Traitement chirurgical des collections liquidiennes péritonéales";}
if($rowfact['too'] =="C6A1"){ $too ="Réfection palpébrale traumatique";}
if($rowfact['too'] =="C6A3"){ $too ="Chirurgie du chalazion, kyste palpébral";}
if($rowfact['too'] =="C6A5"){ $too ="Chirurgie du xanthélasma et du trichiasis";}
if($rowfact['too'] =="C6A6"){ $too ="Extraction d’un corps étranger de l’orbite";}
if($rowfact['too'] =="C6C1"){ $too ="Ablation de pterygium,pingueculum";}
if($rowfact['too'] =="C6H1"){ $too ="Corps étrangers du segment antérieur";}
if($rowfact['too'] =="C7A1A"){ $too ="Suture ou réfection simple du pavillon";}
if($rowfact['too'] =="C7A1D"){ $too ="Ablation simple d’une tumeur ou d’une chéloïde de l’oreille";}
if($rowfact['too'] =="C7A2A"){ $too ="Ablation de bouchon de cérumen uni ou bilatéral";}
if($rowfact['too'] =="C7A2B"){ $too ="Ablation de corps étrangers";}
if($rowfact['too'] =="C7B2K"){ $too ="Incision ou drainage d’une cellulite ou adénite génienne";}
if($rowfact['too'] =="C7B2L"){ $too ="Chirurgie des collections suppurées de la face";}
if($rowfact['too'] =="C7C10"){ $too ="Curage total";}
if($rowfact['too'] =="C7C12"){ $too ="Lobectomie thyroïdienne";}
if($rowfact['too'] =="C7C13"){ $too ="Thyroïdectomie totale";}
if($rowfact['too'] =="C7C14"){ $too ="Trachéotomie";}
if($rowfact['too'] =="C7C2"){ $too ="Curage sus claviculaire";}
if($rowfact['too'] =="C7C3"){ $too ="Drainage cervical";}
if($rowfact['too'] =="C7C4"){ $too ="Fistule cervicale";}
if($rowfact['too'] =="C7C6"){ $too ="Sous Maxillectomie";}
if($rowfact['too'] =="C7C7"){ $too ="Parotidectomie superficielle";}
if($rowfact['too'] =="C7C8"){ $too ="Parotidectomie totale";}
if($rowfact['too'] =="C7C9"){ $too ="Exerese glande sublinguale";}
if($rowfact['too'] =="C7D1"){ $too ="Réfection partielle ou totale des lèvres traumatique ou tumorale";}
if($rowfact['too'] =="C7G1"){ $too ="Adénoïdectomie";}
if($rowfact['too'] =="C7G11"){ $too ="Amygdalectomie associé adénoïdectomie";}
if($rowfact['too'] =="C7G3"){ $too ="Amygdalectomie par électrocoagulation";}
if($rowfact['too'] =="C8A1"){ $too ="Nettoyage ou pansement d'une brûlure";}
if($rowfact['too'] =="C8A2"){ $too ="Prélèvement simple de peau ou de muqueuse pour examen histologique";}
if($rowfact['too'] =="C8A3"){ $too ="Suture secondaire d'une plaie après avivement";}
if($rowfact['too'] =="C8B6"){ $too ="Correction d'une bride rétractile par plastie en Z";}
if($rowfact['too'] =="C9A1"){ $too ="Mise à plat ou drainage d’une collection pariétale (abcès, hématome, sérosité)";}
if($rowfact['too'] =="C9A6"){ $too ="Thoracotomie exploratrice";}
if($rowfact['too'] =="C9C1"){ $too ="Résection d'un segment ou d’un lobe pulmonaire";}
if($rowfact['too'] =="C9C3"){ $too ="Pneumonectomie élargie pour cancer avec curage ganglionnaire";}
if($rowfact['too'] =="C9C5"){ $too ="Exérèse de kyste hydatique par thoracotomie";}
if($rowfact['too'] =="C9C6"){ $too ="Exérèse des malformations congénitales";}
if($rowfact['too'] =="C9D1"){ $too ="Décortication pleurale";}
if($rowfact['too'] =="C9D2"){ $too ="Drainage pleural";}
if($rowfact['too'] =="C9D3"){ $too ="Pleurectomie, pleurotomie ou pleurostomie";}
if($rowfact['too'] =="C9D4"){ $too ="Pleuroscopie diagnostic ou thérapeutique";}
if($rowfact['too'] =="C9D5"){ $too ="Biopsie pleurale par thoracotomie ou thoracoscopie";}
if($rowfact['too'] =="C9F3"){ $too ="Traitement chirurgicale des lésions médiatisnales";}


$pdf->Cell(70  ,5,utf8_decode($too),0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Anesthesiste : ',0,0);
$pdf->SetFont('Arial', '',10);

$pieces = $DB->query("SELECT * FROM medecin where idmed = '$anes'");
foreach ($pieces as $piece):
$pdf->Cell(70  ,5,$piece->nom,0,1);
endforeach;
//$pdf->Cell(70  ,5,$rowfact['anes'] ,0,0);
/*if($rowfact['mode_anes'] =="AG"){ $mode_anes = "Anesthésie générale";}
if($rowfact['mode_anes'] =="AN"){ $mode_anes = "Anesthésie Normale";}
if($rowfact['mode_anes'] =="AX"){ $mode_anes = "Anesthésie XXX";}*/


$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Indication : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,utf8_decode($rowfact['indic']),0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Mode : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,utf8_decode($rowfact['mode_anes']),0,1);

$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Difficulte : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,'',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,'',0,1);

$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Position patient : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['posi_pat'],0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'Assistant',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['assist'],0,1);

$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Transfusion sang : ',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['trans_sang'],0,0);
$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,'',0,1);




$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Commence a :',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['datedop'].' '.$rowfact['heurdop'],0,1);

$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,'',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(30  ,5,'Termine a :',0,0);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(70  ,5,$rowfact['datef'].' '.$rowfact['heurfop'],0,1);

$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'Lesions observees : ',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(189  ,5,$rowfact['loo'],0,1);
$pdf->Cell(189  ,5,'',0,1);

$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'Gestes operatoires : ',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(189  ,5,$rowfact['goo'],0,1);
$pdf->Cell(189  ,5,'',0,1);

$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'Etat final : ',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(189  ,5,$rowfact['eff'],0,1);
$pdf->Cell(189  ,5,'',0,1);

$pdf->SetFont('Arial', 'B',10);
$pdf->Cell(30  ,5,'Note : ',0,1);
$pdf->SetFont('Arial', '',10);
$pdf->Cell(100  ,5,$rowfact['note'],0,1);
$pdf->Cell(189  ,5,'',0,1);

$pdf->Cell(189  ,5,'',0,1);

/*
$pdf->Ln();
$pdf->Line(15,270,195,270);*/
/*$pdf->SetFont('Arial', '',12);
$pdf->SetXY(5, 271);
$pdf->Cell(15,5,"",0,0);
$pdf->Cell(70,5,"Dr. Buhane",0,0);
$pdf->Cell(60,5,"Tech : DEHEYE",0,0);
$pdf->Cell(15,5,"Date : ",0,0);
$pdf->Cell(39,5,$rowfact['datef'],0,1);*/
$pdf->Output();
?>