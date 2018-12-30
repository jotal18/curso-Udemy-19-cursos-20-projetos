<?php 

	class Carro extends Veiculo {

		public $tetoSolar = true;

		function __construct($placa, $cor) {
			$this->placa = $placa;
			$this->cor = $cor;
		}

		function abrirTetoSolar() {
			echo 'Abrir teto solar';
		}

		function alterarPosicaoVolante() {
			echo 'Altera a posicao volante';
		}
	}

	class Moto extends Veiculo {

		public $contraPesoGuidao = true;

		function __construct($placa, $cor) {
			$this->placa = $placa;
			$this->cor = $cor;
		}

		function empinar() {
			echo 'Empinar';
		}
	}

	class Veiculo {
		public $placa = null;
		public $cor = null;

		function acelerar() {
			echo 'Acelerar';
		}

		function frear() {
			echo 'Frear';
		}
	}

	$carro = new Carro('DEF123', 'azul');
	$moto = new Moto('ABC1122', 'Preto');

	echo "<pre>";
	print_r($carro);
	echo "</pre>";

	echo "<pre>";
	print_r($moto);
	echo "</pre>";

	$carro->abrirTetoSolar();
	echo '<br />';
	$carro->acelerar();
	echo '<br />';
	$carro->frear();
	echo '<hr />';
	$moto->empinar();
	echo '<br />';
	$moto->acelerar();
 ?>