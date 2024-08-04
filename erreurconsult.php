
        <div id="London" class="tabcontent">
          <div class="row">
            <div class="col-md-12">
              <div id="card-header bg-light">
                <form action="consultation.php" method="POST">
                  <input type="date" name="periode" class="form-control">
                  <input type="submit" name="submit" class="form-control" value="Recherchez..." />
                </form>
              </div>
              <?php 
              if(isset($_POST['periode'])){
                $periode = $_POST["periode"];
                /*if (condition) {
                  # code...
                }*/
                $conn = new mysqli('localhost', 'root', '', 'spn');
                $sql = $conn->query('SELECT consult.idpa, consult.datcons, consult.motif, consult.examc, consult.heurdc, consult.heurfc, consult.statcons, patient.nom, patient.civi FROM patient, consult where patient.idp = consult.idpa' and datcons == '$periode');
                //$sql = "SELECT * FROM piece WHERE marque like '%$marque%' AND model like '%$model%' AND annee like '%$annee%' AND descr like '%$descr%'";
                ?>
                <div id="zonereq">
                  <b>Nombre des consultations trouvés sont :
                  <?php  echo count($sql); ?></b>
                </div>
                <?php
                //$res = mysqli_query($cn, $sql);
                //$nbrligne = mysqli_num_rows($pieces); 
                ?>
              <div class="card">
                <div class="card-header bg-light"> 

                  <?php 
                            $row_cnt = $sql->num_rows;
                  ?>
                  <h5 class="card-title">Nombre des consultations trouvés sont : <b><?php  echo($row_cnt); ?></b></h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table  table-striped table-bordred table-hover" id="jaktab">
                        <thead>
                          <tr>
                            <td>Date</td>
                            <td>Nom complet</td>
                            <td>Motif</td>
                            <td>Analyse</td>
                            <td>Début</td>
                            <td>Fin</td>
                            <td>Fin</td>
                            <td>Etat</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody><?php 
                            while($data = $sql->fetch_array()){
                              if ($data['statcons'] == "A") {
                                $fik = "<td><i class=\"fa fa-hourglass-half text-warning align-items-center\"></i> En attente</td>";
                              }else if ($data['statcons'] == "F") {
                                $fik = "<td><i class=\"fa fa-check-circle text-success align-items-center\"></i> Terminer</td>";
                              }else{
                                $fik = "<td><i class=\"fa fa-arrow-circle-right text-primary align-items-center\"></i> En consultation</td>";
                              }
                              echo '<tr>
                                <td>'.$data['datcons'].'</td>
                                <td>'.$data['civi'].' '.$data['nom'].'</td>
                                <td>'.$data['motif'].'</td>
                                <td>'.$data['examc'].'</td>
                                <td>'.$data['heurdc'].'</td>
                                <td>'.$data['heurfc'].'</td>
                                <td>'.$fik.'</td>
                                <td><a href="Affiche_Consultation?id=' . $data['idpa'] .' " style=\"text-align:center;\"><i class="fas fa-eye fa-2x"></i></a></td>
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
              <?php 
              }else{
                echo "Aucun resultat sur la recherche !";
              }?><div id=\"demo\"></div>
            </div>
          </div>
        </div>
              
        
          <?php
            }
            ?>      
          <?php /*  
          <i class="fas fa-user-plus fa-3x"></i> Nouveau Patient</a>*/
          ?>