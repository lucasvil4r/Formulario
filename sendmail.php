<?php

use function Composer\Autoload\includeFile;

$nome=$_POST["nome"];
$email=$_POST["email"];
$data_incidente=$_POST["data_incidente"];
$local=$_POST["local"];
$reclamacao=$_POST["reclamacao"];
$solucao=$_POST["resultado"];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail

// Substituindo as informações que foram coletada no fomulario para html que será disparado por email. 

$htmlContent = file_get_contents("corpomail.html");
$htmlContent = preg_replace('[{{nome}}]', $nome, $htmlContent);
$htmlContent = preg_replace('[{{email}}]', $email, $htmlContent);
$htmlContent = preg_replace('[{{data_incidente}}]', $data_incidente, $htmlContent);
$htmlContent = preg_replace('[{{local}}]', $local, $htmlContent);
$htmlContent = preg_replace('[{{reclamacao}}]', $reclamacao, $htmlContent);
$htmlContent = preg_replace('[{{solucao}}]', $solucao, $htmlContent);
$htmlContent = preg_replace('[{{data_envio}}]', $data_envio, $htmlContent);
$htmlContent = preg_replace('[{{hora_envio}}]', $hora_envio, $htmlContent);


// Instância da classe

require '/xampp/htdocs/HTML-Forms/vendor/autoload.php';

$mailer = new PHPMailer\PHPMailer\PHPMailer();

// Configurações do servidor

    $mailer->isSMTP();        //Define o uso de SMTP no envio

    $mailer->SMTPAuth     = true; //Habilita a autenticação SMTP

    $mailer->Username     = 'contato@gpcabling.com.br';

    $mailer->Password     = '*Copopp67';

    $mailer->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO

    // Criptografia do envio SSL também é aceito

    $mailer->SMTPSecure = 'tls';

    // Informações específicadas pelo Google

    $mailer->Host = 'smtp.office365.com';

    $mailer->Port = 587;

    // Define o remetente

    $mailer->setFrom('contato@gpcabling.com.br', 'TI GPCabling');

    // Define o destinatário

    //$mailer->addAddress('richard@gpcabling.com.br', 'Richard');
    $mailer->addAddress('lucas@gpcabling.com.br', 'Lucas Vilar');

    // Conteúdo da mensagem

    $mailer->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML

    $mailer->Subject   = utf8_decode('Formulário de Reclamação');

    $mailer->Debugoutput = 'html';

    $mailer->SMTPDebug   = 1;

    $mailer->Body        = $htmlContent;

    $mailer->setLanguage('pt');

    // Enviar

    if(!$mailer->Send()) {
        echo "Erro ao enviar o E-Mail";
    }else{
        echo "E-Mail enviado com sucesso!";
    }
    
?>
