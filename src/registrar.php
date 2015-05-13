<!DOCTYPE html>
<html>
<head>
	<title>Controle de movimentações</title>
</head>
<body>
	<form method = "POST" action = "home.php">
		Valor: <input type = "text" name = "username" id = "username">
		<br>
		Categoria: <input type = "text" name = "senha" id = "senha">
		<br>
		Tipo: <input type="radio" name="tipo" value="1">Receita  
			  <input type="radio" name="tipo" value="2">Despesa
		<br>
		Data: <input type = "date" name = "senha" id = "senha">
		<br>
		Descrição: <input type = "text" name = "username" id = "username">
		<br>
		
		<input type="submit" value="Logar">
	</form>

</body>
</html>



<?php
	/*
		valor real NOT NULL,
		categoria integer NOT NULL,
		tipo integer NOT NULL,
		data date NOT NULL,
		descricao character varying,
	*/
	
?>