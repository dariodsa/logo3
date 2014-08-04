<?
  include ('header.php')
?>

	<header>
	<div class="container">
			
			
			
			<h1><i class="fa fa-puzzle-piece fa-align-left"></i> <a href="/evaluate.php?id=cezar">Kvadrat</a> </h1>
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

				<p>Napiši program <b>kvadrat :a</b> koji æe nacrtati kvadrat stranice duljine a. <br>Pozicija na ekranu <b>nije</b> bitna.</br> </p>
			</div>
			
			<hr />
			
			
			
		
		<div class=''>			
			
				<form class="form-inline" name="submit solution" action="evaluate.php" method="post"  enctype="multipart/form-data"> 
		    	
					<div class="form-group">
						<label for='file'  class="sr-only">Datoteka:</label>
						<input id="fileselect" type="file" accept=".lgo" style="position:absolute;visibility:hidden;" onchange="document.getElementById('dummyfile').value=this.value"> 
					<input type="submit" class="btn btn-primary btn-sldata-dismiss="alert" aria-hidden="true" value="Odaberi rješenje" onclick="document.getElementById('fileselect').click();return false;"> 

						</div>
					
					
					<div class="form-group">
			<div id="salji">
				 <input type="submit" class="btn btn-danger form-control" data-dismiss="alert" aria-hidden="true" value="Pošalji rješenje">
					</div>
					</div>
				</form>
				
				<br />
					
		</div>
		
		
		
		
	</div>
	

</header>

<footer>
<script>
$(document).ready(function(){
  $("#poruka").hide();
  $("#salji").click(function(){
    $("#poruka").fadeIn();
  });
});
</script>

</footer>