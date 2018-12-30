<?php 

	session_start();
	
	//variavel que verifica se a autenticação foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	//perfil dos usuários
	$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

	//usuarios do sistema
	$usuarios_app = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2)
	);

	//verifica se as variáveis do sistema são iguais as do login, em caso positivo seta a variável de autenticação como true. pega o id do usuário e o perfil (se for 1=administrativo, se for 2=usuário comun)
	foreach ($usuarios_app as $user) {

		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}

	}

	//verifica o valor de $_SESSION['autenticado'] e redireciona a página
	if ($usuario_autenticado) {
		$_SESSION['autenticado'] = 'SIM'; //autentição deu certo
		$_SESSION['id'] = $usuario_id; //id do usuário
		$_SESSION['perfil_id'] = $usuario_perfil_id; //usuário ou administrador
		header('Location: home.php'); //redireciona para a página home.php
	} else {
		$_SESSION['autenticado'] = 'NAO'; //erro na autenticação
		header('Location: index.php?login=erro'); // redireciona para index.php com erro
	}


	
 ?>