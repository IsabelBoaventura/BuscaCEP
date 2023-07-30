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
	<nav>
		<ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
			<li class="nav-item" role="presentation">
				<button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false"> <a href="/app/projetos/cep.php">CEP</a> </button>
			</li>
		</ul>
	</nav>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>