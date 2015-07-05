<?php

Doo::loadClass('Session');

class AdminController extends Session {

    function login() {
        session_start();
        if(Session::siExisteSesion()){
            header('location:'.Doo::conf()->APP_URL.'ionadmin/index');
        }else{
            if(isset($_POST['usuario']) && isset($_POST['passwd']) ){
                Doo::loadModel('CtUsuario');
                $usuario = new CtUsuario();
                $usuario->id_usuario = strip_tags(addslashes($_POST['usuario']));
                $usuario->passwd = Session::encpass($_POST['passwd']);
                $usuario = $usuario->getOne();
                if(!empty($usuario)){
                    $_SESSION['usuario'] = $usuario->id_usuario;
                    Session::checkSumGen($usuario->id_usuario);
                    header('location:'.Doo::conf()->APP_URL.'ionadmin/index');
                }else{
                    header('location:'.Doo::conf()->APP_URL.'ionadmin/login?error=1');
                }
            }else{
                session_destroy();
                $this->renderc('admin/login');
            }
        }
    }

    function logout() {
        session_start();
        session_destroy();
        header('location:'.Doo::conf()->APP_URL.'ionadmin/login?logout=1');
    }

    function index() {
        header('location:'.Doo::conf()->APP_URL.'ionadmin/eventos');
        
    }

}

?>