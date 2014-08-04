<?
include ('header.php')
?>
<html>
<?
$return = -1;
exec('\\kompajler\\lgoc.exe  text2.lgo --output pero1.bmp',$out,$return);
echo "Return value: $return\n";
var_dump($out);
?>
</html>