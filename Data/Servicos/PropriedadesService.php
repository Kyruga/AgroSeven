<?php
namespace Data\Servicos;

use Data\Repository\PropriedadeRepo;
use Data\Repository\ProdutoRepo;
use Data\Entidades\Propriedade;

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
    
    public function BuscarPropriedades() {
        $repo = new PropriedadeRepo();

        $bean = $repo->GetAll('propriedade');

        if(count($bean) == 0) 
            throw new \Exception("Não foi possível buscar as propriedades");
        
        foreach($bean as $keyObj => $objProperties) {
            $properties = new Propriedade($objProperties);

            $listPropriedades[] = $properties;
        }

        return $listPropriedades;
    }

    public function salvarNovoLocalPropriedade($propriedade) {
        
        $propriedadeRepo = new PropriedadeRepo();

        $existe = $propriedadeRepo->FindOne('propriedade', 'id=?' , array(4));
            
        if(!empty($existe)) {

            $propriedade->id = 1;
            $propriedade->nome = "Teste";

            return $propriedadeRepo->Save('propriedade', $propriedade);
        }else{
            throw new \Exception('algum erro do cpf');
        }

    } 
}