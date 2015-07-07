<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'include/head.php'; ?>
        <title>Agregar evento - <?php echo Doo::conf()->APP_NAME; ?></title>
    </head>
    <body class="admin">
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <div class="container center">
                        <br/><br/>
                        <h3>Encuestas del evento &quot;<?php echo $data['nombre_evento']; ?>&quot;</h3>
                        <br/><br/>
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Editar preguntas</th>
                                        <th>Estad&iacute;sticas</th>
                                        <th>Activa</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($data['encuestas'])) {
                                        foreach ($data['encuestas'] as $e) {
                                            $activo = ($e->activa == 1) ? 'Desactivar' : 'Activar';
                                            echo '<tr>'
                                            . '<td>' . $e->nombre . '</td>'
                                            . '<td><a href="' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas/editar/' . $e->id_encuesta . '" class="btn black waves-effect waves-esquire">Editar preguntas</a></td>'
                                            . '<td><a href="' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas/estadisticas/' . $e->id_encuesta . '" class="btn black waves-effect waves-esquire">Estad&iacute;sticas</a></td>'
                                            . '<td><a href="' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas/habilitar/' . $e->id_encuesta . '" class="btn black waves-effect waves-esquire">' . $activo . '</a></td>'
                                            . '<td><a href="' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas/eliminar/' . $e->id_encuesta . '" class="btn red waves-effect waves-esquire">Eliminar</a></td>'
                                            . '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br/><br/><br/>
                        <div class="row">
                            <div class="container">
                                <a href="<?php echo Doo::conf()->APP_URL . 'ionadmin/evento/' . $data['idevento'] . '/encuestas/agregar'; ?>" class="waves-effect waves-esquire btn black">Agregar encuesta</a>
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