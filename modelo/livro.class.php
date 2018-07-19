<?php
	class livro
	{
		private $idlivro;
		private $titulo;
		private $genero;
		private $editora;
		private $autor;
		
		function __construct($id=null, $titulo=null, $genero=null, $editora=null, $autor=null)
		{
			$this->idlivro = $id;
			$this->titulo = $titulo;
			$this->genero = $genero;
			$this->editora = $editora;
			$this->autor[] = $autor;
		}
		function getAutor()
		{
			return $this->autor;
		}
		function setAutor($autor)
		{
			$this->autor[] = $autor;
		}
		function getTitulo()
		{
			return $this->titulo;
		}
		function getGenero()
		{
			return $this->genero;
		}
		function getEditora()
		{
			return $this->editora;
		}
		
	}
?>