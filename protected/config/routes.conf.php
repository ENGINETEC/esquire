<?php
//App Esquire
$route['*']['/'] = array('MainController', 'index');
$route['*']['/error'] = array('ErrorController', 'index');

//administrador
$route['*']['/ionadmin/login'] = array('AdminController', 'login');
$route['*']['/ionadmin/logout'] = array('AdminController', 'logout');

$route['*']['/ionadmin/index'] = array('AdminController', 'index');

//Eventos
$route['*']['/ionadmin/eventos'] = array('EventosController', 'index');
$route['*']['/ionadmin/eventos/agregar'] = array('EventosController', 'agregar');
$route['*']['/ionadmin/eventos/eliminar/:idevento'] = array('EventosController', 'eliminar');
$route['*']['/ionadmin/eventos/habilitar/:idevento'] = array('EventosController', 'habilitar');


//Encuestas
$route['*']['/ionadmin/evento/:idevento/encuestas'] = array('EncuestasController', 'index');
$route['*']['/ionadmin/evento/:idevento/encuestas/agregar'] = array('EncuestasController', 'agregar');
$route['*']['/ionadmin/evento/:idevento/encuestas/eliminar/:idencuesta'] = array('EncuestasController', 'eliminar');
$route['*']['/ionadmin/evento/:idevento/encuestas/habilitar/:idencuesta'] = array('EncuestasController', 'habilitar');
$route['*']['/ionadmin/evento/:idevento/encuestas/editar/:idencuesta'] = array('EncuestasController', 'ver');


//Preguntas
$route['*']['/ionadmin/encuesta/:idencuesta/preguntas/agregar'] = array('PyRController', 'agregarPregunta');
$route['*']['/ionadmin/encuesta/preguntas/eliminar/:idpregunta'] = array('PyRController', 'eliminarPregunta');

//Respuestas
$route['*']['/ionadmin/encuesta/preguntas/:idpregunta/respuesta/agregar'] = array('PyRController', 'agregarRespuesta');
$route['*']['/ionadmin/encuesta/preguntas/respuesta/eliminar/:idrespuesta'] = array('PyRController', 'eliminarRespuesta');


//Página
$route['*']['/website'] = array('MainController', 'website');
$route['*']['/programa'] = array('MainController', 'programa');
$route['*']['/issue'] = array('MainController', 'issue');

?>