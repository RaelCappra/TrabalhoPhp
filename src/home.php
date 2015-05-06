<?php
include '../lib/crud.php';
$conexao = getConnection();
$_SESSION['usuario'] = "nome";

$movimentacoes = getListMovimentacao();

/*
$movimentacoes = Array(
	Array("100", "bar", "foobar", "parrot", 0),
	Array("100", "bar", "foobar", "parrot", 1),
	Array("100", "bar", "foobar", "parrot", 1),
	);
*/


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
	<table>
	<?php
		foreach ($movimentacoes as $mov){
			$tipo = $mov['tipo'] ? "receita" : "despesa";
			$valor = $mov['valor'];
			$categoria = $mov['categoria'];
			$data = $mov['data'];
			$descricao = $mov['descricao'];
			echo("<tr class=$tipo> <td>$valor</td><td>$categoria</td><td>$data</td><td>$descricao</td> </tr>");
		}
	?>
	</table>
</body>
</html>

