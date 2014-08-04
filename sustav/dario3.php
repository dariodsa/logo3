<?
$ime=$_GET['ime'];
$id=$_GET['id'];
while($theData!="0")
{
  $myFile = "../sustav/4a.txt";
  $fh = fopen($myFile, 'r');
  $theData = fread($fh,1);
  fclose($fh);
  //echo"<br>$theData+<br>";
  //echo"<script type='text/javascript'>document.getElementById('demo').innerHTML = Èekam u redu;</script>";
}
$s=shell_exec('evaluator 4 5 '.$ime.' '.$id);
echo"$s";
?>