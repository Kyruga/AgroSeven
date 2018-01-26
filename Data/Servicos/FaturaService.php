<?php

namespace Data\Servicos;

use Data\Repository\FaturaRepo;

include_once(ROOT . '/data/repository/faturarepo.php');


class FaturaService
{
    public function cadastrarNovoUsuario($usuario) {
        
        $usuarioRepo = new UsuarioRepo();

        //$existe = $usuarioRepo->FindOne('funcionario', 'cpf=?' , array($usuario->cpf));
            
        // if(!empty($existe)) {
        //     throw new \Exception('Já existe um registro vinculado a este cpf!!!');
        // }

        return $usuarioRepo->Save('funcionario', $usuario);
    }  

}