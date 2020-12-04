<?php
	//obter id que será ediitado
	if(!isset($_GET['id'])){
		
		die('id não localizado');
	}
	require_once('conexao.php');

	$id = $_GET ['id'];

	//selecionando o id dentro do banco de dados
	$sql = "SELECT * FROM `blog` WHERE ID = $id";

	$resultado_id = $conn->query($sql);

	//recuperando o conteúdo do id selecionado
	$dadosId = $resultado_id->fetch_assoc();
	
?>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
		<!--Bootstrap-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script> <!--Jquery-->

		<!--Fontes-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;1,300;1,600&display=swap" rel="stylesheet">
        
        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="style.css">

		<title>Cadastrar nova notícia</title>

	</head>
	<body id="corpo-index">

        <div class="container border p-5 mt-5 bg-light">
            <a name="" id="" class="btn btn-info small" href="admin.php" role="button">< voltar</a>
            <h1 class="display-5 text-center">Editar notícia</h1>
            <form action="update_noticia_att.php?id=<?= $id; ?>" name="cadNoticia" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo">Título da notícia</label>
                        <input type="text" class="form-control" name="titulo" value="<?php echo $dadosId["titulo"];?>" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" name="autor" value="<?php echo $dadosId["autor"];?>">

                    </div>
                </div>
                <div class="form-group">
                    <label for="texto">Corpo da notícia</label>
					<textarea class="form-control" name="texto" rows="3" value="<?php echo $dadosId["texto"];?>">
				</textarea>
                </div>
                
                <div class="form-group">
                    <input name="editCadNoticia"  class="btn btn-primary mt-2" type="submit" value="Atualizar">
                </div>
            </form>
        </div>
	</body>
</html>