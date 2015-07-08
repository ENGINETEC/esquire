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
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <div class="container center">
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
                                                    chart = new AmCharts.AmPieChart();
                                                    chart.dataProvider = chartDatap<?php echo $p->id_pregunta; ?>;
                                                    chart.titleField = "respuesta";
                                                    chart.valueField = "value";
                                                    chart.outlineColor = "#FFFFFF";
                                                    chart.outlineAlpha = 0.8;
                                                    chart.outlineThickness = 2;
                                                    chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                                    // this makes the chart 3D
                                                    chart.depth3D = 3;
                                                    chart.angle = 10;
                                                    chart.responsive = {"enabled": true};
                                                    chart.colors = ["#505050", "#DDDDDD", "#FFFFFF", "#000000", "#888888", "#707070"];

                                                    // WRITE
                                                    chart.write("grafica-p<?php echo $p->id_pregunta; ?>");
                                                });</script>
                                            <div class="grafica" id="grafica-p<?php echo $p->id_pregunta; ?>" style="width: 100%; height: 270px;"></div>
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