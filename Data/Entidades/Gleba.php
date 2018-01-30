<?php

namespace Data\Entidades;

class Gleba extends BaseEntidade
{
    public $id;
    public $nome;
    public $numeroplantas;
    public $area;
    public $rua; //espacamento
    public $planta; //espaçamento
    public $sacahectare;
    public $potencial;
    public $ss;
    public $caracterizacao;
    public $propriedade_id;
    public $sistemaplantio_id;

    public function __construct($array = null)
    {
        parent::__construct($array);
    }
}