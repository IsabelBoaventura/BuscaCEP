//'use strict';
//javascript em modo  rigoroso;

const limparFormulario = () =>{
    document.getElementById("endereco").value = '';
    document.getElementById("bairro").value = '';
    document.getElementById("cidade").value = '';
    document.getElementById("estado").value = '';
}

const confereNumero = ( numero ) =>  /^[0-9]+$/.test( numero) ;

const cepValido = ( cep ) => cep.length ==8 && confereNumero( cep );

const preencherFormulario = ( endereco ) => {
 
    document.getElementById("endereco").value = endereco.logradouro;
    document.getElementById("bairro").value = endereco.bairro;
    document.getElementById("cidade").value = endereco.localidade;
    document.getElementById("estado").value = endereco.uf;
}

const pesquisarCep = async () => {
   limparFormulario();
   // alert( ' ola mundo da funcao pesquisarCep');
    const cep = document.getElementById('cep').value;
    console.log('CEP Digitado '+ cep);    
    const url = `https://viacep.com.br/ws/${cep}/json/`;

    if(cepValido(cep)){
      //fetch(url)
      //    .then(response => response.json())
        //  .then(console.log)
          ///.catch();
      const dados  = await fetch(url);
      const endereco = await dados.json();
      //console.log( endereco );
      //conferir a informação
      if(endereco.hasOwnProperty('erro') ){
        console.log('Apresentação do erro: ');
        console.log( endereco );
        document.getElementById('endereco').value ='CEP não encontrado!';

      }else{
        preencherFormulario( endereco );
      }
    }else{
        document.getElementById('endereco').value ='CEP incorreto!';
    }


    
}

document.getElementById('cep')
        .addEventListener('focusout', pesquisarCep);
//funcao passada como parametro

//var c =  document.getElementById('cep');
//alert(' linha 11' + c.value);//


////@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');