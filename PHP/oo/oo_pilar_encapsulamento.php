<?php 
	
	class Pai {

		private $nome = 'Jorge';
		protected $sobrenome = 'Silva';
		public $humor = 'Feliz';

		/*
		public function getSobrenome() {
			return $this->sobrenome;
		}

		public function setSobrenome($value) {
			
			if (strlen($value) > 3) {
				$this->sobrenome = $value;
			}

		}
		*/

		
		public function __set($atributo, $value) {
			$this->$atributo = $value;
		}

		public function __get($atributo) {
			return $this->$atributo;
		}
		

		private function executarMania() {
			echo 'Assobiar';
		}

		protected function responder() {
			echo 'Oi';
		}

		public function executarAcao() {
			$x = rand(1,10);

			if ($x >= 1 && $x <= 8) {
				$this->executarMania();	
			} else {
				$this->responder();	
			}
		}
	}

	class Filho extends Pai {
		/*
		public function getAtributo($attr) {
			return $this->$attr;
		}

		public function setAtributo($attr, $value) {
			$this->$attr = $value;
		}

		public function __set($atributo, $value) {
			$this->$atributo = $value;
		}

		public function __get($atributo) {
			return $this->$atributo;
		}
		*/

		public function __construct() {
			echo '<pre>';
			print_r(get_class_methods($this));
			echo '</pre>';
		}

		private function executarMania() {
			echo 'Cantar';
		}

		public function x() {
			$this->executarMania();
		}

		protected function responder() {
			echo 'Olá';
		}
	}	


	$filho = new Filho();
	echo '<pre>';
	print_r($filho);
	echo '</pre>';

	echo '<pre>';
	print_r(get_class_methods($filho)); //retorna um array
	echo '</pre>';

	$filho->responder();

	/*echo $filho->__get('nome');
	$filho->__set('nome', 'Jota'); 
	echo '<br />';

	echo '<pre>';
	print_r($filho);
	echo '</pre>';
	echo $filho->__get('nome');
	*/
 ?>