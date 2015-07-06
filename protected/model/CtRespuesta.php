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

    function getResultadosEncuestas() {
        $r = null;
        if (!empty($this->id_respuesta)) {
            $query = 'SELECT COUNT(id_resultado_encuesta) AS valor, id_respuesta FROM ht_resultado_encuesta WHERE id_respuesta = ' . $this->id_respuesta . ' GROUP BY id_respuesta';
            $result = Doo::db()->query($query);
            $r = $result->fetch();
        }
        return $r;
    }

}
