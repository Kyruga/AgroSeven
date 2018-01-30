<?php

namespace areas\cliente\controller;

use data\servicos\SistemaPlantioService;
use data\entidades\SistemaPlantio;

include_once(ROOT . 'data/servicos/sistemaplantioservice.php');
include_once(ROOT . 'data\entidades\SistemaPlantio.php');

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

    public function BuscarSistemPlantio($id) {
        try {
            $servico = new SistemaPlantioService();

            $bean = $servico->GetById($id);

            $model = new SistemaPlantio($bean);

            $resposta = array('error' => false, 'SistemaPlantio' => $model);

            return $resposta;

        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }
}