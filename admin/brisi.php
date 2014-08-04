<?
include('baza.php');
$upit="DELETE FROM poruke";
if(mysql_query($upit))
 header("Location: sanducic.php");
else 
 echo "<pre><b><FONT COLOR=RED>". mysql_errno() . ": " . mysql_error(). "</FONT></b></pre>\n";
?>