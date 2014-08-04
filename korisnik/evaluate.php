<?
  include('header.php');
?>
<div class="alert alert-success">

        

        <strong>Logo evaluator - poruka</strong><br> Va�e rje�enje je uspje�no poslano na evaluaciju.
		</br> Pri�ekajte koju sekundu da se va�e rje�enje evaluira. <br>
		 Nakon �to evaluacija zavr�i ispod ove poruke �e biti prikazani rezultati. 
         </br>
</div>
<img src="img/loader.gif" id="myDiv">
<div id ="rezultati">
<table class="table">
        <thead>
            <tr>
                <th>Broj test primjera</th>
                <th>Rezultat</th>
            </tr>
        </thead>
        <tbody>
        	<tr class="success">
                <td>1</td>
                <td>OK</td>
            </tr>
            <tr class="success">
                <td>2</td>
                <td>OK</td>
            </tr>
            <tr class="warning">
                <td>3</td>
                <td>Djelomi�ni bodovi</td>
            </tr>
            <tr class="danger">
                <td>4</td>
                <td>Krivo</td>
            </tr>
        </tbody>
    
<hr>
    <div class="alert alert-info">

        
        <strong>Logo evaluator - poruka</strong> <br>Ukupno ste osvojili 25 od mogu�ih 40 bodova.</br>
    </div>


 </div>
<footer>
<script>
$(document).ready(function(){
$("#rezultati").hide();
$("#rezultati").delay(5000).fadeIn(4700);
});
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