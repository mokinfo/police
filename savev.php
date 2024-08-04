<?php 
require_once("includes/session.php");
?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .user-photo {
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }
        .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2>Liste des utilisateurs du système</h2>
    <table class="table table-striped table-bordered table-hover" id="jaktab">
        <thead>
            <tr>
                <th>Photo</th>
                <th>N°</th>
                <th>Nom complet</th>
                <th>Rôle</th>
                <th>Date & Heure</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn1 = new mysqli('localhost', 'root', '', 'spn');
            if ($conn1->connect_error) {
                die("Connection failed: " . $conn1->connect_error);
            }
            $sql1 = $conn1->query('SELECT * FROM utilisateur');
            while ($data1 = $sql1->fetch_array()) {
                // Détermination du statut
                $stat = "";
                switch ($data1['role']) {
                    case 8: $stat = "Administrateur"; break;
                    case 1: $stat = "Admission"; break;
                    case 2: $stat = "Caisse"; break;
                    case 3: $stat = "Médecin"; break;
                    case 4: $stat = "Spécialiste"; break;
                    case 5: $stat = "Laboratoire"; break;
                    case 6: $stat = "Comptabilité"; break;
                    case 7: $stat = "Sécretariat"; break;
                    case 9: $stat = "Superviseur"; break;
                    default: $stat = "Inconnu";
                }

                // Détermination du badge de statut
                $di = "";
                $si = "";
                switch ($data1['status']) {
                    case 1: $di = "success"; $si = "Active"; break;
                    case 2: $di = "danger"; $si = "Inactive"; break;
                    default: $di = "warning"; $si = "Absent"; break;
                }

                echo '<tr>
                        <td><img src="images/utilisateur/'.$data1['file_name'].'" class="user-photo"></td>
                        <td>'.$data1['id'].'</td>
                        <td>'.$data1['nom'].'</td>
                        <td>'.$stat.'</td>
                        <td>'.$data1['uploaded_on'].'</td>
                        <td class="project-state"><span class="badge badge-'.$di.'">'.$si.'</span></td>
                        <td>
                            <button type="button" class="btn btn-light btn-sm" onclick="afficherDetails('. $data1['id'].')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            | <a href="#" class="btn btn-light btn-sm" onclick="confirmDelete(' . $data1['id'] . ')">
                                <i class="fas fa-trash-alt" style="color:red;"></i>
                            </a>
                        </td>
                    </tr>';
            }
            $conn1->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Modal Bootstrap pour les détails de l'utilisateur -->
<div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="modalDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailsLabel"><b><span id="modalNom"></b></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4"><center>
                        <img src="" id="modalPhoto" class="rounded-circle border border-success img-fluid mb-3" style="max-width: 300px;"></center>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <?php// echo $_SESSION['role']; ?>
                            <span id="modalRole"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalDate">Date :</label>
                            <span id="modalDate"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalStatut">Statut :</label>
                            <span id="modalStatut"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalEmail">Email :</label>
                            <span id="modalEmail"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalTelephone">Téléphone :</label>
                            <span id="modalTelephone"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    

    function confirmDelete(id) {
        // Code pour confirmer la suppression
        console.log('Suppression de l\'utilisateur avec ID:', id);
    }
    function afficherDetails(idUtilisateur) {
    $.ajax({
        url: 'get_user_details.php',
        method: 'POST',
        dataType: 'json',
        data: { id: idUtilisateur },
        success: function(response) {
            $('#modalNom').text(response.nom);
            // Mise à jour du rôle en texte lisible
            if (response.role == 8) {
                $('#modalRole').text("Administrateur du système");
            } else if (response.role == 1) {
                $('#modalRole').text("Responsable de l'admission");
            } else if (response.role == 2) {
                $('#modalRole').text("Responsable de caisse");
            } else if (response.role == 3) {
                $('#modalRole').text("Médecin");
            } else if (response.role == 4) {
                $('#modalRole').text("Spécialiste");
            } else if (response.role == 5) {
                $('#modalRole').text("Laboratoire");
            } else if (response.role == 6) {
                $('#modalRole').text("Comptabilité");
            } else if (response.role == 7) {
                $('#modalRole').text("Sécretariat");
            } else if (response.role == 9) {
                $('#modalRole').text("Superviseur");
            } else {
                $('#modalRole').text("Inconnu");
            }

            $('#modalDate').text(response.date);
            $('#modalStatut').text(response.statut);
            $('#modalPhoto').attr('src', 'images/utilisateur/' + response.file_name);
            $('#modalEmail').text(response.email);
            $('#modalTelephone').text(response.telephone);
            $('#modalDetails').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération des détails de l\'utilisateur:', error);
            alert('Erreur lors de la récupération des détails de l\'utilisateur. Veuillez réessayer.');
        }
    });
}

</script>
