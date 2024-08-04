<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");

function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}

if (isset($_POST['envoie'])) {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);

    $mysqlix = new mysqli('localhost', 'root', '', 'spn');

    if ($mysqlix->connect_error) {
        die("Connection failed: " . $mysqlix->connect_error);
    }

    $query1 = "SELECT * FROM utilisateur WHERE utilisateur = ?";
    $stmt = $mysqlix->prepare($query1);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $donnees = $result->fetch_assoc();

        if (password_verify($pass, $donnees['motspasse'])) {
            $_SESSION['iduser'] = $donnees['id'];
            $_SESSION['role'] = $donnees['role'];
            $_SESSION['user'] = $user;

            // Enregistrement de l'action de connexion dans le journal
            $datedc = date('D d/m/Y H:i:s', strtotime('+2 hours'));
            $sqls = "INSERT INTO journal (user, action, datedc) VALUES (?, 'Connexion', ?)";
            $stmt_log = $mysqlix->prepare($sqls);
            $stmt_log->bind_param("ss", $user, $datedc);
            $stmt_log->execute();

            redirect_to("Accueil");
        } else {
            echo "<h5 style='color:red'>Le mot de passe entré n'est pas correct. Saisissez-le à nouveau !</h5>";
        }
    } else {
        echo "<h5 style='color:red'>Le nom d'utilisateur entré n'est pas correct. Saisissez-le à nouveau !</h5>";
    }

    $stmt->close();
    $mysqlix->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Santé - Police - National</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://www.ordremedical.dj/images/loaders/loader_1.png" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="cssx/styles.css">
    <style>
        .ico {
            height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 13px;
            margin-left: 14px;
        }
        label {
            position: relative;
            display: block;
        }
        input {
            outline: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        input:focus {
            outline: 0;
        }
        input[type=password], input[type=text] {
            width: 100%;
            border: 1px solid background-color: rgba(255, 255, 255, .8);
            height: 44px;
            padding: 3px 20px 3px 40px;
            margin-bottom: 20px;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, .8);
            -webkit-transition: -webkit-box-shadow .3s ease-in-out;
            transition: -webkit-box-shadow .3s ease-in-out;
            transition: box-shadow .3s ease-in-out;
            transition: box-shadow .3s ease-in-out, -webkit-box-shadow .3s ease-in-out;
        }
        input[type=password]:focus, input[type=text]:focus {
            -webkit-box-shadow: 0 0 5px 0 rgba(255, 255, 255, 1);
            box-shadow: 0 0 5px 0 rgba(255, 255, 255, 1);
        }
        .bt {
            opacity: .4;
        }
        input[type=submit] {
            background: #17a5e9;
            color: #fff;
            border: 0;
            cursor: pointer;
            text-align: center;
            width: 100%;
            height: 44px;
            border-radius: 6px;
            -webkit-transition: background .3s ease-in-out;
            transition: background .3s ease-in-out;
        }
        input[type=submit]:focus, input[type=submit]:hover {
            background: #1073a3;
            color: #e7f6fc;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="gauch">
        <img src="dist/img/polices.png" width="295" height="352" />
    </div>
    <div class="container">
        <div class="content">
            <div class="title" style="font-family:' Tahoma, Arial, sans-serif'; text-align: center;">SSPN</div>
            <form action="login.php" method="POST" name="logonForm">  
                <div><label><img class="ico" src="img/user.svg" alt="#"><input name="user" type="text" placeholder="Utilisateur"></label></div>
                <div><label><img class="ico" src="img/password.svg" alt="#"><input name="pass" type="password" id="password" placeholder="Mots de passe"></label></div><br>
                <!--ADSSP-->
                <div class="signInInputLabel" style="font-size:12px;font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;"><a style="text-decoration:none;color:#17a5e9;" target="_blank" href="#">Mot de passe oublié ?</a></div>
                <!--END ADSSP-->
                <input type="submit" name="envoie" value="Se connecter" />               
            </form>
        </div>
    </div>
</body>
</html>