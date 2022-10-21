<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Marca</title>
    <style>
        .text-left {
            text-align:left;
        }

        table {
            width:100%;
        }
        .titulo{
            margin-bottom:-10px;
        }

        table thead tr th
        {
            border-bottom:2px solid #000;
        }

        .div-button button{
            float:right;
            margin:15px;
            width:75px;
            border:0;
            background-color:#CCC;
            padding:5px;
            border-radius:5px;
        }
    </style>

</head>
<body>
    <h2 class="titulo">Lista de Marca</h2>
    <hr/>
    <div class="div-button">
        <a href="cadastro_modelo.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">nome do veiculo</th>
                <th class="text-left">ano</th>
                <th class="text-left">Editar</th>
                <th class="text-left">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria;','root','');
                $sql        = "SELECT * FROM modelo;";
                $dataset    = $conexao->query($sql);
                $resultset  = $dataset->fetchAll();

                foreach($resultset as $row){                
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['nome_modelo'].'</td>
                            <td>'.$row['ano'].'</td>
                            <td class="text-left">
                                <a href="cadastro_modelo.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td class="text-left">
                                <a href="crud_salvar_modelo.php?opcao=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>