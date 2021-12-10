<?
/*
session_start();
if (!isset($_SESSION["id"]))
{
	header("Location: login.php?ok=0");
}
*/

$conexao = mysql_connect("mysql.kaic.com.br","kaic","kaic2009");
		   mysql_select_db("kaic",$conexao);

/*
$conexao = mysql_connect("localhost","","");
		   mysql_select_db("vilarinho",$conexao);
*/
?>