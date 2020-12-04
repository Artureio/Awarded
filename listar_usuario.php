<?php
include_once "conexao.php";

//consultar no banco de dados
$result_usuario = "SELECT * FROM blog ORDER BY ID DESC";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<div class="mt-3 mb-3 clearfix"><!--Botões-->
      <div class=" float-left ">
        <a name="" id="" class="btn btn-primary float-left" href="novanoticia.php" role="button">
          Nova notícia
        </a>
      </div>
      
    </div>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Título</th>
				<th>Autor</th>
				<th>Criado em</th>
				<th>Visualizações</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<th><?php echo $row_usuario['ID']; ?></th>
					<td><?php echo $row_usuario['titulo']; ?></td>
					<td><?php echo $row_usuario['autor']; ?></td>
					<td><?php echo $row_usuario['data']; ?></td>
					<td><?php echo $row_usuario['visualizacoes']; ?></td>
					<td><?php 
							echo 	'<a href="update_noticia.php?id='.$row_usuario["ID"].'"
									class="btn small float_left btn-warning">
										<i class="fas fa-user-edit"></i>
									</a> 
									<a href="deletar_noticias.php?id=' . $row_usuario["ID"] .'"
									class="btn small float_right btn-danger">
										<i class="fas fa-trash-alt">
										</i>
									</a>'
							; 
						?>
					</td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
