<?php

Doo::loadClass('Session');

class EventosController extends Session {

    function index() {
        session_start();
        if (Session::siExisteSesion()) {
            Doo::loadModel('CtEventos');
            $this->data['eventos'] = Doo::db()->find('CtEventos');   
            $this->data['slug'] = 'eventos';
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
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

    function habilitar() {
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

    function ver() {
        echo 'You are visiting ' . $_SERVER['REQUEST_URI'];
    }

}

?>