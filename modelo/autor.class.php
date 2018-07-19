<?php
	class autor
	{
		private $idautor;
		private $nome;
		private $nacionalidade;
		
		function  __construct($id=null, $nome=null, $nacio=null)
		{
			$this->idautor = $id;
			$this->nome = $nome;
			$this->nacionalidade = $nacio;
		}
		function getId()
		{
			return $this->idautor;
		}
	}
?>