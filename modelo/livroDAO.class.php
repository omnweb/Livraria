<?php
	class livroDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		function buscarLivrosEditora($livro)
		{			
			$sql = "SELECT titulo FROM livro
					INNER JOIN editora ON (ideditora = editora_ideditora)
					WHERE ideditora =?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $livro->getEditora()->getId());
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
		
		public function buscarLivros()
		{
			$sql = "SELECT * FROM livro";
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
		function buscarLivrosAutor($livro)
		{
			var_dump($livro);
			$sql = "SELECT livro.*, autor.* FROM livro, 
						autor, autorlivro
						WHERE livro_idlivro = idlivro AND
						autor_idautor = idautor AND 
						autor_idautor = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $livro->getAutor()[0]->getId());
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
		function inserir($livro)
		{
			$sql = "INSERT INTO livro (genero_idgenero, editora_ideditora, titulo) VALUE (?, ?, ?)";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $livro->getGenero()->getId());
				$stmt->bindValue(2, $livro->getEditora()->getId());
				$stmt->bindValue(3, $livro->getTitulo());
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao inserir Livro");
				}
				else
				{
					//inserir AutorLivro
					$idlivro = $this->db->lastInsertId();
					$autores = $livro->getAutor();
					var_dump($autores);
					$sql = "INSERT INTO autorlivro(livro_idlivro, autor_idautor) VALUE (?, ?)";
					try
					{
						$stmt = $this->db->prepare($sql);
						foreach($autores as $dado)
						{
						
							$stmt->bindValue(1, $idlivro);
							$stmt->bindValue(2, $dado->getId());
							$retorno = $stmt->execute();
							if(!$retorno)
							{
								die("Erro ao inserir Livro Autor");
							}//if
						}//foreach
					}//segundo try
					catch (PDOException $e)
					{
						die( $e->getMessage());
					}
				}
			}//primeiro try
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		
	}//método inserir
}//classe
?>