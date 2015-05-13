<form method = "POST" action = <?=$action?>>
		Valor: <input type = "text" name = "valor" id = "valor" value=<?=$valor_value?>>
		<br>
		Categoria: 
		
		<select name="categoria">
		<?php
			
			foreach($categorias as $categoria){
		?>
				<option value=<?=$categoria['id']?>><?=$categoria['nome']?></option>
		<?php
			} 
		?>
		</select>
		
		<br>
		Tipo: <input type="radio" name="tipo" value="1" <?=$tipo_1_selected ? 'checked=checked' : ''?>>Receita  
			  <input type="radio" name="tipo" value="2" <?=!$tipo_1_selected ? 'checked=checked' : ''?>>Despesa
		<br>
		Data: <input type = "date" name = "data" id = "data" value=<?=$data_value?>>
		<br>
		Descrição: <input type = "text" name = "descricao" id = "descricao" value=<?=$descricao_value?>>
		<br>
		<?php if(isset($id)){ ?>
		<input type="hidden" name="movimentacao" value=<?=$id?>>
		<?php } ?>
		<input type="submit" value="Submit">

	</form>