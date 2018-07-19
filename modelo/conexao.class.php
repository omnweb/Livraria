<?php
	/**
	 * Aчѕes de banco de dados (acesso, validaчуo, etc.)
	 * @autor Original: Janson Lengstorf
	 * @livro:Pro PHP e jQuery
	 * @arquivo modificado
	*/
	abstract class conexao {
		protected $db;
		
		protected function __construct()
		{
			$par="mysql:host=localhost;dbname=livraria;charset=utf8mb4";
			try
			{
				$this->db = new PDO($par, "root", "");
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}//mщtodo construtor
	}//classe
?>