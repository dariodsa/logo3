<?
include ('header.php');
?>
<div class="container">
	<h3>Novo natjecanje</h3>
		
		
		
		<div class="col-md-4">
			<form class="form" method="POST" action="/login.php">
				<div class="form-group">
					<label for="username">Naziv</label>
					<input type="text" name="username" id="username" autofocus="autofocus" class="form-control" placeholder="">					
				</div>
				<div class="form-group">
					<!--<label for="bb">Ukupno trajanje</label>
					<input type="number" name="bb" id="bb" class="form-control" placeholder="">
					      <div class="input-group_addon">Izraziti vrijeme u satima. Npr. 3 ili 2.5</div>-->
				    Birthday (date and time): Birthday: <input type="date" name="bday">
				</div>
				<label for="text">Opis</label>
				<textarea class="form-control" rows="5" id="text"></textarea>
					
	<!--Lovro -->
	<br>
	<center>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<style>
#sortable1, #sortable2 {
border: 3px solid #95A5C5;
width: 142px;
min-height: 20px;
list-style-type: none;
margin: 0;
padding: 5px 0 0 0;
float: left;
margin-right: 10px;
}
#sortable1 li, #sortable2 li {
margin: 0 5px 5px 5px;
padding: 5px;
font-size: 1.2em;
width: 120px;
}
</style>
<script>
$(function() {
$( "#sortable1, #sortable2" ).sortable({
connectWith: ".connectedSortable"
}).disableSelection();
});
</script>
</head>
<body>
<ul id="sortable1" class="connectedSortable">
Moguće karakteristike natjecanja
<li class="ui-state-default">Pokrenuti natjecanje klikom miša</li>
<li class="ui-state-default">Live - score</li>
<li class="ui-state-default">Test1</li>
<li class="ui-state-default">Test2</li>
<li class="ui-state-default">Test3</li>
</ul>
<ul id="sortable2" class="connectedSortable">
Ovdje ubaciti karaktersitike za novo natjecanje  
</ul>
</body>
</center>

		<!--Lovro-->
		<div class="col-md-6">
				<div class="form-group">
				<!--	<input type="submit" value="Spremi" class="btn btn-primary">-->
					<span class="pull-right">
						<!--<a href="registracija.php">Registracija</a>-->
					</span>
				</div>
			</form>
			<br><br>
		</div>	
		
		
</div>
</div>
<br><br>
		<center><input type="submit"  value="Spremi" class="btn btn-primary"></center>
