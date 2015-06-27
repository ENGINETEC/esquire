<?php
Doo::loadCore('db/DooModel');

class CtEncuestaBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_encuesta;

    /**
     * @var varchar Max length is 250.
     */
    public $nombre;

    /**
     * @var tinyint Max length is 4.
     */
    public $activa;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_evento;

    public $_table = 'ct_encuesta';
    public $_primarykey = 'id_encuesta';
    public $_fields = array('id_encuesta','nombre','activa','id_evento');

    public function getVRules() {
        return array(
                'id_encuesta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'nombre' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'activa' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                ),

                'id_evento' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                )
            );
    }

}