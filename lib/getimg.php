<?

include('../lib/header.php');

$korisnik="root";
 $lozink="";
 $baza="logo";
 $bp=mysql_connect("localhost",$korisnik,$lozink);
 mysql_select_db($baza,$bp) or die( "Greška kod povezivanja na bazu!");
$kveri = "SELECT slika FROM korisnici WHERE Id=i;
$result=mysql_query($kveri);
if($result)
{
  $row = mysql_fetch_array($result);

  if (!empty($row['slika']))
  {
    $slika1 = $row['slika'];
    $i = 0;
    while($slika1[$i] != ' ')
        $i++;
    $mime  = substr($slika1, 0, $i);
    $slika1 = substr($slika1, $i+1);
    header("Content-Type: ".$mime);
    print $slika1 ;
  }
  else
  {
       header ("Content-type: image/png");
       $im = @ImageCreate (100, 200);
       $background_color = ImageColorAllocate ($im, 0, 255, 255);
       $text_color = ImageColorAllocate ($im, 233, 14, 91);
       ImageString ($im, 4, 5, 5, "NEMA SLIKE", $text_color);
       ImagePng ($im);
       ImageDestroy($im);
  }
}
else
{
        header ("Content-type: image/png");
        $im = @ImageCreate (100, 200);
        $background_color = ImageColorAllocate ($im, 0, 255, 255);
        $text_color = ImageColorAllocate ($im, 233, 14, 91);
        ImageString ($im, 4, 5, 5, "NEMA SLIKE", $text_color);
        ImagePng ($im);
        ImageDestroy($im);
}
?>
