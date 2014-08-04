<?
/*rmdir('../sustav/poslano/4');
mkdir('../sustav/poslano/4');*/
include('baza.php');
session_start();
//echo($_SESSION['ime']);
$id=$_POST['id'];
//echo"<br>";
//echo($_FILES['file']['tmp_name']);
$myFile = "testFile.txt";
$fh = fopen("../sustav/4.txt", 'w');
fwrite($fh,"Generiranje slike");
//echo('../sustav/poslano/'.$_SESSION['ime'].'.'.$id.'.lgo');
if(copy ($_FILES['file']['tmp_name'], '../sustav/poslano/'.$_SESSION['ime'].'.'.$id.'.lgo')==true){echo"Jupi<br>";}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">


getOutput();
function FileHelper()
{}
{
    FileHelper.readStringFromFileAtPath = function(pathOfFileToReadFrom)
    {
        var request = new XMLHttpRequest();
        request.open("GET", pathOfFileToReadFrom, false);
        request.send(null);
        var returnValue = request.responseText;
		//alert(returnValue);
        return returnValue;
    }
}

function myTimer()
{
 var text = FileHelper.readStringFromFileAtPath ( "../sustav/4.txt?ime=ds" );
 document.getElementById("demo").innerHTML = text;
 if( text[0]=='O')
 {
   document.getElementById("dario").src = "";
}
 else document.getElementById("dario").src="load.gif";
 
 clearInterval(myVar);
}
//----------------------------------------------------------
function getOutput() {
  getRequest(
      '../sustav/dario3.php?ime=<?echo"".$_SESSION['ime'].".".$id.".lgo&id=".$id."";?>', // URL for the PHP file
       drawOutput,  // handle successful request
       drawError    // handle error
  );
  var myVar=setInterval(function(){myTimer()},530);
  return false;
}  
// handles drawing an error message
function drawError () {
    var container = document.getElementById('output');
    container.innerHTML = 'Bummer: there was an error!';
}
// handles the response, adds the html
function drawOutput(responseText) {
    var container = document.getElementById('output');
    container.innerHTML = responseText;
	var myVar=myTimer();//setInterval(function(){myTimer()},530);
}
// helper function for cross-browser request object
function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req .readyState == 4){
            return req.status === 200 ? 
                success(req.responseText) : error(req.status)
            ;
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}
</script>
<img id="dario" src="load.gif" >
<text id="demo">
<p id="output" type="hidden"/>
</html>
<?

//shell_exec('evaluator 3 60');
?>