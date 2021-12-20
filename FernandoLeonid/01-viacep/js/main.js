//'use strict';
//javascript em modo  rigoroso;


const preencherFormulario = ( endereco ) => {
    document.getElementById("endereco").value = endereco.logradouro;
}

const pesquisarCep = async () => {
   // alert( ' ola mundo da funcao pesquisarCep');
    const cep = document.getElementById('cep').value;
    console.log('CEP Digitado '+ cep);    
    const url = `https://viacep.com.br/ws/${cep}/json/`;
    //fetch(url)
    //    .then(response => response.json())
      //  .then(console.log)
        ///.catch();
    const dados  = await fetch(url);
    const endereco = await dados.json();
    console.log( endereco );
    preencherFormulario( endereco );


    
}

document.getElementById('cep')
        .addEventListener('focusout', pesquisarCep);
//funcao passada como parametro

//var c =  document.getElementById('cep');
//alert(' linha 11' + c.value);//


////@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');