<?php

namespace Data\Entidades;

class Gleba extends BaseEntidade
{
    public $id;
    public $nome;
    public $propriedade_id;

    public function __construct($array = null)
    {
        parent::__construct($array);
    }
}