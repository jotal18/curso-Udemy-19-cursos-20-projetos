<?php 

	try { //bloco com possível chance de apresentar erro

		echo "<h3> try </h3>";
		// $sql = 'Select * from clientes'; 
		// mysql_query($sql); //código que dará erro

		if (!file_exists('require_arquivo.php')) {
			throw new Exception("O arquivo não foi encontrado"); //pode ser usado Error
		}

	} catch (Error $e) { //pega os erros para tratamento ou armazenar em banco de dados

		echo "<h3> catch - Erro </h3>";
		echo '<p style="color:red;">' . $e . '</p>';
		// $e -> os erros ficam armazenados nessa variável

	} catch (Exception $e) {//pode ser usado Error (throw new Error)
		echo "<h3> catch - Exception </h3>";
		echo '<p style="color:red;">' . $e . '</p>';
	}



	/* finally {// continua a execução do script e é opcional

		echo "<h3> finally </h3>";

	}*/

 ?>