<?php require_once("session.php"); ?>
<?php require_once("db_connection_list.php"); ?>
<html>
	<head>
	<?php

	$sqlOut = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout=' Out '";
	$resultOut = $agentconnection->query($sqlOut);
	$totalOut = mysqli_num_rows($resultOut);

	$sqlIn = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout=' In '";
	$resultIn = $agentconnection->query($sqlIn);
	$totalIn = mysqli_num_rows($resultIn);
	
	$delta = $totalOut - $totalIn;
	
	$totalAllowed = 3;
	
	?>
	</head>
	<body>
<?php

	$query = "SELECT * FROM breaktracker ORDER by id ASC";

	if ($result = mysqli_query($agentconnection, $query)) {

		/* fetch associative array */
		while ($row = mysqli_fetch_assoc($result)) {
			printf ("%s %s %s %s\n", $row['agent'], $row['breaktype'], $row['inORout'], $row['time']);
			echo ("<br />");
			echo ("<br />");
			echo ("<br />");
		}
		
	}

?>
<?php
	
	echo "Total Allowed = " . $totalAllowed . "<br />";
	echo "Total Out = " . $totalOut . "<br />";
	echo "Total In = " . $totalIn . "<br />";
	echo "Difference = " . $delta . "<br />";
	
?>
