$(document).ready(() => {
	
	$('#documentacao').on('click', () => {
		
		/*
		load() -> inclui elementos na página sem refresh (ajax)
		e por padrão faz uma requisição GET
		*/
		$('#pagina').load('documentacao.html')
		
		/*
		//$.get(url, ação)
		$.get('documentacao.html', data => {
			$('#pagina').html(data)
		})
		*/

		/*
		//$.post(url, ação), utilizado em formulários
		$.post('documentacao.html', data => {
			$('#pagina').html(data)
		})
		*/
	})

	$('#suporte').on('click', () => {
		$('#pagina').load('suporte.html')
	})

	// ajax
	$('#competencia').on('change', e => {
		let competencia = $(e.target).val()
		console.log(competencia)
		// $.ajax() -> espera um objeto literal: 
		// type: tipo de requisição (GET, POST...)
		// url: nome do script ou da rota
		// data: os dados que serão passados para o script ou rota
		// dataType: o tipo que espera receber os dados após a requisição
		// success: executa uma ação se o response foi um sucesso
		// erro: ação casa haja erro no response
		$.ajax({

			type: 'GET',
			url: 'app.php',
			data: `competencia=${competencia}`,
			dataType: 'json',
			//x-www-form-urlencoded data: 'competencia=2018-10&x=10&y=20&z=30'
			success: dados => {
				dados.data_inicio, 
				dados.data_fim, 
				$('#numeroVendas').html(dados.numeroVendas), 
				$('#totalVendas').html(dados.totalVendas)
				
			},
			error: erro => {console.log(erro)}
		})		
	})

})