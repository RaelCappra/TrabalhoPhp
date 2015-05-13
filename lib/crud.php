<?php 

	include "conexao.php";
	$conexao = getConnection();
	if($conexao){
		//echo("Conectado");
	}else{
		echo("Nao foi possivel se conectar ao banco");
	}

	function getMovimentacaoById($id){
		$sql = "select movimentacao.* from movimentacao where id = $1";
		global $conexao;
		if($resultado = pg_query_params($conexao, $sql, Array($id))){
			return pg_fetch_array($resultado);
		}else{
			echo "Erro: Movimentacao nao foi deletado";			
			die();
		}

	}

	function deleteMovimentacao($id){
		$comando = "delete from movimentacao where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			echo "movimentacao deletada";
			
		}else{
			echo "Erro: Movimentacao nao foi deletado";			
		}

	}

	function alteraMovimentacaoTipo($tipo, $id){
		$comando = "update movimentacao set tipo = '".$tipo."' where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			
		}else{
			echo "Erro ao alterar o tipo";			
		}
	}

	function alteraMovimentacaoCategoria($categoria, $id){
		$comando = "update movimentacao set categoria = '".$categoria."' where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			
		}else{
			echo "Erro ao alterar categoria";			
		}
	}

	function alteraMovimentacaoValor($valor, $id){
		$comando = "update movimentacao set valor = '".$valor."' where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			
		}else{
			echo "Erro ao alterar o valor";			
		}
	}

	function alteraMovimentacaoData($data, $id){
		$comando = "update movimentacao set data = '".$data."' where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			
		}else{
			echo "Erro ao alterar a data";			
		}
	}

	function alteraMovimentacaoDescricao($descricao, $id){
		$comando = "update movimentacao set descricao = '".$descricao."' where id = ".$id;
		global $conexao;
		if($resultado = pg_query($conexao, $comando)){
			
		}else{
			echo "Erro ao alterar a descricao";			
		}
	}

	function insertMovimentacao($valor, $tipo, $categoria, $data, $descricao, $username){
		$id = getIdUsuario($username);
		$sql = "insert into movimentacao (valor, tipo, categoria, data, descricao, usuario) values (".
		"$1, $2, $3, $4, $5, $6)";
		global $conexao;
		$params = Array($valor, $tipo, $categoria, $data, $descricao, $id[0]['id']);
		$resultado = pg_query_params($conexao, $sql, $params);
		if (!$resultado){
			echo "erro";
		}
	}

	function getListMovimentacao($username){
		$sql = "select movimentacao.*, movimentacao.data < now() as efetivada, ".
		"categoria.nome as nome_categoria from movimentacao " .
		"join categoria on categoria.id = movimentacao.categoria " .
		"join usuario on usuario.id = movimentacao.usuario where usuario.username = $1";	
		global $conexao;
		$resultado = pg_query_params(
			$conexao,
			 $sql, Array($username));
		return pg_fetch_all($resultado);
	}

	function getListMovimentacaoByMes($username, $mes){
		if($mes >= 0 and $mes < 12){
			$sql = "select movimentacao.*, movimentacao.data < now() as efetivada, " .
			"categoria.nome as nome_categoria from movimentacao" .
			" join categoria on categoria.id = movimentacao.categoria" .
			" join usuario on usuario.id = movimentacao.usuario where usuario.username = $1 " .
			"and extract(month from movimentacao.data) - 1 = $2";	
			global $conexao;
			$resultado = pg_query_params(
				$conexao,
				 $sql, Array($username, $mes));
			return pg_fetch_all($resultado);
		} else {
			return getListMovimentacao($username);
		}

		
	}
	
	function getIdUsuario($username){
		$sql = "select id from usuario where username = $1";	
		$params = Array($username);
		global $conexao;
		$resultado = pg_query_params($conexao, $sql, $params);
		return pg_fetch_all($resultado);
	}
	
	
	function getListCategoria(){
		$sql = "select * from categoria";	
		global $conexao;
		$resultado = pg_query(
			$conexao,
			 $sql);
		return pg_fetch_all($resultado);
	}
	
	
	

	function getIdCategoria($nomeCategoria){
		$sql = "select id from categoria where nome = $nomeCategoria";
		global $conexao;	
		$resultado = pg_query($conexao, $sql);
		return pg_fetch_all($resultado);

	}

	function getIdTipo($nomeTipo){
		$sql = "select id from tipo where nome = $nomeTipo";	
		global $conexao;
		$resultado = pg_query($conexao, $sql);
		return pg_fetch_all($resultado);
	}




 ?>