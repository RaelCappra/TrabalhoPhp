<?php
$usuario = "foo";
$movimentacoes = Array(
	Array("100", "bar", "foobar", "parrot", 0),
	Array("100", "bar", "foobar", "parrot", 1),
	Array("100", "bar", "foobar", "parrot", 1),
	);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" src="../css/style.css"/>
</head>
<body>
	<table>
	<?php
		foreach ($movimentacoes as $mov){
			$tipo = $mov[4] ? "receita" : "despesa";
			echo("<tr class=$tipo> <td>$mov[0]</td><td>$mov[1]</td><td>$mov[2]</td><td>$mov[3]</td> </tr>");
		}
	?>
	</table>
</body>
</html>

