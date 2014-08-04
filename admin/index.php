<?
include ('header.php');
?>
<div class="container">
	<h3>Prijava</h3>
		
		
		
		<div class="col-md-4">
			<form class="form" method="POST" action="/login.php">
				<div class="form-group">
					<label for="username">Korisnik</label>
					<input type="text" name="username" id="username" autofocus="autofocus" class="form-control" placeholder="">					
				</div>
				<div class="form-group">
					<label for="password">Lozinka</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="">
				</div>
				<div class="form-group">
					<input type="submit" value="Prijavi me" class="btn btn-primary">
					<span class="pull-right">
						<!--<a href="registracija.php">Registracija</a>-->
					</span>
				</div>
			</form>
			<br><br>
		</div>		
		
		
</div>

