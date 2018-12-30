<?php 
	
	session_start();

	//remover índices do array da sessão
	// unset();
	unset($_SESSION['x']);// remove o índice apenas se existir, não dará erro

	// destruir a variável de sessão
	// session_destroy();
	// forçar um redirecionamento
	session_destroy();
	header('Location: index.php');
	

 ?>