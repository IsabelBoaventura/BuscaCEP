<?php

//incluindo a DEPENDECIA
use \App\WebService\EstadosCidades;

//busca das cidades 
$sql = 'SELECT sigla FROM estados  ';
$res = $conn->prepare( $sql );
$res->execute();
echo '<br><br><br>';

foreach ($conn->query($sql) as $row) {
   
    echo '<br><br><br>';
    $buscaRegioes  = EstadosCidades::buscaCidadesDoEstado( $row['sigla']);
    foreach( $buscaRegioes  as $key => $value ){
        $sql = 'INSERT INTO cidades  ( id,  nome, id_uf  ) VALUES (?,?,? )';

        $stmt = $conn->prepare( $sql );
        $stmt->bindValue(1, $value['id'] );
        $stmt->bindValue(2, $value['nome'] );
        $microrregiao = $value['microrregiao'];
        $mesorregiao =  $microrregiao['mesorregiao'];
        $estado =  $mesorregiao['UF'];

        //
        echo '<br> Linha 24: '. $value['id'] .' '. $value['nome']  .' '. $estado['id']  .' '. $estado['sigla']  .' '.$estado['nome'];
        $stmt->bindValue(3,   $estado['id'] );    
        //
        $stmt->execute();
        
    }
}

?>
