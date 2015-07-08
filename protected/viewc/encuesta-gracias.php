<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/style.css"> <!-- Resource style -->
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/amcharts.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/pie.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/responsive.js"></script>
        <title>Encuesta - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="encuesta-graficas">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="row">
            <div id="titulo-encuesta">
                <h2>Gracias por responder la encuesta</h2>
            </div>
        </div>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s2 m2 l2|">&nbsp;</div>
                <div class="col s8 m8 l8">
                    <br/><br/><br/>
                    <div class="row center">
                        <a href="<?php echo Doo::conf()->SUBFOLDER . 'encuesta'; ?>" class="btn white waves-effect waves-esquire-white">Volver a la encuesta</a>
                    </div>
                </div>
                <div class="col s2 m2 l2|">&nbsp;</div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>