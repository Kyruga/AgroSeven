<?php

namespace areas\cliente\controllers;

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

    public function cadastrarNovoUsuario($array) {

        try {
            $usuarioServico = new UsuarioService();
            $usuarioEntidade = new Usuario($array);
        
            $id = $usuarioServico->cadastrarNovoUsuario($usuarioEntidade);

            $resposta = array('error' => false, 'codigo' => $id, 'mensagem' => 'Usuario cadastrado com Sucesso!');

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }    

    public function alterarDadosUsuario($array) {
        
        try {
            $servicoUsuario = new UsuarioService();
            $entidadeUsuario = new Usuario($array);

            $funcionarioId = $servicoUsuario->alterarDadosUsuario($entidadeUsuario);

            $resposta = array('error' => false, 'codigo' => $funcionarioId);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());
            return $resposta;
        }
    } 
    
    // public function alterarEnderecoUsuario($array) {
        
    //     try {
    //         $servicoUsuario = new UsuarioService();
    //         $entidadeUsuario = new Usuario($array);

    //         $funcionarioId = $servicoUsuario->alterarEnderecoUsuario($entidadeUsuario);

    //         $resposta = array('error' => false, 'codigo' => $funcionarioId);

    //         return $resposta;
    //     }
    //     catch(\Exception $e) {
    //         $resposta = array('error' => true, 'message' => $e->getMessage());
    //         return $resposta;
    //     }
    // } 

    public function carregarDadosUsuario($id) {

        try {
            $usuarioServico = new UsuarioService();
        
            $dadosUsuario = $usuarioServico->carregarDadosUsuario($id);

            $resposta = array('error' => false, 'dados' => $dadosUsuario, 'mensagem' => 'Dados usuario retornados com Sucesso!');

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }  
}