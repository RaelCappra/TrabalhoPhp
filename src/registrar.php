<?php
	
	session_start();
	include '../lib/crud.php';
	include '../lib/valida.php';
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$categoria = $_POST['categoria'];
	$data = $_POST['data'];
	$descricao = $_POST['descricao'];
	
	if (!valida($valor, $categoria)){
		echo "Erro: formulario invalido";
		die();
	}

	insertMovimentacao($valor, $tipo, $categoria, $data, $descricao, $_SESSION['usuario']);
	header('location:home.php');

	
?>