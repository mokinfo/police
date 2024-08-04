/*$(document).ready(function(){
            var marque = document.getElementById('mq');
            marque.options[0] = new Option('--Select--', '');
            marque.options[1] = new Option('Toyota', 'Toyota');
            marque.options[2] = new Option('Mutsubishi', 'Mutsubishi');
            marque.options[3] = new Option('Nissan', 'Nissan');
            marque.options[4] = new Option('Hyndai', 'Hyndai');
        });*/
        function getMarqueModel(){
            var marque = document.getElementById('mq');
            var model = document.getElementById("md");
            var marqueSelectedValue = marque.options[marque.selectedIndex].value;
            //var marqueSelectedValue = marque.options[marque.selectedIndex].value;
            //model.options.length=0;
            if (marqueSelectedValue=='Toyota')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('YARIS H/BACK', 'YARIS H/BACK');
                model.options[2] = new Option('Vits', 'Vits');
                model.options[3] = new Option('YARIS SEDAN', 'YARIS SEDAN');
                model.options[4] = new Option('MARK 2', 'MARK 2');
                model.options[5] = new Option('CROWN', 'CROWN');
                model.options[6] = new Option('PROBOX', 'PROBOX');
                model.options[7] = new Option('HILUX', 'HILUX');
                model.options[8] = new Option('FORTUNER', 'FORTUNER');
                model.options[9] = new Option('Land cruiser 2', 'Land cruiser 2');
                model.options[10] = new Option('Land cruiser HARTOOP', 'Land cruiser HARTOOP');
                model.options[11] = new Option('Land cruiser PRADO', 'Land cruiser PRADO');
                model.options[12] = new Option('Land cruiser V8', 'Land cruiser V8');
                model.options[13] = new Option('COASTER', 'COASTER');
                model.options[14] = new Option('DYNA', 'DYNA');
                model.options[15] = new Option('HIACE', 'HIACE');
                model.options[16] = new Option('CORROLA', 'CORROLA');
                model.options[17] = new Option('RAV4', 'RAV4');
                model.options[18] = new Option('AVENZA', 'AVENZA');
                model.options[19] = new Option('AVENSIS', 'AVENSIS');
                model.options[20] = new Option('RUSH', 'RUSH');
                model.options[21] = new Option('SUUCEED', 'SUUCEED');
                model.options[22] = new Option('HILUX VIGO', 'HILUX VIGO');
                model.options[23] = new Option('HILUX REVO', 'HILUX REVO');
            }
            else if (marqueSelectedValue=='Mutsubishi')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('L200', 'L200');
                model.options[2] = new Option('Pajero', 'Pajero');
                model.options[3] = new Option('ROSA', 'ROSA');
                model.options[4] = new Option('CANTER', 'CANTER');
            }
            else if (marqueSelectedValue=='Nissan')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('HardBody', 'HardBody');
                model.options[2] = new Option('Patrol', 'Patrol');
                model.options[3] = new Option('NAVARA', 'NAVARA');
                model.options[4] = new Option('PATHFINDER', 'PATHFINDER');
                model.options[5] = new Option('TERRANO', 'TERRANO');
                model.options[6] = new Option('URVAN', 'URVAN');
            }
            else if (marqueSelectedValue=='Hyundai')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('ACCCENT', 'ACCCENT');
                model.options[2] = new Option('ELANTRA', 'ELANTRA');
                model.options[3] = new Option('TERRACAN', 'TERRACAN');
                model.options[4] = new Option('TUCSON', 'TUCSON');
                model.options[5] = new Option('SANTAFE', 'SANTAFE');
                model.options[6] = new Option('CRETA', 'CRETA');
                model.options[7] = new Option('COUNTY', 'COUNTY');
            }
            else if (marqueSelectedValue=='Kia')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('Sportage', 'Sportage');
                model.options[2] = new Option('Sorento', 'Sorento');
                model.options[3] = new Option('Pride', 'Pride');
                model.options[4] = new Option('Bonco', 'Bonco');
                model.options[5] = new Option('Rio H/BACK', 'Rio H/BACK');
                model.options[6] = new Option('Rio SEDAN', 'Rio SEDAN');
            }
            else if (marqueSelectedValue=='Suzuki')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('SWIFT H/BACK', 'SWIFT H/BACK');
                model.options[2] = new Option('ALTO', 'ALTO');
                model.options[3] = new Option('ALTO 800', 'ALTO 800');
                model.options[4] = new Option('CELERIO', 'CELERIO');
                model.options[5] = new Option('SWIFT SEDAN', 'SWIFT SEDAN');
            }
            else if (marqueSelectedValue=='Isuzu')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('D.MAX', 'D.MAX');
                model.options[2] = new Option('D.MAX 2WD', 'D.MAX 2WD');
                model.options[3] = new Option('D.MAX 4WD', 'D.MAX 4WD');
                model.options[4] = new Option('FSR/FTR', 'FSR/FTR');
                model.options[5] = new Option('NPR', 'NPR');
            }
            else if (marqueSelectedValue=='Ford')
            {
                model.options.length=0;
                model.options[0] = new Option('--Select--', '');
                model.options[1] = new Option('Ranger', 'Ranger');
            }
        }
        function myFunction() {
            document.getElementById("demo").innerHTML = alert("La pièce a été commandé !");
        }