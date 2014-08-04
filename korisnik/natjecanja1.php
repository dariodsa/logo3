<?
  include('header.php');
?>

<div class="container">
<!--	<h1>Prijava</h1>-->
	<!--	<br></br>-->
<!--			<div class="alert alert-info"><strong>Test</strong></div>  -->
<h3>Popis natjecanja</h3>			
		<table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Broj</th>  
            <th>Naziv natjecanja</th>
			<th>Status</th>  	
          </tr>  
        </thead>  
        <tbody>  
          <!--<tr>  
            <td>1.</td>  
            <td>Školsko natjecanje 2015.</td>  
			<td>Počinje za...</td>
		  </tr> --> 
          <?
		  include('baza.php');
		  $upit="SELECT * FROM natjecanja ORDER BY pocetak";
		  $rezultat=$con->prepare($upit);
		  $rezultat->execute();
		  $i=0;
		  while($row=$rezultat->fetch(PDO::FETCH_ASSOC))
		  {
			 $ime=$row['ime'];//mysql_result($rezultat,$i,"ime");
			 $poc=$row['pocetak'];//mysql_result($rezultat,$i,"pocetak");
			 $kraj=$row['kraj'];//mysql_result($rezultat,$i,"kraj");
			 //echo"$poc $kraj<br>";
			 $y1=$poc[0].$poc[1].$poc[2].$poc[3];
			 $mi1=$poc[5].$poc[6];
			 $mi2=$kraj[5].$kraj[6];
			 $n1=$poc[8].$poc[9];
			 $h1=$poc[11].$poc[12];
			 $m1=$poc[14].$poc[15];
			 $s1=$poc[17].$poc[18];
			 $n2=$kraj[8].$kraj[9];
			 $y2=$kraj[0].$kraj[1].$kraj[2].$kraj[3];
			 $h2=$kraj[11].$kraj[12];
			 $m2=$kraj[14].$kraj[15];
			 $s2=$kraj[17].$kraj[18];
			 echo"<script type='text/javascript'>
				var myVar=setInterval(function(){myTimer$i()},100);
				myTimer$i();
				function myTimer$i() {
					var d$i = new Date();
					var mi$i=parseInt($mi1);
					var n1$i=parseInt($n1);
					var h1$i=parseInt($h1);
					var m1$i=parseInt($m1);
					var s1$i=parseInt($s1);
					var y1$i=parseInt($y1);
					
					var mi2$i=parseInt($mi2);
					var n2$i=parseInt($n2);
					var h2$i=parseInt($h2);
					var m2$i=parseInt($m2);
					var s2$i=parseInt($s2);
					var y2$i=parseInt($y2);
					
					var date$i=new Date();
					date$i.setFullYear(y1$i);
					date$i.setMonth(mi$i-1);
					date$i.setDate(n1$i);
					date$i.setHours(h1$i);
					date$i.setMinutes(m1$i);
					date$i.setSeconds(s1$i);
					var date2$i=new Date();
					//alert((date2$i).toString());
					date2$i.setFullYear(y2$i);
					date2$i.setMonth(mi2$i-1);
					date2$i.setDate(n2$i);
					date2$i.setHours(h2$i);
					date2$i.setMinutes(m2$i);
					date2$i.setSeconds(s2$i);
					//alert((date2$i).toString());
					//alert((d$i).toString());
					if(date2$i.getTime()<d$i.getTime())
					{
    				  document.getElementById('demo$i').innerHTML ='Gotovo';
					  return;
					}
					if(date$i.getTime()<d$i.getTime())
					{
					   var razlika=date2$i.getTime()-d$i.getTime();
					   var poruka='';
					   if(razlika>3600*1000*24*30)
					   {
					      var broj=parseInt(razlika/(3600*1000*24*30));
						  poruka+=broj.toString()+' mjeseci ';
						  razlika-=broj*3600*1000*24*30;
					   }
					   if(razlika>3600*1000*24)
					   { 
					      var broj=parseInt(razlika/(3600*1000*24));
						  poruka+=broj.toString()+' dana ';
						  razlika-=broj*3600*1000*24;
						 
					   }
					   if(razlika>3600*1000)
					   {
					      var broj=parseInt(razlika/(3600*1000));
						  poruka+=broj.toString()+' sati ';
						  razlika-=broj*3600*1000;
					   }
					   if(razlika>1000*60)
					   {
					      var broj=parseInt(razlika/(1000*60));
						  poruka+=broj.toString()+' minuti ';
						  razlika-=broj*60*1000;
					   }
					   if(razlika>1000)
					   {
					      var broj=parseInt(razlika/(1000));
						  poruka+=broj.toString()+' sekundi ';
					   }
					   document.getElementById('demo$i').innerHTML ='Završava za '+poruka;
					   return;
					}
					  //document.getElementById('demo$i').innerHTML ='Još nije počelo';
					  var razlika=date$i.getTime()-d$i.getTime();
					  var poruka='';
					   if(razlika>3600*1000*24*30)
					   {
					      var broj=parseInt(razlika/(3600*1000*24*30));
						  poruka+=broj.toString()+' mjeseci ';
						  razlika-=broj*3600*1000*24*30;
					   }
					   if(razlika>3600*1000*24)
					   { 
					      var broj=parseInt(razlika/(3600*1000*24));
						  poruka+=broj.toString()+' dana ';
						  razlika-=broj*3600*1000*24;
						 
					   }
					   if(razlika>3600*1000)
					   {
					      var broj=parseInt(razlika/(3600*1000));
						  poruka+=broj.toString()+' sati ';
						  razlika-=broj*3600*1000;
					   }
					   if(razlika>1000*60)
					   {
					      var broj=parseInt(razlika/(1000*60));
						  poruka+=broj.toString()+' minuti ';
						  razlika-=broj*60*1000;
					   }
					   if(razlika>=1000)
					   {
					      var broj=parseInt(razlika/(1000));
						  poruka+=broj.toString()+' sekundi ';
					   }
					   document.getElementById('demo$i').innerHTML ='Počinje za '+poruka;
					   return;
					   return;
					//document.getElementById('demo$i').innerHTML = string$i;//d.toLocaleTimeString();
					
				}
				</script>";
			 echo"<tr>";
			 $j=$i+1;
			 echo"<td>$j</td>";
			 echo"<td>$ime</td>";
			 echo"<td><p id=demo$i></p></td>";
			 echo"</tr>";
			 $i++;
		  }
		  
		  /*$datetime =date("d H i s",time());/* new DateTime($dateTimeString);
		  $n1=$datetime->format('d');
		  $h1=$datetime->format('H');
		  $m1=$datetime->format('i');
		  $s1=$datetime->format('s');*/
		  /*while($i<$broj_redova)
		  {
		     $ime=mysql_result($rezultat,$i,"ime");
			 $poc=mysql_result($rezultat,$i,"pocetak");
			 $kraj=mysql_result($rezultat,$i,"kraj");
			 $n1=$poc[8].$poc[9];
			 $h1=$poc[11].$poc[12];
			 $m1=$poc[14].$poc[15];
			 $s1=$poc[17].$poc[18];
			 $n2=$kraj[8].$kraj[9];
			 $h2=$kraj[11].$kraj[12];
			 $m2=$kraj[14].$kraj[15];
			 $s2=$kraj[17].$kraj[18];
			 echo"<script>
				var myVar=setInterval(function(){myTimer$i()},100);
				myTimer$i();
				function myTimer$i() {
					var d = new Date();
					var n=d.getDate();
					var h=d.getHours();
					var m=d.getMinutes();
					var s=d.getSeconds();
					var n1=parseInt($n1);
					var h1=parseInt($h1);
					var m1=parseInt($m1);
					var s1=parseInt($s1);
					var n2=parseInt($n2);
					var h2=parseInt($h2);
					var m2=parseInt($m2);
					var s2=parseInt($s2);
					var string='';
					if(n1-n>0){string+='za '+(n1-n).toString()+' dana ';}
					if(h1-h>0){string+='za '+(h1-h).toString()+' sati ';}
					if(m1-m>0){string+='za '+(m1-m-1).toString()+' minuta ';}
					if(s-s1>0){string+='za '+(60-(s-s1)).toString()+' sekundi ';}
					if(n1-n<=0 && h1-h<=0 && m1-m<=0)
					{
					  var string2='';
					  if(n2-n>0){string2+='je '+(n2-n).toString()+' dana ';}
					  if(h2-h>0){string2+='je '+(h2-h).toString()+' sati ';}
					  if(m2-m-1>0){string2+='je '+(m2-m-1).toString()+' minuta ';}
					  if(s-s2>0){string2+='je '+(60-(s-s2)).toString()+' sekundi ';}
					  //document.getElementById('demo$i').innerHTML ='Natjecanje je počelo';
					  document.getElementById('demo$i').innerHTML ='Do kraja '+string2;
					  if(n2-n<=0 && h2-h<=0 && m2-m<=0){document.getElementById('demo$i').innerHTML='Gotovo';return;}
					}
					else document.getElementById('demo$i').innerHTML = string;//d.toLocaleTimeString();
					
				}
				</script>";
			 echo"<tr>";
			 $j=$i+1;
			 echo"<td>$j</td>";
			 echo"<td>$ime</td>";
			 echo"<td><p id=demo$i></p></td>";
			 echo"</tr>";
			 ++$i;
		  }*/
		  ?>
		  <!--<tr>  
            <td>2.</td>  
            <td>Kvalifikacije za Školsko natjecanje 2015.</td>  
            <td>Gotovo</td>
		  </tr>  -->
         </tbody>  
      </table>  
</html>		