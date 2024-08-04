<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
  <script>
  //Système d'onglet

let afficherOnglet = function (a, animations) {
    if (animations === undefined) {
        animations = true
    }
    let li = a.parentNode
    let div = a.parentNode.parentNode.parentNode
    let activeTab = div.querySelector(".tab-content.active") //contenu actif
    let aAfficher = div.querySelector(a.getAttribute("href")) //contenu à afficher

    // Si on clique sur l'onglet deja actif on ne modifie rien
    if (li.classList.contains("active")) {
        return false
    }

    //on retire la class "active"
    div.querySelector(".tabs .active").classList.remove("active")

    //ajouter la class active à l'onglet actuel
    li.classList.add("active")

    if (animations) {

        activeTab.classList.add("fade")
        activeTab.classList.remove("in")

        let transitionends = function () {

            this.classList.remove("fade")
            this.classList.remove("active")
            aAfficher.classList.add("fade")
            aAfficher.classList.add("active")
            aAfficher.offsetWidth //On force le navi à ne pas réaliser les OP en même temps
            aAfficher.classList.add("in")
            activeTab.removeEventListener("transitionend", transitionends)
            activeTab.removeEventListener("WebkitTransitionEnd", transitionends)
            activeTab.removeEventListener("oTransitionEnd", transitionends)
        }

        activeTab.addEventListener("transitionend", transitionends)
        activeTab.addEventListener("WebkitTransitionEnd", transitionends)
        activeTab.addEventListener("oTransitionEnd", transitionends)
    } else {
        aAfficher.classList.add("active")
        activeTab.classList.remove("active")
    }
}

let tabs = document.querySelectorAll(".tabs a")

for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", function (e) {
        afficherOnglet(this)
    })
}

//Garder les onglets actif lors de l'actualisation de la page et Lorsque l'on fais précédent le hash et l'onglet change.
var hashChange = function () {
    let hash = window.location.hash
    let a = document.querySelector('a[href="' + hash + '"]')
    // Si j'ai un élément qui correspont à "a" et que mon élément n'a pas la classe active alors...
    if (a !== null && !a.parentNode.classList.contains("active")) {
        afficherOnglet(a, e !== undefined)
    }
}

window.addEventListener("hashchange", hashChange)
hashChange()
  </script>


</head>
<body>
  <button id="myBtn" class="btn btn-light"><i class="fas fa-plus"></i> Examen Clinique</button>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="card-header">
          Veuillez remplir le formulaire
          <span class="close">&times;</span>
      </div>
      <div id="che">
        <h2>Chimie</h2>
        <input type="checkbox" name="fg" value="1">Fasting Glucose<br>
        <input type="checkbox" name="rg" value="1">Random Glucose<br>
        <input type="checkbox" name="gtt" value="1">GTT<br>
        <input type="checkbox" name="chol" value="1">Cholesterol<br>
        <input type="checkbox" name="tc" value="1">Triglycerides<br>
        <input type="checkbox" name="hdlc" value="1">HDL Chol<br>
        <input type="checkbox" name="ldlc" value="1">LDL Chol<br>
        <input type="checkbox" name="br" value="1">Billrubin<br>
        <input type="checkbox" name="sgptalt" value="1">SGPT (ALT)<br>
        <input type="checkbox" name="alkphos" value="1">Alk phos<br>
        <input type="checkbox" name="brdi" value="1">Bilirubin Dir / inD<br>
        <input type="checkbox" name="sgot" value="1">SGOT (AST)<br>
        <input type="checkbox" name="cpk" value="1">CPK<br>
        <input type="checkbox" name="ldh" value="1">LDH<br>
        <input type="checkbox" name="urea" value="1">Urea<br>
        <input type="checkbox" name="crea" value="1">Creatinine<br>
        <input type="checkbox" name="ua" value="1">Uric Acid<br>
        <input type="checkbox" name="na" value="1">Soduim (NA)<br>
        <input type="checkbox" name="k" value="1">Potassium (K)<br>
        <input type="checkbox" name="chlor" value="1">Chloride<br>
        <input type="checkbox" name="calc" value="1">Calcium<br>
        <input type="checkbox" name="phos" value="1">Phosphorus<br>
        <input type="checkbox" name="alb" value="1">Albumin<br>
        <input type="checkbox" name="glob" value="1">Globulin<br>
        <input type="checkbox" name="ratio" value="1">A/G ratio<br>
        <input type="checkbox" name="amy" value="1">Amylase<br>
      </div>
      <div id="hem">
        <h2>Hématologie</h2>  
        <input type="checkbox" name="cbc" value="1">CBC/RBC indices<br>
        <input type="checkbox" name="esr" value="1">E.S.R<br>
        <input type="checkbox" name="hemo" value="1">Hemoglobin<br>
        <input type="checkbox" name="mala" value="1">Malaria<br>
        <input type="checkbox" name="btct" value="1">BT/CT<br>
        <input type="checkbox" name="ptaptt" value="1">P.T/A.P.T.T<br>
        <input type="checkbox" name="rc" value="1">Retics count<br>
        <input type="checkbox" name="plat" value="1">Platelets<br>
        <input type="checkbox" name="rha" value="1">Rh Antibody<br>
        <input type="checkbox" name="abog" value="1">ABO Grouping<br>
        <input type="checkbox" name="ctdi" value="1">Coombs test (Direct/Indirect)<br>
        <input type="checkbox" name="rbcm" value="1">RBC Morphology<br>
        <h2>Sérologie / Virologie</h2>  
        <input type="checkbox" name="pregt" value="1">Pregnancy test<br>
        <input type="checkbox" name="wt" value="1">Widal Test<br>
        <input type="checkbox" name="raf" value="1">Ra factor<br>
        <input type="checkbox" name="tpha" value="1">TPHA<br>
        <input type="checkbox" name="vdrl" value="1">VDRL<br>
        <input type="checkbox" name="hivab" value="1">HIV Ab<br>
        <input type="checkbox" name="hbsag" value="1">Hbs Ag<br>
        <input type="checkbox" name="hcvab" value="1">HCV Ab<br>
        <input type="checkbox" name="mant" value="1">Mantoux<br>
        <input type="checkbox" name="hcgd" value="1">HCG in dilition<br>
        <input type="checkbox" name="bruc" value="1">Brucella<br>
        <input type="checkbox" name="toxo" value="1">Toxoplasmosis<br>
        <input type="checkbox" name="asot" value="1">ASOT<br>
        <input type="checkbox" name="hpa" value="1">H.pylria Antibody<br>
        <input type="checkbox" name="cprpcr" value="1">CRP/PCR<br>
        <input type="checkbox" name="anfana" value="1">ANF/ANA<br>
        <input type="checkbox" name="tbs" value="1">TB serology<br>
        <input type="checkbox" name="psa" value="1">PSA<br>
      </div>
      <div id="cli">
        <h2>La pathologie clinique</h2> 
        <input type="checkbox" name="urin" value="1">URINE RE<br>
        <input type="checkbox" name="stol" value="1">STOOL RE<br>
        <input type="checkbox" name="sre" value="1">Semen RE<br>
        <input type="checkbox" name="csfre" value="1">CSF RE<br>
        <input type="checkbox" name="safb" value="1">Sputum AFB<br>
        <input type="checkbox" name="abfre" value="1">ALL Body Fluid RE<br>
        <input type="checkbox" name="bjp" value="1">Bence Jones Protein<br>
        <input type="checkbox" name="urinbs" value="1">Urine B/S<br>
        <input type="checkbox" name="urinbp" value="1">Urine B/P<br>
        <input type="checkbox" name="urobil" value="1">Urobilinogen<br>
        <input type="checkbox" name="sob" value="1">Stool Occult Blood<br>
        <input type="checkbox" name="srs" value="1">Stool Reducing Substance<br>
        <input type="checkbox" name="usgcpc" value="1">Urethral Smear G/C. P/C<br>
        <input type="checkbox" name="vsgcpc" value="1">Veginal Swab G/C. P/C<br>
        <input type="checkbox" name="vst" value="1">Veginal Swab for Trichomonas<br>
        <h2>Hormones</h2> 
        <input type="checkbox" name="tsh" value="1">TSH<br>
        <input type="checkbox" name="t3" value="1">T3<br>
        <input type="checkbox" name="t4" value="1">T4<br>
        <input type="checkbox" name="fsh" value="1">FSH<br>
        <input type="checkbox" name="lh" value="1">LH<br>
        <input type="checkbox" name="prl" value="1">PRL<br>
        <input type="checkbox" name="testo" value="1">Testosterone<br>
        <input type="checkbox" name="proges" value="1">Progesterone<br>
        <input type="checkbox" name="e2" value="1">E2<br>
        <input type="checkbox" name="gh" value="1">Growth hormone<br>
        <input type="checkbox" name="aus" value="1">Abdominal Ultra-Sound<br>
        <input type="checkbox" name="ecg" value="1">ECG<br>
        <input type="checkbox" name="cxr" value="1">CXR<br>
        <input type="checkbox" name="bhcg" value="1">B-HCG<br>
        <input type="checkbox" name="hba1c" value="1">HBA1C<br>
      </div>
      <div class="card-footer">
        <button type="submit" name="Enregistrer" class="btn btn-primary">Enregistrer</button>
        <button type="submit" name="Annuler" class="btn btn-default float-right">Annuler</button>
      </div>
    </div>
  </div> 
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