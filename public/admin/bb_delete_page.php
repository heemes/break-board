<?php
	ob_start();
?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection_list.php"); ?>
<?php require_once("../../includes/functions.php"); ?>

<?php
  
  $query = "DELETE FROM breaktracker WHERE id > 1";
  $result = mysqli_query($agentconnection, $query);

  if ($result) {
    // Success
    $_SESSION["message"] = "Exceptions deleted.";
    redirect_to("index.php");
  } else {
    // Failure
    $_SESSION["message"] = "Exception deletions failed.";
    redirect_to("index.php");
  }
  
?>
<?php 
	ob_end_flush();
?>
