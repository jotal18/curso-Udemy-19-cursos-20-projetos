<?php 

	require_once "tarefa.model.php"; //inclui a classe Tarefa, que seta as variáveis vindas do formulário
	require_once "tarefa.service.php"; //inclui a classe TarefaService, que executa o CRUD, por meio de suas subclasses: inserir(); recuperar(); atualizar() e remover()
	require_once "conexao.php"; //inclui a classe Conxexao que conecta-se com o Banco de Dados

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if ($acao == 'inserir') { //cadastra as tarefas
		
		$tarefa = new Tarefa(); // cria uma instância de Tarefa
		$tarefa->__set('tarefa', $_POST['tarefa']); //pega os dados do formulário

		$conexao = new Conexao(); //cria uma instância da conexão

		$tarefaService = new TarefaService($conexao, $tarefa); //cria uma instância da classe - CRUD
		$tarefaService->inserir(); //método que insere dados no BD

		header('Location: nova_tarefa.php?inclusao=1'); //redireciona para a página de cadastro informando o sucesso no cadastro, por meio da variável GET inclusão com valor 1

	} else if ($acao == 'recuperar') { //lista todas as tarefas

		$tarefa = new Tarefa(); // cria uma instância de Tarefa

		$conexao = new Conexao(); // cria uma instância de Conexao
		
		$tarefaService = new TarefaService($conexao, $tarefa); //cria uma instância da classe - CRUD
		$tarefas = $tarefaService->recuperar(); //método que listas as tarefas

	}else if ($acao == 'atualizar') { //atualiza as tarefas já cadastradas

		$tarefa = new Tarefa(); // cria uma instância de Tarefa
		// $tarefa->__set('id', $_POST['id']); //pega os dados do formulário por meio de javascript
		// $tarefa->__set('tarefa', $_POST['tarefa']); //pega os dados do formulário por meio de javascript
		// ou
		$tarefa->__set('id', $_POST['id'])
				->__set('tarefa', $_POST['tarefa']); //pode ser utilizado esta maneira de utilizar instância de objeto para atribuir valores ao atributo do objeto

		$conexao = new Conexao(); //cria uma instância da conexão

		$tarefaService = new TarefaService($conexao, $tarefa); //cria uma instância da classe - CRUD
		if ($tarefaService->atualizar()) { //se o método atualizar resultar um ou mais de um, é poque atualizou com sucesso, então deve redirecionar a página que lista todas as tarefas
			
			if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('Location: index.php');
			} else {
				header('Location: todas_tarefas.php'); //redireciona para página que lista todas as tarefas	
			}
			
		}

	}else if ($acao == 'remover') {
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('Location: index.php');
		} else {
			header('Location: todas_tarefas.php'); //redireciona para página que lista todas as tarefas	
		}
		

	}else if ($acao == 'marcarRealizada') {
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])
				->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('Location: index.php');
		} else {
			header('Location: todas_tarefas.php'); //redireciona para página que lista todas as tarefas	
		}

	}else if ($acao == 'recuperarTarefaPendentes') {

		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();


	}
 ?>
