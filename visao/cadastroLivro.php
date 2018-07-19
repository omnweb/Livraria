<! doctype html>
<html>
	<head>
		<title>Cadastro de Livros</title>
	</head>
	<body>
		<form action="#" method="POST">
			<p>
				<label>Título</label>
				<input type="text" name="titulo" />
			</p>
			<p>
				<label>Gênero:</label>
				<select name="genero">
				<?php
					foreach($genero as $dado)
					{
						echo "<option value = '{$dado->idgenero}'>{$dado->descricao}</option>";
					}
				?>
				</select>
			</p>
			<p>
				<label>Editora:</label>
				<select name="editora">
				<?php
					foreach($editora as $dado)
					{
						echo "<option value = '{$dado->ideditora}'>{$dado->nome}</option>";
					}
				?>
				</select>
			</p>
			<fieldset>
				<legend>Autores</legend>
				<?php
					foreach($autor as $dado)
					{
						echo "<p><input type='checkbox' name='autor[]' 
						value ='{$dado->idautor}' />";
						echo "<label>{$dado->nome}</label></p>";
					}
				?>
			</fieldset>
			<input type="submit" value ="Enviar" />
		</form>
	</body>
</html>