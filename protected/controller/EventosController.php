<?php

Doo::loadClass('Session');

class EventosController extends Session {

    function index() {
        session_start();
        if (Session::siExisteSesion()) {
            Doo::loadModel('CtEventos');
            $this->data['eventos'] = Doo::db()->find('CtEventos');   
            $this->data['slug'] = 'eventos';
            
            Doo::loadModel('CtEncuesta');
            $enActivas = new CtEncuesta();
            $enActivas->activa = 1;
            $this->data['encuestas_activas'] = $enActivas->count();            
            $this->renderc('admin/evento-ver-todos', $this->data);
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function agregar() {
        session_start();
        if (Session::siExisteSesion()) {
            if (isset($_POST) && !empty($_POST)) {
                if (isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['presentador']) && isset($_POST['detalles'])) {
                    Doo::loadModel('CtEventos');
                    $evento = new CtEventos();
                    $evento->nombre = strip_tags(addslashes($_POST['nombre']));
                    $evento->fecha = strip_tags(addslashes($_POST['fecha']));
                    $evento->hora = strip_tags(addslashes($_POST['hora']));
                    $evento->presentador = strip_tags(addslashes($_POST['presentador']));
                    $evento->detalles = strip_tags(addslashes($_POST['detalles']));
                    $val = $evento->validate();
                    if (empty($val)) {
                        $idEvento = $evento->insert();
                        header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?success=1');
                    } else {
                        header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?error=1');
                    }
                } else {
                    header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos/agregar?error=2');
                }
            } else {
                $this->data['slug'] = 'eventos';
                $this->renderc('admin/evento-agregar', $this->data);
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function eliminar() {
        session_start();
        if (Session::siExisteSesion()) {
            
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL . 'ionadmin/index';
            $referer = strtok($referer, '?');
            
            $idEvento = intval($this->params['idevento']);
            
            Doo::loadModel('CtEventos');
            $evento = new CtEventos();
            $evento->id_evento = $idEvento;
            $evento = $evento->getOne();
            if(!empty($evento)){
                $evento->borrarEncuestas();
                $evento->delete();
                header('location:' . $referer . '?success=1');
            }else{
                header('location:' . $referer . '?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }


    function ver() {
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

}

?>