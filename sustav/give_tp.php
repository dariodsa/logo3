<?
include('baza.php');
$id=$_GET['id'];
$upit="SELECT * FROM zadaci";
$rezultat=mysql_query($upit);
$broj_redovaa=mysql_numrows($rezultat);
$i=0;
while($i<$broj_redovaa)
{
	$ida=mysql_result($rezultat,$i,"id");
	if($ida==$id)
	{
	  $tp=mysql_result($rezultat,$i,"tp");
	  echo"$tp";
	}
	++$i;
}
?>