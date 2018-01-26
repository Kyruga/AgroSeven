<?php

use areas\administrativo\controllers\PropriedadeController;
use areas\administrativo\controllers\UsuarioController;
use areas\administrativo\controller\glebaController;
use areas\administrativo\controller\SistemaPlantioController;

include_once('../../Config.php');
include_once('controlers/PropriedadeController.php');
include_once('controlers/UsuarioController.php');
include_once('controlers/GlebaController.php');
include_once('controlers/SistemaPlantioController.php');

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

    if($_POST['tarefa'] == 'CarregarTalhoes') {
        
    }
}