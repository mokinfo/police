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
</head>
<body>

<div class="container mt-4">
    <h2>Liste des utilisateurs du système</h2>
    <table class="table table-striped table-bordered table-hover" id="jaktab">
        <thead>
            <tr>
                <th></th>
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
            $sql1 = $conn1->query('SELECT * FROM utilisateur');
            while ($data1 = $sql1->fetch_array()) {
                // Détermination du statut
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
                switch ($data1['status']) {
                    case 1: $di = "success"; $si = "Active"; break;
                    case 2: $di = "danger"; $si = "Inactive"; break;
                    default: $di = "warning"; $si = "Absent"; break;
                }

                echo '<tr>
                        <td><img src="images/utilisateur/'.$data1['file_name'].'" width="40" height="40" style="border-radius: 50%"></td>
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
            ?>
        </tbody>
    </table>
</div>

<!-- Modal Bootstrap pour les détails de l'utilisateur -->
<div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="modalDetailsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailsLabel">Détails de l'utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalPhoto" src="" alt="Photo de l'utilisateur" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
                <p><strong>Nom :</strong> <span id="modalNom"></span></p>
                <p><strong>Rôle :</strong> <span id="modalRole"></span></p>
                <p><strong>Date :</strong> <span id="modalDate"></span></p>
                <p><strong>Statut :</strong> <span id="modalStatut"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    function afficherDetails(idUtilisateur) {
        $.ajax({
            url: 'get_user_details.php',
            method: 'POST',
            dataType: 'json',
            data: { id: idUtilisateur },
            success: function(response) {
                $('#modalPhoto').attr('src', 'images/utilisateur/' + response.file_name);
                $('#modalNom').text(response.nom);
                $('#modalRole').text(response.role);
                $('#modalDate').text(response.date);
                $('#modalStatut').text(response.statut);
                $('#modalDetails').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération des détails de l\'utilisateur:', error);
                alert('Erreur lors de la récupération des détails de l\'utilisateur. Veuillez réessayer.');
            }
        });
    }

    function confirmDelete(id) {
        // Code pour confirmer la suppression
        console.log('Suppression de l\'utilisateur avec ID:', id);
    }
</script>

</body>
</html>
