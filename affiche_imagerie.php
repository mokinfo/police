<?php require("tetecd.php"); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-12">
                    <form class="form-horizontal" action="Examen_Imagerie" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?php
                                                $ids = $_GET['id'];
                                                $pieces = $DB->query("SELECT radiolo.idexam, radiolo.idan, radiolo.heurdexam, radiolo.datexam, radiolo.motif, radiolo.radiox, radiolo.echo, radiolo.ecg, radiolo.chk, patient.idp, patient.nom, patient.sex, patient.age, patient.tel, patient.address FROM patient, radiolo WHERE radiolo.idan = patient.idp AND radiolo.idexam = '$ids'");
                                                foreach ($pieces as $piece): ?>
                                                    <div class="form-group row">
                                                        <label for="patient" class="col-sm-4 col-form-label">Patient</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="idexam" value="<?php echo $piece->idexam; ?>">
                                                            <input type="hidden" name="idpa" value="<?php echo $piece->idp; ?>" class="form-control">
                                                            <input type="text" name="nom" value="<?php echo $piece->nom; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group row">
                                                    <label for="sex" class="col-sm-5 col-form-label">Sexe :</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="sex" value="<?php echo $piece->sex; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group row">
                                                    <label for="age" class="col-sm-6 col-form-label">Âge :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="age" value="<?php echo $piece->age; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for="datexam" class="col-sm-5 col-form-label">Date d'examen :</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="datexam" value="<?php echo $piece->datexam; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <input type="hidden" name="tel" value="<?php echo $piece->tel ?>">
                                                <input type="hidden" name="adresse" value="<?php echo $piece->address; ?>">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Examen</th>
                                                        <th scope="col"></th>
                                                        <th scope="col">Résultat</th>
                                                        <th scope="col">Intervalle</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($piece->radiox > 0): ?>
                                                        <tr>
                                                            <td>Radiographie :</td>
                                                            <td></td>
                                                            <td><input type="file" name="radiox"></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($piece->echo > 0): ?>
                                                        <tr>
                                                            <td>Echographie :</td>
                                                            <td></td>
                                                            <td><input type="file" name="echo"></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($piece->ecg > 0): ?>
                                                        <tr>
                                                            <td>Electrocardiogramme ECG :</td>
                                                            <td></td>
                                                            <td><input type="file" name="ecg"></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button class="form-control bg-secondary" type="submit" name="Enregistrer"><i class="fas fa-save"></i> Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button class="form-control bg-light" type="reset" name="reset"><i class="fas fa-trash"></i> Réinitialiser</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Droits d'auteur &copy; Police National 2022 <a href="#">mokinfo</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>
<script>
    // Script pour le modal (si nécessaire)
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  $(document).ready(function(){
    $('#jaktab').DataTable();
    $('#ben').DataTable();
    $('#tokyo').DataTable();
  });
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="script.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>