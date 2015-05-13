 <?php
// TODO(Lucas): Codigo espaguete incoming
include '../lib/crud.php';
$conexao = getConnection();
$categorias = getListCategoria();
session_start();
$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Controle de movimentações</title>
</head>
<body>
	<form method = "POST" action = "registrar.php">
		Valor: <input type = "text" name = "valor" id = "valor">
		<br>
		Categoria: 
		
		<select name="categoria">
		<?php
			
			foreach($categorias as $categoria){
				
				echo(
				"<option value=".$categoria['id'].">".$categoria['nome']."</option>"
			 	);
			} 
		?>
		</select>
		
		<br>
		Tipo: <input type="radio" name="tipo" value="1">Receita  
			  <input type="radio" name="tipo" value="2">Despesa
		<br>
		Data: <input type = "date" name = "data" id = "data">
		<br>
		Descrição: <input type = "text" name = "descricao" id = "descricao">
		<br>
		
		<input type="submit" value="Adicionar">
	</form>

</body>
</html>