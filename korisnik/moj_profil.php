<?
include ('header.php');
?>
<div class="text-center">
		<h2 class="text-center">Moj profil</h2><hr>
		<img src="img/korisnik.png" class="ng-scope" ng-if="!profile.image"  width="80"><br>
		<span class="ng-binding">Lovro Sindičić</span><br>
			<small>Natjecateljski profil</small>
</div>
<div class="row even ng-scope">
	<!--<div class="col-md-4">

		<div class="form-group">
			<label>E-mail adresa</label><br>
			<input class="form-control ng-pristine ng-valid" ng-model="profile.email" type="text">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Razred:</label>
			<input class="form-control ng-pristine ng-valid" ng-model="profile.school_start_year" type="text">
		</div>
	</div>
-->
</div>

<div class="row odd ng-scope">

	<div class="col-md-4">
		<div class="form-group">
			<label>Škola:</label>
			<input class="form-control ng-pristine ng-valid" ng-model="profile.school" type="text">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label>Grad:</label>
			<input class="form-control ng-pristine ng-valid" ng-model="profile.city" type="text">
		</div>
	</div>



</div>

</div>
<!-- -->
  