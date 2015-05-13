<?php
	session_start();
	include '../lib/crud.php';
	$id = $_POST['movimentacao'];
	deleteMovimentacao($id);
?>
