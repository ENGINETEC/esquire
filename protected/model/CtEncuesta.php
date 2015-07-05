<?php
Doo::loadModel('base/CtEncuestaBase');

class CtEncuesta extends CtEncuestaBase{
    
    function borrarPreguntas() {
        if (!empty($this->id_encuesta)) {
            Doo::loadModel('CtPreguntas');
            $p = new CtPreguntas();
            $p->id_encuesta = $this->id_encuesta;
            $preguntas = $p->find();
            if(!empty($preguntas)){
                foreach($preguntas as $preg){
                    $preg->borrarRespuestas();
                    $preg->delete();
                }
            }
        }
    }
    
}