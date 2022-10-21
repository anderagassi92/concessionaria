<?php
var_dump($_POST);
    $opcao       = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
    $id          = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
    $motorizacao      = isset($_POST['motorizacao']) ? $_POST['motorizacao'] : '';
    $ano_de_fabricacao         = isset($_POST['ano_de_fabricacao']) ? $_POST['ano_de_fabricacao']  : '';
    $tipo_veiculo = isset($_POST['tipo_veiculo']) ? $_POST['tipo_veiculo'] : '';
    $combustivel = isset($_POST['combustivel']) ? $_POST['combustivel'] : '';
    $chassi = isset($_POST['chassi']) ? $_POST['chassi'] : '';
    if ($opcao == 'inserir' || $opcao == 'atualizar'){

        if ($ano_de_fabricacao == ''){
            echo 'O campo ano é obrigatório';
            exit;
        }

        if (strlen($ano_de_fabricacao) <= 3 ){
            echo 'Você precisa digitar 4 caracteres no campo ano.';
            exit;
        }
        if (!is_numeric($ano_de_fabricacao)){
            echo 'o campo ano tem numeros.';
            exit;   
        } 

}
    $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');

    if ($opcao == 'inserir'){
        $sql        = "INSERT INTO veiculo (modelo,motorizacao,ano_de_fabricacao,tipo_veiculo,combustivel,chassi) 
        VALUES ({$modelo},'{$motorizacao}','{$ano_de_fabricacao}',{$tipo_veiculo},{$combustivel},'{$chassi}');";
        $mensagem   = 'Salvo com Sucesso';
    }else if($opcao == 'atualizar'){
        $sql        = "UPDATE veiculo SET modelo = {$modelo},motorizacao = '{$motorizacao}',ano_de_fabricacao = '{$ano_de_fabricacao}',tipo_veiculo = {$tipo_veiculo},combustivel = {$combustivel},chassi = '{$chassi}'
         WHERE id = {$id};";
        $mensagem   = 'Atualizado com Sucesso';
    }else if ($opcao == 'excluir'){
        $sql        = "DELETE FROM veiculo WHERE id = {$id};";
        $mensagem   = 'Excluído com Sucesso';
    }else{
        echo 'Nenhuma opção selecionada';
        exit;
    }
    if ($conexao->exec($sql)){
        echo $mensagem;
    }else{
        echo 'Erro ao cadastrar => <br/>';
        echo $conexao->errorInfo();
    }