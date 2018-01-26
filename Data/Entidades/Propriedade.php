<?php
namespace Data\Entidades;

include_once(ROOT . '/Data/Entidades/BaseEntidade.php');

class Propriedade extends BaseEntidade
{
    public $id;
    public $nome;   

    public function __construct($array = null) {        
        parent::__construct($array);              
    }    
}