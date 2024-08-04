<script src="js/sweetalert2vf"></script>
<?php /*require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("Login");
}
?>
<?php
if (isset($_POST['idp'])) {
  $idp = $_POST["idp"];
  $nom = $_POST["nom"];
  $civi = $_POST["civi"];
  $daten = $_POST["daten"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $sitfam = $_POST["sitfam"];
  $address = $_POST["address"];
  $tel = $_POST["tel"];
  $email = $_POST["email"];
  $catp = $_POST["categorie"];
  if ($catp == "CIV" or $catp == "MIL" or $catp == "GEN" or $catp == "GAR" or $catp == "GAC") {
    $matricule = "NON";
  }else{
    $matricule = $_POST['matricule'];
  }
  
  if ($_POST["possession"]==0){
    $cnss = "NON";
  }else{
    $cnss = $_POST["possession"];
  }
  $numcnss = $_POST["cnss"];
  $affect = $_POST["affect"];
  $datedujour = date("d/m/Y");
  $h = date("H");
  $m = date("i");
  $s = date("s");
  $hs = $h + 2;
  //$hr = is_string($hs.":".$m.":".$s);
  $dc = date('D d/m/Y ');
  $datedc = $dc." ".$hs.":".$m.":".$s ;
  //if ($path == 1) {
    $res = 1;
    $nature = "Entrée";

  //Coût 
    $etat = "IMPAYER";
  /*if ($cnss == "NON") {
    if ($affect == "medg") {
      if ($catp == "CIV") {
        $mt = 3000;
        $desg = "Consultation";
      }elseif ($catp == "AC") {
        $mt = 3000;
        $desg = "Consultation";
      }elseif ($catp == "CIV") {
        $mt = 1500;
        $desg = "Consultation";
      }elseif ($catp == "AC") {
        $mt = 1500;
        $desg = "Consultation";
      }
    }
  }
    
    lab
    hos
    img
    if ($affect == "urg" and $cnss == "NON") {
      $mt = 3000;
      $desg = "Urgence";
    }*/
    /*$user = $_SESSION['user'];
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {
    $sql = "INSERT INTO patient (idp, nom, civi, daten, age, sex, sitfam, address, tel, email, dateinsp, catp, matricule, cnss, numcnss, affect) VALUES ('$idp', '$nom', '$civi', '$daten', '$age', '$sex', '$sitfam', '$address', '$tel', '$email', '$datedujour', '$catp', '$matricule', '$cnss', '$numcnss', '$affect')";
    $mysqli = new mysqli('localhost','root','','spn');

    $mysqli->query($sql);
    if (isset($mysqli)) {
      $mysqlif = new mysqli('localhost','root','','spn');
      $action = 'Ajout de patient numero : '. $idp;
      $sqlf = "insert into journal (id, user, action, datedc) VALUES ('', '$user', '$action', '$datedc')";
      $mysqlif->query($sqlf);
      /*$sqlf = "INSERT INTO facture (idf, desg, idp, datef, mt, etat) VALUES ('', '$desg', '$idp', '$datedujour', '$mt', '$etat')";
      $mysqlif = new mysqli('localhost','root','','spn');
      $mysqlif->query($sqlf);
      echo '<script>alert("Patient ajouté dans la base des patients ")</script>';*/
      /*if (isset($mysqlif)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("Patient ajouté dans le système !");'; 
        echo 'window.location.href = "Accueil";';
        echo '</script>';
        //redirect_to("Listeattente");
      }
    }else{
      echo '<script>alert("Le patient n\'est pas ajouté dans la liste")</script>';
    }/*
    $result = mysqli_query($mysqli, "INSERT INTO care (idcare, name, phone, address, age, sex, numcard, price, datej, res) VALUES ((SELECT LAST_INSERT_ID()), '$name', '$tel', '$address', '$age', '$sex', '$num', '$price', '$datej', '$res')");
    if (isset($result)) {
      $factu = mysqli_query($mysqli, "insert into facture (idfacture, nomclient, adresseclient, dates, montant, nature) VALUES ('', '$name', '$address', '$datej', '$price', '$nature')");
      if (isset($result)) {
        redirect_to("Accueil");
      }
    } */
  /*}elseif ($path == 2) {
    $res = 2;
  //if (isset($_POST['enreg']) and isset($_POST["ref"])) {
    $sql = "INSERT INTO care (idcare, name, phone, address, age, sex, numcard, datej, res) VALUES ('', '$name', '$tel', '$address', '$age', '$sex', '$num', '$datej', '$res')";
    $mysqli = new mysqli('localhost','root','','bormed');

    $mysqli->query($sql);
    if (isset($mysqli)) {
      redirect_to("home.php");
    }
  }*/
  /*
}else{
  //redirect_to("nouveau.php");
  ?>
    <?php 
}/*/?><?php /*
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

// Vérification de la session utilisateur
if(!isset($_SESSION['user'])){
    redirect_to("Login");
}
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'spn');

// Traitement des données du formulaire
if (isset($_POST['idp'])) {
    $idp = $_POST["idp"];
    $nom = $_POST["nom"];
    $civi = $_POST["civi"];
    $daten = $_POST["daten"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $sitfam = $_POST["sitfam"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $catp = $_POST["categorie"];

    // Vérification de la catégorie pour déterminer le matricule
    if ($catp == "CIV" || $catp == "MIL" || $catp == "GEN" || $catp == "GAR" || $catp == "GAC") {
        $matricule = "NON";
    } else {
        $matricule = $_POST['matricule'];
    }

    // Vérification de la possession du CNSS
    if ($_POST["possession"] == "OUI") {
        $cnss = "OUI";
        $numcnss = $_POST["cnss"];
    }else{
        $cnss = "NON";
        $numcnss = "";
    }

    $affect = $_POST["affect"];
    $datedujour = date("d/m/Y");
    $h = date("H");
    $m = date("i");
    $s = date("s");
    $hs = $h + 2;
    $dc = date('D d/m/Y ');
    $datedc = $dc." ".$hs.":".$m.":".$s ;
    $res = 1;
    $nature = "Entrée";
    $etat = "IMPAYER";

/*
$stmt_update = $mysqli->prepare($sql_update);
$stmt_update->bind_param("sssssssss", $desg, $datef, $type_paix, $mt, $mt_cnss, $etat, $datehosdt, $codf, $idff);*/
/*
    // Insertion des données du patient dans la table 'patient'
    $sql_insert_patient = "INSERT INTO patient (idp, nom, civi, daten, age, sex, sitfam, address, tel, email, dateinsp, catp, matricule, cnss, numcnss, affect) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert_patient = $mysqli->prepare($sql_insert_patient);
    $stmt_insert_patient->bind_param("ssssdsssdsssssss", $idp, $nom, $civi, $daten, $age, $sex, $sitfam, $address, $tel, $email, $datedujour, $catp, $matricule, $cnss, $numcnss, $affect);
    $stmt_insert_patient->execute();
    $stmt_insert_patient->close();

    // Enregistrement de l'action dans le journal
    $action = 'Ajout de patient numero : '. $idp;
    $sql_insert_journal = "INSERT INTO journal (id, user, action, datedc) VALUES ('', ?, ?, ?)";
    $stmt_insert_journal = $mysqli->prepare($sql_insert_journal);
    $stmt_insert_journal->bind_param("sss", $_SESSION['user'], $action, $datedc);
    $stmt_insert_journal->execute();
    $stmt_insert_journal->close();

    // Affichage de l'alerte JavaScript et redirection
    echo '<script type="text/javascript">'; 
    echo 'alert("Patient ajouté dans le système !");'; 
    echo 'window.location.href = "Accueil";';
    echo '</script>';
} else {
    // Redirection si le formulaire n'a pas été soumis
    redirect_to("nouveau.php");
}*/
?>

<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");
require_once("includes/functions.php");

// Vérification de la session utilisateur
if (!isset($_SESSION['user'])) {
    redirect_to("Login");
}

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'spn');

// Traitement des données du formulaire
if (isset($_POST['idp'])) {
    $idp = $_POST["idp"];
    $nom = $_POST["nom"];
    $civi = $_POST["civi"];
    $daten = $_POST["daten"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $sitfam = $_POST["sitfam"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $catp = $_POST["categorie"];

    // Vérification de la catégorie pour déterminer le matricule
    if ($catp == "CIV" || $catp == "MIL" || $catp == "GEN" || $catp == "GAR" || $catp == "GAC" || $catp == "CAS" || $catp == "AGE" || $catp == "FAE") {
        $matricule = "NON";
    } else {
        $matricule = $_POST['matricule'];
    }

    // Vérification de la possession du CNSS
    if ($_POST["possession"] == "OUI") {
        $cnss = "OUI";
        $numcnss = $_POST["numcnss"];
    } else {
        $cnss = "NON";
        $numcnss = "";
    }

    $affect = $_POST["affect"];
    $datedujour = date("d/m/Y");

    // Vérification si le patient existe déjà
    $sql_check_patient = "SELECT * FROM patient WHERE nom = ? AND daten = ?";
    $stmt_check_patient = $mysqli->prepare($sql_check_patient);
    $stmt_check_patient->bind_param("ss", $nom, $daten);
    $stmt_check_patient->execute();
    $result = $stmt_check_patient->get_result();

    if ($result->num_rows > 0) {
        // Le patient existe déjà, afficher l'alerte SweetAlert
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script type="text/javascript">';
        echo 'document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Erreur",
                    text: "Ce patient existe déjà dans la base de données.",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "Accueil";
                    }
                });
            });';
        echo '</script>';
    } else {
        // Le patient n'existe pas, insérer les nouvelles données
        $sql_insert_patient = "INSERT INTO patient (idp, nom, civi, daten, age, sex, sitfam, address, tel, email, dateinsp, catp, matricule, cnss, numcnss, affect) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert_patient = $mysqli->prepare($sql_insert_patient);
        $stmt_insert_patient->bind_param("ssssdsssdsssssss", $idp, $nom, $civi, $daten, $age, $sex, $sitfam, $address, $tel, $email, $datedujour, $catp, $matricule, $cnss, $numcnss, $affect);
        $stmt_insert_patient->execute();
        $stmt_insert_patient->close();

        // Enregistrement de l'action dans le journal
        $action = 'Ajout de patient numero : ' . $idp;
        $datedc = date('D d/m/Y H:i:s', strtotime('+2 hours'));
        $sql_insert_journal = "INSERT INTO journal (user, action, datedc) VALUES (?, ?, ?)";
        $stmt_insert_journal = $mysqli->prepare($sql_insert_journal);
        $stmt_insert_journal->bind_param("sss", $_SESSION['user'], $action, $datedc);
        $stmt_insert_journal->execute();
        $stmt_insert_journal->close();

        // Affichage de l'alerte JavaScript et redirection
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script type="text/javascript">';
        echo 'document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Succès",
                    text: "Patient ajouté dans le système !",
                    confirmButtonText: "OK"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "Accueil";
                    }
                });
            });';
        echo '</script>';
    }
    $stmt_check_patient->close();
} else {
    // Redirection si le formulaire n'a pas été soumis
    redirect_to("Accueil");
}
?>