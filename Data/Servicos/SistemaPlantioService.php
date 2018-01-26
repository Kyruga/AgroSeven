<?php

namespace data\servicos;

use data\repository\SistemaPlantioRepo;

include_once(ROOT . 'data/repository/sistemaplantiorepo.php');


class SistemaPlantioService
{
    public function GetAll() {
        $repo = new SistemaPlantioRepo();

        return $repo->GetAll('sistema_de_plantio');
    }
}