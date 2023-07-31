<?php

//require '../../vendor/autoload.php';

//incluindo a DEPENDECIA
use \App\WebService\ViaCEP;


echo '<br> Estou na pagiana cep ';



//Exemplo que consta no via cep
$cep_exemplo = "01001000";


$dadosCEP = ViaCEP::consultarCEP( $cep_exemplo);

print_r( $dadosCEP  );




?>
