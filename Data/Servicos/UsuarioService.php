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
}