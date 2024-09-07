<?php include_once("../session.php"); ?>
<?php include_once("../db_connection_list.php"); ?>
<?php 
	if (!isset($layout_context)) {
		$layout_context = "public";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />

		<title>THS Break Board<?php if ($layout_context == "admin") { echo "Admin"; } ?></title>
	<?php

	$sqlOut = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout=' Out '";
	$resultOut = $agentconnection->query($sqlOut);
	$totalOut = mysqli_num_rows($resultOut);

	$sqlIn = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout=' In '";
	$resultIn = $agentconnection->query($sqlIn);
	$totalIn = mysqli_num_rows($resultIn);
	
	$delta = $totalOut - $totalIn;
	
	$totalAllowed = 3;
	
	if ($delta > 2) {
		echo '<link href="../../breakboard/public/stylesheets/public-disable-outform-display.css" media="all" rel="stylesheet" type="text/css" />';
	} else {
		echo '<link href="../../breakboard/public/stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />';
	}
	
	?>
	
	<meta http-equiv="refresh" content="60">

</head>
<body>
    <div id="header">
	      <h1>THS Break Board - <?php echo "Total Out Right Now = " . $delta; ?><?php if ($layout_context == "admin") { echo "Admin"; } ?></h1>
	      
	      <h3 style="float-right"></h3></h3>
    </div>
