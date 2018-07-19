<?php
	require_once "../lib/nusoap.class.php";
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/generoDAO.class.php";
	//servidor
	$server = new nusoap_server();
	//iniciar parametrização WSDL
	
	$server->configureWSDL("generoServico");
	$server->wsdl_>schemaTargetNamespace = "urn:generoServico"; 
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