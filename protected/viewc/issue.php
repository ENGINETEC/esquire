<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="">
        <title>Issue - <?php echo Doo::conf()->APP_NAME; ?></title>
        <!-- Favicons-->
        <!-- <link rel="apple-touch-icon-precomposed" href="">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="">
        <link rel="icon" href="" sizes="32x32"> -->
        <!--  Android 5 Chrome Color-->
        <!-- <meta name="theme-color" content="#EE6E73">  -->
        <!-- CSS-->
        <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/css/style.css"  media="screen,projection"/>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12">
                    <iframe src="<?php echo Doo::conf()->APP_URL ?>global/pdf/revista.pdf" class="full-iframe"></iframe>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>