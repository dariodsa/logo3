<?
include('baza.php');
if(ISSET($_GET['dario']))
{
  $dario=$_GET['dario'];
  if($dario==595)
  {
    $upit="SELECT * FROM korisnici";
	$rezultat=mysql_query($upit);
	$broj_redova=mysql_numrows($rezultat);
	$i=0;
	while($i<$broj_redova)
	{
	  $ime=mysql_result($rezultat,$i,"ime");
	  echo"$ime";
	  ++$i;
	  echo($i==$broj_redova?"":",");
	}
  }
}  
?>