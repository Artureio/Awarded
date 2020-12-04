<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--Datadables CSS-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <!--Jquery-->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/8ea24cca08.js" crossorigin="anonymous"></script>
  <!--DataTable JQuery-->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!--DataTable JQuery-->

  <!--Bootstrap-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontes-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,500;1,300;1,600&display=swap"
    rel="stylesheet">

  <!-- Estilo customizado -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Tabela de Notícias - Admin</title>

  <!-- Script para fazer a biblioteca funcionar-->

</head>

<body id="corpo-index">
  
    <div class="container mt-5 p-3 border bg-white">
			<h2>Listar notícias</h2>
			<span id="conteudo"></span>
    </div>
    
    <script>
			$(document).ready(function () {
				$.post('listar_usuario.php', function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			});
		</script>	
  
</body>
</html>