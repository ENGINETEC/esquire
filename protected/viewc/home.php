<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Home - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section home" id="contenido-principal">
            <div class="row row-home">
                <div class="col s12 m12 l12">
                    <img src="<?php echo Doo::conf()->APP_URL.'global/img/home.png'; ?>" alt="home" class="principal">
                    <br/><br/>
                    <a href="<?php echo Doo::conf()->APP_URL.'programa'; ?>"><img src="<?php echo Doo::conf()->APP_URL.'global/img/programa.png'; ?>" alt="home" class="programa"></a>
                    <div class="sponsors">
                        <img src="<?php echo Doo::conf()->APP_URL.'global/img/esquire-logo.png'; ?>" alt="esquire" class="left">
                        <img src="<?php echo Doo::conf()->APP_URL.'global/img/boss-logo.png'; ?>" alt="esquire" class="right">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>