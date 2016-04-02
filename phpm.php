<?php

$name = trim($_POST['name']);
$cidcim = $_POST['cidcim'];
$email = trim($_POST['email']);
$data = $_POST['aniv'];
$camisa = $_POST['camisa'];
$phone = $_POST['phone'];
$message = "Nome: " . nl2br("$name \n") .
				" CID/CIM: " . nl2br("$cidcim \n") .
				" Data de Nascimento: " . nl2br("$data \n") .
				" Camisa: " . nl2br("$camisa \n") .
				" Email: " . nl2br("$email \n").
				" Contato: " . $phone;

date_default_timezone_set('Etc/UTC');

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require 'phpmailer/PHPMailerAutoload.php';
// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP

//$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
//$mail->Password = 'senha'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->From = "crodcentronortepi@gmail.com"; // Seu e-mail
$mail->FromName = "CROD Centro-Norte PI"; // Seu nome
$mail->Username = "crodcentronortepi@gmail.com";
$mail->Password = "senha";
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('crodcentronortepi@gmail.com', 'CROD Centro-Norte PI');
//$mail->AddAddress('ciclano@site.net');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Inscricao de " . $name; // Assunto da mensagem
$mail->Body = $message;
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
// Exibe uma mensagem de resultado
if ($enviado) {
  echo "E-mail enviado com sucesso!";
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}