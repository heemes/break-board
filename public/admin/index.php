<?php
	ob_start();
?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection_list.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php include_once("header.php"); ?>

<div id="main">
  <div id="page">
      	<h3>Admin Command Links</h3>

		<?php echo message(); ?>
		<?php

		$query = "SELECT * FROM breaktracker ORDER by id ASC";

		if ($result = mysqli_query($agentconnection, $query)) {

			/* free result set */
				echo ("<a href='bb_export_exceptions.php'>Export List</a>");
				echo ("<br />");
				echo ("<br />");

				echo ("<a href='bb_delete_page.php'>Empty List</a>");
				echo ("<br />");
				echo ("<br />");

		}
		
        ?>
        
		<h3>Current Break Board List</h3>

        <?php
			/* fetch associative array */
			while ($row = mysqli_fetch_assoc($result)) {
				printf ("%s %s %s %s\n", $row['agent'], $row['breaktype'], $row['inORout'], $row['time']);
				echo ("<br />");
				echo ("<br />");
			}

		?>
  </div>
</div>

<?php 
	ob_end_flush();
?>
