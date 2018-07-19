<?php
	class generoControle
	{
		function listarGenero()
		{
			require_once"lib/nusoap.php";
			$client = new nusoap_client("https://localhost/livraria_nuSoap/servicos/generoServicoNuSoap.class.php?wsdl");
			$retorno = $client->call("generoServicoNuSoap.buscarTodosGeneros");
			$retorno = json_decode($retorno);
			//require_once"listarGeneros";
			
			echo"<pre>";
				var_dump($retorno);
			echo"</pre>";
		}	
		
		function inserirGenero()
		{
			require_once "visao/cadastroGenero.php";
			
			if($_POST)
			{
				$genero = $_POST['genero'];
				$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/generoServico.class.php","uri"=>"http://localhost");
				$cli = new SoapClient(null, $opcao);
				$cli->inserir($genero);
			}
		}
		function inserirRest()
		{
			require_once "visao/cadastroGenero.php";
			if($_POST)
			{	
				$desc = urlencode($_POST["genero"]);
				$url = "http://localhost/livraria_nuSoap/servicos/generoServicoRest.class.php?acao=inserir&desc=$desc";
				file_get_contents($url);
			}
		}
	}
?>