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

api

![image](https://user-images.githubusercontent.com/1613816/146113117-b5bcb676-7c80-4f99-b587-2057856f602c.png)


resposa do console

![image](https://user-images.githubusercontent.com/1613816/146112968-9fd84aa3-8ee0-4cae-8bc6-c52bf4f37058.png)

Situação de erro:

![image](https://user-images.githubusercontent.com/1613816/146113629-7b04a629-51ed-4349-bf15-91c81445b738.png)

Busca, armazena e limpa 

![image](https://user-images.githubusercontent.com/1613816/146114544-80b49887-5b9b-463f-ae1c-09c2c83e140b.png)


Tela de busca limpa 


![image](https://user-images.githubusercontent.com/1613816/146116332-58cad1d4-a69b-4b19-8b01-06453786cf4e.png)






















