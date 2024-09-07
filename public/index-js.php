<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/db_allowed.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
    <div id="page">

    <h2>Break Forms - THS Agents (both forms must be used for each break/lunch)</h2>
	
	<h3>Form 1 - Going on Break or Lunch (all fields required)</h3>
	<h4>this form will disappear once there are three agents out and will reappear once one checks back in</h4>
	
 	<form id="myoutform" name="theoutform" action="process.php" class="$outform" method="POST" enctype="multipart/form-data">
		<ol>
			<li>
				<label for="agent">Your Name*</label>
				<input type="text" name="agent" id="agent" required title="Please enter your name" autofocus placeholder="First and Last Name" value="<?php if (isset($agent)) { echo $agent; } ?>" />
				<?php if (isset($err_agent)) { echo $err_agent; } ?>
			</li>
			<li>
				<label for="breaktype">Break Type*</label>
				<input type="text" name="breaktype" id="breaktype" required title="Was this a break or lunch?" autofocus placeholder="Lunch or Break" value="<?php if (isset($breaktype)) { echo $breaktype; } ?>" />
				<?php if (isset($err_breaktype)) { echo $err_breaktype; } ?>
			</li>
				<input type="hidden" name="inORout" id="inORout" required value=" Out " />
			<li>
				<label for="time">Time*</label>
				<input type="time" name="time" id="time" required title="What time is it right now?" autofocus placeholder="6:00am" value="<?php if (isset($time)) { echo $time; } ?>" />
				<?php if (isset($err_time)) { echo $err_time; } ?>
			</li>
		</ol>
		<button type="submit" name="action" value="submit">Send</button>
	</form>
	
		<h3>Form 2 - Returning from Break or Lunch (all fields required)</h3>

 	<form id="myinform" name="theinform" class="inform" action="process.php" method="POST" enctype="multipart/form-data">
		<ol>
			<li>
				<label for="agent">Your Name*</label>
				<input type="text" name="agent" id="agent" required title="Please enter your name" autofocus placeholder="First and Last Name" value="<?php if (isset($agent)) { echo $agent; } ?>" />
				<?php if (isset($err_agent)) { echo $err_agent; } ?>
			</li>
			<li>
				<label for="breaktype">Break Type*</label>
				<input type="text" name="breaktype" id="breaktype" required title="Was this a break or lunch?" autofocus placeholder="Lunch or Break" value="<?php if (isset($breaktype)) { echo $breaktype; } ?>" />
				<?php if (isset($err_breaktype)) { echo $err_breaktype; } ?>
			</li>
				<input type="hidden" name="inORout" id="inORout" required value=" In " />
			<li>
				<label for="time">Time*</label>
				<input type="time" name="time" id="time" required title="What time is it right now?" autofocus placeholder="6:00am" value="<?php if (isset($time)) { echo $time; } ?>" />
				<?php if (isset($err_time)) { echo $err_time; } ?>
			</li>
		</ol>
		<button type="submit" name="action" onClick="counter()" value="submit">Send</button>
	</form>

		<h2>List of Current Breaks and Lunches</h2>
		<h3>(limit: 3 at a time, this page auto-refreshes every 2 minutes)</h3>
		<div id="list-items">
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
		
		</div> <!-- end of list-items -->

	</div> <!-- end of page -->

  </div> <!-- end of main -->
</div>

<?php 
//	include("../includes/layouts/footer.php");
	ob_end_flush();
?>