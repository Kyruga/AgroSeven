<?php
namespace Data\Servicos;

use Data\Repository\PropriedadeRepo;
use Data\Repository\ProdutoRepo;
use Data\Entidades\Propriedade;

include_once(ROOT . 'data/repository/propriedaderepo.php');
include_once(ROOT . 'data/entidades/propriedade.php');

class PropriedadesService
{
    public function __construct() {

    }

    public function CadastrarComProdutos($propriedade, $produtos) {

        //validação de variáveis
        
        // if(strlen($propriedade->nome) > 3) {
        //     throw new \Exception('Nome da propriedade é muito grande!!!');
        // }

        $propriedadeRepo = new PropriedadeRepo();

        return $propriedadeRepo->SaveWithManyToMany('propriedade',$propriedade,'produto',$produtos);
    }

    public function BuscarPropriedadePorId($id) {
        $repo = new PropriedadeRepo();

        $bean = $repo->FindOne('propriedade','id=?', array($id));

        if($bean == null)
            throw new \Exception("Não foi possível buscar a propriedade");

        $propriedade = new Propriedade($bean);

        return $propriedade;
    }

    public function BuscarPropriedadesComProdutos() {
        $repo = new PropriedadeRepo();

        $bean = $repo->GetAllWithShared('propriedade','produto','produto_propriedade.propriedade_id = ?');

        $json = json_encode($bean);

        return $json;
    }
    
    public function BuscarPropriedades() {
        $repo = new PropriedadeRepo();

        $bean = $repo->GetAll('produto_propriedade');

        if(count($bean) == 0) 
            throw new \Exception("Não foi possível buscar as propriedades");
        
        foreach($bean as $keyObj => $objProperties) {
            $properties = new Propriedade($objProperties);

            $listPropriedades[] = $properties;
        }

        return $listPropriedades;
    }
}