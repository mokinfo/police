<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
require_once("includes/session.php");

function redirect_to($new_location){
    echo "<script>window.location.href = '$new_location';</script>";
}

$dl = $_GET['id'];

if (isset($dl)) {
    $mysqli = mysqli_connect('localhost', 'root', '', 'spn');

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $stmt = $mysqli->prepare("DELETE FROM medecin WHERE idmed = ?");
    $stmt->bind_param("i", $dl);

    echo "<script>
            Swal.fire({
              icon: 'warning',
              title: 'Êtes-vous sûr?',
              text: 'La suppression sera définitive!',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Oui, supprimer!',
              cancelButtonText: 'Annuler'
            }).then((result) => {
              if (result.isConfirmed) {
                // Si l'utilisateur a confirmé la suppression
                " . ($stmt->execute() ? "showSuccessAlert()" : "showErrorAlert()") . "
              } else {
                // Si l'utilisateur a annulé la suppression
                " . redirect_to('Ajouter_medecin') . "
              }
            });

            function showSuccessAlert() {
              Swal.fire({
                icon: 'success',
                title: 'Suppression réussie!',
                text: 'Bravo! Le Médecin a été supprimé.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                " . redirect_to('Ajouter_medecin') . "
              });
            }

            function showErrorAlert() {
              Swal.fire({
                icon: 'error',
                title: 'Erreur!',
                text: 'Une erreur s\'est produite lors de la suppression.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
              }).then(() => {
                " . redirect_to('Ajouter_medecin') . "
              });
            }
          </script>";

    $stmt->close();
    $mysqli->close();
}

/*
require_once("includes/session.php");
function redirect_to($new_location){
    header("location: ". $new_location);
    exit;
} 
$dl = $_GET['id'];
if (isset($dl)) {
	$mysqli = mysqli_connect('localhost','root','','spn');
	$pieces = mysqli_query($mysqli, "DELETE FROM utilisateur WHERE id ='$dl'");
	if (isset($pieces)) {?>
		<script>
			alert("Bravo! L'activité à été supprimé !!!");
		</script>
		<?php 
	    redirect_to("Gestion_utilisateur");
	} else {
	    echo "Erreur: " . $sql . "<br>" . $con->error;
	}
}*/
?>