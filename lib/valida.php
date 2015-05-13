<?php
	function valida($valor, $categoria){
		return !(!is_numeric($valor) or !is_numeric($categoria));
	}
?>