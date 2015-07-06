<?php

Doo::loadModel('base/CtRespuestaBase');

class CtRespuesta extends CtRespuestaBase {

    function delete($opt = NULL) {
        Doo::loadModel('HtResultadoEncuesta');
        if (!empty($this->id_respuesta)) {
            $h = new HtResultadoEncuesta();
            $h->id_respuesta = $this->id_respuesta;
            $h->delete($opt);
        } else if (!empty($this->id_pregunta)) {
            $f = $this->getOne();
            if (!empty($f)) {
                $h = new HtResultadoEncuesta();
                $h->id_respuesta = $f->id_respuesta;
                $h->delete($opt);
            }
        }
        parent::delete($opt);
    }

}
