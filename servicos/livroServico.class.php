<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/livroDAO.class.php";
	require_once "../modelo/livro.class.php";
	require_once "../modelo/autor.class.php";
	require_once "../modelo/genero.class.php";
	require_once "../modelo/editora.class.php";
	
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class livroServico
	{
		function buscarTodosLivros()
		{
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarLivros();
			return $ret;
		}
		function buscarLivrosPorEditora($editora)
		{
			
			$editora1 = new editora($editora);
			$livro = new livro(null, null, null, $editora1, null);
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarLivrosEditora($livro);
			return $ret;
		}
		function buscarLivrosPorAutor($autor)
		{
			
			$autor1 = new autor($autor);
			$livro = new livro(null, null, null, null, $autor1);
			$livroDAO = new livroDAO();
			$ret = $livroDAO->buscarLivrosAutor($livro);
			return $ret;
		}
		function inserir($titulo, $autores, $genero, $editora)
		{
			$gen = new genero($genero);
			$edit = new editora($editora);
			$autor = new autor($autores[0]);
			$livro = new livro(null, $titulo, $gen, $edit, $autor);
			if(count($autores) > 1)
			{
				for($x = 1; $x < count($autores); $x++)
				{
					$autor = new autor($autores[$x]);
					$livro->setAutor($autor);
				}//for
			}//if
			$livroDAO = new livroDAO();
			$livroDAO->inserir($livro);
		}//operação
	}//class
	$server->setObject(new livroServico());
	$server->handle();
	//$d = new livroServico();
	//$autor = array(1,2);
	//$d->inserir( "xxxx", $autor, 1, 1);
	
	
?>