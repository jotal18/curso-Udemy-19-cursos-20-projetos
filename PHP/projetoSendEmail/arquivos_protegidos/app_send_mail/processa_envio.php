<?php 

	require "./bibliotecas/PHPMailer/Exception.php";
	require "./bibliotecas/PHPMailer/OAuth.php";
	require "./bibliotecas/PHPMailer/PHPMailer.php";
	require "./bibliotecas/PHPMailer/POP3.php";
	require "./bibliotecas/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	

	class Mensagem {
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		public $status = array('codigo_status' => null, 'descricao_status' => '');

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function mensagemValida() {
			if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
				return false;
			}

			return true;
		}
	}

	$mensagem = new Mensagem(); //instancia a classe
	$mensagem->__set('para', $_POST['para']); //pega os dados do formulário
	$mensagem->__set('assunto', $_POST['assunto']); //pega os dados do formulário
	$mensagem->__set('mensagem', $_POST['mensagem']); //pega os dados do formulário

	if (!$mensagem->mensagemValida()) { //se algum dos campos estiverem vazios então exibe a mensagem
		echo 'Mensagem não é Válida';
		// die(); //mata o encerramento do script;
		header('Location: index.php');
	}

	// Caso todos os campos tenham sido preenchidos, então envia o e-mail
	$mail = new PHPMailer(true);

	try {
	    //Configurações do servidor
	    $mail->CharSet = 'UTF-8';							  //Define a codifição dos caracteres
	    $mail->SMTPDebug = false;                             // colocar false para não visualizar debug
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  					  // O servidor smtp
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'email aqui';            // O email que receberá os emails do form
	    $mail->Password = 'senha aqui';                           // A senha do seu email
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP porta
	    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

	    //Remetente e Destinatários
	    $mail->setFrom('email@gmail.com', 'Remetente');		// Remetente
	    $mail->addAddress($mensagem->__get('para'), 'Destinatário');  // Destinatário
	    // $mail->addAddress('ellen@example.com');            // Destinatário opcional
	    // $mail->addReplyTo('info@example.com', 'Information');  //Destinatário de resposta para email de terceiro opcional
	    // $mail->addCC('cc@example.com');						  // Destinatário com cópia opcional	
	    // $mail->addBCC('bcc@example.com');                  // Destinatário com cópia oculta opcional

	    //Anexos
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Adicionar anexos opcional
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Adicionar anexos opcional

	    //Conteúdo do email
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $mensagem->__get('assunto');				 //Assunto do email
	    $mail->Body    = $mensagem->__get('mensagem'); //corpo do email com tag HTML
	    $mail->AltBody = 'É necessário usar um client que suporte HTML.'; //corpo do email sem tag HTML

	    $mail->send();

	    $mensagem->status['codigo_status'] = 1;
	    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso'; //mensagem de sucesso no envio

	} catch (Exception $e) {
		$mensagem->status['codigo_status'] = 2;
	    $mensagem->status['descricao_status'] = 'Nao foi possível enviar este e-email! Por favor tente novamente mais tarde. Detahes do erro: ' . $mail->ErrorInfo; 
	}

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<title>App Mail Send</title>
	 	<meta charset="utf-8">
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 </head>
	 <body>
	 	<div class="container">

	 		<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

			<div class="row">
				<div class="col-md-12">	

					<?php if ($mensagem->status['codigo_status'] == 1) { ?>

						<div class="container">
							<h1 class="display-4 text-success">Sucesso</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
						
					<?php }  ?>

					<?php if ($mensagem->status['codigo_status'] == 2) { ?>

						<div class="container">
							<h1 class="display-4 text-danger">Ops!</h1>
							<p><?= $mensagem->status['descricao_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
						
					<?php }  ?>
					
				</div>
			</div>

	 	</div>
	 </body>
 </html>
