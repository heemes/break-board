<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php


if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))):

	if (isset($_POST['agent'])) { $agent = $_POST['agent']; }
	if (isset($_POST['breaktype'])) { $breaktype = $_POST['breaktype']; }
	if (isset($_POST['inORout'])) { $inORout = $_POST['inORout']; }
	if (isset($_POST['time'])) { $time = $_POST['time']; }
	
	$formerrors = false;

	if ($agent === '') :
		$err_agent = '<div class="error">Sorry, your name is a required field</div>';
		$formerrors = true;
	endif; // input field empty

	if ($breaktype === '') :
		$err_breaktype = '<div class="error">Sorry, break type is a required field</div>';
		$formerrors = true;
	endif; // input field empty

	if ($inORout === '') :
		$err_inORout = '<div class="error">Sorry, you have to say whether you are leaving or returning</div>';
		$formerrors = true;
	endif; // input field empty

	if ($time === '') :
		$err_time = '<div class="error">Sorry, time is a required field</div>';
		$formerrors = true;
	endif; // input field empty


  // Process the form
  
    $query  = "INSERT INTO breaktracker (";
    $query .= "  agent, breaktype, inORout, time";
    $query .= ") VALUES (";
    $query .= "  '{$agent}', '{$breaktype}', '{$inORout}', '{$time}' ";
    $query .= ")";
	
    $result = mysqli_query($agentconnection, $query);
	
	$agentsIn = "SELECT * FROM breaktracker WHERE inORout='In'";
	$countAgentsIn = $agentconnection->query($agentsIn);

	$totalIn = mysqli_num_rows($countAgentsIn);

	$agentsOut = "SELECT * FROM breaktracker WHERE inORout='Out'";
	$countAgentsOut = $agentconnection->query($agentsOut);

	$totalOut = mysqli_num_rows($countAgentsOut);
		
	$totalAllowed = 3;
		
	$delta = $totalOut - $totalIn;
		
	global $totalOut, $totalIn, $totalAllowed, $delta;

    if ($result) {
      // Success
      $_SESSION["message"] = "Successful Submission";
      redirect_to("index.php");

	  } else {
      // Failure
      $_SESSION["message"] = "Submission Failed";
    }

	endif; // check for form errors

?>