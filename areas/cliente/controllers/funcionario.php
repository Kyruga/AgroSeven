<?php

    class Funcionario{

        function __construct(){
            require_once("C:/Programs/xampp/htdocs/agroseven/assets/librarys/rb.php");
            $user = 'matheus';
            $psw = '.nbU-Bh8';
            R::setup( 'mysql:host=agroseven.com.br;dbname=matheus', $user, $psw ); 

            extract( $_POST);
            
            switch ($tarefa) {
                case 'cadastrar':
                    $this->cadastrar($nome, $cpf, $rg, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $cep);
                    break;
                default:
                    # code...
                    break;
            }
        }

    // foreach($_POST as $campo => $valor){
    //     $_POST[$campo] = $bd->real_escape_string($valor);
    // }

    //**************************************** cadastrar ****************************************
        function cadastrar($nome, $cpf, $rg, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $cep ){
            $existe  = R::find( "funcionario", "cpf = ". $cpf ."" );
            if (empty( $existe[1]['cpf'] )) {      
                try {
                    $funcionario = R::dispense('funcionario');
                    $funcionario->nome = $nome;
                    $funcionario->cpf = $cpf;
                    $funcionario->rg = $rg;
                    $funcionario->telefone = $telefone;
                    // $funcionario->observacao = $observacao;
                    // $funcionario->foto = $foto;
                    // $funcionario->funcao = $funcao;
                    $id = R::store($funcionario);
                    
                    $endereco = R::dispense('endereco');
                    $endereco->logradouro = $logradouro;
                    $endereco->numero = $numero;
                    $endereco->bairro = $bairro;
                    $endereco->cidade = $cidade;
                    $endereco->estado = $uf;
                    $endereco->cep = $cep;
                    $endereco->funcionarioId = $id;
                    R::store($endereco);

                    $retorno['msg'] = 'Usuário cadastrado com sucesso!';
                    $retorno['retorno'] = true;
                } catch (PDOException $ex) {
                    $conn->rollback();
                    $retorno['msg'] = 'Não foi possivel concluir o cadastro!';
                    $retorno['retorno'] = false;
                }
            }else{
                $retorno['msg'] = 'Já existe um funcionário vinculado a este cpf';
                $retorno['retorno'] = false;
            }
            return $retorno;
        }
}
?>

