<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/db_allowed.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/layouts/header.php"); ?>

<html>
	<head>
		<title>THS Break Board<?php if ($layout_context == "admin") { echo "Admin"; } ?></title>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<meta http-equiv="refresh" content="120">
	</head>
	<body>
    <div id="header">
	      <h1>THS Break Board (just query)<?php if ($layout_context == "admin") { echo "Admin"; } ?></h1>
    </div>

			<?php
			$sql = "SELECT * FROM breaktracker WHERE inORout='In'";
			$result = $agentconnection->query($sql);

			$rows_count_value = mysqli_num_rows($result);
 
			echo $rows_count_value; 

			$agentconnection->close();
			?>