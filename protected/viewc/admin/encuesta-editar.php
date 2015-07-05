<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Editar encuesta - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="admin">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m2 l2">
                    &nbsp; 
                </div>
                <div class="col s12 m8 l8">
                    <div class="container center">
                        <br/><br/>
                        <h3>Editar encuesta</h3>
                        <br/><br/>
                        <div class="row">
                            <?php
                            //Session::debugVar($data['preguntas']); 
                            if (!empty($data['preguntas'])) {
                                foreach ($data['preguntas'] as $p) {
                                    echo '<div class="pregunta-container">';
                                    echo '<p class="pregunta">' . $p->pregunta . ' <a href="'.Doo::conf()->APP_URL.'ionadmin/encuesta/preguntas/eliminar/'.$p->id_pregunta.'" class="btn red btn-respuesta">Eliminar</a></p>';
                                    echo '<ul id="pregunta-' . $p->id_pregunta . '">';
                                    if (isset($p->CtRespuesta) && !empty($p->CtRespuesta)) {
                                        foreach ($p->CtRespuesta as $r) {
                                            echo '<li>' . $r->respuesta . ' <a href="'.Doo::conf()->APP_URL.'ionadmin/encuesta/preguntas/respuesta/eliminar/'.$r->id_respuesta.'" class="btn red btn-respuesta">Eliminar</a></li>';
                                        }
                                    }
                                    echo '';
                                    echo '</ul>';
                                    echo '<br/>';
                                    ?>
                                    <form id="preguntas-<?php echo $p->id_pregunta; ?>" action="<?php echo Doo::conf()->APP_URL.'ionadmin/encuesta/preguntas/'.$p->id_pregunta.'/respuesta/agregar';?>" method="POST">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="nombre" name="respuesta" type="text" class="validate">
                                                <label for="respuesta">Nueva respuesta</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <button class="btn black waves-effect waves-esquire" type="submit" id="submit">Agregar respuesta</button>
                                            </div>
                                        </div> 
                                    </form><?php
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                        <br/><br/><br/>
                        <div class="row">
                            <form class="col s12" action="<?php echo Doo::conf()->APP_URL . 'ionadmin/encuesta/' . $data['idencuesta'] . '/preguntas/agregar'; ?>" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="nombre" name="pregunta" type="text" class="validate">
                                        <label for="nombre">Nueva pregunta</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn black waves-effect waves-esquire" type="submit" id="submit">Agregar pregunta</button>
                                        <a href="<?php echo Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas'; ?>" class="waves-effect waves-esquire btn black">Regresar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s12 m2 l2">
                    &nbsp; 
                </div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
    <script type="text/javascript"></script>
</body>
</html>