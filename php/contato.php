<?php

$setorResponsavel = $_POST['cont_setor'];
if ($setorResponsavel == 1) {
    $emailsender = 'comercial@linkfortaleza.com.br';
    $emaildestinatario = 'comercial@linkfortaleza.com.br';
} 
if ($setorResponsavel == 2) {
    $emailsender = 'suporte@linkfortaleza.com.br';
    $emaildestinatario = 'suporte@linkfortaleza.com.br';
}
if ($setorResponsavel == 3) {
    $emailsender = 'rh@linkfortaleza.com.br';
    $emaildestinatario = 'rh@linkfortaleza.com.br';
}
if ($setorResponsavel == 4) {
    $emailsender = 'financeiro@linkfortaleza.com.br';
    $emaildestinatario = 'financeiro@linkfortaleza.com.br';
}

/* Verifica qual È o sistema operacional do servidor para ajustar o cabeÁalho de forma correta. N„o alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
//else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
// Passando os dados obtidos pelo formul·rio para as vari·veis abaixo
$nomeContato       = $_POST['cont_nome'];
$email             = $_POST['cont_email'];
$telefoneContato   = $_POST['cont_telefone'];
$mensagem          = $_POST['cont_mensagem'];
$emailremetente    = trim($_POST['ceco_email']);
$comcopia          = trim($_POST['comcopia']);
$comcopiaoculta    = trim($_POST['comcopiaoculta']);

 
/* Montando a mensagem a ser enviada no corpo do e-mail. */

$mensagemHTML = "Mensagem enviada do site link telecom";
$mensagemHTML .= "Nome: $nomeremetente \n";
$mensagemHTML .= "Telefone para contato: $telefoneContato \n";
$mensagemHTML .= "Email: $email \n";
$mensagemHTML .= "Mensagem eviada: $mensagem \n";

if (isset($_POST['contato_whats']) && $_POST['contato_whats'] == 'on') {
    $mensagemHTML .= "O cliente deseja ser contactado através do Whatsapp.";
}

/* Montando o cabeÁalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
// Perceba que a linha acima contÈm "text/html", sem essa linha, a mensagem n„o chegar· formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo s„o porque o Postfix obriga que se um cabeÁalho for especificado, dever· haver um valor.
// Se n„o houver um valor, o item n„o dever· ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente ser· usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
 
//if($envio)
// echo "Mensagem enviada com sucesso";
//else
// echo "A mensagem não pode ser enviada";
 
/* Mostrando na tela as informaÁıes enviadas por e-mail */
header("Location:".$_SERVER["HTTP_REFERER"]);
?>