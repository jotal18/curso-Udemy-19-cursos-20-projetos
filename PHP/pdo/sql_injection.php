<?php 

	// print_r($_POST);

	// if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {

	$dns = 'mysql:host=localhost;dbname=php_com_pdo'; //dns
	$usuario = 'root'; //usuário
	$senha = ''; //senha
	
	try {//bloco com possível erro

		$conexao = new PDO($dns, $usuario, $senha); //conexão com o bando de dados

		$query = "SELECT * FROM tb_usuarios WHERE ";
		$query .= "email = :usuario ";
		$query .= "AND senha = :senha";

		//utlizando query()
		// $stmt = $conexao->query($query);//excuta a query e retorna um PDOStatemet

		$stmt = $conexao->prepare($query);//prepara a query

		$stmt->bindValue(':usuario', $_POST['usuario']);//evita o sql injection
		$stmt->bindValue(':senha', $_POST['senha']);

		$stmt->execute();//executa a query

		$retorno = $stmt->fetch();//retorna um registro;

		echo '<pre>';
		print_r($retorno);
		echo '</pre>';

	} catch (PDOException $e) { //bloco que pega o erro

		echo 'Erro: ' . $e->getcode() . '. Mensagem: ' . $e->getMessage() . ' .';
	}
// }	

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sql injection</title>
 	<meta charset="utf-8">
 </head>
 <body>
 	<form method="post" action="sql_injection.php">
 		<input type="text" placeholder="usuario" name="usuario">
 		<br />
 		<input type="password" name="senha" placeholder="senha">
 		<br />
 		<button type="submit">Entrar</button>
 	</form>
 </body>
 </html>