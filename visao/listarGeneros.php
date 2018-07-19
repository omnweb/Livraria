<!doctype html>
<html>
	<head>
		<title>Livraria</title>
	</head>
	<body>
		<table border="1">
			<th>Gênero</th>
	<?php
			foreach($retorno as $dado)
			{
				echo "<tr>";
				echo "<td>{$dado->descricao}</td>";
				echo "</tr>";
			}
	?>
	</table>
</body>
</html>