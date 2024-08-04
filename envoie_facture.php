<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("Login");
}
?>
<?php
if (isset($_GET['id'])) {
  $idf = $_GET["id"];
  
  //$nump = $_POST["nump"];
  //$heura = $_POST["heura"];
  //$heurf = $_POST["heurf"];
  $statut = "A";
  $datedujour = date("d/m/Y");
  $datehosdt = date("Y-m-d G:i");

  $cosn = new mysqli('localhost', 'root', '', 'spn');
  $datedujourn = date("d/m/Y");
  //$psn = $cosn->query("SELECT * FROM entre where datent = '$datedujourn' and num_medecin = '$type_consult'");
  //$row_cnt = $psn->num_rows;
  //$nump = $row_cnt + 1; 
  //Coût 
    //$etat = "IMPAYER";
    $user = $_SESSION['user'];
  //if ($path == 1) {
    $res = 1;
    $nature = "Entrée";
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {

    $sql = "UPDATE entre SET statut='B' WHERE ident ='$idf'";
    $mysqli = new mysqli('localhost','root','','spn');
    $mysqli->query($sql);
    if (isset($mysqli)) {
      $sqlf = "UPDATE facture SET etat='PAYER' WHERE idf ='$idf'";
      $mysqlif = new mysqli('localhost','root','','spn');
      $mysqlif->query($sqlf);
      if (isset($mysqlif)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Le patient est dans la liste d\'attente !");'; 
        echo 'window.location.href = "Listeattente";';
        echo '</script>';
      }
      //redirect_to("Listeattente");
    }
  
}else{
  //redirect_to("nouveau.php");
  ?>
    <?php 
}
?>