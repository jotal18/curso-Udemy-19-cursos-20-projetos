<?php 

	class Exemplo {
		public static $atributo1 = 'Eu sou um atributo estático';
		public $atributo2 = 'Eu sou um atributo normal';

		public static function metodo1() {
			// echo $this->atributo2; //dará erro, pois não se usa $this-> em métodos estáticos
			echo 'Eu sou um método estático';
		}

		public function metodo2() {
			echo 'Eu sou um método normal';
		}
	}

	// $x = new Exemplo();
	// Exemplo::metodo1();

	Exemplo::metodo1();

 ?>