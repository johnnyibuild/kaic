<?
include("connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kaic Administra&ccedil;&atilde;o de Im&oacute;veis e Corretagem de Seguros</title>
<style type="text/css">



.style36 {	color: #FFFFFF;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body {
	background-image: url(bg.jpg);
	margin-top: 0px;
}
.InputBotao1 { border: #666666 1px solid;
font-size: 18px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #666666;

}
.InputBotao {border: #00929F 1px solid;
	font-size: 18px;
	color: #000000;
	font-family: Arial;
	font-weight:bold;
	background-color: #00929F;
-->
}
.InputBotao2 {border: #993400 1px solid;
	font-size: 12px;
	color: #ffffff;
	font-family: Arial;
	font-weight:bold;
	background-color: #993400;
-->
}
.style53 {
	color: #FFFFFF;
	font-family: Arial;
	font-size: 14px;
	font-weight: bold;
}
td img {display: block;}td img {display: block;}td img {display: block;}
.style56 {color: #000000; font-size: 11px; font-family: Arial;}
.style110 {font-family: Arial, Helvetica, sans-serif}
.style111 {font-size: 12px;
color: #993400}
.style112 {color: #993400}
.style113 {color: #FFFFFF}
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
</head>

<body onload="MM_preloadImages('botoes/botoes_r1_c1_f3.gif','botoes/botoes_r1_c1_f2.gif','botoes/botoes_r1_c1_f4.gif','botoes/botoes_r1_c3_f3.gif','botoes/botoes_r1_c3_f2.gif','botoes/botoes_r1_c3_f4.gif','botoes/botoes_r1_c5_f3.gif','botoes/botoes_r1_c5_f2.gif','botoes/botoes_r1_c5_f4.gif','botoes/botoes_r1_c7_f3.gif','botoes/botoes_r1_c7_f2.gif','botoes/botoes_r1_c7_f4.gif')">
<table width="962" height="707" align="center" cellpadding="0" cellspacing="0">


  <tr>
    <td height="121" valign="top" background="imagens/cidade_topo.jpg"><table width="515" height="121" cellpadding="0" cellspacing="0">
      <tr>
        <td width="68" height="119">&nbsp;</td>
        <td width="437" align="left" valign="middle"><img src="imagens/logotipo_menor.gif" width="363" height="109" border="0" usemap="#Map" /></td>
      </tr>

    </table></td>
  </tr>
  <tr>
    <td bgcolor="#F47A00">&nbsp;</td>
  </tr>
  <tr>
    <td width="960" height="546" bgcolor="#FFFFFF"><table width="954" height="546" cellpadding="0" cellspacing="0" background="imagens/fundo.jpg">
      <tr>
        <td width="960" height="544" valign="middle" background="imagens/fundo.png"><table width="871" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="97" colspan="2" align="right" valign="bottom"><table border="0" cellpadding="0" cellspacing="0" width="585">
              <!-- fwtable fwsrc="botoes.png" fwbase="botoes.gif" fwstyle="Dreamweaver" fwdocid = "718285824" fwnested="0" -->
              <tr>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="140" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="7" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="140" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="9" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="140" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="9" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="140" height="1" border="0" id="undefined_2" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="1" height="1" border="0" id="undefined_2" /></td>
              </tr>
              <tr>
                <td rowspan="2"><a href="quem_somos.html" target="miolo" onclick="MM_nbGroup('down','navbar1','botoes_r1_c1','botoes/botoes_r1_c1_f3.gif',1);" onmouseover="MM_nbGroup('over','botoes_r1_c1','botoes/botoes_r1_c1_f2.gif','botoes/botoes_r1_c1_f4.gif',1);" onmouseout="MM_nbGroup('out');"><img name="botoes_r1_c1" src="botoes/botoes_r1_c1.gif" width="140" height="96" border="0" id="botoes_r1_c1" alt="" /></a></td>
                <td rowspan="2"><img name="botoes_r1_c2" src="botoes/botoes_r1_c2.gif" width="7" height="96" border="0" id="botoes_r1_c2" alt="" /></td>
                <td><a href="administracao_imoveis.html" target="miolo" onclick="MM_nbGroup('down','navbar1','botoes_r1_c3','botoes/botoes_r1_c3_f3.gif',1);" onmouseover="MM_nbGroup('over','botoes_r1_c3','botoes/botoes_r1_c3_f2.gif','botoes/botoes_r1_c3_f4.gif',1);" onmouseout="MM_nbGroup('out');"><img name="botoes_r1_c3" src="botoes/botoes_r1_c3.gif" width="140" height="93" border="0" id="botoes_r1_c3" alt="" /></a></td>
                <td rowspan="2"><img name="botoes_r1_c4" src="botoes/botoes_r1_c4.gif" width="9" height="96" border="0" id="botoes_r1_c4" alt="" /></td>
                <td><a href="consultoria_imobiliaria.html" target="miolo" onclick="MM_nbGroup('down','navbar1','botoes_r1_c5','botoes/botoes_r1_c5_f3.gif',1);" onmouseover="MM_nbGroup('over','botoes_r1_c5','botoes/botoes_r1_c5_f2.gif','botoes/botoes_r1_c5_f4.gif',1);" onmouseout="MM_nbGroup('out');"><img name="botoes_r1_c5" src="botoes/botoes_r1_c5.gif" width="140" height="93" border="0" id="botoes_r1_c5" alt="" /></a></td>
                <td rowspan="2"><img name="botoes_r1_c6" src="botoes/botoes_r1_c6.gif" width="9" height="96" border="0" id="botoes_r1_c6" alt="" /></td>
                <td><a href="corretagem_seguros.html" target="miolo" onclick="MM_nbGroup('down','navbar1','botoes_r1_c7','botoes/botoes_r1_c7_f3.gif',1);" onmouseover="MM_nbGroup('over','botoes_r1_c7','botoes/botoes_r1_c7_f2.gif','botoes/botoes_r1_c7_f4.gif',1);" onmouseout="MM_nbGroup('out');"><img name="botoes_r1_c7" src="botoes/botoes_r1_c7.gif" width="140" height="93" border="0" id="botoes_r1_c7" alt="" /></a></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="1" height="93" border="0" id="undefined_2" /></td>
              </tr>
              <tr>
                <td><img name="botoes_r2_c3" src="botoes/botoes_r2_c3.gif" width="140" height="3" border="0" id="botoes_r2_c3" alt="" /></td>
                <td><img name="botoes_r2_c5" src="botoes/botoes_r2_c5.gif" width="140" height="3" border="0" id="botoes_r2_c5" alt="" /></td>
                <td><img name="botoes_r2_c7" src="botoes/botoes_r2_c7.gif" width="140" height="3" border="0" id="botoes_r2_c7" alt="" /></td>
                <td><img src="botoes/spacer.gif" alt="" name="undefined_2" width="1" height="3" border="0" id="undefined_2" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="259" height="357" align="left" valign="top"><table width="248" height="219" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="240" align="center" valign="top" bgcolor="#666666"><img src="imagens/curva_tabela_busca.jpg" width="248" height="23" /></td>
                  </tr>
                  <tr>
                    <td height="29" align="center" valign="top" bgcolor="#666666"><span class="style53">Busca de Im&oacute;veis </span></td>
                  </tr>
                  <tr>
                    <td height="142" bgcolor="#666666"><form id="form1" name="form1" method="post" action="imoveis_busca.php">
                      <table width="93%" height="135" border="0" align="center" cellpadding="0" cellspacing="0" class="style15">
                        <tr>
                          <td width="70" height="25" align="right" class="style36"><div align="left" class="style111 style110 style90 style113"><strong>Tipo:</strong></div></td>
                          <td width="162" align="right"><div align="left">
                              <select name="select2" class="style56" id="select4" style="width:130px">
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
                              </select>
                          </div></td>
                        </tr>
                        <tr>
                          <td height="25" align="right" class="style36"><div align="left" class="style111 style110 style39 style112"><strong><span class="style90 style113">Bairro:</span></strong></div></td>
                          <td align="right"><div align="left">
                              <select name="select2" class="style56" id="select5" style="width:130px">
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
                          <td height="25" align="right" class="style36"><div align="left" class="style111 style110 style90 style112"><strong><span class="style38 style113">Categoria:</span></strong></div></td>
                          <td align="left"><select name="select2" class="style56" id="select6" style="width:130px">
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
                          <td height="24" colspan="2" align="center" valign="baseline"><input name="Submit22" type="submit" class="InputBotao1" value="ok" /></td>
                          </tr>
                      </table>
                    </form></td>
                  </tr>
                  <tr>
                    <td bgcolor="#666666"><img src="imagens/curva_tabela_busca2.jpg" width="248" height="23" /></td>
                  </tr>
              </table>
                <br />
                <table width="200" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom"><a href="mailto:kaic@kaic.com.br" target="_blank"><img src="imagens/correio_email.gif" alt="Envie a sua mensagem" width="130" height="59" border="0" /></a></td>
                  </tr>
                </table></td>
            <td width="610" align="center" valign="top"><iframe src="abertura.html" name="miolo" width="580" marginwidth="0" height="350" marginheight="0" align="top" scrolling="No" frameborder="0" id="miolo"></iframe>               </td>
          </tr>
        </table>
          <table width="964" cellpadding="0" cellspacing="0" bgcolor="#00929F">
            <tr>
              <td width="498" height="38" align="right" valign="top"><iframe src="cgi-php/demonstrativo_kaic.htm" name="extrato" width="460" marginwidth="0" height="38" marginheight="0" align="top" scrolling="no" frameborder="0"></iframe></td>
              <td width="464" align="left" valign="top"><iframe src="http://www.sigemsistemas.com.br/formulario_kaic.htm" name="boleto" width="450" marginwidth="0" height="38" marginheight="0" align="top" scrolling="no" frameborder="0"></iframe> </td>
            </tr>
          </table>
          <br />
          <table width="964" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td height="16" align="center" bgcolor="#F47A00" class="style56">Rua Sete de Setembro 43 sala 1201 Centro - Rio de Janeiro - RJ Tel. 21 2509.3649 / Fax. 21 2509.5463 </td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>


<map name="Map" id="Map"><area shape="rect" coords="4,1,361,102" href="abertura.html" target="miolo" />
</map></body>
</html>
