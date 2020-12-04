<?php
    require_once('conexao.php');

    if(isset($_GET['id']) && isset ($_POST['editCadNoticia'])){
        $id = $_GET['id'];
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $titulo = $dados['titulo'];
        $autor = $dados['autor'];
        $texto = $dados['texto'];
        $sql = "UPDATE `blog` SET 
                `titulo`='$titulo',
                `autor`='$autor',
                `texto`='$texto'
                WHERE ID = $id";

                if($conn->query($sql)===TRUE){
                    echo "<script type='text/javascript'>
                            alert('Notícia Atualizada!');
                            history.go(-2);
                          </script>";
                    
                }else{
                    echo "<script type='text/javascript'>
                    alert('Não foi possível atualizar!');
                    history.go(-2);
                  </script>";
                }
    }else{
        echo"inválido";
    }

?>