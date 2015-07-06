<?php

/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MainController extends DooController {

    public function index() {
        $this->data['slug'] = 'home';
        $this->renderc('home', $this->data);
        //header('location:'.Doo::conf()->APP_URL.'programa');
    }

    public function website() {
        $this->data['slug'] = 'website';
        $this->renderc('website', $this->data);
    }

    public function programa() {
        Doo::loadModel('CtEventos');
        $this->data['eventos'] = Doo::db()->find('CtEventos', array('asc' => 'hora'));
        $this->data['slug'] = 'programa';
        $this->renderc('eventos', $this->data);
    }

    public function encuesta() {
        if (isset($_POST) && !empty($_POST) && isset($_POST['genero']) && isset($_POST['edad'])) {
            Doo::loadModel('HtResultadoEncuesta');
            $genero = strip_tags(addslashes($_POST['genero']));
            $edad = strip_tags(addslashes($_POST['edad']));
            unset($_POST['genero']);
            unset($_POST['edad']);
            if (!empty($_POST)) {
                foreach ($_POST as $idPregunta => $idRespuesta) {
                    $idRespuesta = intval($idRespuesta);
                    $res = new HtResultadoEncuesta();
                    $res->id_respuesta = $idRespuesta;
                    $res->sexo = $genero;
                    $res->rango_edad = $edad;
                    $res->insert();
                }
            }
            header('location:' . Doo::conf()->APP_URL . 'encuesta/gracias');
        } else {
            Doo::loadModel('CtEncuesta');
            Doo::loadModel('CtEventos');
            Doo::loadModel('CtPreguntas');
            Doo::loadModel('CtRespuesta');
            $en = new CtEncuesta();
            $en->activa = 1;
            $encuesta = $en->getOne();
            $this->data['encuesta'] = $encuesta;
            if (!empty($encuesta)) {
                $evento = new CtEventos();
                $evento->id_evento = $encuesta->id_evento;
                $evento = $evento->getOne();
                $this->data['evento'] = $evento;
                $preguntas = new CtPreguntas();
                $preguntas->id_encuesta = $encuesta->id_encuesta;
                $preguntas = $preguntas->relate('CtRespuesta');
                $this->data['preguntas'] = $preguntas;
            }
            $this->data['slug'] = 'encuesta';
            $this->renderc('encuesta', $this->data);
        }
    }

    public function encuestaGracias() {
        Doo::loadModel('CtEncuesta');
        Doo::loadModel('CtPreguntas');
        Doo::loadModel('CtRespuesta');
        $en = new CtEncuesta();
        $en->activa = 1;
        $encuesta = $en->getOne();
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
                        foreach ($p->CtRespuesta as $r) {
                            $r->resultados = $r->getResultadosEncuestas();
                            $ctResp[] = $r;
                        }
                        unset($copyp->CtRespuesta);
                        $copyp->CtRespuesta = $ctResp;
                    }
                    $preguntasArray[] = $copyp;
                }
            }
            $this->data['preguntas'] = $preguntasArray;
        }
        $this->renderc('encuesta-gracias', $this->data);
    }

    public function issue() {
        $this->data['slug'] = 'issue';
        $this->renderc('issue', $this->data);
    }

    public function encuestaActiva() {
        $result['encuesta'] = FALSE;
        Doo::loadModel('CtEncuesta');
        $en = new CtEncuesta();
        $en->activa = 1;
        $encuesta = $en->getOne();
        if (!empty($encuesta)) {
            $result['encuesta'] = TRUE;
        }
        echo json_encode($result);
    }

}

?>