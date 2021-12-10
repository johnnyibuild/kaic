<?
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.Título1 {	font-family: Arial;
	font-size: 12px;
	font-weight: bold;
	color: #949569;
}
.Título3 {font-family: Arial; font-size: 15px; font-weight: bold; color: #949569; }
.Títulos_paginas {color: #00A452;
	font-family: Arial;
	font-size: 16px;
	font-weight: bold;
}
.texto_conteúdo {font-family: Arial;
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.InputBotao {border: #0099CC 1px solid;
	font-size: 12px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #0099CC;
-->
}
.style7 {font-size: 11px}
.InputBotao1 {	border: #9F9D76 1px solid;
	font-size: 13px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #9F9D76;
}
.style49 {font-family: Arial; font-size: 18px; font-weight: bold; color: #949569; }
a:link {
	color: #828661;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style51 {font-family: Arial; font-size: 18px; font-weight: bold; color: #FFFFFF; }
.InputBotao2 {border: #356734 1px solid;
	font-size: 12px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #356734;
-->
}
-->
</style>
</head>

<body>
<table width="623" height="190" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
  
  <tr>
    <td height="190" align="center" valign="top"><table width="300" border="1" bordercolor="#ECECEC">
        <tr>
          <td height="165"><form id="form1" name="form1" method="post" action="imoveis_busca.php">
            <table width="102%" height="177" border="0" align="center" cellpadding="3" cellspacing="3">
              <tr>
                <td height="25" colspan="2" align="center" valign="bottom" bgcolor="#949569"><span class="style51">Busca R&aacute;pida </span></td>
                </tr>
              <tr>
                <td width="81" height="25" align="right" valign="bottom" class="T&iacute;tulo1"><span class="T&iacute;tulo1">Tipo</span></td>
                <td width="167" align="left" valign="bottom"><select name="select2" class="style7" id="select5" style="width:130px">
                    <option value="">Todos</option>
                    <?
										$sql = "select * from tipo order by nmtipo";
										$resultado = mysql_query($sql,$conexao);
										while($linha = mysql_fetch_row($resultado))
										{
										?>
                    <option value="<? echo $linha[0]?>"><? echo $linha[1] ?></option>
                    <?
										}
										?>
                </select></td>
              </tr>
              <tr>
                <td height="25" align="right" valign="bottom" class="T&iacute;tulo1"><span class="T&iacute;tulo1">Local</span></td>
                <td align="left" valign="bottom"><div align="left">
                    <select name="select" id="select6" class="style7" style="width:130px">
                      <!-- <select name="idLocal" id="idLocal" style="width:220px" size="4" cols="40"> -->
                      <option value="" selected="selected">Todos os Locais</option>
                      <?
										$sql = " SELECT * FROM local";
										$resultado = mysql_query($sql,$conexao);
										while($linha = mysql_fetch_row($resultado))
										{
									  ?>
                      <option value="<? echo $linha[0] ?>"><? echo $linha[2] ?></option>
                      <?
									  }
									  ?>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="25" align="right" valign="bottom" class="T&iacute;tulo1"><span class="T&iacute;tulo1">Categoria</span></td>
                <td align="left" valign="bottom"><select name="select" id="select7" class="style7" style="width:130px">
                    <option value="" selected="selected">Todos os Servi&ccedil;os</option>
                    <?
									$sql = "select * from categoria order by nmcategoria";
									$resultado = mysql_query($sql,$conexao);
									while($linha = mysql_fetch_row($resultado))
									{
									?>
                    <option value="<? echo $linha[0] ?>"><? echo $linha[1] ?></option>
                    <?
									}
								    ?>
                </select></td>
              </tr>
              <tr>
                <td height="25" align="right" valign="bottom" class="T&iacute;tulo1"><span class="T&iacute;tulo1">C&ocirc;modos</span></td>
                <td align="right" valign="bottom"><div align="left">
                    <select name="select" class="style7" id="select8" style="width:130px">
                      <option value="">Todos</option>
                      <?
										$sql = "select * from comodos order by nmcomodo";
										$resultado = mysql_query($sql,$conexao);
										while($linha = mysql_fetch_row($resultado))
										{
										?>
                      <option value="<? echo $linha[0]?>"><? echo $linha[1]?></option>
                      <?
										}
										?>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="31" align="right" valign="baseline">&nbsp;</td>
                <td height="31" align="left" valign="bottom"><input name="Submit22" type="submit" class="InputBotao1" value="Buscar" /></td>
              </tr>
            </table>
          </form></td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
