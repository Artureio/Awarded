<?php
/*O algorítmo faz a conexão com o banco de dados, obtém os valores do DB Blog e,
em seguida, o joga para a tabela de exibição de todas as notícias. */

require 'conexao.php';

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 => 'ID', 
	1 => 'titulo',
	2 => 'autor',
	3 => 'data',
	4 => 'visualizacoes'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT ID, titulo, autor, data, visualizacoes FROM blog";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT ID, titulo, autor, data, visualizacoes FROM blog WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( ID LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR titulo LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR autor LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR data LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR visualizacoes LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["ID"];
	$dado[] = $row_usuarios["titulo"];
	$dado[] = $row_usuarios["autor"];	
	$dado[] = $row_usuarios["data"];	
	$dado[] = $row_usuarios["visualizacoes"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
$conn ->close();
