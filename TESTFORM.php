<form action="nentree.php" method="post">
  <?php   
    $cosen = new mysqli('localhost', 'root', '', 'spn');
    $psen = $cosen->query("SELECT MAX(ident) AS id FROM entre");
    while($rowen = mysqli_fetch_assoc($psen)){
      $sen = $rowen["id"] + 1;
  ?>
  <input type="hidden" name="ident" value="<?php echo $sen;} ?>">
  <input type="hidden" id="catpat" value="<?php echo $catpat; ?>">

  <div class="form-group">
    <label>Patient</label>
    <div class="search_select_box">
      <select class="w-100" data-live-search="true" name="idpatient" required>
        <option value="0">Liste de(s) patient(s)</option>
        <?php  
          $patient = $DB->query("SELECT * FROM patient");
          $catpat = 0; 
          foreach ($patient as $patien):?> 
            <option value="<?php  echo $patien->idp ; ?>">
              <?php 
                echo $patien->nom . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                echo $patien->daten . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                echo $patien->age . "&nbsp;&nbsp; | &nbsp;&nbsp;";
                echo $patien->tel;
              ?>
            </option>
            <?php
              $catpat = $patien->catp; 
          endforeach;
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" name="motif" placeholder="Motif" value="">
  </div>

  <div class="form-group">
    <label>Consultation</label>
    <select class="form-control" name="medecin" required>
      <option value="0">-- type de médecin --</option>
      <option value="GEN">Généraliste</option>
      <option value="DEN">Dentiste</option>
      <option value="CTC">Chirurgie thoracique cardiovasculaire</option>
      <option value="OPH">Ophtalmologie</option>
      <option value="CAN">Cancérologie</option>
      <option value="ORL">ORL</option>
      <option value="CAR">Cardiologie</option>
      <option value="ORT">Orthopédie</option>
      <option value="CHP">Chirurgie pédiatrique</option>
      <option value="PED">Pédiatrie</option>
      <option value="URO">Urologie</option>
      <option value="NEU">Neurologie</option>
      <option value="ANS">Anesthesie</option>
      <option value="GYO">Gynécologie obstétrique</option>
      <option value="CHG">Chirurgie générale</option>
      <option value="GAS">Gastrologie</option>
      <option value="HEM">Hématologie</option>
      <option value="URG">Urgence</option>
    </select>
  </div>

  <div class="form-group">
    <label>Type de paiement</label>
    <select class="form-control" name="paix" id="paix" required>
      <option value="0">-- Paiement --</option>
      <option value="ESP">Espèce</option>
      <option value="PSC">Prise en charge</option>
    </select>
  </div>

  <?php $heura = date("G:i"); $heurf = date("G:i"); ?>
  <input type="hidden" name="heura" value="<?php echo $heura; ?>">
  <input type="hidden" name="heurf" value="<?php echo $heurf; ?>">

  <div class="modal-footer">
    <div class="form-group">
      <input class="form-control bg-success" type="submit" name="enreg" value="Enregistrer">
    </div>
    <div class="form-group">
      <input class="form-control bg-warning" type="reset" name="reset" value="Réinitialiser">
    </div>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  var catpat = $('#catpat').val();
  if (catpat == 'CAS' || catpat == 'AGE' || catpat == 'FAE') {
    $('#paix').val('0');
    $('#paix').closest('.form-group').hide();
  }
});
</script>