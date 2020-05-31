<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("vendor/autoload.php");

define('SMTP_USER', 'bladellano@gmail.com');
define('SMTP_PASS', '@@Caio2019');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);  

class Mail{

	public function send($to, $from, $from_name, $subject, $body) {	 

		$mail = new PHPMailer();
		$mail->IsSMTP();		/*ATIVAR SMTP*/
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
		#$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
		$mail->CharSet = 'UTF-8';		 
		$mail->isHTML(true); 
		$mail->SMTPAuth = true; /*AUTENTICAÇÃO*/		
		/*CREDENCIAIS*/
		$mail->Host = SMTP_HOST;	 
		$mail->Port = SMTP_PORT;  	 
		$mail->Username = SMTP_USER;
		$mail->Password = SMTP_PASS;

		/*VARIÁVEIS DA MENSAGEM, REMETENTE, ASSUNTO, MENSAGEM E DESTINATÁRIO.*/

		$mail->SetFrom($to, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($to);
		$mail->AddReplyTo($from, $from_name);

		if(!$mail->Send()) {
			return ['status' => false, 'message' => 'Mensagem não enviada: '.$mail->ErrorInfo];
		} else {
			return ['status' => true, 'message' => 'Mensagem enviada com sucesso!'];
		}
	}
}


