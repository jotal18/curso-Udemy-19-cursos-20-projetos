<?php 

//CRUD
class TarefaService { 
	//atributos que a classe irá precisar
	private $conexao;
	private $tarefa;

	//método mágico que seta automaticamente os atributos passados como parâmetro
	public function __construct(Conexao $conexao, Tarefa $tarefa) { //tipagem de dado colocando a classe antes do parâmetro, ou seja, cada parâmetro só receberá o objeto de sua respectiva classe
		$this->conexao = $conexao->conectar(); //atributo conexao é igual ao método conectar da classe Conexao
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create

		$query = "INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)"; //cria a query
		$stmt = $this->conexao->prepare($query); //prepara a query
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));//evita o sql injection
		$stmt->execute(); //executa a query

	}

	public function recuperar() { //read
		//$query = 'SELECT id, id_status, tarefa FROM tb_tarefas';
		$query = '
			SELECT 
				t.id, s.status, t.tarefa
			FROM 
				tb_tarefas AS t
				LEFT JOIN tb_status AS s ON 
				(s.id = t.id_status);
		'; // select está fazendo left join da tabela tb_tarefas com a tabela tb_status, ou seja, irá mostrat todos os registro da tb_tarefas e os registro de tb_status quando houver ocorrência de associação entre ambas as tabelas

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ); //retornará um array com objeto e para acessar os seus dados, basta usar a sintaxe: $objeto = new NomedaClasse(); $objeto->keyarray;
	}

	public function atualizar() {//update
		$query = "UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id ";
		//$query = "UPDATE tb_tarefas SET tarefa = ? WHERE id = ? "; // a query pode ser montada assim também
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(1, $this->tarefa->__get('tarefa')); // o bindValue pode ser executado passando números que indacam a posição dos ? incluídos na query
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute(); // 1 ou N para a quantidade de registros afetados pela atualização
	}

	public function remover() { //delete
		$query = "DELETE FROM tb_tarefas WHERE id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function marcarRealizada() {
		$query = "UPDATE tb_tarefas SET id_status = :status WHERE id = :id ";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':status', $this->tarefa->__get('id_status'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function recuperarTarefasPendentes() {

		$query = "SELECT 
				t.id, s.status, t.tarefa
			FROM 
				tb_tarefas AS t
				LEFT JOIN tb_status AS s ON (s.id = t.id_status)
			WHERE 
				id_status = :id_status";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}
}


 ?>