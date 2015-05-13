<?php
//TODO(Rael): Validacao
	session_start();
	include '../lib/crud.php';
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$categoria = $_POST['categoria'];
	$data = $_POST['data'];
	$descricao = $_POST['descricao'];
	
	insertMovimentacao($valor, $tipo, $categoria, $data, $descricao, $_SESSION['usuario']);
	header('location:home.php');

	
?>