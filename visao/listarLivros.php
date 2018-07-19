<!doctype html>
<html>
	<head>
		<title>Livraria</title>
	</head>
	<body>
		<table border="1">
			<th>Título</th>
	<?php
			foreach($retorno as $dado)
			{
				echo "<tr>";
				echo "<td>{$dado->titulo}</td>";
				echo "</tr>";
			}
	?>
	</table>
</body>
</html>