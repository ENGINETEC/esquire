<?php

/**
 * Session Controller
 * 
 * Controller principal del cual extenderán todos los demás controllers
 *
 * @author miguelperez
 */
class Session extends DooController {
    
    /**
     * encpass
     * 
     * Genera una suma de verificación para la contraseña
     * 
     * @param string $passwd Contraseña a encriptar
     * @return string Devuelve la suma de verificación generada
     * 
     * **/
    static function encpass($passwd){
        return sha1(md5($passwd));
    }
    
    /**
     * chekSumGen
     * 
     * Genera una suma de veirificacion para la sesión actual
     * Evita que alguien clone la sesión e ingrese con permisos de otro usuario
     * 
     * @param int $idUsuario ID Del usuario que inicio sesión
     * @param int $tipo ID del tipo de usuario que inicio sesión
     * @return bool Devuelve TRUE si pudo genera la suma de verificación, FALSE en caso contrario
     * 
     * **/
    static function checkSumGen($idUsuario) {
        if (isset($_SESSION)) {
            $_SESSION['checksum'] = sha1(md5($_SERVER['REMOTE_ADDR']) . md5($idUsuario));
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    /**
     * validaCheckSum
     * 
     * Valida la suma de verificación de la sesión actual, creada con checkSumGen
     * 
     * @param void No recibe ningún parámetro
     * @return bool Devuelve TRUE si la suma de verificación es correcta, FALSE en caso contrario
     * 
     * **/
    static function validaCheckSum() {
        if (isset($_SESSION) && isset($_SESSION['checksum']) && isset($_SESSION['usuario']) ) {
            if ($_SESSION['checksum'] == sha1(md5($_SERVER['REMOTE_ADDR']) . md5($_SESSION['usuario']) )) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    /**
     * siExisteSesion
     * 
     * Valida si actualmente el usuario ya tiene una sesión abierta
     * 
     * @param void No recibe ningún parámetro
     * @return bool Devuelve TRUE si existe una sesión activa, FALSE en caso contrario
     * 
     * **/
    static function siExisteSesion() {
        if (self::validaCheckSum()) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * getHomeUsuario
     * 
     * Si existe una sesión activa, devuelve el Home del usuario de acuerdo al 
     * tipo de usuario
     * 
     * @param void No recibe ningún parámetro
     * @return string Devuelve un string con la URL al home del usuario activo
     * 
     * **/
    static function getHomeUsuario() {
        $home = Doo::conf()->APP_URL.'ionadmin/index';
        return $home;
    }
    
    /**
     * debugVar
     * 
     * Imprime el contenido de una variable con la salida en HTML
     * 
     * @param mixed $var Variable a imprimir
     * @return void No devuelve valores
     * 
     * **/
    static function debugVar($var){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

}
