<?php 
	
	$noticia = array(
		array('titulo' => 'Título Notícia 1', 'conteudo' => 'conteudo noticia 1'), 
		array('titulo' => 'Título Notícia 2', 'conteudo' => 'conteudo noticia 2'), 
		array('titulo' => 'Título Notícia 3', 'conteudo' => 'conteudo noticia 3'), 
		array('titulo' => 'Título Notícia 4', 'conteudo' => 'conteudo noticia 4'), 
	);

	// $idx = 0;

	echo "O array possui " . count($noticia) . ' registros. <br />';
	/*while ($idx < count($noticia)) {
				
		echo '<h3>' . $noticia[$idx]['titulo'] . '</h3>';
		echo '<p>' . $noticia[$idx]['conteudo'] . '</p>';
		echo '<hr>';

		$idx++;

	}*/

	/*do {

		echo '<h3>' . $noticia[$idx]['titulo'] . '</h3>';
		echo '<p>' . $noticia[$idx]['conteudo'] . '</p>';
		echo '<hr>';		

		$idx++;
		
	} while ($idx < count($noticia));*/

	for ($idx=0; $idx < count($noticia); $idx++) { 
		echo '<h3>' . $noticia[$idx]['titulo'] . '</h3>';
		echo '<p>' . $noticia[$idx]['conteudo'] . '</p>';
		echo '<hr>';		
	}
 ?>