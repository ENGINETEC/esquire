<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Home - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="admin">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12">
                    <a href="<?php echo Doo::conf()->APP_URL.'ionadmin/eventos/agregar'; ?>" class="waves-effect waves-esquire btn">Agregar evento al programa</a>
                    <a  href="<?php echo Doo::conf()->APP_URL.'ionadmin/logout'; ?>" class="waves-effect waves-esquire btn">Salir</a>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>