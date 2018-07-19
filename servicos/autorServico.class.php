<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/autorDAO.class.php";
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class autorServico
	{
		function buscarTodosAutores()
		{
			$autorDAO = new autorDAO();
			$ret = $autorDAO->buscarAutores();
			return $ret;
		}
		
	}
	$server->setObject(new autorServico());
	$server->handle();
	//$d = new autorServico();
	//var_dump($d->buscarTodosAutores());
?>