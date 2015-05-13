<?php
	include '../lib/crud.php';
	session_start();
	$movimentacoes = getListMovimentacao($_SESSION['usuario']);
	echo "<br>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Controle de movimentações</title>
</head>
<body>
	<form method = "POST" action = "excluir.php">
		<table>	
			<?php
				if(!$movimentacoes){
						echo "Você não possui movimentações registradas";
					} else {
						foreach ($movimentacoes as $mov){
							$id = $mov['id'];
							$tipo = $mov['tipo'] ? "receita" : "despesa";
							$valor = $mov['valor'];
							$categoria = $mov['categoria'];
							$data = $mov['data'];
							$descricao = $mov['descricao'];
							echo("<tr class=$tipo> <td>$id</td><td>$valor</td><td>$categoria</td><td>$data</td><td>$descricao</td> </tr>");
						}
					}
			?>
		
		</table>
	
	
	
		Id da movimentação: <select name="movimentacao">
								<?php
			
									foreach ($movimentacoes as $mov){
										$id = $mov['id'];
										echo(
										"<option value=".$id.">".$id.			
										"</option>"
										);
									} 
								?>
							</select>
		<br>
		<input type="submit" value="Excluir">
	</form>

</body>
</html>