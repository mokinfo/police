<?php 
include("config.php");
if(isset($_POST['input'])){
  $input = $_POST['input'];

  $query = "SELECT * FROM patient WHERE nom LIKE '%{$input}%' OR age LIKE '%{$input}%' OR tel LIKE '%{$input}%' OR sitfam LIKE '%{$input}%'";

  $pieces = mysqli_query($con, $query);

  if(mysqli_num_rows($pieces) > 0 ){?>
    <table class="table  table-striped table-bordred table-hover mt-4" id="jabtak">
      <thead>
          <tr>
              <th></th>
              <th> N° </th>
              <th> Nom complet </th>
              <th> Né(e) le  </th>
              <th> Statut </th>
              <th> Arrivé à </th>
              <th> Consultation </th>
              <th> Docteur </th>
              <th> Motif </th>
              <th> Action </th>
          </tr>
      </thead>
      <tbody>
        <?php   
        while($piece = mysqli_fetch_assoc($pieces)){
          echo "<tr  bgcolor=\"#fff5e6\">";
          if ($piece['sex'] == "Féminin") {
            echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i></td>";
          }else if ($piece['sex'] == "Masculin") {
            echo "<td><i class=\"fa fa-male text-primary align-items-center\"></i></td>";
          }else{
            echo "<td><i class=\"fa fa-user text-light align-items-center\"></i></td>";
          }
          echo "<td>" . $piece['idp'] . "</td>";
          echo "<td>" . $piece['civi'] . "";
          echo " " . $piece['nom'] . "</td>";
          echo "<td>" . $piece['daten'] . "</td>";
          echo "<td>" . $piece['sex'] . "</td>";
          echo "<td>" . $piece['sitfam'] . "</td>";
          echo "<td>" . $piece['tel'] . "</td>";
          echo "<td>" . $piece['dateinsp'] . "</td>";
          echo "<td>" . $piece['address'] . "</td>";
        }?>
      </tbody>
    </table>
  <?php 
  }else{
    echo "<h6 class='text-danger text-center mt-3'>Aucune enregistrement trouvé ...</h6>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mokinfo</title>
</head>
<body>
  <script>
    $(document).ready(function(){
      $('#jaktab').DataTable();
      $('#ben').DataTable();
      $('#tokyo').DataTable();
    });
  </script>
</body>
</html>