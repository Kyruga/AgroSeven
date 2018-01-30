<?php

namespace areas\cliente\controller;

use Data\Servicos\PropriedadesService;
use Data\Servicos\GlebaService;
use Data\Entidades\Propriedade;
use Data\Entidades\Gleba;
use data\servicos\SistemaPlantioService;
use data\entidades\SistemaPlantio;


include_once(ROOT . '/Data/Entidades/BaseEntidade.php');
include_once(ROOT . '/Data/Entidades/Gleba.php');
include_once(ROOT . '/Data/Entidades/Propriedade.php');
include_once(ROOT . '/Data/Repository/BaseRepo.php');
include_once(ROOT . '/Data/Repository/GlebaRepo.php');
include_once(ROOT . '/Data/Repository/PropriedadeRepo.php');
include_once(ROOT . '/Data/Servicos/GlebaService.php');
include_once(ROOT . '/Data/Servicos/PropriedadesService.php');

class GlebaController
{
    public function Index() {
            //Buscar uma lista de Glebas 
        try {
            $glebaService = new GlebaService();

            $beans = $glebaService->BuscarTodasGlebas();

            if(count($beans) == 0) 
                throw new \Exception("Não foi possível buscar as Glebas");

            foreach($beans as $keyObj => $objProperties) {
                $gleba = new Gleba($objProperties);
    
                $listGlebas[] = $gleba;
            }

            $resposta = array('error' => false, 'glebas' => $listGlebas);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }

    public function Criar() {
        try {
            $propriedadeService = new PropriedadesService(); 
        
            $propriedades = $propriedadeService->BuscarPropriedades();           

            foreach($propriedades as $key => $objProperties) {
                $property = new Propriedade($objProperties);
        
                $model[] = $property;        
            }

            $resposta = array('error' => false, 'propriedades' => $model);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }

    public function Editar($array) {
        try {
            $glebaService = new GlebaService();

            $gleba = $glebaService->BuscarGleba($array);

            $resposta = array('error' => false, 'gleba' => $gleba);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }

    public function CadastrarGleba($array) {
        try {
            $glebaService = new GlebaService();
            $propService = new PropriedadesService();
            $plantioService = new SistemaPlantioService();
            
            if($array['propriedadeId'] == null || $array['propriedadeId'] == 0)
                throw new \Exception("Nenhuma propriedade foi selecionada");

            if($array['sistemaplantio_id'] == null || $array['sistemaplantio_id'] == 0)
                throw new \Exception("Nenhum sistema de plantio foi selecionado");

            $propriedade = $propService->BuscarPropriedadePorId($array['propriedadeId']);

            $sistemaPlantio = new SistemaPlantio($plantioService->GetById($array['sistemaplantio_id']));

            $id = $glebaService->CadastrarGleba($array,$propriedade, $sistemaPlantio);
            
            $resposta = array('error' => false, 'Codigo' => $id);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }

    public function AtualizarGleba($array) {
        try {
            $glebaService = new GlebaService();
            $propService = new PropriedadesService();
            
            if($array['propriedadeId'] == null || $array['propriedadeId'] == 0)
                throw new \Exception("Nenhuma propriedade foi selecionada");

            $propriedade = $propService->BuscarPropriedadePorId($array['propriedadeId']);

            $id = $glebaService->CadastrarGleba($array,$propriedade);
            
            $resposta = array('error' => false, 'Codigo' => $id);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }
}