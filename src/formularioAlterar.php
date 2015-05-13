<?php
	include "../lib/crud.php";
	$id = $_GET['movimentacao'];
	session_start();
	$id = $_GET['movimentacao'];
	if (!$id){
		header('location:index.php');
	}
	$movimentacao = getMovimentacaoById($id);
	if ($movimentacao and getIdUsuario($_SESSION['usuario'])[0]['id'] == $movimentacao['usuario']){
		$categorias = getListCategoria();
		$action = 'alterar.php';

		$valor_value = $movimentacao['valor'];
		$data_value = $movimentacao['data'];
		$tipo_1_selected = $movimentacao['tipo'] == 1;
		$descricao_value = $movimentacao['descricao'];

		include "../lib/formularioMovimentacao.php";
?>

	
<?php
		
	} else {
		echo 'Erro: nao pode editar esta movimentacao';
	}
?>