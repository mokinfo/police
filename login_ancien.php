<?php 
require_once("includes/session.php");
require_once("includes/db_connection.php");

function redirect_to($new_location){
    header("location: ". $new_location);
    exit;
}

if(isset($_POST['envoie'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $mysqlix = new mysqli('localhost', 'root', '', 'spn');
    $query1 = "SELECT * FROM utilisateur WHERE utilisateur = '$user' AND motspasse = '$pass'";
    $result = mysqli_query($mysqlix, $query1);

    if (mysqli_num_rows($result) == 1) {
        $donnees = mysqli_fetch_assoc($result);
        $_SESSION['iduser'] = $donnees['id'];
        $_SESSION['role'] = $donnees['role'];
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        // Enregistrement de l'action de connexion dans le journal
        $h = date("H");
        $m = date("i");
        $s = date("s");
        $hs = $h + 2;
        $dc = date('D d/m/Y ');
        $datedc = $dc." ".$hs.":".$m.":".$s;
        $sqls = "INSERT INTO journal (id, user, action, datedc) VALUES ('', '$user', 'Connexion', '$datedc')";
        $mysqlix->query($sqls);

        redirect_to("Accueil");
    } else {
        echo "<h5 style='color:red'>Le nom d'utilisateur ou le mot de passe entré n'est pas correct. Saisissez-le à nouveau !</h5>";
    }
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
            .ico{
                height:20px;
                position:absolute;
                top:0;
                left:0;
                margin-top:13px;
                margin-left:14px
            }
            label{
                position:relative;
                display:block
            }
            }input{
            outline:0;
            -webkit-appearance:none;
            -moz-appearance:none;
            appearance:none
            }input:focus{
                outline:0
                }input[type=password],input[type=text]{
                    width:100%;
                border:1px solid background-color: rgba(255,255,255,.8);
            height:44px;
            padding:3px 20px 3px 40px;
            margin-bottom:20px;
            border-radius:6px;
            background-color:rgba(255,255,255,.8);
            -webkit-transition:-webkit-box-shadow .3s ease-in-out;
            transition:-webkit-box-shadow .3s ease-in-out;
            transition:box-shadow .3s ease-in-out;
            transition:box-shadow .3s ease-in-out,-webkit-box-shadow .3s ease-in-out
            }input[type=password]:focus,input[type=text]:focus{
                -webkit-box-shadow:0 0 5px 0 rgba(255,255,255,1);
                box-shadow:0 0 5px 0 rgba(255,255,255,1)
                }.bt{
                    opacity:.4
                    }input[type=submit]{
                        background:#17a5e9;
                color:#fff;
            border:0;
            cursor:pointer;
            text-align:center;
            width:100%;
            height:44px;
            border-radius:6px;
            -webkit-transition:background .3s ease-in-out;
            transition:background .3s ease-in-out
            }input[type=submit]:focus,input[type=submit]:hover{
                background:#1073a3;
                color:#e7f6fc;
                }table{
                    border-collapse:collapse;
                width:100%;
            margin-bottom:20px
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