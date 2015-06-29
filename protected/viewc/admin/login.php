<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <?php include 'inlcude/head.php'; ?>
        <title>Login - Esquire</title>
    </head>
    <body>
        <?php include 'include/header.php'; ?>
    <main>
        <div class="section" id="contenido-principal">
            <div class="row">
                <div class="col s12 m3 l3">&nbsp;</div>
                <div class="col s12 m6 l6">
                    <br/>
                    <div class="container center">
                        <br/><br/>
                        <h3>Iniciar sesi&oacute;n</h3>
                        <br/><br/>
                        <div class="row">
                            <form class="col s12" action="#" method="POST">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="usuario" name="usuario" type="text" class="validate">
                                        <label for="usuario">Usuario</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="passwd" name="passwd" type="password" class="validate">
                                        <label for="passwd">Contrase&ntilde;a</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn btn-esquire waves-effect waves-esquire" type="submit" id="login" name="login">Iniciar sesi&oacute;n
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col s12 m3 l3">&nbsp;</div>
            </div>
        </div>
    </main>
    <?php include 'include/scriptsjs.php'; ?>
</body>
</html>