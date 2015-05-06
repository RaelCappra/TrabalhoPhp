<?php 

	include "conexao.php";
	if($conexao = getConnection()){
		echo("Conectado");
	}else{
		echo("Nao foi possivel se conectar ao banco");
	}



	function deleteMovimentacao($id){
		$comando = "delete from movimentacao where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "movimentacao deletada";
			
		}else{
			echo "Erro: Movimentacao nao foi deletado";			
		}

	}

	function alteraMovimentacaoTipo($tipo, $id){
		$comando = "update movimentacao set tipo = '".$tipo."' where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "Tipo alterado";
			
		}else{
			echo "Erro ao alterar o tipo";			
		}
	}

	function alteraMovimentacaoCategoria($categoria, $id){
		$comando = "update movimentacao set categoria = '".$categoria."' where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "Categoria alterada";
			
		}else{
			echo "Erro ao alterar categoria";			
		}
	}

	function alteraMovimentacaoValor($valor, $id){
		$comando = "update movimentacao set valor = '".$valor."' where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "Valor alterado";
			
		}else{
			echo "Erro ao alterar o valor";			
		}
	}

	function alteraMovimentacaoData($data, $id){
		$comando = "update movimentacao set data = '".$data."' where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "Data alterada";
			
		}else{
			echo "Erro ao alterar a data";			
		}
	}

	function alteraMovimentacaoDescricao($descricao, $id){
		$comando = "update movimentacao set descricao = '".$descricao."' where id = ".$id;

		if($resultado = pg_query($conexao, $comando)){
			echo "Descricao alterada";
			
		}else{
			echo "Erro ao alterar a descricao";			
		}
	}

	function insertMovimentacao($valor, $tipo, $categoria, $data, $descricao){
		$sql = "insert into cliente (valor, tipo, categoria, data, descricao) values (".
		"$1, $2, $3, $4, $5)";
		$params = Array($nome, $tipo, $categoria, $data, $descricao);
		$resultado = pg_query_params($conexao, $sql, $params);
		if (!$resultado){
			echo "erro";
		}
	}

	function getListMovimentacao(){
		$sql = "select * from movimentacao";	
		$resultado = pg_query($conexao, $sql);
		return pg_fetch_all($resultado);
	}

	function getIdCategoria($nomeCategoria){
		$sql = "select id from categoria where nome = $nomeCategoria";	
		$resultado = pg_query($conexao, $sql);
		return pg_fetch_all($resultado);

	}

	function getIdTipo($nomeTipo){
		$sql = "select id from tipo where nome = $nomeTipo";	
		$resultado = pg_query($conexao, $sql);
		return pg_fetch_all($resultado);
	}




 ?>