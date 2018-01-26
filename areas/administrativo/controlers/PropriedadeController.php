<?php

namespace areas\administrativo\controllers;

use Data\Servicos\PropriedadesService;
use Data\Entidades\Propriedade;
use Data\Entidades\Model_Propriedade;
use Data\Entidades\Produto;
use Data\Repository\ProdutoRepo;
use Data\Servicos\ProdutoService;

include_once(ROOT . '/Data/Entidades/Propriedade.php');
include_once(ROOT . '/Data/Entidades/Produto.php');
include_once(ROOT . '/Data/Repository/BaseRepo.php');
include_once(ROOT . '/Data/Repository/PropriedadeRepo.php');
include_once(ROOT . '/Data/Repository/ProdutoRepo.php');
include_once(ROOT . '/Data/Servicos/PropriedadesService.php');
include_once(ROOT . '/Data/Servicos/ProdutoService.php');


class PropriedadeController
{
    public function Index($array) {
        $PropriedadeServico = new PropriedadesService();
        $prodService = new ProdutoService();

        $propriedade = new Propriedade($array);
        
        $produtosIds = $prodService->GetProdutosIdsFromLista($array);        
        
        try {
            $id = $PropriedadeServico->CadastrarComProdutos($propriedade, $produtosIds);

            $resposta = array('error' => false, 'codigo' => $id);

            return $resposta;
        }
        catch(\Exception $e) {
            $resposta = array('error' => true, 'message' => $e->getMessage());

            return $resposta;
        }
    }    
}