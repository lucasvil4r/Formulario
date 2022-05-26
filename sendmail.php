<?php

$data_reclamacao=$_POST["data_reclamacao"];
$nome=$_POST["nome"];
$email=$_POST["email"];
$data_incidente=$_POST["data_incidente"];
$local=$_POST["local"];
$reclamacao=$_POST["reclamacao"];
$solucao=$_POST["resultado"];

$mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
$mensagem.='<b>Nome: </b>'.$nome.'<br>';
$mensagem.='<b>E-Mail: </b> '.$email.'<br>';
$mensagem.='<b>Data incidente: </b> '.$data_incidente.'<br>';
$mensagem.='<b>Local do incidente: </b> '. $local.'<br>';
$mensagem.='<b>Reclamação: </b> '.$reclamacao.'<br>';
$mensagem.='<b>Sugestão de solução: </b> '.$solucao.'<br>';

require '/xampp/htdocs/HTML-Forms/vendor/autoload.php';

// Instância da classe

$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configurações do servidor

    $mail->isSMTP();        //Define o uso de SMTP no envio

    $mail->SMTPAuth     = true; //Habilita a autenticação SMTP

    $mail->Username     = 'contato@gpcabling.com.br';

    $mail->Password     = '*Copopp67';

    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO

    // Criptografia do envio SSL também é aceito

    $mail->SMTPSecure = 'tls';

    // Informações específicadas pelo Google

    $mail->Host = 'smtp.office365.com';

    $mail->Port = 587;

    // Define o remetente

    $mail->setFrom('contato@gpcabling.com.br', 'TI GPCabling');

    // Define o destinatário

    $mail->addAddress('richard@gpcabling.com.br', 'Richard');
    $mail->addAddress('lucas@gpcabling.com.br', 'Lucas Vilar');

    // Conteúdo da mensagem

    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML

    $mail->Subject   = utf8_decode('Formulário de Reclamação');

    $mail->Body      = $mensagem;

    $mail->SMTPDebug = 1;

    $mail->Debugoutput = 'html';

    $mail->setLanguage('pt');

    // Enviar

    if(!$mail->Send()) {
        echo "Erro ao enviar o E-Mail";
    }else{
        echo "E-Mail enviado com sucesso!";
    }

?>