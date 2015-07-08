<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Website - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section iframe" id="contenido-principal">
            <div class="row">
                <a href="<?php echo Doo::conf()->SUBFOLDER; ?>" class="btn black waves-effect waves-esquire">Inicio</a>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <iframe src="http://www.esquirelat.com/" class="full-iframe"></iframe>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>