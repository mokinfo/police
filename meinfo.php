<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de Questionnaire</title>
  <!-- Liens vers Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2>Questionnaire</h2>
  <form id="questionnaireForm">
    <div class="mb-3">
      <label for="q1" class="form-label">Q01. D’après vous, que signifie l’acronyme de RGPH ?</label>
      <select class="form-select" id="q1" name="q1">
        <option value="a">Recensement Géographique des Points d'Habitat</option>
        <option value="b">Recensement Général des Projets de l'Habitat</option>
        <option value="c">Recensement Général de la Population et de l'Habitat*</option>
        <option value="d">Recensement Géographique de la Population et des Habitudes</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="q2" class="form-label">Q02. Quel est l'objectif principal du recensement?</label>
      <select class="form-select" id="q2" name="q2">
        <option value="a">Récolter des informations sur la densité de population dans les zones urbaines</option>
        <option value="b">Collecter des données démographiques et socio-économiques sur la population*</option>
        <option value="c">Évaluer la taille des marchés immobiliers dans les grandes villes</option>
        <option value="d">Déterminer la répartition géographique des infrastructures routières</option>
      </select>
    </div>

    <!-- Ajoutez les autres questions ici avec des balises similaires -->
    
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>

<!-- Liens vers Bootstrap JS et SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12"></script>

<script>
  document.getElementById('questionnaireForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Récupération des réponses du formulaire
    const formData = new FormData(this);
    // Envoi des données PHP
    fetch('traitement.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      // Affichage d'une alerte SweetAlert
      Swal.fire({
        title: 'Succès!',
        text: 'Vos données ont été mémorisées dans la base de données.',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    })
    .catch(error => {
      console.error('Erreur lors de l\'envoi des données:', error);
    });
  });
</script>

</body>
</html>