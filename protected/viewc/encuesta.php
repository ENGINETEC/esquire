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
                <h2><?php echo (isset($data['evento'])) ? $data['evento']->nombre : 'Encuesta'; ?></h2>
            </div>
            <div class="section encuesta-section" id="contenido-principal">
                <div class="row row-encuesta">
                    <div class="col s12 m2 l2">&nbsp;</div>
                    <div class="col s12 m8 l8">
                        <?php
                        if (!isset($data['encuesta']) || empty($data['encuesta'])) {
                            echo '<h3>No hay encuestas activas.</h3>';
                        } else {
                            if (!empty($data['preguntas'])):
                                ?>
                                <form action="<?php echo Doo::conf()->APP_URL . 'encuesta'; ?>" method="POST" id="encuesta-form">
                                    <div class="row pregunta">
                                        <div class="input-field col s12">
                                            <p class="pregunta">Selecciona tu genero:</p>
                                            <div class="respuesta">
                                                <input name="genero" type="radio" id="sexo-m" value="m" class="black" /><label for="sexo-m">Masculino</label>
                                                <input name="genero" type="radio" id="sexo-f" value="f" class="black" /><label for="sexo-f">Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pregunta">
                                        <div class="input-field col s12">
                                            <p class="pregunta">&iquest;En qu&eacute; rango de edad te encuentras?:</p>
                                            <div class="respuesta">
                                                <input name="edad" type="radio" id="edad1" value="25-30" class="black" /><label for="edad1">25 a 30 a&ntilde;os</label>
                                                <input name="edad" type="radio" id="edad2" value="31-36" class="black" /><label for="edad2">31 a 36 a&ntilde;os</label>
                                                <input name="edad" type="radio" id="edad3" value="37+" class="black" /><label for="edad3">Más de 37 a&ntilde;os</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($data['preguntas'] as $p):
                                        if (isset($p->CtRespuesta) && !empty($p->CtRespuesta)):
                                            ?>
                                            <div class="row pregunta">
                                                <div class="input-field col s12">
                                                    <p class="pregunta"><?php echo $p->pregunta; ?></p>
                                                    <div class="respuesta">
                                                        <?php
                                                        foreach ($p->CtRespuesta as $r) {
                                                            echo '<input name="' . $p->id_pregunta . '" type="radio" id="' . $p->id_pregunta . '-' . $r->id_respuesta . '" value="' . $r->id_respuesta . '" class="black" /><label for="' . $p->id_pregunta . '-' . $r->id_respuesta . '">' . $r->respuesta . '</label>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div><?php
                                        endif;
                                    endforeach;
                                    ?>
                                    <div class="row pregunta">
                                        <div class="input-field col s12">
                                            <button class="btn black waves-effect waves-esquire" type="submit" id="submit">Enviar</button>
                                        </div>
                                    </div>
                                </form><?php
                            endif;
                        }
                        ?>
                        <!-- <div class="row center">
                            <a href="<?php echo Doo::conf()->SUBFOLDER; ?>" class="btn black waves-effect waves-esquire">Inicio</a>
                        </div> -->
                    </div>
                    <div class="col s12 m2 l2">&nbsp;</div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                if ($('div.respuesta:not(:has(:radio:checked))').length) {
                    e.preventDefault();
                    alert("Debes reponder a todas las preguntas.");
                }
            });
        });
    </script>
</body>
</html>