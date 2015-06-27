<?php
Doo::loadCore('db/DooModel');

class CtPreguntasBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_pregunta;

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_encuesta;

    /**
     * @var varchar Max length is 250.
     */
    public $pregunta;

    /**
     * @var tinyint Max length is 4.
     */
    public $activa;

    /**
     * @var datetime
     */
    public $fecha_publicacion;

    public $_table = 'ct_preguntas';
    public $_primarykey = 'id_pregunta';
    public $_fields = array('id_pregunta','id_encuesta','pregunta','activa','fecha_publicacion');

    public function getVRules() {
        return array(
                'id_pregunta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'id_encuesta' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'notnull' ),
                ),

                'pregunta' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'activa' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                ),

                'fecha_publicacion' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                )
            );
    }

}