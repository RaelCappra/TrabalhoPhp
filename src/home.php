 <?php
// TODO(Rael): Limpar esses echo's e html misturado em php e usar includes ao invés disso
// TODO(Lucas): Bug no select de movimentações.(no if(!movimentacoes) tem que checar se não teve movimentações no tempo do select)
include '../lib/crud.php';
$conexao = getConnection();
session_start();
$_SESSION['usuario'] = "nome";

$movimentacoes = getListMovimentacao($_SESSION['usuario']);

$meses = Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", 
				"Julho", "Agost", "Setembro", "Outubro", "Novembro", "Dezembro", "Todos os meses");
if (!isset($_GET['mes'])){
	$_GET['mes'] = count($meses) - 1;
}

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
	Mês
	<form method="GET">
		<select name="mes" onchange="this.form.submit()">
		<?php
			
			for($mes = 0; $mes < count($meses); $mes++){
				$selected = ($mes == $_GET['mes'] ? "selected" : "");
				echo(
				"<option value=\"$mes\" " . $selected . ">". 
				$meses[$mes] .			
				"</option>"
			 	);
			} 
		?>
		</select>
	</form>
	<table>
	<?php
		if(!$movimentacoes){
			echo "Você não possui movimentações registradas neste mês";
		} else {
			foreach ($movimentacoes as $mov){
				$tipo = $mov['tipo'] ? "receita" : "despesa";
				$valor = $mov['valor'];
				$categoria = $mov['categoria'];
				$data = $mov['data'];
				$descricao = $mov['descricao'];
				echo("<tr class=$tipo> <td>$valor</td><td>$categoria</td><td>$data</td><td>$descricao</td> </tr>");
			}
		}
	?>
	</table>
	<a href="formularioRegistrar.php">Registrar movimentação</a><br>
	<a href="alterar.php">Alterar movimentação</a><br>
	<a href="excluir.php">Excluir movimentação</a><br>
	Logout<br>	
</body>
</html>

