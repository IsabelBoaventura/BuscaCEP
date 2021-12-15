# Criando projeto Busca CEP

Baseado em:
#### `https://www.youtube.com/watch?v=oy4cbqE1_qc`
#### Sujeito programador 


Comando para criar o projeto
### `npx create-react-app buscador`

Irá criar a pasta 'buscador' e dentro dela o projeto.
Se esta usando o terminal ( CMD), para entrar na pasta use `cd buscador` .
Estando dentro da pasta pode abrir o projeto com o VS Code,  ainda no terminal digite `code .` , abrindo o VS Code  com o projeto.

Iniciar o projeto
#### `npm start`
Com este comando irá iniciar o projeto e rodar o mesmo no navegador.

local: http://localhost:3000
network: http://ip:3000

## Limpar
Iremos limpar as configurações que ja vem por padrão para montarmos o nosso projeto.
* src > app.css 

Arquivo onde esta as configurações do css, iremos limpar para montarmos o nosso. 
Outros arquivos iremos eliminar:
* src > app.css 
* src > app.test.js
* src > logo.svg
* src > reportWebVitals.js
* src > setupTests.js

Eliminando estes arquivos o nosso projeto ira acusar erros,  neste caso temos de corrigir o projeto para ele não mais chamar os arquivos que foram deletados.
Dentro do SRC no arquivo index.js, deve ser retirada as referências ao arquivo reportWebVitals.js 

Dentro do SRC no arquivo app.js eliminar as referencias aos arquivos do logo e do css.

## Começando 
Agora iremos começar a construir o nosso projeto. 
Iremos limpar o arquivo index.css, que esta dentro do SRC, e depois iremos criar o layout como definido. 

Projetar o layput da página no SRC => index.css
Para o botão de procurar, será usado a biblioteca `react-icons`.

#### `https://react-icons.github.io/react-icons/`

Neste endereço tem como instalar e como usar a biblioteca.

Para instalar, para o sistema e no terminal use:
#### `npm install react-icons --save`
Não precisa usar o '--save', podendo ser apenas assim:
#### `npm install react-icons`

Nesta biblioteca tem vários ícones para uso. 
Para usamor a biblioteca, na página principal ( src-> app.js) iremos importar a biblioteca.
 `import { FiSearch } from 'react-icons/fi';`
 e usarmos no button . 

Vamos criar outra página de estilo que será usado, apenas para esta pagina de apresentação. 
Dentro do SRC criar uma pagina de estilo 'styles.css'
Dentro da página principal (src -> app.js) importar a página de estilo `import './styles.css'` , nesta nova folha de estilo, criar o estilo para os containers.

Para ter animação
`@keyframes IDENTIFICADOR { from { transform: rotateX(90deg); } to{ transform: rotateX(0deg)} }`

O mesmo identificador da Animação deve constar no atributo onde a animação será apresentada. Neste caso na Classe titulo. Acrescentado do tempo da ação, no nosso caso, 2s.

Terminando a parte de estilo iremos para a parte funcional do programa.

Para trabalhar com partes dinâmicas no react, deve se usar o 'estado', para isto usaremos o `useState` do `react`. 
Dentro do arquivo src->app.js iremos importar o 'useState'.
Deve ser declaro o estado com o valor inicial do mesmo, dentro da função principal (app).
O que for declaro dentro do 'useState', será informado na chamada do 'input'.
Com a função do 'onChamge' modificamos o valor do 'setInput'. Passa o valor para o estado.

Toda a vez que clicar no botao de busca,  chamar  uma função, esta função trabalhará com a busca das informações.

A   função que foi criada, será declarada dentro da função app. 

## API

Usaremos uma API  para fazer a busca das informações do CEP.
A API usada será a `ViaCep`.
#### `https://viacep.com.br/ws/01310930/json/`

![image](https://user-images.githubusercontent.com/1613816/146113117-b5bcb676-7c80-4f99-b587-2057856f602c.png)


A URL de acesso da api é composta pelo seu endereço, acrescentado de 'ws', o CEP a ser pesquisado (apenas os números, sem máscara), e o formato da resposta,  no nosso caso 'json'.

Para trabalhar com requisições http faz se necessário a instalação da biblioteca `axios`.
#### `npm install axios`

Para configurar o axios na aplicação, dentro do SRC iremos criar um novo diretório chamado `services` e dentro deste diretório um novo arquivo chamado `api.js`.

Será neste arquivo que faremos a importação da Biblioteca axios,  e chamaremos a api.

Definido `baseURL` como sendo o endereço da url, ou a parte da url que não sofrerá alterações. 

A parte da url que sofrerá alterações é definida de `rota`, no nosso caso: o cep e o formato;

Com a parte de exportação do arquivo, as configurações necessários no arquivo da biblioteca axios,  já estarão definidas.  
Agora podemos voltar para o arquivo principal (src->app.js) para configurar a função de busca, para ela usar a api. 

Voltando para o arquivo principal, e dentro da função de busca, iremos validar se o conteúdo do input esta preenchido.

Usaremos o `try{}catch{}` para as operações, e como precisaremos esperar por uma resposta, transformaremos a função de busca em assincrona `async` ( espera por algo para fazer uma outra ação).
try{} é o que se deseja fazer, mas pode dar errado.
catch{} é a informação de que deu errado.

Importaremos o arquivo api.js do diretorio services. E usaremos ele no try da função.

Na busca do CEP, com o inspecionar elemento,  dentro do Console (console->user),  e tendo voltado a resposta correta, poderemos ver um objeto em JSON contendo a 'configuração', os dados, o cabeçalho, a requisição, o status ( 200), statusText (ok). 

Será dentro da propriedade 'data' que teremos as informações que necessitamos. Informações deste CEP.
Portanto não é de dentro do response que teremos as informações,  e sim do `response.data`.

![image](https://user-images.githubusercontent.com/1613816/146112968-9fd84aa3-8ee0-4cae-8bc6-c52bf4f37058.png)

Assim no console, será devolvido as informações que precisaremos. APENAS as informações que precisamos.

No catch, além de informarmos que a ação não foi bem sucessida,  também limparemos o nosso input. 

Quando a requisição não obteve exito, o console mostrará mensagem de não sucedida.

![image](https://user-images.githubusercontent.com/1613816/146113629-7b04a629-51ed-4349-bf15-91c81445b738.png)

## Apresentar as informações

Vamos armazenar o retorno da chamada.
Vamos criar um novo estado ( useState) e deixá-lo vazio, e após termos o retorno da informação, adicionar o retorno a este estado.

Depois de passar a resposta para o useState de armazenamento, limpar as informações do useState de busca. 

![image](https://user-images.githubusercontent.com/1613816/146114544-80b49887-5b9b-463f-ae1c-09c2c83e140b.png)

Agora iremos modificar o 'main', onde as informações estavam fixas,  iremos passar as informações através do useState de armazenamento. 

Portanto, para cada campo a ser apresentado, usaremos o nome do estado concatenado com o nome do campo que venho do Json (`cep.logradouro`), e teremos como resposta a informação do campo ('Rua Aquarela').

Quando abre o site, o  input estará vazio, pois ainda não buscamos nada, neste caso, iremos esconder o 'main'. 
Para isto será usado a comparação do tamanho das chaves do objeto: `Object.keys(cep).length`. Se for maior que 0, irá apresentar o main, caso contrário, nada será apresentado. 

Tela de incial limpa.

![image](https://user-images.githubusercontent.com/1613816/146116332-58cad1d4-a69b-4b19-8b01-06453786cf4e.png)


### Buscador concluído com sucesso!!!

(15/12/2021)













