<?php
	class genero
	{
		private $idgenero;
		private $descricao;
		
		
		function  __construct($id=null, $descricao=null)
		{
			$this->idgenero = $id;
			$this->descricao = $descricao;
			
		}
		function getId()
		{
			return $this->idgenero;
		}
		
		function getDescricao()
		{
			return $this->descricao;
		}
	}
?>