<?php
require_once("includes/session.php");
function redirect_to($new_location){
    header("location: ". $new_location);
    exit;
}/*
if (isset($_POST['idagr'])) {
  echo "La method post IDAGR is working";
}
if (isset($_POST['Enregistrer'])) {
  echo "La method post ENREGISTRER is working";
}*/
if(isset($_POST['Enregistrer'])){
  $id = $_POST['id'];
  $users = $_POST["user"];
  $pass = $_POST["pass"];
  $role = $_POST["role"];
  $photo = $_FILES['userfile']['name'];
  $statut = $_POST['statut'];
/* 
  if ($_POST["sexe"] == 1) {
    $sexe = "Masculin";
  }elseif ($_POST["sexe"] == 2) {
    $sexe = "Féminin";
  }
  $reussite=$_POST['reussite'];
  $date_inscription=$_POST['date_inscription'];
  $post_alpha=$_POST['post_alpha'];*/

  $user = $_SESSION['user'];
  $h = date("H");
  $m = date("i");
  $s = date("s");
  $hs = $h + 2;
  //$hr = is_string($hs.":".$m.":".$s);
  $dc = date('D d/m/Y ');
  $datedc = $dc." ".$hs.":".$m.":".$s ;
  $datefc = $dc." ".$hs.":".$m.":".$s ;

  /*
  $target = "images/utilisateur/".basename($photo);

  if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){
    $msg = "l'image est chargé avec succès !";
    echo $msg;
  }else{
    $msg = "l'image n'est pas chargé veuillez récharger la photo !";
    echo $msg;
  }*/

  $uploaddirs = 'images/utilisateur/';
  $uploadfiles = $uploaddirs . basename($_FILES['userfile']['name']);
  $uploadOks = 1;
  $imageFileTypes = strtolower(pathinfo($uploadfiles,PATHINFO_EXTENSION));

  if (file_exists($uploadfiles)) {
    echo "Désole, l'image existe dans la base. Veuillez modifier le nom de l'image !";
    $uploadOks = 0;
  }
  if($imageFileTypes != "jpg" && $imageFileTypes != "png" && $imageFileTypes != "jpeg" && $imageFileTypes != "gif" ) {
    echo "Désole, Seul un fichier de type JPG, JPEG, PNG & GIF est permis.";
    $uploadOks = 0;
  }
  if ($uploadOks == 0) {
    echo "Désole, votre image n'est pas chargé.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfiles)) {
      echo "Image est valide, et il a été chargé dans la base.\n";
    } else {
      echo "Chargement échoué";
    }
  }

// Check connection
  /*$con = mysqli_connect("mysql.gouv.dj","dised","DsD#18@IE-SQL","dised");
  if (!$con) {
      die("Connection failed: " . $conn->connect_error);
  } */
  $connouv = mysqli_connect("localhost","root","","spn");
  if (mysqli_connect_errno()) {
  die("connection a la base est echoué: " . mysqli_connect_errno() . " (" . mysqli_connect_errno() . " )");
  }
    $sql = "INSERT INTO utilisateur (id, utilisateur, motspasse, role, file_name, uploaded_on, status) VALUES ('$id', '$users', '$pass', '$role', '$photo', '$datedc', '$statut')";
    $pieces = new mysqli('localhost','root','','spn');

    $pieces->query($sql);
  if (isset($pieces)) {?>
    <script>
      alert(" Vous avez mis à jour !!!");
    </script>
    <?php 
    $mysqli = new mysqli('localhost','root','','spn');
    $sqls = "insert into journal (id, user, action, datedc) VALUES ('', '$user', 'Ajout utilisateur', '$datedc')";
    $mysqli->query($sqls);
    redirect_to("Gestion_utilisateur");
  } else {
      echo "Erreur: " . $sql . "<br>" . $con->error;
  }
} else {
  redirect_to("Accueil");
  ?>
    <?php 
}

?>