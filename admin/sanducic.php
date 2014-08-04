<?
include ('header.php');
?>
<center>
<h3>Poruke u sandučuću</h3>
<br>
<div class="panel-group" id="accordion">
  <!--<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          1. Poruka
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
         Možete li molim Vas dodati zadatak Spužva sa Županijskog natjecanja?<br>
			Hvala.<br>
		Korisnik: lovro_sinda<br>	
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          2. Poruka
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
		Mislim da je greška u test podacima za zadatak Plus.<br>
		Molim Vas da provjerite taj podatak.<br>
			Hvala.<br>
		Korisnik: lovro_sinda<br>	
      </div>
    </div>
  </div>-->
  
  <?
  include('baza.php');
  $upit="SELECT * FROM poruke ORDER BY datum";
  $rezultat=mysql_query($upit);
  $br=mysql_numrows($rezultat);
  $i=0;
  while($i<$br)
  {
     echo'
	 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">
	 ';
	 $broj=$i+1;
	 echo"$broj. Poruka";
	 echo'
	 </a>
      </h4>
    </div>
    <div id="collapse'.$i.'" class="panel-collapse collapse in">
      <div class="panel-body">
	 ';
	 $text=mysql_result($rezultat,$i,"text");
	 $korisnik=mysql_result($rezultat,$i,"korisnik");
	 $date=mysql_result($rezultat,$i,"datum");
	 $read=mysql_result($rezultat,$i,"read");
	 if($read==0)
	 {
	   $id=mysql_result($rezultat,$i,"id");
	   $upit2="UPDATE `logo`.`poruke` SET `read`=1 WHERE `poruke`.`id`=$id;";
	   //echo"$upit2";
	   if(mysql_query($upit2)){}
	   else echo "<pre><b><FONT COLOR=RED>". mysql_errno() . ": " . mysql_error(). "</FONT></b></pre>\n";
	 }
	 echo"$text <br/>Korisnik: $korisnik <br/>Datum: $date<br/>";
	 echo"</div></div></div>";
	 ++$i;
   }
  ?>
 
</div>
<form action="brisi.php">
<input type="submit" value="Obriši sve poruke" class="btn btn-primary"><br/>
</form>
</center>