<?php 

//busca dos estados
$sql = 'SELECT * FROM estados ';
$res = $conn->prepare( $sql );
$res->execute();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações da Empresa</title>
    <!-- Link para o Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Sigla</th>
                <th>Nome</th>
                <th>Região</th>
            </tr>
        </thead>
        <tbody>
            
   
            <?php
            
                foreach ($conn->query($sql) as $row) {
                    echo '
                    <tr>
                        <td>'. $row['id'].'</td>
                        <td>'.$row['nome'].'</td>
                        <td>'.$row['sigla'].'</td>
                    ';

                    //busca do nome da Região deste estado
                    $sqlRegiao = 'SELECT nome FROM regiao WHERE id = "'.$row['id_regiao'].'" ';
                    $resRegiao = $conn->prepare( $sqlRegiao );
                    $resRegiao->execute();

                    $result = 
                    $resRegiao->fetchAll(PDO::FETCH_ASSOC);
                    //echo $result[0]['nome'];

                    echo '
                        <td>'.$result[0]['nome'].'</td>
                    </tr>
                    ';
                }
            ?>

            
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>

