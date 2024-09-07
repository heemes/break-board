<?php
	ob_start();
?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  
  $query = "DELETE FROM exceptions WHERE id > 1";
  $result = mysqli_query($connection, $query);

  if ($result) {
    // Success
    $_SESSION["message"] = "Exceptions deleted.";
    redirect_to("manage_content.php");
  } else {
    // Failure
    $_SESSION["message"] = "Exception deletions failed.";
    redirect_to("manage_content.php");
  }
  
?>
<?php 
	ob_end_flush();
?>
