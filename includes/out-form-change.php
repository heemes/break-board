<?php require_once("session.php"); ?>
<?php require_once("db_connection_list.php"); ?>
<?php

	$sqlOut = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout='Out'";
	$resultOut = $agentconnection->query($sqlOut);

	$sqlIn = "SELECT agent, breaktype, inORout FROM breaktracker WHERE inORout='In'";
	$resultIn = $agentconnection->query($sqlIn);
	
	$delta = $resultOut - $resultIn;
	
	$totalAllowed = 3;

	function AffectOutForm() {
		if ($delta >= $totalAllowed) {
			echo '<script>
				var thisForm = document.getElementById("myoutform");
				thisForm.style.display = "hide";
			</script>'
			;} else {
			echo '<script>			
				function showOutForm() {
					var thisForm = document.getElementById("myoutform");
					thisForm.style.display = "";
				}
			</script>'
		;}
	;}
?>