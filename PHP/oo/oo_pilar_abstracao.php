<?php 

	//modelo
	class Funcionario {

		//atributos (características)
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		public $cargo = null;
		public $salario = null;

		//getters setters manuais
		/*
		function setNome($nome) {
			$this->nome = $nome;
		}

		function getNome() {
			return $this->nome;
		}

		function setTelefone($telefone) {
			$this->telefone = $telefone;
		}

		function getTelefone() {
			return $this->telefone;
		}

		function setNumFilhos($numFilhos) {
			$this->numFilhos = $numFilhos;
		}

		function getNumFilhos() {
			return $this->numFilhos;
		}
		*/

		//getters e setters com métodos mágicos (overloading / sobrecarga)
		function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		function __get($atributo) {
			return $this->$atributo;
		}

		////métodos(funcões)
		function resumirCadFunc() {
			return $this->__get('nome') . ' possui ' . $this->__get('numFilhos') . 'filho(s).';
		}

		function modificarNumFilhos($numFilhos) {
			//afetar um atributo do objeto
			$this->numFilhos = $numFilhos;
		}
	}

	// instanciar objeto
	$y = new Funcionario();
	// $y->setNome('José');
	$y->__set('nome', 'José');
	$y->__set('numFilhos', 5);
	echo $y->resumirCadFunc();
	// echo $y->__get('nome') . ' possui ' . $y->__get('numFilhos') . ' filhos.';
	
	echo "<hr />";

	$x = new Funcionario();
	$x->__set('nome', 'Maria');
	$x->__set('numFilhos', 1);
	echo $x->resumirCadFunc();
	// echo $x->__get('nome') . ' possui ' . $x->__get('numFilhos') . ' filhos.';

 ?>