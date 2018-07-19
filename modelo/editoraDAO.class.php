<?php
	class editoraDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarEditoras()
		{
			$sql = "SELECT * FROM editora";
			
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