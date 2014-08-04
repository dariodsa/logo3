<?
  include('header.php');
?>
<!DOCTYPE html>

<html>

<div class="container">
<!--	<h1>Prijava</h1>-->
		<!--	<div class="alert alert-info"><strong>Dobro došao korisniče!</strong></div>  -->
<h3>Popis zadataka</h3>			
	
	<table class="table table-striped">  
       <thead>  
          <tr>  
            <th>Broj</th>  
            <th>Ime zadatka</th>  
          </tr>  
        </thead>  
        <tbody>  
        <!--  <tr>  
            <td>1.</td>  
            <td>Kvadrat </td>  
          </tr>  
          <tr>  
            <td>2.</td>  
            <td>Catalanovi brojevi</td>  
          </tr>  -->
         <?
		 include('baza.php');
		 $id=0;
		 if(isset($_GET['id']))$id=$_GET['id'];
		 $upit="SELECT * FROM zadaci LIMIT 0,30";
		 $rezultat=mysql_query($upit);
		 $num=mysql_numrows($rezultat);
		 $i=0;
		 $broj=1;
		 while($i<$num)
		 {
		   if($i==31)break;
		   $id=mysql_result($rezultat,$i,"id");
		   $ime=mysql_result($rezultat,$i,"ime");
		   echo"<tr>  
            <td>$broj.</td>  
            <td>";echo'<a style="text-decoration:none;"';echo" href=zadatak.php?id=$id><font color='#0D3A62'>$ime</font></a> </td>  
          </tr>  ";
		  ++$i;
		  ++$broj;
		  }
		 ?>
		 </tbody>  
      </table> 
  
		  <ul class="pagination">
		  <li class="active"><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		  <li><a href="#">»</a></li>
		</ul>	  
   </div>
</html>		