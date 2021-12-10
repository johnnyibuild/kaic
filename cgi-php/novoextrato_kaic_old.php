<?
	// Iniciando variáveis
ini_set('display_errors', 1);
error_reporting(E_ALL);

//$nomeArquivo="extrato.txt";
ob_start();
session_start();
$pagina=1;
$fonte="Arial";
$tamanho="1";
$Tabela=array();
$fechamento=0;
$numero_linhas=0;
//$tipo=""; //tipo de valores (pagamento ou recebimento)
$pulaLinha="<tr><td colspan=6>&nbsp;</td></tr><tr><td colspan=6>&nbsp;</td></tr>";
$pulaLinha2="";
$er="^([0-9]{4}\#[0-9.]{0,3})"; // expressão regular
$er_disc="^([0-9]{2}/?[0-9]{0,2}\#.*)";  // expressão discriminação
$n=0;

$listar=-1;		// Registro achado... imprime demais linhas
$listamen=-1;

// Abrindo Banco de Dados

/////////////////////////////////////////BD
//session_start();
require_once("../inc/conectarfb.php");


if(@$grupo=='01')
{
	// Fazendo uma consulta SQL e retornando os resultados
	$query = "SELECT cod,mes,num,linha,obs,cliente_ss FROM conteudo ORDER BY cliente_ss,cod,mes,num";
	$resultado = ibase_query($conexaofb,$query);

	$pulalinha=0;
	while ($ver = ibase_fetch_assoc($resultado))
	{
		$numero=$ver['NUM'];
		$linhas=$ver['LINHA'];
		$cliente=$ver['CLIENTE_SS'];
		$vmes=$ver['MES'];

		if($n % 2 == 0)	{ $cores='#cEcEc1';
		}else{ $cores='#EBE9E9'; }

		// Se encontrar uma linha com código e senha...
		if(ereg($er,$linhas,$match))
		{
			$listar=-1;

			if ($listar==-1)
			{
				// ... dividir a linha em duas partes...
				$dados=explode("#",$match[0]);
				//... se as partes forem iguais ao código e senha fornecidos...

				if((@$conta==$dados[0])&&(@$senha==$dados[1])&&(@$cli_ss==$cliente)&&(@$mesinfo==substr($vmes,0,2)))
				{
					$listar=$n;
					$listamen=$n;
					continue;
				}
			}
		}
		$n=$n+1;
		if ($listar!=-1)
		{
			// Remove os espaços em branco no final da linha
			//			$linhas[$n]=trim($linhas);

			// Se encontrar outro registro de proprietário
			//if(ereg($er,$linhas,$match))
			//	break;

			if($n==$listar+1)
				$nome=$linhas;

			if($n==$listar+2)
				$mesRef=$linhas;

			if($numero_linhas>=46)
			{
				//$pagina++;
				$numero_linhas=0;
				$pulalinha=0;
			}

			// se achou linha de endereço
			if(substr($linhas,0,8)=="endereco")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				//if(substr($texto[1],0,5)=="(999)")
					$pulaLinha2="<tr><td bgcolor=$cores colspan=5>&nbsp;</td></tr>";
				$linha='<table id="relatorio">
						<tr><td width=100% colspan="4" class="t_imovel">'.$texto[1].'<br>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=2;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de inquilino
			if(substr($linhas,0,9)=="inquilino")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				$linha= $texto[1].'<br>
						</td></tr><tr><td colspan="4" class="hr"></td></tr></table>
						<table id="relatorio">
						<td width="70"  class="t_r">Dia</td>
						<td width="311" class="t_r">Descrição</td>
						<td width="54" 	class="t_r">Ref.</td>
						<td width="97" align="center" class="t_r">Valor</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de mensagem
			if(substr($linhas,0,8)=="mensagem")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);

				$linha= $texto[1].'<br>
						</td></tr><tr><td colspan="4" class="hr"></td></tr></table>
						<table id="relatorio">
						<td width="70"  class="t_r">Dia</td>
						<td width="311" class="t_r">Descrição</td>
						<td width="54" 	class="t_r">Ref.</td>
						<td width="97" align="center" class="t_r">Valor</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de titulo
			if(substr($linhas,0,6)=="titulo")
            {
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				$tipo=$texto[1];

				$linha='<tr>
						<td width="70"  class="r_r">&nbsp;</td>
						<td width="311" class="r_r_ve">'.$texto[1].'</td>
						<td width="97" 	class="r_r">&nbsp;</td>
						<td width="97" class="r_r_va" align="right">&nbsp;</td></tr>';

                $Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
            }

			// se achou linha de discriminação
			//if(ereg("^([0-9]{2}/?[0-9]{0,2}\#.*)",$linhas,$match))
			if(ereg($er_disc,$linhas,$match))
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);


				if (trim($tipo)=="Recebimentos")
				$linha='<tr>
						<td width="70"  class="r_r">'.$texto[0].'</td>
						<td width="311" class="r_r_ve">'.$texto[1].$texto[3].'</td>
						<td width="97"  class="r_r">'.$texto[2].'</td>
						<td width="97"  class="r_r_va" align="right">'.$texto[4].'+</td>
						</tr>';
				else if (trim($tipo)=="Pagamentos")
				$linha='<tr>
						<td width="70"  class="r_r">'.$texto[0].'</td>
						<td width="311"  class="r_r_ve">'.$texto[1].$texto[3].'</td>
						<td width="97"  class="r_r">'.$texto[2].'</td>
						<td width="97"  class="r_r_va" align="right">'.$texto[4].'-</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
            }

			// se achou linha de fechamento
			if(substr($linhas,0,10)=="fechamento")
			{
				if((@$numero_linhas>=46)&&($pulaLinha!=""))
				{
					$numero_linhas=0;
					//$pagina++;
				}
				// Preparando Coluna 2
				$texto=explode("#",$linhas);

				$linha='<table id="relatorio">
						<tr><td colspan="2" class="f_r">'.$texto[1].'</td>
						<td align="right" class="f_r_va">'.$texto[2].'</td></tr>
						</table>';


				$Tabela[$pagina][]=$linha;
				$pulalinha=0;
				$numero_linhas+=1;

				continue;
			}
 		}
	}
}
else if(@$grupo=='02')   ////////////*********************   GRUPO 02
{
	// Fazendo uma consulta SQL e retornando os resultados
//	$query = "SELECT cod,mes,num,linha,obs,cliente_ss FROM conteudo WHERE cliente_ss='.@$cligr2.' and cod='.@$codgr2.' and mes='.@$itemmes.' ORDER BY cliente_ss,cod,mes,num";
	$query = "SELECT cod,mes,num,linha,obs,cliente_ss FROM conteudo ORDER BY cliente_ss,cod,mes,num";
	$resultado = ibase_query($conexaofb,$query);

	$pulalinha=0;
	while ($ver = ibase_fetch_assoc($resultado))
	{
		$numero=$ver['NUM'];
		$linhas=$ver['LINHA'];
		$cliente=$ver['CLIENTE_SS'];
		$vmes=$ver['MES'];

		if($n % 2 == 0)	{ $cores='#cEcEc1';
		}else{ $cores='#EBE9E9'; }

		// Se encontrar uma linha com código e senha...
		if(ereg($er,$linhas,$match))
		{
			$listar=-1;

			if ($listar==-1)
			{
				// ... dividir a linha em duas partes...
				$dados=explode("#",$match[0]);
				//... se as partes forem iguais ao código e senha fornecidos...

				//if((@$conta==$dados[0])&&(@$senha==$dados[1])&&(@$cli_ss==$cliente)&&(@$mesinfo==substr($vmes,0,2)))
				if((@$codgr2==$dados[0])&&(@$cligr2==$cliente)&&(@$itemmes==substr($vmes,0,2)))
				{
					$listar=$n;
					$listamen=$n;
					continue;
				}
			}
		}
		$n=$n+1;
		if ($listar!=-1)
		{
			// Remove os espaços em branco no final da linha
			//			$linhas[$n]=trim($linhas);

			// Se encontrar outro registro de proprietário
			//if(ereg($er,$linhas,$match))
			//	break;

			if($n==$listar+1)
				$nome=$linhas;

			if($n==$listar+2)
				$mesRef=$linhas;

			if((@$numero_linhas>=46))
			{
				//$pagina++;
				$numero_linhas=0;
				$pulalinha=0;
			}

			// se achou linha de endereço
			if(substr($linhas,0,8)=="endereco")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				//if(substr($texto[1],0,5)=="(999)")
					$pulaLinha2="<tr><td bgcolor=$cores colspan=5>&nbsp;</td></tr>";
				$linha='<table id="relatorio">
						<tr><td width=100% colspan="4" class="t_imovel">'.$texto[1].'<br>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=2;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de inquilino
			if(substr($linhas,0,9)=="inquilino")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				$linha= $texto[1].'<br>
						</td></tr><tr><td colspan="4" class="hr"></td></tr></table>
						<table id="relatorio">
						<td width="70"  class="t_r">Dia</td>
						<td width="311" class="t_r">Descrição</td>
						<td width="54" 	class="t_r">Ref.</td>
						<td width="97" align="center" class="t_r">Crédito</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de mensagem
			if(substr($linhas,0,8)=="mensagem")
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);

				$linha= $texto[1].'<br>
						</td></tr><tr><td colspan="4" class="hr"></td></tr></table>
						<table id="relatorio">
						<td width="70"  class="t_r">Dia</td>
						<td width="311" class="t_r">Descrição</td>
						<td width="54" 	class="t_r">Ref.</td>
						<td width="97" align="center" class="t_r">Crédito</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
			}

			// se achou linha de titulo
			if(substr($linhas,0,6)=="titulo")
            {
				// Preparando Coluna 2
				$texto=explode("#",$linhas);
				$tipo=$texto[1];

				$linha='<tr>
						<td width="70"  class="r_r">&nbsp;</td>
						<td width="311" class="r_r_ve">'.$texto[1].'</td>
						<td width="97" 	class="r_r">&nbsp;</td>
						<td width="97" class="r_r_va" align="right">&nbsp;</td></tr>';

                $Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
            }

			// se achou linha de discriminação
			//if(ereg("^([0-9]{2}/?[0-9]{0,2}\#.*)",$linhas,$match))
			if(ereg($er_disc,$linhas,$match))
			{
				// Preparando Coluna 2
				$texto=explode("#",$linhas);


				if (trim($tipo)=="Recebimentos")
				$linha='<tr>
						<td width="70"  class="r_r">'.$texto[0].'</td>
						<td width="311" class="r_r_ve">'.$texto[1].$texto[3].'</td>
						<td width="97"  class="r_r">'.$texto[2].'</td>
						<td width="97"  class="r_r_va" align="right">'.$texto[4].'+</td>
						</tr>';
				else if (trim($tipo)=="Pagamentos")
				$linha='<tr>
						<td width="70"  class="r_r">'.$texto[0].'</td>
						<td width="311"  class="r_r_ve">'.$texto[1].$texto[3].'</td>
						<td width="97"  class="r_r">'.$texto[2].'</td>
						<td width="97"  class="r_r_va" align="right">'.$texto[4].'-</td>
						</tr>';

				$Tabela[$pagina][]=$linha;
				$numero_linhas+=1;
				$pulalinha+=1;
				continue;
            }

			// se achou linha de fechamento
			if(substr($linhas,0,10)=="fechamento")
			{
				if((@$numero_linhas>=46)&&($pulaLinha!=""))
				{
					$numero_linhas=0;
					//$pagina++;
				}
				// Preparando Coluna 2
				$texto=explode("#",$linhas);


				$linha='<table id="relatorio">
						<tr><td colspan="2" class="f_r">'.$texto[1].'</td>
						<td align="right" class="f_r_va">'.$texto[2].'</td></tr>
						</table>';


				$Tabela[$pagina][]=$linha;
				$pulalinha=0;
				$numero_linhas+=1;

				continue;
			}

		}
	}
}


if($listamen==-1)
{
	echo("<h1 align=center >Registro não encontrado!!!</h1>");
	exit;
}

?>


<html><head><title>Sistema de emissão de demonstrativos de pagamentos e recebimentos</title><link rel="stylesheet" href="relatorios.css" type="text/css"></head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>

var da = (document.all) ? 1 : 0;
var pr = (window.print) ? 1 : 0;
var mac = (navigator.userAgent.indexOf("Mac") != -1);

	function printPage() {
	  if (pr) // NS4, IE5
	    window.print()
	  else if (da && !mac) // IE4 (Windows)
	       vbPrintPage()
	  else // other browsers
	    alert("Desculpe seu browser não suporta esta função. Por favor utilize a barra de trabalho para imprimir a página.");
}
</script>
<body bgcolor="#FFFFFF" text="#000000" link="#000000">
<?
	for($folha=1;$folha<=$pagina;$folha++)
	{
?>

<table id="relatorio">
<tr><td colspan="3" class="t_s">DEMONSTRATIVO DE RECEBIMENTOS E PAGAMENTOS<br /><?=@$nome?></td><td align="right" class="d_r" ><?=$vmes?></td></tr>
<tr><td colspan="4" class="hr"></td></tr>
</table>


        <?
  		$inicial=0;
  		$final=40;
  		$numLinhas=count($Tabela[$folha]);

		for($n=$inicial;$n<$numLinhas;$n++)

			echo($Tabela[$folha][$n]);

	}
	// fim do for($folha)
	?>

</body>
</html>