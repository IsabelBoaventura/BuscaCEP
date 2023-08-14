<?php 
// var_dump( $_REQUEST) ; 

?>
<div class="container">
        <div class="tab-content" id="v-pills-tabContent ">
            <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> tela 1</div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"> tela 2 - profile </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">  tela 3 </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> tela 4 </div>
            <div class="tab-pane fade" id="v-pills-regiao" role="tabpanel" aria-labelledby="v-pills-regiao-tab"> <?php include_once ( 'app\projetos\regiao.php' );   ?>  </div>
            <div class="tab-pane fade" id="v-pills-cep" role="tabpanel" aria-labelledby="v-pills-cep-tab"> <?php  include_once ( 'app\projetos\cep.php' );  ?></div>
            <div class="tab-pane fade" id="v-pills-uf" role="tabpanel" aria-labelledby="v-pills-uf-tab"> 
                
            <?php //include_once 'app\projetos\estados2.php?p=2'; ?>
            
            <iframe
                width="100%"
                height="550px"
                frameborder="0"
                scrolling="auto"
                marginheight="0"
                marginwidth="0"
                src="app/projetos/estados2.php?p=2"></iframe><br/>
        
        
        </div>
            <div class="tab-pane fade" id="v-pills-cidade" role="tabpanel" aria-labelledby="v-pills-cidade-tab"> <?php  require_once  'app\projetos\cidades.php'; ?>  </div>
        </div>
    </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>


