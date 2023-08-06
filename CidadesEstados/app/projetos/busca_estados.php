<?php 
//require '../../vendor/autoload.php';
//require  '../banco/conexao.php';
//incluindo a DEPENDECIA
use \App\WebService\EstadosCidades;
$buscaUF  = EstadosCidades::buscaEstados();

$situacao= 'A';

foreach( $buscaUF  as $key => $value ){
    $sql = 'INSERT INTO estados  ( id, sigla, nome, situacao, id_regiao  ) VALUES (? ,? ,?, ?, ? )';    
    //    echo '<br> '.  $value['id'] . ' '. $value['sigla'] .' '.  $value['nome'] ;
    //    print_r( $value['regiao']  );

    $qual_regiao = $value['regiao'];
  
    //    echo '<br> linha 37: '. $qual_regiao['id'] ;
    //    echo '<br> linha 38: '. $qual_regiao['sigla'] ;
    //    echo '<br> linha 39: '. $qual_regiao['nome'] ;

    $stmt = $conn->prepare( $sql );
    $stmt->bindValue(1, $value['id'] );
    $stmt->bindValue(2, $value['sigla']);
    $stmt->bindValue(3, $value['nome'] );
    $stmt->bindValue(4, $situacao);
    $stmt->bindValue(5, $qual_regiao['id'] );
    
    $stmt->execute();
    
}