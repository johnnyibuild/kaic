<?
include("connect.php");

$id = $_GET["id"];
$sql = "select * from imoveis where idimovel='$id'";
$resultado = mysql_query($sql,$conexao);
$linha = mysql_fetch_row($resultado);
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="estilos.css" rel="stylesheet" type="text/css">
<script language="javascript">
	function mudar(figura){
		document.imagem.src = "fotos/"+figura;
	}
</script>
<style type="text/css">
<!--
.InputBotao {border: #666666 1px solid;
	font-size: 12px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #666666;
}
.style56 {font-weight: bold; color: #50802A; font-family: "Lucida Sans"; font-size: 11px; }
.style58 {font-weight: bold; color: #50802A; font-family: "Lucida Sans"; font-size: 12px; }
.style70 {font-family: Arial; font-size: 12px; color: #666666;}
.style71 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #006699;
	font-weight: bold;
}
.style74 {color: #666666}
.style75 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #666666; font-weight: bold; }
.style1 {font-size: 10px}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="form3.php">
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="7">
    <tr>
      <td align="left" valign="middle" class="formata_titulo">&nbsp;</td>
      <td align="right" valign="middle" class="formata_titulo"><a href="javascript:history.back()"><a href="javascript:history.back()"><span class="style1">Fechar </span></a><a href="javascript:window.close()"><img src="imagens/fechar.jpg" width="11" height="12" border="0" /></a></td>
    </tr>
    <tr>
      <td width="571" align="left" valign="middle" class="formata_titulo">C&Oacute;DIGO: <? echo $linha[0] ?> <? echo $linha[1] ?> - &Aacute;REA &Uacute;TIL: <? echo $linha[28] ?></td>
      <td width="163" align="left" valign="middle" class="formata_titulo">VALOR: 
	  <?
	  echo "R$ " . number_format($linha[8], "2", ",", ".");
	  ?>	  </td>
    </tr>
    <tr align="left" valign="top">
      <td height="85" colspan="2" align="center" valign="middle" bgcolor="#EEEEEE" class="tabela_cinza">
	  <?
		$imovel = $linha[0];
		$sql = "select * from fotos where idimovel='$imovel'";
		$resultado = mysql_query($sql,$conexao);
					
		if($fotos = mysql_fetch_row($resultado))
		{
	  ?>
	  <table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top">
		  <?
			$imovel = $linha[0];
			$sql = "select * from fotos where idimovel='$imovel'";
			$resultado = mysql_query($sql,$conexao);
			
			$fotos = mysql_fetch_row($resultado);
		  ?>
		  <img src="fotos/<? echo $fotos[2] ?>" name="imagem" width="500" height="350" id="imagem">		  </td>
          <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="5" bgcolor="#F5F5F5">
            <tr>
              <td height="21" colspan="2" align="center" class="formata3"><span class="formata1">Clique na foto para ampli&aacute;-la </span></td>
            </tr>
            <tr>
            <?
			$imovel = $linha[0];
			$sql = "select * from fotos where idimovel='$imovel'";
			$resultado = mysql_query($sql,$conexao);
			
			$cont = 1;
			while($fotos = mysql_fetch_row($resultado))
			{
			?>
			  <td width="100"><a href="#" onClick="mudar('<? echo $fotos[2] ?>')"><img src="fotos/<? echo $fotos[2] ?>" width="100" height="80" border="0"></a></td>
			<?
			  if($cont % 2 == 0)
			  {
			  ?>
			  </tr>
			  <tr>
			  <?
			  }
			  $cont++;
			}
			?>
            </tr>
          </table></td>
        </tr>
      </table>
	  <?
	  }
	  else
	  {
	  ?>
	  IMÓVEL SEM FOTO CADASTRADA
	  <?
	  }
	  ?>	  </td>
    </tr>
    <tr>
      <td colspan="2"><table width="741" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td colspan="4" class="formata_titulo">ENDERE&Ccedil;O<span class="formata2"> &nbsp;&nbsp;&nbsp;<? echo $linha[2] ?><? echo $linha[3] ?></span></td>
          </tr>
        
        <tr>
          <td width="117" class="formata_titulo">LOCAL</td>
          <td width="250" class="formata2">
		  <?
		  $local = $linha[5];
		  $sql = "select nmlocal from local where idlocal='$local'";
		  $resultado = mysql_query($sql,$conexao);
		  $local = mysql_fetch_row($resultado);
		  
		  echo $local[0];
		  ?>		  </td>
          <td width="82" class="formata_titulo">C&Ocirc;MODOS</td>
          <td width="267" class="formata2">
		  <?
		  $comodos = $linha[7];
		  $sql = "select nmcomodo from comodos where idcomodo='$comodos'";
		  $resultado = mysql_query($sql,$conexao);
		  $comodos = mysql_fetch_row($resultado);
		  
		  echo $comodos[0];
		  ?>		  </td>
        </tr>
        <tr>
          <td class="formata_titulo">CATEGORIA</td>
          <td class="formata2">
		  <?
		  $categoria = $linha[6];
		  $sql = "select nmcategoria from categoria where idcategoria='$categoria'";
		  $resultado = mysql_query($sql,$conexao);
		  $categoria = mysql_fetch_row($resultado);
		  
		  echo $categoria[0];
		  ?>		  </td>
          <td class="formata_titulo">VALOR</td>
          <td class="formata2">
		  <?
		  echo "R$ " . number_format($linha[8], "2", ",", ".");
		  ?>		  </td>
        </tr>
        <tr>
          <td class="formata_titulo">CONDOM&Iacute;NIO</td>
          <td class="formata2">
		  <?
		  echo "R$ " . number_format($linha[18], "2", ",", ".");
		  ?>		  </td>
          <td class="formata_titulo">IPTU</td>
          <td><span class="formata2">
		  <?
		  echo "R$ " . number_format($linha[44], "2", ",", ".");
		  ?>
		  </span></td>
        </tr>
        <tr>
          <td colspan="4" class="formata_titulo"><b class="formata_titulo">DEMAIS CARACTER&Iacute;STICAS DO IM&Oacute;VEL <span class="formata3"> 
                <span class="formata2">
                <?
		  if($linha[19] == "S")
		  {
		  echo " - Suíte";
		  }
		  ?>
                <?
		  if($linha[20] == "S")
		  {
		  echo " - Dependência de Empregada";
		  }
		  ?>
                <?
		  if($linha[21] == "S")
		  {
		  echo " - Banheiro de Empregada";
		  }
		  ?>
                <?
		  if($linha[22] == "S")
		  {
		  echo " - Varanda";
		  }
		  ?>
                <?
		  if($linha[13] == "S")
		  {
		  echo " - Garagem";
		  }
		  ?>
                <?
		  if($linha[25] == "S")
		  {
		  echo " - Vista Livre";
		  }
		  ?>
                <?
		  if($linha[31] == "S")
		  {
		  echo " - Vista Devassada";
		  }
		  ?>
                <?
		  if($linha[30] == "S")
		  {
		  echo " - Churrasqueira";
		  }
		  ?>
                
                <?
		  if($linha[32] == "S")
		  {
		  echo " - Área de Serviço";
		  }
		  ?>            
                </span></td>
          </tr>
        <tr>
          <td colspan="4" class="formata2"><b class="formata_titulo">DEMAIS CARACTER&Iacute;STICAS DO EDIF&Iacute;CIO </b>
		  <?
		  if($linha[34] == "S")
		  {
		  echo " - Piscina";
		  }
		  ?>
		  <?
		  if($linha[35] == "S")
		  {
		  echo " - Playground";
		  }
		  ?>
		  <?
		  if($linha[36] == "S")
		  {
		  echo " - Interfone";
		  }
		  ?>
		  <?
		  if($linha[37] == "S")
		  {
		  echo " - Sauna";
		  }
		  ?>
		  <?
		  if($linha[38] == "S")
		  {
		  echo " - Quadra de Esporte";
		  }
		  ?>
		  <?
		  if($linha[39] == "S")
		  {
		  echo " - Portão Eletrônico";
		  }
		  ?>
		  <?
		  if($linha[40] == "S")
		  {
		  echo " - Segurança";
		  }
		  ?>
		  <?
		  if($linha[41] == "S")
		  {
		  echo " - Circuito Interno";
		  }
		  ?>
		  <?
		  if($linha[42] == "S")
		  {
		  echo " - Salão de Festas";
		  }
		  ?>        </tr>
        <tr>
          <td colspan="4" class="formata2"><b class="formata_titulo">OBSERVA&Ccedil;&Otilde;ES:</b> <? echo $linha[43] ?></td>
        </tr>
      </table></td>
    </tr>
    
    <tr>
      <td height="253" colspan="2" align="center"><table width="100%" border="0" cellspacing="5" cellpadding="0">

        <tr>
          <td class="formata_titulo">N&ordm; VISITAS DESTE AN&Uacute;NCIO </td>
          <td class="formata2"><?
		  echo $linha[17];
		  $visitas = $linha[17] + 1;
		  $sql = "update imoveis set numVisitas='$visitas' where idimovel='$imovel'";
		  mysql_query($sql,$conexao);
		  ?></td>
        </tr>
        <tr>
          <td width="32%" class="formata_titulo">&nbsp;</td>
          <td width="68%" class="formata2">&nbsp;</td>
        </tr>
      </table>
        <table width="730" cellspacing="5" cellpadding="0">
          <tr>
            <td width="211" height="213" align="center" valign="top"><img src="imagens/banner_ficha.jpg" width="210" height="201" border="0" usemap="#Map"><br>
            <br></td>
            <td width="533"><table width="488" height="212" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="486" height="210" valign="top"><table width="473" height="219" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
                    <tr bgcolor="#FFFFFF">
                      <td align="left" valign="top" class="style56">&nbsp;</td>
                      <td height="23" colspan="2" align="left" valign="top" class="style71 style74">GOSTOU DO IM&Oacute;VEL? CONTATE-NOS AGORA MESMO!!!</td>
                      </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" valign="top" class="style56">&nbsp;</td>
                      <td height="23" align="left" valign="top"><span class="style75">Endere&ccedil;o do Im&oacute;vel </span></td>
                      <td align="left" valign="top"><input name="imovel" type="text" class="style70" id="imovel" size="55" /></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" valign="top" class="style56">&nbsp;</td>
                      <td height="23" align="left" valign="top"> <span class="style75">Nome </span></td>
                      <td align="left" valign="top"><input name="usuario" type="text" class="style70" id="usuario" size="45" /></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" valign="top" class="style58">&nbsp;</td>
                      <td height="23" align="left" valign="top" class="style75">Email</td>
                      <td align="left" valign="top"><input name="email" type="text" class="style70" id="email" size="45" /></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td width="17" align="left" valign="top" class="style58">&nbsp;</td>
                      <td width="138" height="23" align="left" valign="top" class="style75">Telefone</td>
                      <td width="298" align="left" valign="top"><input name="telefone" type="text" class="style70" id="telefone" size="9" maxlength="9" /></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" valign="top" class="style58">&nbsp;</td>
                      <td height="69" align="left" valign="middle" class="style75">Mensagem</td>
                      <td align="left" valign="top"><textarea name="mensagem" cols="45" rows="4" class="style70" id="mensagem"></textarea></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="33" colspan="3" align="center" valign="middle"><table width="135" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="116" align="right" valign="bottom"><input name="submit" type="submit" class="InputBotao" value="Enviar"/></td>
                            <td width="82">&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>

<map name="Map"><area shape="rect" coords="33,85,178,100" href="pessoa_fisica.pdf" target="_blank">
<area shape="rect" coords="2,103,208,116" href="fiador_pessoa_fisica.pdf" target="_blank">
<area shape="rect" coords="20,140,192,153" href="pessoa_juridica.pdf" target="_blank">
</map></body>
</html>
