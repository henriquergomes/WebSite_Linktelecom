<?php
  $dadosDoPresente = $_POST['data'];

  $presente = json_decode($dadosDoPresente, true);

$emailsender = 'marketing@linkfortaleza.com.br';
$emaildestinatario = 'hrg441@gmail.com';

if (PHP_OS == "Linux") $quebra_linha = "\n";
elseif (PHP_OS == "WINNT") $quebra_linha = "\r\n";

$nomeDoador = $_POST[presente.nomeDoador];
$presentes = $_POST[presente.listaPresentes];

$mensagemHTML = "A pessoa de nome $nomeDoador irá dar de presnete os itens: $presentes";


$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
 
header("Location:".$_SERVER["HTTP_REFERER"]);

?>