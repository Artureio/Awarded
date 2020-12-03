<?php
//iniciar seção para manter o blog logado com o usuário digitado no formulário
session_start();

//incluindo arquivo com dados da conexão ao banco de dados
include_once("conexao.php");

//puxando o login e senha do formulário
$login = filter_input (INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

// -- Testando conexão com SGBD
if ($conn->connect_error) {
	die("Sem conexão " . $conn->connect_error);
}
else{
	// -- Criando a query.
	$query = "SELECT senha FROM usuario WHERE login = '$login'"; 
	
	// -- Obtendo retorno do SGBD.
	$queryExec = $conn->query( $query );
	
	// -- Testando se houve retorno.
	if ($queryExec->num_rows > 0) {
		// -- obtendo retorno
		$row = $queryExec->fetch_assoc() ;
		if( $senha == $row["senha"] ) {
			header("Location: admin.html");
		}else{
			echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
        }
		
	}else{
		echo "<script>alert('Usuário não localizado'); history.back();</script>";
	}
}