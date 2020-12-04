<?php
//iniciar seção para manter o blog logado com o usuário digitado no formulário
session_start();

//incluindo arquivo com dados da conexão ao banco de dados
include_once("conexao.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM `blog` WHERE ID = $id";

    if($conn->query($sql)===TRUE){
        echo "<script type='text/javascript'>
                alert('Notícia Deletada!');
                history.go(-1);
              </script>";
        
    }else{
        echo "<script type='text/javascript'>
        alert('Não foi possível deletar!');
        history.go(-1);
      </script>";
    }
    
}else{
    die('id não localizado.');
}

?>