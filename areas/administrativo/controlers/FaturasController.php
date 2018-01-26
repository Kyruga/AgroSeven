<?php

namespace areas\administrativo\controllers;

use Data\Entidades\Fatura;
use Data\Servicos\FaturaService;


include_once(ROOT . '/Data/Entidades/Fatura.php');
include_once(ROOT . '/Data/Repository/BaseRepo.php');
include_once(ROOT . '/Data/Repository/FaturaRepo.php');
include_once(ROOT . '/Data/Servicos/FaturaService.php');

class FaturaController
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

}