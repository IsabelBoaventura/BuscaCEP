<?php


$host = 'localhost';
$user = 'root';
$pass = '123456';
$dbname = 'isabel';
$port = 3306;

try{
    //conexao
    $conn = new PDO("mysql:host=$host;dbname=". $dbname, $user , $pass );
   // echo '<BR>Conexao com o banco de dados  realizada com Sucesso <BR><BR><BR>';

}catch( PDOException $err ){
    echo "<br>Erro: Conexao com o banco de dados Não realizada. <br> Erro Gerado: ". $err->getMessage();

}
?>