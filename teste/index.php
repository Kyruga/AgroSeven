<?php

use Data\Entidades\Usuario;
use Data\Repository\BaseRepo;
include_once('../Config.php');
include_once(ROOT . 'data/entidades/usuario.php');
include_once(ROOT . 'data/repository/baserepo.php');

$user = new Usuario();

$user->id = 0;
$user->nome = "Jeová Nascimento de Sousa";
$user->email = 'jeova@gmail.com';
$user->cpf = '123456789';
$user->rg = '129456321';
$user->telefone = '3291-6457';
$user->endereco = 'Rua Camargo 584';
$user->numero = 59;
$user->bairro = 'Santa Helena';
$user->cidade = 'Alfenas';
$user->estado = 'MG';
$user->cep = '37131-440';

$repo = new BaseRepo();

try{
    $results = $repo->Create($user, 'funcionario');
}
catch(\Exception $e) {
    $resposta = array('error' => true, 'message' => $e->getMessage());

    return $resposta;
}