<?php

    $data_reclamacao=$_POST["data_reclamacao"];
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $data_incidente=$_POST["data_incidente"];
    $local=$_POST["local"];
    $reclamacao=$_POST["reclamacao"];
    $resultado=$_POST["resultado"];

    $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>Telefone:</b> '.$data_incidente.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Deseja receber novidades:</b> '. $local.'<br>';
    $mensagem.='<b>Data de envio:</b> '.$data_reclamacao.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$reclamacao;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '/xampp/htdocs/HTML-Forms/phpmailer/phpmailer/src/Exception.php';
    require '/xampp/htdocs/HTML-Forms/phpmailer/phpmailer/src/PHPMailer.php';
    require '/xampp/htdocs/HTML-Forms/phpmailer/phpmailer/src/SMTP.php';
    require '/xampp/htdocs/HTML-Forms/vendor/autoload.php';

    // Instância da classe
    $mail = new PHPMailer(true);
    try
    {
        // Configurações do servidor

        $mail->isSMTP();        //Define o uso de SMTP no envio

        $mail->SMTPAuth = true; //Habilita a autenticação SMTP

        $mail->Username   = 'contato@gpcabling.com.br';

        $mail->Password   = '*Copopp67';

        // Criptografia do envio SSL também é aceito

        $mail->SMTPSecure = 'tls';

        // Informações específicadas pelo Google

        $mail->Host = 'smtp.office365.com';

        $mail->Port = 587;

        // Define o remetente

        $mail->setFrom('contato@gpcabling.com.br', 'Lucas Vilar');

        // Define o destinatário

        $mail->addAddress('richard@gpcabling.com.br', 'Richard Quintana');

        // Conteúdo da mensagem

        $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML

        $mail->Subject = 'Teste formulário';

        $mail->Body = $mensagem;

        $mail->AltBody = $mensagem;

        // Enviar

        $mail->send();
        echo 'A mensagem foi enviada!';
    }
    catch (Exception $e)
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>