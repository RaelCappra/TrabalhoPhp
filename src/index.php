<?php
	if(isset($_SESSION['usuario'])){
		header('location: home.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Controle de movimentações</title>
</head>
<body>
	<form method = "POST" action = "../lib/login.php">
		Login: <input type = "text" name = "username" id = "username">
		<br>
		Senha: <input type = "password" name = "senha" id = "senha">
		<br>
		<input type="submit" value="Logar">
	</form>

</body>
</html>