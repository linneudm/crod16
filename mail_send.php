<?php
	 
	function pegaValor($valor) {
	    return isset($_POST[$valor]) ? $_POST[$valor] : '';
	}
	 
	function validaEmail($email) {
	    return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	 
	function enviaEmail($de, $assunto, $mensagem, $para, $email_servidor) {
	    $headers = "From: $email_servidor\r\n" .
	               "Reply-To: $de\r\n" .
	               "X-Mailer: PHP/" . phpversion() . "\r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  
	  mail($para, $assunto, $mensagem , $headers);


	}
 

	$email_servidor = "linneu.dm@gmail.com";
	$para = "linneu.dm@gmail.com";
	$de = pegaValor("email");
	$name = pegaValor("name");
	$data = pegaValor("aniv");
	$camisa = pegaValor("camisa");
	$phone = pegaValor("phone");
	$cidcim = pegaValor("cidcim");
	$mensagem = "Nome: " . $name .
				" CID/CIM: " . $cidcim .
				" Data de Nascimento: " . $data .
				" Camisa: " . $camisa .
				" Email: " . $de .
				" Contato: " . $phone;
	$assunto = "Inscrição";


	if ($name && validaEmail($de) && $mensagem) {
    	enviaEmail($de, $assunto, $mensagem, $para, $email_servidor);
    	$pagina = "mail_ok.php";
	} else {
    	$pagina = "mail_error.php";
	}

	header("location:$pagina");
 
?>