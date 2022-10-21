<?php
    $opcao      = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
    $id         = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
    $nome       = isset($_POST['nome']) ? $_POST['nome'] : '';
    if ($opcao == 'inserir' || $opcao == 'atualizar'){
        
}

    $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');

    if ($opcao == 'inserir'){
        $sql        = "INSERT INTO marca (nome) 
        VALUES ('{$nome}');";
        $mensagem   = 'Salvo com Sucesso';
    }else if($opcao == 'atualizar'){
        $sql        = "UPDATE marca SET nome = '{$nome}'
         WHERE id = {$id};";
        $mensagem   = 'Atualizado com Sucesso';
    }else if ($opcao == 'excluir'){
        $sql        = "DELETE FROM marca WHERE id = {$id};";
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




    