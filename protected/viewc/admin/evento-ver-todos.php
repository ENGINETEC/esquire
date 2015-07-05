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
                        <h3>Todos los eventos</h3>
                        <?php //Session::debugVar($data); ?>
                        <br/><br/>
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Fecha del evento</th>
                                        <th>Nombre</th>
                                        <th>Presentador</th>
                                        <th>Encuestas</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(!empty($data['eventos'])){
                                        foreach($data['eventos'] as $ev){
                                            echo '<tr>'
                                            . '<td>'.$ev->fecha.' '.$ev->hora.'</td>'
                                                    . '<td>'.$ev->nombre.'</td><td>'.$ev->presentador.'</td>'
                                                    . '<td><a href="'.Doo::conf()->APP_URL.'ionadmin/evento/'.$ev->id_evento.'/encuestas" class="btn black waves-effect waves-esquire">Ver encuesta</a></td>'
                                                    . '<td><a href="'.Doo::conf()->APP_URL.'ionadmin/eventos/eliminar/'.$ev->id_evento.'" class="btn red waves-effect waves-esquire">Eliminar</a></td>'
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
                                <a href="<?php echo Doo::conf()->APP_URL.'ionadmin/eventos/agregar'; ?>" class="waves-effect waves-esquire btn black">Agregar evento al programa</a>
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
        if(isset($_GET['success']) && $_GET['success']==1 ){
            echo 'Materialize.toast(\'Se ha registrado el evento exitosamente\', 4000)';
        }else if(isset($_GET['error'])){
            echo 'Materialize.toast(\'Ocurrio un error al registrar el evento. Intentenlo nuevamente.\', 4000)';
        }
        ?>
    </script>
</body>
</html>