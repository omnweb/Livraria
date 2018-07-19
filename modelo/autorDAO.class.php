<?php
	class autorDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarAutores()
		{
			$sql = "SELECT * FROM autor";
			
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
		
	}//classe
?>