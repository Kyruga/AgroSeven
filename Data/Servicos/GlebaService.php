<?php

namespace Data\Servicos;

use Data\Entidades\Gleba;
use Data\Repository\GlebaRepo;

include_once(ROOT . 'Data\Entidades\Gleba.php');
include_once(ROOT . 'Data\Repository\GlebaRepo.php');


class GlebaService
{
    public function BuscarTodasGlebas() {
        $repo = new GlebaRepo();

        $beans = $repo->GetAll('gleba');

        foreach($beans as $key => $value) {
            $gleba = new Gleba($value);

            $listGlebas[] = $gleba;
        }

        return $listGlebas;
    }
    public function BuscarGleba($array) {
        $repo = new GlebaRepo();

        $bean = $repo->FindOne('gleba','id=?',array($array['id']));

        $gleba = new Gleba($bean);

        return $gleba;
    }
    public function CadastrarGleba($array, $propriedade, $sistemaPlantio) {
        $gleba = new Gleba($array);
        $glebaRepository = new GlebaRepo();

        $beanPropriedade = $glebaRepository->SetBean('propriedade',$propriedade);
        $beanSistemaPlantio = $glebaRepository->SetBean('sistemadeplantio',$sistemaPlantio); 
        $beanGleba = $glebaRepository->SetBean('gleba', $gleba);
        
        $beanGleba->propriedade = $beanPropriedade;
        $beanGleba->sistemadeplantio = $beanSistemaPlantio;

        return \R::store($beanGleba);    
    }
}