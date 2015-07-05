<?php

Doo::loadClass('Session');

class EncuestasController extends Session {

    function index() {
        session_start();
        if (Session::siExisteSesion()) {
            Doo::loadModel('CtEncuesta');
            Doo::loadModel('CtEventos');

            $ev = new CtEventos();
            $ev->id_evento = intval($this->params['idevento']);
            $ev = $ev->getOne();
            
            if (!empty($ev)) {
                $this->data['nombre_evento'] = $ev->nombre;
                $e = new CtEncuesta();
                $e->id_evento = intval($this->params['idevento']);
                $this->data['encuestas'] = $e->find();
                $this->data['idevento'] = intval($this->params['idevento']);

                $this->data['slug'] = 'encuestas';
                $this->renderc('admin/encuesta-ver-todos', $this->data);
            }else{
                header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function agregar() {
        session_start();
        if (Session::siExisteSesion()) {
            $this->data['idevento'] = intval($this->params['idevento']);
            if (isset($_POST) && !empty($_POST)) {
                if (isset($_POST['nombre'])) {
                    Doo::loadModel('CtEncuesta');
                    $encuesta = new CtEncuesta();
                    $encuesta->nombre = strip_tags(addslashes($_POST['nombre']));
                    $encuesta->id_evento = $this->data['idevento'];
                    $encuesta->activa = 0;
                    $val = $encuesta->validate();
                    if (empty($val)) {
                        $idEncuesta = $encuesta->insert();
                        header('location:' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $this->data['idevento'] . '/encuestas?success=1');
                    } else {
                        header('location:' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $this->data['idevento'] . '/encuestas?error=1');
                    }
                } else {
                    header('location:' . Doo::conf()->APP_URL . 'ionadmin/evento/' . $this->data['idevento'] . '/encuestas?error=2');
                }
            } else {
                $this->data['slug'] = 'encuestas';
                $this->renderc('admin/encuesta-agregar', $this->data);
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
        session_start();
        if (Session::siExisteSesion()) {
            $this->data['idencuesta'] = intval($this->params['idencuesta']);
            $this->data['idevento'] = intval($this->params['idevento']);
            
            Doo::loadModel('CtEncuesta');
            Doo::loadModel('CtPreguntas');
            Doo::loadModel('CtRespuesta');
            $ec = new CtEncuesta();
            $ec->id_encuesta = intval($this->params['idencuesta']);
            $ec = $ec->getOne();//relate('CtPreguntas',array('limit'=>1));
            if (!empty($ec)) {
                $preguntas = new CtPreguntas();
                $preguntas->id_encuesta = $ec->id_encuesta;
                $this->data['preguntas'] = $preguntas->relate('CtRespuesta');
                $this->data['slug'] = 'encuestas';
                $this->renderc('admin/encuesta-editar', $this->data);
            }else{
                header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

}

?>