import {FiSearch } from 'react-icons/fi';
import './styles.css';

function App() {
  return (
    <div className="container">
     
        <h1 className="title">Buscador de CEP</h1>
        <h2 className="subTitle">Sujeito Programador</h2>

        <div className="containerInput" >
          <input type="text" placeholder="Digite o seu CEP ..." />

          <button className="buttonSearch"> 
            <FiSearch size={25} color="#fff"/>
          </button>
        </div>

        <main className="main">
          <h2>CEP: 89220-160</h2>
          <span>Rua: Teste de Nome da Rua </span>
          <span>Complemento </span>
          <span>Bairro: Teste de Bairro </span>
          <span>Cidade - Estado </span>
        </main>
    

    
    </div>
  );
}

export default App;
