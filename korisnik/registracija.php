<?
include('header.php')
?>
<script>
jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password").val();
        var checkVal = $("#password-check").val();
        if (passwordVal == '') {
            $("#password").after('<span class="error">Unesite lozinku.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#password-check").after('<span class="error">Unesite svoju lozinku.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#password-check").after('<span class="error">Lozinke se ne podudaraju.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});
</script>
<body>
<div class="col-md-4">
			<form class="form" method="POST" action="provjera.php">
		<!--		<span class="help-block">Koristite vaše <a href="http://zatemas.zrs.hr/" target="_blank">ZATEMAS</a> login podatke</span>  -->
				<div class="form-group">
					<label for="username">Ime i prezime</label><input name="username" id="username" autofocus="autofocus" class="form-control" placeholder="Npr. Ivo Ivić" type="text">					
				</div>
				<div class="form-group">
					<label for="password">Email</label>
					<input name="password" id="password" class="form-control" placeholder="Npr. ivo@ivic.hr" type="email">
				</div>
				<div class="form-group">
					<label for="password">Korisničko ime</label>
					<input name="name" id="name" class="form-control" placeholder="Npr. ivo_ivic" type="name">
				</div>
			    
				<div class="form-group">
					<label for="password">Lozinka</label>
					<input name="password" id="password" class="form-control" placeholder="Preporuka je da bude duža od 8 znakova. " type="password">
				</div>
			    <div class="form-group">
					<label for="password">Ponovljeni unos lozinke</label>
					<input name="password-check" id="password-check" class="form-control" placeholder="" type="password">
				</div>
			    
				<div class="form-group">
					<input value="Pošalji" class="btn btn-primary" type="submit" value="Submit" id="submit">
				</div>
			</form>
			<br><br>
		</div>
</body>