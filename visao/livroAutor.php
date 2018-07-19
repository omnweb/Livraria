<!doctype html>
<html>
	<head>
		<title>Livraria</title>
	</head>
	<body>
		<form action="#" method="POST">
			<label>Autores:</label>
			<select name="autor">
				<?php
					foreach($retorno as $dado)
					{
echo "<option value='{$dado->idautor}'> {$dado->nome}</option>";
					}
				?>
			</select><br />
			<input type="submit" value ="Enviar" />
		</form>
	</body>
</html>
