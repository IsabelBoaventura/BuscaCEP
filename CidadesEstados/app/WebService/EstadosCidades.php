<?php 

//nome desta pagina
namespace App\WebService;


class EstadosCidades{
    //metodo para consultar o cep

    /**
     * Método responsável por consultar  um CEP no ViaCep
     * @param string  $cep
     * @return array
     */
    public static function buscaCidadesDoEstado( $uf ){
        //endpoint
        $url = 'http://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$uf.'/municipios' ;
        // print_r( $url  );

        //INICIA O CURL 
        $curl = curl_init();

        //ARRAY DE CONFIGURAÇÕES DO CURL 
        curl_setopt_array( $curl, [
            CURLOPT_URL => $url ,
            CURLOPT_RETURNTRANSFER => true,  //retornar o conteudo e nao imprimir na tela
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
            //para nao verificar o certificado podendo usar ( http e https )
        ]);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //RESPONSE
        $response = curl_exec($curl);
        // echo '<br>';
        // print_r(  $response );
        if ($response === false) {
            echo 'Erro cURL: ' . curl_error($curl);
        }
       

        //fechar a conexao , apos executcao para nao manter os recursos abertos
        curl_close( $curl );
        
        //forcar o resultado em array
        $array = json_decode( $response, true );

        //retornar com validacao 
       // return  isset( $array['id']) ? $array: null;
       return $array ;


    }



    public static function buscaRegioes(){
        //endpoint
        $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/regioes';
 
        //INICIA O CURL 
        $curl = curl_init();
 
        //ARRAY DE CONFIGURAÇÕES DO CURL 
        curl_setopt_array( $curl, [
            CURLOPT_URL => $url ,
            CURLOPT_RETURNTRANSFER => true,  //retornar o conteudo e nao imprimir na tela
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
             //para nao verificar o certificado podendo usar ( http e https )
        ]);
 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 
         //RESPONSE
        $response = curl_exec($curl);
        if ($response === false) {
            echo 'Erro cURL: ' . curl_error($curl);
        }
        
        //fechar a conexao , apos executcao para nao manter os recursos abertos
        curl_close( $curl );
        
        //forcar o resultado em array
        $array = json_decode( $response, true );

        //retornar com validacao 
       // return  isset( $array['id']) ? $array: null;
       return $array ;



    }



    public static function buscaEstados(){
       // https://servicodados.ibge.gov.br/api/v1/localidades/estados

        //endpoint
        $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
 
        //INICIA O CURL 
        $curl = curl_init();
 
        //ARRAY DE CONFIGURAÇÕES DO CURL 
        curl_setopt_array( $curl, [
            CURLOPT_URL => $url ,
            CURLOPT_RETURNTRANSFER => true,  //retornar o conteudo e nao imprimir na tela
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
             //para nao verificar o certificado podendo usar ( http e https )
        ]);
 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 
         //RESPONSE
        $response = curl_exec($curl);
        if ($response === false) {
            echo 'Erro cURL: ' . curl_error($curl);
        }
        

         // echo '<br>';
        //  print_r(  $response );



        //fechar a conexao , apos executcao para nao manter os recursos abertos
        curl_close( $curl );
        
        //forcar o resultado em array
        $array = json_decode( $response, true );

         // 
          echo '<br>';
        // 
         print_r(  $array );

        //retornar com validacao 
       //return  isset( $array['id']) ? $array: null;
       //
       return $array ;

    }
}



?>