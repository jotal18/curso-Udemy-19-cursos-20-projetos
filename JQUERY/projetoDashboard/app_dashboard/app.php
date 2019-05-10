<?php 

// classe Dashboard
class Dashboard {
	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

// classe de conexão bd
class Conexao {
	private $host =  'localhost';
	private $dbname = 'dashboard';
	private $user = 'root';
	private $pass = '';

	public function conectar() {
		try {
			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname", 
				"$this->user",
				"$this->pass"
			);

			// faz com que a instância do objeto trabalhe com UTF8
			$conexao->exec('set charset set utf8');

			return $conexao;

		} catch (PDOException $e) {
			echo '<p>' . $e->getMessege() .'<p>';
		}
	}
}

//classe model
class Bd {
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard) {
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getNumeroVendas() {
		$query = "
			select 
				count(*) as numero_vendas 
			from 
				tb_vendas 
			where 
				data_venda between :data_inicio and :data_fim";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}

	public function getTotalVendas() {
		$query = "
			select 
				SUM(total) as total_vendas 
			from 
				tb_vendas 
			where 
				data_venda between :data_inicio and :data_fim";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}
} 


// lógica do script (instanciando as classes)

// instanciando os objetos
$dashboard = new Dashboard();
$conexao = new Conexao();

/*código que cria a data inicial e final
que vem do select-frontend (competencia) via ajax */
$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];
// essa função retorna a quantidade de dias de um mês
$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$data_fim = $ano.'-'.$mes.'-'.$dias_do_mes; 
$data_inicio = $ano.'-'.$mes.'-01';

// setando a data inicial e final
$dashboard->__set('data_inicio', $data_inicio);
$dashboard->__set('data_fim', $data_fim);
// setando o número de vendas e o total de vendas 
$bd = new BD($conexao, $dashboard);
$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->getTotalVendas());

/*
transformando os dados no formato JSON
para o json encode retornar um objeto literal ao front-end
é necessário que os atributos da classe sejam public
*/	
echo json_encode($dashboard);
