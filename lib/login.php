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
	$usuario = pg_fetch_row($resultado);
	if(!$usuario){
		//Usuario nao existe
	} else if($usuario['senha'] == $senha){
		//Senha incorreta
	} else{
		session_start();
		$_SESSION['usuario'] = $username;
	}
?>