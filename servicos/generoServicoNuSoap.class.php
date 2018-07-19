<?php
	require_once "../lib/nusoap.php";
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/generoDAO.class.php";
	//servidor
	$server = new nusoap_server();
	//iniciar parametrização WSDL
	
	$server->configureWSDL("generoServico");
	$server->wsdl->schemaTargetNamespace = "urn:generoServico"; 
	class generoServicoNuSoap
	{
		function buscarTodosGeneros()
		{
			$generoDAO = new generoDAO();
			$ret = $generoDAO->buscarGeneros();
			return json_encode($ret);
		}
		
	}	
	
	// registra operação
	
	$server->register("generoServicoNuSoap.buscarTodosGeneros", 
	array(), 
	array("retorno"=>"xsd:string"), "urn:generoServico", //namespace, 
	"urn:generoServico#buscarTodosGeneros",//soapaction
	"rpc", //style
	"encode",
	"Busca Todos os Generos do banco de dados"); //Descrição
	
	//pega a requisição
	$chamada =file_get_contents("php://input");
	
	//executa a operação requisitada
	$server->service($chamada);
?>