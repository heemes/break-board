<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="page">
		<h3>List of Current Breaks and Lunches</h3>
		<?php

		$query = "SELECT * FROM breaktracker ORDER by id ASC";

		if ($result = mysqli_query($connection, $query)) {

			/* fetch associative array */
			while ($row = mysqli_fetch_assoc($result)) {
				printf ("%s %s %s\n", $row['agent'], $row['breaktype'], $row['time']);
				echo ("<br />");
				echo ("<br />");
				echo ("<br />");
			}
			
		}

		?>

  </div>
</div>

<?php 
	include("../includes/layouts/footer.php");
	ob_end_flush();
?>