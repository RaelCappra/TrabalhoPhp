<?php
session_start();
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
<?php
	if(isset($_SESSION['login_error']) and $_SESSION['login_error'] > 0){
?>
		Erro: nome de usuário ou senha incorretos
<?php
	}
?>
	<form method = "POST" action = "login.php">
		Login: <input type = "text" name = "username" id = "username">
		<br>
		Senha: <input type = "password" name = "senha" id = "senha">
		<br>
		<input type="submit" value="Logar">
	</form>

</body>
</html>