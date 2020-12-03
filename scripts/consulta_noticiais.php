<?php
/*
	@Autor: Jhonnatan P
	@Data: 15/11/2020
	@Versão: 1.3
	@Descrição: Realiza a consulta no SGBD das matérias cadastradas no site
				O retorno é incrementando com while em HTML para que o INDEX
				exiba as informações.
*/
// -- Instanciando a conexão com o banco
include_once("conexao.php");

// -- Testando conexão com SGBD
if ($conn->connect_error) {
	die("Sem conexão " . $conn->connect_error);
}
else{
	// -- Criando query
	$query = "SELECT * FROM blog ORDER BY id DESC ";
	
	// -- Obtendo retorno
	$retorno = $conn->query( $query );
	
	// -- Testando se houve retorno
	if ($retorno->num_rows > 0) {
		while( $linha = mysqli_fetch_assoc( $retorno ){
			
			// -- Atribuindo variáveis
			$imagem = $retorno['imagem']			;
			$titulo = $retorno['titulo']			;
			$subtit = $retorno['subtitulo']			;
			$views  = $retorno['visualizacoes']		;
			
			$html  = '<div class=" col-lg-3 col-md-4 col-sm-6">'								;
			$html .= '	<div class="card" style="">'											;
			$html .= '		<img class="card-img-top" src="$imagem" alt="$titulo">'				;
			$html .= '		<div class="card-body">'											;
			$html .= '			<h5 class="card-title">$titulo</h5>'							;
			$html .= '			<p class="card-text">$subtit</p>'								;
			$html .= '			<a href="#" class="btn btn-sm btn-success">Saiba mais...</a>'	;
			$html .= '		</div>'																;
			$html .= '	</div>'																	;
			$html .= '	<div class="card-footer text-muted d-flex justify-content-between bg-transparent mt-0 border-top-0">' ;
			$html .= '		<div class="views"></div>'					;
			$html .= '			<div class="stats">'					;
			$html .= '				<i class="far fa-eye">$views</i>'	;
			$html .= '				<i class="far fa-comment">12</i> ' 	; // -- Número mocado no script para teste.
			$html .= '			</div>'	;
			$html .= '		</div>'		;
			$html .= '	</div>'			;
			$html .= '</div>'			;
		}
	}
}

echo $html  ;

?>