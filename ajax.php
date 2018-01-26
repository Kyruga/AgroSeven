<?php

require_once 'vendor/autoload.php';

// echo '<pre>' . print_r( $_POST, true ) . '</pre>';

extract($_POST);
require_once('./areas/' .$modulo . '/controlers/' .$controlador. '.php');
$controler = new $controlador($_POST);
var_dump($controler);
// else echo json_encode($_GET).'  '.json_encode($_POST);
// $ses->fecha_bd();
// fecha_bd();//fecha banco se ainda estiver aberto
// if($GLOBALS['relatar_erros'] && $GLOBALS['relatorio_erros']!='')
// 	echo "<pre>Relatório de erros:\n".$GLOBALS['relatorio_erros']."</pre>";//exibe relatório de erros
?>