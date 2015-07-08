<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/amcharts.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/pie.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/responsive.js"></script>
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/css/animate.css" type="text/css">
        <title>Estad&iacute;sticas - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="admin">
        <!-- <?php include 'include/header.php'; ?> -->
    <main class="admin-graficas">
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <div class="center">
                        <br/><br/>
                        <h3><?php echo $data['nombre_encuesta']; ?></h3>
                        <br/><br/>
                        <div class="row">
                            <?php
                            if (isset($data['preguntas']) && !empty($data['preguntas'])):
                                $contador = 1;
                                ?>
                                <ul class="tabs">
                                    <?php
                                    $size = sizeof($data['preguntas']);
                                    for ($i = 1; $i <= $size; $i++) {
                                        echo '<li class="tab col s3"><a href="#pregunta' . $i . '">Pregunta ' . $i . '</a></li>';
                                    }
                                    ?>
                                </ul><?php
                                foreach ($data['preguntas'] as $p):
                                    ?>
                                    <div class="pregunta  col s12 m12 l12" id="pregunta<?php echo $contador; ?>">
                                        <div class="input-field">
                                            <p class="pregunta"><?php echo $p->pregunta; ?></p>
                                            <table>
                                            <?php
                                            if (!empty($p->CtRespuesta)) {
                                                $c2 = 1;
                                                foreach ($p->CtRespuesta as $r) {
                                                    $porcentaje = ($p->totalRespondieron>0) ? round(($r->resultados['valor']/$p->totalRespondieron)*100,2)  : 0 ;
                                                    $fontSize = intval($porcentaje/3) + 20;
                                                    if(($c2%2)!=0){
                                                        echo '<tr><td style="text-align:right; width:50%; font-weight:bold; font-style:italic; font-size:'.$fontSize.'px" class="animated zoomInLeft">' . $r->respuesta . '<br/>' . $porcentaje. '%</td><td></td></tr>';
                                                    }else{
                                                        echo '<tr><td></td><td style="text-align:left;width:50%; font-weight:bold; font-style:italic; font-size:'.$fontSize.'px" class="animated zoomInRight">' . $r->respuesta . '<br/>' . $porcentaje . '%</td></tr>';
                                                    }
                                                    $c2++;
                                                }
                                            }
                                            ?>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                    $contador++;
                                endforeach;
                            endif;
                            ?>
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
