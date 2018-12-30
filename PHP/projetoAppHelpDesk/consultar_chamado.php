<?php 
  //incluir o script de validação de login
  require_once("validador_acesso.php");

  //chamados
  $chamados = [];

  //abrir o arquivo.txt
  $arquivo = fopen('arquivos_protegidos/app_help_desk/arquivo.txt', 'r');

  //enquanto houver registro (linhas) a serem recuperados faça
  while (!feof($arquivo)) { //verifica o fim do arquivo, o ! é para não retornar false, ou seja, enquanto não chegar ao fim do arquivo
    
    $registro = fgets($arquivo); //pega cada registro do arquivo até o fim de linha
  
    $registro_detalhado = explode('#', $registro); //transforma a linha em array

   if ($_SESSION['perfil_id'] == 2) {//se o usuário é nível de usuário comum
      
      if ($_SESSION['id'] != $registro_detalhado[0]) {//se o id do registro é diferente do id do usuário logado 
        
        continue; // então ignora esse registro

      } else { // caso contrário pega o registro e inclui no array chamados
        $chamados[] = $registro;
      }

    } else { // se o usário é administrador então
      $chamados[] = $registro; //pega o registro e inclui no array chamados
    }

  }

  // print_r($chamados);

  //fechar arquivo aberto
  fclose($arquivo);


?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="logoff.php">SAIR</a></li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php foreach ($chamados as $chamado) {       

                  $chamado_dados = explode('#', $chamado); //transforma cada valor do array $chamados em outro array -> $chamado, com base na string '#'
                  
                  if (count($chamado_dados) < 3) { // se a qtd de valores do array $chamado_dados for < 3, ou seja, se o array for vazio, o script irá pular e começar outro laço, por causa do continue
                    continue;
                  }
              
              ?> 

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                    <p class="card-text"><?= $chamado_dados[3] ?></p>
                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6 mx-auto">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>