<?php

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

?>
