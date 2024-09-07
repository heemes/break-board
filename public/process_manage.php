<?php require_once("../includes/db_allowed.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))):

	if (isset($_POST['agentsallowed'])) { $agentsallowed = $_POST['agentsallowed']; }
	
	$formerrors = false;

	if ($agentsallowed === '') :
		$err_agent = '<div class="error">Sorry, the number of agents is a required field</div>';
		$formerrors = true;
	endif; // input field empty

  // Process the form
  
  $formdata = array (
    'agentsallowed' => $agentsallowed,
  );

    $query  = "INSERT INTO agentsallowed (";
    $query .= "agentsallowed";
    $query .= ") VALUES (";
    $query .= " '{$agentsallowed}' ";
    $query .= ")";
	
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Entry Made";
      redirect_to("counter.php");

	  } else {
      // Failure
      $_SESSION["message"] = "Submission Failed";
    }

	endif; // check for form errors

?>
