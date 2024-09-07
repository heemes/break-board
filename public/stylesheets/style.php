<?php require_once("../../includes/db_connection_list.php"); ?>
<?php
    header("Content-type: text/css; charset: UTF-8");
	
	$sqlOut = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout='Out'";
	$resultOut = $agentconnection->query($sqlOut);

	$sqlIn = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout='In'";
	$resultIn = $agentconnection->query($sqlIn);
	
	$delta = $resultOut - $resultIn;
	
	$totalAllowed = 3;

	if ($delta >= $totalAllowed) {
		#myoutform {
			style.display : "hide";
		}
		else {
			style.display : "";
		}
?>	
	
// Site Colors:
//  #1A446C - blue grey
//  #689DC1 - light blue
//  #D4E6F4 - very light blue
//  #EEE4B9 - light tan
//  #8D0D19 - burgundy

html { height: 100%; width: 100%; }

body {
  width: 100%; height: 100%; 
  margin: 0; padding: 0; border: 0;
  font-family: Verdana, Arial, Helvetica, sans-serif; 
  font-size: 13px; line-height: 15px;
  background: #EEE4B9;
}
img { border: none; }
a { color: #8D0D19; }
a:hover { color: #1A446C; }
	
#header { 
	height: 70px; 
	margin: 0; padding: 0; text-align: left; 
  background: #1A446C; color: #D4E6F4;
}
#header h1 { padding: 1em; margin: 0; }
#main { 
	height: 600px; width: 100%; 
	margin: 0; padding: 0; 
	background: #EEE4B9;
}
#footer { 
	clear: both;
	height: 2em; margin: 0; padding: 1em; 
	text-align: center; 
  background: #1A446C;  color: #D4E6F4;
}

/* Navigation */
#navigation { 
	float: left;
	width: 150px; height: 100%; 
	margin: 0; padding: 0 2em; 
	color: #D4E6F4; background: #8D0D19;
}
#navigation a { color: #D4E6F4; text-decoration: none; }
#navigation a:hover { color: #FFFFFF; }
ul.subjects { 
	margin: 1em 0; padding-left: 0; list-style: none;
}
ul.pages { padding-left: 2em; list-style: square; font-weight: normal; }
.selected { font-weight: bold; }

/* Page Content */
#page { 
	float: left; height: 100%;
	padding-left: 2em; vertical-align: top; 
	background: #EEE4B9;
}
#page h2 { color: #8D0D19; margin-top: 1em;}
#page h3 { color: #8D0D19; }
.view-content {
	margin: 1em; padding: 1em; border: 1px solid #999;
}

/* Form Styles */
form.myoutform.hide {
	display: none;
}

form.myoutform.show {
	display: block;
}

div.message { 
	border: 2px solid #8D0D19;
	color: #8D0D19; font-weight: bold;
	margin: 1em 0 ; padding: 1em; 
}

/* errors */
.error {
	color: #8D0D19; border: 2px solid #8D0D19;
	margin: 1em 0; padding: 1em;
}
.error ul { padding-left: 2em; }

?>
