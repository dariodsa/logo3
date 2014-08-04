<?
  //error_reporting(NULL);
  include ('header.php');
  include('baza.php');
  $id=$_GET['id'];
  $upit="SELECT * FROM zadaci WHERE ID=$id";
  $query=mysql_query($upit);
  $broj_redova=mysql_numrows($query);
  $i=0;
  $naslov=mysql_result($query,0,"ime");
  $tekst=mysql_result($query,0,"tekst");
  
?>

	<header>
	<div class="container">
			
			
			
			<h1><i class="fa fa-puzzle-piece fa-align-left"></i> <a href="/evaluate.php?id=cezar"><? echo"$naslov";?></a> </h1>
			<div>
				
				<form name="submit solution" class="form-inline" action="/evaluate.php" method="post" target="frame" enctype="multipart/form-data">
				  <div class="form-group">
						<span rel="tooltip" title="Vremensko ogranièenje"><i class="fa fa-clock-o"></i> 1000 ms </span>
						<span>&nbsp;&nbsp;</span>
						<span rel="tooltip" title="Maksimalni bodovi"><i class="fa fa-trophy"></i> 50 bodova</span>
						<span>&nbsp;&nbsp;</span>
						<span rel="tooltip" title="Datum unosa"><i class="fa fa-calendar"></i> 2014-04-04 21:21:55</span>
					</div>
					
					<div class="form-group pull-right">
						<input type="hidden" name="action" value="test_official" />
						<input type="hidden" name="taskId" value="cezar" />
						</div>
				</form>		
				<br>

				<?echo"$tekst"; ?> </p>
			</div>
			
			<hr />
			
			
			
		
		<div class=''>			
			
				<form class="form-inline" name="submit solution" action="dario.php" method="post"  enctype="multipart/form-data"> 
		    	
					<div class="form-group">
						<label for='file'  class="sr-only">Datoteka:</label>
						<input name="filea" id="filea" type="file" accept=".lgo" style="position:absolute;visibility:hidden;" onchange="document.getElementById('dummyfile').value=this.value"> 
					<input type="file" id="file" name="file" class="btn btn-primary btn-sldata-dismiss="alert" aria-hidden="true" value="Odaberi rješenje" onclick="document.getElementById('fileselect').click();return false;"> 

						</div>
					
					<?
					echo"<input type=hidden name=id value=$id />";
					?>
					<div class="form-group">
			<div id="salji">
				 <input type="submit" class="btn btn-danger form-control" id="lovro"   value="Pošalji rješenje">
					</div>
					</div>
				</form>
				
				<br />
					
		</div>
		
		
		
		
	</div>
	

</header>

<footer>
<script>
<script type="text/javascript">
 
$('input:Odaberi rješenje').click(function(){
//	$('p').text("Form submiting.....").addClass('submit');
	$('input:Pošalji rješenje').attr("disabled", true);	
});
</script>

</footer>