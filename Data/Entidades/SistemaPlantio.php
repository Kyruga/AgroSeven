<?php

namespace data\entidades;

use Data\Entidades\BaseEntidade;

include_once(ROOT . 'data/entidades/baseentidade.php');


class SistemaPlantio extends BaseEntidade
{
    public $id;
    public $sistema;
    public $vu_a_v;
    public $colheita;
    public $unidade;
    public $calagem;
    public $adubacao;
    public $apl_herbicida;
    public $apl_folha;
    public $apl_solo;
    public $cor_safra;
    public $poda;
    public $desbrota;
    public $apl_organico;
    public $rocada;
    public $capina;

    public function __construct($array = null)
    {
        parent::__construct($array);
    }
}