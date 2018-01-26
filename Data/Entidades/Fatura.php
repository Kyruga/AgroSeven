<?php

namespace Data\Entidades;

include_once(ROOT . '/Data/Entidades/BaseEntidade.php');

class Fatura extends BaseEntidade
{
    public $id;
    public $vencimento;
    public $valor;
    public $pagamento;
    public $status;
    public $tipoPagamento;
    
    public function __construct($array) {
        parent::__construct($array);        
    }

}