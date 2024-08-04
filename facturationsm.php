<?php 
require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
if(!isset($_SESSION['user'])){
    redirect_to("index.php");
}
require_once("tetef.php");

  /*function total(){
    $total = 0;
    
      $pieces = $this->DB->query("SELECT idf, mt FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($pieces as  $piecex) {
      $total += $piecex->mt; 
    }
    return $total;
  }*/
  function toteles(){
    
    $piecesx = $this->DB->query("SELECT sum(mt) as totales FROM facture WHERE etat = 'IMPAYER'");
    
    foreach ($piecesx as  $piecex) {
        $totel = $piecex->totales;
    }
    return $totel;
  }
?>
<script>
  function calculate_age(){
    var age = new Date(document.getElementById("age").value);
    var age_day = age.getDate();
    var age_month = age.getMonth();
    var age_year = age.getFullYear();
    
    var today_date = new Date();
    var today_day = today_date.getDate();
    var today_month = today_date.getMonth();
    var today_year = today_date.getFullYear();

    var calculated_age = 0;

    if(today_month > age_month) calculated_age = today_year - age_year;
    else if (today_month == age_month){
      if (today_day >= age_day) calculated_age = today_year - age_year;
      else calculated_age = today_year - age_year - 1;
    }
    else calculated_age = today_year - age_year - 1;

    var output_value = calculated_age;
    document.getElementById("calculated_age").value = calculated_age;
  }
  function sexedef(){
    var civi = document.getElementById("civi").value;
    var sexedef = 0;
    if (civi == "M.") sexedef = "Masculin";
    else if (civi == "Mme" || civi == "Mlle") sexedef = "Féminin";
    else sexedef = "SEXE";
    document.getElementById("sexe").value = sexedef;
  }
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal">
            <!-- small box -->
            <div class="small-box bg-light" style="box-shadow: 5px 5px 10px 5px #1F618D;">
              <div class="inner">
                <center><b style="text-align:right; font-size: 30px; color: #1F618D;">FACTURATION</b></center>
              </div>
            </div>
            </a>
          </div>
          <div class="col-lg-4 col-4">
            <a href="#" style="text-decoration: none;" data-toggle="modal" data-target="#exampleModal">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php  
                  $cosexam = new mysqli('localhost', 'root', '', 'spn');
                  $psexam = $cosexam->query("SELECT count(idp) AS nbr FROM patient");
                  while($rowexam = mysqli_fetch_assoc($psexam)){
                    $sexam = $rowexam["nbr"];}
                ?>
                <p> Nouvelle</p>
                <h3>Facture</h3>
              </div>
              <div class="icon">
                <i class="ion ion-plus" style="color:#ECF0F1;"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <a href="#" style="text-decoration: none;">
            <div class="small-box bg-light">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];}
                ?>
                <p>Journal des</p>
                <h3>Facture</h3>
              </div>
              <div class="icon">
                <i class="fas fa-file-alt" style="color:#F1948A;"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <a href="#" style="text-decoration: none;">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php  
                  $cos = new mysqli('localhost', 'root', '', 'spn');
                  $ps = $cos->query("SELECT count(idp) AS nbrs FROM patient where catp = 'PA' or catp = 'PR' or catp = 'FPA' or catp = 'FPR'" );
                  while($row = mysqli_fetch_assoc($ps)){
                    $s = $row["nbrs"];}
                ?>
                <p>Prise en</p>
                <h3>Charge</h3>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
            </div>
            </a>
          </div>


          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-light">
                      <?php 
                        $datess = date("d/m/Y");
                        $pieces = $DB->query("SELECT * FROM facture where etat = 'IMPAYER' and mt > 0");
                      ?> 
                      <?php 

                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT * FROM facture where etat = 'IMPAYER' and mt > 0");
                        
                        $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Listes des actes impayer : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktab">
                            
                            <thead>
                                <tr>
                                    <th> N° </th>
                                    <th> Libelle </th>
                                    <th> Date </th>
                                    <th> Etat </th>
                                    <th> Montant </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php   
                                foreach ($pieces as $piece):
                                    echo "<tr>";
                                    echo "<td>" . $piece->idf . "</td>";
                                    echo "<td>" . $piece->desg ."</td>";
                                    echo "<td>" . $piece->datef . "</td>";
                                    echo "<td>" . $piece->etat . "</td>";
                                    echo "<td>" . $piece->mt . "</td>";
                                    echo "<td><a href=\"Examen?id=" . $piece->idf . "\"><i class=\"fa fa-eye align-items-center\" ></i></a></tr>";
                                endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> Total :  </th>
                                    <th> <?php 
                                    $piecesx = $DB->query("SELECT sum(mt) as tot FROM facture where etat = 'IMPAYER' and mt > 0");
                                    foreach ($piecesx as  $piecex) :
                                      
                                      echo number_format($piecex->tot,2,',',' ');;
                                    endforeach; ?></th>
                                    <th>  </th>
                                </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
          <!-- right col -->
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouvelle facture</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="Nouvel_Operation" method="POST">
                    <?php   
                      $cosen = new mysqli('localhost', 'root', '', 'spn');
                      $psen = $cosen->query("SELECT MAX(ido) AS id FROM factures");
                      while($rowen = mysqli_fetch_assoc($psen)){
                          $sen = $rowen["id"] + 1;
                    ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Information générale</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-7">
                        <input type="hidden" name="ido" value="<?php echo $sen;} ?>">
                        <div class="form-group">
                          <label>Patient</label>
                          <div class="search_select_box">
                            <select class="w-100" data-live-search="true" name="idp" >
                              <?php  
                                $patient = $DB->query("SELECT * FROM patient");
                              ?>
                                  <option value="0">
                                    Nom du patient
                                  </option>
                                    
                                </thead>
                                <tbody>
                              <?php   
                                foreach ($patient as $patien):

                                ?> 
                                  <option value="<?php  echo $patien->idp ; ?>">
                                    <?php
                                      /*if ($patien->sex == "Féminin") {
                                        $sexes = "<i class=\"fa fa-female text-danger align-items-center\"></i>";
                                      }else if ($patien->sex == "Masculin") {
                                        $sexes = "<i class=\"fa fa-male text-primary align-items-center\"></i>";
                                      }else{
                                        $sexes = "<i class=\"fa fa-user text-light align-items-center\"></i>";
                                      }*/
                                      echo "<td><i class=\"fa fa-female text-danger align-items-center\"></i>- &nbsp;&nbsp; | &nbsp;&nbsp;"; 
                                      echo "<td>" . $patien->nom . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->daten . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->age . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->tel . "</td>";
                                    ?>
                                  </option><?php 
                                endforeach;?>
                                </tbody>
                              </table>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-5">
                        <div class="search_select_box">
                          <label>Type d'opération</label>
                          <select name="too" class="w-100" data-live-search="true" >
                            <?php  
                              $conacte = new mysqli('localhost', 'root', '', 'spn');
                              $pconacte = $conacte->query("SELECT * FROM acte");
                            ?>
                            <option value="0">--Choisir--</option>
                            <?php while($pconact = mysqli_fetch_assoc($pconacte)){ ?>
                            <option value="<?php echo $pconact['id']; ?>"><?php echo $pconact['libelle']; }?></option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Opérateur</label>
                            <?php 
                              $cos = new mysqli('localhost', 'root', '', 'spn');
                              $ps = $cos->query("SELECT * FROM medecin");
                            ?>
                            <select class="form-control" name="opp">
                              <option value="0">Selectionner le médecin</option>

                            <?php while($pas = $ps->fetch_array()){ ?>
                              <option value="<?php echo $pas['idmed']; ?>"><?php echo $pas['nom']; }?></option>
                            </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Assistant</label>
                          <input type="text" class="form-control" name="assist">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label>Anesthésiste</label>
                            
                            <select class="form-control" name="anes">
                              <option value="1">Dr Kamil Ahmed Kamil</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Mode d'anesthésie</label>
                          <select class="form-control" name="mode_anes">
                            <option value="0">--Choisir--</option>
                            <option value="10B">AG (anesthésie générale avec intubation)  </option>
                            <option value="10C">AR (anesthésie régionale ou locorégionale)  </option>
                            <option value="10D">AS (anesthésie par sédation sans intubation)  </option>
                            <option value="10E">AL (anesthésie locale)  </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Opération</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Indication</label>
                          <input type="text" class="form-control" name="indic">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Statut</label>
                          <input type="text" class="form-control" name="statu">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Motif d'annulation</label>
                          <input type="text" class="form-control" name="mode_ann">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-header bg-info">
                            <H4>Déroulement</H3>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transfert sanguine</label>
                          <input type="text" class="form-control" name="trans_sang">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Position patient</label>
                          <input type="text" class="form-control" name="posi_pat">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Lésions observées</label>
                          <textarea  id="compose-textarea" class="form-control" style="height: 300px" name="loos"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Gestes Opératoires</label>
                          <textarea class="form-control" name="goos"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Etat final</label>
                          <textarea class="form-control" name="effs"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Note</label>
                          <textarea class="form-control" name="notesx"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="hikolo" value="Enregistrer">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>      
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Facturation</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>De</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jusqu'à</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label></label> <br>
                                      <button type="submit" class="btn btn-primary">Facture</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table  table-striped table-bordred table-hover">
                            <thead>
                                <tr>
                                  <th> N° </th>
                                  <th> Libelle </th>
                                  <th> Date </th>
                                  <th> Etat </th>
                                  <th> Montant </th>
                                  <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","spn");

                                if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM facture WHERE datef BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['idf']; ?></td>
                                                <td><?= $row['desg']; ?></td>
                                                <td><?= $row['datef']; ?></td>
                                                <td><?= $row['etat']; ?></td>
                                                <td><?= $row['mt']; ?></td>
                                                <td><a href="Examen?id=<?= $row['idf']; ?>"><i class="fa fa-eye align-items-center" ></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mb-12">
          <div class="col-sm-6">
            <?php 
              $datess = date("d/m/Y");
              $pieces = $DB->query("SELECT * FROM facture where etat = 'IMPAYER' and mt > 0");
            ?> 
            <div class="card">
              <div class="card-header bg-warning">
                
                <b><?php echo count($pieces); ?> Listes des factures impayer</b>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table  table-striped table-bordred table-hover" id="jaktab">
                      <thead>
                          <tr>
                              <th> N° </th>
                              <th> Libelle </th>
                              <th> Date </th>
                              <th> Etat </th>
                              <th> Montant </th>
                              <th> Action </th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php   
                          foreach ($pieces as $piece):
                              echo "<tr>";
                              echo "<td>" . $piece->idf . "</td>";
                              echo "<td>" . $piece->desg ."</td>";
                              echo "<td>" . $piece->datef . "</td>";
                              echo "<td>" . $piece->etat . "</td>";
                              echo "<td>" . $piece->mt . "</td>";
                              echo "<td><a href=\"Examen?id=" . $piece->idf . "\"><i class=\"fa fa-eye align-items-center\" ></i></a></tr>";
                          endforeach;?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th> </th>
                              <th> </th>
                              <th> </th>
                              <th> Total :  </th>
                              <th> <?php 
                              $piecesx = $DB->query("SELECT sum(mt) as tot FROM facture where etat = 'IMPAYER' and mt > 0");
                              foreach ($piecesx as  $piecex) :
                                
                                echo number_format($piecex->tot,2,',',' ');;
                              endforeach; ?></th>
                              <th>  </th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                      <!-- /.col -->
                </div>
              </div>
            </div>
          </div> 
          <div class="col-sm-6">
            <div id="London" class="tabcontent">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header bg-info">
                      <?php 
                          $conn = new mysqli('localhost', 'root', '', 'spn');
                          $sql = $conn->query("SELECT * FROM facture where mt_cnss > 0");
                        
                          $row_cnt = $sql->num_rows;
                      ?>
                      <h5 class="card-title">Listes des facture CNSS : <b><?php  echo($row_cnt); ?></b></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table  table-striped table-bordred table-hover" id="jaktal">
                            <thead>
                              <tr>
                                <td>N°</td>
                                <td>Libellé</td>
                                <td>Date</td>
                                <td>Etat</td>
                                <td>Montant</td>
                                <td>Action</td>
                              </tr>
                            </thead>
                            <tbody><?php 
                                while($data = $sql->fetch_array()){
                                  echo '<tr>
                                    <td>'.$data['idf'].'</td>
                                    <td>'.$data['desg'].'</td>
                                    <td>'.$data['datef'].'</td>
                                    <td>'.$data['etat'].'</td>
                                    <td>'.$data['mt_cnss'].'</td>
                                    <td><a href="Affiche_Resultat?id=' . $data['idf'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
                                  </tr>';
                                }
                              ?><?php /* | <a href="delete_coop.php?id=' . $data['idpa'] .' "><i class="fas fa-trash-alt" style="color:red;"></i></a>*/ ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-secondary   ">
                  <h5 class="modal-title" id="exampleModalLabel">Nouvel examen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 bg-warning"> 
                      <form action="examendirect.php" method="post">
                        <?php  
                          $cosexam = new mysqli('localhost', 'root', '', 'spn');
                          $psexam = $cosexam->query("SELECT MAX(idexam) AS id FROM andoc");
                          while($rowexam = mysqli_fetch_assoc($psexam)){
                            $sexam = $rowexam["id"] + 1;
                        ?>
                        <input type="hidden" name="idexam" value="<?php echo $sexam; }?>">
                        <div class="form-group">
                          <label>Patient</label>
                          <div class="search_select_box">
                            <select class="w-100" data-live-search="true" name="idpatient" >
                              <?php  
                                $patient = $DB->query("SELECT * FROM patient");
                              ?>
                                  <option value="0">
                                    Nom du patient
                                  </option>
                                    
                                </thead>
                                <tbody>
                              <?php   
                                foreach ($patient as $patien):?> 
                                  <option value="<?php  echo $patien->idp ; ?>">
                                    <?php 
                                      echo "<td>" . $patien->nom . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->daten . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->age . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                                      echo "<td>" . $patien->tel . "</td>";
                                    ?>
                                  </option><?php 
                                endforeach;?>
                                </tbody>
                              </table>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Motif</label>
                          <input type="text" class="form-control" name="motif" placeholder="Motif">
                        </div>
                        <?php $heura = date("G:i"); $heurf = date("G:i"); ?>
                        <input type="hidden" name="heura" value="<?php echo $heura; ?>">
                        <input type="hidden" name="heurf" value="<?php echo $heurf; ?>">
                      <h2>Chimie</h2>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="fg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Glycémie à jeun </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Glycémie aléatoire  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="gtt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  GTT </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="chol" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Cholestérol </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Triglycérides </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hdlc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  HDL-chol  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ldlc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  LDL-chol  </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="br" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Billrubine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sgptalt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  SGPT (ALT)  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="alkphos" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Alkphos </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="brdi" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Bilirubine Dir / inD  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sgot" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  SGOT (AST)  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cpk" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label"> CPK </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ldh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  LDH </label>
                        </div>
                      </div>
                      <div class="col-sm-3"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urea" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Urée  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="crea" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Créatinine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ua" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Acide urique  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="na" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Soduim</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="k" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Potassium (K) </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="chlor" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Chlorure  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="calc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Calcium </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="phos" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Phosphore </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="alb" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Albumine  </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="glob" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Globuline </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ratio" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Rapport A/G </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="amy" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">  Amylase </label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Hématologie / Sérologie / Virologie</h2>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cbc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Indices CBC/RBC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="esr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">E.S.R. </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hemo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Hémoglobine</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="mala" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Paludisme</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="btct" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">BT/TC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ptaptt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">P.T/A.P.T.T</label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Les rétiques comptent</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="plat" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Plaquettes </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rha" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Rh Anticorps </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="abog" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Groupement ABO </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ctdi" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test de Combes (direct/indirect) </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="rbcm" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Morphologie des GR </label>
                        </div>
                      </div>
                      <div class="col-sm-3"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="pregt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test de grossesse</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="wt" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Test Widal </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="raf" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Facteur Ra </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tpha" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TPHA </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vdrl" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">VDRL </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hivab" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ac VIH </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hbsag" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ag Hbs </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hcvab" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Ac anti-VHC</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="mant" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Mantoux</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hcgd" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">HCG en dilution</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bruc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Brucelle </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="toxo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Toxoplasmose </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="asot" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ASOT </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hpa" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Anticorps H.pylria </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cprpcr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CRP/PCR</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="anfana" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ANF/ANA</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tbs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Sérologie TB </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="psa" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Message d'intérêt public </label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Pathologie clinique</h2>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urin" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">URINE RE </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="stol" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TABOURET RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Sperme RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="csfre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CSF RE </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="safb" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Crachats BAAR</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="abfre" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TOUS les fluides corporels RE</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bjp" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Protéine Bence Jones </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urinbs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Urine B/S</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urinbp" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">BP urinaire</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="urobil" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Urobilinogène</label>
                        </div>
                      </div>
                      <div class="col-sm-5"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="sob" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Tabouret Sang Occulte</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="srs" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Substance réduisant les selles </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="usgcpc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Frottis urétral G/C. P/C </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vsgcpc" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Écouvillon végétal G/C. P/C</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="vst" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Écouvillon végétal pour Trichomonas</label>
                        </div>
                      </div>
                      <div class="col-sm-12 bg-warning">
                        <h2>Hormones</h2>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="tsh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">TSH</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="t3" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">T3 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="t4" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">T4 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="fsh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">FSH</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="lh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">LH </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="prl" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">PRL</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="testo" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Testostérone </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="proges" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Progestérone </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="e2" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">E2 </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="gh" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Hormone de croissance</label>
                        </div>
                      </div>
                      <div class="col-sm-5"> 
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="aus" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">Échographie abdominale </label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="ecg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">ECG</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="cxr" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">CXR</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="bhcg" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">B-HCG</label>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2">
                          <input type="checkbox" name="hba1c" value="1"  >
                          </div>
                          <label class="col-sm-10 form-check-label">HBA1C</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus"> Ajouter patient</i></a>
                        </div>
                        <div class="form-group">
                          <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
                        </div>
                        <div class="form-group">
                          <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script>
  $(document).ready(function () {
      $('#ronno').DataTable();
      $('#donno').DataTable();
      $('#jaktab').DataTable();
      $('#jaktal').DataTable();
  });
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="js/popper.min.js"></script>

<script src="js/bootstrap-select.min.js"></script>

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
</body>
</html>
