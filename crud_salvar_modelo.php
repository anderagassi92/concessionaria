<?php
var_dump($_POST);
    $opcao       = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
    $id          = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $nome_modelo = isset($_POST['nome_modelo']) ? $_POST['nome_modelo'] : '';
    $marca       = isset($_POST['marca']) ? $_POST['marca'] : '';
    $ano         = isset($_POST['ano']) ? $_POST['ano']  : '';
    if ($opcao == 'inserir' || $opcao == 'atualizar'){
        if ($nome_modelo == ''){
            echo 'O campo nome do modelo do veiculo é obrigatório';
            exit;
        }

        if ($ano == ''){
            echo 'O campo ano é obrigatório';
            exit;
        }

        if (strlen($ano) <= 3 ){
            echo 'Você precisa digitar 4 caracteres no campo ano.';
            exit;
        }
        if (!is_numeric($ano)){
            echo 'o campo ano tem numeros.';
            exit;   
        } 

}
    $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');

    if ($opcao == 'inserir'){
        $sql        = "INSERT INTO modelo (nome_modelo,marca,ano) 
        VALUES ('{$nome_modelo}',{$marca},'{$ano}');";
        $mensagem   = 'Salvo com Sucesso';
    }else if($opcao == 'atualizar'){
        $sql        = "UPDATE modelo SET nome_modelo = '{$nome_modelo}',marca = {$marca},ano = '{$ano}'
         WHERE id = {$id};";
        $mensagem   = 'Atualizado com Sucesso';
    }else if ($opcao == 'excluir'){
        $sql        = "DELETE FROM modelo WHERE id = {$id};";
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