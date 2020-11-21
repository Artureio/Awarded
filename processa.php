<?php
//iniciar seção para manter o blog logado com o usuário digitado no formulário
session_start();

//incluindo arquivo com dados da conexão ao banco de dados
include_once("conexao.php");
//puxando o login e senha do formulário
$login = filter_input (INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


//criando a query
$query = "INSERT INTO usuario (login, senha) VALUES ('$login', '$senha')"; 

//executando a query
$queryExec = mysqli_query($conn ,$query);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
    header("Location: cadastro.php");
}else{
    $_SESSION['msg'] = "erro!";
    header("Location: cadastro.php");
}