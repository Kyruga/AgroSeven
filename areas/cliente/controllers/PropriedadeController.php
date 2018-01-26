<?php

namespace areas\cliente\controllers;

use Data\Servicos\PropriedadesService;


include_once(ROOT . 'data/servicos/propriedadesservice.php');

class PropriedadeController
{
    public function BuscarPropriedades() {
        $service = new PropriedadesService();

        $bean = $service->BuscarPropriedadesComProdutos();
    }
}