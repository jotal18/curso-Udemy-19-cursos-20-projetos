<?php 

	$funcionario1 = null;
	$funcionario2 = '';
	$funcionario3 = false;

	if (is_null($funcionario1)) {
		echo "Sim, a variável é null.";
	} else {
		echo "Não, a variável não é null.";
	}

	echo "<br/>";

	if (is_null($funcionario2)) {
		echo "Sim, a variável é null.";
	} else {
		echo "Não, a variável não é null.";
	}

	echo "<br/>";

	if (is_null($funcionario3)) {
		echo "Sim, a variável é null.";
	} else {
		echo "Não, a variável não é null.";
	}

	echo "<hr>";

	//-----------------------------------------------------

	if (empty($funcionario1)) {
		echo "Sim, a variável está vazia.";
	} else {
		echo "Não, a variável não está vazia.";
	}

	echo "<br/>";

	if (empty($funcionario2)) {
		echo "Sim, a variável está vazia.";
	} else {
		echo "Não, a variável não está vazia.";
	}

	echo "<br/>";

	if (empty($funcionario3)) {
		echo "Sim, a variável está vazia.";
	} else {
		echo "Não, a variável não está vazia.";
	}

	echo "<hr>";

	//-----------------------------------------------------

	if ($funcionario1) {
		echo "Sim, a variável é false.";
	} else {
		echo "Não, a variável não é false.";
	}

	echo "<br/>";

	if (empty($funcionario2)) {
		echo "Sim, a variável é false.";
	} else {
		echo "Não, a variável não é false.";
	}

	echo "<br/>";

	if (empty($funcionario3)) {
		echo "Sim, a variável é false.";
	} else {
		echo "Não, a variável não é false.";
	}
 ?>