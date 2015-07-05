<?php

Doo::loadClass('Session');

class PyRController extends Session {

    function agregarPregunta() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL.'ionadmin/index';
            $referer = strtok($referer, '?');
            
            $this->data['idencuesta'] = intval($this->params['idencuesta']);
            if(isset($_POST['pregunta']) && !empty($_POST['pregunta']) ){
                Doo::loadModel('CtPreguntas');
                Doo::loadCore('db/DooDbExpression');
                $p = new CtPreguntas();
                $p->pregunta = strip_tags(addslashes($_POST['pregunta']));
                $p->id_encuesta = $this->data['idencuesta'];
                $p->fecha_publicacion = new DooDbExpression('NOW()');
                $p->activa = 1;
                $p->insert();
                header('location:' . $referer . '?success=1');
            }else{
                header('location:' . $referer . '?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function eliminarPregunta() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL.'ionadmin/index';
            $referer = strtok($referer, '?');
            
            $this->data['idpregunta'] = intval($this->params['idpregunta']);
            Doo::loadModel('CtPreguntas');
            Doo::loadModel('CtRespuesta');
            $r = new CtRespuesta();
            $r->id_pregunta = $this->data['idpregunta'];
            $r->delete();
            $p = new CtPreguntas();
            $p->id_pregunta = $this->data['idpregunta'];
            $p->delete();
            header('location:' . $referer . '?success=1');
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function agregarRespuesta() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL.'ionadmin/index';
            $referer = strtok($referer, '?');
            
            $this->data['idpregunta'] = intval($this->params['idpregunta']);
            if(isset($_POST['respuesta']) && !empty($_POST['respuesta']) ){
                Doo::loadModel('CtRespuesta');
                Doo::loadCore('db/DooDbExpression');
                $r = new CtRespuesta();
                $r->respuesta = strip_tags(addslashes($_POST['respuesta']));
                $r->id_pregunta = $this->data['idpregunta'];
                $r->insert();
                header('location:' . $referer . '?success=1');
            }else{
                header('location:' . $referer . '?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function eliminarRespuesta() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL.'ionadmin/index';
            $referer = strtok($referer, '?');
            
            $this->data['idrespuesta'] = intval($this->params['idrespuesta']);
            Doo::loadModel('CtRespuesta');
            $r = new CtRespuesta();
            $r->id_respuesta = $this->data['idrespuesta'];
            $r->delete();
            header('location:' . $referer . '?success=1');
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

}

?>