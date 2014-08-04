<?
include ('header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>

    <script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="style/jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />

    <script type="text/javascript" src="scripts/jHtmlArea-0.8.js"></script>
    <link rel="Stylesheet" type="text/css" href="style/jHtmlArea.css" />
    
    <style type="text/css">
        /* body { background: #ccc;} */
        div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url(images/disk.png) no-repeat;
            background-position: 0 0;
        }
        
        div.jHtmlArea { border: solid 1px #ccc; }
    </style>
<script type="text/javascript">    
        // You can do this to perform a global override of any of the "default" options
        // jHtmlArea.fn.defaultOptions.css = "jHtmlArea.Editor.css";

        $(function() {
            //$("textarea").htmlarea(); // Initialize all TextArea's as jHtmlArea's with default values

            $("#txtDefaultHtmlArea").htmlarea(); // Initialize jHtmlArea's with all default values

            $("#txtCustomHtmlArea").htmlarea({
                // Override/Specify the Toolbar buttons to show
                toolbar: [
                    ["bold", "italic", "underline", "|", "forecolor"],
                    ["p", "h1_a", "h2_a", "h3_a", "h4_a", "h5_a", "h6_a"],
                    ["link", "unlink", "|", "image"],                    
                    [{
                        // This is how to add a completely custom Toolbar Button
                        css: "custom_disk_button",
                        text: "Save",
                        action: function(btn) {
                            // 'this' = jHtmlArea object
                            // 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
                            alert('SAVE!\n\n' + this.toHtmlString());
                        }
                    }]
                ],

                // Override any of the toolbarText values - these are the Alt Text / Tooltips shown
                // when the user hovers the mouse over the Toolbar Buttons
                // Here are a couple translated to German, thanks to Google Translate.
                toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
                        "bold": "fett",
                        "italic": "kursiv",
                        "underline": "unterstreichen"
                    }),

                // Specify a specific CSS file to use for the Editor
                css: "style//jHtmlArea.Editor.css",

                // Do something once the editor has finished loading
                loaded: function() {
                    //// 'this' is equal to the jHtmlArea object
                    //alert("jHtmlArea has loaded!");
                    //this.showHTMLView(); // show the HTML view once the editor has finished loading
                }
            });
        });
    </script>
	 
<div class="container">
	<h3>Novi zadatak</h3>
		
		
		
		<div class="col-md-4">
			<form class="form" method="POST" action="/login.php">
				<div class="form-group">
					<label for="username">Ime</label>
					<input type="text" name="username" id="username" autofocus="autofocus" class="form-control" placeholder="">					
				</div>
				<div class="form-group">
					<label for="bb">Broj bodova</label>
					<input type="number" name="bb" id="bb" class="form-control" placeholder="">
				</div>
				<label for="text">Tekst zadatka</label>
				 <textarea id="txtDefaultHtmlArea" cols="80" rows="15" name="text">
				   Dario
				 </textarea>
					
	<!--Lovro -->
	<br>
	<center>
<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
</center>-->

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
