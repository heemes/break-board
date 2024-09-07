<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
	&nbsp;
  </div>
  <div id="page">
    
    <h2>Break Form - THS Agents</h2>

 	<form id="myform" name="theform" class="group" action="process.php" method="POST" enctype="multipart/form-data">
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
			<li>
				<label for="time">Break Start Time*</label>
				<input type="time" name="time" id="time" required title="What is your break's start time?" autofocus placeholder="6:00am" value="<?php if (isset($time)) { echo $exceptionstart; } ?>" />
				<?php if (isset($err_time)) { echo $err_time; } ?>
			</li>
		</ol>
		<button type="submit" name="action" value="submit">send</button>
	</form>
  </div>
</div>

<?php 
	include("../includes/layouts/footer.php");
	ob_end_flush();
?>
