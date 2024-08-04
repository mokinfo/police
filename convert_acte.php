<?php 
require_once("includes/session.php");
require 'db.class.php';
$DB = new DB();?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); 


$conn = new mysqli('localhost', 'root', '', 'spn');
$sql = $conn->query("SELECT acte.id, acte.libelle, acte.prix_struct, acte.prix_cnss, acte.prix_diff, actes.ida, actes.intitule FROM acte, actes where acte.id = actes.intitule");
while($data = $sql->fetch_array()){
	$id = $data['intitule'];
	$intitules = $data['libelle'];
	$prix_structs = $data['prix_struct'];
	$rem_cnsss = $data['prix_cnss'];
	$prix_tickets = $data['prix_diff'];
	
	$conns = new mysqli('localhost', 'root', '', 'spn');
	$queryss = "UPDATE actes SET intitule = '$intitules', prix_struct = '$prix_structs',  rem_cnss = '$rem_cnsss', prix_ticket = '$prix_tickets' WHERE intitule ='$id'";
	$query_runss = mysqli_query($conns, $queryss);
}
if ($query_runss) {
	$_SESSION['statut'] = "L'acte est ajouté avec succès et avec leurs libellés.";
	header("Location: Liste_Hospitalisation");
	exit(0);
	//var_dump($_POST);
	//var_dump($_SESSION['user']);
}else{
	$_SESSION['statut'] = "L'acte n'est pas ajouté.";
	header("Location: Liste_Hospitalisation");
	exit(0);
}

if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetehos.php");
?>

	<?php 
		if (isset($_SESSION['statut'])) {
		  ?>
		    <h4 class="alert alert-success"><?php echo $_SESSION['statut']; ?></h4>
		  <?php 
		  unset($_SESSION['statut']);
		}
	?>
<!-- jQuery -->
<script>
  $(document).ready(function () {
      $('#ronno').DataTable();
  });
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="script.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>


<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>



</body>
</html>
