<?php
// Criando nossas variáveis para guardar as informações do formulário

$nome=$_POST["nome"];
$email=$_POST["email"];
$data_incidente=$_POST["data_incidente"];
$local=$_POST["local"];
$reclamacao=$_POST["reclamacao"];
$resultado=$_POST["resultado"];

//enviar

// emails para quem será enviado o formulário
$emailenviar = "deposito@gpcabling.com.br";
$destino = $emailenviar;
$assunto = "Teste formulario";

// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: $nome <$email>';
//$headers .= "Bcc: $EmailPadrao\r\n";

    $enviaremail = mail($destino, $assunto, $headers);

  if($enviaremail){

    $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";

    echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
    
    } else {

    $mgm = "ERRO AO ENVIAR E-MAIL!";
    echo "";

  }
?>
