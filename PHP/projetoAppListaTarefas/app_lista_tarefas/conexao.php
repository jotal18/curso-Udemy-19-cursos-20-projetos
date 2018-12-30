<?php 

	class Conexao {
		private $host = 'localhost'; //servidor
		private $dbname = 'php_com_pdo'; //nome do bando de dados
		private $user = 'root'; //usuário
		private $pass = ''; //senha

		public function conectar() {//método que conecta ao bando de dados

			try {
				
				$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname", //dsn - Data Source Name
				"$this->user", //usuário
				"$this->pass"//senha
				);

				return $conexao; 

			} catch (PDOException $e) { //captura o erro por meio do método getMessage da classe PDOException

				echo '<p>' . $e->getMessage() . '<p>';

			}

		}
	}


 ?>