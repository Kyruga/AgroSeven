<?php
namespace Data\Entidades;

include_once(ROOT . '/Data/Entidades/BaseEntidade.php');

class Propriedade extends BaseEntidade
{
    public $id;
    public $nome;   
    public $endereco;   
    public $numero;   
    public $bairro;   
    public $cidade;   
    public $estado;   
    public $cep;   
    public $localizacaoGeografica;   
    
    public function __construct($array = null) {        
        parent::__construct($array);              
    }    
}