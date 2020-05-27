<?php

$nome = $_POST['nome'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$texto = $_POST['mensagem'];


$to = "contato@maxxinfor.com.br";
$subject = "Fale Conosco";
$menssagem = "<strong>Nome:</strong> $nome<br /><br />
              <strong>Celular:</strong> $celular<br /><br />
              <strong>E-mail:</strong> $email<br /><br />
              <strong>Assunto:</strong> $assunto<br /><br />
              <strong>Mensagem:</strong> $texto";

$header = "MIME-Version: 1.0\n";
$header .= "Content-type: text/html; charset=iso-8859-1\n";
$header .= "From: $email\n";
mail($to,$subject,$menssagem,$header);


$resposta  = "<p>Sua mensagem foi recebida!</p>";

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: $to\n";

$envia =  mail($email,"Sua mensagem foi recebida!",$resposta,$headers);

?>
