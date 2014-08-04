<? //error_reporting(NULL);
//session_start();
$korisnik="root";
$lozinka="";
$baza="logo";
$bp=mysql_connect("localhost",$korisnik,$lozinka);
mysql_select_db($baza,$bp) or die( "Greška kod povezivanja na bazu!");
mysql_query("SET NAMES utf8");
$con=new PDO('mysql:host=localhost;dbname='.$baza.';charset=utf8',$korisnik,$lozinka);
$con->exec("set names utf8");
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>