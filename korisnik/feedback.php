<?
session_start();
include('baza.php');
$bp=mysql_connect("localhost",$korisnik,$lozinka);
mysql_select_db($baza,$bp) or die( "Greška kod povezivanja na bazu!");
if(isset($_POST['text']))
{
    $text=$_POST['text'];
	$name=$_SESSION['ime'];
	$poruka="";
	for($i=0;$i<strlen($text);++$i)
	 if(ord($text[$i])==10)$poruka.="<br/>";
	 else $poruka.=$text[$i];
	//echo"".ord($text[$i])."<br/>";
	$upit="INSERT INTO poruke VALUES ('','$poruka','$name',now(),0)";
	if(mysql_query($upit))
	{
	  header("Location: index.php");
	}
	else   echo "<pre><b><FONT COLOR=RED>". mysql_errno() . ": " . mysql_error(). "</FONT></b></pre>\n";
	
}
?>