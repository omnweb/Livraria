<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/livroDAO.class.php";

	class livroServico
	{
		function buscarTodosLivros()
		{
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarLivros();
			return json_encode($ret);
		}
	}//class
	$class = new livroServico();
	if(isset($_GET["acao"]))
	{
		if($_GET["acao"] == "buscarTodosLivros")
		{
			$retorno = $class->buscarTodosLivros();
		}
		exit($retorno);
	}
?>