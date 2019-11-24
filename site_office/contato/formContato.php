<?php

header('Content-Type: text/html; charset=utf-8');

//include("../../model/conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

require_once("PHPMailer/class.phpmailer.php");
require_once("PHPMailer/class.smtp.php");

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 0;
$mailer->Port = 587; //Indica a porta de conexão 
$mailer->SMTPSecure = 'tls';
$mailer->Host = 'smtp.gmail.com';
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->Username = 'noreply.officejrconsultoria@gmail.com'; //Login de autenticação do SMTP contato@officejr.com.br
$mailer->Password = 'noreplyoffice2019'; //Senha de autenticação do SMTP office8899
$mailer->FromName = 'Office Jr. Consultoria'; //Nome que será exibido
$mailer->From = 'noreply.officejrconsultoria@gmail.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
//Define o destinatário
$mailer->AddAddress("contato@officejr.com.br","Office Jr. Consultoria");


$data = date("d/m/Y");
$hora = date("H:i:s");
$mailer->Subject = 'Envio de formulario de contato site Office Jr. Consultoria';
$mailer->Body = 'Novo envio de formulario de contato atravas do site Office Jr. Consultoria

Dados do envio:
Nome: ' . $_POST["nome"] . '
Email: ' .$_POST["email"].' 
Telefone: ' .$_POST["telefone"]. '

Mensagem: ' .$_POST["msg"].'

Data: ' .$data. '
Hora: ' .$hora. '
				
Formulario de Contato - Office Jr. Consultoria';

if(!$mailer->Send()){
    echo "Erro no envio do email: " . $mailer->ErrorInfo;
} else {
    echo "<script>alert('Obrigada por entrar em contato conosco, responderemos em breve!');</script>";
	echo "<script>window.location = 'javascript:window.history.go(-1)';</script>";
}
?>
