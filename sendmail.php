<?php

    $data_reclamacao=$_POST["data_reclamacao"];
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $data_incidente=$_POST["data_incidente"];
    $local=$_POST["local"];
    $reclamacao=$_POST["reclamacao"];
    $resultado=$_POST["resultado"];

    $to = "richard@gpcabling.com.br";
    $subject = "Formulario denuncia";

    // monta o e-mail na variavel $body

    $body = "===================================" . "\n";
    $body = $body . "FALE CONOSCO - TESTE COMPROVATIVO" . "\n";
    $body = $body . "===================================" . "\n\n";
    $body = $body . "Mensagem: " . $data_reclamacao . "\n\n";
    $body = $body . "Mensagem: " . $nome . "\n\n";
    $body = $body . "Mensagem: " . $email . "\n\n";
    $body = $body . "Mensagem: " . $data_incidente . "\n\n";
    $body = $body . "Mensagem: " . $local . "\n\n";
    $body = $body . "Mensagem: " . $reclamacao . "\n\n";
    $body = $body . "Mensagem: " . $resultado . "\n\n";
    $body = $body . "===================================" . "\n";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: contato@gpcabling.com.br' . "\r\n";

    // envia o email

    //mail($to,$subject,$body,$headers);


    ini_set("smtp_port", "587");
    ini_set("SMTP", "smtp.office365.com");
   if(mail($to,$subject,$body,$headers))

    {
        echo "Mail Send Sucuceed";

    }

    else{

        echo "Mail Send Failed";    
    }

    // redireciona para a página de obrigado

    //header("location:http://localhost:8080/formlario.html");

?>