<?php
	$username = $_POST['username'];
	$senha = $_POST['senha'];
	include "conexao.php";
	$conexao = getConnection();
	if($conexao){
		//echo("Conectado");
	}else{
		echo("Nao foi possivel se conectar ao banco");
		die();
	}

	$sql = "select * from usuario where username = $1";
	$resultado = pg_query_params($conexao, $sql, Array($username));
	$usuario = pg_fetch_array($resultado);
	if(!$usuario or $usuario['senha'] != $senha){
		session_start();
		session_unset();
		
		$_SESSION['login_error'] = 1;
		header('location:../src/index.php');
	} else{
		session_start();
		$_SESSION['login_error'] = 0;
		$_SESSION['usuario'] = $username;
		header('location:../src/home.php');
	}
?>