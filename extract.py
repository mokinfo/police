from bs4 import BeautifulSoup

html = '''
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="c_hdl" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> C-HDL </label>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="c_ldl" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> C-LDL </label>
</div>
<!-- Protéinurie -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="proteinurie" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Protéinurie </label>
</div>

<!-- Fer sérique -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="fer_serique" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Fer sérique </label>
</div>

<!-- Ferritine (Ferritinémie) -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ferritine" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Ferritine (Ferritinémie) </label>
</div>

<!-- Protéinurie de 24H -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="proteinurie_24h" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Protéinurie de 24H </label>
</div>

<!-- CK-MB -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ck_mb" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> CK-MB </label>
</div>

<!-- Lipasémie -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="lipasemie" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Lipasémie </label>
</div>

<!-- GE/FM -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ge_fm" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> GE/FM </label>
</div>
<!-- Coproculture -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="coproculture" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Coproculture </label>
</div>

<!-- Examen cytobactériologique des expectorations -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="cytobacterio_expectorations" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Examen cytobactériologique des expectorations (crachats) </label>
</div>

<!-- Liquide de ponction (ascite - pleural - péricardique - péritonéal) -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="liquide_ponction" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Liquide de ponction (ascite - pleural - péricardique - péritonéal) </label>
</div>

<!-- Recherche de Rota/Adénovirus dans les selles -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="recherche_rotadeno_selles" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Recherche de Rota/Adénovirus dans les selles </label>
</div>

<!-- Recherche Ag. H.pylori dans les selles -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="recherche_ag_h_pylori_selles" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Recherche Ag. H.pylori dans les selles </label>
</div>

<!-- Recherche HAV dans les selles -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="recherche_hav_selles" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Recherche HAV dans les selles </label>
</div>

<!-- PSA free -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="psa_free" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> PSA free </label>
</div>

<!-- Progestérone -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="progestérone" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Progestérone </label>
</div>

<!-- Ac Anti Hbs -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ac_anti_hbs" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Ac Anti Hbs </label>
</div>

<!-- Œstradiol -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="oestradiol" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Œstradiol </label>
</div>

<!-- Ag Hbe -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ag_hbe" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Ag Hbe </label>
</div>

<!-- Ac Anti Hbe -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="ac_anti_hbe" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Ac Anti Hbe </label>
</div>

<!-- NT-proBNP -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="nt_proBNP" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> NT-proBNP </label>
</div>

<!-- ASLO -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="aslo" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> ASLO </label>
</div>

<!-- HAV -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="hav" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> HAV </label>
</div>

<!-- Sérologie Typhoïde -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="serologie_typhoide" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Sérologie Typhoïde </label>
</div>

<!-- Sérologie Brucellose -->
<div class="form-group row">
    <div class="col-sm-2">
        <input type="checkbox" name="serologie_brucellose" value="1">
    </div>
    <label class="col-sm-10 form-check-label"> Sérologie Brucellose </label>
</div>
'''

soup = BeautifulSoup(html, 'html.parser')

# Trouver tous les éléments input de type checkbox
checkboxes = soup.find_all('input', {'type': 'checkbox'})

# Extraire les valeurs de l'attribut name
names = [checkbox.get('name') for checkbox in checkboxes]

# Afficher les résultats
for name in names:
    print(name)