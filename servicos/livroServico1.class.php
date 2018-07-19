<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/livroDAO.class.php";
	$opcao = array("uri"=>"http://localhost");
	$servidor = new soapServer(null, $opcao);
	class livro
	{
		
		function buscarTodosLivros()
		{
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarTodosLivros();
			return $ret;
		}
	}//class
	$servidor->setObject(new livro());
	$servidor->handle();
	/*$livro = new livro();
	$ret = $livro->buscarTodosLivros();
	var_dump($ret);*/
?>