<?php

//require '../../vendor/autoload.php';
//require  '../banco/conexao.php';
//incluindo a DEPENDECIA
//busca da regiao

$sql = 'SELECT * FROM regiao ';
$res = $conn->prepare( $sql );
$res->execute();

$linhas_tabela = '';          
foreach ($conn->query($sql) as $row) {
    $linhas_tabela .= '
        <tr>
            <th scope="row">'. $row['id'].'</th>                     
            <td>'.$row['sigla'].'</td>
            <td>'.$row['nome'].'</td>
        </tr>
    ';
}
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
    <!-- <div class="table-responsive">
        <table class="table table-bordered  table-striped">           
             <thead>
                <tr>
                    <th>id</th>
                    <th>Sigla</th>
                    <th>Nome</th>
                </tr>
            </thead>        
            <tbody> 
                <?php  // echo $linhas_tabela  ; ?>
            </tbody>
        </table>
    </div> -->

<!-- <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>id</th><th>Sigla</th><th>Nome</th>
            </tr>
        </thead>        
        <tbody>
             <?php  // echo $linhas_tabela  ; ?>
            <tr>
                <th scope="row"> 2</th><td>N</td><td>Norte</td>
            </tr>
            <tr>
                <th scope="row"> 3</th><td>C</td><td>Centro</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table-responsive-lg">
  <table class="table">
    <?php //  echo $linhas_tabela  ; ?>
    <tr>
                        <th scope="row"> 3 '. $row['id'].'</th>                     
                        <td>'.$row['sigla'].'</td>
                        <td>'.$row['nome'].'</td>
                    </tr>
  </table>
</div> -->

<div class="table-responsive-xl">
   <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Sigla</th>
                <th>Nome</th>
            </tr>
        </thead> 
        <tbody>
            <?php   echo $linhas_tabela  ; ?>
            <tr> 
                <th>id</th>
                <th>Sigla</th>
                <th>Nome</th>
            </tr>
        </tbody> 
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>

