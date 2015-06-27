<?php
Doo::loadCore('db/DooModel');

class CtUsuarioBase extends DooModel{

    /**
     * @var varchar Max length is 15.
     */
    public $id_usuario;

    /**
     * @var varchar Max length is 100.
     */
    public $nombre;

    /**
     * @var varchar Max length is 80.
     */
    public $correo_electornico;

    /**
     * @var varchar Max length is 50.
     */
    public $passwd;

    public $_table = 'ct_usuario';
    public $_primarykey = 'id_usuario';
    public $_fields = array('id_usuario','nombre','correo_electornico','passwd');

    public function getVRules() {
        return array(
                'id_usuario' => array(
                        array( 'maxlength', 15 ),
                        array( 'notnull' ),
                ),

                'nombre' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'correo_electornico' => array(
                        array( 'maxlength', 80 ),
                        array( 'notnull' ),
                ),

                'passwd' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                )
            );
    }

}