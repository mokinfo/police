<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de Questionnaire</title>
  <!-- Liens vers Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.red-text{color: #1ABFD4; height: bold;}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>
<script>
/*    function validate(val) {
    v1 = document.getElementById("fname");
    v2 = document.getElementById("lname");
    v3 = document.getElementById("email");
    v4 = document.getElementById("mob");
    v5 = document.getElementById("job");
    v6 = document.getElementById("ans");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;

    if(val>=1 || val==0) {
        if(v1.value == "") {
            v1.style.borderColor = "red";
            flag1 = false;
        }
        else {
            v1.style.borderColor = "green";
            flag1 = true;
        }
    }

    if(val>=2 || val==0) {
        if(v2.value == "") {
            v2.style.borderColor = "red";
            flag2 = false;
        }
        else {
            v2.style.borderColor = "green";
            flag2 = true;
        }
    }
    if(val>=3 || val==0) {
        if(v3.value == "") {
            v3.style.borderColor = "red";
            flag3 = false;
        }
        else {
            v3.style.borderColor = "green";
            flag3 = true;
        }
    }
    if(val>=4 || val==0) {
        if(v4.value == "") {
            v4.style.borderColor = "red";
            flag4 = false;
        }
        else {
            v4.style.borderColor = "green";
            flag4 = true;
        }
    }
    if(val>=5 || val==0) {
        if(v5.value == "") {
            v5.style.borderColor = "red";
            flag5 = false;
        }
        else {
            v5.style.borderColor = "green";
            flag5 = true;
        }
    }
    if(val>=6 || val==0) {
        if(v6.value == "") {
            v6.style.borderColor = "red";
            flag6 = false;
        }
        else {
            v6.style.borderColor = "green";
            flag6 = true;
        }
    }

    flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

    return flag;
}*/
</script>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h3>FORMATION DES AGENTS DE TERRAIN POUR LE DÉNOMBREMENT GÉNÉRAL DU RGPH-3</h3>
            <p class="blue-text">(Décret N° 2021 - 191/PR/MEFI)<br></p>
            <p class="red-text">DURÉE: 20 MINUTES<br></p>
            <div class="card">
                <h5 class="text-center mb-4">QUIZ ÉCLAIR – TEST DE CONNAISSANCES</h5>
                <form class="form-card" onsubmit="event.preventDefault()">
                     <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nom complet<span class="text-danger"> *</span></label> <input type="text" id="nom" name="nom" placeholder="" onblur="validate(4)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Site<span class="text-danger"> *</span></label>
                        <select class="form-control" id="site" name="site">
                            <option value="0">------------</option>
                            <option value="a">EMD</option>
                            <option value="b">IAD</option>
                            <option value="c">ACADEMI ARABE SALINE OUEST</option>
                            <option value="d">ACADEMI ARABE GABODE</option>
                          </select>  </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Salle<span class="text-danger"> *</span></label> <select class="form-control" id="salle" name="salle">
                            <option value="0">------------</option>
                            <option value="Salle_1">Salle 1</option>
                            <option value="Salle_2">Salle 2</option>
                            <option value="Salle_3">Salle 3</option>
                            <option value="Salle_4">Salle 4</option>
                            <option value="Salle_5">Salle 5</option>
                            <option value="Salle_6">Salle 6</option>
                            <option value="Salle_7">Salle 7</option>
                            <option value="Salle_8">Salle 8</option>
                          </select> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Niveau<span class="text-danger"> *</span></label> <select class="form-control" id="salle" name="salle">
                            <option value="0">------------</option>
                            <option value="OTI">OTI</option>
                            <option value="BEPC">BEPC</option>
                            <option value="BAC">BAC</option>
                            <option value="BAC1">BAC +1</option>
                            <option value="BAC2">BAC +2</option>
                            <option value="LICENCE">LICENCE</option>
                            <option value="M1">MASTER 1</option>
                            <option value="M2">MASTER 2</option>
                          </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q01. D’après vous, que signifie l’acronyme de RGPH ?<span class="text-danger"> *</span></label> <select class="form-control" id="q1" name="q1">
                            <option value="0">------------</option>
                            <option value="a">a. Recensement Géographique des Points d'Habitat</option>
                            <option value="b">b. Recensement Général des Projets de l'Habitat</option>
                            <option value="c">c. Recensement Général de la Population et de l'Habitat*</option>
                            <option value="d">d. Recensement Géographique de la Population et des Habitudes</option>
                          </select> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q02. Quel est l'objectif principal du recensement?<span class="text-danger"> *</span></label> <select class="form-control" id="q2" name="q2">
                            <option value="0">------------</option>
                            <option value="a">a. Récolter des informations sur la densité de population dans les zones urbaines</option>
                            <option value="b">b. Collecter des données démographiques et socio-économiques sur la population*</option>
                            <option value="c">c. Évaluer la taille des marchés immobiliers dans les grandes villes</option>
                            <option value="d">d. Déterminer la répartition géographique des infrastructures routières</option>
                        </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q03. Quel est le rôle d’un agent recenseur ? <span class="text-danger"> *</span></label> 
                        <select class="form-control" id="q3" name="q3">
                            <option value="0">------------</option>
                            <option value="a">a. Organiser des séances d'entraînement pour les sportifs locaux</option>
                            <option value="b">b. Collecter des données sur la population et les habitations dans des zones désignées</option>
                            <option value="c">c. Étudier les migrations des oiseaux dans les régions côtières</option>
                            <option value="d">d. Analyser les tendances de consommation alimentaire dans les ménages</option>
                        </select> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q04. Quelle est la fréquence à laquelle un recensement est généralement mené dans un pays ?<span class="text-danger"> *</span></label> 
                        <select class="form-control" id="q4" name="q4">
                            <option value="0">------------</option>
                            <option value="a">a. Tous les 2 ans</option>
                            <option value="b">b. Tous les 5 ans</option>
                            <option value="c">c. Tous les 10 ans</option>
                            <option value="d">d. Tous les 20 ans</option>
                        </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q05. Pourquoi est-il important de compter chaque personne lors du recensement? <span class="text-danger"> *</span></label> 
                            <select class="form-control" id="q5" name="q5">
                                <option value="0">------------</option>
                                <option value="a">a. Pour déterminer le nombre de personnes éligibles à des avantages sociaux</option>
                                <option value="b">b. Pour établir des quotas de représentation politique</option>
                                <option value="c">c. Pour planifier les services publics et allouer les ressources gouvernementales</option>
                                <option value="d">d. Pour identifier les noms des habitants les plus célèbres de la région</option>
                            </select></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q06. Selon vous, qu'est-ce qu'un ménage selon la définition du recensement ?<span class="text-danger"> *</span></label> 
                        <select class="form-control" id="q6" name="q6">
                            <option value="0">------------</option>
                            <option value="a">a. Un groupe de personnes partageant, entre autres, un même domicile</option>
                            <option value="b">b. Un ensemble de biens immobiliers situés dans une zone résidentielle</option>
                            <option value="c">c. Une entreprise familiale opérant dans le secteur de l'agriculture</option>
                            <option value="d">d. Une association locale de quartier</option>
                        </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q07. Qu'est-ce qu'une variable démographique ? <span class="text-danger"> *</span></label> 
                            <select class="form-control" id="q7" name="q7">
                                <option value="0">------------</option>
                                <option value="a">a. Un élément qui peut prendre différentes valeurs et qui est mesuré lors du recensement</option>
                                <option value="b">b. Un type de carte utilisé pour représenter la topographie d'une région</option>
                                <option value="c">c. Un terme utilisé pour désigner une petite ville ou un village</option>
                                <option value="d">d. Un outil de mesure de la qualité de l'air dans les zones urbaines</option>
                            </select></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q08. Quelle est la différence entre un recensement de facto et un recensement de jure ?<span class="text-danger"> *</span></label> 
                        <select class="form-control" id="q8" name="q8">
                            <option value="0">------------</option>
                            <option value="a">a. Le recensement de facto compte la population présente tandis que le recensement de jure compte la population résidente</option>
                            <option value="b">b. Le recensement de facto est réalisé tous les 5 ans, tandis que le recensement de jure est réalisé tous les 10 ans</option>
                            <option value="c">c. Le recensement de facto est mené uniquement dans les zones rurales, tandis que le recensement de jure est mené uniquement dans les zones urbaines</option>
                            <option value="d">d. Il n'y a pas de différence entre les deux termes, ils sont interchangeables</option>
                        </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q09. Quel est l'outil le plus couramment utilisé pour collecter des données lors du recensement ? <span class="text-danger"> *</span></label> 
                            <select class="form-control" id="q9" name="q9">
                                <option value="0">------------</option>
                                <option value="a">a. Le téléphone portable</option>
                                <option value="b">b. Le questionnaire papier</option>
                                <option value="c">c. La caméra vidéo</option>
                                <option value="d">d. La tablette</option>
                            </select></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Q10. Qu'est-ce que l'échantillonnage dans le contexte du recensement ?<span class="text-danger"> *</span></label> 
                        <select class="form-control" id="q10" name="q10">
                            <option value="0">------------</option>
                            <option value="a">a. La collecte de données sur les échantillons de sol dans les zones agricoles</option>
                            <option value="b">b. La sélection d'un sous-ensemble de la population à interroger plutôt que de questionner tout le monde</option>
                            <option value="c">c. L'enregistrement de la densité de population dans les zones urbaines densément peuplées</option>
                            <option value="d">d. La surveillance de la migration des animaux sauvages dans les parcs nationaux</option>
                        </select> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">  <button type="submit" class="btn-block btn-primary">SOUMETTRE</button> </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>