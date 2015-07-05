<?php

Doo::loadModel('base/CtPreguntasBase');

class CtPreguntas extends CtPreguntasBase {

    function borrarRespuestas() {
        if (!empty($this->id_pregunta)) {
            Doo::loadModel('CtRespuesta');
            $resp = new CtRespuesta();
            $resp->id_pregunta = $this->id_pregunta;
            $resp->delete();
        }
    }

}
