# Busca CEP com Javascript puro

Conteúdo da video-aula de `Fernando Leonid`, disponível em `https://www.youtube.com/watch?v=imk6Y0viabg`.

Criação do HTML e CSS disponível em `https://www.youtube.com/watch?v=bTeNQxE4LwM`.

## Como consumir uma API de CEP com javascript puro| ViaCEP | #01

Depois de digitar a informação no campo CEP do HTML, no javascript, quando sair de focu (`focusout`) do elemento cep (`document.getElementById('cep')`), irá chamar a função (`pesquisarCep`).

## Arrow Function

Em javascript as arrow function são declaras assim ` const nome_da_funcao = () => { conteudo_da_funcao }`.

## ATENÇÃO
Quando a chamado do javascript esta com o type com a propriedade `modules` provoca o erro de segurança `NO-CORS`. Não permitindo o programa continuar com as funções do javascript. 

## Fetch
É uma função do javascript que recebe uma URL e que retorna uma `promessa`. Promessa é algo que pode acontecer ou não.  Fetch é um retorno assincrono. 
Deve-se usar métodos para acessar os dados de retorno.
`then` e `cath`.

O métoDO THEN tras as informações do `response`.  
`response.json()` traz as respostas em json;

Dentro do Objeto `PromiseResult` háverá as respostas vindas da URL.

Usando um segundo Then, que conterá apenas um console.log, ele irá mostrar as informações que a URL chamou. 

Vamos transformar a função  `async`.
Ambas as variáveis serão `await`.
Variavel 'Dados' pega toda a resposta da URL.
Variavel 'Endereco' pega a resposta da variavel 'dados' com o método json `dados.json()` e será ela que mostrará os resultados. 

## Usar os Dados

Agora que já trouxemos o resultado da URL e aprensentamos no Console. Agora vamos preencher os dados . 


## Tratamento de erro

Como saber se a informação recebida pelo Json, esta correta?
Quando há erro, o Json retorna com o atributo `erro: true`. 
Tem de fazer o código verificar se existe ou não este atributo. 
Verifica se a resposta do Json tem determinada properidade: `endereco.hasOwnProperty('erro')`.


## Validação

Apenas mandar para a função fetch, se o CEP for constiuido de apenas números e contendo  apenas 8 dígitos. 

Validar se todos os caracteres digitados são números. 

## Limpar Formulário
Após sair do campo do CEP, mandar o comando de limpar os campos, e depois fazer a pesquisa do CEP cadastrado. 


## Finalização

![image](https://user-images.githubusercontent.com/1613816/146847441-4b1013d9-f629-466d-adc4-62e5080ba593.png)

### Funcionando

20-12-2021



