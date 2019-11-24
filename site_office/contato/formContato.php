<?php
echo'oi';

header('Content-Type: text/html; charset=utf-8');

//include("../../model/conexao/conecta.php"); //incluir arquivo com conexão ao banco de dados

require_once("../../phpmailer/class.phpmailer.php");
require_once("../../phpmailer/class.smtp.php");

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 0;
$mailer->Port = 587; //Indica a porta de conexão 
$mailer->SMTPSecure = 'tls';
$mailer->Host = 'smtp.gmail.com';
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->Username = 'contato@officejr.com.br'; //Login de autenticação do SMTP
$mailer->Password = 'office8899'; //Senha de autenticação do SMTP
$mailer->FromName = 'Office Jr. Consultoria)'; //Nome que será exibido
$mailer->From = 'contato@officejr.com.br'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress($email,$nome);
//Destinatários
$mailer->Subject = 'Envio de formulário site Office Jr. Consultoria';
$mailer->Body = 'Novo envio de formulário através do site Office Jr. Consultoria
                Nome:' . $nome . ',
                Email: ' .$email.' 
                Telefone: ' .$telefone. '
                Mensagem: ' .$mensagem.'
				
Equipe Office Jr. Consultoria';

if(!$mailer->Send()){
    echo "Mailer Error: " . $mailer->ErrorInfo;
}
?>
