<?php
/**
 * Example Database connection settings and DB relationship mapping
 * $dbmap[Table A]['has_one'][Table B] = array('foreign_key'=> Table B's column that links to Table A );
 * $dbmap[Table B]['belongs_to'][Table A] = array('foreign_key'=> Table A's column where Table B links to );
*/

$dbmap = array();
//CtEventos
$dbmap['CtEventos']['has_many']['CtEncuesta'] = array('foreign_key'=>'id_evento');

//CtEncuesta
$dbmap['CtEncuesta']['belongs_to']['CtEventos'] = array('foreign_key'=>'id_evento');
$dbmap['CtEncuesta']['has_many']['CtPreguntas'] = array('foreign_key'=>'id_encuesta');

//CtPreguntas
$dbmap['CtPreguntas']['belongs_to']['CtEncuesta'] = array('foreign_key'=>'id_encuesta');
$dbmap['CtPreguntas']['has_many']['CtRespuesta'] = array('foreign_key'=>'id_pregunta');

//CtRespuestas
$dbmap['CtRespuesta']['belongs_to']['CtPreguntas'] = array('foreign_key'=>'id_pregunta');



//$dbconfig[ Environment or connection name] = array(Host, Database, User, Password, DB Driver, Make Persistent Connection?);
/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * array('localhost', 'database', 'root', '1234', 'mysql', true, 'collate'=>'utf8_unicode_ci', 'charset'=>'utf8'); 
 */

$dbconfig['dev'] = array('localhost', 'esquire_app', 'root', 'cete8653', 'mysql', true,  'collate'=>'latin1_spanish_ci', 'charset'=>'latin1');
$dbconfig['prod'] = array('localhost', 'esquire_app', 'root', 'cete8653', 'mysql', true, 'collate'=>'latin1_spanish_ci', 'charset'=>'latin1');
?>