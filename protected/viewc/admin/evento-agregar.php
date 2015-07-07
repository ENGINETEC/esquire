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
                <div class="col s12 m2 l2">
                    &nbsp; 
                </div>
                <div class="col s12 m8 l8 center">
                    <div class="container center">
                        <br/><br/>
                        <h3>Agregar evento</h3>
                        <br/><br/>
                        
                        <div class="row">
                            <form class="col s12" action="#" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="nombre" name="nombre" type="text" class="validate">
                                        <label for="nombre">Nombre del evento</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="fecha" name="fecha" type="date" class="validate datepicker">
                                        <label for="fecha">Fecha del evento</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="hora" name="hora" type="text" class="validate">
                                        <label for="hora">Hora del evento</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="presentador" name="presentador" type="text" class="validate">
                                        <label for="presentador">Presentador</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="detalles" name="detalles" class="materialize-textarea"></textarea>
                                        <label for="detalles">Detalles del evento</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn black waves-effect waves-esquire" type="submit" id="submit">Agregar evento</button>
                                        <a href="<?php echo Doo::conf()->APP_URL.'ionadmin/eventos'; ?>" class="waves-effect waves-esquire btn black">Regresar</a>
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
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, 
            selectYears: 15,
            format: 'yyyy-mm-dd'
        });
        <?php 
        if(isset($_GET['success']) && $_GET['success']==1 ){
            echo 'Materialize.toast(\'Se ha realizado la acción solicitada con éxito.\', 4000)';
        }else if(isset($_GET['error'])){
            echo 'Materialize.toast(\'Ocurrio un error. Inténtenlo nuevamente.\', 4000)';
        }
        ?>
    </script>
</body>
</html>