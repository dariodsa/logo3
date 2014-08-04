<?
  include('header.php');
?>
<!DOCTYPE html>

<html>

<div class="container">
<!--	<h1>Prijava</h1>-->
		<!--	<div class="alert alert-info"><strong>Dobro došao korisniče!</strong></div>  -->
<h3>Popis zadataka</h3>			
	<br>
 <form action ="dodaj_zadatak.php">	
	<span class="pull-center">
						<input type="submit" value="Dodaj novi zadatak" class="btn btn-primary">
					</span>
 </form>
	<br><br><br>
	<table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Broj</th>  
            <th>Ime zadatka</th>  
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>1.</td>  
            <td>Kvadrat </td>  
          </tr>  
          <tr>  
            <td>2.</td>  
            <td>Catalanovi brojevi</td>  
          </tr>  
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
   <br>
					
</html>		