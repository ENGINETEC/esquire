<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo Doo::conf()->APP_URL; ?>global/js/vertical-timeline/css/style.css"> <!-- Resource style -->
        <?php include 'include/head.php'; ?>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/amcharts.js"></script>
        <script src="<?php echo Doo::conf()->APP_URL; ?>global/js/amcharts/pie.js"></script>
        <title>Encuesta - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="encuesta">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="row">
            <div id="titulo-encuesta">
                <h2>Resultados de la encuesta</h2>
            </div>
        </div>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m2 l2">&nbsp;</div>
                <div class="col s12 m8 l8">
                    <?php
                    if (isset($data['preguntas']) && !empty($data['preguntas'])):
                        foreach ($data['preguntas'] as $p):
                            ?>
                            <div class="row pregunta">
                                <div class="input-field col s12">
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
                                                    chart = new AmCharts.AmPieChart();
                                                    chart.dataProvider = chartDatap<?php echo $p->id_pregunta; ?>;
                                                    chart.titleField = "respuesta";
                                                    chart.valueField = "value";
                                                    chart.outlineColor = "#FFFFFF";
                                                    chart.outlineAlpha = 0.8;
                                                    chart.outlineThickness = 2;
                                                    chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                                    // this makes the chart 3D
                                                    chart.depth3D = 15;
                                                    chart.angle = 30;
                                                    // WRITE
                                                    chart.write("grafica-p<?php echo $p->id_pregunta; ?>");
                                                });</script>
                                    <div class="grafica" id="grafica-p<?php echo $p->id_pregunta; ?>" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div><?php
                        endforeach;
                    endif;
                    ?>
                    <a href="<?php echo Doo::conf()->SUBFOLDER . 'encuesta'; ?>" class="btn black waves-effect waves-esquire">Volver a la encuesta</a>
                </div>
                <div class="col s12 m2 l2">&nbsp;</div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>