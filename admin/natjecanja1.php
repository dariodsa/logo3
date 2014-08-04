<?
  include('header.php');
?>

<div class="container">
<!--	<h1>Prijava</h1>-->
	<!--	<br></br>-->
<!--			<div class="alert alert-info"><strong>Test</strong></div>  -->
<h3>Popis natjecanja</h3>			
	<br>
 <form action ="dodaj_natjecanje.php">	
	<span class="pull-center">
						<input type="submit" value="Dodaj novo natjecanje" class="btn btn-primary">
					</span>
 </form><br>
		<table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Broj</th>  
            <th>Naziv natjecanja</th>
			<th>Status</th>  	
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>1.</td>  
            <td>Školsko natjecanje 2015.</td>  
			<td>Počinje za...</td>
		  </tr>  
          <tr>  
            <td>2.</td>  
            <td>Kvalifikacije za Školsko natjecanje 2015.</td>  
            <td>Gotovo</td>
		  </tr>  
         </tbody>  
      </table>  
</html>		