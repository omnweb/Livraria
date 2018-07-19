<?php
	class livroControle
	{
		
		function ListarTodos()
		{
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/livroservico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$retorno = $cli->buscarTodosLivros();
			require_once "visao/listarLivros.php";
		}
		function autor()
		{
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/autorServico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$retorno = $cli->buscarTodosAutores();
			require_once "visao/livroAutor.php";
			if($_POST)
			{
				$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/livroservico.class.php","uri"=>"http://localhost");
				$cli = new soapClient(null, $opcao);
				$retorno = $cli->buscarLivrosPorAutor($_POST["autor"]);
				//var_dump($retorno);
				require_once "visao/listarLivros.php";
			}
			
		}//método
		function inserir()
		{
			//buscar todos generos
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/generoservico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$genero = $cli->buscarTodosGeneros();
			//buscar todas Editoras
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/editoraservico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$editora = $cli->buscarTodasEditoras();
			//buscar todos autores
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/autorservico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$autor = $cli->buscarTodosAutores();
			require_once "visao/CadastroLivro.php";
			if($_POST)
			{
				$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/livroservico.class.php","uri"=>"http://localhost");
				$cli = new soapClient(null, $opcao);
				$autor = $cli->inserir($_POST["titulo"], $_POST["autor"], $_POST["genero"], $_POST["editora"]);
			}
		}
		
		function listarLivro()
		{
			$opcao = array("location"=>"http://localhost/livraria_nuSoap/servicos/editoraservico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$retorno = $cli->buscarTodasEditoras();			
			require_once "visao/livroEditora.php";
			if($_POST)
			{
			require_once"lib/nusoap.php";
			$client = new nusoap_client("https://localhost/livraria_nuSoap/servicos/livroServicoNuSoap.class.php?wsdl");
			$parametro = array("editora"=>$_POST["editora"]);
			$retorno = $client->call("livroServicoNuSoap.buscarLivrosPorEditora", $parametro);
			$retorno = json_decode($retorno);	
			require_once "visao/listarLivros.php";
			}
		}
		
		function listarLivrosRest()
		{
			$url = "http://localhost/livraria_nuSoap/servicos/livroServicoRest.class.php?acao=buscarTodosLivros";
			$retorno = file_get_contents($url);	
			$retorno = json_decode($retorno);
			require_once "visao/listarLivros.php";
		}
		
	}//class
?>