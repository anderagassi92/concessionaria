<?php
   
    if (isset($_GET['id'])){
        $id         = $_GET['id'];
        $opcao      = 'atualizar';


        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root','');
        $sql = "SELECT * FROM veiculo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $resultset  = $dataset->fetch();
        $id         = $resultset['id'];
        $modelo = $resultset['modelo'];
        $motorizacao     = $resultset['motorizacao'];
        $ano_de_fabricacao = $resultset['ano_de_fabricacao'];
        $tipo_veiculo = $resultset['tipo_veiculo'];
        $combustivel = $resultset['combustivel'];
        $chassi = $resultset['chassi'];
    }else{
        $id          = '';
        $opcao       = 'inserir';
        $modelo ='';
        $motorizacao = '';
        $ano_de_fabricacao      = '';
        $tipo_veiculo         = '';
        $combustivel         = '';
        $chassi       = '';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veiculo</title>
</head>
<body>
    <a href="#" onclick="history.back()">Voltar</a>
    <form method="POST" action="crud_salvar_veiculo.php">
        <fieldset>
            <legend>Cadastro de Veículo</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
            <label for="modelo">Modelo</label>
                <select name="modelo" id="modelo">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root',''); 
                        $sql        = "SELECT * FROM modelo";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nome_modelo'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div><br/>
        <label for="nome">Motorizacao:</label>
                <br/>
                <input type="text" name="motorizacao" id="motorizacao" value="<?=$motorizacao?>" />
            </div>
            <div><br/>
            <label for="nome">Ano Do Fabricacao:</label>
                <br/>
                <input type="text" name="ano_de_fabricacao" id="ano_de_fabricacao" value="<?=$ano_de_fabricacao?>" />
            </div>
            <div><br/>
            <label for="tipo_veiculo">Tipo De Veiculo</label>
                <select name="tipo_veiculo" id="tipo_veiculo">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root',''); 
                        $sql        = "SELECT * FROM tipo_veiculo";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div><br/>
            <label for="combustivel">Combustivel</label>
                <select name="combustivel" id="combustivel">
                    <?php
                        $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria','root',''); 
                        $sql        = "SELECT * FROM combustivel";
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();

                        foreach($resultset as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>
                </div>
            <div><br/>
            <label for="nome">chassi:</label>
                <br/>
                <input type="text" name="chassi" id="chassi" value="<?=$chassi?>" />
            </div>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form>
</body>
</html>