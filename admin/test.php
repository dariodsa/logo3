<?
include ('header.php');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
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
.lovro1
{
   
   color: #0055ae;
}
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
Moguće karakteristike zadatka
<li class="ui-state-default">Bitna pozicija na ekranu</li>
<li class="ui-state-default">Vremenski limit</li>
<li class="ui-state-default">Briši ekran</li>
<li class="ui-state-default">Tekstualni ispis </li>
<li class="ui-state-default">Test</li>
</ul>
<ul id="sortable2" class="connectedSortable">
Ovdje ubaciti karaktersitike za novi zadatak  
</ul>
</body>
</center>
<br><br> 
<input type="submit" value="Dodaj" class="btn btn-primary">	
</html>