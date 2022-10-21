<?php
   $id         = '';
   $opcao      = 'inserir';
   $nome       = '';
    if (isset($_GET['id'])){
        $id         = $_GET['id'];
        $opcao      = 'atualizar';


        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');
        $sql = "SELECT * FROM marca WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();
        $id         = $resultset['id'];
        $nome       = $resultset['nome'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marca</title>
</head>
<body>
    <form action="salvar_marca.php" method="POST">
        <fieldset><br/>
            <legend>Cadastro de Marca</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>" />
            <input type="hidden" name="id" id="id" value="<?=$id?>" />
            <div>
                <label for="nome">Descrição</label>
                <input type="text" name="nome" id="nome" value="<?=$nome?>" /> 
            </div>
            <div><br/>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form>
</body>
</html>