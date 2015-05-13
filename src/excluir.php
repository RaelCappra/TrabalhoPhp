<?php
	session_start();
	include '../lib/crud.php';
	$id = $_GET['movimentacao'];
	$movimentacao = getMovimentacaoById($id);
	if ($movimentacao and getIdUsuario($_SESSION['usuario'])[0]['id'] == $movimentacao['usuario']){
		deleteMovimentacao($id);
		header('location:home.php');
	} else {
		echo 'Erro: nao pode excluir esta movimentacao';
	}

	
?>
