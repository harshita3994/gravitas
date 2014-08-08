<html>
<head>
<!--
	AutoComplete Field - HTML Code

	This is a sample source code provided by fromvega.
	Search for the complete article at http://www.fromvega.com

	Enjoy!
-->
<link rel="stylesheet" href="autocomplete.css" type="text/css" media="screen">
<script src="jquery.js" type="text/javascript"></script>
<script src="dimensions.js" type="text/javascript"></script>
<script src="autocomplete.js" type="text/javascript"></script>

<script type="text/javascript">
	$(function(){
	    setAutoComplete("searchField", "results", "autocomplete.php?part=");
	});
	function clicky(){
			var html = "<img src='../../img/loading.gif' />";
			document.getElementById("show").innerHTML = html;
			var event = document.getElementById("searchField").value;
			
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
				{
					document.getElementById("show").innerHTML = '';
					document.getElementById("show").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","events_participants_ajax.php?event="+event,true);
			xmlhttp.send();
	}
</script>
</head>

<body>
	
		
		<input id="searchField" name="searchField" type="text" />
		<input type="button" id="search_button" onclick = "clicky()" value="Get Details"/>
		<div id="show">
		</div>
</body>

</html>