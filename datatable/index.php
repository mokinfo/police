<!DOCTYPE html>
<html>
<head>
	<title>Mokinfo</title>
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="jquery-3.5.1.js"></script>
	<script src="jquery-3.5.1.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
	<script src="jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="bootstrap.min.js"></script>
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
	    width: 20%;
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

</head>
<body>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Paris')"><i class="fas fa-user-plus"></i> Nouveau</button>
  <button class="tablinks" onclick="openCity(event, 'London')"><i class="fas fa-list"></i> Liste des coopératives</button>
  <button class="tablinks" onclick="openCity(event, 'Yaris')"><i class="fas fa-list"></i> Liste des activités</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')"><i class="fas fa-hive"></i> Suivi du coopérative</button>
  <button class="tablinks" onclick="openCity(event, 'djibouti')"><img src="images/import.png" width="30" height="30">Importer les données</button>
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
		
	<table id="table_id" class="display">
	    <thead>
	        <tr>
	            <th>Column 1</th>
	            <th>Column 2</th>
	        </tr>
	    </thead>
	    <tbody>
	        <tr>
	            <td>Row 1 Data 1</td>
	            <td>Row 1 Data 2</td>
	        </tr>
	        <tr>
	            <td>Row 2 Data 1</td>
	            <td>Row 2 Data 2</td>
	        </tr>
	    </tbody>
	</table>
	<div id="Paris" class="tabcontent"> 
                  
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="card card-primary">
                          <div class="card-header bg-info">
                            <h3 class="card-title">Ajoute un coopérative</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                          </div>
                          <div class="card-body">
                            <form class="form-horizontal" action="nouv_coop.php" method="POST">
                                
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Nom : </label>
                                  <div class="col-sm-8">
                                     <input type="text" name="nom" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Région : </label>
                                  <div class="col-sm-8">
                                     <select name="region"  class="form-control">
                                        <option value="0">--Région--</option>
                                        <option value="1">Djibouti-Ville</option>
                                        <option value="2">Arta</option>
                                        <option value="3">Ali Sabieh</option>
                                        <option value="4">Dikhil</option>
                                        <option value="5">Tadjourah</option>
                                        <option value="6">Obock</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Localité : </label>
                                  <div class="col-sm-8">
                                    <input type="text" name="localite" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Type : </label>
                                  <div class="col-sm-8">
                                    <input type="text" name="type" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Membre : </label>
                                  <div class="col-sm-8">
                                    <input type="text" name="membre" class="form-control" id="inputEmail3">
                                  </div>
                                </div> 
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Régularisation : </label>
                                  <div class="col-sm-8">
                                     <select name="regu"  class="form-control">
                                        <option value="0">--Suivie--</option>
                                        <option value="1">OUI</option>
                                        <option value="2">NON</option>
                                        <option value="3">En-cours</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Montant : </label>
                                  <div class="col-sm-8">
                                    <input type="text" name="montant" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Date : </label>
                                  <div class="col-sm-8">
                                    <input type="date" name="dates" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <button type="submit" name="Enregistrer" class="btn btn-info">Enregistrer</button>
                                  <button type="submit" name="Annuler" class="btn btn-default float-right">Annuler</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="card card-primary">
                          <div class="card-header bg-warning">
                            <h3 class="card-title">Ajoute une activité</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                          </div>
                          <div class="card-body">
                            <form class="form-horizontal" action="nouv_activite_coop.php" method="POST">
                                <div class="form-group row">
                                  
                                  <div class="col-sm-8"> 
                                     
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Nom : </label>
                                  <div class="col-sm-8">
                                     <input type="text" name="noms" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Date : </label>
                                  <div class="col-sm-8">
                                    <input type="date" name="datess" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-4 col-form-label">Montant : </label>
                                  <div class="col-sm-8">
                                    <input type="text" name="montants" class="form-control" id="inputEmail3">
                                  </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <button type="submit" name="cooop" class="btn btn-warning">Enregistrer</button>
                                  <button type="submit" name="Annuler" class="btn btn-default float-right">Annuler</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<script>
		
$(document).ready( function () {
    $('#table_id').DataTable();
    $('#jaktab').DataTable();
} );
</script>
<script>/*
  $(document).ready(function(){
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();
  });*/
</script>
</body>
</html>