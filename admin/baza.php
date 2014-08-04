<? //error_reporting(NULL);
//session_start();
$korisnik="root";
$lozinka="";
$baza="logo";
$bp=mysql_connect("localhost",$korisnik,$lozinka);
mysql_select_db($baza,$bp) or die( "Greška kod povezivanja na bazu!");
?>