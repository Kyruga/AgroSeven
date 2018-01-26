<?php

use areas\cliente\controllers\UsuarioController;
use areas\cliente\controllers\PropriedadeController;

include_once('../../Config.php');
include_once(ROOT . '/areas/cliente/controllers/UsuarioController.php');
include_once(ROOT . '/areas/cliente/controllers/PropriedadeController.php');

if(isset($_POST['tarefa'])) {

    if($_POST['tarefa'] == 'loginUsuario') {
        $usuarioController = new UsuarioController();

        $resposta = $usuarioController->VerificarLogin($_POST);

        $json = json_encode($resposta);

        echo $json;
    }
    if($_POST['tarefa'] == 'CarregarPropriedades') {
        $controller = new PropriedadeController();

        $resposta = $controller->BuscarPropriedades();

        $json = json_encode($resposta);

        echo $json;
    }
}