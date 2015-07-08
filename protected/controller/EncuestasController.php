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
            } else {
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
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL . 'ionadmin/index';
            $referer = strtok($referer, '?');
            $idEvento = intval($this->params['idevento']);
            $idEncuesta = intval($this->params['idencuesta']);
            Doo::loadModel('CtEncuesta');
            Doo::loadModel('CtPreguntas');
            Doo::loadModel('CtRespuesta');
            $encuesta = new CtEncuesta();
            $encuesta->id_encuesta = $idEncuesta;
            $encuesta = $encuesta->getOne();
            if (!empty($encuesta)) {
                $preg = new CtPreguntas();
                $preg->id_encuesta = $encuesta->id_encuesta;
                $preguntas = $preg->find();
                if (!empty($preguntas)) {
                    foreach ($preguntas as $p) {
                        $resp = new CtRespuesta();
                        $resp->id_pregunta = $p->id_pregunta;
                        $resp->delete();
                        $p->delete();
                    }
                }
                $encuesta->delete();
                header('location:' . $referer . '?success=1');
            } else {
                header('location:' . $referer . '?error=2');
            }
        } else {
            header('location:' . $referer . '?error=1');
        }
    }

    function habilitar() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL . 'ionadmin/index';
            $referer = strtok($referer, '?');
            $idEncuesta = intval($this->params['idencuesta']);
            Doo::loadModel('CtEncuesta');
            $encuesta = new CtEncuesta();
            $encuesta->id_encuesta = $idEncuesta;
            $encuesta = $encuesta->getOne();
            if (!empty($encuesta)) {
                if ($encuesta->activa == 0) {
                    $encuesta->activa = 1;
                    //Deshabilitamos todas las demás encuestas que pudieran estar activas
                    $query = "UPDATE ct_encuesta e SET e.activa = 0";
                    Doo::db()->query($query);
                } else {
                    $encuesta->activa = 0;
                }
                $encuesta->update();
                header('location:' . $referer . '?success=1');
            } else {
                header('location:' . $referer . '?error=2');
            }
        } else {
            header('location:' . $referer . '?error=1');
        }
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
            $ec = $ec->getOne();
            if (!empty($ec)) {
                $preguntas = new CtPreguntas();
                $preguntas->id_encuesta = $ec->id_encuesta;
                $this->data['preguntas'] = $preguntas->relate('CtRespuesta');
                $this->data['slug'] = 'encuestas';
                $this->renderc('admin/encuesta-editar', $this->data);
            } else {
                header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

    function deshabilitarTodas() {
        session_start();
        if (Session::siExisteSesion()) {
            $referer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL . 'ionadmin/index';
            $referer = strtok($referer, '?');
            $query = "UPDATE ct_encuesta e SET e.activa = 0";
            Doo::db()->query($query);
            header('location:' . $referer . '?success=1');
        } else {
            header('location:' . $referer . '?error=1');
        }
    }

    function estadisticas() {
        session_start();
        if (Session::siExisteSesion()) {
            $this->data['idencuesta'] = intval($this->params['idencuesta']);
            $this->data['idevento'] = intval($this->params['idevento']);
            Doo::loadModel('CtEncuesta');
            Doo::loadModel('CtPreguntas');
            Doo::loadModel('CtRespuesta');
            $ec = new CtEncuesta();
            $ec->id_encuesta = intval($this->params['idencuesta']);
            $encuesta = $ec->getOne();
            $this->data['encuesta'] = $encuesta;
            if (!empty($encuesta)) {
                $preguntas = new CtPreguntas();
                $preguntas->id_encuesta = $encuesta->id_encuesta;
                $preguntas = $preguntas->relate('CtRespuesta');
                $preguntasArray = array();
                if (!empty($preguntas)) {
                    foreach ($preguntas as $p) {
                        $copyp = $p;
                        if (!empty($p->CtRespuesta)) {
                            $ctResp = array();
                            $totalRespondieron = 0;
                            foreach ($p->CtRespuesta as $r) {
                                $r->resultados = $r->getResultadosEncuestas();
                                $ctResp[] = $r;
                                $totalRespondieron += $r->resultados['valor'];
                            }
                            unset($copyp->CtRespuesta);
                            $copyp->CtRespuesta = $ctResp;
                            $copyp->totalRespondieron = $totalRespondieron;
                        }
                        $preguntasArray[] = $copyp;
                    }
                }
                $this->data['preguntas'] = $preguntasArray;
                $this->data['nombre_encuesta'] = $encuesta->nombre;
                $this->renderc('admin/encuesta-graficas', $this->data);
            } else {
                header('location:' . Doo::conf()->APP_URL . 'ionadmin/eventos?error=1');
            }
        } else {
            header('location:' . Doo::conf()->APP_URL . 'ionadmin/login?error=1');
        }
    }

}

?>