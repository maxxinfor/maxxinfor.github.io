<?php

$nome = $_POST['nome'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$vencimento = $_POST['vencimento'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$contrato = $_POST['contrato'];


$to = "contato@maxxinfor.com.br";
$subject = "CONTRATAR PLANO DE 3 MEGAS";
$menssagem = "<strong>Plano:</strong> 3 MEGAS<br /><br />
              <strong>Nome:</strong> $nome<br /><br />
              <strong>Celular:</strong> $celular<br /><br />
              <strong>CPF/CNPJ:</strong> $cpf<br /><br />
              <strong>RG:</strong> $rg<br /><br />
              <strong>Data de Nascimento:</strong> $nascimento<br /><br />
              <strong>CEP:</strong> $cep<br /><br />
              <strong>Endereço:</strong> $endereco<br /><br />
              <strong>Número:</strong> $numero<br /><br />
              <strong>Complemento:</strong> $complemento<br /><br />
              <strong>Bairro:</strong> $bairro<br /><br />
              <strong>Cidade:</strong> $cidade<br /><br />
              <strong>Data de Vencimento do plano:</strong> $vencimento<br /><br />
              <strong>Sugestão de Login para acesso:</strong> $login<br /><br />
              <strong>Sugestão de Senha para acesso:</strong> $senha";

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
