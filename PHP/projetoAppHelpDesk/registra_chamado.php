<?php
	session_start(); 

	//pega as variáveis do formulário 
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);

	//cria o conteúdo a ser inserido no arquivo acima
	$texto = $_SESSION['id'] . '#' . implode('#', str_replace('#', '-', $_POST)) . PHP_EOL;
	// $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
	
	//cria o arquivo
	$arquivo = fopen('arquivos_protegidos/app_help_desk/arquivo.txt', 'a');
	
	//escreve no arquivo
	fwrite($arquivo, $texto);

	//fecha o arquivo
	fclose($arquivo);

	//redireciona para a página de cadastro
	header('Location: abrir_chamado.php');

 ?>