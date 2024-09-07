<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/db_allowed.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
    <div id="page">

    <h2>Break Forms - THS Agents (both forms must be used for each break/lunch<h4>(limit: 3 at a time, this page does auto-refresh every 60 seconds)</h4>
    </h2>
	
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
			    <fieldset>
                   <legend>Break Type*</legend>
                   <p>
                      <label>Which one?</label>            
                      <input type = "radio"
                             name = "breaktype"
                             id = "break"
                             value = "Break"
                             checked = "checked" />
                      <label for = "break">Break</label>
                      <input type = "radio"
                             name = "breaktype"
                             id = "lunch"
                             value = "Lunch" />
                      <label for = "lunch">Lunch</label>
                    </p>       
                  </fieldset>     
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
	
	<br /><br /><br />
	
		<h3>Form 2 - Returning from Break or Lunch (all fields required)</h3>

 	<form id="myinform" name="theinform" class="inform" action="process.php" method="POST" enctype="multipart/form-data">
		<ol>
			<li>
				<label for="agent">Your Name*</label>
				<input type="text" name="agent" id="agent" required title="Please enter your name" autofocus placeholder="First and Last Name" value="<?php if (isset($agent)) { echo $agent; } ?>" />
				<?php if (isset($err_agent)) { echo $err_agent; } ?>
			</li>
			<li>
			    <fieldset>
                   <legend>Break Type*</legend>
                   <p>
                      <label>Which one?</label>            
                      <input type = "radio"
                             name = "breaktype"
                             id = "break"
                             value = "Break"
                             checked = "checked" />
                      <label for = "break">Break</label>
                      <input type = "radio"
                             name = "breaktype"
                             id = "lunch"
                             value = "Lunch" />
                      <label for = "lunch">Lunch</label>
                    </p>       
                  </fieldset>     
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

	<br /><br /><br />

<table cellpadding=2 cellspacing=3 border=1>
    <tr>
        <td width="350px">
            <h2>List of Agents Out</h2>
        </td>
        <td width="350px">
            <h2>List of Agents In</h2>
        </td>
    </tr>
    
    <tr>
	    <td width="350px">
		<div class="list-items">
		<?php

			$queryOut = "SELECT * FROM breaktracker WHERE inORout=' Out ' ORDER by id DESC ";

			if ($result = mysqli_query($agentconnection, $queryOut)) {

				/* fetch associative array */
				while ($row = mysqli_fetch_assoc($result)) {
					printf ("%s %s %s %s\n", $row['agent'], $row['breaktype'], $row['inORout'], $row['time']);
					echo ("<br />");
					echo ("<br />");
					echo ("<br />");
				}
				
			}

		?>
		
		</div> <!-- end of Out list-items -->
		</td>

        <td width="350px">
		<div class="list-items">
		<?php

			$queryIn = "SELECT * FROM breaktracker WHERE inORout=' In ' ORDER by id DESC ";

			if ($result = mysqli_query($agentconnection, $queryIn)) {

				/* fetch associative array */
				while ($row = mysqli_fetch_assoc($result)) {
					printf ("%s %s %s %s\n", $row['agent'], $row['breaktype'], $row['inORout'], $row['time']);
					echo ("<br />");
					echo ("<br />");
					echo ("<br />");
				}
				
			}

		?>
		
		</div> <!-- end of In list-items -->
		
		</td>
	</tr>


	</div> <!-- end of page -->

  </div> <!-- end of main -->
</div>

</table>

<?php 
//	include("../includes/layouts/footer.php");
	ob_end_flush();
?>