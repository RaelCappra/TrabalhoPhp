 <?php
date_default_timezone_set('America/Sao_Paulo');
include '../lib/crud.php';
$conexao = getConnection();
session_start();
if(!isset($_SESSION['usuario'])) {
	header('location: index.php');
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
	Olá, <?=$_SESSION['usuario']?><br>
	Mês
	<form method="GET">
		<select name="mes" onchange="this.form.submit()">
<?php
			for($mes = 0; $mes < count($meses); $mes++){
				$selected = ($mes == $_GET['mes'] ? "selected" : "");
?>
				<option value=<?=$mes?> <?=$selected?>>
				<?=$meses[$mes]?>
				</option>option> 
<?php
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
			<th>Efetivada</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>
<?php
		if(!$movimentacoes or empty($movimentacoes)){
			echo "Você não possui movimentações registradas neste mês";
		} else {
			$total = 0;
			$total_previsto = 0;
			foreach ($movimentacoes as $mov){
				$id = $mov['id'];
				$tipo = $mov['tipo'] == 1 ? "receita" : "despesa";
				$valor = $mov['valor'];
				$categoria = $mov['nome_categoria'];
				$data = $mov['data'];
				$descricao = $mov['descricao'];
				$efetivada = $mov['efetivada'] == 't' ? "Sim" : "Não";
				if($tipo == "receita"){
					$total_previsto += $mov['valor'];
					if($efetivada == "Sim"){
						$total += $mov['valor'];
					}
				} else if ($tipo == "despesa"){
					$total_previsto -= $mov['valor'];
					if($efetivada == "Sim"){
						$total -= $mov['valor'];
					}
				}
				
				include "movimentacao.php";
				//echo("<tr class=$tipo> <td>$valor</td><td>$categoria</td><td>$data</td><td>$descricao</td> </tr>");
			}
		

?>
	<tr>
		<td colspan="3">Total: <?=$total?></td>
		<td colspan="4">Total previsto: <?=$total_previsto?></td>
<?php
		}
?>
	</tr>
	</table>
	<a href="formularioRegistrar.php">Registrar movimentação</a><br>
	<a href='logout.php'>Logout</a><br>	
</body>
</html>

