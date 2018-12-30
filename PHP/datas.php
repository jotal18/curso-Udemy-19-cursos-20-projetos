<?php 
	
	//recuperação de data atual / data corrente
	echo date('d/m/Y H:i');

	echo '<br />';

	//Verificar o time zone atual 
	echo date_default_timezone_get();
	
	// Mudar o time zone para o do Brasil
	date_default_timezone_set('America/Sao_Paulo');
	echo '<br />'; 

	//Verifica a data/hora e time zone atuais 
	echo date('d/m/Y H:i');
	echo '<br />';
	echo date_default_timezone_get();
	echo '<br />';

	$data_inicial = '2018-04-24';
	$data_final = '2018-05-15';

	//timestamp
	//01/01/1970

	$time_inicial = strtotime($data_inicial);
	$time_final = strtotime($data_final);
	
	echo $data_inicial . ' ' . $time_inicial;
	echo '<br />';
	echo $data_final . ' ' . $time_final;
	echo '<br />';
	$diferenca = abs($time_inicial - $time_final);
	echo '<br />';
	echo 'A diferença de segundos entre a data inicial e final é ' . $diferenca . '.';

	//Descobrir quantos segundos existem em um dia
	$segundos_existem_dia = 24 * 60 * 60;
	echo '<br />';
	echo 'Um dia possui ' . $segundos_existem_dia . ' segundos.';
	echo '<br />';
	$diferenca_de_dias_entre_as_datas = $diferenca / $segundos_existem_dia;
	echo $diferenca_de_dias_entre_as_datas . ' dias.';
 ?>