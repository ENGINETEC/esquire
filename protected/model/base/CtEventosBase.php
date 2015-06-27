<?php
Doo::loadCore('db/DooModel');

class CtEventosBase extends DooModel{

    /**
     * @var int Max length is 10.  unsigned.
     */
    public $id_evento;

    /**
     * @var varchar Max length is 120.
     */
    public $nombre;

    /**
     * @var date
     */
    public $fecha;

    /**
     * @var time
     */
    public $hora;

    /**
     * @var varchar Max length is 250.
     */
    public $presentador;

    /**
     * @var longtext
     */
    public $detalles;

    public $_table = 'ct_eventos';
    public $_primarykey = 'id_evento';
    public $_fields = array('id_evento','nombre','fecha','hora','presentador','detalles');

    public function getVRules() {
        return array(
                'id_evento' => array(
                        array( 'integer' ),
                        array( 'min', 0 ),
                        array( 'maxlength', 10 ),
                        array( 'optional' ),
                ),

                'nombre' => array(
                        array( 'maxlength', 120 ),
                        array( 'notnull' ),
                ),

                'fecha' => array(
                        array( 'date' ),
                        array( 'notnull' ),
                ),

                'hora' => array(
                        array( 'datetime' ),
                        array( 'notnull' ),
                ),

                'presentador' => array(
                        array( 'maxlength', 250 ),
                        array( 'optional' ),
                ),

                'detalles' => array(
                        array( 'optional' ),
                )
            );
    }

}