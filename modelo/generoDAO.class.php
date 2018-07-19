<?php
	class generoDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarGeneros()
		{
			$sql = "SELECT * FROM genero";
			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
				$this->db = null;
				return $resultado;
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		
		function inserir($genero)
		{
			$sql = "INSERT INTO genero (descricao) VALUE (?)";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $genero->getDescricao());
				$ret = $stmt->execute();
				
				$this->db = null;
			}//try
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}//método inserir
	}//classe
?>