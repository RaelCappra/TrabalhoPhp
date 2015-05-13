 <?php
// TODO(Rael): Limpar esses echo's e html misturado em php e usar includes ao invés disso
// TODO(Lucas): Bug no select de movimentações.(no if(!movimentacoes) tem que checar se não teve movimentações no tempo do select)
include '../lib/crud.php';
$conexao = getConnection();
session_start();
if(!isset($_SESSION['usuario']) and !isset($_POST['username'])){
	header('location: index.html');
} else if(!isset($_SESSION['usuario'])){
	$_SESSION['usuario'] = $_POST['username'];
}



$meses = Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", 
				"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro", "Todos os meses");
if (!isset($_GET['mes'])){
	$_GET['mes'] = count($meses) - 1;
}

$movimentacoes = getListMovimentacaoByMes($_SESSION['usuario'], $_GET['mes']);

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
	<table class='movimentacoes' cellpadding="0" cellspacing="1">
		<tr>
			<th>Valor</th>
			<th>Categoria</th>
			<th>Data</th>
			<th>Descricao</th>
		</tr>
<?php
		if(!$movimentacoes){
			echo "Você não possui movimentações registradas neste mês";
		} else {
			foreach ($movimentacoes as $mov){
				$tipo = $mov['tipo'] == 1 ? "receita" : "despesa";
				$valor = $mov['valor'];
				//TODO(Rael):Buscar o nome da categoria, e nao simplesmente o id
				$categoria = $mov['categoria'];
				$data = $mov['data'];
				$descricao = $mov['descricao'];
				include "movimentacao.php";
				//echo("<tr class=$tipo> <td>$valor</td><td>$categoria</td><td>$data</td><td>$descricao</td> </tr>");
			}
		}
?>
	</table>
	<a href="formularioRegistrar.php">Registrar movimentação</a><br>
	<a href="alterar.php">Alterar movimentação</a><br>
	<a href="formularioExcluir.php">Excluir movimentação</a><br>
<!--TODO(Rael): fazer um logout de verdade quando tivermos sessoes-->
	Logout<br>	
</body>
</html>

