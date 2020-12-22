<?php

//PDO orientado a objetos para a conexão com o banco de dados

$bancoNome = 'mysql: host=localhost; dbname =comidaenlatada;';
$usuario1 = 'root';
$senha1 ='';

//Tratativas com os dados de conexão usando o Try e catch para pegar erros. 
try{

$conex = new PDO($bancoNome, $usuario1, $senha1);
echo "ESTOU AQUI TUDO OK - BANCO DE DADOS CONECTADO";          //Indicativo visual para o usuário caso o try estiver ok.
}
catch(PDOException $e){
 echo "A CONEXÃO ESTÁ FALHANDO" . $e->getMessage();

}catch(Exception $e){
  echo "Algum erro...". $e->getMessage();

}

//TESTE de INSERT na tabela criada, pelo método prepare:
$respInsert = $conex->prepare("INSERT INTO dadospessoas(Nome, numeroRegistro, email) VALUES (:n, :nr, :em)");   

//Substituição:
$respInsert->bindValue(":n","Maria Eulasia");     // Definindo a entrada da coluna nome. 
$respInsert->bindValue(":nr","039304222233");     // Definindo a entrada do numero de Registro.
$respInsert->bindValue(":em","teste@op.com.br");  // Definindo a entrada do email. 

//Executando o comando: 
$respInsert->execute();


?>