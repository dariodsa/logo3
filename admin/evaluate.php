<?
  include('header.php');
?>

</script>
<div id="poc">
<div class="alert alert-success">
<link type "text/css" rel "stylesheet" href "css/bootstrap.min.css"/>
        

        <strong>L - evaluator - poruka</strong><br> Vaše rješenje je uspješno poslano na evaluaciju.
		</br> Pričekajte koju sekundu da se vaše rješenje evaluira. <br>
		 Nakon što evaluacija završi ispod ove poruke će biti prikazani rezultati. 
         </br>
</div></div>

<div class="container">
    <div class="progress progress-striped active">
       <div class="progress-bar" style="width: 0%;"></div>
    </div>
</div>

<style>
.container {
 margin-top: 30px;
	width: 400px;
	height: 580px;
	}
</style>

<script>var progress = setInterval(function () {
    var $bar = $('.progress-bar');

    if ($bar.width() >= 400) {
        clearInterval(progress);
        $('.progress').removeClass('active');
		//lovro();
		$("#poc").hide();
		$("#rezultati").show();
		
    } else {
        $bar.width($bar.width() + 100);
    }
    $bar.text($bar.width() / 4 + "%");
}, 1000);
</script>

<!--<img src="img/loader.gif" id="myDiv">-->
<div id ="rezultati">
<table class="table">
        <thead>
            <tr>
                <th>Broj test primjera</th>
                <th>Rezultat</th>
            </tr>
        </thead>
        <tbody>
        	<tr class="info">
                <td>1</td>
                <td>OK</td>
            </tr>
            <tr class="info">
                <td>2</td>
                <td>OK</td>
            </tr>
            <tr class="warning">
                <td>3</td>
                <td>Djelomični bodovi</td>
            </tr>
            <tr class="danger">
                <td>4</td>
                <td>Krivo</td>
            </tr>
        </tbody>
    
<hr>
    <div class="alert alert-info">

        
        <strong>L - evaluator - poruka</strong> <br>Ukupno ste osvojili 25 od mogućih 40 bodova.</br>
    </div>


 </div>
<footer>
<script>
$(document).ready(function(){
$("#rezultati").hide();
//$("#rezultati").delay(3000).fadeIn(3700);
});
</script>
<script>
function lovro()
{
   $("#rezultati").show();
}
</script>
<script type="text/javascript">

  (function(){
    var myDiv = document.getElementById("myDiv");
    var show = function(){
      myDiv.style.display = "block";
      setTimeout(hide, 5000);  
  }

    var hide = function(){
      myDiv.style.display = "none";
    }

    show();
  })();

</script>
</footer>