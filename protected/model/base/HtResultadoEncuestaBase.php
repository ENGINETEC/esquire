<?php
Doo::loadCore('db/DooModel');

class HtResultadoEncuestaBase extends DooModel{
    
    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_resultado_encuesta;
    
    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_respuesta;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $rango_edad;

    /**
     * @var varchar Max length is 100.
     */
    public $sexo;


    public $_table = 'ht_resultado_encuesta';
    public $_primarykey = 'id_resultado_encuesta';
    public $_fields = array('id_resultado_encuesta','id_respuesta','rango_edad','sexo');

    public function getVRules() {
        return array(
                'id_resultado_encuesta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'id_respuesta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'rango_edad' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),
            
                'sexo' => array(
                        array( 'maxlength', 1 ),
                        array( 'notnull' ),
                )
            );
    }

}