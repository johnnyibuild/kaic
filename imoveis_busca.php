<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resultado da Busca por Im&oacute;veis</title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 10px}
-->
</style></head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td height="20" align="center" class="formata_titulo">&nbsp;</td>
    <td align="right" class="formata_titulo"><a href="javascript:history.back()"></a></td>
    <td align="right" valign="middle" class="formata_titulo"><a href="javascript:history.back()"><a href="javascript:history.back()"><span class="style1">Fechar </span></a><a href="javascript:window.close()"><img src="imagens/fechar.jpg" width="11" height="12" border="0" /></a></td>
  </tr>
  <tr>
    <td height="20" align="center" bgcolor="#EBE9ED" class="formata_titulo">Im&oacute;vel</td>
    <td width="150" align="center" bgcolor="#EBE9ED" class="formata_titulo">Valor</td>
    <td width="110" align="center" bgcolor="#EBE9ED" class="formata_titulo">Visualizar</td>
  </tr>
  <?
  include("connect.php");
  
  $idtipo = $_POST["idtipo"];
  $idlocal = $_POST["idlocal"];
  $idcategoria = $_POST["idcategoria"];
  $idcomodos = $_POST["idcomodos"];
  
  $sql = "select * from imoveis where flliberado='s' ";
  
  if (! $idtipo == "" || ! $idlocal == "" || ! $idcategoria == "" || ! $idcomodos == "")
  {
	$sql .= "&& idimovel > 0 ";
  }
 
  if (! $idtipo == "")
  {
	$sql .= " && idtipo='$idtipo' ";
  }
  
  if (! $idlocal == "")
  {
	$sql .= " && idlocal='$idlocal' ";
  }
  
  if (! $idcategoria == "")
  {
	$sql .= " && idcategoria='$idcategoria'";
  }
  
  if (! $idcomodos == "")
  {
	$sql .= " && idcomodos='$idcomodos' ";
  }
  
  $resultado = mysql_query($sql,$conexao);
  
  while($linha = mysql_fetch_row($resultado))
  {
  ?>
  <tr>
    <td class="formata2"><? echo $linha[1] ?></td>
    <td align="center" class="formata2"><?  echo "R$ " . number_format($linha[8], "2", ",", "."); ?></td>
    <td><a href="imovel_detalhes.php?id=<? echo $linha[0] ?>"><img src="imagens/binoculo.gif" width="110" height="16" border="0" /></a></td>
  </tr>
  <?
  }
  ?>
</table>
</body>
</html>
