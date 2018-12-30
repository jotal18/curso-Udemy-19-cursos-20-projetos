<?php 

// Error (php)
// Exception (programadores)
// Customizadas (programadores)

class MinhaExceptionCustomizada extends Exception {// cria a classe customizada que será classe-filha da classe-pai nativa do PHP, a Exception
	private $erro = ''; //atributo erro

	public function __construct($erro) {//método construtor que pega o erro no throw new ao instanciar a classe
		$this->erro = $erro; //seta o atributo erro
	}

	public function exibirMensagemCustomizada() {// metodo que exibe o erro que foi pego na classe construtor acima
		echo '<div style="border: 1px solid #000; padding: 15px; background-color: red; color: white;">';
			echo $this->erro;
		echo '</div>';
	}
}

try {

	throw new MinhaExceptionCustomizada ('Erro de teste'); //altera a classe de Exception para a classe customizada, que no caso é MinhaExceptionCustomizada, e pega o erro dentro do ()
} catch (MinhaExceptionCustomizada $e) { //joga o nome da classe customizada e a variável que será o objeto que instanciará a nova classe e automaticamente já seta o atributo pivate erro com o erro de throw new MinhaExceptionCustomizada

	$e->exibirMensagemCustomizada(); //instancia a variável e chama o método de exibir o erro que foi passado em throw new MinhaExceptionCustomizada ('Erro de teste');
}


 ?>