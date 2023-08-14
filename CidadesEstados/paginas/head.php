<?php 
require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../banco/conexao.php';

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
			<li class="nav-item active" role="presentation">
				<button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-controls="home-tab-pane"  aria-selected="true" data-bs-target="#v-pills-home" >Home</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" data-bs-target="#v-pills-profile" aria-selected="false">Profile</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="cep-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" data-bs-target="#v-pills-cep" aria-controls="v-pills-cep">CEP</button>
			</li>
            <li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="regiao-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" data-bs-target="#v-pills-regiao" aria-controls="v-pills-regiao" >Regiao  </button>
			</li>
            <li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="uf-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" data-bs-target="#v-pills-uf" aria-controls="v-pills-uf" >Estados </button>
			</li>
            <li class="nav-item" role="presentation">
				<button class="nav-link rounded-5" id="cidade-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" data-bs-target="#v-pills-cidade" aria-controls="v-pills-cidade" > Cidades </button>
			</li>
		</ul>
	</nav>