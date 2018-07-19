<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/generoDAO.class.php";
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class generoServico
	{
		function buscarTodosGeneros()
		{
			$generoDAO = new generoDAO();
			$ret = $generoDAO->buscarGeneros();
			return $ret;
		}
		
	}
	$server->setObject(new generoServico());
	$server->handle();
	//$d = new autorServico();
	//var_dump($d->buscarTodosAutores());
?>