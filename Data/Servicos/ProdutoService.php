<?php

namespace Data\Servicos;

use Data\Repository\ProdutoRepo;
use Data\Entidades\Produto;


class ProdutoService
{
    public function GetProdutosFromLista($array) {
        $produtos[] = null;

        foreach($array as $key => $value) {
            if(is_array($value)) {
                foreach($value as $keyArray => $valueArray) {
                    $prod = new Produto();
                    $prodRepo = new ProdutoRepo();
                    
                    $beanProduto = $prodRepo->FindOne('produto','nome=?', array($valueArray));

                    if($beanProduto != null) {
                        $prod->id = $beanProduto->id;
                        $prod->nome = $beanProduto->nome;

                        $produtos[] = $prod;
                    }                                    
                }                
            }
        }

        return $produtos;
    }

    public function GetProdutosIdsFromLista($array) {

        foreach($array as $key => $value) {
            if(is_array($value)) {
                foreach($value as $keyArray => $valueArray) {
                    $prod = new Produto();
                    $prodRepo = new ProdutoRepo();
                    
                    $beanProduto = $prodRepo->FindOne('produto','nome=?', array($valueArray));

                    if($beanProduto != null) {
                        $produtosIds[] = $beanProduto->id;
                    }                                    
                }                
            }
        }

        return $produtosIds;
    }
}