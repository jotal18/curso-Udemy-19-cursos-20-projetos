<?php 

	$dns = 'mysql:host=localhost;dbname=php_com_pdo'; //dns
	$usuario = 'root'; //usuário
	$senha = ''; //senha
	
	try {//bloco com possível erro

		$conexao = new PDO($dns, $usuario, $senha); //conexão com o bando de dados


		$query = //cria a consulta (query)
		"
			INSERT INTO tb_usuarios(nome, email, senha)VALUES('Maria', 'maria@teste.com.br', '123456789')
		";

		//utlizando query()
		$stmt = $conexao->query($query);//excuta a query e retorna um PDOStatemet

		//retornando vários registros
		// $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); //retorna um array associativo com as consultas que podem ser acessadas por meio de índices associativos (nomes da coluna) ou índices numéricos



		// $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC); //retornará array somente com os índices associativos
		// echo $retorno[0]['nome']; //pega um dado da primeira consulta que corresponde à coluna 'nome' do BD, que no caso retornará Jota.
		// $retorno = $stmt->fetchAll(PDO::FETCH_NUM); //retornará array somente com os índices associativos
		// echo $retorno[0][1]; //será o mesmo resultado da consulta acima.
		// $retorno = $stmt->fetchAll(PDO::FETCH_BOTH); //retornará ambos os índices, associativos e numéricos
		// $retorno = $stmt->fetchAll(PDO::FETCH_OBJ); //retornará um array de objetos e para acessar basta seguir o código abaixo
		// echo $retorno[0]->nome;

		//retornar apenas um registro
		// $retorno = $stmt->fetch();
		// echo $retorno[0];

		/*
		echo '<pre>';
		print_r($retorno);
		echo '</pre>';
		*/

		/*
		foreach ($retorno as $key => $value) {
			print_r($value);
			echo '<hr>';
		}
		*/
	
		/*
		foreach ($stmt->fetchAll() as $key => $value) {
			print_r($value);
			echo '<hr>';
		}
		*/	

		/*
		//utlizando exec()
		$query = //consulta ao banco de dados
			'CREATE TABLE tb_usuarios(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nome VARCHAR(50) NOT NULL,
				EMAIL VARCHAR(100) NOT NULL,
				SENHA VARCHAR(32) NOT NULL
			)
		';

		$retorno = $conexao->exec($query); // processa a consulta(query) junto ao banco e retorna o número de linhas modificadas ou removidas
		echo $retorno;

		$query = '

			INSERT INTO tb_usuarios(
				nome, email, senha
			)VALUES (
				"Jota", "jota@teste.com.br", "123456"
			)
		';

		$retorno = $conexao->exec($query);
		echo $retorno;
		*/		


		

	} catch (PDOException $e) { //bloco que pega o erro

		/*echo '<pre>';
		print_r($e);
		echo '</pre>';*/

		echo 'Erro: ' . $e->getcode() . '. Mensagem: ' . $e->getMessage() . ' .';
	}
	

 ?>