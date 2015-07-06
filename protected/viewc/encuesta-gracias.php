<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/style.css"> <!-- Resource style -->
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/js/modernizr.js"></script> <!-- Modernizr -->

        <title>Encuesta - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="encuesta">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="row">
            <div id="titulo-encuesta">
                <h2>&iexcl;Gracias!</h2>
            </div>
        </div>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m2 l2">&nbsp;</div>
                <div class="col s12 m8 l8">
                    <a href="<?php echo Doo::conf()->SUBFOLDER.'encuesta'; ?>" class="btn black waves-effect waves-esquire">Volver a la encuesta</a>
                </div>
                <div class="col s12 m2 l2">&nbsp;</div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>