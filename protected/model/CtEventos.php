<?php

Doo::loadModel('base/CtEventosBase');

class CtEventos extends CtEventosBase {

    function borrarEncuestas() {
        
        if (!empty($this->id_evento)) {
            Doo::loadModel('CtEncuesta');
            $e = new CtEncuesta();
            $e->id_evento = $this->id_evento;
            $encuestas = $e->find();
            if (!empty($encuestas)) {
                foreach ($encuestas as $enc) {
                    $enc->borrarPreguntas();
                    $enc->delete();
                }
            }
        }
        
    }

}
