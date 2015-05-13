 <?php
include '../lib/crud.php';
session_start();
$usuario = $_SESSION['usuario'];

$action = 'registrar.php';
$categorias = getListCategoria();
$valor_value = '';
$data_value = '';
$tipo_1_selected = '';
$descricao_value = '';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Controle de movimentações</title>
</head>
<body>
	<?php
	include "../lib/formularioMovimentacao.php";
	?>

</body>
</html>