<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/style.css"> <!-- Resource style -->
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/js/modernizr.js"></script> <!-- Modernizr -->

        <title>Programa - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
    <main>
        <div class="row">
            <div id="titulo-programa">
                <h2>PROGRAMA 2015</h2>
            </div>
            <div id="subtitulo-programa">
                <h2>Simposium<br/>Mi&eacute;rcoles 8 de Julio</h2>
            </div>
            <img src="<?php echo Doo::conf()->APP_URL; ?>global/img/punta.png" class="center">
        </div>
        <div class="section timeline" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12">
                    <section id="cd-timeline" class="cd-container">
                        <?php
                        if (!empty($data['eventos'])) :
                            foreach ($data['eventos'] as $e):
                                ?>
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-black">
                                    </div> <!-- cd-timeline-img -->
                                    <div class="cd-timeline-content">
                                        <h2><?php echo $e->nombre; ?></h2>
                                        <p><?php echo $e->presentador; ?></p>
                                        <p><?php echo $e->detalles; ?></p>
                                        <!-- <a href="#0" class="cd-read-more">Read more</a> -->
                                        <span class="cd-date"><?php echo substr($e->hora,0,-3).' hrs.'; ?></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->
                                <?php
                            endforeach;
                        endif;
                        ?>
                        
                    </section> <!-- cd-timeline -->
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
    <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>