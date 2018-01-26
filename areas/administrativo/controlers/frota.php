<?php

    require_once("../../assets/librarys/rb.php");
    // require_once("../Conexao.php");

    // $bd = new Conexao();
    $user = 'matheus';
    $psw = '.nbU-Bh8';
    R::setup( 'mysql:host=agroseven.com.br;dbname=matheus', $user, $psw ); 
        
    foreach($_POST as $campo => $valor){
        $_POST[$campo] = $bd->real_escape_string($valor);
    }
    extract($_POST);

    echo "administrativo";

    $_GET["act"] = "cadastrar";

    //**************************************** cadastrar ****************************************
    public function cadastrar(){
        private $nome;
        private $anoFabricacao;
        private $chassi;
        private $marca;
        private $combstivel;
        private $dataCompra;              
        private $valorCompra;              
        private $imagem;              
        private $ultimaManutencao;              
        private $ultimaTrocaOleo;              
        private $status;              

        try {
            $veiculo = R::dispense("veiculo");
            $veiculo->nome = "Caroline Alves";
            $veiculo->anoFabricacao = "teste";
            $veiculo->chassi = "carol_alves@gmail.com";
            $veiculo->tipoCombustivel = "35980706070";
            
            $id = R::store($veiculo);

        } catch (PDOException $ex) {
            $conn->rollback();
        }
        hyperCallLogin();
    }

    echo(returnArrayJsonSWAL($arrayJson));

}
?>

