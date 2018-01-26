<?php

use areas\cliente\controllers\UsuarioController;

include_once('../../Config.php');
include_once(ROOT . '/areas/cliente/controllers/UsuarioController.php');

if(isset($_POST['tarefa'])) {

    if($_POST['tarefa'] == 'loginUsuario') {
        $usuarioController = new UsuarioController();

        $resposta = $usuarioController->VerificarLogin($_POST);

        $json = json_encode($resposta);

        echo $json;
    }
}