<?php
Doo::loadCore('db/DooModel');

class CtRespuestaBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_respuesta;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_pregunta;

    /**
     * @var varchar Max length is 100.
     */
    public $respuesta;

    /**
     * @var int Max length is 11.
     */
    public $valor;

    public $_table = 'ct_respuesta';
    public $_primarykey = 'id_respuesta';
    public $_fields = array('id_respuesta','id_pregunta','respuesta','valor');

    public function getVRules() {
        return array(
                'id_respuesta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'id_pregunta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'respuesta' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'valor' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}