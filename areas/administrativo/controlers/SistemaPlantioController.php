<?php

namespace areas\administrativo\controller;

use data\servicos\SistemaPlantioService;

include_once(ROOT . 'data/servicos/sistemaplantioservice.php');

class SistemaPlantioController
{
    public function Index() {
        try {
            $servico = new SistemaPlantioService();

            $list = $servico->GetAll();

            $resposta = array('error' => false, 'SistemaPlantio' => $list);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }
}