<?
error_reporting(0);
for($i=0;$i<10;++$i){$output = shell_exec('Logo.exe <input.txt ');echo"<pre>$output</pre><br>";}
?>