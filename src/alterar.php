<?php
	session_start();
	include '../lib/crud.php';
	$id = $_POST['movimentacao'];
	if (!$id){
		header('location:index.php');
	}
	$movimentacao = getMovimentacaoById($id);
	if ($movimentacao and getIdUsuario($_SESSION['usuario'])[0]['id'] == $movimentacao['usuario']){
		$tipo = $_POST['tipo'];
		$categoria = $_POST['categoria'];
		$data = $_POST['data'];
		$descricao = $_POST['descricao'];
		$valor = $_POST['valor'];

		alteraMovimentacaoTipo($tipo, $id);
		alteraMovimentacaoCategoria($categoria, $id);
		alteraMovimentacaoValor($valor, $id);
		alteraMovimentacaoData($data, $id);
		alteraMovimentacaoDescricao($descricao, $id);
		header('location:home.php');
	} else {
		echo 'Erro: nao pode editar esta movimentacao';
	}
?>