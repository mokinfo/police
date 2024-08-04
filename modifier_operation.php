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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ido = $_POST['ido'];
    $indic = $_POST['indic'];
    $datedop = $_POST['datedop'];
    $heurdop = $_POST['heurdop'];
    $datefop = $_POST['datefop'];
    $heurfop = $_POST['heurfop'];
    $statu = $_POST['statu'];
    $mode_ann = $_POST['mode_ann'];
    $trans_sang = $_POST['trans_sang'];
    $posi_pat = $_POST['posi_pat'];
    $loo = $_POST['loo'];
    $goo = $_POST['goo'];
    $eff = $_POST['eff'];
    $note = $_POST['note'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'spn');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mettre à jour les champs
    $sql = "UPDATE operation SET
            indic = '$indic',
            datedop = '$datedop',
            heurdop = '$heurdop',
            datef = '$datefop',
            heurfop = '$heurfop',
            statu = '$statu',
            mode_ann = '$mode_ann',
            trans_sang = '$trans_sang',
            posi_pat = '$posi_pat',
            loo = '$loo',
            goo = '$goo',
            eff = '$eff',
            note = '$note'
            WHERE ido = '$ido'";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "Les informations sont à jour !!!";
		redirect_to("Liste_Bloc");
    } else {
        echo "Erreur de mise à jour : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>