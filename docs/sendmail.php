<?php

use function Composer\Autoload\includeFile;

$nome=$_POST["name"];
$email=$_POST["email"];
$assunto=$_POST["assunto"];
$message=$_POST["message"];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Substituindo as informações que foram coletada no fomulario para html que será disparado por email. 

$htmlContent = file_get_contents("corpomail.html");
$htmlContent = preg_replace('[{{nome}}]', $nome, $htmlContent);
$htmlContent = preg_replace('[{{email}}]', $email, $htmlContent);
$htmlContent = preg_replace('[{{assunto}}]', $assunto, $htmlContent);
$htmlContent = preg_replace('[{{message}}]', $message, $htmlContent);
$htmlContent = preg_replace('[{{data_envio}}]', $data_envio, $htmlContent);
$htmlContent = preg_replace('[{{hora_envio}}]', $hora_envio, $htmlContent);

// Instância da classe

require '\xampp\htdocs\Formulario\vendor\autoload.php';

$mailer = new PHPMailer\PHPMailer\PHPMailer();

// Configurações do servidor

    $mailer->isSMTP();        //Define o uso de SMTP no envio

    $mailer->SMTPAuth     = true; //Habilita a autenticação SMTP

    $mailer->Username     = 'email do email que sera usado';

    $mailer->Password     = 'senha do email que sera usado';

    // Criptografia do envio SSL também é aceito

    $mailer->SMTPSecure = 'tls';

    // Informações específicadas pelo office365

    $mailer->Host = 'smtp.office365.com';

    $mailer->Port = 587;

    // Define o remetente

    $mailer->setFrom('contato@gpcabling.com.br', 'TI GPCabling');

    // Define o destinatário

    //$mailer->addAddress('richard@gpcabling.com.br', 'Richard');

    // Conteúdo da mensagem

    $mailer->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO

    $mailer->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML

    $mailer->Subject   = ('Formulário de Reclamação');

    $mailer->Debugoutput = 'html';

    $mailer->SMTPDebug   = 1;

    $mailer->Body        = $htmlContent;

    $mailer->setLanguage('pt-BR');

    // Redirecionando usuario para page de obrigado.

    //header("Location: http://localhost:8080/");

    // Enviar

    if(!$mailer->Send()) {
        echo "Erro ao enviar o E-Mail";
    }else{
        echo "E-Mail enviado com sucesso!";
    }
?>
