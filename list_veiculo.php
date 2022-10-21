<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículo</title>
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
    <h2 class="titulo">Lista de Veiculos</h2>
    <hr/>
    <div class="div-button">
        <a href="cadastro_modelo.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Modelo</th>
                <th class="text-left">Motorização</th>
                <th class="text-left">Ano De Fabricação</th>
                <th class="text-left">Tipo De Veículo</th>
                <th class="text-left">Combusível</th>
                <th class="text-left">Chassi</th>
                <th class="text-left">Editar</th>
                <th class="text-left">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=concessionaria;','root','');
                $sql        ="SELECT a.id,
                b.nome_modelo,
                a.motorizacao,
                a.ano_de_fabricacao,
                c.nome AS marca,
                d.nome AS tipo,
                e.nome AS combustivel,
                a.chassi 
                FROM veiculo AS a
                INNER JOIN modelo AS b ON b.id = a.modelo
                INNER JOIN marca AS c ON c.id = b.marca
                INNER JOIN tipo_veiculo d ON d.id = a.tipo_veiculo
                INNER JOIN combustivel e ON e.id = a.combustivel;";
                $dataset    = $conexao->query($sql);
                $resultset  = $dataset->fetchAll();

                foreach($resultset as $row){                
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['nome_modelo'].'</td>
                            <td>'.$row['motorizacao'].'</td>
                            <td>'.$row['ano_de_fabricacao'].'</td>
                            <td>'.$row['tipo'].'</td>
                            <td>'.$row['combustivel'].'</td>
                            <td>'.$row['chassi'].'</td>
                            <td class="text-left">
                                <a href="cadastro_veiculo.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td class="text-left">
                                <a href="crud_salvar_veiculo.php?opcao=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>