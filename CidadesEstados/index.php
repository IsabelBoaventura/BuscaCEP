<?php

//echo ' hello, word ';

require __DIR__.'/vendor/autoload.php';
//require ('banco/conexao.php');

require __DIR__ . '/banco/conexao.php';

//incluindo a DEPENDECIA
//use \App\WebService\ViaCEP;

use \App\WebService\EstadosCidades;
//Para conferir se o CEP poi passado para a funcao 


//Exemplo que consta no via cep
// $cep_exemplo = "01001000";


// $dadosCEP = ViaCEP::consultarCEP( $cep_exemplo);

// print_r( $dadosCEP  );

// echo '<br>'.
// $uf_exemplo = 'SC';
// echo '<br>';

// $buscaCidades  = EstadosCidades::buscaCidadesDoEstado( $uf_exemplo );

// echo '<br><br><br>';
// if ($buscaCidades[0]['id']=='4200051'){

//     var_dump( $buscaCidades[0] );

// }

// foreach( $buscaCidades as $key => $value ){
//     echo '<br>';
//  //   $value->id;
//    echo  $value['id'];
//     echo '<br>';
// }

// echo '<br><br><br>';

// print_r( $buscaCidades   );





$buscaRegioes  = EstadosCidades::buscaRegioes();

echo '<br><br><br>';
var_dump( $buscaRegioes );
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

        //traz as linhas de registros 

        //para mandar para as outras tabelas 
        //array de objetos 
$res->fetchAll(PDO::FETCH_CLASS);






?>