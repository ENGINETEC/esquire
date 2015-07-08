<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/amcharts.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/pie.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/responsive.js"></script>
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
                                        for($i=1;$i<=$size;$i++){
                                            echo '<li class="tab col s3"><a href="#pregunta'.$i.'">'.$i.'</a></li>';
                                        }
                                        ?>
                                    </ul><?php
                                foreach ($data['preguntas'] as $p):
                                    ?>
                                    <div class="pregunta  col s12 m12 l12" id="pregunta<?php echo $contador; ?>">
                                        <div class="input-field">
                                            <p class="pregunta"><?php echo $p->pregunta; ?></p>
                                            <script>
                                                var chartp<?php echo $p->id_pregunta; ?>;
                                                var legendp<?php echo $p->id_pregunta; ?>;
                                                var chartDatap<?php echo $p->id_pregunta; ?> = [
        <?php
        if (!empty($p->CtRespuesta)) {
            foreach ($p->CtRespuesta as $r) {
                echo '{"respuesta": "' . $r->respuesta . '","value": ' . $r->resultados['valor'] . '},';
            }
        }
        ?>
                                                ];
                                                AmCharts.ready(function() {
                                                    // PIE CHART
                                                    chartp<?php echo $p->id_pregunta; ?> = new AmCharts.AmPieChart();
                                                    chartp<?php echo $p->id_pregunta; ?>.dataProvider = chartDatap<?php echo $p->id_pregunta; ?>;
                                                    chartp<?php echo $p->id_pregunta; ?>.titleField = "respuesta";
                                                    chartp<?php echo $p->id_pregunta; ?>.valueField = "value";
                                                    chartp<?php echo $p->id_pregunta; ?>.outlineColor = "#FFFFFF";
                                                    chartp<?php echo $p->id_pregunta; ?>.outlineAlpha = 0.8;
                                                    chartp<?php echo $p->id_pregunta; ?>.outlineThickness = 2;
                                                    chartp<?php echo $p->id_pregunta; ?>.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                                    // this makes the chart 3D
                                                    chartp<?php echo $p->id_pregunta; ?>.depth3D = 3;
                                                    chartp<?php echo $p->id_pregunta; ?>.angle = 10;
                                                    chartp<?php echo $p->id_pregunta; ?>.responsive = {"enabled": true};
                                                    chartp<?php echo $p->id_pregunta; ?>.colors = ["#505050", "#DDDDDD", "#FFFFFF", "#000000", "#888888", "#707070"];
                                                    chartp<?php echo $p->id_pregunta; ?>.fontSize = 20;
                                                    // WRITE
                                                    chartp<?php echo $p->id_pregunta; ?>.write("grafica-p<?php echo $p->id_pregunta; ?>");
                                                });</script>
                                            <div class="grafica" id="grafica-p<?php echo $p->id_pregunta; ?>" style="width: 100%; height: 450px;"></div>
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