<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/generoDAO.class.php";
	require_once "../modelo/genero.class.php";
	
	class generoServico
	{
		function inserir($genero)
		{
			$generoDAO = new generoDAO();
			$generoDAO->inserir($genero);
		}
	}//class
	if(isset($_GET["acao"]))
	{
		if($_GET["acao"] == "inserir")
		{
			$gen = new genero(null,$_GET["desc"]);
			$class = new generoServico();
			$class->inserir($gen);
		}
		exit();
	}

?>