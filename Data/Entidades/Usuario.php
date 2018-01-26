<?php

namespace Data\Entidades;

include_once(ROOT . '/Data/Entidades/BaseEntidade.php');

class Usuario extends BaseEntidade
{
    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $rg;
    public $telefone;
    /*endereco: talvez outra tabela mas não agora */
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    public $cep;    

    public $login;
    public $senha;
    
    public function __construct($array) {
        parent::__construct($array);        
    }

    public function CriptografarSenha() {
        $this->senha = sha1($this->senha);
    }
}