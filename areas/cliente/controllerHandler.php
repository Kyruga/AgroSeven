<?php

use areas\cliente\controllers\PropriedadeController;
use areas\cliente\controllers\UsuarioController;
use areas\cliente\controller\glebaController;
use areas\cliente\controller\SistemaPlantioController;

include_once('../../Config.php');
include_once(ROOT . 'areas/cliente/controllers/PropriedadeController.php');
include_once(ROOT . 'areas/cliente/controllers/UsuarioController.php');
include_once(ROOT . 'areas/cliente/controllers/GlebaController.php');
include_once(ROOT . 'areas/cliente/controllers/SistemaPlantioController.php');

if(isset($_POST['tarefa'])) {

    if($_POST['tarefa'] == 'cadastrarPropriedade') {

        $propriedadeController = new PropriedadeController();

        $resposta = $propriedadeController->Index($_POST);

        $json = json_encode($resposta);
        
        echo $json;
    }

    if($_POST['tarefa'] == 'loginUsuario') {
        $usuarioController = new UsuarioController();

        $resposta = $usuarioController->VerificarLogin($_POST);

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == 'carregarPropriedades') {
        $glebaController = new GlebaController();

        $resposta = $glebaController->Criar();

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == "ListarGlebas") {
        $glebaController = new GlebaController();

        $resposta = $glebaController->Index();

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == 'SalvarGleba') {
        $glebaController = new GlebaController();

        $resposta = $glebaController->CadastrarGleba($_POST);

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == 'EditarGleba') {
        $glebaController = new GlebaController();

        $resposta = $glebaController->Editar($_POST);

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == 'SalvarEditGleba') {
        $glebaController = new GlebaController();

        $resposta = $glebaController->AtualizarGleba($_POST);

        $json = json_encode($resposta);

        echo $json;
    }

    if($_POST['tarefa'] == 'CarregarSistemaPlantio') {
        $controller = new SistemaPlantioController();

        $resposta = $controller->Index();

        $json = json_encode($resposta);

        echo $json;

        exit;
    }

    if($_POST['tarefa'] == 'CarregarInfoSistemaPlantio') {
        $controller = new SistemaPlantioController();

        $resposta = $controller->BuscarSistemPlantio($_POST['id']);

        $json = json_encode($resposta);

        echo $json;

        exit;
    }

    if($_POST['tarefa'] == 'CarregarTalhoes') {
    }

    if($_POST['tarefa'] == 'cadastrarNovoUsuario') {

        $usuarioController = new UsuarioController();

        $resposta = $usuarioController->cadastrarNovoUsuario($_POST);

        $json = json_encode($resposta);
        
        echo $json;

        exit;
    }

    if($_POST['tarefa'] == 'alterarDadosUsuario') {
        
        $controladorUsuario = new UsuarioController();
        $resposta = $controladorUsuario->alterarDadosUsuario($_POST);
        $json = json_encode($resposta);
        echo $json;

    }

    if($_POST['tarefa'] == 'carregarDadosUsuario') {
        $controladorUsuario = new UsuarioController();
        $resposta = $controladorUsuario->carregarDadosUsuario($_POST['id']);
        $json = json_encode($resposta);
        echo $json;
    }

    if($_POST['tarefa'] == 'salvarNovoLocalPropriedade') {

        $propriedadeController = new PropriedadeController();

        $resposta = $propriedadeController->salvarNovoLocalPropriedade($_POST);

        $json = json_encode($resposta);
        
        echo $json;
    }

}