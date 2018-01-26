<?php

namespace Data\Servicos;

use Data\Entidades\Gleba;
use Data\Entidades\GlebaRepo;


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
    public function CadastrarGleba($array, $propriedade) {
        $gleba = new Gleba($array);
        $glebaRepository = new GlebaRepo();

        $id = $glebaRepository->SaveWithParent('gleba',$gleba,'propriedade',$propriedade);        
        
        return $id;
    }
}