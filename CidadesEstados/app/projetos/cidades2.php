<?php 

( isset($_REQUEST["p"]))?$p = $_REQUEST["p"]:$p=1;
 // Pegar a página atual por GET.


if( $p >= 1){
    require '../../vendor/autoload.php';
    require '../../banco/conexao.php';
}
$paginacao = '';
$qnt = 15;
//No caso 20 por página.
// O sistema calcula o início da seleção, calculando:
// (página atual * quantidade por página) - quantidade por página
$inicio = ($p*$qnt) - $qnt;
 // Seleciona no banco de dados com o LIMIT indicado pelos números acima.
// $sql_select = "select * FROM tabela limit $inicio, $qnt";

//busca dos estados
$sql = 'SELECT * FROM cidades  LIMIT '. $inicio.', '. $qnt ;
$res = $conn->prepare( $sql );
$res->execute();



//busca das cidades 
$sql_all = 'SELECT * FROM cidades ';
$res_all = $conn->prepare( $sql_all );
$res_all->execute();


$total_registros = $res_all->rowCount();


$pags = ceil($total_registros/$qnt);

$paginacao .='<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">';

if($pags > 1){
    
    $max_links = 5;
    $paginacao .='<li class="page-item">
                <span class="page-link"><a href="cidades2.php?p=1" target="_self">Início</a></span>
            </li>';
    for($i = $p-$max_links; $i <= $p-1; $i++) {       
        if($i >= 1){           
            $paginacao .='<li class="page-item">                 
               
                    <a class="page-link" href="cidades2.php?p='.$i.'" target="_self" > '.$i.'</a>
                   
                </li>
               ';
        }//Fecha o if.
    }//Fecha o for.
  
    $paginacao .= '
        <li class="page-item active">
            <span class="page-link">'. $p.'  <span class="sr-only">(atual)</span> </span>
        </li>
    ';
  
    for($i = $p+1; $i <= $p+$max_links; $i++) {
       
        if($i > $pags) {
      
        }
       
        else {           
            $paginacao .= '<li class="page-item"> <span class="page-link"><a href="cidades2.php?p='.$i.'" target="_self"> '.$i.'</a> </span></li> ';
        }
    }
    
    if($pags <= 0){
        $i=1;
    }
    else{
        $i=$pags;
    }  
    
    $paginacao.=' <li class="page-item">
    <a  class="page-link" href="cidades2.php?p='.$i.'" target="_self">Próximo</a>
    </li></ul>
    </nav>';
}


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
                <th>Nome</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>          
   
            <?php            
                foreach ($conn->query($sql) as $row) {
                    echo '
                    <tr>
                        <td>'. $row['id'].'</td>
                        <td>'.$row['nome'].'</td>
                    ';

                    //busca do nome da Região deste estado
                    $sqlRegiao = 'SELECT nome FROM estados  WHERE id = "'.$row['id_uf'].'" ';
                    $resRegiao = $conn->prepare( $sqlRegiao );
                    $resRegiao->execute();

                    $result = $resRegiao->fetchAll(PDO::FETCH_ASSOC);
                    //echo $result[0]['nome'];

                    echo '
                        <td>'.$result[0]['nome'].'</td>
                    </tr>
                    ';
                }
            ?>            
        </tbody>
    </table>
    <?php echo $paginacao ; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>

