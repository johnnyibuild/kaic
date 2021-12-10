<?php
$msg = "Nome:\t$usuario\n";
$msg .= "E-mail:\t$email\n";
$msg .= "Telefone:\t$telefone\n";
$msg .= "Imovel:\t$imovel\n";
$msg .= "Mensagem:\t$mensagem\n\n";

$cabecalho = "To: Kaic Administração de Imóveis e Corretagem de Seguros <kaic@kaic.com.br>\r\n";
$cabecalho = "Cc: <contato@lucianavilarinho.com.br>\n\n";

mail("kaic@kaic.com.br", "Contato Site Kaic", $msg , $cabecalho);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body text="#000000" bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="397" height="333" border="0" cellspacing="0" bgcolor="#FFFFFF">
 <tr>
    <td align="center" valign="top"><p>&nbsp;</p>
      <p><font color="#000000" size="2" face="Arial"><strong><font color="#666666">Agradecemos a sua 
        mensagem !</font></strong></font></p>
      <p><font color="#666666" size="2"><strong><font face="Arial">Em breve entraremos 
        em contato.</font></strong></font></p></td>
  </tr>
</table>
</body>
</html>
