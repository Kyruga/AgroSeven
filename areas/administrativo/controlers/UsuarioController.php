<?php

namespace areas\administrativo\controllers;

use Data\Entidades\Usuario;
use Data\Servicos\UsuarioService;


include_once(ROOT . '/Data/Entidades/Usuario.php');
include_once(ROOT . '/Data/Repository/BaseRepo.php');
include_once(ROOT . '/Data/Repository/UsuarioRepo.php');
include_once(ROOT . '/Data/Servicos/UsuarioService.php');

class UsuarioController
{
    
    public function VerificarLogin($array) {
        
        try {
            $usuario = new Usuario($array);
            $usuarioService = new UsuarioService();

            $usuario->CriptografarSenha();

            $id = $usuarioService->Login($usuario);

            $resposta = array('error' => false, 'codigo' => $id);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }

    public function AlterarSenha($array) {

    }
}