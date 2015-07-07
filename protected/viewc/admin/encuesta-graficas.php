<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Agregar evento - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="admin">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <div class="container center">
                        <br/><br/>
                        <h3>Estad&iacute;sticas de la encuesta &quot;<?php echo $data['nombre_encuesta']; ?>&quot;</h3>
                        <br/><br/>
                        <div class="row">
                            
                        </div>
                        <br/><br/><br/>
                        <div class="row">
                            <div class="container">
                                <a href="<?php echo Doo::conf()->APP_URL . 'ionadmin/eventos'; ?>" class="waves-effect waves-esquire btn black">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
    <script type="text/javascript">
<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo 'Materialize.toast(\'Se ha realizado la acción solicitada con éxito.\', 4000)';
} else if (isset($_GET['error'])) {
    echo 'Materialize.toast(\'Ocurrio un error. Inténtenlo nuevamente.\', 4000)';
}
?>
    </script>
</body>
</html>