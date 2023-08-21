<?php

// include ('paginas/head.php'); 

   


// var_dump( $_REQUEST) ; 
// var_dump( $_REQUEST) ; 



/***Teste para paginacao  */


    //Inicia o código PHP.
  
    ( isset($_REQUEST["p"]))?$p = $_REQUEST["p"]:$p=1;
    // $p = $_REQUEST["p"]; // Pegar a página atual por GET.
    //echo '<br> linha 14: '. $p ;

    if( $p >= 1){
        require '../../vendor/autoload.php';
        require '../../banco/conexao.php';
    }
    $paginacao = '';
    $paginacao2 = '';

    // Verifica se a variável tá declarada, senão deixa na primeira página como padrão.
    //if(isset($p)) { $p = $p; } else { $p = 1; }
    // Defina aqui a quantidade máxima de registros por página.
    $qnt = 10; //No caso 20 por página.
    // O sistema calcula o início da seleção, calculando:
    // (página atual * quantidade por página) - quantidade por página
    $inicio = ($p*$qnt) - $qnt;
     // Seleciona no banco de dados com o LIMIT indicado pelos números acima.
   // $sql_select = "select * FROM tabela limit $inicio, $qnt";

    //busca dos estados
    $sql = 'SELECT * FROM estados LIMIT '. $inicio.', '. $qnt ;
    $res = $conn->prepare( $sql );
    $res->execute();


    // Executa a query com mysqli.
   // $sql_query = mysqli_query($conn, $sql );
    // Faz uma nova seleção no banco de dados semelhante a anterior, mas desta vez sem LIMIT, para pegarmos o número total de registros.


    $sql_select_all = "SELECT * FROM estados ";
    // Executa a query das seleções acima.

    $res_total = $conn->prepare( $sql_select_all );
    $res_total->execute();
    $total_registros = $res_total->rowCount();


    $tabela_completa = '';
    foreach ($conn->query($sql) as $row) {
        $tabela_completa .= '
        <tr>
            <td>'.$row['id'].'</td>                       
            <td>'.$row['sigla'].'</td>
            <td>'.$row['nome'].'</td>
        ';

        //busca do nome da Região deste estado
        $sqlRegiao = 'SELECT nome FROM regiao WHERE id = "'.$row['id_regiao'].'" ';
        $resRegiao = $conn->prepare( $sqlRegiao );
        $resRegiao->execute();

        $result = 
        $resRegiao->fetchAll(PDO::FETCH_ASSOC);
        //echo $result[0]['nome'];

        $tabela_completa .= '
            <td>'.$result[0]['nome'].'</td>
        </tr>
        ';
    }

    //echo '<br> linha 44 total de estados '. $total_registros  ;



    // $sql_query_all = mysqli_query($conn,$sql_select_all);
    // Gera uma variável com o número total de registros no banco de dados.
    //$total_registros = mysqli_num_rows($sql_query_all);
    //$num_rows = ($total_registros);
    // Gera outra variável, desta vez com o número de páginas que será precisa.
    // O comando ceil() arredonda "para cima" o valor.
    $pags = ceil($total_registros/$qnt);
    //Inicia o texto que será impresso na tela.
    //Inicia uma div com a class dados.
     //Inicia uma tabela.
     //Cria a linha da tabela.
     //Espaço vazio pois é a primeira linha e primeira coluna.
      //Cria o título do primeiro campo.
       //Cria o título do segundo campo.
    $tabela_pura=  ' 
        <div id="dados">
                 <table>
                    <tr> 
                        <th></th>                     
                        <th class="titulo">C&oacute;digo</th>                       
                        <th class="titulo">Descri&ccedil;&atilde;o</th>
                     </tr>';//Fecha a linha dos títulos.
                    // Cria um while para pegar as informações do BD para os itens.
                    foreach ($conn->query($sql) as $row){
                    //while ($row = $sql_query->fetch_array(MYSQLI_ASSOC)) {
                        //Inicia a tabela com dados dinâmicos.
                         //Chama o campo código.
                          //Chama o campo descrição.
                        $tabela_pura.= '
                        <tr>                           
                            <td class="item" style="text-align:center; padding:2px; vertical-align: middle; display: ">' . $row['id'] .'</td>
                            <td class="item" style="text-align:center; padding:2px; vertical-align: middle; display: ">' . $row['sigla'] .'</td>
                            <td class="item" style="text-align:center; padding:2px; vertical-align: middle; display: ">' . $row['nome'] .'</td>                
                        </tr>';
                    }//Fecha o while.

                    //Acima fecha a tabela e aqui fecha a div.
                    //Fecha o PHP.
    $tabela_pura.= '
                </table>
        </div>';

    $paginacao2 .='<nav aria-label="Page navigation example">
        <ul class="pagination">';





    $teste = '
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">
                    <a href="estados2.php?p=1" target="_self">Início  </a>
                </span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <span class="page-link">
                    2
                    <span class="sr-only">(current)</span>
                </span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>';


//Abre novamente o PHP.
    if($pags > 1){ //Verifica se tem mais de uma página.
        // Número máximos de botões de paginação.
        $max_links = 3;
        // Exibe o primeiro link "primeira página", que não entra na contagem acima(3).
        $paginacao .= '<a href="estados2.php?p=1" target="_self">primeira página </a> ';
        // $paginacao2 .='<li class="page-item disabled">
        //     <span class="page-link">
        //         <a href="estados2.php?p=1" target="_self">Início  </a> 
        //     </span>
        // </li>';


        $paginacao2 .='<li class="page-item">
                    <span class="page-link"><a href="estados2.php?p=1" target="_self">Início</a></span>
                </li>';
        // Cria um for() para exibir os 3 links antes da página atual.
        for($i = $p-$max_links; $i <= $p-1; $i++) {
            // Se o número da página for menor ou igual a zero, não faz nada.
            if($i >= 1){//Então chama o link se for 1 ou maior.
                //Cria o link com o número do indice.
                $paginacao .= '<a href="estados2.php?p='.$i.'" target="_self"> '.$i.'</a> ';
                $paginacao2 .='<li class="page-item">
                      
                   
                        <a class="page-link" href="estados2.php?p='.$i.'" target="_self" > '.$i.'</a>
                       
                    </li>
                   ';
            }//Fecha o if.
        }//Fecha o for.
        // Exibe a página atual, sem link, apenas o número
        $paginacao .= $p."  ";
        $paginacao2 .= '
            <li class="page-item active">
            <span class="page-link">'. $p.'  <span class="sr-only">(atual)</span> </span>
            </li>
        ';
        // Cria outro for(), desta vez para exibir 3 links após a página atual.
        for($i = $p+1; $i <= $p+$max_links; $i++) {
            // Verifica se a página atual é maior do que a última página. Se for, não faz nada.
            if($i > $pags) {
            //faz nada.
            }
            // Se tiver tudo Ok gera os links.
            else {
                $paginacao .= '<a href="estados2.php?p='.$i.'" target="_self"> estou aqui   '.$i.'</a> ';
                $paginacao2 .= '<li class="page-item"> <span class="page-link"><a href="estados2.php?p='.$i.'" target="_self"> '.$i.'</a> </span></li> ';
            }
        }
        // Exibe o link "última página"
        if($pags <= 0){
            $i=1;
        }
        else{
            $i=$pags;
            }
        $paginacao .= '<a href="estados2.php?p='.$i.'" target="_self">&uacute;ltima p&aacute;gina</a> ';
        
        $paginacao2 .=' <li class="page-item">
        <a  class="page-link" href="estados2.php?p='.$i.'" target="_self">Próximo</a>
        </li></ul>
        </nav>';
    }
  
?>

<!-- //Fecha a div inicial.

/***Até aqui teste para paginacao  */ -->


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
            <?php   echo $tabela_completa;  ?>   
        </tbody>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>   
            </ul>
        </nav> -->
    </table>

  
    

    <?php echo $paginacao2 ; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>

