<?php
	require_once "../lib/nusoap.php";
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/livroDAO.class.php";
	require_once "../modelo/editora.class.php";
	require_once "../modelo/livro.class.php";
	//servidor
	$server = new nusoap_server();
	//iniciar parametrização WSDL
	
	$server->configureWSDL("livroServico");
	$server->wsdl->schemaTargetNamespace = "urn:livroServico"; 
	class livroServicoNuSoap
	{
		function buscarLivrosPorEditora($editora)
		{
			
			$editora1 = new editora($editora);
			$livro = new livro(null, null, null, $editora1, null);
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarLivrosEditora($livro);			
			return json_encode($ret);			
		}
		
	}	
	
	// registra operação
	
	
	$server->register("livroServicoNuSoap.buscarLivrosPorEditora", 
	array("editora"=>"xsd:int"), 
	array("retorno"=>"xsd:string"), "urn:livroServico", //namespace, 
	"urn:livroServico#buscarLivrosPorEditora",//soapaction
	"rpc", //style
	"encode",
	"Busca Todos os livros do banco de dados"); //Descrição
	
	//pega a requisição
	$chamada =file_get_contents("php://input");
	
	//executa a operação requisitada
	$server->service($chamada);
	
?>