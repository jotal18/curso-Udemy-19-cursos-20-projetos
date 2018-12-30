<?php 
 
 class Calculadora {

 	public $a = 10;
 	public $b = 7;
 	public $operador;

 	public function calcular($operador) {
 		if ($operador == 'soma') {
 			return $this->a + $this->b;
 		}

 		return false;
 	}
 }

 $calcular = new Calculadora();
 var_dump($calcular->calcular('multi'));


 ?>