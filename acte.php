<?php require("entete.php"); 
//unset($_SESSION['panier']);
?>
<?php 
if(isset($_GET['id'])){
  $article = $DB->query('SELECT id FROM article WHERE id=:id', array('id' => $_GET['id']));
  //var_dump($article);
  if(empty($article)){
      die("Ce article n'exixte pas");
  }
  $panier->add($article[0]->id);
  //die('Article à ete ajoutée ! <a href="javascript:history.back()">retourner sur le  accueil</a>');
}
?>
<style>
  body {font-family: Arial;}

  /* Style the tab */
  .tab {
    width: 100%;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons inside the tab */
  .tab button {
    width: 50%;
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */

  table{
    width: 100%;
  }
</style>
<div class="container-fluid">
	<div class="col-md-12">
    <div class="row">
      <a href="panier.php" class="btn btn-primary col-md-4"><i class="fas fa-shopping-cart"></i> Dépôt</a>
                  <a href="po.php" class="btn btn-warning col-md-3"><i class="fas fa-soap"></i> Pressing</a>
                  <a href="retrait.php" class="btn btn-info col-md-4"><i class="fas fa-shopping-bag"></i> Rétrait</a>
        <div class="col-md-7">
            <div class="card-header">
              
                <div class="card">
                    <div class="tab">
                      <button class="tablinks" onclick="openCity(event, 'Paris')"><i class="fas fa-bath"></i> Vêtment</button>
                      <button class="tablinks" onclick="openCity(event, 'London')"><i class="fas fa-home"></i> Autres nettoyage</button>
                    </div>
                    <div id="Paris" class="tabcontent"> 
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          
                          <?php $article = $DB->query('SELECT * FROM article where type = 0');?>
                          <?php foreach($article as $art): ?> 
                          <div class="col-md-2">
                                  <a class="add" href="panier.php?id=<?= $art->id;?>"  style="text-decoration: none;">
                                  <img src="images/<?= $art->image ;?>" style="border-radius:50%;" width="100" height="100"></a>
                                  <h6 class="text-center"><?= $art->name ;?></h6>
                                  <h6 class="text-center"><?= number_format($art->price,2,',',' ');?> FDJ</h6>
                          </div> 
                          <?php endforeach; ?>
                        </div>
                        <script>
                        function openCity(evt, cityName) {
                          var i, tabcontent, tablinks;
                          tabcontent = document.getElementsByClassName("tabcontent");
                          for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                          }
                          tablinks = document.getElementsByClassName("tablinks");
                          for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                          }
                          document.getElementById(cityName).style.display = "block";
                          evt.currentTarget.className += " active";
                        }
                        </script>
                      </div>
                    </div>
                </div>
            </div>  
            <script>
                function openCity(evt, cityName) {
                  var i, tabcontent, tablinks;
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }
                  document.getElementById(cityName).style.display = "block";
                  evt.currentTarget.className += " active";
                }
            </script>
            <div id="London" class="tabcontent"> 
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  
                  <?php $articles = $DB->query('SELECT * FROM article where type = 1');?>
                  <?php foreach($articles as $arts): ?> 
                  <div class="col-md-2">
                          <a class="add" href="panier.php?id=<?= $arts->id;?>"  style="text-decoration: none;">
                          <img src="images/<?= $arts->image ;?>" style="border-radius:50%;" width="100" height="100"></a>
                          <h6 class="text-center"><?= $arts->name ;?></h6>
                          <h6 class="text-center"><?= number_format($arts->price,2,',',' ');?> FDJ</h6>
                  </div> 
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-5">
            <?php 
            if(!empty($_SESSION['panier'])){
              $ids = array_keys($_SESSION['panier']);
            }
            if (empty($ids)) {
                $article = array();
            }else{
                $article = $DB->query('SELECT * FROM article WHERE id IN ('.implode(',',$ids).')');
            }
            ?>
            <table class='table table-bordered table-striped'>
                <tr>
                    <th class="bg-primary text-white">ID</th>
                    <th class="bg-primary text-white">ARTICLE</th>
                    <th class="bg-primary text-white">Prix</th>
                    <th class="bg-primary text-white">Quantité</th>
                    <th class="bg-primary text-white">Montant</th>
                    <th class="bg-primary text-white">Action</th>
                </tr>
                <form class="form-horizontal" action="depot.php" method="POST">
                  <div class="card-header bg-warning">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="etat" id="flexSwitchCheckChecked">
                      <label class="form-check-label" for="flexSwitchCheckChecked">En urgence</label>
                    </div>
                  </div>
            <?php foreach ($article as $art): ?>
                <tr>
                    <td><?= $art->id; ?></td>
                    <input type="hidden" name="id" value="<?= $art->id; ?>">
                    <td><?= $art->name; ?></td>
                    <input type="hidden" name="name" value="<?= $art->name; ?>">
                    <td><?= $art->price; ?></td>
                    <td><center><?= $_SESSION['panier'][$art->id]; ?></center></td>
                    <td><center><?= $art->price * $_SESSION['panier'][$art->id]; ?></center></td>
                    <input type="hidden" name="id" value="<?= $art->price * $_SESSION['panier'][$art->id]; ?>">
                    <td><a class="" href="panier.php?delPanier=<?= $art->id; ?>"><center><i class="fas fa-trash" style="color:red"></i></center></a></td>
                </tr>
            <?php endforeach; ?>
            </table>
            <table class='table table-bordered'>
              <tr>
                  <th class="bg-primary text-white">TOTAL : </th>
                  <th class="bg-primary text-white"><center><?php if (!empty($_SESSION['panier'])) {
                      echo (number_format($panier->total(),2,',',' '));
                  }
                  else{ echo "0";
                  }?> FDJ</center></th>
                  <th><a href="panier.php?supprimetout" class="btn btn-warning btn-block"><i class="fas fa-trash-alt"></i> Supprimer tout</a></th>
                  <th>
                    <input type="checkbox" name="paiement" class="btn-check" id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-info" for="btn-check-outlined"><i class="fas fa-money-bill-wave"></i> Payer</label>
                    <input type="checkbox" name="remise" class="btn-check" id="btn-check-outlined2" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btn-check-outlined2"><i class="fas fa-percent"></i> Rémise</label>

              </tr>
            </table>
            <div class="row g-3">
              <div class="col-md-8">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="client">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <input type="text" class="form-control" name="adresse">
                  </div>
                </div>
                </div>
              <div class="col-md-4">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="tel" data-inputmask='"mask": "(999) 99-99-99"' data-mask>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" name="email" class="form-control" data-inputmask='"mask": "(999) 99-99-99"' data-mask>
                  </div>
                </div>
              </div>
            </div>
            
            <br>
            <?php 
              $conn = new mysqli('localhost', 'root', '', 'pone');
              $sql = $conn->query("SELECT MAX(id_depot) AS idss FROM depot");
              while($row = mysqli_fetch_assoc($sql)){
                $ss = $row["idss"] + 1;
            ?>
            <input type="hidden" name="iddepot" value="<?php   echo $ss;} ?>">
            <input type="submit" value="Déposer" class="btn btn-primary form-control">
             </form> 
             <?php /*
                function pre_r($array){
                  echo '<pre>';
                  print_r($array);
                  echo '</pre>';
                }
                pre_r($_SESSION['panier']);*/
                

             ?>  
        </div> 
    </div>     
  </div>
</div>
<?php require("pied.php"); ?>