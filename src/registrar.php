<?php
//TODO(Rael): Validacao
	session_start();
	include '../lib/crud.php';
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$categoria = $_POST['categoria'];
	$data = $_POST['data'];
	$descricao = $_POST['descricao'];
	
	if (!is_numeric($valor) or !is_numeric($categoria)
		or $categoria < 1 or $categoria > 7){
		echo "Erro: formulario invalido";
		die();
	}

	insertMovimentacao($valor, $tipo, $categoria, $data, $descricao, $_SESSION['usuario']);
	header('location:home.php');

	
?>