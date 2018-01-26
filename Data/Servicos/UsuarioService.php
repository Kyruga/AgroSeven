<?php

namespace Data\Servicos;

use Data\Repository\UsuarioRepo;

include_once(ROOT . '/data/repository/usuariorepo.php');


class UsuarioService
{
    public function Login($usuario) {
        $usuarioRepo = new UsuarioRepo();

        $bean = $usuarioRepo->FindOne('usuario', 'login=? and senha=?',array($usuario->login, $usuario->senha));

        return $bean->id;
    }

    public function MudarSenha($array) {
    }

    public function cadastrarNovoUsuario($usuario) {
        
        $usuarioRepo = new UsuarioRepo();

        $existe = $usuarioRepo->FindOne('funcionario', 'cpf=?' , array($usuario->cpf));
            
        if(!empty($existe)) {
            throw new \Exception('Já existe um registro vinculado a este cpf!!!');
        }

        return $usuarioRepo->Save('funcionario', $usuario);
    }  

    public function alterarDadosUsuario($usuario) {
        
        $usuarioRepo = new UsuarioRepo();

        $existe = $usuarioRepo->FindOne('funcionario', 'cpf=?' , array($usuario->cpf));
            
        if(!empty($existe)) {

            $usuario->id = $existe->id;

            return $usuarioRepo->Save('funcionario', $usuario);
        }else{
            throw new \Exception('algum erro do cpf');
        }

    } 

    public function carregarDadosUsuario($id) {
        
        $usuarioRepo = new UsuarioRepo();

        $existe = $usuarioRepo->FindOne('funcionario', 'id=?' , array($id));
            
        if(!empty($existe)) {
            return $existe;
        }else{
            throw new \Exception('Usuario nao encontrado');
        }

    } 
}