<?php
	class editora
	{
		private $ideditora;
		private $nome;
		
		
		function  __construct($id=null, $nome=null)
		{
			$this->ideditora = $id;
			$this->nome = $nome;
			
		}
		function getId()
		{
			return $this->ideditora;
		}
	}
?>