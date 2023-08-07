<?php 
require __DIR__.'/vendor/autoload.php';

require __DIR__.'/banco/conexao.php';

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

    <div class="container">
        <div class="tab-content" id="v-pills-tabContent ">
            <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> tela 1</div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"> tela 2 - profile </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">  tela 3 </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> tela 4 </div>
            <div class="tab-pane fade" id="v-pills-regiao" role="tabpanel" aria-labelledby="v-pills-regiao-tab"> <?php include_once ( 'app\projetos\regiao.php' );   ?>  </div>
            <div class="tab-pane fade" id="v-pills-cep" role="tabpanel" aria-labelledby="v-pills-cep-tab"> <?php  include_once ( 'app\projetos\cep.php' );  ?></div>
            <div class="tab-pane fade" id="v-pills-uf" role="tabpanel" aria-labelledby="v-pills-uf-tab"> <?php  require_once  'app\projetos\estados.php'; ?>  </div>
            <div class="tab-pane fade" id="v-pills-cidade" role="tabpanel" aria-labelledby="v-pills-cidade-tab"> <?php  require_once  'app\projetos\cidades.php'; ?>  </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>
</html>


