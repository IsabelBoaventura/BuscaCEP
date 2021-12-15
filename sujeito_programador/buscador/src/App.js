import { useState } from 'react';
import {FiSearch } from 'react-icons/fi';
import './styles.css';

import api from './services/api';

function App() {

  const [input, setInput ] = useState('');
  const [cep, setCep] = useState({});

  async function handleSearch(){
    //alert("Mudança de estado " + input);
    if( input === ''){
      alert("Preencha algum cep");
      return;
    }
    try{
      const response = await api.get(`${input}/json`);
      console.log(response.data);
      setCep( response.data );
      setInput('');
    }catch{
      alert("Alguma coisa esta errada na busca da informação");
      setInput('');
    }
  }

  return (
    <div className="container">
     
        <h1 className="title">Buscador de CEP</h1>
        <h2 className="subTitle">Sujeito Programador</h2> 
        <p>Onde encontrar: https://www.youtube.com/watch?v=oy4cbqE1_qc</p>

        <div className="containerInput" >
          <input type="text" 
            placeholder="Digite o seu CEP ..." 
            value={input}
            onChange={(e) => setInput(e.target.value)}
          />

          <button className="buttonSearch" onClick={handleSearch}> 
            <FiSearch size={25} color="#fff"/>
          </button>
        </div>

        {Object.keys(cep).length>0 && (
          <main className="main">
            <h2>CEP: {cep.cep}</h2>
            <span>Logradouro: {cep.logradouro} </span>
            <span>Complemento: {cep.complemento} </span>
            <span>Bairro: {cep.bairro} </span>
            <span>{cep.localidade} - {cep.uf} </span>
            <span>IBGE: {cep.ibge}</span>
          </main>

        )}    
    </div>
  );
}

export default App;
