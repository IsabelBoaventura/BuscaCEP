<?php

//require '../../vendor/autoload.php';
//require  '../banco/conexao.php';
//incluindo a DEPENDECIA
use \App\WebService\EstadosCidades;


$buscaRegioes  = EstadosCidades::buscaRegioes();

echo '<br><br><br>';
//var_dump( $buscaRegioes );
$situacao= 'A';


foreach( $buscaRegioes  as $key => $value ){
    $sql = 'INSERT INTO regiao ( id, sigla, nome, situacao   ) VALUES (? ,? ,?,? )';

    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(1, $value['id'] );
    $stmt->bindValue(2, $value['sigla']);
    $stmt->bindValue(3, $value['nome'] );
    $stmt->bindValue(4, $situacao);
    
    $stmt->execute();
    
}





//busca da regiao

$sql = 'SELECT * FROM regiao ';
$res = $conn->prepare( $sql );
$res->execute();
//$regioes = $res->fetchAll(PDO::FETCH_CLASS);

// echo '<br> <br>';
// //var_dump($regioes  );
// echo '<br> <br>';







// foreach ($conn->query($sql) as $row) {
//     print $row['id'] . "\t";
//     print $row['nome'] . "\t";
//     print $row['sigla'] . "\n";
// }



?>


<!DOCTYPE html>
<html lang="en">
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
                    </tr>
                    ';
                }
            ?>

            
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>

