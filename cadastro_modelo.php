<?php
   
    if (isset($_GET['id'])){
        $id         = $_GET['id'];
        $opcao      = 'atualizar';


        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');
        $sql = "SELECT * FROM modelo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();
        $id         = $resultset['id'];
        $nome_modelo     = $resultset['nome_modelo'];
        $marca = $resultset['marca'];
        $ano = $resultset['ano'];
    }else{
        $id          = '';
        $opcao       = 'inserir';
        $nome_modelo = '';
        $marca       = '';
        $ano         = '';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Modelo</title>
</head>
<body>
    <a href="#" onclick="history.back()">Voltar</a>
    <form method="POST" action="crud_salvar_modelo.php">
        <fieldset>
            <legend>Cadastro de Veículo</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
        <label for="nome">Modelo do Modelo:</label>
                <br/>
                <input type="text" name="nome_modelo" id="nome_modelo" value="<?=$nome_modelo?>" />
            </div>
            <div><br/>
            <label for="nome">Ano Do Veiculo:</label>
                <br/>
                <input type="text" name="ano" id="ano" value="<?=$ano?>" />
            </div>
            <div><br/>
            <label for="marca">Marca</label>
                <select name="marca" id="marca">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root',''); 
                        $sql        = "SELECT * FROM marca";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form>
</body>
</html>