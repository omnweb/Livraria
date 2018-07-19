<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/editoraDAO.class.php";
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class editoraServico
	{
		function buscarTodasEditoras()
		{
			$editoraDAO = new editoraDAO();
			$ret = $editoraDAO->buscarEditoras();
			return $ret;
		}
		
	}
	$server->setObject(new editoraServico());
	$server->handle();
	//$d = new autorServico();
	//var_dump($d->buscarTodosAutores());
?>