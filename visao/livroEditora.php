<!doctype html>
<html>
	<head>
		<title>Livraria</title>
	</head>
	<body>
		<form action="#" method="POST">
			<label>Editoras:</label>
			<select name="editora">
				<?php
					foreach($retorno as $dado)
					{
						echo "<option value='{$dado->ideditora}'> {$dado->nome}</option>";
					}
				?>
			</select><br />
			<input type="submit" value ="Enviar" />
		</form>
	</body>
</html>
