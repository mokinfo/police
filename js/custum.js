document.addEventListener("DOMContentLoaded", function () {
    function calculate_age() {
        let birth_date = document.getElementById('age').value;
        let birth_date_obj = new Date(birth_date);
        let diff_ms = Date.now() - birth_date_obj.getTime();
        let age_dt = new Date(diff_ms);
        let calculated_age = Math.abs(age_dt.getUTCFullYear() - 1970);
        document.getElementById('calculated_age').value = calculated_age;
    }

    function sexedef() {
        let civi = document.getElementById('civi').value;
        let sexe = "";
        if (civi === "M.") {
            sexe = "Masculin";
        } else if (civi === "Mme" || civi === "Mlle") {
            sexe = "Féminin";
        }
        document.getElementById('sexe').value = sexe;
    }

    function toggleFields() {
        var categorie = $('#cate').val();
        var possession = $('select[name="possession"]').val();

        if (categorie == 'POA' || categorie == 'POR' || categorie == 'FPA' || categorie == 'FPR') {
            $('input[name="matricule"]').closest('.col-sm-4').removeClass('hidden');
        } else {
            $('input[name="matricule"]').closest('.col-sm-4').addClass('hidden');
        }

        if (possession == 'OUI') {
            $('input[name="numcnss"]').closest('.col-sm-4').removeClass('hidden');
        } else {
            $('input[name="numcnss"]').closest('.col-sm-4').addClass('hidden');
        }
    }
    
    document.getElementById('age').addEventListener('keyup', calculate_age);
    document.getElementById('civi').addEventListener('change', sexedef);

    

    $('#cate').change(toggleFields);
    $('select[name="possession"]').change(toggleFields);

    toggleFields();
});