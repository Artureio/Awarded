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
		<?php
			require('conexao.php');
			
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			
            //passa as  variáveis para preencher os pontos de interrogação
            $cadastrar ="INSERT INTO blog (titulo, autor, texto, data) VALUES(?,?,?, NOW())";
            
            $statement = $conn->prepare($cadastrar);
            
            //o parametro 's' significa que você está passando uma string. É como um printf...
            $statement->bind_param("sss", $dados['titulo'], $dados['autor'], $dados['texto']); 

            //executa o statement
            $statement->execute();
            $statement->close();

            
            if(!empty($dados['sendCadNoticia'])){
                unset($dados['sendCadNoticia']);
            }
                        
            
            if(isset($_FILES['imagem']))
            {
                //Pegando extensão do arquivo
                $ext = strtolower(substr($_FILES['imagem']['name'],-4));
                
                //Definindo um novonome para o arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; 
                
                //Diretório para uploads 
                $dir = './imagens-upload/';
                
                //Fazer upload do arquivo
                move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name);   
            } 
        ?>
        <div class="container border p-5 mt-5 bg-light">
            <a name="" id="" class="btn btn-info small" href="admin.html" role="button">< voltar</a>
            <h1 class="display-5 text-center">Cadastrar notícia</h1>
            <form action="" name="cadNoticia" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titulo">Título da notícia</label>
                        <input type="text" class="form-control" name="titulo" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" name="autor" >

                    </div>
                </div>
                <div class="form-group">
                    <label for="texto">Corpo da notícia</label>
                    <textarea class="form-control" name="texto" rows="3"></textarea>
                </div>
                <div class="form-group-file">
                    <label for="imagem">Imagem <span class="small text-danger">.png, .jpg - 640x400 px </span></label>
                    <input  type="file" class="form-control-file" name="imagem" accept="image/*" >
                </div>
                <div class="form-group">
                    <input name="sendCadNoticia"  class="btn btn-primary mt-2" type="submit" value="Enviar">
                </div>
            </form>
        </div>
	</body>
</html>